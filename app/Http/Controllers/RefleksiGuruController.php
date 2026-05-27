<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Refleksi;
use App\Exports\RefleksiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class RefleksiGuruController extends Controller
{
    // 🔹 Halaman menu refleksi (kotak-kotak)
    public function index()
    {
        return view('refleksi_guru'); // sesuai nama blade kamu
    }

    // 🔹 Halaman detail berdasarkan materi
    public function show($materi)
    {
        $perPage = request('per_page', 10);

$data = Refleksi::with('user')
    ->where('materi_kode', $materi)
    ->latest()
    ->paginate($perPage)
    ->withQueryString();


        $soalMapping = [

        'pengenalan_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi pengenalan matriks ini?',
        'Bagian mana dari materi matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi pengenalan matriks?',
    ],

    'jenis_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi jenis-jenis matriks ini?',
        'Bagian mana dari materi jenis-jenis matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi jenis-jenis matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi jenis-jenis matriks?',
    ],

    'kesamaan_dua_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi kesamaan dua matriks ini?',
        'Bagian mana dari materi kesamaan dua matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi kesamaan dua matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi kesamaan dua matriks?',
    ],

    'penjumlahan_pengurangan_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi penjumlahan dan pengurangan matriks ini?',
        'Bagian mana dari materi penjumlahan dan pengurangan matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi penjumlahan dan pengurangan matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi penjumlahan dan pengurangan matriks?',
    ],

    'perkalian_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi perkalian matriks ini?',
        'Bagian mana dari materi perkalian matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi perkalian matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi perkalian matriks?',
    ],

    'determinan_invers_matriks' => [
        'Apa saja yang sudah kamu pelajari pada materi determinan dan invers matriks ini?',
        'Bagian mana dari materi determinan dan invers matriks yang masih belum kamu pahami atau masih membingungkan? Jelaskan secara singkat.',
        'Bagaimana pendapatmu tentang pembelajaran materi determinan dan invers matriks ini? Apakah menurutmu menyenangkan atau tidak? Jelaskan alasanmu.',
        'Bagaimana tingkat pemahamanmu terhadap materi determinan dan invers matriks?',
    ],

        // 🔥 tambahkan semua materi kamu di sini
    ];
    $soal = $soalMapping[$materi] ?? [];
        return view('refleksi_detail', compact('data', 'materi', 'soal'));
    }

    // 🔹 Halaman semua data refleksi
    public function semua()
{
    $perPage = request('per_page', 10);

$data = Refleksi::with('user')
    ->where('materi_kode', 'global')
    ->latest()
    ->paginate($perPage)
    ->withQueryString();

    $materi = null;

    $pertanyaanGlobal = [
        'Apa saja materi matriks yang sudah kamu pelajari dari awal hingga akhir?',
        'Materi mana yang paling sulit kamu pahami? Jelaskan.',
        'Materi mana yang paling kamu kuasai?',
        'Apa manfaat mempelajari matriks menurutmu?',
        'Bagaimana pengalaman belajarmu menggunakan media ini?',
        'Bagaimana tingkat pemahamanmu terhadap seluruh materi matriks?'
    ];

    return view('refleksi_detail', compact('data', 'materi', 'pertanyaanGlobal'));
}

    public function exportExcel($materi = null)
    {
        return Excel::download(
            new RefleksiExport($materi),
            'refleksi_'.$materi.'.xlsx'
        );
    }

    public function exportPDF($materi)
{
    $data = Refleksi::with('user')
        ->where('materi_kode', $materi)
        ->get();

    $pdf = Pdf::loadView('refleksi_pdf', compact('data', 'materi'));

    return $pdf->download('refleksi_'.$materi.'.pdf');
}

public function exportPDFSemua()
{
    $data = Refleksi::with('user')
        ->where('materi_kode', 'global') // 🔥 penting
        ->get();

    $materi = 'Semua Materi';

    $pdf = Pdf::loadView('refleksi_pdf', compact('data', 'materi'));

    return $pdf->download('refleksi_semua_materi.pdf');
}
}