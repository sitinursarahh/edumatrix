<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use App\Models\UserProgress;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataNilaiExport;
use App\Exports\DataSiswaExport;
use Illuminate\Http\Request;
use App\Models\Kelas;


class DashboardguruController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD UTAMA
    |--------------------------------------------------------------------------
    */
    public function index()
{
    $start = Carbon::today();
    $end   = Carbon::now();

    // ==============================
    // Total Siswa
    // ==============================
    $siswa = User::where('role', 'siswa')->get();
    $totalSiswa = $siswa->count();

    // ==============================
// 🔥 HITUNG SISWA SELESAI (FIX)
// ==============================
$jumlahSelesai = 0;
$ujiSlug = 'uji-kompetensi';
$totalSubMateri = 70; // 🔥 TOTAL FIX

foreach ($siswa as $item) {

    // 🔹 ambil progress selesai
    $progress = UserProgress::where('user_id', $item->id)
        ->pluck('sub_materi_slug')
        ->unique()
        ->toArray();

    // 🔹 hitung materi selesai (tanpa uji)
    $materiSelesai = collect($progress)
        ->filter(fn($slug) => $slug !== $ujiSlug)
        ->count();

    // 🔹 progress materi (70%)
    $progressMateri = ($materiSelesai / $totalSubMateri) * 70;

    // 🔹 uji kompetensi (30%)
    $ujiSelesai = in_array($ujiSlug, $progress);
    $progressUji = $ujiSelesai ? 30 : 0;

    // 🔹 final progress
    $progressPercent = min(100, round($progressMateri + $progressUji));

    echo $item->name . ' => ' . $progressPercent . '<br>';
    // 🔹 hitung yang sudah 100%
    if ($progressPercent === 100) {
        $jumlahSelesai++;
    }
}
    // ==============================
    // Rata-rata Nilai per Quiz
    // ==============================
    $quizzes = Quiz::orderBy('id')->get();
    $avgData = [];

    foreach ($quizzes as $quiz) {
        $avg = DB::table('hasil_kuis')
            ->where('id_kuis', $quiz->id)
            ->avg('nilai');

        $avgData[] = round($avg ?? 0);
    }

    // ==============================
    // Activity Log
    // ==============================
    $logs = ActivityLog::with('user')
        ->whereBetween('created_at', [$start, $end])
        ->get()
        ->map(function ($item) {
            return [
                'name'        => $item->user->name,
                'description' => $item->description,
                'time'        => $item->created_at
            ];
        });

    // ==============================
    // 🔥 User Progress Activity (FIX DI SINI)
    // ==============================
    $materi = UserProgress::with('user')
        ->whereBetween('updated_at', [$start, $end])
        ->get()
        ->map(function ($item) {

            $slug = $item->sub_materi_slug;
            $nama = ucwords(str_replace('-', ' ', $slug));

            if ($slug === 'uji-kompetensi') {
                $desc = 'Mengakses Uji Kompetensi';

            } elseif ($slug === 'refleksi') {
                $desc = 'Mengakses Refleksi';

            } elseif (str_contains($slug, 'kuis')) {
                $namaKuis = ucwords(str_replace('-', ' ', str_replace('kuis-', '', $slug)));
                $desc = 'Mengakses Kuis ' . $namaKuis;

            } else {
                $desc = 'Mengakses materi ' . $nama;
            }

            return [
                'name' => $item->user->name,
                'description' => $desc,
                'time' => $item->updated_at
            ];
        });

    // ==============================
    // Gabungkan Activity
    // ==============================
    $activities = collect()
        ->merge($logs)
        ->merge($materi)
        ->sortByDesc('time')
        ->values();

    return view('dashboard_guru', compact(
        'totalSiswa',
        'jumlahSelesai',
        'activities',
        'avgData',
        'quizzes'
    ));
}


    /*
    |--------------------------------------------------------------------------
    | DATA SISWA
    |--------------------------------------------------------------------------
    */
    public function dataSiswa()
{
    $ujiSlug = 'uji-kompetensi';
    $totalSubMateri = 70;

    $perPage = request('per_page', 10);

    $siswa = User::where('role', 'siswa')
        ->orderByRaw('LOWER(name) ASC')
        ->paginate($perPage)
        ->withQueryString();

    foreach ($siswa as $item) {

        $progress = UserProgress::where('user_id', $item->id)
            ->pluck('sub_materi_slug')
            ->unique()
            ->toArray();

        $materiSelesai = collect($progress)
            ->filter(fn($slug) => $slug !== $ujiSlug)
            ->count();

        $progressMateri = ($materiSelesai / $totalSubMateri) * 70;

        $ujiSelesai = in_array($ujiSlug, $progress);
        $progressUji = $ujiSelesai ? 30 : 0;

        $item->progress_percent = min(
            100,
            round($progressMateri + $progressUji)
        );
    }

    return view('data_siswa', compact('siswa'));
}


    /*
    |--------------------------------------------------------------------------
    | EXPORT DATA SISWA PDF
    |--------------------------------------------------------------------------
    */
    public function exportDataSiswaPDF(Request $request)
{
    $totalSubMateri = 70; // 🔥 SAMAKAN SEMUA
    $ujiSlug = 'uji-kompetensi';

    $query = User::where('role', 'siswa');

    if ($request->kelas) {
        $query->where('kelas', $request->kelas);
    }

    $siswa = $query->orderBy('name')->get();

    foreach ($siswa as $item) {

        // 🔹 ambil hanya yang selesai
        $progress = UserProgress::where('user_id', $item->id)
            ->pluck('sub_materi_slug')
            ->unique()
            ->toArray();

        // 🔹 hitung materi selesai (tanpa uji)
        $materiSelesai = collect($progress)
            ->filter(fn($slug) => $slug !== $ujiSlug)
            ->count();

        // 🔹 progress materi (70%)
        $progressMateri = ($materiSelesai / $totalSubMateri) * 70;

        // 🔹 uji kompetensi (30%)
        $ujiSelesai = in_array($ujiSlug, $progress);
        $progressUji = $ujiSelesai ? 30 : 0;

        // 🔹 final progress
        $item->progress_percent = min(100, round($progressMateri + $progressUji));
    }

    $pdf = Pdf::loadView('exports.data_siswa_pdf', compact('siswa'));

    return $pdf->download('data_siswa.pdf');
}


    /*
    |--------------------------------------------------------------------------
    | EXPORT DATA SISWA EXCEL
    |--------------------------------------------------------------------------
    */
    public function exportDataSiswaExcel(Request $request)
    {
        return Excel::download(
            new DataSiswaExport($request->kelas),
            'data_siswa.xlsx'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DATA NILAI
    |--------------------------------------------------------------------------
    */
    public function dataNilai()
{
    $quizzes = Quiz::orderBy('id')->get();

    $perPage = request('per_page', 10);

    $siswa = User::where('role', 'siswa')
        ->orderBy('name', 'asc')
        ->paginate($perPage)
        ->withQueryString();

    foreach ($siswa as $item) {

    $totalNilai = 0;

    foreach ($quizzes as $quiz) {

        $nilai = DB::table('hasil_kuis')
            ->where('id_user', $item->id)
            ->where('id_kuis', $quiz->id)
            ->max('nilai');

        $item->{'kuis_'.$quiz->id} = $nilai ?? '-';

        // jika belum mengerjakan dianggap 0
        $totalNilai += ($nilai ?? 0);
    }

    $item->total_nilai = count($quizzes) > 0
        ? round($totalNilai / count($quizzes), 1)
        : '-';
}

    return view('data_nilai', compact('siswa', 'quizzes'));
}


    /*
    |--------------------------------------------------------------------------
    | EXPORT DATA NILAI PDF
    |--------------------------------------------------------------------------
    */
    public function exportPDF(Request $request)
    {
        $quizzes = Quiz::orderBy('id')->get();
        $query   = User::where('role', 'siswa');

        if ($request->kelas) {
            $query->where('kelas', $request->kelas);
        }

        $siswa = $query->orderBy('name')->get();

        foreach ($siswa as $item) {

    $totalNilai = 0;

    foreach ($quizzes as $quiz) {

        $nilai = DB::table('hasil_kuis')
            ->where('id_user', $item->id)
            ->where('id_kuis', $quiz->id)
            ->max('nilai');

        $item->{'kuis_'.$quiz->id} = $nilai ?? '-';

        // jika belum mengerjakan dianggap 0
        $totalNilai += ($nilai ?? 0);
    }

    $item->total_nilai = count($quizzes) > 0
        ? round($totalNilai / count($quizzes), 1)
        : '-';
}
        $pdf = Pdf::loadView('exports.data_nilai_pdf', compact('siswa', 'quizzes'));

        return $pdf->download('data_nilai.pdf');
    }


    /*
    |--------------------------------------------------------------------------
    | EXPORT DATA NILAI EXCEL
    |--------------------------------------------------------------------------
    */
    public function exportExcel(Request $request)
    {
        return Excel::download(
            new DataNilaiExport($request->kelas),
            'data_nilai.xlsx'
        );
    }

    public function updateNilai(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'quiz_id' => 'required',
        'nilai' => 'required|numeric|min:0|max:100'
    ]);

    DB::table('hasil_kuis')
        ->where('id_user', $request->user_id)
        ->where('id_kuis', $request->quiz_id)
        ->update([
            'nilai' => $request->nilai
        ]);

    return response()->json([
        'success' => true,
        'message' => 'Nilai berhasil diupdate'
    ]);
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('data_siswa.edit', compact('user'));
}



public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    // 🔥 ambil ID dari nama kelas
    $kelas = Kelas::where('name', $request->kelas)->first();

    $user->update([
        'name' => $request->name,
        'class_id' => $kelas->id ?? null, // 🔥 INI KUNCI
        'email' => $request->email,
    ]);

    return response()->json([
        'success' => true
    ]);
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return response()->json([
        'success' => true
    ]);
}




public function store(Request $request)
{
    try {

        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $kelas = Kelas::where('name', $request->kelas)->first();

        User::create([
            'name' => $request->name,
            'class_id' => $kelas->id ?? null, // 🔥 INI KUNCI
            'email' => $request->email,
            'password' => bcrypt('123456'),
            'role' => 'siswa'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan'
        ]);

    } catch (\Exception $e) {

        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}
}