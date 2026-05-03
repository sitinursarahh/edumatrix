<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;

class MateriJenisMatriksController extends Controller
{
    /**
     * Tampilkan halaman materi Jenis-Jenis Matriks
     */
    public function show()
{
    $userId = auth()->id();

    $progress = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'jenis_matriks')
        ->where('unlocked', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    // 🔥 TAMBAHKAN INI (WAJIB)
    $completed = UserProgress::where('user_id', $userId)
        ->where('materi_slug', 'jenis_matriks')
        ->where('completed', true)
        ->pluck('sub_materi_slug')
        ->toArray();

    return view('jenis_matriks', compact('progress', 'completed'));
}




    /**
     * Unlock sub materi ketika user klik Next
     */
    public function unlock(Request $request)
    {
        $request->validate([
            'materi_slug' => 'required|string',
            'sub_materi_slug' => 'required|string',
        ]);

        $userId = auth()->id();

        UserProgress::updateOrCreate(
            [
                'user_id' => $userId,
                'materi_slug' => $request->materi_slug,
                'sub_materi_slug' => $request->sub_materi_slug,
            ],
            [
                'unlocked' => 1,
                'completed' => 0
            ]
        );

        return response()->json([
            'status' => 'success'
        ]);
    }


    /**
     * Tandai materi selesai (misalnya setelah refleksi / kuis selesai)
     */
    public function complete(Request $request)
    {
        $request->validate([
            'materi_slug' => 'required|string'
        ]);

        $userId = auth()->id();

        UserProgress::where('user_id', $userId)
            ->where('materi_slug', $request->materi_slug)
            ->update([
                'completed' => 1
            ]);

        return response()->json([
            'status' => 'completed'
        ]);
    }
    
}
