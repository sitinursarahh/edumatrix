<?php

namespace App\Exports;

use App\Models\Refleksi;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class RefleksiExport implements FromCollection, WithHeadings, WithCustomStartCell, WithEvents
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

        $kelasMap = Kelas::pluck('name', 'id');

        return $query->get()->map(function ($item, $i) use ($kelasMap) {
            return [
                $i + 1,
                $item->user->name ?? '-',
                $kelasMap[$item->user->class_id ?? 0] ?? '-',
                $item->jawaban_1 ?? '-',
                $item->jawaban_2 ?? '-',
                $item->jawaban_3 ?? '-',
                $item->jawaban_4 ?? '-',
                $item->jawaban_5 ?? '-',
                $item->jawaban_6 ?? '-',
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

    public function startCell(): string
    {
        return 'A3';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function ($event) {

                $judul = 'DATA REFLEKSI ' . strtoupper(str_replace('_', ' ', $this->materi));

                $event->sheet->setCellValue('A1', $judul);
                $event->sheet->mergeCells('A1:I1');

                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 14,
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                    ],
                ]);
            },
        ];
    }
}