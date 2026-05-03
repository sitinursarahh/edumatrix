<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Pembelajaran Matriks</title>

    <!-- Bootstrap -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    >

    <style>
        :root {
            --c1: #9A3F3F; /* merah tua */
            --c2: #C1856D; /* coklat muda */
            --c3: #E6CFA9; /* pastel kuning */
            --c4: #FBF9D1; /* pastel krem */
        }

        body {
            background: var(--c4);
        }

        /* Box besar di hero */
        .gambar-box {
            background: var(--c3);
            border: 2px dashed var(--c2);
            border-radius: 15px;
            height: 330px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        /* Box fitur */
        .fitur-box {
            background: var(--c3);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease, background-color 0.2s ease, box-shadow 0.2s ease;
        }

        .fitur-gambar {
            background: var(--c4);
            border: 1px dashed var(--c2);
            border-radius: 8px;
            height: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-bottom: 15px;
        }

        .fitur-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        /* Hover Efek */
        .fitur-link:hover .fitur-box {
            cursor: pointer;
            transform: scale(1.03);
            background-color: var(--c2);
            box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        }

        .fitur-link:hover p {
            color: #fff;
        }

        .btn-belajar:hover {
            background: var(--c2) !important;
            color: white !important;
            transform: scale(1.05);
            transition: 0.2s ease;
        }

        .my-6 {
    margin-top: 3rem !important;
    margin-bottom: 3rem !important;
}

/* ===== SPACING SECTION GLOBAL ===== */
.section-spaced {
    margin-top: 3rem;
    margin-bottom: 3rem;
}

/* isi section lebih lega */
.section-inner {
    padding-top: 2.5rem;
    padding-bottom: 2.5rem;
}

/* ===== HR CUSTOM ===== */
.hr-custom {
    width: 90%;          /* atur panjang garis */
    margin: 4rem auto;   /* jarak atas & bawah + center */
    border: none;
    height: 2px;
    background-color: var(--c2); /* warna selaras tema */
    border-radius: 2px;
}

.footer-fixed {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: var(--c1);
    color: white;
    z-index: 1000;
}

/* ANIMASI MENGAMBANG */
/* ANIMASI FLOAT HALUS (tanpa patah) */
@keyframes floatSmooth {
    0% {
        transform: translateY(-12px);
    }
    50% {
        transform: translateY(12px);
    }
    100% {
        transform: translateY(-12px);
    }
}

.hero-img {
    animation: floatSmooth 5s ease-in-out infinite;
    will-change: transform; /* biar render lebih halus */
}
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark sticky-top" style="background: var(--c1);">
    <div class="container-fluid px-4 d-flex justify-content-between align-items-center">

        <!-- Logo + Judul -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logo.png') }}"
                 alt="Logo"
                 style="height: 60px; width: 60px; object-fit: cover; margin-right: 12px;">

            <span class="navbar-brand mb-0 h1">EduMatrix</span>
        </div>

        <!-- Tombol Login & Signup -->
        <div class="d-flex gap-2">
    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login dan Sign Up</a>
    <!-- <a href="{{ route('register') }}" class="btn btn-light btn-sm" style="color: var(--c1);">Sign Up</a> -->
</div>
    </div>
</nav>


<!-- HERO SECTION -->
<div class="container my-6 py-5">
    <div class="row g-4 align-items-center">  <!-- Tambahkan align-items-center -->
        <div class="col-md-6">
    <div class="gambar-box">
        <img src="{{ asset('img/hero_section.png') }}"
             alt="Gambar Animasi"
             class="hero-img"
             style="width: 100%; height: 100%; object-fit: cover;">
    </div>
</div>

        <div class="col-md-6 d-flex align-items-center">  <!-- Tambahkan d-flex align-items-center untuk centering -->
            <div>
                <h2 style="color: var(--c1); font-weight:bold;">Media Pembelajaran Matriks</h2>
                <p>
                    Mudah, interaktif, dan menyenangkan untuk memahami operasi matriks
                    seperti penjumlahan, pengurangan, perkalian, determinan, hingga invers matriks.
                </p>
                <!-- Tombol Mulai Belajar -->
                <a href="/login" class="btn btn-belajar"
                style="background: var(--c1); color: white; padding: 10px 22px; border-radius: 8px; font-weight: bold;">
                Mulai Belajar
                </a>
            </div>
        </div>
    </div>
</div>


<hr class="hr-custom">

<!-- FITUR FITUR -->
<div class="container section-spaced">
    <div class="section-inner">

    <h3 class="text-center mb-4" style="color: var(--c1);">Fitur - Fitur</h3>

    <div class="row g-4">

        <!-- Materi Interaktif -->
        <div class="col-md-4">
            <a class="fitur-link">
                <div class="fitur-box">
                    <div class="fitur-gambar">
                        <!-- Masukkan gambar materi -->
                        <img src="{{ asset('img/logo_materi.png') }}"
                             alt="Materi"
                             style="width: 100%; height: 100%; object-fit: contain;">
                    </div>

                    <p>Materi Interaktif</p>
                </div>
            </a>
        </div>

        <!-- Chat -->
        <div class="col-md-4">
            <a class="fitur-link">
                <div class="fitur-box">
                    <div class="fitur-gambar">
                        <!-- Masukkan gambar latihan -->
                        <img src="{{ asset('img/chattt.png') }}"
                             alt="Latihan"
                             style="width: 100%; height: 100%; object-fit: contain;">
                    </div>

                    <p>Chat</p>
                </div>
            </a>
        </div>
        

        <!-- Leaderboard -->
        <div class="col-md-4">
            <a class="fitur-link">
                <div class="fitur-box">
                    <div class="fitur-gambar">
                        <!-- Masukkan gambar kuis -->
                        <img src="{{ asset('img/leaderboard_biru.png') }}"
                             alt="Kuis"
                             style="width: 100%; height: 100%; object-fit: contain;">
                    </div>

                    <p>Leaderboard</p>
                </div>
            </a>
        </div>

    </div>
</div>
</div>

<hr class="hr-custom">

<!-- CAPAIAN & TUJUAN PEMBELAJARAN -->
<div class="container section-spaced">
    <div class="section-inner">

    <h3 class="text-center mb-4" style="color: var(--c1);">Capaian & Tujuan Pembelajaran</h3>

    <!-- Capaian Pembelajaran -->
    <div class="mb-4 p-4" style="background: var(--c3); border-radius: 10px;">
        <h5 style="color: var(--c1); font-weight: bold;">Capaian Pembelajaran</h5>
        <p class="mt-2">
            Di akhir fase F, peserta didik dapat menyatakan data dalam bentuk matriks.
        </p>
    </div>

    <!-- Tujuan Pembelajaran -->
    <div class="p-4" style="background: var(--c3); border-radius: 10px;">
        <h5 style="color: var(--c1); font-weight: bold;">Tujuan Pembelajaran</h5>
        <ol class="mt-2">
            <li>Peserta didik mampu menjelaskan pengertian matriks melalui contoh yang diberikan dengan benar.</li>
            <li>Peserta didik mampu mengidentifikasi matriks berdasarkan ordo dan susunan elemennya dari matriks yang disajikan dengan tepat.</li>
            <li>Peserta didik mampu menyajikan data ke dalam bentuk matriks dalam kehidupan sehari-hari berdasarkan informasi yang diberikan secara benar.</li>
            <li>Peserta didik mampu membedakan jenis-jenis matriks melalui kegiatan pembelajaran dengan tepat.</li>
            <li>Peserta didik mampu menentukan matriks transpos dari matriks yang diberikan dengan benar.</li>
            <li>Peserta didik mampu menyelesaikan masalah yang berkaitan dengan kesamaan dua matriks berdasarkan informasi yang diberikan dengan benar.</li>
            <li>Peserta didik mampu menjelaskan dan melakukan operasi penjumlahan serta pengurangan dua matriks pada matriks yang diberikan dengan benar.</li>
            <li>Peserta didik mampu menjelaskan dan melakukan operasi perkalian skalar dengan matriks serta perkalian dua matriks diberikan dengan benar. </li>
            <li>Peserta didik mampu menentukan determinan matriks berordo 2 × 2 dan 3 × 3 melalui pemberian soal dan contoh matriks dengan benar. </li>
            <li>Peserta didik mampu menentukan invers matriks melalui latihan soal dan bimbingan langkah penyelesaian dengan tepat.</li>
        </ol>
    </div>
</div>
</div>

<!-- <hr class="hr-custom"> -->


<!-- FOOTER -->
<footer class="footer-fixed text-center py-3">
    © Siti Nur Sarah 2026 — Media Pembelajaran Interaktif Matriks
</footer>

</body>
</html>
