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

            // 🔥 total materi TANPA uji (per user, bukan global)
            $totalSubMateri = UserProgress::where('user_id', $item->id)
                ->where('sub_materi_slug', '!=', $ujiSlug)
                ->pluck('sub_materi_slug')
                ->unique()
                ->count();

            // 🔥 ambil yang selesai
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

            // 🔥 FIX: kalau uji selesai → 100%
            if ($ujiSelesai) {
                $item->progress_percent = 100;
            } else {
                $item->progress_percent = min(100, round($progressMateri + $progressUji));
            }
        }

        // 🔥 ranking
        $ranking = $siswa->sortByDesc('progress_percent')->values();
        $topThree = $ranking->take(3);

        // 🔥 ambil progress user login
        $myProgress = 0;
        foreach ($siswa as $item) {
            if ($item->id == Auth::id()) {
                $myProgress = $item->progress_percent;
            }
        }

        return view('dashboard', compact('ranking', 'topThree', 'myProgress'));
    }
}