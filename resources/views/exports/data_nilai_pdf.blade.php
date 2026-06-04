<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            margin: 20px 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            word-wrap: break-word;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        /* Kolom nama rata kiri */
        td.nama {
            text-align: left;
        }

        /* Semua kolom nilai rata tengah */
        td.nilai {
            text-align: center;
        }

        /* Lebar kolom lebih proporsional */
        .col-nama { width: 14%; }
        .col-kelas { width: 8%; }

    </style>
</head>
<body>

<h2>Data Nilai Siswa</h2>

<table>
    <tr>
    <th style="width:5%">No.</th>
    <th class="col-nama">Nama</th>
    <th class="col-kelas">Kelas</th>
    @foreach($quizzes as $quiz)
        <th>{{ $quiz->title }}</th>
    @endforeach
    <th>Total Nilai</th>
</tr>

    @foreach($siswa as $index => $item)
<tr>
    <td class="nilai">{{ $index + 1 }}</td>
    <td class="nama">{{ $item->name }}</td>
    <td class="nilai">
    {{ \App\Models\Kelas::where('id', $item->class_id)->value('name') ?? '-' }}
</td>

    @foreach($quizzes as $quiz)
        <td class="nilai">
            {{ $item->{'kuis_'.$quiz->id} }}
        </td>
    @endforeach
    <td class="nilai">
    {{ $item->total_nilai }}
</td>
</tr>
@endforeach
</table>

</body>
</html>