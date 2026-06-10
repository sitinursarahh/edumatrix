<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemberitahuan</title>
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}"> <!-- Link ke file CSS untuk halaman ini -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Link ke file CSS untuk navbar & sidebar -->
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- NAVBAR FULL WIDTH --}}
    @include('layouts.header') <!-- Menambahkan header/navbar -->

    <div class="d-flex">
        {{-- SIDEBAR --}}
        @include('layouts.sidebar_materi') <!-- Menambahkan sidebar -->

        <!-- JUDUL INFORMASI MEDIA -->
        <!-- <div class="info-media-header">
            <h1>INFORMASI MEDIA</h1>
        </div> -->


        {{-- MAIN CONTENT --}}
        <div class="main-content flex-grow-1 p-4">

            <!-- JUDUL INFORMASI MEDIA (SESUAI) -->
            <div class="info-pemberitahuan-header">
                <h1>PEMBERITAHUAN</h1>
            </div>

            <!-- WRAPPER -->
            <div class="pemberitahuan-info-box" style="background: #fff9d5; border-radius: 15px; padding: 25px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.20);">

            <!-- Menampilkan Data Pemberitahuan -->
            <!-- Ulangi seluruh data yang ada di $data, lalu setiap data disimpan sementara ke $item. -->
            @forelse($data as $item)
    <div class="mb-3 p-3 rounded"
         style="background:#c1856d; color:white;">

         <!-- Menampilkan isi pesan pemberitahuan dari database. -->
         <!-- Ambil isi kolom isi dari data yang sedang diproses. -->
        <div style="font-weight:500;">
            {{ $item->isi }}
        </div>

        <!-- Menampilkan waktu -->
        <div class="small mt-2" style="opacity:0.85;">
            {{ $item->created_at->diffForHumans() }}
        </div>

    </div>
    <!-- Dijalankan ketika tidak ada pemberitahuan. -->
@empty
    <div class="text-muted text-center">
        Belum ada pemberitahuan
    </div>
@endforelse


            <!-- Kotak div untuk judul dan penjelasan -->
                <!-- <div class="pemberitahuan-info-box">

    @forelse($data as $item)
        <div class="card mb-3 p-3">
            {{ $item->isi }}

            <div class="text-muted small mt-2">
                {{ $item->created_at->diffForHumans() }}
            </div>
        </div>
    @empty
        <div class="text-muted text-center">
            Belum ada pemberitahuan
        </div>
    @endforelse

</div>
                 -->

            </div> <!-- END WRAPPER -->
            
            <!-- TOMBOL KEMBALI -->
            <a href="{{ url()->previous() }}" class="btn-kembali">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
                
    <!-- JavaScript untuk toggle sidebar -->
    <script>

// Menjalankan script setelah seluruh halaman selesai dimuat.
window.addEventListener('load', function () {

// Mengambil elemen tombol profil dan menu profil.
    const profileToggle = document.getElementById('profileToggle');
    const profileMenu = document.getElementById('profileMenu');

    // Menghentikan script jika elemen tidak ditemukan.
    if (!profileToggle || !profileMenu) return;

    // Mendeteksi ketika tombol profil diklik.
    profileToggle.addEventListener('click', function (e) {

    // Mencegah event klik menyebar ke elemen lain.
        e.stopPropagation();

        // Membuka atau menutup menu profil
        profileMenu.style.display =
            profileMenu.style.display === 'block'
            ? 'none'
            : 'block';
    });

    // Mendeteksi klik pada seluruh halaman.
    document.addEventListener('click', function (e) {

    // Mengecek apakah klik terjadi di luar tombol profil dan menu profil.
        if (
            !profileToggle.contains(e.target) &&
            !profileMenu.contains(e.target)
        ) {

        // Jika pengguna mengklik area lain, menu profil akan ditutup.
            profileMenu.style.display = 'none';
        }
    });

});

</script>


</body>
</html>