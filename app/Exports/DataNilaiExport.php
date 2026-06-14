<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Kelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataNilaiExport implements FromCollection, WithHeadings
{
    protected $kelas;

    public function __construct($kelas = null)
    {
        $this->kelas = $kelas;
    }

    public function collection()
    {
        $quizzes = Quiz::orderBy('id')->get();
        $kelasMap = Kelas::pluck('name', 'id');

        $query = User::where('role', 'siswa');

        if ($this->kelas) {
            $query->where('class_id', $this->kelas);
        }

        $siswa = $query->orderBy('name', 'asc')->get();

        $data = [];

        foreach ($siswa as $item) {

    $row = [
        $item->name,
        $kelasMap[$item->class_id] ?? '-',
    ];

    $totalNilai = 0;

    foreach ($quizzes as $quiz) {

        $nilai = DB::table('hasil_kuis')
            ->where('id_user', $item->id)
            ->where('id_kuis', $quiz->id)
            ->max('nilai');

        $row[] = $nilai ?? '-';

        $totalNilai += ($nilai ?? 0);
    }

    $rataRata = count($quizzes) > 0
    ? round($totalNilai / count($quizzes), 1)
    : 0;

    $nilaiKeaktifan = $item->nilai_keaktifan;

if ($nilaiKeaktifan !== null) {
    $totalAkhir = $rataRata + $nilaiKeaktifan;
} else {
    $totalAkhir = $rataRata;
}

$row[] = $nilaiKeaktifan ?? '-';
$row[] = $totalAkhir;

$data[] = $row;
}

        return collect($data);
    }

    public function headings(): array
    {
        $quizzes = Quiz::orderBy('id')->get();

        $headings = [
            'Nama',
            'Kelas',
        ];

        foreach ($quizzes as $quiz) {
    $headings[] = $quiz->title;
}

$headings[] = 'Nilai Keaktifan';
$headings[] = 'Total Nilai';

return $headings;
    }
}