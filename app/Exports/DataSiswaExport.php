<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Kelas;
use App\Models\UserProgress;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataSiswaExport implements FromCollection, WithHeadings
{
    protected $kelas;

    public function __construct($kelas = null)
    {
        $this->kelas = $kelas;
    }

    public function collection()
    {
        $kelasMap = Kelas::pluck('name', 'id');

        $query = User::where('role', 'siswa');

        if ($this->kelas) {
            $query->where('class_id', $this->kelas);
        }

        $siswa = $query->orderBy('name')->get();

        $ujiSlug = 'uji-kompetensi';
        $totalSubMateri = 70;

        $data = [];

        foreach ($siswa as $index => $item) {

            // 🔥 ambil progress user
            $progress = UserProgress::where('user_id', $item->id)
                ->pluck('sub_materi_slug')
                ->unique()
                ->toArray();

            $materiSelesai = collect($progress)
                ->filter(fn($slug) => $slug !== $ujiSlug)
                ->count();

            $progressMateri = ($materiSelesai / $totalSubMateri) * 70;

            $ujiSelesai = in_array($ujiSlug, $progress);
            $progressUji = $ujiSelesai ? 30 : 0;

            $progressPercent = min(100, round($progressMateri + $progressUji));

            $data[] = [
                $index + 1, // No
                $item->name,
                $kelasMap[$item->class_id] ?? '-',
                $item->email,
                ($item->login_count ?? 0) . 'x',
                $progressPercent . '%',
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kelas',
            'Email',
            'Riwayat Login',
            'Progress',
        ];
    }
}