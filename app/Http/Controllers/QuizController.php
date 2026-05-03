<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class QuizController extends Controller
{
    /**
     * Menentukan durasi kuis berdasarkan quiz_id (dalam menit)
     */
    private function getDurasiKuis($quiz_id)
{
    return match ((int) $quiz_id) {
        1, 2 => 30, // Pengenalan & Jenis Matriks
        3, 4 => 45, // Kesamaan & Penjumlahan-Pengurangan
        5, 6 => 60, // Perkalian, Determinan & Invers
        7     => 90, // ✅ UJI KOMPETENSI
        default => 15,
    };
}


    /**
     * Menampilkan halaman kuis
     */
    public function show($quiz_id)
    {
        // Simpan waktu mulai dan durasi kuis ke session
        session([
            'waktu_mulai_kuis' => Carbon::now(),
            'durasi_kuis' => $this->getDurasiKuis($quiz_id),
        ]);

        $rawData = DB::table('questions')
            ->join('options', 'questions.id', '=', 'options.question_id')
            ->where('questions.quiz_id', $quiz_id)
            ->select(
                'questions.id as question_id',
                'questions.question_text',
                'options.id as option_id',
                'options.option_text'
            )
            ->orderBy('questions.id')
            ->get();

        $questions = [];

        foreach ($rawData as $row) {
            if (!isset($questions[$row->question_id])) {
                $questions[$row->question_id] = [
                    'text' => $row->question_text,
                    'options' => []
                ];
            }

            $questions[$row->question_id]['options'][] = [
                'id' => $row->option_id,
                'text' => $row->option_text
            ];
        }

        $durasi = $this->getDurasiKuis($quiz_id);

        return view('kuis_pengertian_matriks', compact(
            'questions',
            'quiz_id',
            'durasi'
        ));

    }

    /**
     * Memproses submit jawaban kuis
     */
    public function submit(Request $request, $quiz_id)
    {
        $waktuMulai = session('waktu_mulai_kuis');
        $durasiKuis = session('durasi_kuis', 15); // default 15 menit
        $waktuSekarang = Carbon::now();

        // Cek apakah waktu kuis sudah habis
        if ($waktuMulai && $waktuSekarang->diffInMinutes($waktuMulai) > $durasiKuis) {
            return redirect()->route('kuis.show', $quiz_id)
                ->with('error', 'Waktu kuis telah habis.');
        }

        $jawaban = $request->jawaban ?? [];
        $jumlahBenar = 0;

        foreach ($jawaban as $questionId => $optionId) {
            $benar = DB::table('options')
                ->where('id', $optionId)
                ->value('is_correct');

            if ($benar) {
                $jumlahBenar++;
            }
        }

        // Total soal dari database
        $jumlahSoal = DB::table('questions')
            ->where('quiz_id', $quiz_id)
            ->count();

        $nilai = ($jumlahSoal > 0)
            ? round(($jumlahBenar / $jumlahSoal) * 100)
            : 0;

        // Simpan hasil kuis
        $id = DB::table('hasil_kuis')->insertGetId([
    'id_user' => Auth::id(),
    'name' => Auth::user()->name ?? 'Guest',
    'id_kuis' => $quiz_id,
    'nilai' => $nilai,
    'jumlah_benar' => $jumlahBenar,
    'jumlah_soal' => $jumlahSoal,
    'waktu_mulai' => $waktuMulai,
    'waktu_selesai' => $waktuSekarang,
]);

// ================== 🔥 UNLOCK UJI KOMPETENSI ==================
if ($quiz_id == 7) {
    \App\Models\UserProgress::complete(
        Auth::id(),
        'uji_kompetensi',
        'uji-kompetensi'
    );
}

// ================== REDIRECT ==================
return redirect()->route('hasil.kuis', [
    'id' => $id,
    'quiz_id' => $quiz_id
]);


        // ================== KKM ==================
$kkm = DB::table('setting_kkm')
        ->where('key','kkm')
        ->value('value') ?? 70;
// Mapping materi refleksi berdasarkan quiz_id




    }

    public function updateKKM(Request $request)
{
    DB::table('setting_kkm')->updateOrInsert(
        ['key' => 'kkm'],
        ['value' => $request->kkm]
    );

    return response()->json([
        'success' => true
    ]);
}

public function kelolaSoal()
{
    $kkm = DB::table('setting_kkm')
            ->where('key','kkm')
            ->value('value') ?? 70;

    return view('kelola_soal', compact('kkm'));
}
}
