<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
        'role' => 'required|in:siswa,guru'
    ]);

    // ===== SISWA =====
    if ($request->role === 'siswa') {

        $request->validate([
            'kelas' => 'required',
            'token_siswa' => 'required'
        ]);

        if ($request->token_siswa !== 'SISWA123') {
            return back()
                ->withErrors(['token_siswa' => 'Token siswa salah'])
                ->withInput();
        }
    }

    // ===== GURU =====
    if ($request->role === 'guru') {

        $request->validate([
            'token_guru' => 'required'
        ]);

        if ($request->token_guru !== 'GURU123') {
            return back()
                ->withErrors(['token_guru' => 'Token guru salah'])
                ->withInput();
        }
    }

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'kelas' => $request->role === 'siswa' ? $request->kelas : null,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
}


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return back()
            ->withErrors([
                'login' => 'Email atau kata sandi salah'
            ])
            ->withInput();
    }

    $request->session()->regenerate();

    // 🔥 Ambil user yang login
    $user = Auth::user();

    // ✅ Tambahkan login counter (hanya siswa)
    if ($user->role === 'siswa') {
        $user->increment('login_count');
        $user->last_login_at = now();
        $user->save();
    }

    // 🔥 Redirect berdasarkan role
    if ($user->role === 'guru') {
        return redirect()->route('dashboard_guru');
    }

    return redirect()->route('dashboard'); // siswa
}



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
