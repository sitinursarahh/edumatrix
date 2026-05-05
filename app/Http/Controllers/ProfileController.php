<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\ActivityLog;
use App\Models\UserProgress;
use App\Models\Quiz;
use App\Models\Kelas;

class ProfileController extends Controller
{
    public function index()
{
    $user = auth()->user()->load('kelas'); // 🔥 load relasi

    ActivityLog::create([
        'user_id' => $user->id,
        'activity_type' => 'profil',
        'description' => 'Mengakses halaman profil'
    ]);

    $ujiSlug = 'uji-kompetensi';
    $totalSubMateri = 70;

    $progress = UserProgress::where('user_id', $user->id)
        ->pluck('sub_materi_slug')
        ->unique()
        ->toArray();

    $materiSelesai = collect($progress)
        ->filter(fn($slug) => $slug !== $ujiSlug)
        ->count();

    $progressMateri = $totalSubMateri > 0
        ? ($materiSelesai / $totalSubMateri) * 70
        : 0;

    $ujiSelesai = in_array($ujiSlug, $progress);
    $progressUji = $ujiSelesai ? 30 : 0;

    $progressPercent = min(100, round($progressMateri + $progressUji));

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
        'user', // 🔥 INI WAJIB
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
        'kelas' => 'nullable|string|max:255', // 🔥 GANTI
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    // 🔥 CONVERT NAMA → ID
    if ($request->kelas) {
        $kelas = Kelas::where('name', $request->kelas)->first();
        $user->class_id = $kelas->id ?? null;
    }

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