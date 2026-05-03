<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;

class MateriDeterminanInversController extends Controller
{
    public function show()
{
    $userId = auth()->id();

    UserProgress::updateOrCreate(
        [
            'user_id' => $userId,
            'materi_slug' => 'determinan_invers_matriks',
            'sub_materi_slug' => 'determinan-1',
        ],
        [
            'unlocked' => true
        ]
    );

    $progress = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'determinan_invers_matriks')
        ->where('unlocked', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    // 🔥 TAMBAHKAN INI
    $completed = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'determinan_invers_matriks')
        ->where('completed', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    return view('determinan_invers_matriks', compact('progress','completed'));
}
    
    public function unlock(Request $request)
{
    $request->validate([
        'materi_slug' => 'required',
        'sub_materi_slug' => 'required',
    ]);

    UserProgress::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'materi_slug' => $request->materi_slug,
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
    $request->validate([
        'materi_slug' => 'required',
        'sub_materi_slug' => 'required',
    ]);

    UserProgress::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'materi_slug' => $request->materi_slug,
            'sub_materi_slug' => $request->sub_materi_slug,
        ],
        [
            'completed' => true
        ]
    );

    return response()->json(['success' => true]);
}
}