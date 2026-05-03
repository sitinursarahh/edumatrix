<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Refleksi</title>

    <link rel="stylesheet" href="{{ asset('css/kelola_soal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.header')

<div class="d-flex">
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 p-4">

        <!-- HEADER -->
        <div class="info-pemberitahuan-header">
            <h1>DATA REFLEKSI</h1>
        </div>

        <!-- WRAPPER -->
        <div class="dashboard-wrapper p-4" style="
            background: #fff9d5;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.20);
        ">

            <div class="kelola-container">

                <!-- BARIS 1 -->
                <div class="row-kelola">
                    <a href="{{ route('refleksi.show', 'pengenalan_matriks') }}" class="box-kelola">
                        Refleksi Pengenalan Matriks
                    </a>

                    <a href="{{ route('refleksi.show', 'jenis_matriks') }}" class="box-kelola">
                        Refleksi Jenis-Jenis Matriks
                    </a>

                    <a href="{{ route('refleksi.show', 'kesamaan_dua_matriks') }}" class="box-kelola">
                        Refleksi Kesamaan Dua Matriks
                    </a>
                </div>

                <!-- BARIS 2 -->
                <div class="row-kelola">
                    <a href="{{ route('refleksi.show', 'penjumlahan_pengurangan_matriks') }}" class="box-kelola">
                        Refleksi Penjumlahan & Pengurangan
                    </a>

                    <a href="{{ route('refleksi.show', 'perkalian_matriks') }}" class="box-kelola">
                        Refleksi Perkalian Matriks
                    </a>

                    <a href="{{ route('refleksi.show', 'determinan_invers_matriks') }}" class="box-kelola">
                        Refleksi Determinan & Invers
                    </a>
                </div>

                <!-- OPSIONAL -->
                <div class="row-uji">
                    <a href="{{ route('refleksi.semua') }}" class="box-uji">
                        Refleksi Semua Materi
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

<!-- JS -->
<script>
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

</body>
</html>