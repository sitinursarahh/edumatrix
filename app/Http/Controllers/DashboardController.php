<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $kelasUser = $user->kelas;

    $ujiSlug = 'uji-kompetensi';

    $siswa = User::where('role', 'siswa')
        ->where('kelas', $kelasUser)
        ->get();

    foreach ($siswa as $item) {

        // 🔹 TOTAL FIX (WAJIB)
        $totalSubMateri = 70;

        // 🔹 AMBIL PROGRESS USER
        $progress = UserProgress::where('user_id', $item->id)
            ->pluck('sub_materi_slug')
            ->unique()
            ->toArray();

        // 🔹 HITUNG MATERI SELESAI
        $materiSelesai = collect($progress)
            ->filter(fn($slug) => $slug !== $ujiSlug)
            ->count();

        // 🔹 PROGRESS MATERI (70%)
        $progressMateri = $totalSubMateri > 0
            ? ($materiSelesai / $totalSubMateri) * 70
            : 0;

        // 🔹 UJI
        $ujiSelesai = in_array($ujiSlug, $progress);
        $progressUji = $ujiSelesai ? 30 : 0;

        // 🔹 FINAL
        $item->progress_percent = min(100, round($progressMateri + $progressUji));
    }

    // 🔥 ranking
    $ranking = $siswa->sortByDesc('progress_percent')->values();
    $topThree = $ranking->take(3);

    // 🔥 progress user login
    $myProgress = optional($ranking->firstWhere('id', Auth::id()))->progress_percent ?? 0;

    return view('dashboard', compact('ranking', 'topThree', 'myProgress'));
}
}