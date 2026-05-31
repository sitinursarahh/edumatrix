<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Media Pembelajaran Matriks</title>
    <link rel="stylesheet" href="{{ asset('css/informasi_media.css') }}"> <!-- Link ke file CSS untuk halaman ini -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Link ke file CSS untuk navbar & sidebar -->
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Tambahkan link FontAwesome -->
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
        <div class="main-content flex-grow-1 p-4" style="background: #fff9d5">

            <!-- JUDUL INFORMASI MEDIA (SESUAI) -->
            <div class="info-media-header">
                <h1>INFORMASI MEDIA</h1>
            </div>

            <!-- WRAPPER -->
            <div class="dashboard-wrapper p-4" style="background: #fff9d5; border-radius: 15px; padding: 25px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.20);">

                <!-- Kotak div untuk judul dan penjelasan -->
                <div class="media-info-box">
                    <h1 class="title">Tentang EduMatrix</h1>
                    <p class="explanation">
                        EduMatrix adalah aplikasi pembelajaran interaktif yang dirancang untuk membantu siswa memahami materi Matriks dengan cara yang lebih mudah dan menarik. Aplikasi ini menyediakan materi, contoh soal, latihan interaktif, serta fitur tambahan seperti leaderboard, chat, dan notifikasi untuk meningkatkan motivasi belajar. Dengan antarmuka yang sederhana dan ramah pengguna, aplikasi ini dapat digunakan sebagai pendamping belajar di kelas maupun secara mandiri.
                    </p>
                    <h2 class="sub-title">Tujuan Pengembangan</h2>
                    <ul class="goals">
                        <li>Membantu mempermudah memahami konsep matriks</li>
                        <li>Memvisualisasikan operasi matriks</li>
                        <li>Menyediakan latihan soal</li>
                        <li>Media pendamping belajar mandiri</li>
                    </ul>
                </div>

                <!-- Kotak div kedua untuk Biodata Pengembang dan Kontak -->
                <div class="developer-info-box">
                    <h2 class="title">Biodata Pengembang</h2>

                    <!-- Foto Pengembang di tengah -->
                    <div class="profile-photo-container">
                        <img src="{{ asset('img/pas_foto_sarah.jpeg') }}" alt="Foto Pengembang" class="profile-photo">
                    </div>

                    <!-- Biodata Pengembang -->
                    <div class="bio-details">
                        <p><strong>Nama:</strong> Siti Nur Sarah</p>
                        <p><strong>NIM:</strong> 2210131120002</p>
                        <p><strong>Jurusan:</strong> Pendidikan Komputer</p>
                        <p><strong>Fakultas:</strong> Fakultas Keguruan dan Ilmu Pendidikan</p>
                        <p><strong>Universitas:</strong> Universitas Lambung Mangkurat</p>
                        <p><strong>Tahun Pengembangan:</strong> 2025 - 2026</p>
                        <p><strong>Motivasi Pengembangan:</strong> Mengembangkan aplikasi ini untuk membantu siswa memahami konsep matriks dengan lebih mudah dan interaktif.</p>
                    </div>

                    <br><br>
                    <!-- Kontak dengan ikon -->
                    <div class="contact">
                        <h3>Kontak</h3>
                        <div class="contact-details">
                            <a href="mailto:snursarah1@gmail.com" class="contact-icon email">
                                <i class="fas fa-envelope"></i>
                            </a>
                            <a href="https://wa.me/6282150133944" class="contact-icon wa">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://instagram.com/stnr.sarah" class="contact-icon ig">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div> <!-- END WRAPPER -->


        <!-- TOMBOL KEMBALI -->
        <a href="{{ url()->previous() }}" class="btn-kembali">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        </div> <!-- END MAIN CONTENT -->
    </div>

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script> -->

    <!-- JavaScript untuk toggle sidebar -->
    <!-- <script>
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

        
    </script> -->

</body>
</html>
