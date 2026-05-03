<?php

namespace App\Exports;

use App\Models\Refleksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RefleksiExport implements FromCollection, WithHeadings
{
    protected $materi;

    public function __construct($materi = null)
    {
        $this->materi = $materi;
    }

    public function collection()
    {
        $query = Refleksi::with('user');

        if ($this->materi) {
            $query->where('materi_kode', $this->materi);
        }

        return $query->get()->map(function ($item, $i) {
            return [
                'No' => $i + 1,
                'Nama' => $item->user->name ?? '-',
                'Kelas' => $item->user->kelas ?? '-',
                'Soal 1' => $item->jawaban_1,
                'Soal 2' => $item->jawaban_2,
                'Soal 3' => $item->jawaban_3,
                'Soal 4' => $item->jawaban_4,
                'Soal 5' => $item->jawaban_5,
                'Soal 6' => $item->jawaban_6,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kelas',
            'Soal 1',
            'Soal 2',
            'Soal 3',
            'Soal 4',
            'Soal 5',
            'Soal 6',
        ];
    }
}