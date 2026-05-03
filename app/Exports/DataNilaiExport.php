<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Quiz;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataNilaiExport implements FromCollection
{

protected $kelas;

public function __construct($kelas = null)
{
    $this->kelas = $kelas;
}
    public function collection()
{
    $quizzes = Quiz::orderBy('id')->get();

    // 🔥 Query siswa dengan filter kelas
    $query = User::where('role', 'siswa');

    if ($this->kelas) {
        $query->where('kelas', $this->kelas);
    }

    $siswa = $query->orderBy('name', 'asc')->get();

    $data = [];

    foreach ($siswa as $item) {

        $row = [
            'Nama' => $item->name,
            'Kelas' => $item->kelas,
        ];

        foreach ($quizzes as $quiz) {

            $nilai = DB::table('hasil_kuis')
                ->where('id_user', $item->id)
                ->where('id_kuis', $quiz->id)
                ->max('nilai');

            $row[$quiz->title] = $nilai ?? '-';
        }

        $data[] = $row;
    }

    return collect($data);
}
}
