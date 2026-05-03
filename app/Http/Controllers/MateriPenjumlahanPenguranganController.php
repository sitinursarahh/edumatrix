<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;

class MateriPenjumlahanPenguranganController extends Controller
{
    public function show()
{
    $userId = auth()->id();

    // unlock halaman pertama
    UserProgress::updateOrCreate(
        [
            'user_id' => $userId,
            'materi_slug' => 'penjumlahan_pengurangan_matriks',
            'sub_materi_slug' => 'penjumlahan-matriks-1',
        ],
        [
            'unlocked' => true
        ]
    );

    // ✅ progress unlocked (SAMA PERSIS)
    $progress = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'penjumlahan_pengurangan_matriks')
        ->where('unlocked', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    // ✅ WAJIB ADA (INI YANG KAMU BELUM PUNYA)
    $completed = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'penjumlahan_pengurangan_matriks')
        ->where('completed', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    return view('penjumlahan_pengurangan_matriks', compact('progress','completed'));
}

    public function unlock(Request $request)
    {
        UserProgress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'materi_slug' => 'penjumlahan_pengurangan_matriks',
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
            'materi_slug' => 'penjumlahan_pengurangan_matriks',
            'sub_materi_slug' => $request->sub_materi_slug,
        ],
        [
            'completed' => true
        ]
    );

    return response()->json(['success' => true]);
}
}

