<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Materi Pengenalan Matriks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Diagram -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/materi_pengertian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://unpkg.com/mathlive"></script>
    <link rel="stylesheet" href="https://unpkg.com/mathlive/dist/mathlive.core.css">
    <link rel="stylesheet" href="https://unpkg.com/mathlive/dist/mathlive.css">
</head>
<style>

</style>
<body>

{{-- ================= NAVBAR ================= --}}
@include('layouts.header')

<div class="d-flex">

    {{-- ================= SIDEBAR ================= --}}
    @include('layouts.sidebar_materi')

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="main-content flex-grow-1 p-4">
        <!-- <section id="pengertian-matriks" class="page-section"> -->
        <!-- <div class="pengenalan-matriks-header">
            <h1>PENGENALAN MATRIKS</h1>
        </div> -->

        {{-- ================= WRAPPER UTAMA ================= --}}
        <div class="dashboard-wrapper p-4">

            {{-- =================================================
                 SECTION: PENGERTIAN MATRIKS
            ================================================= --}}
            <!-- <section id="pengertian-matriks" class="page-section"> -->
            <section class="materi-slide active" data-section="pengertian-matriks">

                <div class="pengenalan-matriks-header">
                    
                    <h1>PENGENALAN MATRIKS</h1>
                </div>

                {{-- Tujuan Pembelajaran --}}
                <div class="tujuan-box">
                    <h3 class="tujuan-title">Tujuan Pembelajaran</h3>
                    <ol class="tujuan-list">
                        <li>Peserta didik mampu menjelaskan pengertian matriks melalui contoh yang diberikan dengan benar.</li>
                        <li>Peserta didik mampu mengidentifikasi matriks berdasarkan ordo dan susunan elemennya dari matriks yang disajikan dengan tepat.</li>
                        <li>Peserta didik mampu menyajikan data ke dalam bentuk matriks dalam kehidupan sehari-hari berdasarkan informasi yang diberikan secara benar.</li>
                    </ol>
                </div>

                {{-- Judul Materi --}}
                <h2 class="materi-title">1. Pengertian Matriks</h2>

                {{-- ================= PERTANYAAN PEMANTIK ================= --}}
                <div class="tujuan-box mt-4" id="pertanyaan-pemantik">
                    <h3 class="tujuan-title">Jawablah pertanyaan di bawah ini</h3>
                    <div class="pemantik-wrapper">
    
    <!-- KIRI (TEKS) -->
    <div class="pemantik-text">
        <p>Perhatikan data berikut.</p>

        <p style="margin-left: 20px;">
            <em>
                "Kelas XA memiliki jumlah siswa perempuan 21 dan siswa laki-laki 14,
                sedangkan di kelas XB memiliki jumlah siswa perempuan 19 dan siswa laki-laki 16."
            </em>
        </p>

        <p>
            Jika kita memiliki data jumlah siswa laki-laki dan perempuan di setiap kelas,
            bagaimana cara menyajikannya agar mudah dibaca dan dibandingkan?
        </p>
        
        <div class="mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pemantik" id="opsiParagraf" value="paragraf">
                            <label class="form-check-label" for="opsiParagraf">
                                Paragraf
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pemantik" id="opsiTabel" value="tabel">
                            <label class="form-check-label" for="opsiTabel">
                                Tabel baris dan kolom
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pemantik" id="opsiGambar" value="gambar">
                            <label class="form-check-label" for="opsiGambar">
                                Gambar
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pemantik" id="opsiDiagram" value="diagram">
                            <label class="form-check-label" for="opsiDiagram">
                                Diagram
                            </label>
                        </div>
                    </div>
    </div>

    <!-- KANAN (GAMBAR) -->
    <div class="pemantik-image">
        <img src="{{ asset('img/kelas_matriks.jpg') }}" alt="Ilustrasi">
        <p class="image-caption">Gambar 1. Susunan Siswa di Kelas</p>
    </div>

</div>
                   

                    <div id="feedback-pemantik" class="tujuan-box mt-3" style="display:none;">
                        <strong>Umpan Balik:</strong>
                        <p id="feedback-text" style="margin-top:8px; margin-bottom:0;"></p>
                    </div>

                </div>
                <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
</div>


                </section>
                {{-- ================= END PERTANYAAN PEMANTIK ================= --}}


                <section class="materi-slide" data-section="pengertian-matriks">
                {{-- Gambar Arthur Cayley --}}
                <div class="cayley-wrapper">

    <!-- KIRI (GAMBAR) -->
    <div class="cayley-image">
        <img src="{{ asset('img/Arthur_cayley.jpg') }}" alt="Arthur Cayley">
        <p class="image-caption">Gambar 2. Arthur Cayley</p>
    </div>

    <!-- KANAN (TEKS) -->
    <div class="cayley-text">
        <p class="paragraf-indent">
            Arthur Cayley lahir di Inggris pada 16 Agustus 1821. Ia awalnya menempuh pendidikan di bidang hukum dan sempat
                        berprofesi sebagai pengacara. Namun, pada usia 17 tahun, tepatnya pada tahun 1859, Cayley berhasil memperkenalkan
                        konsep matriks. Gagasan mengenai matriks pertama kali dikemukakan oleh Arthur Cayley (1821–1895) di Inggris melalui
                        penelitiannya tentang sistem persamaan linear dan transformasi linear. Pada awalnya, matriks hanya dianggap sebagai
                        permainan matematika karena belum memiliki penerapan nyata. Baru pada tahun 1925, sekitar 30 tahun setelah Cayley wafat,
                        konsep matriks mulai digunakan dalam bidang mekanika kuantum. Sejak saat itu, matriks berkembang pesat dan diterapkan
                        dalam berbagai disiplin ilmu.
        </p>
    </div>

</div>
                
                    <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
</div>


                    </section>

                    
                <section class="materi-slide" data-section="pengertian-matriks">
                    

                <!-- </div> -->

                {{-- Gambar Rak Telur --}}

                <div class="cayley-wrapper">

    <!-- KIRI (GAMBAR) -->
    <div class="cayley-image">
        <img src="{{ asset('img/telur22.jpg') }}" alt="Rak Telur">
        <p class="image-caption">Gambar 3. Telur</p>
    </div>

    <!-- KANAN (TEKS) -->
    <div class="cayley-text">
        <p class="paragraf-indent">
                        Coba kamu perhatikan susunan benda-benda di sekitar kamu! Sebagai contoh, susunan kursi di ruang kelas, kursi di
                        dalam bioskop, posisi siswa berbaris di lapangan, susunan keramik lantai, dan lain-lain. Disamping ini
                        adalah contoh rak telur yang merepresentasikan matriks.
                        Kamu tentu dapat melihat bahwa susunan-susunan tersebut membentuk pola baris dan kolom. Susunan dalam bentuk
                        baris dan kolom inilah yang menjadi dasar dari konsep matriks yang akan kita pelajari.
        </p>
        <p class="paragraf-indent">
                        Dalam matematika <strong>Matriks merupakan susunan bilangan atau fungsi yang disajikan dalam baris dan
                        kolom serta diapit oleh dua tanda kurung siku.</strong> Bilangan atau fungsi yang terdapat di dalam matriks disebut sebagai
                        entri atau elemen matriks. Penamaan matriks biasanya menggunakan huruf kapital dari \( A \) sampai \( Z \), sedangkan elemen-elemennya dinyatakan
                        dengan huruf kecil. Secara umum, matriks berfungsi sebagai alat yang sangat efektif untuk menyelesaikan berbagai
                        permasalahan. Dengan menggunakan matriks, kita dapat lebih mudah melakukan analisis yang melibatkan hubungan antar
                        variabel dalam suatu persoalan.
        </p>



    </div>

</div>
                
                <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
</div>


                </section>
                <section class="materi-slide" data-section="pengertian-matriks">
                    <p>Berikut ini merupakan salah satu contoh persoalan yang dapat diselesaikan dengan matriks.</p>


                {{-- Contoh Soal --}}
                <div class="box_contoh_soal">
                    Ataya ingin membeli alat tulis untuk persiapan sekolah. Di toko I tersedia 10 pensil dan 6 penghapus, di toko II
                    terdapat 8 pensil dan 9 penghapus, sedangkan di toko III ada 12 pensil dan 5 penghapus. Susunlah dalam tabel agar
                    memudahkan Ataya mengetahui jumlah pensil dan penghapus di setiap toko.
                </div>

                {{-- Tabel --}}
                <p class="alternatif_penyelesaian">Alternatif Penyelesaian :</p>

                <div class="matrix-convert-wrapper">

    <!-- KIRI: TABEL -->
    <div class="matrix-left">

    <div class="table-responsive-materi">
        <table class="tabel-matriks tabel-matriks-kiri">
            <tr>
                <th>Toko</th>
                <th>Pensil</th>
                <th>Penghapus</th>
            </tr>
            <tr>
                <td>I</td>
                <td>10</td>
                <td>6</td>
            </tr>
            <tr>
                <td>II</td>
                <td>8</td>
                <td>9</td>
            </tr>
            <tr>
                <td>III</td>
                <td>12</td>
                <td>5</td>
            </tr>
        </table>
    </div>

    <p class="image-caption">Tabel 1.1 Toko Alat Tulis</p>



    </div>

    <!-- KANAN: PENJELASAN + MATRIKS -->
    <div class="matrix-right">

        <p>
            Jika data pada tabel tersebut kita ambil angkanya lalu kita tuliskan di dalam tanda kurung,
            maka susunannya akan tampak lebih ringkas. Bentuk susunan seperti inilah yang disebut sebagai 
            <b><i>matriks</i></b> seperti di bawah ini.
        </p>

        <div class="math-matrix">
            \[
            A =
            \begin{bmatrix}
            10 & 6 \\
            8 & 9 \\
            12 & 5
            \end{bmatrix}
            \]
        </div>

    </div>

</div>
                <p> Matriks \( A \) di atas merupakan susunan data jumlah alat tulis dalam bentuk matriks, di mana setiap elemen matriks tersusun
                    berdasarkan baris dan kolom. Baris pertama, kedua, dan ketiga berturut-turut menyatakan data Toko I, Toko II, dan Toko III.
                    Sementara itu, kolom pertama menyatakan jumlah pensil dan kolom kedua menyatakan jumlah penghapus. Dengan demikian, matriks
                    \(A\) merupakan matriks berordo 3 × 2 yang menunjukkan bahwa matriks tersebut memiliki tiga baris dan dua kolom. Data tersebut
                    disajikan dalam bentuk matriks karena untuk keperluan komputasi, pengolahan data akan lebih mudah dilakukan menggunakan representasi matriks.</p>

                <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
</div>

            </section>
            {{-- ================= END PENGERTIAN ================= --}}


            {{-- =================================================
                 SECTION: MARI MENCOBA
            ================================================= --}}
            <!-- <section id="mari-mencoba" class="page-section"> -->
                <section class="materi-slide" data-section="mari-mencoba">

                <!-- <hr> -->
                <br>
                <div class="quiz-wrapper">
                    <div class="quiz-container">
                        <div class="quiz-header">
                            Mari Mencoba <i class="bi bi-pen"></i>
                        </div>

                        <!-- ===== PROGRESS QUIZ ===== -->
                        <div class="quiz-progress-wrapper">
                            <div class="quiz-progress-bar">
                                <div class="quiz-progress-fill" id="quizProgressFill"></div>

                                <!-- ⭐ BINTANG -->
                                <div class="quiz-progress-star" id="quizProgressStar">⭐</div>
                            </div>

                            <div class="quiz-progress-text">
                            Soal <span id="currentQuestion">1</span> dari <span id="totalQuestion">3</span>
                        </div>
                        </div>


                        <div class="quiz-question"></div>

                        <div class="quiz-buttons">
                            <button type="button" id="btn-periksa">Periksa Jawaban</button>
                            <button type="button" id="btn-reset">Reset Jawaban</button>
                        </div>

                        <div class="quiz-nav">
                            <button type="button" id="btn-prev">
                                <i class="bi bi-arrow-left me-2"></i>Sebelumnya
                            </button>
                            <button type="button" id="btn-next">
                                Berikutnya <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>

                        <p id="hasil-jawaban"></p>
                    </div>
                </div>
                <br>

                <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="mari-mencoba-1"
    data-allowed="{{ in_array('mari-mencoba-1', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
</div>
                <!-- <hr> -->
            </section>
            {{-- ================= END MARI MENCOBA ================= --}}

            {{-- ================= PARAGRAF PENUTUP ================= --}}
            <!-- <section id="baris-kolom-matriks" class="page-section"> -->
            <section class="materi-slide" data-section="baris-kolom-matriks">

            <!-- <hr> -->
            
            <h2 class="materi-title">2. Baris dan Kolom Matriks</h2>
            <p class="paragraf-indent">
                Deretan angka yang tersusun secara mendatar (horizontal) disebut
                <strong>baris</strong>, sedangkan deretan angka yang tersusun secara tegak (vertikal) disebut
                <strong>kolom</strong>.
                Secara umum matriks dituliskan seperti di bawah ini :
            </p>

            <div class="math-matrix">
            $$
            A_{mn} = [a_{ij}]_{m \times n}
            =
            \begin{bmatrix}
            a_{11} & a_{1j} & \cdots & a_{1n} \\
            a_{21} & a_{2j} & \cdots & a_{2n} \\
            a_{i1} & a_{ij} & \cdots & a_{in} \\
            a_{m1} & a_{mj} & \cdots & a_{mn}
            \end{bmatrix}
            $$
            </div>

            <p><strong>Dengan keterangan:</strong></p>
                <ul>
                    <li>\(m\) = banyak baris</li>
                    <li>\(n\) = banyak kolom</li>
                    <li>\(i\) = 1, 2, ..., \(m\)</li>
                    <li>\(j\) = 1, 2, ..., \(n\)</li>
                </ul>

            <p>
                Perlu diperhatikan bahwa setiap elemen pada matriks \(A\) memiliki dua indeks. Misalnya, 𝑎₁₁ menunjukkan
                elemen matriks \(A\) yang terletak pada baris pertama dan kolom pertama. Demikian pula, elemen dengan indeks
                𝑎ₘₙ menandakan posisi elemen pada baris ke-m dan kolom ke-n. Ordo matriks  merupakan banyaknya baris dan
                kolom yang menentukan ukuran matriks.
            </p>
            <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
</div>
            </section>
            
            <section class="materi-slide" data-section="baris-kolom-matriks">
            <p><strong>Contoh 1:</strong></p>
            <p>Perhatikan matriks di bawah ini</p>
            <div class="math-matrix">
                \[
                C =
                \begin{bmatrix}
                2 & 4 & 6 & 8 & 10 \\
                1 & 3 & 5 & 7 & 9 \\
                0 & 2 & 4 & 6 & 8
                \end{bmatrix}
                 \]
            </div>
            <br>

            <!-- ================= SOAL BARIS ================= -->
<!-- ================= SOAL BARIS ================= -->
<div class="quiz-wrapper">
    <div class="quiz-container">
        <div class="quiz-header">
            Ayo Kita Coba
        </div>
        <br>

        <div class="quiz-question">
            Berapa banyak baris pada matriks \(C\)?
        </div>

        <div class="quiz-question">
            Jawab:
        </div>

        <!-- INPUT KECIL -->
        <input
            type="number"
            id="answer-row"
            class="quiz-input small"
            placeholder="..."
        >

        <!-- TOMBOL DISAMAKAN -->
        <div class="quiz-buttons">
            <button type="button" onclick="checkRow()">
                Periksa Jawaban
            </button>
        </div>

        <div id="feedback-row"></div>
    </div>
</div>



<!-- ================= ANIMASI BARIS (ASLI KAMU) ================= -->
<div id="row-animation" class="hidden">

<div class="matrix-tutorial-stack">

    <div class="matrix-tutorial-box row-tutorial" data-type="row">
        <div class="matrix-frame">
            <span class="matrix-label">\( C = \)</span>
            <span class="math-bracket">\( \left[ \right. \)</span>

            <table class="matrix-html">
                <tr><td>2</td><td>4</td><td>6</td><td>8</td><td>10</td></tr>
                <tr><td>1</td><td>3</td><td>5</td><td>7</td><td>9</td></tr>
                <tr><td>0</td><td>2</td><td>4</td><td>6</td><td>8</td></tr>
            </table>

            <span class="math-bracket">\( \left. \right] \)</span>
        </div>
        <div class="row-info">Baris ke-</div>
    </div>

</div>
</div>
<div id="row-repeat" class="quiz-buttons hidden">
    <button type="button" onclick="restartRowTutorial()">
        🔁 Ulangi Animasi Baris
    </button>
</div>
<div id="row-repeat-msg" class="repeat-msg"></div>


<!-- ================= SOAL KOLOM (MUNCUL SETELAH BARIS BENAR) ================= -->
<div id="column-question" class="hidden">

    <div class="quiz-wrapper">
        <div class="quiz-container">
            <div class="quiz-header">
                Ayo Kita Coba
            </div>
            <br>

            <div class="quiz-question">
                Berapa banyak kolom pada matriks \(C\)?
            </div>

            <div class="quiz-question">
                Jawab:
            </div>

            <!-- INPUT KECIL (SAMA) -->
            <input
                type="number"
                id="answer-col"
                class="quiz-input small"
                placeholder="..."
            >

            <!-- TOMBOL SAMA -->
            <div class="quiz-buttons">
                <button type="button" onclick="checkCol()">
                    Periksa Jawaban
                </button>
            </div>

            <div id="feedback-col"></div>
        </div>
    </div>

</div>


<!-- ================= ANIMASI KOLOM (ASLI KAMU) ================= -->
<div id="col-animation" class="hidden">

<div class="matrix-tutorial-stack">

    <div class="matrix-tutorial-box column-tutorial" data-type="col" data-cols="5">
        <div class="matrix-frame">
            <span class="matrix-label">\( C = \)</span>
            <span class="math-bracket">\( \left[ \right. \)</span>

            <table class="matrix-html">
                <tr>
                    <td data-col="1">2</td><td data-col="2">4</td><td data-col="3">6</td><td data-col="4">8</td><td data-col="5">10</td>
                </tr>
                <tr>
                    <td data-col="1">1</td><td data-col="2">3</td><td data-col="3">5</td><td data-col="4">7</td><td data-col="5">9</td>
                </tr>
                <tr>
                    <td data-col="1">0</td><td data-col="2">2</td><td data-col="3">4</td><td data-col="4">6</td><td data-col="5">8</td>
                </tr>
            </table>

            <span class="math-bracket">\( \left. \right] \)</span>
        </div>
        <div class="row-info">Kolom ke-</div>
    </div>

</div>
</div>
<div id="col-repeat" class="quiz-buttons hidden">
    <button type="button" onclick="restartColTutorial()">
        🔁 Ulangi Animasi Kolom
    </button>
</div>
<div id="col-repeat-msg" class="repeat-msg"></div>
<br>



            <p>
                Matriks  \(C\) di atas memiliki <strong>ordo 3 × 5</strong> karena barisnya ada 3 dan kolomnya ada 5, elemen-elemennya adalah sebagai berikut:
            </p>

            <div class="elemen-matriks-box">
    <ul>
        <li>\( c_{11} = 2 \)</li>
        <li>\( c_{21} = 1 \)</li>
        <li>\( c_{31} = 0 \)</li>
    </ul>

    <ul>
        <li>\( c_{12} = 4 \)</li>
        <li>\( c_{22} = 3 \)</li>
        <li>\( c_{32} = 2 \)</li>
    </ul>

    <ul>
        <li>\( c_{13} = 6 \)</li>
        <li>\( c_{23} = 5 \)</li>
        <li>\( c_{33} = 4 \)</li>
    </ul>

    <ul>
        <li>\( c_{14} = 8 \)</li>
        <li>\( c_{24} = 7 \)</li>
        <li>\( c_{34} = 6 \)</li>
    </ul>

    <ul>
        <li>\( c_{15} = 10 \)</li>
        <li>\( c_{25} = 9 \)</li>
        <li>\( c_{35} = 8 \)</li>
    </ul>
</div>

            <!-- ================= MATRIKS INTERAKTIF ================= -->
<div class="matrix-interactive-wrapper">
    <br>
    <p class="matrix-instruction">
        Klik salah satu elemen matriks di bawah ini
    </p>

    <div class="matrix-hybrid-box">

        <div class="matrix-frame">
            <span class="matrix-label">\( C = \)</span>
            <span class="math-bracket">\( \left[ \right. \)</span>

            <table class="matrix-interactive" data-matrix-name="c">
                <tr>
                    <td data-i="1" data-j="1">2</td>
                    <td data-i="1" data-j="2">4</td>
                    <td data-i="1" data-j="3">6</td>
                    <td data-i="1" data-j="4">8</td>
                    <td data-i="1" data-j="5">10</td>
                </tr>
                <tr>
                    <td data-i="2" data-j="1">1</td>
                    <td data-i="2" data-j="2">3</td>
                    <td data-i="2" data-j="3">5</td>
                    <td data-i="2" data-j="4">7</td>
                    <td data-i="2" data-j="5">9</td>
                </tr>
                <tr>
                    <td data-i="3" data-j="1">0</td>
                    <td data-i="3" data-j="2">2</td>
                    <td data-i="3" data-j="3">4</td>
                    <td data-i="3" data-j="4">6</td>
                    <td data-i="3" data-j="5">8</td>
                </tr>
            </table>

            <span class="math-bracket">\( \left. \right] \)</span>
        </div>

        <div class="matrix-info">
            Baris ke- , Kolom ke-
        </div>
    </div>
</div>
<br>


            <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="ayo-kita-coba-7"
    data-allowed="{{ in_array('ayo-kita-coba-7', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
</div>
            </section>

            <section class="materi-slide" data-section="baris-kolom-matriks">
            <p><strong>Contoh 2:</strong></p>

            <p class="paragraf-indent">
                Data jumlah perguruan tinggi di bawah Kementerian Riset, Teknologi, dan Pendidikan Tinggi yang mencakup perguruan
                tinggi negeri dan swasta diperoleh dari laman resmi Badan Pusat Statistik (BPS). Data tersebut menggambarkan jumlah
                perguruan tinggi di Provinsi Kalimantan Selatan, Jawa Timur, dan Yogyakarta selama tiga tahun pengamatan, yaitu tahun 2025, 2024, dan 2023
                seperti diagram di bawah ini.
            </p>
            <p style="text-align: center;">
                Klik di batangnya untuk mengetahui informasi nilai data
            </p>
            <br>

            <div class="chart-container" style="max-width:700px; margin: 20px auto;">
                <canvas id="ptChart"></canvas>
            </div>

            <!-- <div class="image-container">
                <img src="{{ asset('img/diagram_modul_skripsi.png') }}" alt="Diagram Resep Makanan">
            </div> -->
            <p>
Misalkan baris menyatakan tahun 2025, 2024, dan 2023 kemudian kolom
menyatakan provinsi Kalimantan Selatan, Jawa Timur, dan Yogyakarta. Maka data tersebut dapat
ditulis dalam bentuk data seperti di bawah ini:
</p>
<div class="table-responsive-matrix">
<table class="tabel-data-matriks">

<tr>
    <th>Tahun/Provinsi</th>
    <th>Kalimantan Selatan</th>
    <th>Jawa Timur</th>
    <th>Yogyakarta</th>
</tr>

<tr>
    <td>2025</td>
    <td>50</td>
    <td>335</td>
    <td>106</td>
</tr>

<tr>
    <td>2024</td>
    <td>54</td>
    <td>344</td>
    <td>105</td>
</tr>

<tr>
    <td>2023</td>
    <td>50</td>
    <td>334</td>
    <td>108</td>
</tr>

</table>
</div>
<p>
Kemudian di bentuk menjadi matriks \(A\) seperti di bawah ini :
</p>

<div class="math-matrix">
$$
A =
\begin{bmatrix}
50 & 335 & 106 \\
54 & 344 & 105 \\
50 & 334 & 108
\end{bmatrix}
$$
</div>


<!-- ================= SOAL BARIS A ================= -->
<div class="quiz-wrapper">
    <div class="quiz-container">
        <div class="quiz-header">Ayo Kita Coba</div>
        <br>

        <div class="quiz-question">
            Berapa banyak baris pada matriks \(A\)?
        </div>
        <div class="quiz-question">
                Jawab:
            </div>

        <input type="number" id="answer-row-A" class="quiz-input small"  placeholder="...">

        <div class="quiz-buttons">
            <button type="button" onclick="checkRowA()">
                Periksa Jawaban
            </button>
        </div>

        <div id="feedback-row-A"></div>
    </div>
</div>


<!-- ================= ANIMASI BARIS A ================= -->
<div id="row-animation-A" class="hidden">
    <div class="matrix-tutorial-stack">
        <div class="matrix-tutorial-box row-tutorial-A">
            <div class="matrix-frame">
                <span class="matrix-label">\( A = \)</span>
                <span class="math-bracket">\( \left[ \right. \)</span>

                <table class="matrix-html">
                    <tr><td>50</td><td>335</td><td>106</td></tr>
                    <tr><td>54</td><td>344</td><td>105</td></tr>
                    <tr><td>50</td><td>334</td><td>108</td></tr>
                </table>

                <span class="math-bracket">\( \left. \right] \)</span>
            </div>
            <div class="row-info">Baris ke-</div>
        </div>
    </div>
</div>

<div id="row-repeat-A" class="quiz-buttons hidden">
    <button type="button" onclick="restartRowTutorialA()">
        🔁 Ulangi Animasi Baris
    </button>
</div>
<div id="row-repeat-msg-A" class="repeat-msg"></div>


<!-- ================= SOAL KOLOM A ================= -->
<div id="column-question-A" class="hidden">
    <div class="quiz-wrapper">
        <div class="quiz-container">
            <div class="quiz-header">Ayo Kita Coba</div>
            <br>
            <div class="quiz-question">
                Berapa banyak kolom pada matriks \(A\)?
            </div>
            <div class="quiz-question">
                Jawab:
            </div>

            <input type="number" id="answer-col-A" class="quiz-input small"  placeholder="...">

            <div class="quiz-buttons">
                <button type="button" onclick="checkColA()">
                    Periksa Jawaban
                </button>
            </div>

            <div id="feedback-col-A"></div>
        </div>
    </div>
</div>


<!-- ================= ANIMASI KOLOM A ================= -->
<div id="col-animation-A" class="hidden">
    <div class="matrix-tutorial-stack">
        <div class="matrix-tutorial-box column-tutorial-A">
            <div class="matrix-frame">
                <span class="matrix-label">\( A = \)</span>
                <span class="math-bracket">\( \left[ \right. \)</span>

                <table class="matrix-html">
                    <tr><td>50</td><td>335</td><td>106</td></tr>
                    <tr><td>54</td><td>344</td><td>105</td></tr>
                    <tr><td>50</td><td>334</td><td>108</td></tr>
                </table>

                <span class="math-bracket">\( \left. \right] \)</span>
            </div>
            <div class="row-info">Kolom ke-1</div>
        </div>
    </div>
</div>

<div id="col-repeat-A" class="quiz-buttons hidden">
    <button type="button" onclick="restartColTutorialA()">
        🔁 Ulangi Animasi Kolom
    </button>
</div>
<div id="col-repeat-msg-A" class="repeat-msg"></div>

            <br>

            

            <p>
                Baris pada matriks \(A\) menyatakan data pada tahun 2025, 2024, dan 2023. Sedangkan kolom pada matriks \(A\) menyatakan informasi
                jumlah Perguruan Tinggi Negeri dan Swasta di Provinsi Kalimantan Selatan, Jawa Timur, dan Yogyakarta. Matriks \( A \) memiliki baris 3 dan kolom 3, sehingga ordo matriks \( A \) = 3 × 3. 
            </p>

            <!-- ================= SOAL ISI ELEMEN A ================= -->
<!-- ================= SOAL ISI ELEMEN A ================= -->
<div id="matrix-fill-A">

    <div class="quiz-wrapper">
        <div class="quiz-container">

            <div class="quiz-header">
                Ayo Kita Coba
            </div>
            <br>

            <div class="quiz-question">
                Isilah kotak yang kosong dengan jawaban yang sesuai berdasarkan nilai elemen atau posisi pada matriks \( A \) di atas!
            </div>

            <div class="quiz-question">
                Jawab:
            </div>

            <div class="matrix-fill-grid">

                <!-- a11 = [83] -->
                <div class="fill-item">
                    • <span class="matrix-index">\( a_{11} \)</span> =
                    <input type="number" id="val-a11" class="quiz-input small"  placeholder="...">
                </div>

                <!-- a12 = [75] -->
                <div class="fill-item">
                    • <span class="matrix-index">\( a_{12} \)</span> =

                    <input type="number" id="val-a12" class="quiz-input small"  placeholder="...">
                </div>

                <!-- a13 sudah diketahui -->
                <div class="fill-item">
                    • <span class="matrix-index">\( a_{13} \)</span> = 106
                </div>

                <!-- [ a21 ] = 89 -->
                <div class="fill-item">
                    •
                    <input type="text" id="idx-89" class="quiz-input small"  placeholder="...">
                    = 54
                </div>

                <!-- [ a22 ] = 76 -->
                <div class="fill-item">
                    •
                    <input type="text" id="idx-76" class="quiz-input small"  placeholder="...">
                    = 344
                </div>

                <!-- a23 = [35] -->
                <div class="fill-item">
                    • <span class="matrix-index">\( a_{23} \)</span> =
                    <input type="number" id="val-a23" class="quiz-input small"  placeholder="...">
                </div>

                <!-- [ a31 ] = 96 -->
                <div class="fill-item">
                    •
                    <input type="text" id="idx-96" class="quiz-input small"  placeholder="...">
                    = 50
                </div>

                <!-- a32 sudah diketahui -->
                <div class="fill-item">
                    • <span class="matrix-index">\( a_{32} \)</span> = 334
                </div>

                <!-- a33 = [41] -->
                <div class="fill-item">
                    • <span class="matrix-index">\( a_{33} \)</span> =

                    <input type="number" id="val-a33" class="quiz-input small"  placeholder="...">
                </div>

            </div>

            <div class="quiz-buttons">
                <button type="button" onclick="checkMatrixA()">
                    Periksa Jawaban
                </button>
            </div>

            <div id="feedback-matrix-A"></div>

        </div>
    </div>

</div>

<!--


            <div class="elemen-matriks-box">
                <ul>
                    <li>a<sub>11</sub> = 83</li>
                    <li>a<sub>21</sub> = 89</li>
                    <li>a<sub>31</sub> = 96</li>
                </ul>

                <ul>
                    <li>a<sub>12</sub> = 75</li>
                    <li>a<sub>22</sub> = 76</li>
                    <li>a<sub>32</sub> = 83</li>
                </ul>

                <ul>
                    <li>a<sub>13</sub> = 36</li>
                    <li>a<sub>23</sub> = 35</li>
                    <li>a<sub>33</sub> = 41</li>
                </ul>
            </div> -->


            <!-- ================= MATRIKS INTERAKTIF ================= -->
            <!-- <div class="matrix-interactive-wrapper">
                <br>
                <p class="matrix-instruction">
                    Klik salah satu elemen matriks di bawah ini
                </p>

                <div class="matrix-hybrid-box">

                    <div class="matrix-frame">
                        <span class="matrix-label">\( A = \)</span>
                        <span class="math-bracket">\( \left[ \right. \)</span>

                        <table class="matrix-interactive">
                            <tr>
                                <td data-i="1" data-j="1">83</td>
                                <td data-i="1" data-j="2">75</td>
                                <td data-i="1" data-j="3">36</td>
                            </tr>
                            <tr>
                                <td data-i="2" data-j="1">89</td>
                                <td data-i="2" data-j="2">76</td>
                                <td data-i="2" data-j="3">35</td>
                            </tr>
                            <tr>
                                <td data-i="3" data-j="1">96</td>
                                <td data-i="3" data-j="2">83</td>
                                <td data-i="3" data-j="3">41</td>
                            </tr>
                        </table>

                        <span class="math-bracket">\( \left. \right] \)</span>
                    </div>

                    <div class="matrix-info" id="matrixInfo">
                        Baris ke- , Kolom ke-
                    </div>
                </div>

            </div> -->
            <br>
            <!-- <hr> -->
            <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="ayo-kita-coba-8"
    data-allowed="{{ in_array('ayo-kita-coba-8', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
</div>
            </section>

            {{-- =================================================
                SECTION: MARI MENCOBA 2
            ================================================= --}}
            <!-- <section id="mari-mencoba-2" class="page-section"> -->
                <section class="materi-slide" data-section="mari-mencoba-2">

                <br>
                <div class="quiz-wrapper">
                    <div class="quiz-container">
                        <div class="quiz-header">
                            Mari Mencoba <i class="bi bi-pen"></i>
                        </div>

                        <!-- ===== PROGRESS QUIZ ===== -->
                        <div class="quiz-progress-wrapper">
                            <div class="quiz-progress-bar">
                                <div class="quiz-progress-fill" id="quizProgressFill-2"></div>
                                <div class="quiz-progress-star" id="quizProgressStar-2">⭐</div>
                            </div>

                            <div class="quiz-progress-text">
                                Soal <span id="currentQuestion-2">1</span> dari <span id="totalQuestion-2">3</span>
                            </div>
                        </div>

                        <div id="sub-soal-label" style="font-weight:600;margin-bottom:8px;"></div>

                        <div class="quiz-question" id="quiz-question-2">
                            <!-- Soal MathJax akan dirender di sini -->
                        </div>

                        <div class="quiz-buttons">
                            <button type="button" id="btn-periksa-2">Periksa Jawaban</button>
                            <button type="button" id="btn-reset-2">Reset Jawaban</button>
                        </div>

                        <div class="quiz-nav">
                            <button type="button" id="btn-prev-2">
                                <i class="bi bi-arrow-left me-2"></i>Sebelumnya
                            </button>

                            <button type="button" id="btn-next-2">
                                Berikutnya <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>



                        <p id="hasil-jawaban-2"></p>
                    </div>
                </div>
                <br>
                <!-- <hr> -->
                <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="mari-mencoba-2"
    data-allowed="{{ in_array('mari-mencoba-ke2', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
</div>
            </section>

            {{-- =================================================
                SECTION: KUIS PENGERTIAN MATRIKS
            ================================================= --}}
            <!-- <section id="kuis-pengertian-matriks" class="page-section"> -->
                <section class="materi-slide" data-section="kuis-pengertian-matriks">

                <div class="quiz-action-wrapper">
                    <p class="refleksi-hint text-center">
                        Silahkan klik tombol di bawah ini
                        untuk mengerjakan kuis agar dapat <strong>melanjutkan ke materi berikutnya</strong> 👇
                    </p>
                    <!-- KARTU KUIS -->
                    <div class="quiz-link-wrapper mb-7">
                        <a href="{{ route('petunjuk.kuis', ['quiz_id' => 1]) }}" class="quiz-link-card">

                            <div class="quiz-link-icon">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <div class="quiz-link-text">
                                Klik di sini untuk mengerjakan Kuis
                            </div>
                        </a>
                    </div>
                    <!-- TOMBOL REFLEKSI -->
                    <!-- <div class="text-center mt-2">
                        <p class="refleksi-hint">
                            Silahkan klik tombol <strong>Refleksi Pembelajaran</strong> di bawah ini
                            untuk menjawab pertanyaan Refleksi Pembelajaran dan <strong>melanjutkan ke materi berikutnya</strong> 👇
                        </p>
                        <a href="/refleksi?materi=pengenalan_matriks&back={{ url()->current() }}"
                        class="btn btn-outline-success px-4">
                            Refleksi Pembelajaran
                        </a>
                    </div> -->
                </div>
                <div class="slide-nav mt-4 text-end">
  <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
  
</div>
            </section>


            <!-- ===== SLIDE INDICATOR ===== -->
            <div class="slide-indicator-wrapper">
                <div class="slide-indicator" id="slideIndicator"></div>
            </div>

        </div>
        {{-- ================= END DASHBOARD WRAPPER ================= --}}

    </div>
</div>

<!-- ================= POPUP MODAL ================= -->
<div id="quizModal" class="quiz-modal hidden">
  <div class="quiz-modal-box">
    <div class="quiz-modal-icon" id="quizModalIcon"></div>
    <div class="quiz-modal-message" id="quizModalMessage"></div>
    <button class="quiz-modal-btn" id="quizModalBtn">OK</button>
  </div>
</div>


<div id="lockedPopup" style="display:none;">
    <div class="popup-content">
        <div class="icon">!</div>
        <h3>Akses Terkunci</h3>
        <p>Selesaikan soal terlebih dahulu ya</p>
        <button onclick="closePopup()">Oke</button>
    </div>
</div>
</body>
</html>

        



    <!-- JavaScript untuk toggle sidebar -->
     <script>
document.addEventListener("DOMContentLoaded", function(){

    function syncSidebarWithSlide(){
        const activeSlide = document.querySelector('.materi-slide.active');
        if(!activeSlide) return;

        const section = activeSlide.dataset.section;
        if(!section) return;

        if(typeof activateSidebarFor === 'function'){
            activateSidebarFor(section);
        }
    }

    // Jalankan saat load
    syncSidebarWithSlide();

    // Jalankan setiap kali slide berubah
    const observer = new MutationObserver(syncSidebarWithSlide);
    document.querySelectorAll('.materi-slide').forEach(slide=>{
        observer.observe(slide, { attributes:true, attributeFilter:['class'] });
    });

});
</script>

    <script>
        // localStorage.removeItem("unlock_pengenalan_matriks");
let maxUnlocked = 0;

        /* SIDEBAR TOGGLE */
        // const sidebar = document.getElementById('sidebar_materi');
        // const content = document.querySelector('.main-content');
        // const toggleSidebar = document.getElementById('sidebarToggle');

        // toggleSidebar.addEventListener('click', () => {
        //     sidebar.classList.toggle('collapsed');
        //     content.classList.toggle('expanded');
        // });

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



    (function(){
  // Helper: buka/close submenu parent dan set active class pada sublink yang cocok
  window.activateSidebarFor = function(sectionId) {
  // clear sublink active
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
    .forEach(a => a.classList.remove('active'));

  // close submenu & reset parent
  document.querySelectorAll('#sidebar_materi .sidebar-submenu')
    .forEach(sm => sm.classList.remove('open'));

  document.querySelectorAll('#sidebar_materi .sidebar-link.has-sub')
    .forEach(btn => {
      btn.classList.remove('active');
      btn.setAttribute('aria-expanded','false');
      const chev = btn.querySelector('.chev i');
      if(chev){
        chev.classList.remove('bi-chevron-up');
        chev.classList.add('bi-chevron-down');
      }
    });

  if(!sectionId) return;

  const matched = document.querySelectorAll(
    `#sidebar_materi .sidebar-sublink[data-section="${sectionId}"]`
  );
  if(!matched.length) return;

  matched.forEach(a => a.classList.add('active'));

  matched.forEach(a => {
    const submenu = a.closest('.sidebar-submenu');
    if(submenu){
      submenu.classList.add('open');
      const parentBtn = document.querySelector(
        `#sidebar_materi .sidebar-link.has-sub[data-target="${submenu.id}"]`
      );
      if(parentBtn){
        parentBtn.classList.add('active');
        parentBtn.setAttribute('aria-expanded','true');
        const chev = parentBtn.querySelector('.chev i');
        if(chev){
          chev.classList.remove('bi-chevron-down');
          chev.classList.add('bi-chevron-up');
        }
      }
    }
  });
};
})();




 // JS PERTANYAAN PEMANTIK //
document.querySelectorAll('input[name="pemantik"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const feedbackBox = document.getElementById('feedback-pemantik');
        const feedbackTextEl = document.getElementById('feedback-text');

        let feedbackText = '';
        let feedbackColor = '#333';

        if (this.value === 'paragraf') {
            feedbackText = `
                Menyajikan data dalam bentuk paragraf memang bisa menjelaskan informasi secara lengkap.
                Namun, jika data semakin banyak, apakah paragraf masih mudah dibandingkan?
                <br><br>
                Untuk kebutuhan perhitungan dan perbandingan, kita memerlukan bentuk penyajian yang lebih terstruktur,
                yaitu <strong>tabel baris dan kolom</strong>, yang dalam matematika dikenal sebagai
                <strong>matriks</strong>.
            `;
            feedbackColor = '#9a3f3f';
        }

        else if (this.value === 'tabel') {
            feedbackText = `
                <strong>Ya, betul! ✅</strong><br>
                Tabel baris dan kolom membuat data lebih rapi, mudah dibaca, dan mudah dibandingkan.
                Susunan seperti inilah yang dalam matematika disebut <strong>matriks</strong>.
            `;
            feedbackColor = '#198754';
        }

        else if (this.value === 'gambar') {
            feedbackText = `
                Gambar bisa membuat data terlihat menarik dan mudah dipahami secara visual.
                Namun, untuk menghitung dan membandingkan data secara tepat,
                kita membutuhkan susunan angka yang rapi dan konsisten.
                <br><br>
                Oleh karena itu, dalam matematika digunakan <strong>matriks</strong>,
                yaitu susunan bilangan dalam baris dan kolom.
            `;
            feedbackColor = '#0d6efd';
        }

        else if (this.value === 'diagram') {
            feedbackText = `
                Diagram dapat membantu melihat perbandingan secara visual.
                Namun, untuk perhitungan yang lebih detail dan sistematis,
                data tetap perlu disusun dalam bentuk baris dan kolom.
                <br><br>
                Bentuk ini dikenal sebagai <strong>matriks</strong>.
            `;
            feedbackColor = '#6f42c1';
        }

        feedbackBox.style.display = 'block';
        feedbackTextEl.style.color = feedbackColor;
        feedbackTextEl.innerHTML = feedbackText;
    });
});





    // <!-- ================= SCRIPT: logic kuis, drag & drop, navigation ================= -->
    
           
        const questions = [
    {
        type: 'radio',
        prompt: '1. Dari 3 pilihan di bawah ini, mana yang merupakan bentuk matriks?',
        options: [
    {
        text: '\\( \\begin{bmatrix} 1 & 2 \\\\ 3 & 4 \\end{bmatrix} \\)',
        value: 'siku'
    },
    {
        text: '\\( \\left\\{ \\begin{matrix} 1 & 2 \\\\ 3 & 4 \\end{matrix} \\right\\} \\)',
        value: 'kurawal'
    },
    {
        text: '\\( \\left| \\begin{matrix} 1 & 2 \\\\ 3 & 4 \\end{matrix} \\right| \\)',
        value: 'mutlak'
    }
],
        correctAnswer: 'siku'
    },
    {
        type: 'dragdrop',
        prompt: '2. Berdasarkan gambar di atas, mana saja yang merepresentasikan matriks? (drag & drop)',
        images: [
            { id: 'img1', src: '/img/kaleng.jpeg' },
            { id: 'img2', src: '/img/batu.jpg' },
            { id: 'img3', src: '/img/lantai.jpg' },
            { id: 'img4', src: '/img/telur2.jpg' },
            { id: 'img5', src: '/img/buku_berantakan.jpg' },
            { id: 'img6', src: '/img/roti.jpeg' }
        ],
        slots: 3,
        correct: ['img1','img3','img4']
    },
    {
        type: 'matrix2d',
        prompt: '3. Perhatikan data tarif parkir di bawah ini! Simpan data pada tabel tersebut dalam bentuk matriks:',
        rows: 2,
        cols: 2,
        correctMatrix: [
            ['3000','2000'],
            ['5000','4000']
        ]
    }
];

    let idx = 0;
    let user = Array(questions.length).fill(null);
    let completed = 0;

    /* ================= POPUP HANDLER ================= */
function showPopup(message, onClose = null, icon = '') {
  const modal = document.getElementById('quizModal');
  const msg   = document.getElementById('quizModalMessage');
  const btn   = document.getElementById('quizModalBtn');
  const iconBox = document.getElementById('quizModalIcon');

  msg.innerHTML = message;
  iconBox.textContent = icon; // 🎯 hanya muncul jika dikirim

  modal.classList.remove('hidden');

  btn.onclick = () => {
    modal.classList.add('hidden');
    if (typeof onClose === 'function') onClose();
  };
}

    /* DOM refs */
    const $q = document.querySelector('.quiz-question');
    const $hasil = document.getElementById('hasil-jawaban');
    const $btnPeriksa = document.getElementById('btn-periksa');
    const $btnReset = document.getElementById('btn-reset');
    const $btnNext = document.getElementById('btn-next');
    const $btnPrev = document.getElementById('btn-prev');

    /* -------------------------
    WebAudio feedback (no files)
    ------------------------- */
    const _audioCtx = (() => {
        try { return new (window.AudioContext || window.webkitAudioContext)(); } catch (e) { return null; }
    })();

    function _ensureAudioResume() {
        if (!_audioCtx) return Promise.resolve();
        if (_audioCtx.state === 'suspended' && typeof _audioCtx.resume === 'function') {
            return _audioCtx.resume().catch(()=>{});
        }
        return Promise.resolve();
    }
    function _playTone(freq, ms = 180, type = 'sine', when = 0, volume = 0.12) {
        if (!_audioCtx) return;
        const ctx = _audioCtx;
        const o = ctx.createOscillator();
        const g = ctx.createGain();
        o.type = type; o.frequency.value = freq; g.gain.value = 0;
        o.connect(g); g.connect(ctx.destination);
        const start = ctx.currentTime + when/1000;
        const attack = 0.01;
        const release = Math.min(0.06, ms/1000/2);
        g.gain.setValueAtTime(0, start);
        g.gain.linearRampToValueAtTime(volume, start + attack);
        g.gain.setValueAtTime(volume, start + (ms/1000) - release);
        g.gain.linearRampToValueAtTime(0, start + (ms/1000));
        o.start(start); o.stop(start + (ms/1000) + 0.02);
    }
    function playFeedbackSound(ok) {
        if (!_audioCtx) return;
        _ensureAudioResume().then(() => {
            if (ok) { _playTone(520,120,'triangle'); _playTone(780,150,'triangle',120); _playTone(1040,180,'triangle',240); }
            else   { _playTone(440,150,'sine',0,0.11); _playTone(330,180,'sine',150,0.11); }
        }).catch(()=>{});
    }

    /* helper: set placeholder inside slot */
    function setSlotPlaceholder(slot){
        slot.classList.remove('occupied');
        slot.innerHTML = `<small style="color:#97a0b5">Tarik gambar ke sini</small>`;
    }

    /* render question: handles types text, dragdrop, matrix2d */
    function render(i){
        const q = questions[i];
        $hasil.textContent = '';
        $q.innerHTML = '';

        if(q.type === 'radio'){
    const optionsHTML = q.options.map((opt, index) => `
        <div class="form-check">
            <input class="form-check-input" type="radio" name="radio-soal" id="opsi${index}" value="${opt.value}">
            <label class="form-check-label" for="opsi${index}">
                ${opt.text}
            </label>
        </div>
    `).join('');

    $q.innerHTML = `
        <div class="prompt">${q.prompt}</div>
        <div class="mt-3">${optionsHTML}</div>
    `;

    // restore jawaban kalau sudah pernah pilih
    if(user[i]){
        const selected = document.querySelector(`input[value="${user[i]}"]`);
        if(selected) selected.checked = true;
    }
}

        else if(q.type === 'dragdrop'){
            const imgs = q.images.map(im => `
            <div class="drag-item" draggable="true" id="${im.id}" data-id="${im.id}" style="margin:8px">
                <img src="${im.src}" alt="">
            </div>
            `).join('');
            let slotsHtml = '';
            for(let s=0; s<q.slots; s++){
                slotsHtml += `<div class="drop-slot" data-slot="${s}"><small style="color:#97a0b5">Tarik gambar ke sini</small></div>`;
            }
            $q.innerHTML = `<div class="prompt">${q.prompt}</div>
                            <div class="source-images">${imgs}</div>
                            <div class="drop-area"><div class="slots" style="display:flex;gap:12px;flex-wrap:nowrap">${slotsHtml}</div></div>`;
            if(Array.isArray(user[i]) && user[i].length){
                setTimeout(()=> {
                    const src = document.querySelector('.source-images');
                    user[i].forEach((id, s) => {
                        const wrapper = document.getElementById(id);
                        const slot = document.querySelector(`.drop-slot[data-slot="${s}"]`);
                        if(wrapper && slot){
                            slot.innerHTML = ''; slot.classList.add('occupied'); wrapper.style.margin = '0';
                            const img = wrapper.querySelector('img'); if(img){ img.style.width='100%'; img.style.height='100%'; img.style.objectFit='cover'; }
                            slot.appendChild(wrapper);
                        } else if(wrapper && src){
                            src.appendChild(wrapper); wrapper.style.margin = '8px';
                            const img = wrapper.querySelector('img'); if(img){ img.style.width='160px'; img.style.height='110px'; img.style.objectFit='cover'; }
                        }
                    });
                }, 0);
            }
            attachDragHandlers();
        }

        else if(q.type === 'matrix2d'){
            // build bordered source table (replace top table with this one)
            const tableHtml = `
            <table class="matrix-source" role="presentation">
                <thead>
                <tr><th>Jenis Kendaraan</th><th>Hari Libur per Jam</th><th>Hari Biasa per Jam</th></tr>
                </thead>
                <tbody>
                <tr><td>Motor</td><td>3.000</td><td>2.000</td></tr>
                <tr><td>Mobil</td><td>5.000</td><td>4.000</td></tr>
                </tbody>
            </table>
            `;

            // build matrix input grid
            let rowsHtml = '';
            for(let r=0; r<q.rows; r++){
                let cells = '';
                for(let c=0; c<q.cols; c++){
                    const cellId = `matrix-${i}-${r}-${c}`;
                    cells += `<input type="text"
    inputmode="numeric"
    pattern="[0-9.]*"
    class="matrix-cell"
    id="${cellId}"
    placeholder="..."
    autocomplete="off">`;
                }
                rowsHtml += `<div class="matrix-row">${cells}</div>`;
            }

            // Pisahkan prompt menjadi dua bagian:
            // Bagian 1: sebelum tabel
            // Bagian 2: instruksi setelah tabel
            const promptAtas = q.prompt.replace('Buat ke dalam bentuk matriks:', '').trim();
            const promptBawah = 'Buat ke dalam bentuk matriks:';

            $q.innerHTML = `
                <div class="prompt">${promptAtas}</div>
                ${tableHtml}
                <div class="prompt" style="margin-top:10px;">${promptBawah}</div>

                <div class="matrix-bracket" aria-label="Input matriks">
                    <span class="bracket left">[</span>
                    <div class="matrix-grid">${rowsHtml}</div>
                    <span class="bracket right">]</span>
                </div>
            `;


            // restore saved matrix if any
            if(Array.isArray(user[i]) && user[i] !== null){
                setTimeout(()=> {
                    for(let r=0; r<q.rows; r++){
                        for(let c=0; c<q.cols; c++){
                            const cellId = `matrix-${i}-${r}-${c}`;
                            const el = document.getElementById(cellId);
                            if(el && user[i][r] && typeof user[i][r][c] !== 'undefined'){
                                el.value = user[i][r][c];
                            }
                        }
                    }
                }, 0);
            }
        }

        // update nav
        $btnPrev.style.visibility = i === 0 ? 'hidden' : 'visible';
        $btnNext.innerHTML = i === questions.length - 1 ? 'Selesai' : 'Berikutnya <i class="bi bi-arrow-right ms-2"></i>';

        // updateProgress();
        updateQuizProgress();

        if (window.MathJax) {
    MathJax.typesetPromise();
}
    }

    /* Drag & drop behavior: move wrapper to slot and back to source */
    function attachDragHandlers(){
        const source = document.querySelector('.source-images');
        document.querySelectorAll('.drag-item').forEach(it => {
            it.ondragstart = e => { e.dataTransfer.setData('text/plain', it.dataset.id); it.classList.add('dragging'); };
            it.ondragend = () => it.classList.remove('dragging');
        });

        document.querySelectorAll('.drop-slot').forEach(slot => {
            slot.ondragover = e => { e.preventDefault(); slot.style.background = '#e9f0ff'; };
            slot.ondragleave = () => { slot.style.background = '#f3f7ff'; };

            slot.ondrop = e => {
                e.preventDefault();
                slot.style.background = '#f3f7ff';
                const id = e.dataTransfer.getData('text/plain');
                const dragged = document.getElementById(id);
                if(!dragged) return;

                const existing = slot.querySelector('.drag-item');
                if(existing && existing !== dragged){
                    source.appendChild(existing);
                    existing.style.margin = '8px';
                    const imgEx = existing.querySelector('img'); if(imgEx){ imgEx.style.width='160px'; imgEx.style.height='110px'; imgEx.style.objectFit='cover'; }
                }

                const prevParent = dragged.parentElement;
                if(prevParent && prevParent.classList.contains('drop-slot') && prevParent !== slot){
                    setSlotPlaceholder(prevParent);
                    prevParent.style.borderColor = 'rgba(0,0,0,0.18)';
                    prevParent.style.boxShadow = 'none';
                }

                slot.innerHTML = ''; slot.classList.add('occupied');
                dragged.style.margin = '0';
                const img = dragged.querySelector('img');
                if(img){ img.style.width='100%'; img.style.height='100%'; img.style.objectFit='cover'; img.style.display='block'; }
                slot.appendChild(dragged);

                saveDragState();
            };
        });

        if(source){
            source.ondragover = e => e.preventDefault();
            source.ondrop = e => {
                e.preventDefault();
                const id = e.dataTransfer.getData('text/plain');
                const dragged = document.getElementById(id);
                if(!dragged) return;
                const parent = dragged.parentElement;
                if(parent && parent.classList.contains('drop-slot')){
                    source.appendChild(dragged);
                    dragged.style.margin = '8px';
                    const img = dragged.querySelector('img');
                    if(img){ img.style.width='160px'; img.style.height='110px'; img.style.objectFit='cover'; }
                    setSlotPlaceholder(parent);
                    parent.style.borderColor = 'rgba(0,0,0,0.18)';
                    parent.style.boxShadow = 'none';
                }
                saveDragState();
            };
        }
    }

    /* save drag state (for dragdrop) */
    function saveDragState(){
        const q = questions[idx];
        if(!q || q.type !== 'dragdrop') return;
        const slots = Array.from(document.querySelectorAll('.drop-slot'));
        user[idx] = slots.map(s => {
            const wrapper = s.querySelector('.drag-item');
            return wrapper ? wrapper.dataset.id : null;
        }).filter(x => x !== null);
    }

    /* periksa + reset + nav (dengan sound feedback) */
    function periksa(){
        const q = questions[idx];
        if(!q) return;
        $hasil.textContent = '';

        if(q.type === 'radio'){
    const selected = document.querySelector('input[name="radio-soal"]:checked');

    if(!selected){
        $hasil.textContent = 'Pilih salah satu jawaban dulu 🙂';
        $hasil.style.color = 'orange';
        return;
    }

    user[idx] = selected.value;

    const isCorrect = selected.value === q.correctAnswer;

    if(isCorrect){
        $hasil.textContent = 'Benar! Bentuk matriks menggunakan kurung siku.';
        $hasil.style.color = 'green';
    } else {
        $hasil.textContent = 'Jawaban belum tepat.';
        $hasil.style.color = 'red';
    }

    playFeedbackSound(isCorrect);
    return;
}

        if(q.type === 'dragdrop'){
            saveDragState();
            const given = (user[idx] || []).slice().sort();
            const correct = (questions[idx].correct || []).slice().sort();
            const ok = correct.length > 0 && correct.every(c => given.includes(c)) && given.length === correct.length;
            $hasil.textContent = ok ? 'Jawaban benar! ✅' : 'Jawaban belum tepat.';
            $hasil.style.color = ok ? '#198754' : '#b02a37';
            markSlots(ok);
            playFeedbackSound(ok);
            return;
        }

        if(q.type === 'matrix2d'){
            const matrix = []; let anyEmpty = false;
            for(let r=0;r<q.rows;r++){
                const row = [];
                for(let c=0;c<q.cols;c++){
                    const cellId = `matrix-${idx}-${r}-${c}`;
                    const el = document.getElementById(cellId);
                    const v = el ? (el.value || '').toString().trim() : '';
                    if(!v) anyEmpty = true;
                    row.push(v.replace(/[.\s]/g,''));
                }
                matrix.push(row);
            }
            user[idx] = matrix;
            if(anyEmpty){ $hasil.textContent = 'Isi semua elemen matriks terlebih dahulu.'; $hasil.style.color = 'orange'; return; }

            const expected = (questions[idx].correctMatrix || []).map(r => r.map(c => (''+c).replace(/[.\s]/g,'')));
            let isAllMatch = true;
            for(let r=0;r<q.rows;r++){
                for(let c=0;c<q.cols;c++){
                    const numUser = Number(matrix[r][c]);
const numExpected = Number(expected[r][c]);

if(
    numUser !== numExpected && 
    numUser * 1000 !== numExpected
){
    isAllMatch = false;
    break;
}
                }
                if(!isAllMatch) break;
            }
            if(isAllMatch){ $hasil.textContent = 'Jawaban matriks benar! ✅'; $hasil.style.color = '#198754'; }
            else { $hasil.textContent = 'Jawaban belum tepat.'; $hasil.style.color = '#b02a37'; }
            playFeedbackSound(isAllMatch);
            return;
        }
    }

    function markSlots(ok){
        if(questions[idx].type !== 'dragdrop') return;
        const q = questions[idx];
        document.querySelectorAll('.drop-slot').forEach(s => { s.style.borderColor = 'rgba(0,0,0,0.18)'; s.style.boxShadow = 'none'; });
        if(ok){ document.querySelectorAll('.drop-slot').forEach(s => { s.style.borderColor = '#198754'; s.style.boxShadow = '0 4px 12px rgba(25,135,84,0.12)'; }); return; }
        const correct = q.correct || [];
        document.querySelectorAll('.drop-slot').forEach(s => {
            const wrapper = s.querySelector('.drag-item'); const id = wrapper ? wrapper.dataset.id : null;
            s.style.borderColor = (id && correct.includes(id)) ? '#198754' : '#dc3545';
        });
    }

    function reset(){
        const q = questions[idx];
        $hasil.textContent = '';
        if(q.type === 'radio'){
    const radios = document.querySelectorAll('input[name="radio-soal"]');
    radios.forEach(r => r.checked = false);

    user[idx] = null; // penting biar tidak tersimpan
}

        if(q.type === 'dragdrop'){
            const source = document.querySelector('.source-images');
            document.querySelectorAll('.drop-slot').forEach(s => {
                const wrapper = s.querySelector('.drag-item');
                if(wrapper && source){
                    source.appendChild(wrapper); wrapper.style.margin = '8px';
                    const img = wrapper.querySelector('img'); if(img){ img.style.width='160px'; img.style.height='110px'; img.style.objectFit='cover'; }
                }
                setSlotPlaceholder(s);
                s.style.borderColor = 'rgba(0,0,0,0.18)'; s.style.boxShadow = 'none';
            });
            user[idx] = [];
            return;
        }

        if(q.type === 'matrix2d'){
            for(let r=0;r<q.rows;r++){
                for(let c=0;c<q.cols;c++){
                    const cellId = `matrix-${idx}-${r}-${c}`;
                    const el = document.getElementById(cellId); if(el) el.value = '';
                }
            }
            user[idx] = null; $hasil.textContent = ''; return;
        }
    }

    function isAnswered(qIndex){
    const q = questions[qIndex];

    // TEXT
    if(q.type === 'text'){
        const v = (user[qIndex] || '').trim();
        return v.length > 0;
    }

    // DRAG & DROP
    if(q.type === 'dragdrop'){
        const filled = (user[qIndex] || []).length;
        return filled === q.slots;
    }

    // MATRIX
    if(q.type === 'matrix2d'){
        const m = user[qIndex];
        if(!Array.isArray(m)) return false;

        for(let r=0; r<q.rows; r++){
            for(let c=0; c<q.cols; c++){
                if(!m[r] || !m[r][c]) return false;
            }
        }
        return true;
    }

    return false;
}


    /* Clear ALL answers and reset to initial state (used after quiz finished) */
    function next(){

    const q = questions[idx];

    // ===============================
    // 0. SIMPAN JAWABAN TERKINI DARI DOM
    // ===============================

    // TEXT
    if(q.type === 'radio'){
    const selected = document.querySelector('input[name="radio-soal"]:checked');

    if(!selected){
        showPopup('Pilih jawaban terlebih dahulu 🙂');
        return;
    }

    user[idx] = selected.value;

    }

    // DRAG & DROP
if(q.type === 'dragdrop'){
    saveDragState();
    const filled = (user[idx] || []).length;

    if(filled !== q.slots){
        showPopup('Lengkapi drag & drop terlebih dahulu 🙂');
        return;
    }
}

// MATRIX
if(q.type === 'matrix2d'){
    const matrix = [];
    let anyEmpty = false;

    for(let r=0; r<q.rows; r++){
        const row = [];
        for(let c=0; c<q.cols; c++){
            const el = document.getElementById(`matrix-${idx}-${r}-${c}`);
            const v = el ? el.value.trim() : '';
            if(!v) anyEmpty = true;
            row.push(v);
        }
        matrix.push(row);
    }

    user[idx] = matrix;

    if(anyEmpty){
        showPopup('Isi semua elemen matriks terlebih dahulu 🙂');
        return;
    }
}

    // ===============================
    // 1. tandai soal sudah dijawab
    // ===============================
    completed = Math.max(completed, idx + 1);

    // ===============================
    // 2. masih ada soal berikutnya
    // ===============================
    if(idx < questions.length - 1){
        idx++;
        render(idx);
        return;
    }

    // ===============================
    // 3. SOAL TERAKHIR (SELESAI)
    // ===============================
    completed = questions.length;
    updateQuizProgress();

// 🔥 SIMPAN KE DATABASE
fetch('/progress/complete', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
        materi_slug: 'pengenalan_matriks',
        sub_materi_slug: 'mari-mencoba-1'
    })
})
.then(res => res.json())
.then(() => {

    // 🔥 INI YANG PALING PENTING
    const btn = document.querySelector('.btn-next-slide[data-check="mari-mencoba-1"]');
    if(btn){
        btn.dataset.allowed = "1";
    }

});
    function isEqualFlexible(a, b){
    const n1 = Number(String(a).replace(/[.\s]/g,''));
    const n2 = Number(String(b).replace(/[.\s]/g,''));

    return n1 === n2 || n1 * 1000 === n2;
}

    let score = 0;
    questions.forEach((qq,i) => {
        if(qq.type === 'radio'){
        if(user[i] === qq.correctAnswer){
            score++;
        }
    }
        else if(qq.type === 'dragdrop'){
            const g = (user[i] || []).slice().sort();
            const c = (qq.correct || []).slice().sort();
            if(JSON.stringify(g) === JSON.stringify(c)) score++;
        }
        else if(qq.type === 'matrix2d'){
    const g = user[i] || [];
    const c = qq.correctMatrix || [];

    let isMatch = true;

    for(let r = 0; r < c.length; r++){
        for(let col = 0; col < c[r].length; col++){
            if(!isEqualFlexible(g[r]?.[col], c[r][col])){
                isMatch = false;
                break;
            }
        }
        if(!isMatch) break;
    }

    if(isMatch) score++;
}
    });

    // ⏳ tunggu agar progress 100% terlihat
    setTimeout(() => {
        showPopup(
  `<b>Quiz selesai!</b><br>Jawaban benar: <b>${score}</b> / ${questions.length}`,
  () => {
    idx = 0;
    completed = 0;
    user = Array(questions.length).fill(null);
    render(idx);
  },
  '🎉'
);

        
    }, 300);
}



    function prev(){
        const q = questions[idx];
        if(q && q.type === 'text'){ const v = document.getElementById('jawaban-matriks'); if(v) user[idx] = v.value.trim(); }
        if(q && q.type === 'matrix2d'){ const mat = []; for(let r=0;r<q.rows;r++){ const row = []; for(let c=0;c<q.cols;c++){ const cellId = `matrix-${idx}-${r}-${c}`; const el = document.getElementById(cellId); row.push(el ? el.value.trim() : ''); } mat.push(row); } user[idx] = mat; }
        // if(idx > 0){ idx--; render(idx); }
        // if(idx > 0){
        if(idx > 0){
            idx--;
            render(idx);
    }
    }

    

    function updateQuizProgress() {
    const total = questions.length;

    const percent = (completed / total) * 100;

    document.getElementById('currentQuestion').textContent = idx + 1;
    document.getElementById('totalQuestion').textContent = total;

    document.getElementById('quizProgressFill').style.width = percent + '%';

    const star = document.getElementById('quizProgressStar');
    if (star) {
        star.style.left = percent + '%';
    }
}

// document.getElementById("btnNext").addEventListener("click", function(e) {

//     const allowed = this.dataset.allowed;

//     if (allowed !== "1") {
//         e.preventDefault();
//         e.stopImmediatePropagation(); // 🔥 PENTING BANGET

//         document.getElementById("lockedPopup").style.display = "flex";
//         return false; // 🔥 WAJIB
//     }

//     // ✅ hanya jalan kalau boleh
//     goToNextSlide();
// });

// function closePopup() {
//     document.getElementById("lockedPopup").style.display = "none";
// }


    /* expose for inline compatibility */
    window.periksaJawaban = periksa;
    window.resetJawaban = reset;
    window.keBerikutnya = next;
    window.keSebelumnya = prev;

    /* bind buttons */
    $btnPeriksa?.addEventListener('click', periksa);
    $btnReset?.addEventListener('click', reset);
    $btnNext?.addEventListener('click', next);
    $btnPrev?.addEventListener('click', prev);

    /* init */
    render(idx);
    updateQuizProgress();
    // updateProgress();






    /* =========================================================
    MARI MENCOBA 2 — FINAL (RAPI & TERSTRUKTUR)
    ========================================================= */
    document.addEventListener('DOMContentLoaded', function () {

        /* =====================================================
        AUDIO FEEDBACK (SAMA DENGAN MARI MENCOBA 1)
        ===================================================== */
        const _audioCtx = (() => {
            try {
                return new (window.AudioContext || window.webkitAudioContext)();
            } catch {
                return null;
            }
        })();

        function _ensureAudioResume() {
            if (!_audioCtx) return Promise.resolve();
            if (_audioCtx.state === 'suspended') {
                return _audioCtx.resume().catch(() => {});
            }
            return Promise.resolve();
        }

        function _playTone(freq, ms = 180, type = 'sine', when = 0, volume = 0.12) {
            if (!_audioCtx) return;

            const ctx = _audioCtx;
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();

            osc.type = type;
            osc.frequency.value = freq;

            osc.connect(gain);
            gain.connect(ctx.destination);

            const start = ctx.currentTime + when / 1000;
            gain.gain.setValueAtTime(0, start);
            gain.gain.linearRampToValueAtTime(volume, start + 0.01);
            gain.gain.linearRampToValueAtTime(0, start + ms / 1000);

            osc.start(start);
            osc.stop(start + ms / 1000 + 0.02);
        }

        function playFeedbackSound(isCorrect) {
            if (!_audioCtx) return;

            _ensureAudioResume().then(() => {
                if (isCorrect) {
                    _playTone(520, 120, 'triangle');
                    _playTone(780, 150, 'triangle', 120);
                    _playTone(1040, 180, 'triangle', 240);
                } else {
                    _playTone(440, 150, 'sine', 0, 0.11);
                    _playTone(330, 180, 'sine', 150, 0.11);
                }
            });
        }

        /* =====================================================
        DOM ELEMENTS
        ===================================================== */
        const container = document.getElementById('quiz-question-2');
        const hasil = document.getElementById('hasil-jawaban-2');

        const btnPeriksa = document.getElementById('btn-periksa-2');
        const btnReset   = document.getElementById('btn-reset-2');
        const btnNext    = document.getElementById('btn-next-2');
        const btnPrev    = document.getElementById('btn-prev-2');

        if (!container) return;

        /* =====================================================
        STATE JAWABAN USER
        ===================================================== */
        const userAnswer = [
  { ordoRow: '', ordoCol: '', a23: '' },                // 1
  { name: '', matrix: {}, ordoRow: '', ordoCol: '' },  // 2
  { drop: {} },                                        // 3 (ex 3a)
  { tf: '' },                                          // 4 (ex 3b)
  { a22: '', a41: '', a53: '', a32: '' }               // 5 (ex 3c)
];

function updateLabelOrdo() {
  const nameInput = document.getElementById('nama-matriks');
  const label = document.getElementById('label-ordo-name');

  if (!nameInput || !label) return;

  const val = nameInput.value.trim();
  label.textContent = val !== '' ? val : '....';
}



        /* =====================================================
        DATA SOAL
        ===================================================== */
        const soal = [

            /* ================= SOAL 1 ================= */
            {
                render: () => `
                    <p><strong>1. Diketahui matriks \\( A \\) di bawah ini</strong></p>
                    \\[
                    A =
                    \\begin{bmatrix}
                    7 & 4 & 1 \\\\
                    6 & 3 & 2
                    \\end{bmatrix}
                    \\]
                    <div>a. Berapakah ordo dari matriks \\( A \\)?</div>
                    <div>Jawab:</div>

                    <div class="ordo-input">
                        <input class="quiz-input small" id="ordo-row"  placeholder="..."> ×
                        <input class="quiz-input small" id="ordo-col"  placeholder="...">
                    </div>
                    <br>

                    <div>
                        b. Berapakah nilai \\( a_{23} \\)?
                    </div>
                    <div>Jawab:</div>
                    <div><input class="quiz-input small" id="a23"  placeholder="..."></div>
                `,
                restore: () => {
                    document.getElementById('ordo-row').value = userAnswer[0].ordoRow;
                    document.getElementById('ordo-col').value = userAnswer[0].ordoCol;
                    document.getElementById('a23').value = userAnswer[0].a23;
                },
                check: () => {
                    userAnswer[0].ordoRow = document.getElementById('ordo-row').value.trim();
                    userAnswer[0].ordoCol = document.getElementById('ordo-col').value.trim();
                    userAnswer[0].a23     = document.getElementById('a23').value.trim();

                    return (
                        userAnswer[0].ordoRow === '2' &&
                        userAnswer[0].ordoCol === '3' &&
                        userAnswer[0].a23 === '2'
                    );
                },
                reset: () => {
                    userAnswer[0] = { ordoRow: '', ordoCol: '', a23: '' };
                }
            },

            /* ================= SOAL 2 ================= */
            {
render: () => `
<p><strong>2. Data jumlah siswa laki-laki dan perempuan pada tiga kelas ditunjukkan berikut:</strong></p>

<div class="table-scroll">

<table class="data-siswa">
<tr>
    <th>Kelas</th>
    <th>Laki-Laki</th>
    <th>Perempuan</th>
</tr>

<tr>
    <td>XA</td>
    <td>10</td>
    <td>15</td>
</tr>

<tr>
    <td>XB</td>
    <td>12</td>
    <td>14</td>
</tr>

<tr>
    <td>XC</td>
    <td>9</td>
    <td>16</td>
</tr>

</table>

</div>

<p>Tuliskan data dalam bentuk matriks, dan tentukan ordo matriks tersebut.</p>
<p style="font-size:14px; color:#666; margin-bottom:5px;">
        Klik icon ☰, lalu pilih dan klik insert matriks, kemudian arahkan kursor dan
tentukan jumlah baris dan kolomnya.
    </p>

<div class="matrix-center-row">

    <div class="matrix-name">
        <input class="quiz-input small"
               id="nama-matriks"
               maxlength="1"
                placeholder="...">
        <span>=</span>
    </div>

    <div class="matrix-input">

    

    <math-field id="matrixInputPengenalan"
        style="
            font-size: 26px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 10px;
            background: #f8f9fa;
            min-width: 150px;
            min-height: 60px;
        ">
    </math-field>

</div>

</div>


<div class="ordo-input">
    <div class="ordo-input">
    Ordo matriks <span id="label-ordo-name">....</span> =

    <input class="quiz-input small" id="b-row"  placeholder="..."> ×
    <input class="quiz-input small" id="b-col"  placeholder="...">
</div>
`,
afterRender: () => {
  const nameInput = document.getElementById('nama-matriks');

  if (nameInput) {
    nameInput.addEventListener('input', function () {
      userAnswer[1].name = this.value.trim();
      updateLabelOrdo();
    });
  }

  // 🔥 MATHLIVE
  const mf = document.getElementById("matrixInputPengenalan");

  if (mf) {
    mf.setOptions({
      virtualKeyboardMode: "onfocus"
    });

    // restore
    if (userAnswer[1].matrixLatex) {
      mf.value = userAnswer[1].matrixLatex;
    }

    // simpan
    mf.addEventListener("input", () => {
      userAnswer[1].matrixLatex = mf.value;
    });
  }
},

restore: () => {
    document.getElementById('nama-matriks').value = userAnswer[1].name;

    document.getElementById('b-row').value = userAnswer[1].ordoRow;
    document.getElementById('b-col').value = userAnswer[1].ordoCol;

    const mf = document.getElementById("matrixInputPengenalan");
    if (mf && userAnswer[1].matrixLatex) {
        mf.value = userAnswer[1].matrixLatex;
    }

    updateLabelOrdo();
},

check: () => {

const nameInput = document.getElementById('nama-matriks');
userAnswer[1].name = nameInput.value.trim();

const latex = userAnswer[1].matrixLatex;

// 🔥 ambil angka dari matrix
const angka = latex ? latex.match(/-?\d+/g) : null;

userAnswer[1].ordoRow = document.getElementById('b-row').value.trim();
userAnswer[1].ordoCol = document.getElementById('b-col').value.trim();

const namaValid = /^[A-Z]$/.test(userAnswer[1].name);

const benarArr = ['10','15','12','14','9','16'];
const sortedUser = [...angka].sort();
const sortedBenar = [...benarArr].sort();

const matrixBenar =
  sortedUser.length === sortedBenar.length &&
  sortedUser.every((v,i)=>v===sortedBenar[i]);
return (
  namaValid &&
  angka &&
  angka.length === 6 &&
  matrixBenar &&
  userAnswer[1].ordoRow === '3' &&
  userAnswer[1].ordoCol === '2'
);
},
reset: () => {
userAnswer[1] = { name:'', matrixLatex:'', ordoRow:'', ordoCol:'' };
}
},

            /* ================= SOAL 3 ================= */
            {
                render: () => `
                    <p>3. Perhatikan matriks berikut!</p>
                    \\[
                    C =
                    \\begin{bmatrix}
                    68 & 50 & 73 \\\\
                    70 & 48 & 45 \\\\
                    73 & 27 & 25
                    \\end{bmatrix}
                    \\]
                    <p>Lengkapi tabel di bawah ini berdasarkan matriks \\( C \\) dengan cara menyeret pilihan jawaban pada tabel yang disediakan.</p>


                    <table class="tabel-soal">
                        <tr><th>Pernyataan</th><th>Jawaban (seret ke sini)</th></tr>
                        <tr><td>a. Elemen \\( c_{23} \\) adalah</td><td><div class="drop-box" data-ans="45"></div></td></tr>
                        <tr><td>b. Elemen \\( c_{32} \\) adalah</td><td><div class="drop-box" data-ans="27"></div></td></tr>
                        <tr><td>c. Ordo matriks \\( C \\) adalah</td><td><div class="drop-box" data-ans="3x3"></div></td></tr>
                    </table>

                    <p><strong>Pilihan Jawaban:</strong></p>
                    <div class="opsi-jawaban">
                        <div class="opsi" draggable="true" data-val="27">27</div>
                        <div class="opsi" draggable="true" data-val="3x3">3×3</div>
                        <div class="opsi" draggable="true" data-val="45">45</div>
                    </div>
                    <br>
                `,
                restore: () => {
                    Object.entries(userAnswer[2].drop).forEach(([key, val]) => {
                        const box = document.querySelector(`.drop-box[data-ans="${key}"]`);
                        const opt = document.querySelector(`.opsi[data-val="${val}"]`);
                        if (box && opt) box.appendChild(opt);
                    });
                },
                check: () => (
                    userAnswer[2].drop['45'] === '45' &&
                    userAnswer[2].drop['27'] === '27' &&
                    userAnswer[2].drop['3x3'] === '3x3'
                ),
                reset: () => {
                    userAnswer[2] = { drop: {} };
                },
                afterRender: () => {

    let dragged = null;

    const opsis = document.querySelectorAll('.opsi');
    const dropBoxes = document.querySelectorAll('.drop-box');
    const opsiContainer = document.querySelector('.opsi-jawaban');

    // ======================
    // OPSI (DRAG SOURCE)
    // ======================
    opsis.forEach(item => {

        // cegah teks ke-select
        item.addEventListener('selectstart', e => e.preventDefault());

        // ===== DESKTOP =====
        item.addEventListener('dragstart', function (e) {
            dragged = this;
            e.dataTransfer.setData('text/plain', this.dataset.val);
        });

        // ===== MOBILE =====
        item.addEventListener('touchstart', function () {
            dragged = this;
            this.classList.add('dragging');
        });

        item.addEventListener('touchmove', function (e) {
            e.preventDefault();

            const touch = e.touches[0];

            this.style.position = 'fixed';
            this.style.left = touch.clientX - this.offsetWidth / 2 + 'px';
            this.style.top = touch.clientY - this.offsetHeight / 2 + 'px';
            this.style.zIndex = 9999;
            this.style.pointerEvents = 'none'; // 🔥 penting biar elementFromPoint kena target
        });

        item.addEventListener('touchend', function (e) {

            const touch = e.changedTouches[0];
            const target = document.elementFromPoint(touch.clientX, touch.clientY);

            const dropzone = target?.closest('.drop-box');

            if (dropzone) {
                dropzone.innerHTML = '';
                dropzone.appendChild(this);

                const key = dropzone.dataset.ans;
                userAnswer[2].drop[key] = this.dataset.val;
            } else {
                // balik ke container
                opsiContainer.appendChild(this);

                Object.keys(userAnswer[2].drop).forEach(k => {
                    if (userAnswer[2].drop[k] === this.dataset.val) {
                        delete userAnswer[2].drop[k];
                    }
                });
            }

            // reset style
            this.style.position = '';
            this.style.left = '';
            this.style.top = '';
            this.style.zIndex = '';
            this.style.pointerEvents = '';

            this.classList.remove('dragging');
            dragged = null;
        });

    });

    // ======================
    // DROP BOX
    // ======================
    dropBoxes.forEach(box => {

        // DESKTOP
        box.addEventListener('dragover', e => e.preventDefault());

        box.addEventListener('drop', function (e) {
            e.preventDefault();

            if (!dragged) return;

            this.innerHTML = '';
            this.appendChild(dragged);

            const key = this.dataset.ans;
            userAnswer[2].drop[key] = dragged.dataset.val;
        });

    });

    // ======================
    // BALIK KE OPSI CONTAINER
    // ======================
    opsiContainer.addEventListener('dragover', e => e.preventDefault());

    opsiContainer.addEventListener('drop', function (e) {
        e.preventDefault();

        if (!dragged) return;

        this.appendChild(dragged);

        Object.keys(userAnswer[2].drop).forEach(k => {
            if (userAnswer[2].drop[k] === dragged.dataset.val) {
                delete userAnswer[2].drop[k];
            }
        });
    });

}},
            {
  render: () => `
    <p><strong>4. Diketahui matriks berikut</strong></p>

    \\[
    B =
    \\begin{bmatrix}
    11 & 12 \\\\
    8 & 22 \\\\
    34 & 6
    \\end{bmatrix}
    \\]

    <p>
      Apakah elemen \\( b_{22} \\) lebih besar dari \\( b_{31} \\)?
    </p>

    <label>
      <input type="radio" name="tf4" value="benar"> Benar
    </label>
    &nbsp;&nbsp;
    <label>
      <input type="radio" name="tf4" value="salah"> Salah
    </label>
  `,

  afterRender: () => {
    document.querySelectorAll('input[name="tf4"]').forEach(r => {
      r.addEventListener('change', e => {
        userAnswer[3].tf = e.target.value;
      });
    });
  },

  /* 🔥 TAMBAHKAN INI */
  restore: () => {
    if (userAnswer[3].tf) {
      const radio = document.querySelector(
        `input[name="tf4"][value="${userAnswer[3].tf}"]`
      );
      if (radio) radio.checked = true;
    }
  },

  check: () => userAnswer[3].tf === 'salah',

  reset: () => {
    userAnswer[3] = { tf: '' };
  }
},

{
  render: () => `
    <p><strong>5. Perhatikan matriks di bawah ini!</strong></p>

\\[
A =
\\begin{bmatrix}
43 & 65 & 11 \\\\
56 & 22 & 60 \\\\
99 & 73 & 12 \\\\
45 & 68 & 35 \\\\
18 & 81 & 75
\\end{bmatrix}
\\]

<p>
Jika matriks 
\\( 
B =
\\begin{bmatrix}
a_{22} & a_{41} \\\\
a_{53} & a_{32}
\\end{bmatrix}
\\)
maka tentukan nilai elemen matriks <strong>\\( B \\)</strong> di bawah ini!
</p>

<div style="display:flex; justify-content:center; margin-top:30px;">

  <div style="display:flex; align-items:center; gap:12px;">

    <!-- B = -->
    <div class="matrix-responsive-wrapper">

    <!-- B = -->
    <div class="matrix-equal-text">
        \\( B = \\)
    </div>

    <!-- matrix -->
    <div class="matrix-responsive">

        <!-- kurung kiri -->
        <div class="matrix-bracket-side left"></div>

        <!-- grid -->
        <div class="matrix-grid-responsive">

            <input class="quiz-input matrix-input-responsive" id="a22" placeholder="...">
            <input class="quiz-input matrix-input-responsive" id="a41" placeholder="...">
            <input class="quiz-input matrix-input-responsive" id="a53" placeholder="...">
            <input class="quiz-input matrix-input-responsive" id="a32" placeholder="...">

        </div>

        <!-- kurung kanan -->
        <div class="matrix-bracket-side right"></div>

    </div>

</div>

  </div>

</div>


  `,
  afterRender: () => {
    ['a22','a41','a53','a32'].forEach(id => {
      const el = document.getElementById(id);
      el.value = userAnswer[4][id] || '';

      el.addEventListener('input', () => {
        userAnswer[4][id] = el.value.trim();
      });
    });
  },
  check: () => (
    userAnswer[4].a22 === '22' &&
    userAnswer[4].a41 === '45' &&
    userAnswer[4].a53 === '75' &&
    userAnswer[4].a32 === '73'
  ),
  reset: () => {
    userAnswer[4] = { a22:'', a41:'', a53:'', a32:'' };
  }
}

        ];



        function updateQuizProgress() {
            const total = soal.length;
            const percent = (completed / total) * 100;

            const currentEl = document.getElementById('currentQuestion-2');
            const totalEl   = document.getElementById('totalQuestion-2');
            const barEl     = document.getElementById('quizProgressFill-2');
            const starEl    = document.getElementById('quizProgressStar-2');

            if (currentEl) currentEl.textContent = idx + 1;
            if (totalEl) totalEl.textContent = total;
            if (barEl) barEl.style.width = percent + '%';
            if (starEl) starEl.style.left = percent + '%';
        }


        function isAnswered(i) {

  if (i === 0) {
    return (
      userAnswer[0].ordoRow !== '' &&
      userAnswer[0].ordoCol !== '' &&
      userAnswer[0].a23 !== ''
    );
  }

  if (i === 1) {
  const data = userAnswer[1];

  const latex = data.matrixLatex;
  const angka = latex ? latex.match(/-?\d+/g) : null;

  return (
    data.name !== '' &&
    /^[A-Z]$/.test(data.name) &&
    angka &&
    angka.length > 0 && // ✅ cukup ada isi
    data.ordoRow !== '' &&
    data.ordoCol !== ''
  );
}

  if (i === 2) {
    return Object.keys(userAnswer[2].drop).length === 3;
  }

  if (i === 3) {
    return userAnswer[3].tf !== '';
  }

  if (i === 4) {
    return (
      userAnswer[4].a22 !== '' &&
      userAnswer[4].a41 !== '' &&
      userAnswer[4].a53 !== '' &&
      userAnswer[4].a32 !== ''
    );
  }

  return false;
}



        function checkSoal3() {
  const benar3a =
    userAnswer[2].drop['45'] === '45' &&
    userAnswer[2].drop['27'] === '27' &&
    userAnswer[2].drop['3x3'] === '3x3';

  const benar3b = userAnswer[2].tf === 'salah';

  const benar3c =
    userAnswer[2].a22 === '22' &&
    userAnswer[2].a41 === '45' &&
    userAnswer[2].a53 === '75' &&
    userAnswer[2].a32 === '73';

  // ✅ SOAL 3 BENAR HANYA JIKA SEMUANYA BENAR
  return benar3a && benar3b && benar3c;
}


        
        /* =====================================================
        UTIL & NAVIGASI
        ===================================================== */
        
        let idx = 0;
        let completed = 0; // jumlah soal yang sudah SAH dijawab
        let quizFinished = false;


        function hitungSkor() {
            let score = 0;

if (soal[0].check()) score++;
if (soal[1].check()) score++;
if (soal[2].check()) score++;
if (soal[3].check()) score++;
if (soal[4].check()) score++;

            return score;
        }

        function clearAllAnswers() {
            userAnswer[0] = { ordoRow: '', ordoCol: '', a23: '' };
            userAnswer[1] = { matrix: {}, ordoRow: '', ordoCol: '' };
            userAnswer[2] = { drop: {} };

            idx = 0;
            completed = 0;

            renderSoal();
            updateQuizProgress();
            hasil.textContent = '';
            quizFinished = false;
        }








        function saveCurrentAnswer() {
            if (soal[idx] && soal[idx].check) {
                soal[idx].check();
                // ⬆️ ini menyimpan jawaban ke userAnswer
                // TANPA peduli benar atau salah
            }
        }

        /* =====================================================
        EVENT HANDLER
        ===================================================== */
        // btnPeriksa.onclick = () => {
        //     const benar = soal[idx].check();
        //     playFeedbackSound(benar);

        //     hasil.textContent = benar
        //         ? 'Jawaban benar! ✅'
        //         : 'Jawaban belum tepat.';
        //     hasil.style.color = benar ? '#198754' : '#dc3545';
        // };

        // btnReset.onclick = () => {
        //     soal[idx].reset();
        //     renderSoal();
        // };

        function renderSoal() {

        
  hasil.textContent = '';
document.getElementById('currentQuestion-2').textContent = idx + 1;
document.getElementById('totalQuestion-2').textContent = soal.length;
  container.innerHTML = soal[idx].render();

  if (soal[idx].afterRender) soal[idx].afterRender();
  if (soal[idx].restore) soal[idx].restore();

  if (window.MathJax) MathJax.typesetPromise();

  btnPrev.style.visibility = idx === 0 ? 'hidden' : 'visible';

  btnNext.innerHTML =
    idx === soal.length - 1
      ? 'Selesai'
      : 'Berikutnya <i class="bi bi-arrow-right ms-2"></i>';
}

        /* =====================================================
        EVENT HANDLER
        ===================================================== */
        btnPeriksa.onclick = () => {
  const benar = soal[idx].check();

  playFeedbackSound(benar);

  hasil.textContent = benar
    ? 'Jawaban benar! ✅'
    : 'Jawaban belum tepat.';

  hasil.style.color = benar ? '#198754' : '#dc3545';
};

btnReset.onclick = () => {

  // reset data soal aktif
  if (soal[idx] && soal[idx].reset) {
    soal[idx].reset();
  }

  // render ulang tampilan
  renderSoal();

  // hapus feedback
  hasil.textContent = '';
};

        // PINDAH DARI SOAL 3a KE SOAL 3b


        btnNext.onclick = function () {

  const currentSoal = soal[idx];

  // =====================================
  // 1️⃣ SIMPAN SEMUA INPUT DARI DOM DULU
  // =====================================

  // Soal 5 (index 4)
  if (idx === 4) {
    userAnswer[4].a22 = document.getElementById('a22')?.value.trim() || '';
    userAnswer[4].a41 = document.getElementById('a41')?.value.trim() || '';
    userAnswer[4].a53 = document.getElementById('a53')?.value.trim() || '';
    userAnswer[4].a32 = document.getElementById('a32')?.value.trim() || '';
  }

  // Soal lain tetap pakai check
  if (currentSoal.check) currentSoal.check();

  // =====================================
  // 2️⃣ JIKA BELUM SOAL TERAKHIR
  // =====================================
  if (idx < soal.length - 1) {

    if (!isAnswered(idx)) {
      showPopup('Selesaikan soal ini terlebih dahulu 🙂');
      return;
    }

    completed = Math.max(completed, idx + 1);
    updateQuizProgress();

    idx++;
    renderSoal();
    return;
  }

  // =====================================
  // 3️⃣ SOAL TERAKHIR (SELESAI)
  // =====================================

  if (!isAnswered(idx)) {
    showPopup('Lengkapi semua jawaban terlebih dahulu 🙂');
    return;
  }

  completed = soal.length;
  updateQuizProgress();
fetch('/progress/complete', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
        materi_slug: 'pengenalan_matriks',
        sub_materi_slug: 'mari-mencoba-ke2'
    })
})
.then(res => res.json())
.then(data => {
    console.log('SUCCESS:', data);

    // 🔥 PENTING: update tombol langsung
    const btn = document.querySelector(".btn-next-slide[data-check='mari-mencoba-2']");
    if(btn){
        btn.dataset.allowed = "1";
    }
})
.catch(err => console.error('ERROR:', err));

  let score = 0;

if (
  userAnswer[0].ordoRow === '2' &&
  userAnswer[0].ordoCol === '3' &&
  userAnswer[0].a23 === '2'
) score++;

const latex = userAnswer[1].matrixLatex;
const angka = latex ? latex.match(/-?\d+/g) : null;

const benarArr = ['10','15','12','14','9','16'];

const matrixBenar =
  angka &&
  angka.length === 6 &&
  [...angka].sort().every((v,i)=>v === benarArr.sort()[i]);

if (
  /^[A-Z]$/.test(userAnswer[1].name) &&
  matrixBenar &&
  userAnswer[1].ordoRow === '3' &&
  userAnswer[1].ordoCol === '2'
) score++;

if (
  userAnswer[2].drop['45'] === '45' &&
  userAnswer[2].drop['27'] === '27' &&
  userAnswer[2].drop['3x3'] === '3x3'
) score++;

if (userAnswer[3].tf === 'salah') score++;

if (
  userAnswer[4].a22 === '22' &&
  userAnswer[4].a41 === '45' &&
  userAnswer[4].a53 === '75' &&
  userAnswer[4].a32 === '73'
) score++;


  setTimeout(() => {

    showPopup(
      `<b>Quiz selesai!</b><br>
       Jawaban benar: <b>${score}</b> / ${soal.length}`,
      () => {
        idx = 0;
        completed = 0;

        userAnswer[0] = { ordoRow:'', ordoCol:'', a23:'' };
        userAnswer[1] = { name:'', matrix:{}, ordoRow:'', ordoCol:'' };
        userAnswer[2] = { drop:{} };
        userAnswer[3] = { tf:'' };
        userAnswer[4] = { a22:'', a41:'', a53:'', a32:'' };

        renderSoal();
        updateQuizProgress();
      },
      '🎉'
    );

  }, 300);
};







//     // RESET TOTAL
//     userAnswer[0] = { ordoRow:'', ordoCol:'', a23:'' };
//     userAnswer[1] = { matrix:{}, ordoRow:'', ordoCol:'' };
//     userAnswer[2] = { drop:{} };

//     idx = 0;
//     completed = 0;

//     renderSoal();
//     updateQuizProgress();
// };
function showPopup(message, onClose = null, icon = '') {
  const modal = document.getElementById('quizModal');
  const msg   = document.getElementById('quizModalMessage');
  const btn   = document.getElementById('quizModalBtn');
  const iconBox = document.getElementById('quizModalIcon');

  if (!modal || !msg || !btn) {
    // fallback kalau modal tidak ada
    alert(message.replace(/<br>/g, '\n'));
    if (typeof onClose === 'function') onClose();
    return;
  }

  msg.innerHTML = message;
  if (iconBox) iconBox.textContent = icon;

  modal.classList.remove('hidden');

  btn.onclick = () => {
    modal.classList.add('hidden');
    if (typeof onClose === 'function') onClose();
  };
}


    btnPrev.onclick = () => {
  if (idx > 0) {
    idx--;
    renderSoal();
  }
};


    /* =====================================================
    INIT
    ===================================================== */
    renderSoal();
    updateQuizProgress();

        });
    







/* =====================================================
            TUTORIAL BARIS KOLOM MATRIKS C
===================================================== */
let rowInterval = null;
let colInterval = null;
let rowAnsweredCorrect = false;
let colAnsweredCorrect = false;


function startRowTutorial() {
    // 🔴 PASTIKAN kolom MATI
    stopColTutorial();

    if (rowInterval) return;

    const box = document.querySelector(".row-tutorial");
    const table = box.querySelector("table");
    const info  = box.querySelector(".row-info");
    const rows  = table.querySelectorAll("tr");

    let index = 0;

    function highlightRow() {
        rows.forEach(r => r.classList.remove("active"));
        rows[index].classList.add("active");
        info.textContent = `Baris ke-${index + 1}`;
        index = (index + 1) % rows.length;
    }

    highlightRow();
    rowInterval = setInterval(highlightRow, 2000);
}


function startColTutorial() {
    // 🔴 PASTIKAN baris MATI
    stopRowTutorial();

    if (colInterval) return;

    const box = document.querySelector(".column-tutorial");
    const table = box.querySelector("table");
    const info  = box.querySelector(".row-info");
    const rows  = table.querySelectorAll("tr");
    const totalCols = rows[0].children.length;

    let index = 0;

    function highlightCol() {
        rows.forEach(row => {
            Array.from(row.children).forEach((cell, colIdx) => {
                cell.classList.toggle("active-col", colIdx === index);
            });
        });

        info.textContent = `Kolom ke-${index + 1}`;
        index = (index + 1) % totalCols;
    }

    highlightCol();
    colInterval = setInterval(highlightCol, 2000);
}


function checkRow() {
    const val = document.getElementById("answer-row").value;
    const fb  = document.getElementById("feedback-row");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val == 3) {
        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        rowAnsweredCorrect = true;
        checkAyoCoba7Completed();

        document.getElementById("row-animation").style.display = "block";
        startRowTutorial();

        document.getElementById("column-question").style.display = "block";
        document.getElementById("row-repeat").classList.remove("hidden");

        // 🔊 SUARA BENAR
        playFeedbackSound(true);

    } else {
        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        // 🔊 SUARA SALAH
        playFeedbackSound(false);
    }

    document.getElementById("row-repeat-msg").textContent = "";
}




function checkCol() {
    const val = document.getElementById("answer-col").value;
    const fb  = document.getElementById("feedback-col");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val == 5) {
        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        colAnsweredCorrect = true;
        checkAyoCoba7Completed();

        stopRowTutorial();

        document.getElementById("col-animation").style.display = "block";
        startColTutorial();

        document.getElementById("col-repeat").classList.remove("hidden");

        // 🔊 SUARA BENAR
        playFeedbackSound(true);

    } else {
        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        // 🔊 SUARA SALAH
        playFeedbackSound(false);
    }

    document.getElementById("col-repeat-msg").textContent = "";
}





function stopRowTutorial() {
    if (rowInterval) {
        clearInterval(rowInterval);
        rowInterval = null;
    }

    // bersihkan highlight baris
    document.querySelectorAll(".row-tutorial tr")
        .forEach(r => r.classList.remove("active"));
}
function stopColTutorial() {
    if (colInterval) {
        clearInterval(colInterval);
        colInterval = null;
    }

    // bersihkan highlight kolom
    document.querySelectorAll(".column-tutorial td")
        .forEach(td => td.classList.remove("active-col"));
}

function restartRowTutorial() {
    const msg = document.getElementById("row-repeat-msg");

    if (!rowAnsweredCorrect) {
        msg.textContent = "Maaf, kerjakan soal terlebih dahulu.";
        return;
    }

    msg.textContent = ""; // bersihkan pesan
    stopRowTutorial();
    startRowTutorial();
}



function restartColTutorial() {
    const msg = document.getElementById("col-repeat-msg");

    if (!colAnsweredCorrect) {
        msg.textContent = "Maaf, kerjakan soal terlebih dahulu.";
        return;
    }

    msg.textContent = ""; // bersihkan pesan
    stopColTutorial();
    startColTutorial();
}

function checkAyoCoba7Completed() {

    if (rowAnsweredCorrect && colAnsweredCorrect) {

        // 🔥 SIMPAN KE DATABASE
        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'pengenalan_matriks',
                sub_materi_slug: 'ayo-kita-coba-7'
            })
        })
        .then(() => {
    const btn = document.querySelector('[data-check="ayo-kita-coba-7"]');
    if (btn) {
        btn.dataset.allowed = "1";
    }
});

    }

}


/* =====================================================
            TUTORIAL BARIS KOLOM MATRIKS A
===================================================== */
let rowIntervalA = null;
let colIntervalA = null;
let rowAnsweredCorrectA = false;
let colAnsweredCorrectA = false;

let soal1Benar = false;
let soal2Benar = false;
let soal3Benar = false;

let matrixAnsweredCorrectA = false;

function startRowTutorialA() {

    // 🔴 PASTIKAN kolom berhenti
    stopColTutorialA();

    if (rowIntervalA) return;

    const box = document.querySelector(".row-tutorial-A");
    const table = box.querySelector("table");
    const info  = box.querySelector(".row-info");
    const rows  = table.querySelectorAll("tr");

    let index = 0;

    function highlightRow() {
        rows.forEach(r => r.classList.remove("active"));
        rows[index].classList.add("active");
        info.textContent = `Baris ke-${index + 1}`;
        index = (index + 1) % rows.length;
    }

    highlightRow();
    rowIntervalA = setInterval(highlightRow, 2000);
}


function startColTutorialA() {

    // 🔴 PASTIKAN baris berhenti
    stopRowTutorialA();

    if (colIntervalA) {
        clearInterval(colIntervalA);
        colIntervalA = null;
    }

    const box = document.querySelector(".column-tutorial-A");
    if (!box) return;

    const table = box.querySelector("table");
    const info  = box.querySelector(".row-info");
    const rows  = table.querySelectorAll("tr");

    const totalCols = rows[0].children.length;
    let index = 0;

    function highlightCol() {

        rows.forEach(row => {
            Array.from(row.children).forEach(cell => {
                cell.classList.remove("active-col");
            });
        });

        rows.forEach(row => {
            row.children[index].classList.add("active-col");
        });

        info.textContent = `Kolom ke-${index + 1}`;

        index = (index + 1) % totalCols;
    }

    highlightCol();
    colIntervalA = setInterval(highlightCol, 2000);
}



function checkRowA() {

    const val = document.getElementById("answer-row-A").value;
    const fb  = document.getElementById("feedback-row-A");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val == 3) {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        rowAnsweredCorrectA = true;
        soal1Benar = true;
        checkAyoCoba8Completed();

        document.getElementById("row-animation-A").style.display = "block";
        startRowTutorialA();

        document.getElementById("column-question-A").style.display = "block";
        document.getElementById("row-repeat-A").classList.remove("hidden");

        // 🔊 SUARA BENAR
        playFeedbackSound(true);

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        // 🔊 SUARA SALAH
        playFeedbackSound(false);
    }

    document.getElementById("row-repeat-msg-A").textContent = "";
}


function checkColA() {

    const val = document.getElementById("answer-col-A").value;
    const fb  = document.getElementById("feedback-col-A");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val == 3) {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        colAnsweredCorrectA = true;
        soal2Benar = true;
        checkAyoCoba8Completed();

        document.getElementById("col-animation-A").style.display = "block";

        stopColTutorialA();
        startColTutorialA();

        document.getElementById("col-repeat-A").classList.remove("hidden");

        // 🔊 SUARA BENAR
        playFeedbackSound(true);

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        // 🔊 SUARA SALAH
        playFeedbackSound(false);
    }

    document.getElementById("col-repeat-msg-A").textContent = "";
}


function restartColTutorialA() {

    if (!colAnsweredCorrectA) {
        document.getElementById("col-repeat-msg-A")
            .textContent = "Maaf, kerjakan soal terlebih dahulu.";
        return;
    }

    document.getElementById("col-repeat-msg-A").textContent = "";

    stopColTutorialA();
    startColTutorialA();
}


function stopColTutorialA() {

    if (colIntervalA) {
        clearInterval(colIntervalA);
        colIntervalA = null;
    }

    const box = document.querySelector(".column-tutorial-A");
    if (!box) return;

    box.querySelectorAll("td")
        .forEach(td => td.classList.remove("active-col"));
}

function stopRowTutorialA() {

    if (rowIntervalA) {
        clearInterval(rowIntervalA);
        rowIntervalA = null;
    }

    const box = document.querySelector(".row-tutorial-A");
    if (!box) return;

    box.querySelectorAll("tr")
        .forEach(tr => tr.classList.remove("active"));
}
function restartRowTutorialA() {

    if (!rowAnsweredCorrectA) {
        document.getElementById("row-repeat-msg-A")
            .textContent = "Maaf, kerjakan soal terlebih dahulu.";
        return;
    }

    document.getElementById("row-repeat-msg-A").textContent = "";

    stopRowTutorialA();
    startRowTutorialA();
}

/* =====================================================
            SOAL AYO KITA COBA ELEMEN
===================================================== */
function checkMatrixA() {

    const correct = {
        "val-a11": 50,
        "val-a12": 335,
        "val-a23": 105,
        "val-a33": 108,
        "idx-89": "a21",
        "idx-76": "a22",
        "idx-96": "a31"
    };

    let allCorrect = true;

    for (let id in correct) {

        const input = document.getElementById(id);
        let value = input.value.trim();

        if (input.type === "number") {
            value = parseInt(value);
        }

        if (value != correct[id]) {
            input.style.border = "2px solid red";
            allCorrect = false;
        } else {
            input.style.border = "2px solid green";
        }
    }

    const feedback = document.getElementById("feedback-matrix-A");
    feedback.classList.remove("feedback-success", "feedback-error");

    if (allCorrect) {
        matrixAnsweredCorrectA = true; // 🔥 TAMBAHKAN
        soal3Benar = true;
        checkAyoCoba8Completed();
        feedback.textContent = "✅ Semua jawaban benar!";
        feedback.classList.add("feedback-success");

        // 🔊 Suara BENAR
        playFeedbackSound(true);

    } else {
        feedback.textContent = "❌ Masih ada yang salah, periksa kembali.";
        feedback.classList.add("feedback-error");

        // 🔊 Suara SALAH
        playFeedbackSound(false);
    }
}



// ===== TUTORIAL ELEMEN =====

document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".matrix-interactive").forEach(matrix => {

        const cells = matrix.querySelectorAll("td");
        const infoBox = matrix
            .closest(".matrix-hybrid-box")
            .querySelector(".matrix-info");

        // ambil nama matriks (default = a)
        const matrixName = matrix.dataset.matrixName || "a";

        cells.forEach(cell => {
            cell.addEventListener("click", () => {

                cells.forEach(c => c.classList.remove("active"));
                cell.classList.add("active");

                const i = cell.dataset.i;
                const j = cell.dataset.j;

                infoBox.innerHTML =
                    `Baris ke-${i}, Kolom ke-${j} (${matrixName}<sub>${i}${j}</sub>)`;
            });
        });

    });

});

function checkAyoCoba8Completed() {

    if (soal1Benar && soal2Benar && soal3Benar) {

        console.log("SEMUA SOAL HALAMAN 8 SELESAI");

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'pengenalan_matriks',
                sub_materi_slug: 'ayo-kita-coba-8'
            })
        })
        .then(res => res.json())
        .then(() => {
            // 🔥 langsung unlock tombol TANPA reload
            const btn = document.querySelector('[data-check="ayo-kita-coba-8"]');
            if (btn) {
                btn.dataset.allowed = "1";
            }
        });

    }
}


// TANDA ACTIVE IKUT BERUBAH SESUAI SCROLL SECTION //
// const sections = Array.from(
//   document.querySelectorAll('.page-section[id]')
// );

let currentActive = null;



function detectActiveSection() {
  const offset = 140;
  let found = null;

  // posisi scroll + tinggi viewport
  const scrollPos = window.scrollY + offset;
  const pageBottom = window.scrollY + window.innerHeight >=
                     document.documentElement.scrollHeight - 5;

  // 1️⃣ Jika sudah di paling bawah → paksa ke section terakhir
  if (pageBottom) {
    found = sections[sections.length - 1];
  } else {
    // 2️⃣ Normal scan
    for (let i = sections.length - 1; i >= 0; i--) {
      const sec = sections[i];
      const top = sec.offsetTop;
      if (scrollPos >= top) {
        found = sec;
        break;
      }
    }
  }

  if (found && found.id !== currentActive) {
    currentActive = found.id;
    activateSidebarFor(found.id);
  }
}


// window.addEventListener('scroll', detectActiveSection);
// window.addEventListener('load', detectActiveSection);


    </script>


<!-- JS DIAGRAM -->
 <script>
const ctx = document.getElementById('ptChart').getContext('2d');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Kalimantan Selatan', 'Jawa Timur', 'Yogyakarta'],
        datasets: [
            {
                label: 'Tahun 2025',
                data: [50, 335, 106],
                borderWidth: 1
            },
            {
                label: 'Tahun 2024',
                data: [54, 344, 105],
                borderWidth: 1
            },
            {
                label: 'Tahun 2023',
                data: [50, 334, 108],
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top'
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return `${context.dataset.label}: ${context.parsed.y}`;
                    }
                }
            },
            title: {
                display: true,
                text: 'Jumlah Perguruan Tinggi (Negeri + Swasta)'
            }
        },
        scales: {
            x: {
                grid: {
                    display: false,
                    drawBorder: false
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                    display: false,
                    drawBorder: false
                }
            }
        }
    }
});
</script>

<script>
const unlockedSlides = @json($progress);
console.log("UNLOCKED:", unlockedSlides);

</script>

<!-- MATERI SLIDE -->
<!-- MATERI SLIDE (FINAL) -->
<!-- MATERI SLIDE (FINAL) -->
<script>
document.addEventListener("DOMContentLoaded", () => {

  const slides = Array.from(document.querySelectorAll(".materi-slide"));
  const indicator = document.getElementById("slideIndicator");

  if (!slides.length) return;

  window.currentIndex = 0;
window.dots = [];
window.maxUnlockedIndex = 0;


  /* ================= USER BARU = HANYA SLIDE 0 ================= */

//   let maxUnlockedIndex = 0;
if (Array.isArray(unlockedSlides) && unlockedSlides.length) {

    unlockedSlides.forEach(sectionSlug => {

        const firstIndex = slides.findIndex(
            slide => slide.dataset.section === sectionSlug
        );

        if (firstIndex !== -1 && firstIndex > window.maxUnlockedIndex) {
            window.maxUnlockedIndex = firstIndex;
        }

    });

}






  /* ================= DOT ================= */

  if (indicator) {
    slides.forEach((slide, i) => {

      const dot = document.createElement("span");
      dot.textContent = i + 1;

      if (i > window.maxUnlockedIndex)
 {
        dot.classList.add("locked-dot");
      }

      dot.addEventListener("click", () => {
        if (i > window.maxUnlockedIndex)
 return;
        showSlide(i);
      });

      indicator.appendChild(dot);
      dots.push(dot);
    });
  }

  function updateIndicator(i) {
    dots.forEach(d => d.classList.remove("active"));
    if (dots[i]) dots[i].classList.add("active");
  }

  window.showSlide = function(i, force = false) {

    if (i < 0 || i >= slides.length) return;

    if (!force && i > window.maxUnlockedIndex) return;

    if (force && i > window.maxUnlockedIndex) {
        window.maxUnlockedIndex = i;

        for (let x = 0; x <= i; x++) {
            if (dots[x]) {
                dots[x].classList.remove("locked-dot");
            }
        }
    }

    slides.forEach(s => s.classList.remove("active"));
    slides[i].classList.add("active");

    window.currentIndex = i;
    updateIndicator(i);

    const section = slides[i].dataset.section;
    if (section && window.activateSidebarFor) {
        activateSidebarFor(section);
    }

    window.location.hash = "slide-" + i;
}





  document.addEventListener("click", e => {

    if (e.target.closest(".btn-next-slide")) {

      if (currentIndex < slides.length - 1) {

        const nextIndex = currentIndex + 1;

        // buka 1 slide saja setiap klik
        if (nextIndex > window.maxUnlockedIndex) {
    window.maxUnlockedIndex = nextIndex;


          if (dots[nextIndex]) {
            dots[nextIndex].classList.remove("locked-dot");
          }
        }

        showSlide(nextIndex);
      }
    }

    if (e.target.closest(".btn-prev-slide")) {
      showSlide(currentIndex - 1);
    }

  });

  /* ================= INIT ================= */

  /* ================= HASH CHANGE LISTENER ================= */
window.addEventListener("hashchange", () => {

    const hash = window.location.hash.replace("#", "");

    if (hash.startsWith("slide-")) {

        const indexFromHash = parseInt(hash.replace("slide-", ""));

        if (!isNaN(indexFromHash)) {
            showSlide(indexFromHash);
        }
    }

});



  // kalau user lama → buka slide terakhir
  /* ================= INIT ================= */

/* ================= INIT ================= */

const hash = window.location.hash.replace("#", "");

if (hash) {

    if (hash.startsWith("slide-")) {

        const indexFromHash = parseInt(hash.replace("slide-", ""));

        if (!isNaN(indexFromHash)) {
            showSlide(indexFromHash, true); // 🔥 TAMBAH force = true
            return;
        }
    }

    const sectionIndex = slides.findIndex(
        s => s.dataset.section === hash
    );

    if (sectionIndex !== -1) {
        showSlide(sectionIndex, true); // 🔥 TAMBAH force
        return;
    }
}

showSlide(0);





});
</script>

<script>
document.querySelectorAll('#sidebar_materi .sidebar-sublink')
.forEach(link => {

    link.addEventListener('click', function(e){

        const section = this.dataset.section;

        if(!section) return;

        const slides = Array.from(document.querySelectorAll('.materi-slide'));

        const targetIndex = slides.findIndex(
            s => s.dataset.section === section
        );

        if(targetIndex === -1) return;

        // 🔒 cek apakah slide sudah dibuka
        if(targetIndex > window.maxUnlockedIndex){
            e.preventDefault();
            return;
        }

        e.preventDefault();

        showSlide(targetIndex);

    });

});

</script>


<!-- UNLOCK logic -->

<script>
document.addEventListener("click", function(e){

    if(e.target.closest(".btn-next-slide")) {

        const slides = Array.from(document.querySelectorAll(".materi-slide"));
        const activeIndex = slides.findIndex(s => s.classList.contains("active"));
        const nextSlide = slides[activeIndex + 1];

        if(!nextSlide) return;

        const section = nextSlide.dataset.section;

        fetch("{{ route('progress.unlock') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content")
            },
            body: JSON.stringify({
                materi_slug: "pengenalan_matriks",
                sub_materi_slug: section
            })
        })
        .then(res => res.json())
        .then(() => {
    console.log("Unlocked:", section);

    if (!unlockedSlides.includes(section)) {
        unlockedSlides.push(section);
    }

    // buka slide di sidebar tanpa refresh
const slides = Array.from(document.querySelectorAll('.materi-slide'));

const unlockedIndex = slides.findIndex(
    s => s.dataset.section === section
);

if(unlockedIndex !== -1 && unlockedIndex > window.maxUnlockedIndex){
    window.maxUnlockedIndex = unlockedIndex;
}

    // 🔥 BUKA LOCK DI SIDEBAR
    const sidebarLink = document.querySelector(
        `#sidebar_materi .sidebar-sublink[data-section="${section}"]`
    );

    if (sidebarLink) {
        sidebarLink.classList.remove("locked");

        const lockIcon = sidebarLink.querySelector(".bi-lock-fill");
        if (lockIcon) lockIcon.remove();
    }

});


    }

});
</script>


<script>
    document.querySelectorAll('.materi-slide').forEach((slide, i) => {
  const prevBtn = slide.querySelector('.btn-prev-slide');
  if (prevBtn && i === 0) {
    prevBtn.style.visibility = 'hidden';
  }
});

</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const buttons = document.querySelectorAll(".btn-next-slide");

    buttons.forEach(btn => {
        btn.addEventListener("click", function(e) {

            const check = this.dataset.check;
            const allowed = this.dataset.allowed;

            if (check && check.startsWith("mari-mencoba")) {

                if (allowed !== "1") {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    document.getElementById("lockedPopup").style.display = "flex";
                    return false;
                }

            }

            // lanjut normal
            goToNextSlide();

        });
    });

});

function closePopup() {
    document.getElementById("lockedPopup").style.display = "none";
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".btn-next-slide").forEach(btn => {

        btn.addEventListener("click", function(e) {

            const check = this.dataset.check;
            const allowed = this.dataset.allowed;

            // 🔥 hanya cek halaman latihan
            if (
                check === "mari-mencoba-1" ||
                check === "mari-mencoba-2" ||
                check === "ayo-kita-coba-7" ||
                check === "ayo-kita-coba-8"
            ) {
                if (allowed !== "1") {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    document.getElementById("lockedPopup").style.display = "flex";
                    return false;
                }
            }

            // lanjut normal
            goToNextSlide();
        });

    });

});

function closePopup() {
    document.getElementById("lockedPopup").style.display = "none";
}
</script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</body>
</html>