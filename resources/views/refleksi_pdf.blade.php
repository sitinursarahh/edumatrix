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

        td {
            text-align: center;
        }

        /* Nama rata kiri */
        td.nama {
            text-align: left;
        }

        /* Lebar kolom */
        .col-no { width: 5%; }
        .col-nama { width: 14%; }
        .col-kelas { width: 8%; }

    </style>
</head>
<body>

<h2>DATA REFLEKSI {{ strtoupper(str_replace('_', ' ', $materi)) }}</h2>

<table>
    <tr>
        <th class="col-no">No</th>
        <th class="col-nama">Nama</th>
        <th class="col-kelas">Kelas</th>
        <th>Soal 1</th>
        <th>Soal 2</th>
        <th>Soal 3</th>
        <th>Soal 4</th>
        <th>Soal 5</th>
        <th>Soal 6</th>
    </tr>

    @foreach($data as $i => $item)
    <tr>
        <td>{{ $i+1 }}</td>
        <td class="nama">{{ $item->user->name ?? '-' }}</td>
        <td>{{ $item->user->kelas ?? '-' }}</td>

        <td>{{ $item->jawaban_1 ?? '-' }}</td>
        <td>{{ $item->jawaban_2 ?? '-' }}</td>
        <td>{{ $item->jawaban_3 ?? '-' }}</td>
        <td>{{ $item->jawaban_4 ?? '-' }}</td>
        <td>{{ $item->jawaban_5 ?? '-' }}</td>
        <td>{{ $item->jawaban_6 ?? '-' }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>