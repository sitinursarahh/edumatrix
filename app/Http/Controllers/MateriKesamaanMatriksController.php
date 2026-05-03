<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;

class MateriKesamaanMatriksController extends Controller
{
    public function show()
{
    $userId = auth()->id();

    // unlock halaman pertama
    UserProgress::updateOrCreate(
        [
            'user_id' => $userId,
            'materi_slug' => 'kesamaan_matriks',
            'sub_materi_slug' => 'penyelesaian-kesamaan-1',
        ],
        [
            'unlocked' => true
        ]
    );

    // 🔓 progress unlocked
    $progress = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'kesamaan_matriks')
        ->where('unlocked', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    // 🔥 TAMBAHKAN DI SINI (WAJIB)
    $completed = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'kesamaan_matriks')
        ->where('completed', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    // 🔥 KIRIM KE VIEW
    return view('kesamaan_dua_matriks', compact('progress', 'completed'));
}

    public function unlock(Request $request)
    {
        UserProgress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'materi_slug' => 'kesamaan_matriks',
                'sub_materi_slug' => $request->sub_materi_slug,
            ],
            [
                'unlocked' => true
            ]
        );

        return response()->json(['success' => true]);
    }

    public function complete(Request $request)
{
    UserProgress::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'materi_slug' => 'kesamaan_matriks',
            'sub_materi_slug' => $request->sub_materi_slug,
        ],
        [
            'completed' => true
        ]
    );

    return response()->json(['success' => true]);
}
}