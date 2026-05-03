<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>

<h3 style="text-align:center;">Data Siswa</h3>

<table border="1" cellpadding="5" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="text-align:center;">No</th>
            <th>Nama</th>
            <th style="text-align:center;">Kelas</th>
            <th>Email</th>
            <th style="text-align:center;">Riwayat Login</th>
            <th style="text-align:center;">Progress</th>
        </tr>
    </thead>

    <tbody>
        @foreach($siswa as $index => $item)
        <tr>
            <td style="text-align:center;">
                {{ $index + 1 }}
            </td>

            <td>
                {{ $item->name }}
            </td>

            <td style="text-align:center;">
                {{ $item->kelas }}
            </td>

            <td>
                {{ $item->email }}
            </td>

            <td style="text-align:center;">
                {{ $item->login_count }}x
            </td>

            <td style="text-align:center;">
                {{ $item->progress_percent }}%
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>