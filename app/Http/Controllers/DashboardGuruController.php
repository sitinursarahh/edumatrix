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
    // 🔥 HITUNG SISWA SELESAI
    // ==============================
    $jumlahSelesai = 0;
    $ujiSlug = 'uji-kompetensi';

    foreach ($siswa as $item) {

        $totalSubMateri = UserProgress::where('user_id', $item->id)
            ->where('sub_materi_slug', '!=', $ujiSlug)
            ->pluck('sub_materi_slug')
            ->unique()
            ->count();

        $progress = UserProgress::where('user_id', $item->id)
            ->where('completed', 1)
            ->pluck('sub_materi_slug')
            ->unique()
            ->toArray();

        $materiSelesai = collect($progress)
            ->filter(fn($slug) => $slug !== $ujiSlug)
            ->count();

        if ($materiSelesai >= $totalSubMateri && $totalSubMateri > 0) {
            $progressMateri = 70;
        } else {
            $progressMateri = $totalSubMateri > 0
                ? ($materiSelesai / $totalSubMateri) * 70
                : 0;
        }

        $ujiSelesai = in_array($ujiSlug, $progress);
        $progressUji = $ujiSelesai ? 30 : 0;

        $progressPercent = $ujiSelesai
            ? 100
            : min(100, round($progressMateri + $progressUji));

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

    $siswa = User::where('role', 'siswa')
        ->orderByRaw('LOWER(name) ASC')
        ->get();

    foreach ($siswa as $item) {

        // 🔥 total materi TANPA uji
        $totalSubMateri = UserProgress::where('user_id', $item->id)
            ->where('sub_materi_slug', '!=', $ujiSlug)
            ->pluck('sub_materi_slug')
            ->unique()
            ->count();

        // 🔥 ambil hanya yang selesai
        $progress = UserProgress::where('user_id', $item->id)
            ->where('completed', 1)
            ->pluck('sub_materi_slug')
            ->unique()
            ->toArray();

        // 🔥 hitung materi selesai
        $materiSelesai = collect($progress)
            ->filter(fn($slug) => $slug !== $ujiSlug)
            ->count();

        // 🔥 progress materi
        if ($materiSelesai >= $totalSubMateri && $totalSubMateri > 0) {
            $progressMateri = 70;
        } else {
            $progressMateri = $totalSubMateri > 0
                ? ($materiSelesai / $totalSubMateri) * 70
                : 0;
        }

        // 🔥 uji kompetensi
        $ujiSelesai = in_array($ujiSlug, $progress);
        $progressUji = $ujiSelesai ? 30 : 0;

        // 🔥 FIX FINAL (SAMA SEPERTI PROFIL)
        if ($ujiSelesai) {
            $item->progress_percent = 100;
        } else {
            $item->progress_percent = min(100, round($progressMateri + $progressUji));
        }
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
    $totalSubMateri = 31;
    $ujiSlug = 'uji-kompetensi';

    $query = User::where('role', 'siswa');

    if ($request->kelas) {
        $query->where('kelas', $request->kelas);
    }

    $siswa = $query->orderBy('name')->get();

    foreach ($siswa as $item) {

        $progress = UserProgress::where('user_id', $item->id)
            ->pluck('sub_materi_slug')
            ->toArray();

        $materiSelesai = count(array_filter($progress, function ($slug) use ($ujiSlug) {
            return $slug !== $ujiSlug;
        }));

        $progressMateri = ($materiSelesai / $totalSubMateri) * 70;
        $ujiSelesai = in_array($ujiSlug, $progress);
        $progressUji = $ujiSelesai ? 30 : 0;

        $item->progress_percent = round($progressMateri + $progressUji);
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

        $siswa = User::where('role', 'siswa')
            ->orderBy('name', 'asc')
            ->get();

        foreach ($siswa as $item) {
            foreach ($quizzes as $quiz) {

                $nilai = DB::table('hasil_kuis')
                    ->where('id_user', $item->id)
                    ->where('id_kuis', $quiz->id)
                    ->max('nilai');

                $item->{'kuis_'.$quiz->id} = $nilai ?? '-';
            }
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
            foreach ($quizzes as $quiz) {

                $nilai = DB::table('hasil_kuis')
                    ->where('id_user', $item->id)
                    ->where('id_kuis', $quiz->id)
                    ->max('nilai');

                $item->{'kuis_'.$quiz->id} = $nilai ?? '-';
            }
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

    $user->update([
        'name' => $request->name,
        'kelas' => $request->kelas,
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

        // VALIDASI
        $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $request->name,
            'kelas' => $request->kelas,
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