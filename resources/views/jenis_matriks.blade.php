@php
$slidesOrder = [
    'matriks-baris',
    'matriks-persegi',
    'matriks-datar-tegak',
    'matriks-segitiga',
    'matriks-diagonal',
    'matriks-identitas',
    'matriks-nol',
    'matriks-simetris',
    'matriks-transpos',
    'mari-mencoba-jenis',
    'kuis-jenis-matriks'
];

// ✅ langsung pakai
$unlocked = $progress;

// pastikan slide pertama selalu terbuka
if (!in_array('matriks-baris', $unlocked)) {
    $unlocked[] = 'matriks-baris';
}
@endphp



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Materi Jenis-Jenis Matriks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/materi_pengertian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jenis_matriks.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

{{-- ================= NAVBAR ================= --}}
@include('layouts.header')

<div class="d-flex">

    {{-- ================= SIDEBAR ================= --}}
    @include('layouts.sidebar_materi')

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="main-content flex-grow-1 p-4">
      <!-- <div class="pengenalan-matriks-header">
          <h1>JENIS - JENIS MATRIKS</h1>
      </div> -->
        <div class="dashboard-wrapper p-4">

            {{-- ================= SECTION MATRIKS BARIS ================= --}}
            <section class="materi-slide active" data-section="matriks-baris">


            <div class="pengenalan-matriks-header">
                <h1>JENIS - JENIS MATRIKS</h1>
            </div>
                {{-- Tujuan Pembelajaran --}}
                <div class="tujuan-box">
                    <h3 class="tujuan-title">Tujuan Pembelajaran</h3>
                    <ol class="tujuan-list">
                        <li>Peserta didik mampu membedakan jenis-jenis matriks melalui kegiatan pembelajaran dengan tepat.</li>
                        <li>Peserta didik mampu menentukan matriks transpos dari matriks yang diberikan dengan benar.</li>
                    </ol>
                </div>

                {{-- Judul Materi --}}
                <h2 class="materi-title">1. Matriks Baris dan Matriks Kolom</h2>
                <p>
                    Perhatikan contoh <strong>matriks baris</strong> di bawah ini!
                </p>
                <h5>Contoh 1:</h5>
                <div class="text-center my-3 matrix-display-big">
                    \( A_{1 \times 2} = \begin{bmatrix} 85 & 70 \end{bmatrix} \)
                </div>
                <!-- <p>
                    Matriks diatas merupakan contoh matriks baris dengan ordo 1 × 2, yang berarti memiliki satu baris dan dua kolom.
                </p> -->
                <br>
                <h5>Contoh 2:</h5>
                <p>
                    Seorang pedagang buah mencatat jumlah buah yang terjual dalam satu hari sebagai berikut:
                </p>
                <ul>
                    <li>Apel: 65 buah</li>
                    <li>Jeruk: 60 buah</li>
                    <li>Pisang: 90 buah</li>
                    <li>Mangga: 95 buah</li>
                </ul>
                <p>
                    Data penjualan tersebut dapat dinyatakan dalam bentuk <strong>matriks baris</strong> karena hanya terdiri dari satu baris data, yaitu:
                </p>
                <br>
                <div class="text-center my-3 matrix-display-big">
                  \[
                  B_{1 \times 4} =
                  \begin{bmatrix}
                  65 & 60 & 90 & 95
                  \end{bmatrix}
                  \]
                </div>
                <!-- <p>
                    Matriks \( B \) tersebut adalah matriks baris berordo 1 × 4, yaitu memiliki satu baris dengan empat elemen kolom di dalamnya. 
                    Angka-angka pada matriks menunjukkan jumlah buah yang terjual dan setiap kolom mewakili satu jenis buah.
                </p> -->

                <br>
                <p>
                    Perhatikan contoh <strong>matriks kolom</strong> di bawah ini!
                </p>
                <h5>Contoh 1:</h5>
                <div class="text-center my-3 matrix-display-big">
                \[
                A_{2 \times 1} =
                \begin{bmatrix}
                1 \\
                3
                \end{bmatrix}
                \]
                </div>
                <!-- <p>
                    Matriks diatas adalah matriks kolom dengan ordo 2 × 1 adalah matriks yang memiliki dua baris dan satu kolom, sehingga elemen-elemennya
                    tersusun secara vertikal dalam satu kolom dengan dua nilai di dalamnya.
                </p> -->
                <br>
                <h5>Contoh 2:</h5>
                <p>
                    Penggunaan memori (dalam GB) dari beberapa aplikasi pada sebuah smartphone adalah sebagai berikut:
                </p>
                <ul>
                    <li>Instagram: 4 GB</li>
                    <li>TikTok: 5 GB</li>
                    <li>WhatsApp: 6 GB</li>
                </ul>
                <p>
                    Data penggunaan memori tersebut dapat dinyatakan dalam bentuk <strong>matriks kolom</strong> karena hanya terdiri dari satu kolom data, yaitu:
                </p>
                <div class="text-center my-3 matrix-display-big">
                \[
                A_{3 \times 1} =
                \begin{bmatrix}
                4 \\
                5 \\
                6
                \end{bmatrix}
                \]
                </div>
                <!-- <p>
                    Matriks diatas merupakan matriks kolom berordo 3 × 1, yaitu memiliki tiga baris dengan satu elemen kolom di dalamnya. 
                    Setiap elemen merepresentasikan besar memori yang digunakan oleh satu aplikasi.
                </p> -->
                <div id="matrix-quiz">
                    <div class="quiz-wrapper">
                        <div class="quiz-container">
                            <div class="quiz-header">
                                Ayo Kita Coba
                            </div>
                            <div class="quiz-question">
                                <br>
                                Perhatikan matriks berikut:
                                <br><br>
                                <div class="text-center my-3 matrix-display-big">
                                \[
                                A =
                                \begin{bmatrix}
                                5 & 9 & 2
                                \end{bmatrix}
                                \]
                                </div>
                            </div>
                            <!-- ===================== -->
                            <!-- SOAL 1 BARIS -->
                            <!-- ===================== -->
                            <div class="quiz-question">
                                1. Berapa banyak baris pada matriks \(A\)?
                            </div>
                            <div class="quiz-question">
                                Jawab:
                            </div>
                            <input type="number" id="answer-row" class="quiz-input small" placeholder="...">
                            <div class="quiz-buttons">
                                <button type="button" class="btn-check-answer" onclick="checkRow()">Periksa Jawaban</button>
                            </div>
                            <div id="feedback-row"></div>
                            <div id="row-repeat-msg" class="repeat-msg"></div>
                            <hr>
                            <!-- ===================== -->
                            <!-- SOAL 2 KOLOM -->
                            <!-- ===================== -->
                            <div id="column-question" class="hidden">
                                <div class="quiz-question">
                                    2. Berapa banyak kolom pada matriks \(A\)?
                                </div>
                                <div class="quiz-question">
                                    Jawab:
                                </div>
                                <input type="number" id="answer-col" class="quiz-input small" placeholder="...">
                                <div class="quiz-buttons">
                                    <button type="button" class="btn-check-answer" onclick="checkCol()">Periksa Jawaban</button>
                                </div>
                                <div id="feedback-col"></div>
                                <div id="col-repeat-msg" class="repeat-msg"></div>
                            </div>
                            <hr>
                            <!-- ===================== -->
                            <!-- SOAL 3 PERBANDINGAN -->
                            <!-- ===================== -->
                            <div id="compare-question" class="hidden">
                                <div class="quiz-question">
                                    3. Bandingkan banyak baris dan kolom.
                                    <br>
                                    Gunakan simbol: < , > , <= , >= , atau =.
                                </div>
                                <div class="quiz-question">
                                    Jawab:
                                </div>
                                Baris
                                <input type="text" id="answer-compare" class="quiz-input small" placeholder="...">
                                Kolom
                                <div class="quiz-buttons">
                                    <button type="button" class="btn-check-answer" onclick="checkCompare()">Periksa Jawaban</button>
                                </div>
                                <div id="feedback-compare"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="matrix-quiz">
                <div class="quiz-wrapper">
                    <div class="quiz-container">
                        <div class="quiz-header">
                            Ayo Kita Simpulkan
                        </div>
                        <!-- ===================== -->
                        <!-- SOAL 1 -->
                        <!-- ===================== -->
                        <div class="quiz-question">
                            <br>
                            1. Berdasarkan contoh-contoh di atas, apa yang dapat kamu simpulkan mengenai <b>matriks baris</b>?
                        </div>
                        <div class="quiz-question">Jawab:</div>
                        <textarea id="answer-row-matrix" class="quiz-input" rows="4"></textarea>
                        <div class="quiz-buttons">
                            <button onclick="checkRowMatrix()">Periksa Jawaban</button>
                        </div>
                        <div id="feedback-row-matrix"></div>
                        <hr>
                        <!-- ===================== -->
                        <!-- SOAL 2 -->
                        <!-- ===================== -->
                        <div id="column-question" class="hidden">
                            <div class="quiz-question">
                                2. Berdasarkan contoh-contoh di atas, apa yang dapat kamu simpulkan mengenai <b>matriks kolom</b>?
                            </div>
                            <div class="quiz-question">Jawab:</div>
                            <textarea id="answer-col-matrix" class="quiz-input" rows="4"></textarea>
                            <div class="quiz-buttons">
                                <button onclick="checkColMatrix()">Periksa Jawaban</button>
                            </div>
                            <div id="feedback-col-matrix"></div>
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="ayo-coba-jenis-1"
    data-allowed="{{ in_array('ayo-coba-jenis-1', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
                </div>
            </section>


            <section class="materi-slide" data-section="matriks-persegi">
              <!-- <hr> -->
              {{-- Judul Materi --}}
                <h2 class="materi-title">2. Matriks Persegi</h2>
                <p>
                    Perhatikan contoh matriks persegi di bawah ini!
                </p>
                <h5>Contoh 1:</h5>
                <div class="text-center my-3 matrix-display-big">
                  \[
                    A_{2 \times 2} =
                    \begin{bmatrix}
                    42 & 46 \\
                    31 & 23
                    \end{bmatrix}
                    \]
                </div>
                <!-- <p>
                    Matriks persegi diatas berordo 2 × 2 adalah matriks yang memiliki dua baris dan dua kolom. Setiap elemennya tersusun
                    dalam bentuk persegi dengan total empat elemen di dalamnya.
                </p> -->
                <br>
                <h5>Contoh 2:</h5>
                <p>
                    Sebuah stasiun cuaca mencatat suhu udara (°C) pada 3 kota di Kalimantan Selatan
                    dalam 3 waktu berbeda pada satu hari.
                </p>
                <ul>
                    <li>Baris menyatakan kota pengamatan</li>
                    <li>Kolom menyatakan waktu pengamatan</li>
                </ul>
                <p><strong>Kota yang diamati:</strong></p>
                <ol>
                    <li>Banjarmasin</li>
                    <li>Banjarbaru</li>
                    <li>Martapura</li>
                </ol>
                <!-- ===== Tabel Data ===== -->
                <div class="table-responsive table-cuaca mb-3">
                    <table class="tabel-matriks">
                        <thead>
                            <tr>
                                <th>Kota / Waktu</th>
                                <th>Pagi</th>
                                <th>Siang</th>
                                <th>Malam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Banjarmasin</td>
                                <td>26 °C</td>
                                <td>28 °C</td>
                                <td>30 °C</td>
                            </tr>
                            <tr>
                                <td>Banjarbaru</td>
                                <td>25 °C</td>
                                <td>26 °C</td>
                                <td>27 °C</td>
                            </tr>
                            <tr>
                                <td>Martapura</td>
                                <td>25 °C</td>
                                <td>31 °C</td>
                                <td>24 °C</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="image-caption">Table 2. 1 Data Cuaca Harian di Kalimantan Selatan</p>
                </div>
                <p>
                    Data cuaca tersebut dapat dinyatakan dalam bentuk matriks persegi sebagai berikut:
                </p>
                <!-- ===== Matriks ===== -->
                <div class="text-center my-3 matrix-display-big">
                    \[
                    C_{3 \times 3} =
                    \begin{bmatrix}
                    26 & 28 & 30 \\
                    25 & 26 & 27 \\
                    25 & 31 & 24
                    \end{bmatrix}
                    \]
                </div>
                <!-- <p>
                    Matriks persegi di atas berordo <strong>3 × 3</strong> yaitu matriks yang memiliki
                    tiga baris dan tiga kolom. Setiap elemennya tersusun dalam bentuk persegi dengan
                    total sembilan elemen, di mana setiap elemen merepresentasikan suhu udara pada
                    kota dan waktu pengamatan tertentu.
                </p> -->
            <!-- </div> -->
             <!-- KETERANGAN DIAGONAL -->
              <!-- ===== DIAGONAL MATRIKS C ===== -->
               <h5>Diagonal</h5>
            <div class="matrix-center-container">
                <div class="matrix-diagonal-wrapper">
                    <!-- KURUNG KIRI -->
                    <svg class="matrix-bracket-svg left" viewBox="0 0 20 150" preserveAspectRatio="none">
                    <path d="M15 5 L5 5 L5 145 L15 145"
                            stroke="#1f2933" stroke-width="3" fill="none"/>
                    </svg>
                    <!-- MATRIX -->
                    <div class="matrix-diagonal-box">
                    <table class="matrix-diagonal">
                        <tr>
                        <td>a<sub>11</sub></td>
                        <td>a<sub>12</sub></td>
                        <td>a<sub>13</sub></td>
                        </tr>
                        <tr>
                        <td>a<sub>21</sub></td>
                        <td>a<sub>22</sub></td>
                        <td>a<sub>23</sub></td>
                        </tr>
                        <tr>
                        <td>a<sub>31</sub></td>
                        <td>a<sub>32</sub></td>
                        <td>a<sub>33</sub></td>
                        </tr>
                    </table>

                    
                    <!-- SVG DIAGONAL -->
                    <svg class="matrix-diagonal-svg" viewBox="0 0 150 150">

    <!-- diagonal utama (biru) -->
    <line x1="25" y1="25" x2="125" y2="125"
        stroke="#00e5ff"
        stroke-width="26"
        stroke-linecap="round"
        opacity="0.45"/>

    <!-- diagonal samping (kuning) -->
    <line x1="125" y1="25" x2="25" y2="125"
        stroke="#ffd600"
        stroke-width="26"
        stroke-linecap="round"
        opacity="0.45"/>

</svg>
                    </div>
                    <!-- KURUNG KANAN -->
                    <svg class="matrix-bracket-svg right" viewBox="0 0 20 150" preserveAspectRatio="none">
                    <path d="M5 5 L15 5 L15 145 L5 145"
                            stroke="#1f2933" stroke-width="3" fill="none"/>
                    </svg>
                    <!-- KETERANGAN -->
                    <div class="matrix-diagonal-info">
                    <p><span class="legend main"></span> Diagonal Utama Matriks C</p>
                    <p><span class="legend secondary"></span> Diagonal Samping Matriks C</p>
                    </div>
                </div>
                </div>
                <p>
                    Diagonal utama pada suatu matriks adalah kumpulan elemen yang berada pada garis diagonal yang membentang dari sudut kiri
                    atas menuju sudut kanan bawah. Sementara itu, diagonal samping matriks merupakan deretan elemen yang terletak pada garis
                    diagonal dari sudut kiri bawah hingga ke sudut kanan atas.
                </p>
                <div id="matrix-quiz">
                    <div class="quiz-wrapper">
                        <div class="quiz-container">
                            <div class="quiz-header">
                                Ayo Kita Coba
                            </div>
                            <br>
                            <!-- ===================== -->
                            <!-- SOAL 1 -->
                            <!-- ===================== -->
                            <div class="quiz-question">
                                1. Perhatikan matriks di bawah ini!
                            </div>
                            <div class="text-center my-3 matrix-display-big">
                                \[
                                A =
                                \begin{bmatrix}
                                1 & 2 \\
                                3 & 4
                                \end{bmatrix}
                                \quad
                                B =
                                \begin{bmatrix}
                                5 & 6 & 7 \\
                                8 & 9 & 1
                                \end{bmatrix}
                                \quad
                                C =
                                \begin{bmatrix}
                                2 & 4 & 6 \\
                                1 & 3 & 5 \\
                                7 & 8 & 9
                                \end{bmatrix}
                                \]
                            </div>
                            <div class="quiz-question">
                                Pilihlah matriks yang termasuk matriks persegi:
                            </div>
                            <label><input type="checkbox" id="checkA"> Matriks \(A\)</label><br>
                            <label><input type="checkbox" id="checkB"> Matriks \(B\)</label><br>
                            <label><input type="checkbox" id="checkC"> Matriks \(C\)</label>
                            <div class="quiz-buttons mt-2">
                                <button onclick="checkSquare()">Periksa Jawaban</button>
                            </div>
                            <div id="feedback-square"></div>
                            <hr>
                            <!-- ===================== -->
                            <!-- SOAL 2 -->
                            <!-- ===================== -->
                            <div id="definition-question" class="hidden">
                                <div class="quiz-question">
                                    2. Lengkapilah kalimat di bawah ini:
                                </div>
                                <div class="quiz-question">
                                    Matriks persegi adalah matriks yang memiliki jumlah
                                    <input type="text" id="fill1" class="quiz-input medium" placeholder="...">
                                    dan
                                    <input type="text" id="fill2" class="quiz-input medium" placeholder="...">
                                    yang sama.
                                </div>
                                <div class="quiz-buttons">
                                    <button onclick="checkDefinition()">Periksa Jawaban</button>
                                </div>
                                <div id="feedback-definition"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="ayo-coba-jenis-2"
    data-allowed="{{ in_array('ayo-coba-jenis-2', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
                </div>

            </section>






            <section class="materi-slide" data-section="matriks-datar-tegak">
              <!-- <hr> -->
              {{-- Judul Materi --}}
                <h2 class="materi-title">3. Matriks Datar dan Matriks Tegak</h2>
                <br>
                <!-- <h4>• Matriks Datar</h4> -->
                <p>
                    Perhatikan contoh <strong>matriks datar</strong> di bawah ini!
                </p>
                <h5>Contoh:</h5>
                <p>
                    Sebuah kios sembako mencatat jumlah penjualan 4 jenis produk selama 3 hari berturut-turut.
                </p>
                <ul>
                    <li>Baris menyatakan hari pengamatan</li>
                    <li>Kolom menyatakan jenis produk</li>
                </ul>
                <p><strong>Produk yang dijual:</strong></p>
                <ol>
                    <li>Beras</li>
                    <li>Gula</li>
                    <li>Minyak Goreng</li>
                    <li>Telur</li>
                </ol>
                <!-- ===== Tabel Data ===== -->
                <div class="table-responsive table-cuaca mb-3">
                    <table class="tabel-matriks">
                        <thead>
                            <tr>
                                <th>Hari / Produk</th>
                                <th>Beras</th>
                                <th>Gula</th>
                                <th>Minyak Goreng</th>
                                <th>Telur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hari ke-1</td>
                                <td>1</td>
                                <td>3</td>
                                <td>2</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>Hari ke-2</td>
                                <td>4</td>
                                <td>9</td>
                                <td>5</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>Hari ke-3</td>
                                <td>1</td>
                                <td>7</td>
                                <td>8</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="image-caption">Table 2. 2 Data Penjualan Produk Sembako</p>
                </div>
                <p>
                    Data penjualan tersebut dapat dinyatakan dalam bentuk matriks:
                </p>
                <div class="text-center my-3 matrix-display-big">
                  \[
                    A_{3 \times 4} =
                    \begin{bmatrix}
                    1 & 3 & 2 & 4 \\
                    4 & 9 & 5 & 6 \\
                    1 & 7 & 8 & 2
                    \end{bmatrix}
                    \]
                </div>
                <br>
                <!-- <P>
                    Matriks datar berordo 3 × 4 diatas adalah matriks yang memiliki tiga baris dan empat kolom, sehingga jumlah kolomnya lebih
                    banyak daripada jumlah barisnya. Matriks ini berbentuk persegi panjang mendatar.
                </P> -->
                <br>
                <p>
                    Perhatikan contoh <strong>matriks tegak</strong> di bawah ini!
                </p>
                <h5>Contoh:</h5>
                <p>
                    Di teras rumah terdapat dua rak sepatu yang diletakkan berdampingan, yaitu Rak A dan Rak B.
                    Masing-masing rak memiliki 3 tingkat.
                </p>
                <ul>
                    <li>Baris menyatakan tingkat rak</li>
                    <li>Kolom menyatakan rak sepatu</li>
                </ul>
                <p><strong>Rak yang diamati:</strong></p>
                <ol>
                    <li>Rak A (sebelah kiri)</li>
                    <li>Rak B (sebelah kanan)</li>
                </ol>
                <p>
                    Jumlah sepatu pada setiap tingkat adalah sebagai berikut:
                </p>
                <!-- ===== Tabel Data ===== -->
                <div class="table-responsive table-cuaca mb-3">
                    <table class="tabel-matriks">
                        <thead>
                            <tr>
                                <th>Tingkat / Rak</th>
                                <th>Rak A</th>
                                <th>Rak B</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tingkat Atas</td>
                                <td>7</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>Tingkat Tengah</td>
                                <td>5</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Tingkat Bawah</td>
                                <td>4</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="image-caption">Table 2. 3 Rak Sepatu di Teras Rumah</p>
                </div>
                <p>
                    Data penjualan tersebut dapat dinyatakan dalam bentuk matriks:
                </p>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    B_{3 \times 2} =
                    \begin{bmatrix}
                    7 & 6 \\
                    5 & 3 \\
                    4 & 2
                    \end{bmatrix}
                    \]
                </div>
                <!-- <p>
                    Matriks tegak diatas berordo 3 × 2 adalah matriks yang terdiri atas tiga baris dan dua kolom, sehingga jumlah barisnya
                    lebih banyak daripada jumlah kolomnya. Matriks ini berbentuk persegi panjang tegak.
                </p> -->
                <div id="matrix-quiz-compare">
                    <div class="quiz-wrapper">
                        <div class="quiz-container">
                            <div class="quiz-header">
                                Ayo Kita Coba
                            </div>
                            <!-- ===================== -->
                            <!-- SOAL 1 -->
                            <!-- ===================== -->
                            <div class="quiz-question">
                                <br>
                                1. Hubungan baris dan kolom pada <b>matriks datar</b> adalah
                                <br>
                                Tuliskan menggunakan simbol: &lt;, &gt;, &lt;=, &gt;=, atau =.
                                <br>
                                Jawab:
                            </div>
                            <div class="quiz-question">
                                Baris
                                <input type="text" id="answer-datar" class="quiz-input small" placeholder="...">
                                kolom
                            </div>
                            <div class="quiz-buttons">
                                <button onclick="checkDatar()">Periksa Jawaban</button>
                            </div>
                            <div id="feedback-datar"></div>
                            <hr>
                            <!-- ===================== -->
                            <!-- SOAL 2 -->
                            <!-- ===================== -->
                            <div id="tegak-question" class="hidden">
                                <div class="quiz-question">
                                    2. Hubungan baris dan kolom pada <b>matriks tegak</b> adalah
                                    <br>
                                    Tuliskan menggunakan simbol: &lt;, &gt;, &lt;=, &gt;=, atau =.
                                    <br>
                                    Jawab:
                                </div>
                                <div class="quiz-question">
                                    Baris 
                                    <input type="text" id="answer-tegak" class="quiz-input small" placeholder="...">
                                    kolom
                                </div>
                                <div class="quiz-buttons">
                                    <button onclick="checkTegak()">Periksa Jawaban</button>
                                </div>
                                <div id="feedback-tegak"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="matrix-quiz">
                    <div class="quiz-wrapper">
                        <div class="quiz-container">
                            <div class="quiz-header">
                                Ayo Kita Simpulkan
                            </div>
                            <!-- ===================== -->
                            <!-- SOAL 1 -->
                            <!-- ===================== -->
                            <div class="quiz-question">
                                <br>
                                1. Berdasarkan contoh-contoh di atas, apa yang dapat kamu simpulkan mengenai <b>matriks datar</b>?
                            </div>
                            <div class="quiz-question">Jawab:</div>
                            <textarea id="answer-datar-matrix" class="quiz-input" rows="4"></textarea>
                            <div class="quiz-buttons">
                                <button onclick="checkDatarMatrix()">Periksa Jawaban</button>
                            </div>
                            <div id="feedback-datar-matrix"></div>
                            <hr>
                            <!-- ===================== -->
                            <!-- SOAL 2 -->
                            <!-- ===================== -->
                            <div id="tegak-question" class="hidden">
                                <div class="quiz-question">
                                    2. Berdasarkan contoh-contoh di atas, apa yang dapat kamu simpulkan mengenai <b>matriks tegak</b>?
                                </div>
                                <div class="quiz-question">Jawab:</div>
                                <textarea id="answer-tegak-matrix" class="quiz-input" rows="4"></textarea>
                                <div class="quiz-buttons">
                                    <button onclick="checkTegakMatrix()">Periksa Jawaban</button>
                                </div>
                                <div id="feedback-tegak-matrix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="ayo-coba-jenis-3"
    data-allowed="{{ in_array('ayo-coba-jenis-3', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
                </div>
                </section>


                <section class="materi-slide" data-section="matriks-segitiga">
              <!-- <hr> -->
              {{-- Judul Materi --}}
                <h2 class="materi-title">4. Matriks Segitiga</h2>
                <br>
                <p>
                    Matriks segitiga merupakan jenis matriks persegi yang memiliki elemen-elemen bernilai nol di salah satu sisi diagonal
                    utamanya, baik di atas maupun di bawah diagonal tersebut. Dengan kata lain, hanya setengah bagian dari matriks yang
                    berisi nilai bukan nol. Matriks ini dibedakan menjadi dua jenis, yaitu matriks segitiga atas (elemen di bawah diagonal
                    utama bernilai nol) dan matriks segitiga bawah (elemen di atas diagonal utama bernilai nol). 
                </p>
                <br>
                <p>
                    <strong>Matriks Segitiga Atas yaitu matriks yang elemen elemen yang berada di bawah diagonal utama bernilai nol.</strong>
                </p>
                <p>
                    Berikut ini merupakan contoh dari matriks segitiga atas :
                </p>
                <h5>Contoh:</h5>
                <p>
                    Sebuah rak tanaman hias memiliki tiga tingkat dengan lebar yang berbeda. Tingkat paling atas
                    memiliki tiga tempat pot, tingkat tengah memiliki dua tempat pot, dan tingkat paling bawah
                    hanya memiliki satu tempat pot. Setiap tempat pot berisi tanaman hias dengan jumlah yang berbeda.
                </p>
                <p><strong>Susunan tanaman hias pada rak:</strong></p>
                <ul>
                    <li>Rak Atas
                        <ul>
                            <li>Kiri: 7 tanaman hias</li>
                            <li>Tengah: 4 tanaman hias</li>
                            <li>Kanan: 1 tanaman hias</li>
                        </ul>
                    </li>
                    <li>Rak Tengah
                        <ul>
                            <li>Kiri: tidak ada tempat rak</li>
                            <li>Tengah: 2 tanaman hias</li>
                            <li>Kanan: 3 tanaman hias</li>
                        </ul>
                    </li>
                    <li>Rak Bawah
                        <ul>
                            <li>Kiri: tidak ada tempat rak</li>
                            <li>Tengah: tidak ada tempat rak</li>
                            <li>Kanan: 5 tanaman hias</li>
                        </ul>
                    </li>
                </ul>
                <p>
                    Susunan jumlah tanaman hias tersebut dapat direpresentasikan dalam bentuk matriks sebagai berikut:
                </p>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    A_{3 \times 3} =
                    \begin{bmatrix}
                    7 & 4 & 1 \\
                    0 & 2 & 3 \\
                    0 & 0 & 5
                    \end{bmatrix}
                    \]
                </div>
                <div class="triangular-container">
                    <div class="matrix-frame">
                        <span class="matrix-label">\( A = \)</span>
                        <span class="math-bracket-3">\( \left[ \right. \)</span>
                        <table class="matrix-triangular">
                            <tr>
                                <td class="upper">7</td>
                                <td class="upper">4</td>
                                <td class="upper">1</td>
                            </tr>
                            <tr>
                                <td class="lower-zero">0</td>
                                <td class="upper">2</td>
                                <td class="upper">3</td>
                            </tr>
                            <tr>
                                <td class="lower-zero">0</td>
                                <td class="lower-zero">0</td>
                                <td class="upper">5</td>
                            </tr>
                        </table>
                        <span class="math-bracket-3">\( \left] \right. \)</span>
                    </div>
                    <p class="info-text">Elemen matriks segitiga atas</p>
                </div>
                <br>
                <p><strong>Matriks Segitiga Bawah yaitu matriks yang elemen elemen yang berada di atas diagonal utama bernilai nol.</strong>
                </p>
                <p>
                    Berikut ini merupakan contoh dari matriks segitiga bawah :
                </p>
                <h5>Contoh:</h5>
                <p>
                    Sebuah rak tanaman hias memiliki tiga tingkat dengan lebar yang berbeda.
                    Pada rak ini, semakin ke bawah tingkat rak semakin lebar.
                    Rak paling atas hanya memiliki satu tempat pot, rak tengah memiliki dua tempat pot,
                    dan rak paling bawah memiliki tiga tempat pot.
                    Setiap tempat pot berisi tanaman hias dengan jumlah yang berbeda.
                </p>
                <p><strong>Susunan tanaman hias pada rak:</strong></p>
                <ul>
                    <li>Rak Atas
                        <ul>
                            <li>Kiri: 7 tanaman hias</li>
                            <li>Tengah: tidak ada tempat rak</li>
                            <li>Kanan: tidak ada tempat rak</li>
                        </ul>
                    </li>
                    <li>Rak Tengah
                        <ul>
                            <li>Kiri: 1 tanaman hias</li>
                            <li>Tengah: 2 tanaman hias</li>
                            <li>Kanan: tidak ada tempat rak</li>
                        </ul>
                    </li>
                    <li>Rak Bawah
                        <ul>
                            <li>Kiri: 6 tanaman hias</li>
                            <li>Tengah: 8 tanaman hias</li>
                            <li>Kanan: 5 tanaman hias</li>
                        </ul>
                    </li>
                </ul>
                <p>
                    Susunan jumlah tanaman hias tersebut dapat direpresentasikan dalam bentuk matriks sebagai berikut:
                </p>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    A_{3 \times 3} =
                    \begin{bmatrix}
                    7 & 0 & 0 \\
                    1 & 2 & 0 \\
                    6 & 8 & 5
                    \end{bmatrix}
                    \]
                </div>
                <div class="triangular-container">
                    <div class="matrix-frame">
                        <span class="matrix-label">\( A = \)</span>
                        <span class="math-bracket-3">\( \left[ \right. \)</span>
                        <table class="matrix-triangular">
                            <tr>
                                <td class="lower">7</td>
                                <td class="upper-zero">0</td>
                                <td class="upper-zero">0</td>
                            </tr>
                            <tr>
                                <td class="lower">1</td>
                                <td class="lower">2</td>
                                <td class="upper-zero">0</td>
                            </tr>
                            <tr>
                                <td class="lower">6</td>
                                <td class="lower">8</td>
                                <td class="lower">5</td>
                            </tr>
                        </table>
                        <span class="math-bracket-3">\( \left] \right. \)</span>
                    </div>
                    <p class="info-text">Elemen matriks segitiga bawah</p>
                </div>
                <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                </div>
                </section>
                <section class="materi-slide" data-section="matriks-diagonal">
                <!-- <hr> -->
              {{-- Judul Materi --}}
                <h2 class="materi-title">5. Matriks Diagonal</h2>
                <br>
                <p>
                    Matriks diagonal merupakan matriks persegi yang memiliki elemen-elemen bernilai bukan nol hanya pada diagonal utamanya,
                    sedangkan semua elemen di luar diagonal utama bernilai nol. Dengan kata lain, hanya elemen-elemen yang terletak dari
                    sudut kiri atas hingga sudut kanan bawah yang memiliki nilai, sementara sisanya bernilai nol.
                </p>
                </p>
                <p>
                    Berikut ini merupakan contoh dari matriks diagonal :
                </p>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    A_{3 \times 3} =
                    \begin{bmatrix}
                    3 & 0 & 0 \\
                    0 & 8 & 0 \\
                    0 & 0 & 5
                    \end{bmatrix}
                    \]
                </div>
                <div class="triangular-container">
                <div class="matrix-frame">
                    <span class="matrix-label">\( A = \)</span>
                    <span class="math-bracket-3">\( \left[ \right. \)</span>
                    <table class="matrix-triangular matrix-diagonal">
                        <tr>
                            <td class="diagonal">3</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td class="diagonal">8</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td>0</td>
                            <td class="diagonal">5</td>
                        </tr>
                    </table>
                    <span class="math-bracket-3">\( \left] \right. \)</span>
                </div>
                <!-- <p class="info-text">Elemen matriks diagonal</p> -->
            </div>
            <h5>Contoh:</h5>
            <p>
                Di dalam suatu meja terdapat dua kotak pensil, yaitu kotak pensil milik <strong>Nisa</strong> dan <strong>Raisa</strong>.
            </p>
            <p>
                Pada saat pelajaran berlangsung, <strong>Nisa meminjamkan 4 pensil</strong>
                kepada temannya sehingga jumlah pensil Nisa berkurang.
                Sementara itu, <strong>Raisa mendapatkan 2 pensil baru</strong> dari orang
                tuanya sehingga jumlah pensil Raisa bertambah.
            </p>
            <p>
                Perubahan pada kotak pensil Nisa tidak memengaruhi perubahan pada kotak
                pensil Raisa, dan sebaliknya.
            </p>
            <p>
                Pernyataan di atas dapat direpresentasikan dalam bentuk matriks sebagai berikut:
            </p>
            <div class="text-center my-3 matrix-display-big">
               \[
                A_{2 \times 2} =
                \begin{bmatrix}
                -4 & 0 \\
                0 & 2
                \end{bmatrix}
                \]
            </div>
            <div class="triangular-container">
                <div class="matrix-frame">
                    <span class="matrix-label">\( A = \)</span>
                    <span class="math-bracket-3">\( \left[ \right. \)</span>
                    <table class="matrix-triangular matrix-diagonal">
                        <tr>
                            <td class="diagonal">-4</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td class="diagonal">2</td>
                        </tr>
                    </table>
                    <span class="math-bracket-3">\( \left] \right. \)</span>
                </div>
                <!-- <p class="info-text">
                    Perubahan pensil Nisa dan Raisa direpresentasikan oleh elemen diagonal
                </p> -->
            </div>
            <div class="slide-nav mt-4 text-end">
                <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
            </div>
                </section>




                <section class="materi-slide" data-section="matriks-identitas">
                <!-- <hr> -->
                {{-- Judul Materi --}}
                <h2 class="materi-title">6. Matriks Identitas</h2>
                <br>
                <p>
                    Perhatikan contoh matriks identitas di bawah ini!
                </p>
                <h5>Contoh 1:</h5>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    A_{3 \times 3} =
                    \begin{bmatrix}
                    1 & 0 & 0 \\
                    0 & 1 & 0 \\
                    0 & 0 & 1
                    \end{bmatrix}
                    \]
                </div>
                <!-- <p>Matriks \( A \) memiliki 3 baris dan 3 kolom (matriks persegi). Semua elemen pada diagonal utama bernilai 1.</p> -->
                <br>
                <h5>Contoh 2:</h5>
                <p>Fatih memakai sepatu kiri di kaki kiri dan sepatu kanan di kaki kanan. Fatih tidak menukar sepatu.</p>
                <p><strong>Hasilnya: </strong>Sepatu kiri tetap di kaki kiri dan Sepatu kanan tetap di kaki kanan. Tidak ada yang berubah.</p>
                <p>
                    Pernyataan di atas dapat direpresentasikan dalam bentuk matriks identitas di bawah ini:
                </p>
                <div class="text-center my-3 matrix-display-big">
                \[
                    B_{2 \times 2} =
                    \begin{bmatrix}
                    1 & 0 \\
                    0 & 1
                    \end{bmatrix}
                    \]
                </div>
                <!-- <div class="triangular-container">
                <div class="matrix-frame">
                    <span class="matrix-label">\( B = \)</span>
                    <span class="math-bracket-3">\( \left[ \right. \)</span>
                    <table class="matrix-triangular matrix-diagonal">
                        <tr>
                            <td class="diagonal">1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>0</td>
                            <td class="diagonal">1</td>
                        </tr>
                    </table>
                    <span class="math-bracket-3">\( \left] \right. \)</span>
                </div> -->
                <!-- <p class="info-text">
                    Perubahan pensil Nisa dan Raisa direpresentasikan oleh elemen diagonal
                </p> -->
            
            <p>Elemen yang bernilai 1 berarti setiap sepatu tetap di tempatnya, sedangkan elemen yang bernilai 0 sepatu kiri tidak pindah
                ke kanan, dan sebaliknya. Matriks identitas menunjukkan keadaan semua tetap di tempatnya masing-masing.
            </p>
            <div id="matrix-quiz">
                <div class="quiz-wrapper">
                    <div class="quiz-container">
                        <div class="quiz-header">
                            Ayo Kita Coba
                        </div>
                        <div class="quiz-question">
                            <br>
                            Klik semua pernyataan yang benar mengenai <b>matriks identitas</b>:
                        </div>
                        <label>
                            <input type="checkbox" id="id1">
                            Matriks identitas selalu merupakan matriks persegi.
                        </label><br>
                        <label>
                            <input type="checkbox" id="id2">
                            Semua elemen diagonal utama pada matriks identitas bernilai 1.
                        </label><br>
                        <label>
                            <input type="checkbox" id="id3">
                            Matriks 2 × 3 dapat menjadi matriks identitas.
                        </label><br>
                        <label>
                            <input type="checkbox" id="id4">
                            Semua elemen selain diagonal utama bernilai 0.
                        </label>
                        <div class="quiz-buttons mt-3">
                            <button onclick="checkIdentity()">Periksa Jawaban</button>
                        </div>
                        <div id="feedback-identity"></div>
                    </div>
                </div>
            </div>
            <div id="matrix-quiz">
    <div class="quiz-wrapper">
        <div class="quiz-container">

            <div class="quiz-header">
                Ayo Kita Simpulkan
            </div>

            <div class="quiz-question">
                <br>
                Berdasarkan contoh-contoh di atas apa yang dapat kamu simpulkan mengenai <b>matriks identitas</b>?
            </div>

            <div class="quiz-question">Jawab:</div>

            <textarea id="answer-identity" class="quiz-input" rows="5"></textarea>

            <div class="quiz-buttons">
                <button onclick="checkIdentityConclusion()">Periksa Jawaban</button>
            </div>

            <div id="feedback-identity-conclusion"></div>

        </div>
    </div>
</div>


            

            <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="ayo-coba-jenis-6"
    data-allowed="{{ in_array('ayo-coba-jenis-6', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
                </div>
            </section>
                

                <section class="materi-slide" data-section="matriks-nol">
                <!-- <hr> -->
                {{-- Judul Materi --}}
                <h2 class="materi-title">7. Matriks Nol</h2>
                <br>
                <p>
                    Perhatikan contoh matriks nol di bawah ini!
                </p>
                <h5>Contoh 1:</h5>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    A_{3 \times 3} =
                    \begin{bmatrix}
                    0 & 0 & 0 \\
                    0 & 0 & 0 \\
                    0 & 0 & 0
                    \end{bmatrix}
                    \]
                </div>
                <!-- <div class="triangular-container">
                    <div class="matrix-frame">
                        <span class="matrix-label">\( A = \)</span>
                        <span class="math-bracket-3">\( \left[ \right. \)</span>
                        <table class="matrix-triangular matrix-zero">
                            <tr>
                                <td class="zero">0</td>
                                <td class="zero">0</td>
                                <td class="zero">0</td>
                            </tr>
                            <tr>
                                <td class="zero">0</td>
                                <td class="zero">0</td>
                                <td class="zero">0</td>
                            </tr>
                            <tr>
                                <td class="zero">0</td>
                                <td class="zero">0</td>
                                <td class="zero">0</td>
                            </tr>
                        </table>
                        <span class="math-bracket-3">\( \left] \right. \)</span>
                    </div>
                </div> -->
                <h5>Contoh 2:</h5>
                <p>diamati dua orang siswa, yaitu Ali dan Sidiq, dengan dua jenis kegiatan, yaitu masuk kelas dan mengumpulkan tugas. 
                    Tabel berikut menunjukkan kondisi yang terjadi.</p>
                    <!-- ===== Tabel Data ===== -->
                <div class="table-responsive table-cuaca mb-3">
                    <table class="tabel-matriks">
                        <thead>
                            <tr>
                                <th>Siswa</th>
                                <th>Masuk Kelas</th>
                                <th>Mengumpulkan Tugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ali</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>Sidiq</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="image-caption">Table 2. 4 Masuk Kelas dan Mengumpulkan Tugas</p>
                </div>
                <p>Nilai 0 pada baris Ali dan kolom Masuk Kelas menunjukkan bahwa Ali tidak masuk kelas. Selanjutnya, nilai 0 pada baris Ali
                    dan kolom Mengumpulkan Tugas menunjukkan bahwa Ali tidak mengumpulkan tugas. Nilai 0 pada baris Sidiq dan kolom Masuk
                    Kelas menunjukkan bahwa Sidiq tidak masuk kelas. Terakhir, nilai 0 pada baris Sidiq dan kolom Mengumpulkan Tugas
                    menunjukkan bahwa Sidiq tidak mengumpulkan tugas.</p>
                <p>Pernyataan di atas dapat direpresentasikan dalam bentuk matriks nol seperti di bawah ini:</p>
                <div class="text-center my-3 matrix-display-big">
                \[
                    B_{2 \times 2} =
                    \begin{bmatrix}
                    0 & 0 \\
                    0 & 0
                    \end{bmatrix}
                    \]
                </div>
                <!-- <div class="triangular-container">
                    <div class="matrix-frame">
                        <span class="matrix-label">\( A = \)</span>
                        <span class="math-bracket-3">\( \left[ \right. \)</span>
                        <table class="matrix-triangular matrix-zero">
                        <tr>
                            <td class="zero">0</td>
                            <td class="zero">0</td>
                        </tr>
                        <tr>
                            <td class="zero">0</td>
                            <td class="zero">0</td>
                        </tr>
                        </table>
                        <span class="math-bracket-3">\( \left] \right. \)</span>
                    </div>
                    </div> -->
                    <div id="matrix-quiz">
                        <div class="quiz-wrapper">
                            <div class="quiz-container">
                                <div class="quiz-header">
                                    Ayo Kita Simpulkan
                                </div>
                                <div class="quiz-question">
                                    <br>
                                    Berdasarkan contoh-contoh di atas apa yang dapat kamu simpulkan mengenai <b>matriks nol</b>?
                                </div>
                                <div class="quiz-question">Jawab:</div>
                                <textarea id="answer-zero" class="quiz-input" rows="5"></textarea>
                                <div class="quiz-buttons">
                                    <button onclick="checkZeroMatrix()">Periksa Jawaban</button>
                                </div>
                                <div id="feedback-zero"></div>
                            </div>
                        </div>
                    </div>

                    <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="ayo-coba-jenis-7"
    data-allowed="{{ in_array('ayo-coba-jenis-7', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
                    </div>
                    </section>

                    <section class="materi-slide" data-section="matriks-simetris">
                <!-- <hr> -->
                {{-- Judul Materi --}}
                <h2 class="materi-title">8. Matriks Simetris</h2>
                <br>
                <p>
                    Matriks simetris merupakan jenis matriks persegi yang memiliki elemen-elemen dengan posisi saling berhadapan terhadap
                    diagonal utama dan bernilai sama. Artinya, nilai elemen pada baris ke-\( i \) dan kolom ke-\( j \) (\( a_{ij} \)) sama dengan nilai elemen pada baris ke-\( j \) dan kolom ke-\( i \) (\( a_{ji} \)) untuk \( i \ne j \).
                    Dengan kata lain, jika matriks tersebut dipantulkan terhadap diagonal
                    utamanya, susunan elemennya tetap sama.
                </p>
                </p>
                <p>
                    Berikut ini merupakan contoh dari matriks simetris :
                </p>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    A_{3 \times 3} =
                    \begin{bmatrix}
                    2 & 4 & 6 \\
                    4 & 5 & 7 \\
                    6 & 7 & 9
                    \end{bmatrix}
                    \]
                </div>
                <!-- ===== MATRIKS SIMETRIS ===== -->
                <div class="matrix-center-container">
                <div class="matrix-diagonal-wrapper">

                    <!-- MATRIX + KURUNG MATEMATIKA -->
                    <div class="matrix-frame">
                    <span class="matrix-label">\( A = \)</span>
                    <span class="math-bracket-3">\( \left[ \right. \)</span>

                    <table class="matrix-triangular matrix-symmetric">
                        <tr>
                        <td class="diag">2</td>
                        <td class="sym sym-1">4</td>
                        <td class="sym sym-2">6</td>
                        </tr>
                        <tr>
                        <td class="sym sym-1">4</td>
                        <td class="diag">5</td>
                        <td class="sym sym-3">7</td>
                        </tr>
                        <tr>
                        <td class="sym sym-2">6</td>
                        <td class="sym sym-3">7</td>
                        <td class="diag">9</td>
                        </tr>
                    </table>

                    <span class="math-bracket-3">\( \left] \right. \)</span>
                    </div>

                    <!-- KETERANGAN (LEGEND) -->
                    <div class="matrix-diagonal-info">
                    <p><span class="legend blue"></span>\( a_{12} = a_{21} \)</p>
                    <p><span class="legend green"></span>\( a_{13} = a_{31} \)</p>
                    <p><span class="legend yellow"></span>\( a_{23} = a_{32} \)</p>
                    </div>
                </div>
                </div>
                <p>Matriks di atas menunjukkan bahwa matriks tersebut simetris, karena setiap elemen di atas dan di bawah diagonal utama memiliki nilai yang sama.</p>
                <h5>Contoh:</h5>
                <p>
                    Pada contoh ini akan menggunakan tigas kota yaitu Banjarmasin, Banjarbaru, dan Martapura. Angka menyatakan jarak
                    tempuh (dalam kilometer) melalui jalur darat.
                </p>
                <ul>
                    <li>Diagonal: jarak dalam kota itu sendiri (bernilai 0)</li>
                    <li>Di luar diagonal: jarak antar dua kota</li>
                    <li>Jarak bersifat dua arah dan sama (A ke B = B ke A)</li>
                </ul>
                <!-- ===== Tabel Data ===== -->
                <div class="table-responsive table-cuaca mb-3">
                    <table class="tabel-matriks">
                        <thead>
                            <tr>
                                <th>Dari / Ke</th>
                                <th>Banjarmasin</th>
                                <th>Banjarbaru</th>
                                <th>Martapura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Banjarmasin</td>
                                <td>0 Km</td>
                                <td>34 Km</td>
                                <td>40 Km</td>
                            </tr>
                            <tr>
                                <td>Banjarbaru</td>
                                <td>34 Km</td>
                                <td>0 Km</td>
                                <td>6 Km</td>
                            </tr>
                            <tr>
                                <td>Martapura</td>
                                <td>40 Km</td>
                                <td>6 Km</td>
                                <td>0 Km</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="image-caption">Table 2. 5 Jarak Antar Kota di Kalimantan Selatan</p>
                </div>
                <p>
                    Jarak antar kota tersebut dapat dinyatakan dalam bentuk matriks simetris sebagai berikut:
                </p>
                <!-- ===== Matriks ===== -->
                <div class="text-center my-3 matrix-display-big">
                    \[
                    C_{3 \times 3} =
                    \begin{bmatrix}
                    0 & 34 & 40 \\
                    34 & 0 & 6 \\
                    40 & 6 & 0
                    \end{bmatrix}
                    \]
                </div>
                <!-- ===== MATRIKS SIMETRIS ===== -->
                <div class="matrix-center-container">
                <div class="matrix-diagonal-wrapper">

                    <!-- MATRIX + KURUNG MATEMATIKA -->
                    <div class="matrix-frame">
                    <span class="matrix-label">\( C = \)</span>
                    <span class="math-bracket-3">\( \left[ \right. \)</span>

                    <table class="matrix-triangular matrix-symmetric">
                        <tr>
                        <td class="diag">0</td>
                        <td class="sym sym-1">34</td>
                        <td class="sym sym-2">40</td>
                        </tr>
                        <tr>
                        <td class="sym sym-1">34</td>
                        <td class="diag">0</td>
                        <td class="sym sym-3">6</td>
                        </tr>
                        <tr>
                        <td class="sym sym-2">40</td>
                        <td class="sym sym-3">6</td>
                        <td class="diag">0</td>
                        </tr>
                    </table>

                    <span class="math-bracket-3">\( \left] \right. \)</span>
                    </div>

                    <!-- KETERANGAN (LEGEND) -->
                    <div class="matrix-diagonal-info">
                    <p><span class="legend blue"></span>\( c_{12} = c_{21} \)</p>
                    <p><span class="legend green"></span>\( c_{13} = c_{31} \)</p>
                    <p><span class="legend yellow"></span>\( c_{23} = c_{32} \)</p>
                    </div>
                </div>
                </div>
                <p>Matriks simetris dapat digunakan untuk merepresentasikan jarak antar kota yang bersifat dua arah, seperti jarak antara kota-kota di Kalimantan Selatan.</p>
                <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                </div>
                </section>

                <section class="materi-slide" data-section="matriks-transpos">
                <!-- <hr> -->
                {{-- Judul Materi --}}
                <h2 class="materi-title">9. Matriks Transpos</h2>
                <br>
                Matriks transpose adalah matriks baru yang diperoleh dengan cara menukar elemen baris menjadi kolom dan elemen kolom
                menjadi baris dari matriks aslinya. Operasi ini akan membalik matriks terhadap diagonal utamanya, dan notasi umumnya adalah
                \( A^{T} \) untuk matriks \( A \). Jika matriks awal berukuran \( m \times n \) maka matriks transpose-nya akan berukuran
                \( n \times m \).
                <br>
                <p>
                    Berikut ini merupakan contoh dari matriks transpos :
                </p>
                <h5>Contoh:</h5>
                <p>
                    Kedisiplinan dalam mengerjakan tugas merupakan salah satu faktor penting yang memengaruhi keberhasilan belajar peserta
                    didik. Berikut ini adalah data rekap nilai tugas dan ujian beberapa siswa di kelas XI SMA Cendekia yang disajikan dalam
                    bentuk tabel dengan orientasi halaman landscape seperti di bawah ini.
                </p>
                <!-- ===== Tabel Data ===== -->
                <div class="table-responsive table-cuaca mb-3">
                    <table class="tabel-matriks">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tugas 1</th>
                                <th>Tugas 2</th>
                                <th>Tugas 3</th>
                                <th>UTS</th>
                                <th>UAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ataya</td>
                                <td>80</td>
                                <td>85</td>
                                <td>78</td>
                                <td>82</td>
                                <td>88</td>
                            </tr>
                            <tr>
                                <td>Dimas</td>
                                <td>75</td>
                                <td>80</td>
                                <td>70</td>
                                <td>76</td>
                                <td>79</td>
                            </tr>
                            <tr>
                                <td>Syifa</td>
                                <td>90</td>
                                <td>88</td>
                                <td>92</td>
                                <td>91</td>
                                <td>94</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="image-caption">Table 2. 6 Data Nilai Tugas dan Ujian Siswa</p>
                </div>
                <p>
                    Jika data tersebut direpresentasikan ke dalam bentuk matriks, maka diperoleh:
                </p>
                <div class="text-center my-3 matrix-display-big">
                    \[
                    D_{3 \times 5} =
                    \begin{bmatrix}
                    80 & 85 & 78 & 82 & 88 \\
                    75 & 80 & 70 & 76 & 79 \\
                    90 & 88 & 92 & 91 & 94
                    \end{bmatrix}
                    \]
                </div>
                <p>
                Untuk keperluan laporan, guru ingin menampilkan data dengan orientasi portrait, sehingga kolom dan barisnya ditukar.
                Dengan demikian, matriks \( N_{3 \times 5} \) diubah menjadi matriks transpose \( N_{5 \times 3} \) berikut:
                </p>
                <!-- <div class="text-center my-3 matrix-display-big">
                    \[
                    D_{5 \times 3} =
                    \begin{bmatrix}
                    80 & 75 & 90 \\
                    85 & 80 & 88 \\
                    78 & 70 & 92 \\
                    82 & 76 & 91 \\
                    88 & 79 & 94
                    \end{bmatrix}
                    \]
                </div> -->
                <!-- ================= TUTORIAL MATRIKS TRANSPOS ================= -->
                <div class="matrix-tutorial-stack">

                    <!-- ===== Tutorial Kolom ===== -->
                    <div class="matrix-tutorial-box column-tutorial">

                        <div class="matrix-frame">
                            <span class="matrix-label">\( D_{3 \times 5} = \)</span>
                            <span class="math-bracket-3">\( \left[ \right. \)</span>

                            <table class="matrix-html">
                                <tr>
                                    <td data-col="1">80</td>
                                    <td data-col="2">85</td>
                                    <td data-col="3">78</td>
                                    <td data-col="4">82</td>
                                    <td data-col="5">88</td>
                                </tr>
                                <tr>
                                    <td data-col="1">75</td>
                                    <td data-col="2">80</td>
                                    <td data-col="3">70</td>
                                    <td data-col="4">76</td>
                                    <td data-col="5">79</td>
                                </tr>
                                <tr>
                                    <td data-col="1">90</td>
                                    <td data-col="2">88</td>
                                    <td data-col="3">92</td>
                                    <td data-col="4">91</td>
                                    <td data-col="5">94</td>
                                </tr>
                            </table>

                            <span class="math-bracket-3">\( \left. \right] \)</span>
                        </div>

                        <!-- <div class="row-info">Kolom ke-1</div> -->
                    </div>
                    <div class="matrix-arrow">
         →
    </div>
                    <!-- ===== Tutorial Baris ===== -->
                    <div class="matrix-tutorial-box row-tutorial">

                        <div class="matrix-frame">
                            <span class="matrix-label">\( D_{5 \times 3} = \)</span>
                            <span class="math-bracket-4">\( \left[ \right. \)</span>

                            <table class="matrix-html-transpos">
                                <tr data-row="1">
                                    <td>80</td>
                                    <td>75</td>
                                    <td>90</td>
                                </tr>
                                <tr data-row="2">
                                    <td>85</td>
                                    <td>80</td>
                                    <td>88</td>
                                </tr>
                                <tr data-row="3">
                                    <td>78</td>
                                    <td>70</td>
                                    <td>92</td>
                                </tr>
                                <tr data-row="4">
                                    <td>82</td>
                                    <td>76</td>
                                    <td>91</td>
                                </tr>
                                <tr data-row="5">
                                    <td>88</td>
                                    <td>79</td>
                                    <td>94</td>
                                </tr>
                            </table>

                            <span class="math-bracket-4">\( \left. \right] \)</span>
                        </div>

                        <!-- <div class="row-info">Baris ke-1</div> -->
                    </div>
                </div>
                <p>
                Matriks \( N_{5 \times 3} \)  merupakan hasil transposisi dari matriks \( N_{3 \times 5} \), di mana baris pada matriks semula menjadi kolom, dan kolom
                menjadi baris. Proses ini disebut transpos matriks dan sering digunakan untuk menyesuaikan tampilan data atau perhitungan
                dalam berbagai konteks.
                </p>
                
                <p><strong>Contoh lain:</strong></p>

<ul>
    <li style="margin-bottom: 16px;">
        Jika 
        \( C =
        \begin{bmatrix}
        1 & 2 & 3 \\
        4 & 5 & 6
        \end{bmatrix}
        \)
        merupakan matriks berordo \(2 \times 3\), maka transpose matriks \(C\) adalah matriks berordo \(3 \times 2\), yaitu
        \( 
        C^T =
        \begin{bmatrix}
        1 & 4 \\
        2 & 5 \\
        3 & 6
        \end{bmatrix}
        \)
    </li>

    <li>
        Jika 
        \( E =
        \begin{bmatrix}
        8 & 2 & 7 \\
        3 & 9 & 1 \\
        2 & 4 & 5
        \end{bmatrix}
        \)
        merupakan matriks berordo \(3 \times 3\), maka transpose matriks \(E\) adalah matriks berordo \(3 \times 3\), yaitu
        \( 
        E^T =
        \begin{bmatrix}
        8 & 3 & 2 \\
        2 & 9 & 4 \\
        7 & 1 & 5
        \end{bmatrix}
        \)
    </li>
</ul>
                <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                </div>
                </section>


                {{-- =================================================
                    SECTION: MARI MENCOBA
                ================================================= --}}
                <section class="materi-slide" data-section="mari-mencoba-jenis">
                    <br>
                    <!-- <hr> -->
                    <br>

                    <div class="quiz-wrapper">
                        <div class="quiz-container">

                            <!-- ===== HEADER ===== -->
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
                                    Soal
                                    <span id="currentQuestion-2">1</span>
                                    dari
                                    <span id="totalQuestion-2">3</span>
                                </div>
                            </div>
                            <div id="sub-soal-label" style="font-weight:600;margin-bottom:8px;"></div>

                            <!-- ===== SOAL (DIRENDER VIA JS) ===== -->
                            <div class="quiz-question" id="quiz-question-2">
                            </div>

                            <!-- ===== BUTTON AKSI ===== -->
                            <div class="quiz-buttons">
                                <button type="button" id="btn-periksa-2">
                                    Periksa Jawaban
                                </button>
                                <button type="button" id="btn-reset-2">
                                    Reset Jawaban
                                </button>
                            </div>

                            <!-- ===== NAVIGASI ===== -->
                            <div class="quiz-nav">
                                <button type="button" id="btn-prev-2">
                                    <i class="bi bi-arrow-left me-2"></i>
                                    Sebelumnya
                                </button>

                                <button type="button" id="btn-next-2">
                                    Berikutnya
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>

                            <!-- ===== HASIL ===== -->
                            <p id="hasil-jawaban-2"></p>

                        </div>
                    </div>

                    <br>
                    <!-- <hr> -->
                    <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="mari-mencoba-jenis-matriks"
    data-allowed="{{ in_array('mari-mencoba-jenis-matriks', $completed) ? '1' : '0' }}">
    Selanjutnya
</button>
                    </div>
                </section>

                {{-- =================================================
                    SECTION: KUIS PENGERTIAN MATRIKS
                ================================================= --}}
                <section class="materi-slide" data-section="kuis-jenis-matriks">
                    <div class="quiz-action-wrapper">
                        <br>
                        <br>
                        <p class="refleksi-hint text-center">
                        Silahkan klik tombol di bawah ini
                        untuk mengerjakan kuis agar dapat <strong>melanjutkan ke materi berikutnya</strong> 👇
                    </p>
                        <!-- KARTU KUIS -->
                        <div class="quiz-link-wrapper mb-7">
                            <a href="{{ route('petunjuk.kuis', ['quiz_id' => 2]) }}" class="quiz-link-card">

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
                            <a href="{{ route('refleksi.index', [
                                'materi' => 'jenis_matriks',
                                'back' => url()->current()
                            ]) }}"
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

        <!----------------- END WRAPPER ----------------->
        </div>
        
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
<!-- ======================================================
     JAVASCRIPT — VERSI LENGKAP (TIDAK ADA YANG DIPANGKAS)
====================================================== -->
<script>
/* ======================================================
   SIDEBAR TOGGLE
====================================================== */
const sidebar = document.getElementById('sidebar_materi');
const content = document.querySelector('.main-content');
const toggleSidebar = document.getElementById('sidebarToggle');

toggleSidebar?.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('expanded');
});

/* ======================================================
   PROFILE DROPDOWN
====================================================== */
const profileToggle = document.getElementById('profileToggle');
const profileMenu = document.getElementById('profileMenu');

profileToggle?.addEventListener('click', () => {
    profileMenu.style.display =
        profileMenu.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', function(e) {
    if (
        profileToggle &&
        profileMenu &&
        !profileToggle.contains(e.target) &&
        !profileMenu.contains(e.target)
    ) {
        profileMenu.style.display = 'none';
    }
});

/* ======================================================
   SCROLL + ACTIVE (SECTION BASED)
====================================================== */
(function(){

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


document.addEventListener("DOMContentLoaded", function () {

    /* ===== SEMUA TUTORIAL BARIS ===== */
    document.querySelectorAll(".row-tutorial").forEach(wrapper => {
      const rows = wrapper.querySelectorAll("tr");
      const info = wrapper.querySelector(".row-info");

      if (!rows.length) return;

      let rowIndex = 0;

      function highlightRow() {
          rows.forEach(r => r.classList.remove("active"));

          rows[rowIndex].classList.add("active");

          if (info) {
              info.textContent = "Baris ke-" + (rows[rowIndex].dataset.row || (rowIndex + 1));
          }

          rowIndex = rowIndex < rows.length - 1 ? rowIndex + 1 : 0;
      }

      highlightRow();
      setInterval(highlightRow, 2000);
  });

    /* ===== SEMUA TUTORIAL KOLOM ===== */
  document.querySelectorAll(".column-tutorial").forEach(wrapper => {
      const cells = wrapper.querySelectorAll("td[data-col]");
      const info  = wrapper.querySelector(".row-info");

      if (!cells.length) return;

      const totalCols = new Set(
          Array.from(cells).map(td => td.dataset.col)
      ).size;

      // === KASUS: HANYA 1 KOLOM → DIAM ===
      if (totalCols === 1) {
          cells.forEach(td => td.classList.add("active-col"));
          if (info) info.textContent = "Kolom ke-1";
          return;
      }

      // === KASUS: LEBIH DARI 1 KOLOM → ANIMASI ===
      let colIndex = 1;

      function highlightColumn() {
          cells.forEach(td => td.classList.remove("active-col"));

          cells.forEach(td => {
              if (parseInt(td.dataset.col) === colIndex) {
                  td.classList.add("active-col");
              }
          });

          if (info) info.textContent = "Kolom ke-" + colIndex;
          colIndex = colIndex < totalCols ? colIndex + 1 : 1;
      }

      highlightColumn();
      setInterval(highlightColumn, 2000);
  });

});


// document.addEventListener('DOMContentLoaded', () => {
//   const hash = location.hash.replace('#','');
//   if (!hash) return;

//   const target = document.getElementById(hash);
//   if (target) {
//     setTimeout(() => {
//       target.scrollIntoView({ behavior: 'smooth', block: 'start' });
//       activateSidebarFor(hash);
//     }, 100);
//   }
// });


// TANDA ACTIVE IKUT BERUBAH SESUAI SCROLL SECTION //
const sections = Array.from(
  document.querySelectorAll('.page-section[id]')
);

let currentActive = null;

function detectActiveSection() {
  const offset = 140; // tinggi header / navbar
  let found = null;

  for (let i = sections.length - 1; i >= 0; i--) {
    const rect = sections[i].getBoundingClientRect();
    if (rect.top <= offset) {
      found = sections[i];
      break;
    }
  }

  if (found && found.id !== currentActive) {
    currentActive = found.id;
    activateSidebarFor(found.id);
  }
}

//window.addEventListener('scroll', detectActiveSection);
//window.addEventListener('load', detectActiveSection);

// ========== ANIMASI MATRIKS SEGITIGA & DIAGONAL (STABIL & SINKRON) ========== //

document.addEventListener("DOMContentLoaded", () => {

  /* =========================
     SEGITIGA ATAS & BAWAH
  ========================= */
  function animateMatrix(selector, interval = 1200) {
    const cells = document.querySelectorAll(selector);
    if (!cells.length) return;

    let index = 0;

    function step() {
      cells.forEach(td => td.classList.remove("active"));
      cells[index].classList.add("active");
      index = (index + 1) % cells.length;
    }

    step();
    setInterval(step, interval);
  }

  // 🔺 Segitiga atas
  animateMatrix(".matrix-triangular td.upper", 900);

  // 🔻 Segitiga bawah
  animateMatrix(".matrix-triangular td.lower", 900);



  /* =========================
     DIAGONAL (SEMUA BARANGAN)
  ========================= */
  function animateDiagonalSync(interval = 1200) {
    const matrices = document.querySelectorAll(".matrix-diagonal");
    if (!matrices.length) return;

    let index = 0;

    function step() {
      matrices.forEach(matrix => {
        const cells = matrix.querySelectorAll("td.diagonal");
        cells.forEach(td => td.classList.remove("active"));

        if (cells[index]) {
          cells[index].classList.add("active");
        }
      });

      index++;
      if (index > 2) index = 0; // aman utk 2x2 & 3x3
    }

    step();
    setInterval(step, interval);
  }

  // 🔷 Diagonal sinkron
  animateDiagonalSync(1200);

});


// ===============  ANIMASI MATRIKS NOL  =============== //

document.addEventListener("DOMContentLoaded", () => {

  function animateAllZeroMatrices(interval = 800) {

    const matrices = document.querySelectorAll(".matrix-zero");

    matrices.forEach(matrix => {

      // Ambil sel berdasarkan BARIS → KOLOM
      const orderedCells = [];
      const rows = matrix.querySelectorAll("tr");

      rows.forEach(row => {
        row.querySelectorAll("td.zero").forEach(cell => {
          orderedCells.push(cell);
        });
      });

      if (!orderedCells.length) return;

      let index = 0;

      setInterval(() => {
        orderedCells.forEach(td => td.classList.remove("active"));
        orderedCells[index].classList.add("active");

        index++;
        if (index >= orderedCells.length) {
          index = 0; // kembali ke baris 1 kolom 1
        }
      }, interval);

    });
  }

  // 🔹 Jalankan animasi untuk SEMUA matriks nol (2x2, 3x3, dst)
  animateAllZeroMatrices(800);

});



// ========== ANIMASI MATRIKS SIMETRIS 3x3 ========== //

document.addEventListener("DOMContentLoaded", () => {

  const steps = [
    { selector: ".sym-1", color: "active-blue" },   // 4 ↔ 4
    { selector: ".sym-2", color: "active-green" },  // 6 ↔ 6
    { selector: ".sym-3", color: "active-yellow" }  // 7 ↔ 7
  ];

  let index = 0;

  function animateSymmetric(interval = 1200) {
    setInterval(() => {
      // bersihkan semua warna
      document.querySelectorAll(".matrix-symmetric td")
        .forEach(td => td.classList.remove(
          "active-blue", "active-green", "active-yellow"
        ));

      // aktifkan pasangan simetris
      document.querySelectorAll(steps[index].selector)
        .forEach(td => td.classList.add(steps[index].color));

      index = (index + 1) % steps.length;
    }, interval);
  }

  animateSymmetric(1200);
});

/* =========================================================
    MARI MENCOBA — FINAL (RAPI & TERSTRUKTUR)
    ========================================================= */
    document.addEventListener('DOMContentLoaded', function () {

        function showPopup(message, onClose = null, icon = '') {
  const modal   = document.getElementById('quizModal');
  const msg     = document.getElementById('quizModalMessage');
  const btn     = document.getElementById('quizModalBtn');
  const iconBox = document.getElementById('quizModalIcon');

  msg.innerHTML = message;
  iconBox.textContent = icon; // 🎉 muncul di atas
  modal.classList.remove('hidden');

  btn.onclick = () => {
    modal.classList.add('hidden');
    iconBox.textContent = ''; // bersihkan icon
    if (typeof onClose === 'function') onClose();
  };
}
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
            { drop: {} },   // Soal 1
            { drop: {} },   // Soal 2
            { matrix: {}, tf: '', check3c: []} // Soal 3
        ];

        /* =====================================================
        DATA SOAL
        ===================================================== */
        const soal = [

            /* ================= SOAL 1 ================= */
            {
                render: () => `
                <div class="quiz-content-responsive">
    <p><strong>1. Seret dan jatuhkan jenis matriks ke contoh yang sesuai!</strong></p>

    <table class="tabel-soal">
        <tr>
            <th>Matriks</th>
            <th>Jenis Matriks</th>
        </tr>

        <!-- BARIS -->
        <tr>
            <td>
                \\[
                A = \\begin{bmatrix} 7 & 8 & 9 \\end{bmatrix}
                \\]
            </td>
            <td><div class="drop-box1" data-ans="baris"></div></td>
        </tr>

        <!-- KOLOM -->
        <tr>
            <td>
                \\[
                B = \\begin{bmatrix} 5 \\\\ 6 \\\\ 7 \\end{bmatrix}
                \\]
            </td>
            <td><div class="drop-box1" data-ans="kolom"></div></td>
        </tr>

        <!-- PERSEGI -->
        <tr>
            <td>
                \\[
                C = \\begin{bmatrix} 4 & 2 \\\\ 1 & 3 \\end{bmatrix}
                \\]
            </td>
            <td><div class="drop-box1" data-ans="persegi"></div></td>
        </tr>

        <!-- 🔥 TEGAK -->
        <tr>
            <td>
                \\[
                D = \\begin{bmatrix}
                1 & 2 \\\\
                3 & 4 \\\\
                5 & 6
                \\end{bmatrix}
                \\]
            </td>
            <td><div class="drop-box1" data-ans="tegak"></div></td>
        </tr>

        <!-- 🔥 SEGITIGA ATAS -->
        <tr>
            <td>
                \\[
                E = \\begin{bmatrix}
                2 & 3 & 1 \\\\
                0 & 5 & 4 \\\\
                0 & 0 & 6
                \\end{bmatrix}
                \\]
            </td>
            <td><div class="drop-box1" data-ans="segitiga"></div></td>
        </tr>
    </table>

    <p><strong>Pilihan jawaban:</strong></p>
    <div class="opsi-jawaban-1">
        <div class="opsi1" draggable="true" data-val="kolom">Matriks Kolom</div>
        <div class="opsi1" draggable="true" data-val="persegi">Matriks Persegi</div>
        <div class="opsi1" draggable="true" data-val="baris">Matriks Baris</div>
        <div class="opsi1" draggable="true" data-val="tegak">Matriks Tegak</div>
        <div class="opsi1" draggable="true" data-val="segitiga">Matriks Segitiga Atas</div>
    </div>
    </div>
`,

                restore: () => {
                    Object.entries(userAnswer[0].drop || {}).forEach(([key, val]) => {
                        const box = document.querySelector(`.drop-box1[data-ans="${key}"]`);
                        const opt = document.querySelector(`.opsi1[data-val="${val}"]`);
                        if (box && opt) box.appendChild(opt);
                    });
                },

                check: () => (
    userAnswer[0].drop?.baris === 'baris' &&
    userAnswer[0].drop?.kolom === 'kolom' &&
    userAnswer[0].drop?.persegi === 'persegi' &&
    userAnswer[0].drop?.tegak === 'tegak' &&
    userAnswer[0].drop?.segitiga === 'segitiga'
),

                reset: () => {
                    userAnswer[0] = { drop: {} };
                },

                afterRender: () => {

    userAnswer[0].drop = userAnswer[0].drop || {};

    let dragged = null;

    const opsis = document.querySelectorAll('.opsi1');
    const dropBoxes = document.querySelectorAll('.drop-box1');
    const opsiContainer = document.querySelector('.opsi-jawaban-1');

    opsis.forEach(item => {

        item.addEventListener('selectstart', e => e.preventDefault());

        /* DESKTOP */
        item.addEventListener('dragstart', function(e){
            dragged = this;
            e.dataTransfer.setData('text/plain', this.dataset.val);
        });

        /* HP */
        item.addEventListener('touchstart', function(){
            dragged = this;
            this.classList.add('dragging');
        });

        item.addEventListener('touchmove', function(e){

            e.preventDefault();

            const touch = e.touches[0];

            this.style.position = 'fixed';
            this.style.left = touch.clientX - this.offsetWidth/2 + 'px';
            this.style.top = touch.clientY - this.offsetHeight/2 + 'px';
            this.style.zIndex = 9999;
            this.style.pointerEvents = 'none';

        });

        item.addEventListener('touchend', function(e){

            const touch = e.changedTouches[0];
            const target = document.elementFromPoint(touch.clientX, touch.clientY);

            const box = target?.closest('.drop-box1');

            if(box){

                box.innerHTML = '';
                box.appendChild(this);

                userAnswer[0].drop[box.dataset.ans] = this.dataset.val;

            }else{

                opsiContainer.appendChild(this);

                Object.keys(userAnswer[0].drop).forEach(k=>{
                    if(userAnswer[0].drop[k] === this.dataset.val){
                        delete userAnswer[0].drop[k];
                    }
                });

            }

            this.style.position='';
            this.style.left='';
            this.style.top='';
            this.style.zIndex='';
            this.style.pointerEvents='';

            this.classList.remove('dragging');

            dragged = null;

        });

    });

    /* DROP BOX */
    dropBoxes.forEach(box=>{

        box.addEventListener('dragover', e=>e.preventDefault());

        box.addEventListener('drop', function(e){

            e.preventDefault();

            if(!dragged) return;

            this.innerHTML='';
            this.appendChild(dragged);

            userAnswer[0].drop[this.dataset.ans] = dragged.dataset.val;

        });

    });

    /* BALIK KE PILIHAN */
    opsiContainer.addEventListener('dragover', e=>e.preventDefault());

    opsiContainer.addEventListener('drop', function(e){

        e.preventDefault();

        if(!dragged) return;

        this.appendChild(dragged);

        Object.keys(userAnswer[0].drop).forEach(k=>{
            if(userAnswer[0].drop[k] === dragged.dataset.val){
                delete userAnswer[0].drop[k];
            }
        });

    });

}
            },


            /* ================= SOAL 2 ================= */
            {
    render: () => `
<p><strong>2. Seret dan jatuhkan jenis matriks ke contoh yang sesuai!</strong></p>

<table class="tabel-soal">
    <tr>
        <th>Matriks</th>
        <th>Jenis Matriks</th>
    </tr>

    <!-- DATAR -->
    <tr>
        <td>
            \\[
            A =
            \\begin{bmatrix}
            1 & 2 & 3 & 4 \\\\
            5 & 6 & 7 & 8
            \\end{bmatrix}
            \\]
        </td>
        <td><div class="drop-box1" data-ans="datar"></div></td>
    </tr>

    <!-- DIAGONAL -->
    <tr>
        <td>
            \\[
            B =
            \\begin{bmatrix}
            3 & 0 & 0 \\\\
            0 & 5 & 0 \\\\
            0 & 0 & 7
            \\end{bmatrix}
            \\]
        </td>
        <td><div class="drop-box1" data-ans="diagonal"></div></td>
    </tr>

    <!-- IDENTITAS -->
    <tr>
        <td>
            \\[
            C =
            \\begin{bmatrix}
            1 & 0 & 0 \\\\
            0 & 1 & 0 \\\\
            0 & 0 & 1
            \\end{bmatrix}
            \\]
        </td>
        <td><div class="drop-box1" data-ans="identitas"></div></td>
    </tr>

    <!-- NOL -->
    <tr>
        <td>
            \\[
            D =
            \\begin{bmatrix}
            0 & 0 \\\\
            0 & 0
            \\end{bmatrix}
            \\]
        </td>
        <td><div class="drop-box1" data-ans="nol"></div></td>
    </tr>

    <!-- SIMETRIS -->
    <tr>
        <td>
            \\[
            E =
            \\begin{bmatrix}
            2 & 4 & 6 \\\\
            4 & 5 & 7 \\\\
            6 & 7 & 9
            \\end{bmatrix}
            \\]
        </td>
        <td><div class="drop-box1" data-ans="simetris"></div></td>
    </tr>
</table>

<p><strong>Pilihan jawaban:</strong></p>
<div class="opsi-jawaban-1">
    <div class="opsi1" draggable="true" data-val="datar">Matriks Datar</div>
    <div class="opsi1" draggable="true" data-val="diagonal">Matriks Diagonal</div>
    <div class="opsi1" draggable="true" data-val="identitas">Matriks Identitas</div>
    <div class="opsi1" draggable="true" data-val="nol">Matriks Nol</div>
    <div class="opsi1" draggable="true" data-val="simetris">Matriks Simetris</div>
</div>
`,

                restore: () => {
                    Object.entries(userAnswer[1].drop || {}).forEach(([key, val]) => {
                        const box = document.querySelector(`.drop-box1[data-ans="${key}"]`);
                        const opt = document.querySelector(`.opsi1[data-val="${val}"]`);
                        if (box && opt) box.appendChild(opt);
                    });
                },

                check: () => (
    userAnswer[1].drop?.datar === 'datar' &&
    userAnswer[1].drop?.diagonal === 'diagonal' &&
    userAnswer[1].drop?.identitas === 'identitas' &&
    userAnswer[1].drop?.nol === 'nol' &&
    userAnswer[1].drop?.simetris === 'simetris'
),

                reset: () => {
                    userAnswer[1] = { drop: {} };
                },

                afterRender: () => {

    userAnswer[1].drop = userAnswer[1].drop || {};

    let dragged = null;

    const opsis = document.querySelectorAll('.opsi1');
    const dropBoxes = document.querySelectorAll('.drop-box1');
    const opsiContainer = document.querySelector('.opsi-jawaban-1');

    opsis.forEach(item => {

        item.addEventListener('selectstart', e => e.preventDefault());

        /* DESKTOP */
        item.addEventListener('dragstart', function(e){
            dragged = this;
            e.dataTransfer.setData('text/plain', this.dataset.val);
        });

        /* HP */
        item.addEventListener('touchstart', function(){
            dragged = this;
            this.classList.add('dragging');
        });

        item.addEventListener('touchmove', function(e){

            e.preventDefault();

            const touch = e.touches[0];

            this.style.position = 'fixed';
            this.style.left = touch.clientX - this.offsetWidth/2 + 'px';
            this.style.top = touch.clientY - this.offsetHeight/2 + 'px';
            this.style.zIndex = 9999;
            this.style.pointerEvents = 'none';

        });

        item.addEventListener('touchend', function(e){

            const touch = e.changedTouches[0];
            const target = document.elementFromPoint(touch.clientX, touch.clientY);

            const box = target?.closest('.drop-box1');

            if(box){

                box.innerHTML = '';
                box.appendChild(this);

                userAnswer[1].drop[box.dataset.ans] = this.dataset.val;

            }else{

                opsiContainer.appendChild(this);

                Object.keys(userAnswer[1].drop).forEach(k=>{
                    if(userAnswer[1].drop[k] === this.dataset.val){
                        delete userAnswer[1].drop[k];
                    }
                });

            }

            this.style.position='';
            this.style.left='';
            this.style.top='';
            this.style.zIndex='';
            this.style.pointerEvents='';

            this.classList.remove('dragging');

            dragged = null;

        });

    });

    /* DROP BOX */
    dropBoxes.forEach(box=>{

        box.addEventListener('dragover', e=>e.preventDefault());

        box.addEventListener('drop', function(e){

            e.preventDefault();

            if(!dragged) return;

            this.innerHTML='';
            this.appendChild(dragged);

            userAnswer[1].drop[this.dataset.ans] = dragged.dataset.val;

        });

    });

    /* BALIK KE PILIHAN */
    opsiContainer.addEventListener('dragover', e=>e.preventDefault());

    opsiContainer.addEventListener('drop', function(e){

        e.preventDefault();

        if(!dragged) return;

        this.appendChild(dragged);

        Object.keys(userAnswer[1].drop).forEach(k=>{
            if(userAnswer[1].drop[k] === dragged.dataset.val){
                delete userAnswer[1].drop[k];
            }
        });

    });

}
            },


            /* ================= SOAL 3 ================= */
            {
                render: () => `
                    <p><strong>3. Diketahui matriks</strong></p>

                    \\[
                    M =
                    \\begin{bmatrix}
                    5 & 7 & 9 \\\\
                    2 & 4 & 6
                    \\end{bmatrix}
                    \\]

                    <p>
                        Tulislah hasil transpos dari matriks <strong>\\( M \\)</strong> dengan benar.
                    </p>


                    <div class="matrix-input">
                        <span style="margin-right:6px">\\( M^T = \\)</span>

                        <div class="matrix-bracket left"></div>

                        <!-- ⬅️ PAKAI GRID LAMA -->
                        <div class="matrix-grid">
                            <input id="t11" placeholder="..."><input id="t12" placeholder="...">
                            <input id="t21" placeholder="..."><input id="t22" placeholder="...">
                            <input id="t31" placeholder="..."><input id="t32" placeholder="...">
                        </div>

                        <div class="matrix-bracket right"></div>
                    </div>
                `,

                restore: () => {
                    Object.entries(userAnswer[2].matrix || {}).forEach(([id, value]) => {
                        const el = document.getElementById(id);
                        if (el) el.value = value;
                    });
                },

                check: () => {
                    const correct = {
                        t11: '5', t12: '2',
                        t21: '7', t22: '4',
                        t31: '9', t32: '6'
                    };

                    userAnswer[2].matrix = {};

                    Object.keys(correct).forEach(id => {
                        const el = document.getElementById(id);
                        if (el) userAnswer[2].matrix[id] = el.value.trim();
                    });

                    return Object.keys(correct).every(
                        id => userAnswer[2].matrix[id] === correct[id]
                    );
                },

                reset: () => {
                    userAnswer[2] = { matrix: {} };
                }
            }

        ];

        function renderSoal3b() {
        return `
            <p><strong>3. Diketahui matriks</strong></p>

            \\[
            M =
            \\begin{bmatrix}
            5 & 7 & 9 \\\\
            2 & 4 & 6
            \\end{bmatrix}
            \\]

            <p>Tentukan benar atau salah pernyataan berikut.</p>

            <p><strong>"Matriks \\( M \\) merupakan matriks datar."</strong></p>

            <div class="box_contoh_soal">
                <p><em>(Klik jawaban di bawah ini)</em></p>

                <label>
                    <input type="radio" name="tf3" value="benar">
                    Benar
                </label>
                &nbsp;&nbsp;
                <label>
                    <input type="radio" name="tf3" value="salah">
                    Salah
                </label>
            </div>
        `;
    }

    function renderSoal3c() {
        return `
            <p><strong>3. Diketahui matriks</strong></p>

            \\[
            M =
            \\begin{bmatrix}
            5 & 7 & 9 \\\\
            2 & 4 & 6
            \\end{bmatrix}
            \\]

            <p>Klik semua jenis matriks yang <u>tidak benar</u> untuk matriks <strong>\\( M \\)</strong>.</p>

            <div class="checkbox-group">
                <label>
                    <input type="checkbox" value="baris"> Matriks baris
                </label><br>
                <label>
                    <input type="checkbox" value="kolom"> Matriks kolom
                </label><br>
                <label>
                    <input type="checkbox" value="persegi"> Matriks persegi
                </label><br>
                <label>
                    <input type="checkbox" value="diagonal"> Matriks diagonal
                </label><br>
                <label>
                    <input type="checkbox" value="identitas"> Matriks tegak
                </label><br>
                <label>
                    <input type="checkbox" value="persegi-panjang"> Matriks datar
                </label>
            </div>
        `;
    }


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

            // Soal 1 (drag & drop)
            if (i === 0) {
                return Object.keys(userAnswer[0].drop).length === 5;
            }

            // Soal 2 (drag & drop)
            if (i === 1) {
                return Object.keys(userAnswer[1].drop).length === 5;
            }

            // Soal 3 (isian transpos)
            // Soal 3a
            if (i === 2 && subIdx === 0) {
            return Object.keys(userAnswer[2].matrix).length === 6;
            }


            // Soal 3b
            if (i === 2 && subIdx === 1) {
            return !!userAnswer[2].tf;
            }

            if (i === 2 && subIdx === 2) {
                return userAnswer[2].check3c.length > 0;
            }

            return false;
            }



        
        /* =====================================================
        UTIL & NAVIGASI
        ===================================================== */
        function updateNextButton() {
    btnNext.innerHTML =
        (idx === 2 && subIdx === 2)
            ? 'Selesai'
            : 'Berikutnya <i class="bi bi-arrow-right ms-2"></i>';
}

        function saveCurrentAnswer() {

            // Soal 3a (transpos)
            if (idx === 2 && subIdx === 0) {
                soal[2].check();
            }

            // Soal 3b
            if (idx === 2 && subIdx === 1) {
                return;
            }

            // Soal lain
            if (idx !== 2 && soal[idx] && soal[idx].check) {
                soal[idx].check();
            }
        }
        let idx = 0;
        let subIdx = 0; // ⬅️ TAMBAHAN: untuk soal 3a & 3b
        let completed = 0; // jumlah soal yang sudah SAH dijawab
        let quizFinished = false;

//         function saveCurrentAnswer() {
//     if (soal[idx] && soal[idx].check) {
//         soal[idx].check(); // simpan ke userAnswer
//     }
// }

        function hitungSkor() {
            let score = 0;
            if (soal[0].check()) score++;
            if (soal[1].check()) score++;
            if (soal[2].check()) score++;
            return score;
        }

        function clearAllAnswers() {
            userAnswer[0] = { ordoRow: '', ordoCol: '', a23: '' };
            userAnswer[1] = { matrix: {}, ordoRow: '', ordoCol: '' };
            userAnswer[2] = {
                drop: {},
                tf: '',
                a22: '',
                a41: '',
                a53: '',
                a32: '',
                benar3a: false,
                benar3b: false,
                benar3c: false
            };

            idx = 0;
            completed = 0;

            renderSoal();
            updateQuizProgress();
            hasil.textContent = '';
            quizFinished = false;
        }


        function renderSoal() {
            const subLabel = document.getElementById('sub-soal-label');
            hasil.textContent = '';


        // ===== LABEL SOAL ANAK =====
        if (idx === 2) {
        subLabel.textContent =
        subIdx === 0 ? 'Soal 3 bagian a'
        : subIdx === 1 ? 'Soal 3 bagian b'
        : 'Soal 3 bagian c';
        } else {
        subLabel.textContent = '';
        }

    hasil.textContent = '';

        // ================= SOAL 3a =================
        if (idx === 2 && subIdx === 0) {
            container.innerHTML = soal[2].render();
            soal[2].restore?.();
        }

        // ================= SOAL 3b =================
        else if (idx === 2 && subIdx === 1) {
            container.innerHTML = renderSoal3b();

            document.querySelectorAll('input[name="tf3"]').forEach(radio => {
                radio.checked = radio.value === userAnswer[2].tf;
                radio.addEventListener('change', e => {
                    userAnswer[2].tf = e.target.value;
                });
            });
        }

        // ================= SOAL 3c =================
        else if (idx === 2 && subIdx === 2) {
        container.innerHTML = renderSoal3c();

        const checks = container.querySelectorAll('input[type="checkbox"]');

        // restore jawaban lama
        checks.forEach(cb => {
            cb.checked = userAnswer[2].check3c.includes(cb.value);
        });

        // simpan saat berubah
        checks.forEach(cb => {
            cb.addEventListener('change', () => {
                userAnswer[2].check3c = Array.from(checks)
                    .filter(c => c.checked)
                    .map(c => c.value);
            });
        });
    }

    // ================= SOAL 1 & 2 =================
    else {
        container.innerHTML = soal[idx].render();
        soal[idx].afterRender?.();
        soal[idx].restore?.();
    }

    if (window.MathJax) MathJax.typesetPromise();
    updateQuizProgress();

    
    if (window.MathJax) {
        MathJax.typesetClear();
        MathJax.typesetPromise();
    }

    updateNextButton();
    updateQuizProgress();
            
    }
    
        /* =====================================================
        EVENT HANDLER
        ===================================================== */
        btnPeriksa.onclick = () => {
    let benar = false;

    // 3a
    if (idx === 2 && subIdx === 0) {
        benar = soal[2].check();
        userAnswer[2].benar3a = benar;
    }

    // 3b
    else if (idx === 2 && subIdx === 1) {
        benar = userAnswer[2].tf === 'benar';
        userAnswer[2].benar3b = benar;
    }

    // 3c
    else if (idx === 2 && subIdx === 2) {
    const jawabanBenar = [
        'baris',
        'kolom',
        'persegi',
        'diagonal',
        'identitas'
    ];

    benar =
        jawabanBenar.every(v => userAnswer[2].check3c.includes(v)) &&
        !userAnswer[2].check3c.includes('persegi-panjang');

    userAnswer[2].benar3c = benar;
}
    // soal lain
    else {
        benar = soal[idx].check();
    }

    playFeedbackSound(benar);
    hasil.textContent = benar ? 'Jawaban benar! ✅' : 'Jawaban belum tepat.';
    hasil.style.color = benar ? '#198754' : '#dc3545';
};

        btnReset.onclick = () => {
            soal[idx].reset();
            renderSoal();
        };

        btnNext.onclick = function () {

    // ===============================
    // VALIDASI
    // ===============================
    if (idx !== 2 && !isAnswered(idx)) {
        showPopup('Selesaikan soal ini terlebih dahulu 🙂');
        return;
    }

    // ===============================
    // SOAL 3 BERTINGKAT
    // ===============================
    if (idx === 2) {

    // 3a → 3b
    if (subIdx === 0) {
        if (!isAnswered(2)) {
            showPopup('Selesaikan soal ini terlebih dahulu 🙂');
            return;
        }
        subIdx = 1;
        renderSoal();
        return;
    }

    // 3b → 3c
    if (subIdx === 1) {
        if (!userAnswer[2].tf) {
            showPopup('Selesaikan soal ini terlebih dahulu 🙂');
            return;
        }
        subIdx = 2;
        renderSoal();
        return;
    }

}

    if (idx === 2 && subIdx === 2 && userAnswer[2].check3c.length === 0) {
        showPopup('Pilih jawaban terlebih dahulu 🙂');
        return;
        }

        // 3b → 3c
    

    // ===============================
    // SIMPAN JAWABAN
    // ===============================
    saveCurrentAnswer();

    // ===============================
    // PINDAH KE SOAL BERIKUTNYA (1 → 2)
    // ===============================
    if (idx < soal.length - 1) {
        idx++;
        subIdx = 0;
        completed = Math.max(completed, idx);
        renderSoal();
        updateQuizProgress();
        return;
    }

    // ===============================
    // BARU DI SINI → QUIZ SELESAI
    // ===============================
    completed = soal.length;
    updateQuizProgress();

    let score = 0;

    // Soal 1
    if (soal[0].check()) score++;

    // Soal 2
    if (soal[1].check()) score++;

    // Soal 3 (gabungan 3a + 3b + 3c)
    if (
        userAnswer[2].benar3a &&
        userAnswer[2].benar3b &&
        userAnswer[2].benar3c
    ) score++;

fetch('/progress/complete', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
        materi_slug: 'jenis_matriks',
        sub_materi_slug: 'mari-mencoba-jenis-matriks'
    })
})
.then(res => res.json())
.then(() => {

    // 🔥 unlock tombol
    const btn = document.querySelector('.btn-next-slide[data-check="mari-mencoba-jenis-matriks"]');
    if(btn){
        btn.dataset.allowed = "1";
    }

});
        setTimeout(() => {
           showPopup(
  `<b>Quiz selesai!</b><br>
   Jawaban benar: <b>${score}</b> / ${soal.length}`,
  () => {
    userAnswer[0] = { drop:{} };
    userAnswer[1] = { drop:{} };
    userAnswer[2] = {
      matrix: {},
      tf: '',
      check3c: [],
      benar3a: false,
      benar3b: false,
      benar3c: false
    };

    idx = 0;
    subIdx = 0;
    completed = 0;

    renderSoal();
    updateQuizProgress();
  },
  '🎉'
);

            // RESET
            userAnswer[0] = { drop:{} };
            userAnswer[1] = { drop:{} };
            userAnswer[2] = {
    matrix: {},
    tf: '',
    check3c: [],
    benar3a: false,
    benar3b: false,
    benar3c: false
    };

            idx = 0;
            subIdx = 0;
            completed = 0;

            renderSoal();
            updateQuizProgress();
        }, 300);
    };


  


    btnPrev.onclick = () => {

    

    saveCurrentAnswer();
    // 3c → 3b
    if (idx === 2 && subIdx === 2) {
    subIdx = 1;
    renderSoal();
    return;
    }


    // 3b → 3a
    if (idx === 2 && subIdx === 1) {
    subIdx = 0;
    renderSoal();
    return;
    }


    // soal biasa
    if (idx > 0) {
    idx--;
    subIdx = 0;
    renderSoal();
    }
    };

    /* =====================================================
    INIT
    ===================================================== */
    renderSoal();
    updateQuizProgress();

    });
    
////////////////////////////////////////////////////////////////////////////////////

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


//window.addEventListener('scroll', detectActiveSection);
//window.addEventListener('load', detectActiveSection);
</script>




<script>

/* =========================================
   GLOBAL AUDIO CONTEXT (supaya stabil)
========================================= */
const audioCtx = new (window.AudioContext || window.webkitAudioContext)();

/* =========================================
   FUNGSI SUARA SAMA SEPERTI FILE TUTORIAL
========================================= */
/* ================= AUDIO SYSTEM (SAMA PERSIS) ================= */

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
            // ✅ BENAR (3 nada naik)
            _playTone(520, 120, 'triangle');
            _playTone(780, 150, 'triangle', 120);
            _playTone(1040, 180, 'triangle', 240);
        } else {
            // ❌ SALAH (2 nada turun)
            _playTone(440, 150, 'sine', 0, 0.11);
            _playTone(330, 180, 'sine', 150, 0.11);
        }
    });
}


/* =========================================
   QUIZ LOGIC
========================================= */

let rowAnsweredCorrect = false;
let colAnsweredCorrect = false;

let compareCorrect = false;       // 🔥 baru
let rowMatrixCorrect = false;     // 🔥 baru
let colMatrixCorrect = false; 

let ayoCoba1Done = false;


/* ---------- SOAL 1 ---------- */
function checkRow() {

    const val = document.getElementById("answer-row").value;
    const fb  = document.getElementById("feedback-row");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val == 1) {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        rowAnsweredCorrect = true;
        checkAyoCoba1Complete();

        document.getElementById("column-question")
            .classList.remove("hidden");

        playFeedbackSound(true);

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}


/* ---------- SOAL 2 ---------- */
function checkCol() {

    if (!rowAnsweredCorrect) return;

    const val = document.getElementById("answer-col").value;
    const fb  = document.getElementById("feedback-col");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val == 3) {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        

        document.getElementById("compare-question")
            .classList.remove("hidden");

        playFeedbackSound(true);

        // colMatrixCorrect = true;
colAnsweredCorrect = true;
checkAyoCoba1Complete(); // 🔥 TAMBAHKAN

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}


/* ---------- SOAL 3 ---------- */


function checkCompare() {

    if (!colAnsweredCorrect) return;

    const val = document.getElementById("answer-compare").value.trim();
    const fb  = document.getElementById("feedback-compare");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val === "<") {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        compareCorrect = true; // 🔥 TAMBAHKAN
        checkAyoCoba1Complete();

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}

/* =========================================
   SOAL URAIAN - MATRIKS BARIS
========================================= */

function checkRowMatrix() {

    const val = document.getElementById("answer-row-matrix").value.toLowerCase();
    const fb  = document.getElementById("feedback-row-matrix");

    fb.classList.remove("feedback-success", "feedback-error");

    // validasi kata kunci
    if (val.includes("1 baris") || val.includes("satu baris") || val.includes("baris 1") || val.includes("baris satu") || val.includes("barisnya satu") || val.includes("barisnya 1") || val.includes("baris hanya 1") || val.includes("baris hanya satu")) {

        fb.textContent = "✅ Jawaban benar! Matriks baris memiliki satu baris.";
        fb.classList.add("feedback-success");

        document.getElementById("column-question")
            .classList.remove("hidden");

        playFeedbackSound(true);

        rowMatrixCorrect = true; // 🔥
        checkAyoCoba1Complete();

    

    } else {

        fb.textContent = "❌ Coba lagi. Perhatikan jumlah barisnya.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}


/* =========================================
   SOAL URAIAN - MATRIKS KOLOM
========================================= */

function checkColMatrix() {

    const val = document.getElementById("answer-col-matrix").value.toLowerCase();
    const fb  = document.getElementById("feedback-col-matrix");

    fb.classList.remove("feedback-success", "feedback-error");

    if (val.includes("1 kolom") || val.includes("satu kolom") || val.includes("kolom 1") || val.includes("kolom satu") || val.includes("kolomnya satu") || val.includes("kolomnya 1") || val.includes("kolom hanya 1") || val.includes("kolom hanya satu")) {

        fb.textContent = "✅ Jawaban benar! Matriks kolom memiliki satu kolom.";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        colMatrixCorrect = true;
        checkAyoCoba1Complete();

    } else {

        fb.textContent = "❌ Coba lagi. Perhatikan jumlah kolomnya.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}
function checkAyoCoba1Complete() {

    if (
        compareCorrect &&
        rowMatrixCorrect &&
        colMatrixCorrect &&
        rowAnsweredCorrect &&
        colAnsweredCorrect &&
        !ayoCoba1Done
    ) {

        ayoCoba1Done = true;

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'jenis_matriks',
                sub_materi_slug: 'ayo-coba-jenis-1'
            })
        })
        .then(res => res.json())
        .then(() => {

            const btn = document.querySelector('[data-check="ayo-coba-jenis-1"]');
            if(btn){
                btn.dataset.allowed = "1";
            }

            console.log("✅ SEMUA SOAL HALAMAN 1 SELESAI");
        });
    }
}

/* =========================================
   SOAL 1 - MATRKS PERSEGI
========================================= */
let squareCorrect = false;
let definitionCorrect = false;

let ayoCoba2Done = false;

function checkSquare() {

    const A = document.getElementById("checkA").checked;
    const B = document.getElementById("checkB").checked;
    const C = document.getElementById("checkC").checked;

    const fb = document.getElementById("feedback-square");
    fb.classList.remove("feedback-success", "feedback-error");

    // Jawaban benar: A dan C saja
    if (A && !B && C) {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        document.getElementById("definition-question")
            .classList.remove("hidden");

        playFeedbackSound(true);

        squareCorrect = true; // 🔥 TAMBAH

    checkAyoCoba2Complete(); // 🔥 TAMBAH


    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}


/* =========================================
   SOAL 2 - DEFINISI MATRKS PERSEGI
========================================= */

function checkDefinition() {

    const val1 = document.getElementById("fill1").value.toLowerCase().trim();
    const val2 = document.getElementById("fill2").value.toLowerCase().trim();

    const fb = document.getElementById("feedback-definition");
    fb.classList.remove("feedback-success", "feedback-error");

    if (
        (val1 === "baris" && val2 === "kolom") ||
        (val1 === "kolom" && val2 === "baris")
    ) {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        definitionCorrect = true; // 🔥 TAMBAH

    checkAyoCoba2Complete(); // 🔥 TAMBAH

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}
function checkAyoCoba2Complete() {

    if (
        squareCorrect &&
        definitionCorrect &&
        !ayoCoba2Done
    ) {

        ayoCoba2Done = true;

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'jenis_matriks',
                sub_materi_slug: 'ayo-coba-jenis-2'
            })
        })
        .then(res => res.json())
        .then(() => {

            const btn = document.querySelector('[data-check="ayo-coba-jenis-2"]');
            if(btn){
                btn.dataset.allowed = "1";
            }

            console.log("✅ HALAMAN 2 SELESAI");
        });
    }
}

/* =========================================
   SOAL MATRKS DATAR
========================================= */
let datarCorrect = false;
let tegakCorrect = false;
let datarMatrixCorrect = false;
let tegakMatrixCorrect = false;

let ayoCoba3Done = false;

function checkDatar() {

    const val = document.getElementById("answer-datar").value.trim();
    const fb  = document.getElementById("feedback-datar");

    fb.classList.remove("feedback-success", "feedback-error");

    // Matriks datar → baris < kolom
    if (val === "<") {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        document.getElementById("tegak-question")
            .classList.remove("hidden");

        playFeedbackSound(true);

        datarCorrect = true; // 🔥

    checkAyoCoba3Complete();

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}


/* =========================================
   SOAL MATRKS TEGAK
========================================= */

function checkTegak() {

    const val = document.getElementById("answer-tegak").value.trim();
    const fb  = document.getElementById("feedback-tegak");

    fb.classList.remove("feedback-success", "feedback-error");

    // Matriks tegak → baris > kolom
    if (val === ">") {

        fb.textContent = "✅ Jawaban benar!";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        tegakCorrect = true; // 🔥

    checkAyoCoba3Complete();

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}

/* =========================================
   SOAL URAIAN - MATRKS DATAR
========================================= */

function checkDatarMatrix() {

    const val = document.getElementById("answer-datar-matrix").value.toLowerCase();
    const fb  = document.getElementById("feedback-datar-matrix");

    fb.classList.remove("feedback-success", "feedback-error");

    if (
        val.includes("baris") &&
        val.includes("kolom") &&
        (val.includes("<") ||
         val.includes("lebih sedikit") ||
         val.includes("kolom lebih banyak") ||
         val.includes("kolom lebih besar") ||
         val.includes("baris lebih sedikit") ||
         val.includes("baris lebih kecil") ||
         val.includes("kurang dari") ||
         val.includes("lebih kecil"))
    ) {

        fb.textContent = "✅ Jawaban benar! Matriks datar memiliki baris lebih sedikit dari kolom.";
        fb.classList.add("feedback-success");

        document.getElementById("tegak-question")
            .classList.remove("hidden");

        playFeedbackSound(true);

        datarMatrixCorrect = true; // 🔥

    checkAyoCoba3Complete();

    } else {

        fb.textContent = "❌ Coba lagi. Perhatikan hubungan baris dan kolomnya.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}


/* =========================================
   SOAL URAIAN - MATRKS TEGAK
========================================= */

function checkTegakMatrix() {

    const val = document.getElementById("answer-tegak-matrix").value.toLowerCase();
    const fb  = document.getElementById("feedback-tegak-matrix");

    fb.classList.remove("feedback-success", "feedback-error");

    if (
        val.includes("baris") &&
        val.includes("kolom") &&
        (val.includes(">") ||
         val.includes("lebih banyak") ||
         val.includes("kolom lebih sedikit") ||
         val.includes("baris lebih banyak") ||
         val.includes("baris lebih besar") ||
         val.includes("lebih dari") ||
         val.includes("lebih besar"))
    ) {

        fb.textContent = "🎉 Hebat! Matriks tegak memiliki baris lebih banyak dari kolom.";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        tegakMatrixCorrect = true; // 🔥

    checkAyoCoba3Complete();

    } else {

        fb.textContent = "❌ Coba lagi. Perhatikan hubungan baris dan kolomnya.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}
function checkAyoCoba3Complete() {

    if (
        datarCorrect &&
        tegakCorrect &&
        datarMatrixCorrect &&
        tegakMatrixCorrect &&
        !ayoCoba3Done
    ) {

        ayoCoba3Done = true;

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'jenis_matriks',
                sub_materi_slug: 'ayo-coba-jenis-3'
            })
        })
        .then(res => res.json())
        .then(() => {

            const btn = document.querySelector('[data-check="ayo-coba-jenis-3"]');
            if(btn){
                btn.dataset.allowed = "1";
            }

            console.log("✅ HALAMAN 3 SELESAI");
        });
    }
}

/* =========================================
   SOAL MATRKS IDENTITAS
========================================= */
let identityCorrect = false;
let identityConclusionCorrect = false;

let ayoCoba6Done = false;

function checkIdentity() {

    const p1 = document.getElementById("id1").checked;
    const p2 = document.getElementById("id2").checked;
    const p3 = document.getElementById("id3").checked;
    const p4 = document.getElementById("id4").checked;

    const fb = document.getElementById("feedback-identity");
    fb.classList.remove("feedback-success", "feedback-error");

    // Jawaban benar: 1, 2, dan 4 saja
    if (p1 && p2 && !p3 && p4) {

        fb.textContent = "🎉 Hebat! Jawaban benar.";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        identityCorrect = true; // 🔥

    checkAyoCoba6Complete();

    } else {

        fb.textContent = "❌ Jawaban masih salah, coba lagi.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}

/* =========================================
   SOAL URAIAN - MATRKS IDENTITAS
========================================= */

function checkIdentityConclusion() {

    const val = document.getElementById("answer-identity").value.toLowerCase();
    const fb  = document.getElementById("feedback-identity-conclusion");

    fb.classList.remove("feedback-success", "feedback-error");

    const hasDiagonal = val.includes("diagonal");
    const hasSatu     = val.includes("1") || val.includes("satu");

    if (hasDiagonal && hasSatu) {

        fb.textContent = "🎉 Hebat! Jawabanmu sudah tepat.";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        identityConclusionCorrect = true; // 🔥

    checkAyoCoba6Complete();

    } else {

        fb.textContent = "❌ Jawaban belum tepat. Perhatikan sifat matriks identitas.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}
function checkAyoCoba6Complete() {

    if (
        identityCorrect &&
        identityConclusionCorrect &&
        !ayoCoba6Done
    ) {

        ayoCoba6Done = true;

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'jenis_matriks',
                sub_materi_slug: 'ayo-coba-jenis-6'
            })
        })
        .then(res => res.json())
        .then(() => {

            const btn = document.querySelector('[data-check="ayo-coba-jenis-6"]');
            if(btn){
                btn.dataset.allowed = "1";
            }

            console.log("✅ HALAMAN 6 SELESAI");
        });
    }
}

/* =========================================
   SOAL URAIAN - MATRKS NOL
========================================= */
let zeroMatrixCorrect = false;
let ayoCoba7Done = false;

function checkZeroMatrix() {

    const val = document.getElementById("answer-zero").value.toLowerCase();
    const fb  = document.getElementById("feedback-zero");

    fb.classList.remove("feedback-success", "feedback-error");

    const hasSemua = val.includes("semua");
    const hasNol   = val.includes("0") || val.includes("nol");

    if (hasSemua && hasNol) {

        fb.textContent = "🎉 Hebat! Jawabanmu sudah tepat.";
        fb.classList.add("feedback-success");

        playFeedbackSound(true);

        zeroMatrixCorrect = true; // 🔥

        checkAyoCoba7Complete();

    } else {

        fb.textContent = "❌ Jawaban belum lengkap. Perhatikan sifat matriks nol.";
        fb.classList.add("feedback-error");

        playFeedbackSound(false);
    }
}
function checkAyoCoba7Complete() {

    if (
        zeroMatrixCorrect &&
        !ayoCoba7Done
    ) {

        ayoCoba7Done = true;

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'jenis_matriks',
                sub_materi_slug: 'ayo-coba-jenis-7'
            })
        })
        .then(res => res.json())
        .then(() => {

            const btn = document.querySelector('[data-check="ayo-coba-jenis-7"]');
            if(btn){
                btn.dataset.allowed = "1";
            }

            console.log("✅ HALAMAN 7 SELESAI");
        });
    }
}
</script>



<script>
console.log("UNLOCKED FROM DB:", @json($unlocked));

</script>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const slides = Array.from(document.querySelectorAll(".materi-slide"));
    const indicator = document.getElementById("slideIndicator");

    if (!slides.length) return;

    let currentIndex = 0;
    let dots = [];

    const unlockedFromDB = @json($unlocked);

    /* =========================
       BUILD DOT + LOCK SYSTEM
    ========================== */
    slides.forEach((slide, i) => {

        const dot = document.createElement("span");
        dot.textContent = i + 1;

        const section = slide.dataset.section;

        // kalau tidak ada di database → lock
        if (!unlockedFromDB.includes(section) && i !== 0) {
            dot.classList.add("locked-dot");
        }

        dot.addEventListener("click", () => {
            if (dot.classList.contains("locked-dot")) return;
            showSlide(i);
        });

        indicator.appendChild(dot);
        dots.push(dot);
    });

    function showSlide(i) {

    if (i < 0 || i >= slides.length) return;

    slides.forEach(s => s.classList.remove("active"));
    slides[i].classList.add("active");

    currentIndex = i;
    

    dots.forEach(d => d.classList.remove("active"));
    dots[i].classList.add("active");

    const section = slides[i].dataset.section;

    // 🔥 TAMBAHAN INI
    window.location.hash = section;

    if (window.activateSidebarFor) {
        activateSidebarFor(section);
    }
    
}
    /* =========================
   SIDEBAR CLICK → SHOW SLIDE
========================= */

document.querySelectorAll('#sidebar_materi .sidebar-sublink')
  .forEach(link => {

    link.addEventListener('click', e => {

        const section = link.dataset.section;
        if (!section) return;

        const targetSlide = slides.find(
            s => s.dataset.section === section
        );

        // Kalau slide ada di halaman ini → cek lock
        if (targetSlide) {

            e.preventDefault();

            // jika section tidak unlocked dan bukan slide pertama → blok
            if (!unlockedFromDB.includes(section) && idx !== 0) return;

            const idx = slides.findIndex(
                s => s.dataset.section === section
            );

            if (idx !== -1) {
    window.location.hash = section; // kirim hash
    showSlide(idx);
}

        }

        // Kalau bukan slide di halaman ini → biarkan pindah halaman normal
    });

});



    /* =========================
       NEXT BUTTON → UNLOCK DB
    ========================== */
    document.addEventListener("click", e => {

        if (e.target.closest(".btn-next-slide")) {

            const nextIndex = currentIndex + 1;
            if (nextIndex >= slides.length) return;

            const nextSection = slides[nextIndex].dataset.section;

            fetch("{{ route('progress.unlock') }}", {
                method: "POST",
                headers: {
    "Content-Type": "application/json",
    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.content
},
                body: JSON.stringify({
                    materi_slug: "jenis_matriks",
                    sub_materi_slug: nextSection
                })
            })
            .then(res => res.json())
            .then(() => {

    // 🔥 update list unlocked di frontend
    unlockedFromDB.push(nextSection);

    // buka slide berikutnya TANPA reload
    showSlide(nextIndex);

    // buka lock dot
    dots[nextIndex].classList.remove("locked-dot");

    // buka sidebar juga
    const sidebarLink = document.querySelector(
        `.sidebar-sublink[data-section="${nextSection}"]`
    );

    if (sidebarLink) {
        sidebarLink.classList.remove("locked");

        const lockIcon = sidebarLink.querySelector(".bi-lock-fill");
        if (lockIcon) lockIcon.remove();
    }

});



        }

        if (e.target.closest(".btn-prev-slide")) {
            showSlide(currentIndex - 1);
        }

    });

    /* =========================
   INITIAL LOAD (FIX REFRESH)
========================= */

/* ==============================
   INIT SLIDE (SAMA DENGAN PENGENALAN)
============================== */

/* ==============================
   INIT SLIDE (SYNC DB)
============================== */

let initialIndex = 0;

// 1️⃣ Kalau ada hash → buka sesuai hash
const hash = window.location.hash.replace('#','');

if (hash) {

    const hashIndex = slides.findIndex(
        s => s.dataset.section === hash
    );

    if (hashIndex !== -1) {
        initialIndex = hashIndex;
    }

} else {

    // 2️⃣ Kalau tidak ada hash → buka last unlocked
    slides.forEach((slide, i) => {
        if (unlockedFromDB.includes(slide.dataset.section)) {
            initialIndex = i;
        }
    });
}

showSlide(initialIndex);

if (window.activateSidebarFor) {
    activateSidebarFor(slides[initialIndex].dataset.section);
}


// pastikan sidebar sinkron
const activeSection = slides[initialIndex].dataset.section;
if (window.activateSidebarFor) {
    activateSidebarFor(activeSection);
}


});
</script>





<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>



<script>
document.addEventListener("DOMContentLoaded", function(){

    document.querySelectorAll(".btn-next-slide").forEach(btn => {
        btn.addEventListener("click", function(e){

            const check = this.dataset.check;
            if(!check) return; // tombol biasa

            const allowed = this.dataset.allowed;

            if (allowed !== "1") {
                e.preventDefault();
                e.stopImmediatePropagation();

                document.getElementById("lockedPopup").style.display = "flex";
                return false;
            }
        });
    });

});

function closePopup() {
    document.getElementById("lockedPopup").style.display = "none";
}
</script>


<!-- TIDAK ADA TOMBOL SEBELUMNYA DI SLIDE 1 -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll('.materi-slide');

    slides.forEach((slide, i) => {
        const prevBtn = slide.querySelector('.btn-prev-slide');

        if (prevBtn) {
            if (i === 0) {
                prevBtn.style.display = 'none'; // 🔥 HILANG TOTAL
            } else {
                prevBtn.style.display = 'inline-block';
            }
        }
    });
});
</script>
<script>
function paksaFixPrev() {
    const current = document.getElementById('currentQuestion-2');
    const prevBtn = document.getElementById('btn-prev-2');
    const nav = prevBtn?.parentElement;

    if (!current || !prevBtn || !nav) return;

    const nomor = parseInt(current.innerText);

    if (nomor === 1) {
        prevBtn.style.display = 'none';
        nav.style.justifyContent = 'flex-end';
    } else {
        prevBtn.style.display = 'inline-block';
        nav.style.justifyContent = 'space-between';
    }
}

// 🔥 PAKSA JALAN TERUS
setInterval(paksaFixPrev, 50);
</script>
</body>
</html>
