<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RefleksiController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemberitahuanController;
use App\Http\Controllers\DashboardGuruController;
use App\Http\Controllers\KelolaSoalController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MateriKesamaanMatriksController;
use App\Http\Controllers\MateriPenjumlahanPenguranganController;
use App\Http\Controllers\MateriPerkalianMatriksController;
use App\Http\Controllers\MateriDeterminanInversController;
use App\Http\Controllers\RefleksiGuruController;


Route::get('/', function () {
    return view('welcome'); // Menampilkan resources/views/welcome.blade.php
})->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

// Dashboard tanpa login
// Route::get('/dashboard', function () {
//     return view('dashboard'); // Halaman dashboard manual bootstrap
// })->name('dashboard');



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/informasi_media',
        [InformasiController::class, 'index']
    )->name('informasi_media');

});

Route::get('/profil', function () {
    return view('profil');
})->name('profil');

Route::get('/edit_profil', function () {
    return view('edit_profil');
})->name('edit_profil');

// Route::get('/materi_pengertian_matriks', function () {
//     return view('materi_pengertian_matriks');
// })->name('materi_pengertian_matriks');

// Route::get('/jenis_matriks', function () {
//     return view('jenis_matriks');
// })->name('jenis_matriks');

Route::get('/pemberitahuan', function () {
    return view('pemberitahuan');
})->name('pemberitahuan');



Route::middleware(['auth'])->group(function () {

    Route::get('/kesamaan_dua_matriks',
        [MateriKesamaanMatriksController::class, 'show']
    )->name('kesamaan_dua_matriks');

    Route::post('/kesamaan_dua_matriks/unlock',
        [MateriKesamaanMatriksController::class, 'unlock']
    );
});



Route::middleware(['auth'])->group(function () {

    Route::get('/penjumlahan_pengurangan_matriks',
        [MateriPenjumlahanPenguranganController::class, 'show']
    )->name('penjumlahan_pengurangan_matriks');

    Route::post('/penjumlahan_pengurangan_matriks/unlock',
        [MateriPenjumlahanPenguranganController::class, 'unlock']
    );

});



Route::middleware(['auth'])->group(function () {

    Route::get('/perkalian_matriks',
        [MateriPerkalianMatriksController::class, 'show']
    )->name('perkalian_matriks');

    Route::post('/perkalian_matriks/unlock',
        [MateriPerkalianMatriksController::class, 'unlock']
    );

});



Route::middleware(['auth'])->group(function () {

    Route::get('/determinan_invers_matriks',
        [MateriDeterminanInversController::class, 'show']
    )->name('determinan_invers_matriks');

    Route::post('/determinan_invers_matriks/unlock',
        [MateriDeterminanInversController::class, 'unlock']
    );

});
Route::post('/unlock-materi', [MateriDeterminanInversController::class, 'unlock'])
    ->middleware('auth');

Route::get('/uji_kompetensi', function () {
    return view('uji_kompetensi');
})->name('uji_kompetensi');
// Route::get('/kuis_pengertian_matriks', function () {
//     return view('kuis_pengertian_matriks');
// })->name('kuis_pengertian_matriks');

use App\Http\Controllers\QuizController;

Route::get('/kuis/{quiz_id}', [QuizController::class, 'show'])
    ->name('kuis.show');

Route::post('/kuis/{quiz_id}/submit', [QuizController::class, 'submit'])
    ->name('kuis.submit');

// Route::get('/petunjuk_penggunaan_kuis', function () {
//     return view('petunjuk_penggunaan_kuis');
// })->name('petunjuk.kuis');


// Route::post('/kuis/{quiz_id}/submit', function ($quiz_id) {
//     // simpan jawaban berdasarkan quiz_id
// })->name('kuis.submit');

Route::get('/refleksi', [RefleksiController::class, 'create'])
    ->name('refleksi.create');

Route::post('/refleksi', [RefleksiController::class, 'store'])
    ->name('refleksi.store');

// KUIS JENIS MATRIKS //
Route::get('/petunjuk_penggunaan_kuis', function (Request $request) {
    return view('petunjuk_penggunaan_kuis', [
        'quiz_id' => $request->query('quiz_id')
    ]);
})->name('petunjuk.kuis');


// ======================= LOGIN =======================
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register');

// ======================= DASHBOARD GURU =======================



Route::get('/dashboard_guru', [DashboardGuruController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard_guru');

// use App\Http\Controllers\MateriPengertianMatriksController;

// Route::get('/materi_pengertian_matriks/{slide?}',
//     [MateriPengertianMatriksController::class, 'show']
// )->name('materi.show')

// Route::post('/progress/unlock', [UserProgressController::class, 'unlock'])Route::get('/jenis_matriks', function () {
//     ->name('progress.unlock');

// use App\Http\Controllers\MateriJenisMatriksController;

// Route::middleware(['auth'])->group(function () {

//     Route::get('/jenis_matriks',
//         [MateriJenisMatriksController::class, 'show']
//     )->name('jenis_matriks');

//     Route::post('/progress/unlock',
//         [MateriJenisMatriksController::class, 'unlock']
//     )->name('progress.unlock');

//     Route::post('/progress/complete',
//         [MateriJenisMatriksController::class, 'complete']
//     )->name('progress.complete');

// });
// Route::post('/unlock-jenis', [MateriJenisMatriksController::class, 'unlock'])
//     ->middleware('auth');

use App\Http\Controllers\MateriPengertianMatriksController;
use App\Http\Controllers\MateriJenisMatriksController;
use App\Http\Controllers\UserProgressController;

Route::middleware(['auth'])->group(function () {

    Route::get('/materi_pengertian_matriks',
        [MateriPengertianMatriksController::class, 'show']
    )->name('materi_pengertian_matriks');

    Route::get('/jenis_matriks',
        [MateriJenisMatriksController::class, 'show']
    )->name('jenis_matriks');

    Route::post('/progress/unlock',
        [UserProgressController::class, 'unlock']
    )->name('progress.unlock');

});

Route::post('/progress/unlock', [UserProgressController::class, 'unlock'])
    ->name('progress.unlock');

Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
Route::post('/profil/update', [ProfileController::class, 'update'])->name('profil.update');


// PEMBERITAHUAN

Route::middleware(['auth'])->group(function () {

    // Guru
    Route::get('/pemberitahuan_guru', [PemberitahuanController::class, 'indexGuru']);
    Route::post('/pemberitahuan', [PemberitahuanController::class, 'store']);
    Route::put('/pemberitahuan/{id}', [PemberitahuanController::class, 'update']);
    Route::delete('/pemberitahuan/{id}', [PemberitahuanController::class, 'destroy']);

    // Siswa
    Route::get('/pemberitahuan', [PemberitahuanController::class, 'indexSiswa']);
});

// ======================= KELOLA SOAL =======================

Route::middleware(['auth'])->group(function () {

    // Halaman daftar quiz
    Route::get('/kelola_soal', [KelolaSoalController::class, 'index'])
        ->name('kelola_soal');

    // Halaman isi soal berdasarkan quiz
    Route::get('/kelola_soal/{quiz}', [KelolaSoalController::class, 'show'])
        ->name('kelola_soal.show');

    // ================== QUESTION CRUD ==================

    Route::get('/kelola_soal/{quiz}/create', [QuestionController::class, 'create'])
        ->name('questions.create');

    Route::post('/kelola_soal/{quiz}', [QuestionController::class, 'store'])
        ->name('questions.store');

    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])
        ->name('questions.edit');

    Route::put('/questions/{question}', [QuestionController::class, 'update'])
        ->name('questions.update');

    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])
        ->name('questions.destroy');

});

// DATA SISWA
Route::get('/data_siswa', [DashboardGuruController::class, 'dataSiswa'])
    ->name('data_siswa');
Route::get('/data_siswa/{id}/edit', [DashboardGuruController::class, 'edit'])
    ->name('data_siswa.edit');

Route::put('/data_siswa/{id}', [DashboardGuruController::class, 'update'])
    ->name('data_siswa.update');

Route::delete('/data_siswa/{id}', [DashboardGuruController::class, 'destroy'])
    ->name('data_siswa.destroy');
// DATA NILAI
Route::get('/data_nilai', [DashboardGuruController::class, 'dataNilai'])
    ->middleware('auth')
    ->name('data_nilai');

Route::post('/data-nilai/update', [DashboardGuruController::class, 'updateNilai'])
    ->name('data_nilai.update');
Route::post('/data_siswa', [DashboardGuruController::class, 'store'])
    ->name('data_siswa.store');
// EKSPOR PDF DAN EXCELL
Route::get('/data_nilai/export/pdf',
    [DashboardGuruController::class, 'exportPDF']
)->name('data_nilai.export.pdf');

Route::get('/data_nilai/export/excel',
    [DashboardGuruController::class, 'exportExcel']
)->name('data_nilai.export.excel');

Route::get('/data-siswa/export-pdf', [DashboardGuruController::class, 'exportDataSiswaPDF'])
    ->name('dataSiswa.exportPDF');

Route::get('/data-siswa/export-excel', [DashboardGuruController::class, 'exportDataSiswaExcel'])
    ->name('dataSiswa.exportExcel');


// CHAT
// CHAT
Route::middleware(['auth'])->group(function () {

    Route::get('/chat', [ChatController::class, 'roomSelector'])
        ->name('chat.rooms');

    Route::get('/chat/{classId}', [ChatController::class, 'index'])
        ->name('chat.index');

    Route::post('/chat/send', [ChatController::class, 'send'])
        ->name('chat.send');

    Route::delete('/chat/delete/{id}', [ChatController::class, 'delete'])
        ->name('chat.delete');
});

Route::post('/update-kkm',[QuizController::class,'updateKKM'])->name('kkm.update');
// Route::get('/kelola-soal', [QuizController::class,'kelolaSoal'])->name('kelola_soal');

use Illuminate\Support\Facades\DB;

Route::get('/hasil-kuis/{id}', function ($id) {

    $hasil = DB::table('hasil_kuis')->where('id', $id)->first();

    if (!$hasil) {
        abort(404);
    }

    $kkm = DB::table('setting_kkm')
        ->where('key','kkm')
        ->value('value') ?? 70;

    // 🔥 mapping materi (DI LUAR return)
    $materiMap = [
        1 => 'pengenalan_matriks',
        2 => 'jenis_matriks',
        3 => 'kesamaan_dua_matriks',
        4 => 'penjumlahan_pengurangan_matriks',
        5 => 'perkalian_matriks',
        6 => 'determinan_invers_matriks',
        7 => 'uji_kompetensi',
    ];

    $materi_kode = $materiMap[$hasil->id_kuis] ?? null;

    // 🔥 baru return view
    return view('hasil_kuis', [
        'nilai' => $hasil->nilai,
        'jumlahBenar' => $hasil->jumlah_benar,
        'jumlahSoal' => $hasil->jumlah_soal,
        'quiz_id' => $hasil->id_kuis,
        'materi_kode' => $materi_kode,
        'kkm' => $kkm,
    ]);

})->name('hasil.kuis');

Route::get('/refleksi_guru', [RefleksiGuruController::class, 'index'])
    ->name('refleksi.guru');
    
Route::get('/refleksi', [RefleksiController::class, 'create'])
    ->name('refleksi.index'); 

Route::get('/refleksi/{materi}', [RefleksiGuruController::class, 'show'])
    ->name('refleksi.show');

Route::get('/refleksi-semua', [RefleksiGuruController::class, 'semua'])
    ->name('refleksi.semua');

Route::get('/refleksi/export-excel/{materi}', 
    [RefleksiGuruController::class, 'exportExcel']
)->name('refleksi.export.excel');

Route::get('/refleksi/export-pdf/{materi}', 
    [RefleksiGuruController::class, 'exportPDF']
)->name('refleksi.export.pdf');

Route::get('/refleksi-export-semua', [RefleksiGuruController::class, 'exportPDFSemua'])
    ->name('refleksi.export.semua.pdf');

Route::post('/refleksi/submit', [RefleksiController::class, 'submit'])->name('refleksi.submit');

Route::post('/progress/complete', [UserProgressController::class, 'complete']);