<?php

namespace App\Http\Controllers;

use App\Models\Pemberitahuan;
use Illuminate\Http\Request;
use App\Models\ActivityLog;


class PemberitahuanController extends Controller
{
    // Halaman guru
    public function indexGuru()
    {
        $data = Pemberitahuan::where('guru_id', auth()->id())
                    ->latest()
                    ->get();

        return view('pemberitahuan_guru', compact('data'));
    }

    // Kirim pemberitahuan
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required'
        ]);

        Pemberitahuan::create([
            'guru_id' => auth()->id(),
            'isi' => $request->isi
        ]);

        return back()->with('success', 'Pemberitahuan berhasil dikirim');
    }

    // Update
    public function update(Request $request, $id)
    {
        $p = Pemberitahuan::findOrFail($id);
        $p->update(['isi' => $request->isi]);

        return back()->with('success', 'Pemberitahuan berhasil di edit');
    }

    // Hapus
    public function destroy($id)
    {
        Pemberitahuan::findOrFail($id)->delete();
        return back()->with('success', 'Pemberitahuan berhasil dihapus');
    }

    // Halaman siswa
    public function indexSiswa()
{
    $user = auth()->user();

    // ✅ CATAT AKTIVITAS SISWA
    ActivityLog::create([
        'user_id' => $user->id,
        'activity_type' => 'pemberitahuan',
        'description' => 'Melihat halaman pemberitahuan'
    ]);

    // ✅ TANDAI SEMUA PEMBERITAHUAN SUDAH DIBACA
    $user->last_seen_notification_at = now();
    $user->save();

    $data = Pemberitahuan::latest()->get();

    return view('pemberitahuan', compact('data'));
}
}