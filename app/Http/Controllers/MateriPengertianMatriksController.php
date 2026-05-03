<?php

namespace App\Http\Controllers;

use App\Models\UserProgress;

class MateriPengertianMatriksController extends Controller
{
    public function show()
{
    $userId = auth()->id();

    // Pastikan sub pertama unlocked
    UserProgress::firstOrCreate(
        [
            'user_id' => $userId,
            'materi_slug' => 'pengenalan_matriks',
            'sub_materi_slug' => 'pengertian-matriks'
        ],
        [
            'unlocked' => true
        ]
    );

    // ================= UNLOCKED =================
    $progress = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'pengenalan_matriks')
        ->where('unlocked', true)
        ->orderBy('id')
        ->pluck('sub_materi_slug')
        ->toArray();

    // ================= COMPLETED (🔥 TAMBAHKAN INI) =================
    $completed = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'pengenalan_matriks')
        ->where('completed', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    // ================= KIRIM KE VIEW =================
    return view('materi_pengertian_matriks', compact('progress', 'completed'));
}

}
