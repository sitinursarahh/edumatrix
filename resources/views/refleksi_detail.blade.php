<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Refleksi</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/data_siswa.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kelola_soal.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Tambahkan link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.header')

<div class="d-flex">
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 p-4">

        <div class="info-pemberitahuan-header">
            <h1>
    @if($materi)
        DATA REFLEKSI {{ strtoupper(str_replace('_', ' ', $materi)) }}
    @else
        DATA REFLEKSI SEMUA MATERI
    @endif
</h1>
        </div>
        
<!-- FILTER & SEARCH -->
<div class="filter-container mb-3 d-flex justify-content-between align-items-center">

    <!-- Filter Kelas -->
    <div class="d-flex align-items-center gap-2">
        <label class="filter-label">Filter Kelas:</label>
        <select id="filterKelas" class="filter-select">
            <option value="">Semua Kelas</option>
            <option value="XI IPA 1">XI IPA 1</option>
            <option value="XI IPA 2">XI IPA 2</option>
            <option value="XI IPS 1">XI IPS 1</option>
            <option value="XI IPS 2">XI IPS 2</option>
        </select>
    </div>

    <!-- Search -->
    <div class="search-wrapper">
        <i class="bi bi-search search-icon"></i>
        <input type="text" id="searchInput" class="search-input"
               placeholder="Cari data...">
    </div>

</div>

<!-- 🔥 EXPORT BUTTON (BARIS BARU SEPERTI DATA NILAI) -->
<div class="d-flex justify-content-end gap-2 mb-3">

    @if($materi)
        <a href="{{ route('refleksi.export.pdf', $materi) }}" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf"></i> Export PDF
        </a>
    @else
        <a href="{{ route('refleksi.export.semua.pdf') }}" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf"></i> Export PDF
        </a>
    @endif

    <a href="{{ route('refleksi.export.excel', $materi ?? 'global') }}" class="btn btn-success">
        <i class="bi bi-file-earmark-excel"></i> Export Excel
    </a>

</div>

        @php
    $totalKolom = 3 + ($materi ? count($soal) : count($pertanyaanGlobal));
@endphp

<div class="table-responsive-custom {{ $totalKolom > 7 ? 'table-scroll' : 'table-normal' }}">
    <table class="table table-bordered text-center align-middle">

        <thead class="table-secondary text-center">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kelas</th>

                @if($materi)
                    @foreach($soal as $s)
                        <th>{{ $s }}</th>
                    @endforeach
                @else
                    @foreach($pertanyaanGlobal as $p)
                        <th>{{ $p }}</th>
                    @endforeach
                @endif
            </tr>
        </thead>

        <tbody>
        @forelse($data as $i => $item)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $item->user->name ?? '-' }}</td>
                <td>
    @php
        $classId = $item->class_id ?? null;

        // kalau class_id tidak ada tapi ada user_id, coba ambil dari user
        if (!$classId && isset($item->user_id)) {
            $classId = \App\Models\User::where('id', $item->user_id)->value('class_id');
        }

        $kelas = $classId
            ? \App\Models\Kelas::where('id', $classId)->value('name')
            : null;
    @endphp

    {{ $kelas ?? '-' }}
</td>

                @if($materi)
                    @foreach($soal as $index => $s)
                        <td>{{ $item->{'jawaban_'.($index+1)} ?? '-' }}</td>
                    @endforeach
                @else
                    @foreach($pertanyaanGlobal as $index => $p)
                        <td>{{ $item->{'jawaban_'.($index+1)} ?? '-' }}</td>
                    @endforeach
                @endif

            </tr>
        @empty
            <tr>
                <td colspan="{{ $totalKolom }}" class="text-center">
                    Tidak ada data
                </td>
            </tr>
        @endforelse
        </tbody>

    </table>
</div>
<div class="mt-3 text-start">
    <a href="{{ url()->previous() }}" class="btn btn-secondary">
        ← Kembali
    </a>
</div>
        </div>

    </div>
    
</div>



</body>
</html>

<!-- JavaScript untuk toggle sidebar -->
    <script>
        /* SIDEBAR TOGGLE */
        const sidebar = document.getElementById('sidebar');
        const content = document.querySelector('.main-content');
        const toggleSidebar = document.getElementById('sidebarToggle');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        });

        /* PROFILE DROPDOWN */
        const profileToggle = document.getElementById('profileToggle');
        const profileMenu = document.getElementById('profileMenu');

        profileToggle.addEventListener('click', () => {
            profileMenu.style.display = profileMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function(e) {
            if (!profileToggle.contains(e.target) && !profileMenu.contains(e.target)) {
                profileMenu.style.display = 'none';
            }
        });

        
    </script>

    <!-- FILTERING -->
    <script>
const searchInput = document.getElementById("searchInput");
const filterKelas = document.getElementById("filterKelas");
const tableRows = document.querySelectorAll("tbody tr");

function filterTable() {
    const searchValue = searchInput.value.toLowerCase();
    const kelasValue = filterKelas.value;

    tableRows.forEach(row => {
        const nama = row.children[1].textContent.toLowerCase();
        const kelas = row.children[2].textContent;
        const email = row.children[3].textContent.toLowerCase();

        const matchSearch = nama.includes(searchValue) || email.includes(searchValue);
        const matchKelas = kelasValue === "" || kelas === kelasValue;

        if (matchSearch && matchKelas) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}

searchInput.addEventListener("keyup", filterTable);
filterKelas.addEventListener("change", filterTable);
</script>

<script>
const filterSelect = document.getElementById("filterKelas");
const pdfBtn = document.getElementById("exportPdfBtn");
const excelBtn = document.getElementById("exportExcelBtn");

filterSelect.addEventListener("change", function() {
    const kelas = this.value;

    pdfBtn.href = "{{ route('dataSiswa.exportPDF') }}?kelas=" + kelas;
    excelBtn.href = "{{ route('dataSiswa.exportExcel') }}?kelas=" + kelas;
});
</script>

</body>
</html>