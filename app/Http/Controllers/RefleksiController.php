<?php

namespace App\Http\Controllers;
use App\Models\UserProgress;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class RefleksiController extends Controller
{
    public function create(Request $request)
{
    $materi = $request->query('materi');

    // ===============================
    // 🔥 REFLEKSI GLOBAL (SEMUA MATERI)
    // ===============================
    if (!$materi) {

        $pertanyaanGlobal = [
            'Apa saja materi matriks yang sudah kamu pelajari dari awal hingga akhir?',
            'Materi mana yang paling sulit kamu pahami? Jelaskan.',
            'Materi mana yang paling kamu kuasai?',
            'Apa manfaat mempelajari matriks menurutmu?',
            'Bagaimana pengalaman belajarmu menggunakan media ini?',
            'Bagaimana tingkat pemahamanmu terhadap seluruh materi matriks?'
        ];

        return view('refleksi', [
            'judul' => 'Refleksi Akhir Semua Materi',
            'pertanyaan' => $pertanyaanGlobal,
            'materi_kode' => 'global',
            'submateri_kode' => null,
            'back_url' => route('dashboard'),
            'next_url' => route('uji_kompetensi'),
        ]);
    }

    $judulMap = [
        'pengenalan_matriks' => 'Refleksi Pengenalan Matriks',
        'jenis_matriks'      => 'Refleksi Jenis-Jenis Matriks',
        'kesamaan_dua_matriks' => 'Refleksi Kesamaan Dua Matriks',
        'penjumlahan_pengurangan_matriks' => 'Refleksi Penjumlahan dan Pengurangan Matriks',
        'perkalian_matriks' => 'Refleksi Perkalian Matriks',
        'determinan_invers_matriks' => 'Refleksi Determinan dan Invers Matriks',

    ];

    $pertanyaanMap = [

    'pengenalan_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi pengenalan matriks ini?',
        'Bagian mana dari materi matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi pengenalan matriks?',
    ],

    'jenis_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi jenis-jenis matriks ini?',
        'Bagian mana dari materi jenis-jenis matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi jenis-jenis matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi jenis-jenis matriks?',
    ],

    'kesamaan_dua_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi kesamaan dua matriks ini?',
        'Bagian mana dari materi kesamaan dua matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi kesamaan dua matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi kesamaan dua matriks?',
    ],

    'penjumlahan_pengurangan_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi penjumlahan dan pengurangan matriks ini?',
        'Bagian mana dari materi penjumlahan dan pengurangan matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi penjumlahan dan pengurangan matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi penjumlahan dan pengurangan matriks?',
    ],

    'perkalian_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi perkalian matriks ini?',
        'Bagian mana dari materi perkalian matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi perkalian matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi perkalian matriks?',
    ],

    'determinan_invers_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi determinan dan invers matriks ini?',
        'Bagian mana dari materi determinan dan invers matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi determinan dan invers matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi determinan dan invers matriks?',
    ],
];

    $backMateriMap = [
    'pengenalan_matriks' => route('materi_pengertian_matriks'),
    'jenis_matriks' => route('jenis_matriks'),
    'kesamaan_dua_matriks' => route('kesamaan_dua_matriks'),
    'penjumlahan_pengurangan_matriks' => route('penjumlahan_pengurangan_matriks'),
    'perkalian_matriks' => route('perkalian_matriks'),
    'determinan_invers_matriks' => route('determinan_invers_matriks'),
];


    $nextMateriMap = [
        'pengenalan_matriks' => route('jenis_matriks'),
        'jenis_matriks' => route('kesamaan_dua_matriks'),
        'kesamaan_dua_matriks' => route('penjumlahan_pengurangan_matriks'),
        'penjumlahan_pengurangan_matriks' => route('perkalian_matriks'),
        'perkalian_matriks' => route('determinan_invers_matriks'),
        'determinan_invers_matriks' => route('dashboard'),
    ];

    if (!isset($judulMap[$materi])) {
        abort(404);
    }

    return view('refleksi', [
    'judul' => $judulMap[$materi],
    'pertanyaan' => $pertanyaanMap[$materi],
    'materi_kode' => $materi,
    'submateri_kode' => null,

    // 🔥 INI YANG PENTING
    'back_url' => $backMateriMap[$materi] ?? route('dashboard'),
    'next_url' => $nextMateriMap[$materi] ?? route('dashboard'),
]);


    
}





    public function store(Request $request)
{
    $rules = [
    'materi_kode' => 'required'
];

foreach ($request->all() as $key => $val) {
    if (str_contains($key, 'jawaban_')) {
        $rules[$key] = 'required';
    }
}

$request->validate($rules);

    $userId = auth()->id();

    $data = [
    'user_id' => $userId,
    'materi_kode' => $request->materi_kode,
    'created_at' => now(),
    'updated_at' => now(),
];

foreach ($request->all() as $key => $val) {
    if (str_contains($key, 'jawaban_')) {
        $data[$key] = $val;
    }
}

try {

    DB::table('refleksi')->insert($data);

    // 🔥 hanya jika GLOBAL
    if ($request->materi_kode === 'global') {
        UserProgress::updateOrCreate(
            [
                'user_id' => $userId,
                'materi_slug' => 'refleksi_semua_materi',
                'sub_materi_slug' => 'refleksi'
            ],
            [
                'completed' => 1,
                'unlocked' => 1
            ]
        );
    }

} catch (\Exception $e) {
    return response()->json([
        'status' => 'error',
        'message' => $e->getMessage()
    ], 500);
}

    /*
    |--------------------------------------------------------------------------
    | 🔥 SISTEM UNLOCK MATERI BERIKUTNYA
    |--------------------------------------------------------------------------
    */

    // 1️⃣ Tandai materi sekarang selesai
    UserProgress::where('user_id', $userId)
        ->where('materi_slug', $request->materi_kode)
        ->update([
            'completed' => 1
        ]);

    // 2️⃣ Jika selesai pengenalan → unlock jenis
    if ($request->materi_kode === 'pengenalan_matriks') {

        UserProgress::firstOrCreate(
            [
                'user_id' => $userId,
                'materi_slug' => 'jenis_matriks',
                'sub_materi_slug' => 'matriks-baris'
            ],
            [
                'unlocked' => 1,
                'completed' => 0
            ]
        );
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Refleksi berhasil dikirim'
    ]);
}
    
}
