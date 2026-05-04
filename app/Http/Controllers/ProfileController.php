<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityLog;
use App\Models\UserProgress;
use App\Models\Quiz;

class ProfileController extends Controller
{
    public function index()
{
    $user = auth()->user();

    // =============================
    // Activity Log
    // =============================
    ActivityLog::create([
        'user_id' => $user->id,
        'activity_type' => 'profil',
        'description' => 'Mengakses halaman profil'
    ]);

    // =============================
    // 🔥 HITUNG PROGRESS (FIX)
    // =============================
    $ujiSlug = 'uji-kompetensi';

    // 🔹 TOTAL MATERI (FIX - JANGAN DARI USER)
    $totalSubMateri = 70; // ⬅️ ganti sesuai jumlah materi kamu

    // 🔹 AMBIL PROGRESS USER
    $progress = UserProgress::where('user_id', $user->id)
        ->pluck('sub_materi_slug')
        ->unique()
        ->toArray();

    // 🔹 HITUNG MATERI SELESAI (TANPA UJI)
    $materiSelesai = collect($progress)
        ->filter(fn($slug) => $slug !== $ujiSlug)
        ->count();

    // 🔹 PROGRESS MATERI (70%)
    $progressMateri = $totalSubMateri > 0
        ? ($materiSelesai / $totalSubMateri) * 70
        : 0;

    // 🔹 CEK UJI
    $ujiSelesai = in_array($ujiSlug, $progress);

    // 🔹 PROGRESS UJI (30%)
    $progressUji = $ujiSelesai ? 30 : 0;

    // 🔹 FINAL PROGRESS
    $progressPercent = min(100, round($progressMateri + $progressUji));

    // =============================
    // AMBIL NILAI PER QUIZ
    // =============================
    $quizzes = Quiz::orderBy('id')->get();
    $nilaiPerQuiz = [];

    foreach ($quizzes as $quiz) {
        $nilai = DB::table('hasil_kuis')
            ->where('id_user', $user->id)
            ->where('id_kuis', $quiz->id)
            ->max('nilai');

        $nilaiPerQuiz[$quiz->id] = $nilai ?? '-';
    }

    return view('profil', compact(
        'progressPercent',
        'quizzes',
        'nilaiPerQuiz'
    ));
}
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'kelas' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->kelas = $request->kelas;

        // =============================
        // Upload Foto
        // =============================
        if ($request->hasFile('photo')) {

            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profile_photos', $filename, 'public');

            $user->profile_photo_path = $path;
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}