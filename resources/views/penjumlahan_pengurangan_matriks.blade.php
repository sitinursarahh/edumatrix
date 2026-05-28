<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Penjumlahan dan pengurangan Matriks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/materi_pengertian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jenis_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kesamaan_dua_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/penjumlahan_pengurangan_matriks.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://unpkg.com/mathlive"></script>
    <link rel="stylesheet" href="https://unpkg.com/mathlive/dist/mathlive.core.css">
    <link rel="stylesheet" href="https://unpkg.com/mathlive/dist/mathlive.css">

    <script>
window.MathJax = {
  tex: {
    inlineMath: [['\\(', '\\)']],
    displayMath: [['\\[', '\\]']]
  }
};
</script>

<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>
<body>

{{-- ================= NAVBAR ================= --}}
@include('layouts.header')

<div class="d-flex">

    {{-- ================= SIDEBAR ================= --}}
    @include('layouts.sidebar_materi')

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="main-content flex-grow-1 p-4">

        <div class="dashboard-wrapper p-4">

            {{-- ================= SECTION MATRIKS BARIS ================= --}}
            <section class="materi-slide active" data-section="penjumlahan-matriks-1">

                <div class="pengenalan-matriks-header">
                    <h1>PENJUMLAHAN DAN PENGURANGAN MATRIKS</h1>
                </div>

                {{-- Tujuan Pembelajaran --}}
                <div class="tujuan-box">
                    <h3 class="tujuan-title">Tujuan Pembelajaran</h3>
                    <ol class="tujuan-list">
                        <li>Peserta didik mampu menjelaskan dan melakukan operasi penjumlahan serta pengurangan dua matriks pada matriks yang diberikan dengan benar.</li>
                    </ol>
                </div>

                {{-- Judul Materi --}}
                <h2 class="materi-title">1. Penjumlahan Matriks</h2>
                <p>
                    Jika matriks \( A \) dan matriks \( B \) memiliki ordo yang sama, yaitu \( m \times n \),
                    dengan elemen-elemen masing-masing \( a_{ij} \) dan \( b_{ij} \), maka dapat dibentuk sebuah
                    matriks \( C \) yang merupakan hasil penjumlahan keduanya, ditulis sebagai \( C = A + B \).
                    Matriks \( C \) juga berordo \( m \times n \), dengan setiap elemennya ditentukan oleh rumus
                    \( c_{ij} = a_{ij} + b_{ij} \) untuk setiap \( i \) dan \( j \). <strong>Proses penjumlahan matriks dapat dilakukan apabila matriks-matriks yang dioperasikan memiliki
                    ordo yang sama.</strong> Penjumlahan ini dilakukan dengan cara menjumlahkan setiap elemen yang berada pada posisi atau letak yang sama pada matriks-matriks tersebut.
                </p>

                <div class="box-masalah">
                    <div class="box-masalah-title">
                        <strong>Sifat - Sifat Penjumlahan Matriks</strong>
                    </div>
                    <div class="box-masalah-content">
                      <br>
                        <p>
                        Misalkan terdapat matriks \( A \), \( B \), \( C \), dan \( O \) yang semuanya memiliki
                        ordo sama, maka penjumlahan matriks memenuhi sifat-sifat berikut:
                        </p>
                        <ul class="sifat-list">

    <!-- ================= KOMUTATIF ================= -->
    <li>

        <div class="sifat-header">
            <span>
                <strong>Sifat komutatif:</strong>
                urutan penjumlahan tidak memengaruhi hasil,
                yaitu \( A + B = B + A \).
            </span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-komutatif')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-komutatif">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                ,
                \quad
                B =
                \begin{bmatrix}
                2 & 1 \\
                0 & 3
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                A + B =
                \begin{bmatrix}
                3 & 3 \\
                3 & 7
                \end{bmatrix}
                \)
            </div>

            <div class="matrix-center-fix">
                \(
                B + A =
                \begin{bmatrix}
                3 & 3 \\
                3 & 7
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( A + B = B + A \),
                maka penjumlahan matriks memiliki sifat komutatif.
            </p>

        </div>

    </li>

    <!-- ================= ASOSIATIF ================= -->
    <li>

        <div class="sifat-header">
            <span>
    <strong>Sifat asosiatif:</strong>
    pengelompokan penjumlahan tidak mengubah hasil,
    yakni

    <span class="math-asosiatif">
        <span class="bagian-atas">
            \( (A + B) + C = \)
        </span>

        <span class="bagian-bawah">
            \( A + (B + C) \)
        </span>
    </span>
</span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-asosiatif')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-asosiatif">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                ,
                \quad
                B =
                \begin{bmatrix}
                2 & 1 \\
                0 & 3
                \end{bmatrix}
                ,
                \quad
                C =
                \begin{bmatrix}
                4 & 3 \\
                2 & 1
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                (A+B)+C =
                \left(
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                +
                \begin{bmatrix}
                2 & 1 \\
                0 & 3
                \end{bmatrix}
                \right)
                +
                \begin{bmatrix}
                4 & 3 \\
                2 & 1
                \end{bmatrix}
                =
                \begin{bmatrix}
                7 & 6 \\
                5 & 8
                \end{bmatrix}
                \)
            </div>

            <div class="matrix-center-fix">
                \(
                A+(B+C) =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                +
                \left(
                \begin{bmatrix}
                2 & 1 \\
                0 & 3
                \end{bmatrix}
                +
                \begin{bmatrix}
                4 & 3 \\
                2 & 1
                \end{bmatrix}
                \right)
                =
                \begin{bmatrix}
                7 & 6 \\
                5 & 8
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( (A+B)+C = A+(B+C) \),
                maka penjumlahan matriks memiliki sifat asosiatif.
            </p>

        </div>

    </li>

    <!-- ================= MATRIKS O ================= -->
    <li>

        <div class="sifat-header">
            <span>
                <strong>Matriks O:</strong>
                terdapat matriks \( O \) yang jika dijumlahkan
                dengan \( A \) tidak mengubah nilai \( A \),
                yaitu \( A + O = O + A = A \).
            </span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-o')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-o">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                ,
                \quad
                O =
                \begin{bmatrix}
                0 & 0 \\
                0 & 0
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                A + O =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                \)
            </div>

            <div class="matrix-center-fix">
                \(
                O + A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( A + O = O + A = A \),
                maka penjumlahan matriks memiliki sifat Matriks O.
            </p>

        </div>

    </li>

    <!-- ================= MATRIKS LAWAN ================= -->
    <li>

        <div class="sifat-header">
            <span>
                <strong>Matriks lawan:</strong>
                setiap matriks \( A \) memiliki pasangan matriks
                \( -A \) sehingga jika dijumlahkan hasilnya adalah
                matriks \( O \), yaitu \( A + (-A) = O \).
            </span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-lawan')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-lawan">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                \)
            </div>

            <p>
                Matriks lawan dari \( A \) adalah:
            </p>

            <div class="matrix-center-fix">
                \(
                -A =
                \begin{bmatrix}
                -1 & -2 \\
                -3 & -4
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                A + (-A) =
                \begin{bmatrix}
                0 & 0 \\
                0 & 0
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( A + (-A) = O \),
                maka penjumlahan matriks memiliki sifat Matriks Lawan.
            </p>

        </div>

    </li>

</ul>
                    </div>
                    </div>
                    <br>
                    <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                    </div>
                    </section>


                    <section class="materi-slide" data-section="penjumlahan-matriks-2">
                    <p><strong>Contoh 1 :</strong></p>
                    <p>Diketahui matriks-matriks berikut ini.</p>
                    <div class="matrix-responsive-container">
    <div class="matrix-item">
    \( A = \begin{bmatrix} 3 & 5 & 2 \\ 4 & 1 & 6 \end{bmatrix}, \)
</div>
    <div class="matrix-item">
        \( B = \begin{bmatrix} 2 & 3 & 4 \\ 5 & 2 & 1 \end{bmatrix} \)
    </div>
</div>
                    <p>Tentukan jumlah matriks \(A\) dan matriks \(B\).</p>
                    <br>
                    <p><strong>Penyelesaian :</strong></p>
                    <!-- <p class="text-center">
                      Klik elemen pada hasil matriks untuk mengetahui elemen yang di operasikan
                    </p> -->

                    <div class="matrix-tutorial-stack tutorial-add">

                      <div class="matrix-tutorial-box row-tutorial">

                        <!-- A + B = -->
                        <div class="matrix-frame">
                          <span class="matrix-label">\( A + B = \)</span>
                        </div>

                        <!-- Matriks A -->
                        <div class="matrix-frame">
                          <span class="math-bracket-2">\( \left[ \right. \)</span>
                          <table class="matrix-html matrix-a">
                            <tr>
                              <td data-row="0" data-col="0">3</td>
                              <td data-row="0" data-col="1">5</td>
                              <td data-row="0" data-col="2">2</td>
                            </tr>
                            <tr>
                              <td data-row="1" data-col="0">4</td>
                              <td data-row="1" data-col="1">1</td>
                              <td data-row="1" data-col="2">6</td>
                            </tr>
                          </table>
                          <span class="math-bracket-2">\( \left. \right] \)</span>
                        </div>

                        <!-- tanda + -->
                        <div class="matrix-frame">
                          <span class="matrix-label">\( + \)</span>
                        </div>

                        <!-- Matriks B -->
                        <div class="matrix-frame">
                          <span class="math-bracket-2">\( \left[ \right. \)</span>
                          <table class="matrix-html matrix-b">
                            <tr>
                              <td data-row="0" data-col="0">2</td>
                              <td data-row="0" data-col="1">3</td>
                              <td data-row="0" data-col="2">4</td>
                            </tr>
                            <tr>
                              <td data-row="1" data-col="0">5</td>
                              <td data-row="1" data-col="1">2</td>
                              <td data-row="1" data-col="2">1</td>
                            </tr>
                          </table>
                          <span class="math-bracket-2">\( \left. \right] \)</span>
                        </div>

                        <!-- tanda = -->
                        <div class="matrix-frame">
                          <span class="matrix-label">\( = \)</span>
                        </div>

                        <!-- Matriks hasil -->
                        <div class="matrix-frame">
                          <span class="math-bracket-2">\( \left[ \right. \)</span>
                          <table class="matrix-html matrix-result">
                            <tr>
                              <td data-row="0" data-col="0">5</td>
                              <td data-row="0" data-col="1">8</td>
                              <td data-row="0" data-col="2">6</td>
                            </tr>
                            <tr>
                              <td data-row="1" data-col="0">9</td>
                              <td data-row="1" data-col="1">3</td>
                              <td data-row="1" data-col="2">7</td>
                            </tr>
                          </table>
                          <span class="math-bracket-2">\( \left. \right] \)</span>
                        </div>

                      </div>

                      <!-- KETERANGAN / INSTRUCTION -->
                      <div class="matrix-explanation">
                        Klik salah satu elemen hasil di atas untuk melihat perhitungannya
                      </div>

                    </div>

                      <p><strong>Contoh 2 :</strong></p>
                        Seorang penjual buah di pasar terapung menggunakan satu jukung (perahu) dagang untuk menjual buah. Ia menjual dua
                        jenis buah, yaitu pisang dan jeruk. Dalam satu hari, penjual tersebut berjualan pada dua waktu, yaitu pagi dan siang,
                        lalu mencatat jumlah buah yang terjual (dalam kilogram).
                      </p>
                      <p>Data penjualan:</p>
                      <p class="text-center">Hari Senin</p>
                      <!-- ===== Tabel Data ===== -->
                      <div class="table-responsive table-cuaca mb-3">
                          <table class="tabel-matriks">
                              <thead>
                                  <tr>
                                      <th>Waktu</th>
                                      <th>Pisang (Kg)</th>
                                      <th>Jeruk (Kg)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Pagi</td>
                                      <td>25</td>
                                      <td>18</td>
                                  </tr>
                                  <tr>
                                      <td>Siang</td>
                                      <td>30</td>
                                      <td>20</td>
                                  </tr>
                              </tbody>
                          </table>
                          <!-- CAPTION -->
                          <div class="image-caption">
                              Table 4.1 Data Penjualan Hari Senin
                          </div>
                      </div>

                      <p class="text-center">Hari Selasa</p>
                      <!-- ===== Tabel Data ===== -->
                      <div class="table-responsive table-cuaca mb-3">
                          <table class="tabel-matriks">
                              <thead>
                                  <tr>
                                      <th>Waktu</th>
                                      <th>Pisang (Kg)</th>
                                      <th>Jeruk (Kg)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Pagi</td>
                                      <td>28</td>
                                      <td>16</td>
                                  </tr>
                                  <tr>
                                      <td>Siang</td>
                                      <td>27</td>
                                      <td>22</td>
                                  </tr>
                              </tbody>
                          </table>
                          <!-- CAPTION -->
                          <div class="image-caption">
                              Table 4.2 Data Hasil Panen Lahan 2
                          </div>
                      </div>
                      <ol>
                        <li>Nyatakan data penjualan buah hari Senin dan hari Selasa ke dalam bentuk matriks \( A \) dan \( B \).</li>
                        <li>Tentukan hasil penjumlahan matriks \( A \) + \( B \) untuk mengetahui total penjualan buah selama dua hari.</li>
                        <li>Berapa total penjualan buah pisang selama dua hari tersebut?</li>
                        <li>Pada waktu apakah penjualan buah jeruk paling banyak jika dilihat dari data dua hari tersebut?</li>
                      </ol>
                      <br>
                      <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                      </div>
                      </section>



                      <section class="materi-slide" data-section="penjumlahan-matriks-3">
                      <p><strong>Penyelesaian :</strong></p>
                      <ol>
                      <li>
                        Nyatakan data penjualan buah hari Senin dan hari Selasa ke dalam bentuk matriks \( A \) dan \( B \).
                        <p>Matriks hasil penjualan dapat ditulis sebagai:</p>
                        <div class="matrix-responsive-container">
    <div class="matrix-item">
        \( A = \begin{bmatrix} 25 & 18 \\ 30 & 20 \end{bmatrix}, \)
    </div>
    <div class="matrix-item">
        \( B = \begin{bmatrix} 28 & 16 \\ 27 & 22 \end{bmatrix} \)
    </div>
</div>
                      </li>
                      <li>
                        Tentukan hasil penjumlahan matriks \( A \) + \( B \) untuk mengetahui total penjualan buah selama dua hari.
                        <br>
                        <br>
                        <!-- <p class="text-center">
                          Klik elemen pada hasil matriks untuk mengetahui elemen yang di operasikan
                        </p> -->
                          <div class="matrix-tutorial-stack tutorial-add">
                            <div class="matrix-tutorial-box row-tutorial">

                              <!-- A + B = -->
                              <div class="matrix-frame">
                                <span class="matrix-label">\( A + B = \)</span>
                              </div>

                              <!-- Matriks A -->
                              <div class="matrix-frame">
                                <span class="math-bracket-2">\( \left[ \right. \)</span>
                                <table class="matrix-html matrix-a">
                                  <tr>
                                    <td data-row="0" data-col="0">25</td>
                                    <td data-row="0" data-col="1">18</td>
                                  </tr>
                                  <tr>
                                    <td data-row="1" data-col="0">30</td>
                                    <td data-row="1" data-col="1">20</td>
                                  </tr>
                                </table>
                                <span class="math-bracket-2">\( \left. \right] \)</span>
                              </div>

                              <!-- tanda + -->
                              <div class="matrix-frame">
                                <span class="matrix-label">\( + \)</span>
                              </div>

                              <!-- Matriks B -->
                              <div class="matrix-frame">
                                <span class="math-bracket-2">\( \left[ \right. \)</span>
                                <table class="matrix-html matrix-b">
                                  <tr>
                                    <td data-row="0" data-col="0">28</td>
                                    <td data-row="0" data-col="1">16</td>
                                  </tr>
                                  <tr>
                                    <td data-row="1" data-col="0">27</td>
                                    <td data-row="1" data-col="1">22</td>
                                  </tr>
                                </table>
                                <span class="math-bracket-2">\( \left. \right] \)</span>
                              </div>

                              <!-- tanda = -->
                              <div class="matrix-frame">
                                <span class="matrix-label">\( = \)</span>
                              </div>

                              <!-- Matriks HASIL (YANG DIKLIK) -->
                              <div class="matrix-frame">
                                <span class="math-bracket-2">\( \left[ \right. \)</span>
                                <table class="matrix-html matrix-result">
                                  <tr>
                                    <td data-row="0" data-col="0">53</td>
                                    <td data-row="0" data-col="1">34</td>
                                  </tr>
                                  <tr>
                                    <td data-row="1" data-col="0">57</td>
                                    <td data-row="1" data-col="1">42</td>
                                  </tr>
                                </table>
                                <span class="math-bracket-2">\( \left. \right] \)</span>
                              </div>

                            </div>
                            <!-- KETERANGAN / INSTRUCTION -->
                            <div class="matrix-explanation">
                              Klik salah satu elemen hasil di atas untuk melihat perhitungannya
                            </div>
                          </div>
                          <p>Jadi, total hasil penjualan buah selama dua hari adalah:</p>
                          <div class="text-center my-3 matrix-display-big">
                              \(
                              \begin{bmatrix}
                              53 & 34 \\
                              57 & 42
                              \end{bmatrix}
                              \)
                          </div>
                      </li>
                      <!-- <ul> -->
                      <li>
                        Berapa total penjualan buah pisang selama dua hari tersebut?

                        <div class="matrix-wrapper">

                          <!-- LABEL KOLOM -->
                          <div class="column-labels">
                            <div class="col">
                              Kolom<br>pisang
                              <div class="arrow-up"></div>
                            </div>
                            <div class="col">
                              Kolom<br>jeruk
                              <div class="arrow-up"></div>
                            </div>
                          </div>

                          <div class="matrix-row">

                            <!-- LABEL BARIS -->
                            <div class="row-labels">
                              <div class="row">
                                baris waktu pagi
                                <div class="arrow-left"></div>
                              </div>
                              <div class="row">
                                baris waktu siang
                                <div class="arrow-left"></div>
                              </div>
                            </div>

                            <!-- MATRIX -->
                            <table class="matrix-table">
                              <tr>
                                <td>53</td>
                                <td>34</td>
                              </tr>
                              <tr>
                                <td>57</td>
                                <td>42</td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <p>Total pisang = hasil penjualan pagi + hasil penjualan siang = 53 + 57 = 110 kg</p>
                      </li>
                      <li>
                          Pada waktu apakah penjualan buah jeruk paling banyak jika dilihat dari data dua hari tersebut?
                          <p>Dari hasil penjumlahan: </p>
                          <p>Penjualan pagi jeruk = 34 kg</p>
                          <p>Penjualan siang jeruk = 42 kg</p>
                          <p>Karena 42 > 34, maka hasil penjualan jeruk paling banyak terjadi pada waktu siang.</p>
                      </li>
                    </ol>
                    <br>
                    <!-- <hr> -->
                    <br>
                    <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                    </div>
                    </section>
                

                    <section class="materi-slide" data-section="pengurangan-matriks-1">
                    {{-- Judul Materi --}}
                  <h2 class="materi-title">2. Pengurangan Matriks</h2>
                    Jika matriks \( A \) dan matriks \( B \) memiliki ordo yang sama, yaitu \( m \times n \), maka pengurangan matriks \( A \) dengan matriks \( B \)
                    didefinisikan sebagai penjumlahan antara matriks \( A \) dan lawan dari matriks \( B \). <strong>Pengurangan matriks dapat dilakukan apabila matriks-matriks
                    yang dioperasikan memiliki ordo yang sama.</strong> Proses pengurangan ini dilakukan dengan cara mengurangkan setiap elemen yang berada pada posisi atau letak
                    yang sama pada matriks-matriks tersebut. Penulisan operasinya dapat dinyatakan sebagai berikut.
                  </p>
                  <div class="text-center my-3 matrix-center-fix">
                    \[
                    A - B = A + (-B)
                    \]
                  </div>
                  <p>
                    Jika matriks \( A \) dan matriks \( B \) memiliki ordo yang sama, yaitu
                    \( m \times n \), dengan elemen-elemen masing-masing \( a_{ij} \) dan
                    \( b_{ij} \), maka dapat dibentuk sebuah matriks \( C \) yang merupakan
                    hasil pengurangan \( A - B \), ditulis sebagai \( C = A - B \).
                    Matriks \( C \) juga berordo \( m \times n \), di mana setiap elemennya
                    ditentukan dengan rumus \( c_{ij} = a_{ij} - b_{ij} \) untuk setiap
                    \( i \) dan \( j \).
                  </p>
                  <div class="box-masalah">
                  <div class="box-masalah-title">
                    <strong>Sifat - Sifat Pengurangan Matriks</strong>
                  </div>

                  <div class="box-masalah-content">
                    <br>
                    <p>
                      Misalkan terdapat matriks \( A \), \( B \), \( C \), dan \( O \) yang semuanya
                      memiliki ordo sama, maka pengurangan matriks memenuhi sifat-sifat berikut:
                    </p>

                    <ul class="sifat-list">

    <!-- ================= TIDAK KOMUTATIF ================= -->
    <li>

        <div class="sifat-header">
            <span>
                <strong>Tidak bersifat komutatif:</strong>
                urutan pengurangan berpengaruh terhadap hasil,
                artinya \( A - B \neq B - A \).
            </span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-tidak-komutatif')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-tidak-komutatif">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                ,
                \quad
                B =
                \begin{bmatrix}
                2 & 1 \\
                0 & 3
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                A - B =
                \begin{bmatrix}
                -1 & 1 \\
                3 & 1
                \end{bmatrix}
                \)
            </div>

            <div class="matrix-center-fix">
                \(
                B - A =
                \begin{bmatrix}
                1 & -1 \\
                -3 & -1
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( A - B \neq B - A \),
                maka pengurangan matriks tidak bersifat komutatif.
            </p>

        </div>

    </li>

    <!-- ================= ASOSIATIF LAWAN ================= -->
    <li>

        <div class="sifat-header">
            <span>
                <strong>Bersifat asosiatif terhadap lawan matriks:</strong>
                pengurangan dapat ditulis sebagai penjumlahan
                dengan lawan matriks,
                yaitu \( A - B = A + (-B) \).
            </span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-asosiatif-lawan')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-asosiatif-lawan">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                ,
                \quad
                B =
                \begin{bmatrix}
                2 & 1 \\
                0 & 3
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                A - B =
                \begin{bmatrix}
                -1 & 1 \\
                3 & 1
                \end{bmatrix}
                \)
            </div>

            <div class="matrix-center-fix">
                \(
                A + (-B) =
                \begin{bmatrix}
                -1 & 1 \\
                3 & 1
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( A - B = A + (-B) \),
                maka pengurangan matriks bersifat asosiatif terhadap lawan matriks.
            </p>

        </div>

    </li>

    <!-- ================= MATRIKS O ================= -->
    <li>

        <div class="sifat-header">
            <span>
                <strong>Matriks O:</strong>
                jika sebuah matriks dikurangi dengan matriks \( O \),
                hasilnya tetap sama, yaitu
                \( A - O = A \).
            </span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-pengurangan-o')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-pengurangan-o">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                ,
                \quad
                O =
                \begin{bmatrix}
                0 & 0 \\
                0 & 0
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                A - O =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                \)
            </div>

            <div class="matrix-center-fix">
                \(
                O - A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( A - O = O - A = A \),
                maka pengurangan matriks memiliki sifat Matriks O.
            </p>

        </div>

    </li>

    <!-- ================= DIRI SENDIRI ================= -->
    <li>

        <div class="sifat-header">
            <span>
                <strong>Matriks terhadap dirinya sendiri:</strong>
                jika suatu matriks dikurangi dengan dirinya sendiri,
                hasilnya adalah matriks \( O \),
                yaitu \( A - A = O \).
            </span>

            <button class="btn-bukti"
                onclick="toggleBukti('bukti-diri-sendiri')">
                Cek Pembuktian
            </button>
        </div>

        <div class="box-bukti" id="bukti-diri-sendiri">

            <p><strong>Diketahui:</strong></p>

            <div class="matrix-center-fix">
                \(
                A =
                \begin{bmatrix}
                1 & 2 \\
                3 & 4
                \end{bmatrix}
                \)
            </div>

            <p><strong>Jawaban:</strong></p>

            <div class="matrix-center-fix">
                \(
                A - A =
                \begin{bmatrix}
                0 & 0 \\
                0 & 0
                \end{bmatrix}
                \)
            </div>

            <p>
                Jadi, hasilnya
                \( A - A = O \),
                maka pengurangan matriks memiliki sifat Matriks terhadap dirinya sendiri.
            </p>

        </div>

    </li>

</ul>
                  </div>
                </div>
                <br>
                <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                </div>
                </section>



                <section class="materi-slide" data-section="pengurangan-matriks-2">
                <p><strong>Contoh 1 :</strong></p>
                <p>
                  Diberikan matriks
                  \( A =
                  \begin{bmatrix}
                    7 & 2 \\
                    -5 & 4
                  \end{bmatrix} \)
                  dan matriks
                  \( B =
                  \begin{bmatrix}
                    3 & -1 \\
                    -6 & 2
                  \end{bmatrix} \).
                  Tentukan \( A - B \).
                </p>
                <br>
                <p><strong>Penyelesaian :</strong></p>
                <!-- <p class="text-center">
                    Klik elemen pada hasil matriks untuk mengetahui elemen yang di operasikan
                </p> -->


                <div class="matrix-tutorial-stack tutorial-sub">
                      <div class="matrix-tutorial-box row-tutorial">
                        <!-- A - B = -->
                        <div class="matrix-frame">
                          <span class="matrix-label">\( A - B = \)</span>
                        </div>
                        <!-- Matriks A -->
                        <div class="matrix-frame">
                          <span class="math-bracket-2">\( \left[ \right. \)</span>
                          <table class="matrix-html matrix-a">
                            <tr>
                              <td data-row="0" data-col="0">7</td>
                              <td data-row="0" data-col="1">2</td>
                            </tr>
                            <tr>
                              <td data-row="1" data-col="0">-5</td>
                              <td data-row="1" data-col="1">4</td>
                            </tr>
                          </table>
                          <span class="math-bracket-2">\( \left. \right] \)</span>
                        </div>
                        <!-- tanda - -->
                        <div class="matrix-frame">
                          <span class="matrix-label">\( - \)</span>
                        </div>
                        <!-- Matriks B -->
                        <div class="matrix-frame">
                          <span class="math-bracket-2">\( \left[ \right. \)</span>
                          <table class="matrix-html matrix-b">
                            <tr>
                              <td data-row="0" data-col="0">3</td>
                              <td data-row="0" data-col="1">-1</td>
                            </tr>
                            <tr>
                              <td data-row="1" data-col="0">-6</td>
                              <td data-row="1" data-col="1">2</td>
                            </tr>
                          </table>
                          <span class="math-bracket-2">\( \left. \right] \)</span>
                        </div>
                        <!-- tanda = -->
                        <div class="matrix-frame">
                          <span class="matrix-label">\( = \)</span>
                        </div>
                        <!-- Matriks hasil (YANG DIKLIK) -->
                        <div class="matrix-frame">
                          <span class="math-bracket-2">\( \left[ \right. \)</span>
                          <table class="matrix-html matrix-result">
                            <tr>
                              <td data-row="0" data-col="0">4</td>
                              <td data-row="0" data-col="1">3</td>
                            </tr>
                            <tr>
                              <td data-row="1" data-col="0">1</td>
                              <td data-row="1" data-col="1">2</td>
                            </tr>
                          </table>
                          <span class="math-bracket-2">\( \left. \right] \)</span>
                        </div>
                      </div>
                      <!-- KETERANGAN / INSTRUCTION -->
                            <div class="matrix-explanation">
                              Klik salah satu elemen hasil di atas untuk melihat perhitungannya
                            </div>
                      </div>
                      <p><strong>Contoh 2 :</strong></p>
                      <p>Sebuah minimarket mencatat jumlah stok minuman pada dua rak, yaitu rak depan dan rak belakang. Jenis minuman yang dijual adalah air mineral botol dan teh botol.</p>
                      <p>Data stok minuman pada hari Senin dan Selasa disajikan dalam tabel berikut.</p>
                      <p class="text-center">Hari Senin</p>
                      <!-- ===== Tabel Data ===== -->
                      <div class="table-responsive table-cuaca mb-3">
                          <table class="tabel-matriks">
                              <thead>
                                  <tr>
                                      <th>Rak</th>
                                      <th>Air Mineral</th>
                                      <th>Teh Botol</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Rak Depan</td>
                                      <td>52</td>
                                      <td>31</td>
                                  </tr>
                                  <tr>
                                      <td>Rak Belakang</td>
                                      <td>47</td>
                                      <td>26</td>
                                  </tr>
                              </tbody>
                          </table>
                          <!-- CAPTION -->
                          <div class="image-caption">
                              Table 4.3 Data Penjualan Minimarket Hari Senin
                          </div>
                      </div>

                      <p class="text-center">Hari Selasa</p>
                      <!-- ===== Tabel Data ===== -->
                      <div class="table-responsive table-cuaca mb-3">
                          <table class="tabel-matriks">
                              <thead>
                                  <tr>
                                      <th>Rak</th>
                                      <th>Air Mineral</th>
                                      <th>Teh Botol</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Rak Depan</td>
                                      <td>45</td>
                                      <td>28</td>
                                  </tr>
                                  <tr>
                                      <td>Rak Belakang</td>
                                      <td>40</td>
                                      <td>20</td>
                                  </tr>
                              </tbody>
                          </table>
                          <!-- CAPTION -->
                          <div class="image-caption">
                              Table 4.4 Data Penjualan Minimarket Hari Selasa
                          </div>
                      </div>
                      <p>Berapa banyak minuman yang terjual dari hari Senin ke hari Selasa?</p>
                      <br>
                      <p><strong>Penyelesaian :</strong></p>
                      <!-- <p>Misalkan:</p> -->
                      <div class="matrix-center-fix">
    <div class="matrix-scroll-wrapper">
        \[
        A =
        \begin{bmatrix}
        52 & 31 \\
        47 & 26
        \end{bmatrix}
        \quad \text{(stok hari Senin)}
        \]
    </div>
</div>

<div class="matrix-center-fix">
    <div class="matrix-scroll-wrapper">
        \[
        B =
        \begin{bmatrix}
        45 & 28 \\
        40 & 20
        \end{bmatrix}
        \quad \text{(stok hari Selasa)}
        \]
    </div>
</div>
                      <p>Ket:</p>
                      <p>Kolom 1 Air Mineral</p>
                      <p>Kolom 2 Teh Botol</p>
                      <p>Baris 1 Rak Depan</p>
                      <p>Baris 2 Rak Belakang</p>
                      <br>
                      <p>Maka banyak air mineral dan teh botol yang terjual adalah:</p>
                      <!-- <p class="text-center">
                          Klik elemen pada hasil matriks untuk mengetahui elemen yang di operasikan
                      </p> -->


                      <div class="matrix-tutorial-stack tutorial-sub">
  <div class="matrix-tutorial-box row-tutorial">

    <!-- A - B = -->
    <div class="matrix-frame">
      <span class="matrix-label">\( A - B = \)</span>
    </div>

    <!-- Matriks A -->
    <div class="matrix-frame">
      <span class="math-bracket-2">\( \left[ \right. \)</span>
      <table class="matrix-html matrix-a">
        <tr>
          <td data-row="0" data-col="0">52</td>
          <td data-row="0" data-col="1">31</td>
        </tr>
        <tr>
          <td data-row="1" data-col="0">47</td>
          <td data-row="1" data-col="1">26</td>
        </tr>
      </table>
      <span class="math-bracket-2">\( \left. \right] \)</span>
    </div>

    <!-- tanda - -->
    <div class="matrix-frame">
      <span class="matrix-label">\( - \)</span>
    </div>

    <!-- Matriks B -->
    <div class="matrix-frame">
      <span class="math-bracket-2">\( \left[ \right. \)</span>
      <table class="matrix-html matrix-b">
        <tr>
          <td data-row="0" data-col="0">45</td>
          <td data-row="0" data-col="1">28</td>
        </tr>
        <tr>
          <td data-row="1" data-col="0">40</td>
          <td data-row="1" data-col="1">20</td>
        </tr>
      </table>
      <span class="math-bracket-2">\( \left. \right] \)</span>
    </div>

    <!-- tanda = -->
    <div class="matrix-frame">
      <span class="matrix-label">\( = \)</span>
    </div>

    <!-- HASIL -->
    <div class="matrix-frame">
      <span class="math-bracket-2">\( \left[ \right. \)</span>
      <table class="matrix-html matrix-result">
        <tr>
          <td data-row="0" data-col="0">7</td>
          <td data-row="0" data-col="1">3</td>
        </tr>
        <tr>
          <td data-row="1" data-col="0">7</td>
          <td data-row="1" data-col="1">6</td>
        </tr>
      </table>
      <span class="math-bracket-2">\( \left. \right] \)</span>
    </div>

  </div>

  <div class="matrix-explanation">
    Klik salah satu elemen hasil di atas untuk melihat perhitungannya
  </div>
</div>
                      <p>Jadi, total hasil minuman yang terjual dari hari Senin ke hari Selasa adalah:</p>
                      <div class="text-center my-3 matrix-center-fix">
                        \[
                        \begin{bmatrix}
                        7 & 3 \\
                        7 & 6
                        \end{bmatrix}
                        \]
                      </div>
                      <p class="judul">Rak depan:</p>
    <ul>
        <li>Air mineral terjual 7 botol</li>
        <li>Teh botol terjual 7 botol</li>
    </ul>

    <p class="judul">Rak belakang:</p>
    <ul>
        <li>Air mineral terjual 7 botol</li>
        <li>Teh botol terjual 6 botol</li>
    </ul>
                {{-- (konten materi matriks baris di sini) --}}

                <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide">Selanjutnya</button>
                    </div>
            </section>
            {{-- ================= END SECTION MATRIKS BARIS ================= --}}


             {{-- =================================================
                    SECTION: MARI MENCOBA
                ================================================= --}}
                <section class="materi-slide" data-section="mari-mencoba-jumlahkurang">
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
    data-check="mari-mencoba-jumlahkurang-matriks"
    data-allowed="{{ in_array('mari-mencoba-jumlahkurang-matriks', $completed ?? []) ? '1' : '0' }}">
    Selanjutnya
</button>
                    </div>
                    
                </section>


                {{-- =================================================
                    SECTION: KUIS PENGERTIAN MATRIKS
                ================================================= --}}
                <section class="materi-slide" data-section="kuis-jumlahkurang">
                    <div class="quiz-action-wrapper">
                      <br>
                      <br>
                      <p class="refleksi-hint text-center">
                        Silahkan klik tombol di bawah ini
                        untuk mengerjakan kuis agar dapat <strong>melanjutkan ke materi berikutnya</strong> 👇
                    </p>
                        <!-- KARTU KUIS -->
                        <div class="quiz-link-wrapper mb-7">
                            <a href="{{ route('petunjuk.kuis', ['quiz_id' => 4]) }}" class="quiz-link-card">

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
                                'materi' => 'penjumlahan_pengurangan_matriks',
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
        </div>
        {{-- END dashboard-wrapper --}}

    </div>
    {{-- END main-content --}}

</div>
{{-- END d-flex --}}

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


<script>
    
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

  const matched = Array.from(
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
).filter(a => {
  const sections = a.dataset.section?.split(',') || [];
  return sections.includes(sectionId);
});
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



  /* ================= HASH LOAD ================= */
  document.addEventListener('DOMContentLoaded', () => {
    const hash = location.hash.replace('#','');
    if(hash) activateSidebarFor(hash);
  });

})();

/* ======================================================
   PAGE BASED ACTIVE (URL) — TIDAK RESET MENU
====================================================== */
document.addEventListener('DOMContentLoaded', function () {
  const path = window.location.pathname;

  const activeLink = document.querySelector(
    `#sidebar_materi .sidebar-sublink[href="${path}"]`
  );

  if(activeLink){
    activeLink.classList.add('active');

    const submenu = activeLink.closest('.sidebar-submenu');
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
  }
});

// =================== TUTORIAL PENJUMLAHAN MATRIKS ===================== //
document.addEventListener('DOMContentLoaded', () => {

  document
    .querySelectorAll('.tutorial-add .matrix-result td')
    .forEach(resultCell => {

      resultCell.addEventListener('click', () => {

        // 🔴 RESET SEMUA HIGHLIGHT
        document
          .querySelectorAll('.matrix-mark')
          .forEach(el => el.classList.remove('matrix-mark'));

        const row = resultCell.dataset.row;
        const col = resultCell.dataset.col;

        // 🔴 HIGHLIGHT HASIL
        resultCell.classList.add('matrix-mark');

        const tutorialBox = resultCell.closest('.matrix-tutorial-box');
        const stack = resultCell.closest('.matrix-tutorial-stack');
        if (!tutorialBox || !stack) return;

        // 🔴 AMBIL SEL A & B
        const cellA = tutorialBox.querySelector(
          `.matrix-a td[data-row="${row}"][data-col="${col}"]`
        );
        const cellB = tutorialBox.querySelector(
          `.matrix-b td[data-row="${row}"][data-col="${col}"]`
        );

        if (!cellA || !cellB) return;

        // 🔴 HIGHLIGHT A & B
        cellA.classList.add('matrix-mark');
        cellB.classList.add('matrix-mark');

        // 🔴 UPDATE KETERANGAN
        const explanation = stack.querySelector('.matrix-explanation');
        if (!explanation) return;

        explanation.textContent =
          `${cellA.textContent} + ${cellB.textContent} = ${resultCell.textContent}`;
      });
    });
});


// =================== TUTORIAL PENGURANGAN MATRIKS ===================== //
document.addEventListener('DOMContentLoaded', () => {

  function formatNumber(v) {
    const n = Number(v);
    return n < 0 ? `(${n})` : `${n}`;
  }

  document
    .querySelectorAll('.tutorial-sub .matrix-result td')
    .forEach(resultCell => {

      resultCell.addEventListener('click', () => {

        // 🔴 RESET HIGHLIGHT
        document
          .querySelectorAll('.matrix-mark')
          .forEach(el => el.classList.remove('matrix-mark'));

        const row = resultCell.dataset.row;
        const col = resultCell.dataset.col;

        // 🔴 HIGHLIGHT HASIL
        resultCell.classList.add('matrix-mark');

        const tutorialBox = resultCell.closest('.matrix-tutorial-box');
        const stack = resultCell.closest('.matrix-tutorial-stack');
        if (!tutorialBox || !stack) return;

        const cellA = tutorialBox.querySelector(
          `.matrix-a td[data-row="${row}"][data-col="${col}"]`
        );
        const cellB = tutorialBox.querySelector(
          `.matrix-b td[data-row="${row}"][data-col="${col}"]`
        );

        if (!cellA || !cellB) return;

        // 🔴 HIGHLIGHT A & B
        cellA.classList.add('matrix-mark');
        cellB.classList.add('matrix-mark');

        const explanation = stack.querySelector('.matrix-explanation');
        if (!explanation) return;

        explanation.textContent =
          `${formatNumber(cellA.textContent)} − ${formatNumber(cellB.textContent)} = ${formatNumber(resultCell.textContent)}`;
      });
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', () => {

  const sections = Array.from(
    document.querySelectorAll('.page-section[id]')
  );

  if (!sections.length || !window.activateSidebarFor) return;

  let currentActive = null;

  function detectActiveSection() {
    const offset = 140; // tinggi navbar
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

  window.addEventListener('scroll', detectActiveSection);
  window.addEventListener('load', detectActiveSection);

  detectActiveSection();
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
  iconBox.textContent = icon; // 🎉 DI ATAS
  modal.classList.remove('hidden');

  btn.onclick = () => {
    modal.classList.add('hidden');
    iconBox.textContent = ''; // reset icon
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
        const subLabel = document.getElementById('sub-soal-label');

        const btnPeriksa = document.getElementById('btn-periksa-2');
        const btnReset   = document.getElementById('btn-reset-2');
        const btnNext    = document.getElementById('btn-next-2');
        const btnPrev    = document.getElementById('btn-prev-2');

        if (!container) return;

        /* =====================================================
        STATE JAWABAN USER
        ===================================================== */
        const userAnswer = [
            {},   // Soal 1
            { matrix:{}, c21a:'', c21b:'', c21:'' },   // Soal 2
            { matrix: {}, elem22: '' },  // Soal 3
        ];

        /* =====================================================
        DATA SOAL
        ===================================================== */
        const soal = [

            /* ================= SOAL 1 ================= */
{
  render: () => `
    <p><strong>1. Diketahui matriks \\( E \\) dan \\( F \\) di bawah ini!</strong></p>

    <div class="matrix-mobile-wrapper">

    <div class="matrix-box">
        \\[
        E =
        \\begin{bmatrix}
        3 & 12 & -1 \\\\
        11 & 6 & 9 \\\\
        2 & -6 & 3
        \\end{bmatrix}
        \\]
    </div>

    <div class="matrix-box">
        \\[
        F =
        \\begin{bmatrix}
        3 & 1 & 3 \\\\
        8 & 15 & 7 \\\\
        4 & -2 & 3
        \\end{bmatrix}
        \\]
    </div>

</div>

    <p><strong>Berapakah hasil dari \\( E + F \\)?</strong></p>


    <p>Jawaban:</p>
    <p style="font-size:14px; color:#666;">
          Klik icon ☰, lalu pilih dan klik insert matriks, kemudian arahkan kursor dan tentukan jumlah baris dan kolomnya.
        </p>
    <math-field id="matrixInput1"
      style="
        font-size: 28px;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 8px;
        background: #f8f9fa;
        min-width: 150px;
        min-height: 80px;
      ">
    </math-field>
  `,

  restore: () => {
    const mf = document.getElementById("matrixInput1");
    if (mf) {
      mf.setOptions({ virtualKeyboardMode: "onfocus" });

      if (userAnswer[0].matrixLatex) {
        mf.value = userAnswer[0].matrixLatex;
      }

      mf.addEventListener("input", () => {
        userAnswer[0].matrixLatex = mf.value;
      });
    }
  },

  afterRender: () => {
    const mf = document.getElementById("matrixInput1");
    if (mf) {
      mf.setOptions({ virtualKeyboardMode: "onfocus" });

      mf.addEventListener("input", () => {
        userAnswer[0].matrixLatex = mf.value;
      });
    }
  },

  check: () => {
    const latex = userAnswer[0].matrixLatex;
    if (!latex) return false;

    const angka = latex.match(/-?\d+/g);
    if (!angka || angka.length !== 9) return false;

    const benar = [
      '6','13','2',
      '19','21','16',
      '6','-8','6'
    ];

    return angka.every((v, i) => v === benar[i]);
  },

  reset: () => {
    userAnswer[0] = {};
  }
},


            /* ================= SOAL 2 ================= */
{
  render: () => `
    <p><strong>2. Diketahui matriks \\( A \\) dan \\( B \\) di bawah ini.</strong></p>

    <div class="matrix-wrapper">
      <div class="matrix-block">
        \\[
        A =
        \\begin{bmatrix}
        2 & 3 \\\\
        1 & 4 \\\\
        7 & 0
        \\end{bmatrix}
        \\]
      </div>

      <div class="matrix-block">
        \\[
        B =
        \\begin{bmatrix}
        4 & 1 \\\\
        5 & 9 \\\\
        3 & 6
        \\end{bmatrix}
        \\]
      </div>
    </div>

    <hr>

    <p><strong>Apakah ordo matriks \\( A \\) dan \\( B \\) sama?</strong></p>
    <label><input type="radio" name="ordo" value="ya"> Ya</label>
    <label class="ms-3"><input type="radio" name="ordo" value="tidak"> Tidak</label>

    <div id="step-2" style="display:none; margin-top:15px;"></div>
    <div id="step-3" style="display:none; margin-top:15px;"></div>
  `,

  restore: () => {

  // 🔥 restore radio ORDO
  if (userAnswer[1].ordo) {
    const r = document.querySelector(
      `input[name="ordo"][value="${userAnswer[1].ordo}"]`
    );
    if (r) r.checked = true;

    // tampilkan step2 lagi
    const step2 = document.getElementById("step-2");
    step2.style.display = "block";
    step2.innerHTML = `
  <p><strong>Apakah matriks \\( A \\) dan \\( B \\) dapat dijumlahkan?</strong></p>
  <label><input type="radio" name="jumlah" value="ya"> Ya</label>
  <label class="ms-3"><input type="radio" name="jumlah" value="tidak"> Tidak</label>
`;

setTimeout(() => {
  if (window.MathJax) {
    MathJax.typesetClear();
    MathJax.typesetPromise([step2]);
  }
}, 10);
    
    if (window.MathJax) {
  MathJax.typesetClear();
  MathJax.typesetPromise();
}
  }

  // 🔥 restore radio JUMLAH
  if (userAnswer[1].jumlah) {
    const r2 = document.querySelector(
      `input[name="jumlah"][value="${userAnswer[1].jumlah}"]`
    );
    if (r2) r2.checked = true;

    // tampilkan step3 kalau jawab "ya"
    if (userAnswer[1].jumlah === "ya") {
      const step3 = document.getElementById("step-3");
      step3.style.display = "block";

      step3.innerHTML = `
        <p><strong>Hitunglah hasil \\( A + B \\)!</strong></p>
        <p>Masukkan hasil dalam bentuk matriks:</p>

        <p style="font-size:14px; color:#666;">
          Klik icon ☰, lalu pilih dan klik insert matriks, kemudian arahkan kursor dan tentukan jumlah baris dan kolomnya.
        </p>

        <math-field id="matrixInput"
          style="
            font-size: 28px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background: #f8f9fa;
            min-width: 120px;
            min-height: 60px;
          ">
        </math-field>
      `;

      const mf = document.getElementById("matrixInput");

if (mf) {
  mf.setOptions({
    virtualKeyboardMode: "onfocus"
  });

  // 🔥 RESTORE ISI MATRIX
  if (userAnswer[1].matrixLatex) {
    mf.value = userAnswer[1].matrixLatex;
  }

  // 🔥 SIMPAN LAGI
  mf.addEventListener("input", () => {
    userAnswer[1].matrixLatex = mf.value;
  });
}
    }
  }
},

  afterRender: () => {

    const step2 = document.getElementById("step-2");
    const step3 = document.getElementById("step-3");

    document.querySelectorAll('input[name="ordo"]').forEach(radio => {
      radio.addEventListener("change", () => {

        userAnswer[1].ordo = radio.value;

        step2.style.display = "block";
        step2.innerHTML = `
          <p><strong>Apakah matriks \\( A \\) dan \\( B \\) dapat dijumlahkan?</strong></p>
          <label><input type="radio" name="jumlah" value="ya"> Ya</label>
          <label class="ms-3"><input type="radio" name="jumlah" value="tidak"> Tidak</label>
        `;

        setTimeout(() => {
  if (window.MathJax) {
    MathJax.typesetClear();
    MathJax.typesetPromise([step2]);
  }
}, 10);

        document.querySelectorAll('input[name="jumlah"]').forEach(r2 => {
          r2.addEventListener("change", () => {

            userAnswer[1].jumlah = r2.value;

            if (r2.value === "ya") {
              step3.style.display = "block";

              step3.innerHTML = `
  <p><strong>Hitunglah hasil \\( A + B \\)!</strong></p>

  <p>Masukkan hasil dalam bentuk matriks:</p>

  <p style="font-size:14px; color:#666;">
    Klik icon ☰, lalu pilih dan klik insert matriks, kemudian arahkan kursor dan tentukan jumlah baris dan kolomnya.
  </p>

  <math-field id="matrixInput"
    style="
      font-size: 28px;
      padding: 10px;
      border: 2px solid #ccc;
      border-radius: 8px;
      background: #f8f9fa;
      min-width: 120px;
      min-height: 60px;
    ">
  </math-field>
`;
const mf = document.getElementById("matrixInput");

if (mf) {
  mf.setOptions({
    virtualKeyboardMode: "onfocus"
  });

  // 🔥 SIMPAN SETIAP PERUBAHAN
  mf.addEventListener("input", () => {
    userAnswer[1].matrixLatex = mf.value;
  });
}

              if (window.MathJax) MathJax.typesetPromise();

            } else {
              step3.style.display = "none";
            }
          });
        });

      });
    });
  },

  check: () => {

  if (userAnswer[1].ordo !== 'ya') return false;
  if (userAnswer[1].jumlah !== 'ya') return false;

  const mf = document.getElementById("matrixInput");
  if (!mf) return false;

  const latex = userAnswer[1].matrixLatex || mf.value;

  const angka = latex.match(/-?\d+/g);

  if (!angka || angka.length !== 6) return false;

  const benar = ['6','4','6','13','10','6'];

  for (let i = 0; i < benar.length; i++) {
    if (angka[i] !== benar[i]) return false;
  }

  return true;
},

  reset: () => {
    userAnswer[1] = {};
  }
},




            /* ================= SOAL 3 ================= */
{
  render: () => `
    <p><strong>3. Diketahui matriks \\( C \\) dan \\( D \\) di bawah ini.</strong></p>

    <div class="matrix-wrapper">
      <div class="matrix-block">
        \\[
        C =
        \\begin{bmatrix}
        12 & -2 & 9 \\\\
        -7 & -20 & 15
        \\end{bmatrix}
        \\]
      </div>

      <div class="matrix-block">
        \\[
        D =
        \\begin{bmatrix}
        4 & 10 & -3 \\\\
        18 & -21 & 4
        \\end{bmatrix}
        \\]
      </div>
    </div>

    <hr>

    <p><strong>Apakah ordo matriks \\( C \\) dan \\( D \\) sama?</strong></p>
    <label><input type="radio" name="ordo3" value="ya"> Ya</label>
    <label class="ms-3"><input type="radio" name="ordo3" value="tidak"> Tidak</label>

    <div id="step3-2" style="display:none; margin-top:15px;"></div>
    <div id="step3-3" style="display:none; margin-top:15px;"></div>
  `,

  afterRender: () => {

  const step2 = document.getElementById("step3-2");
  const step3 = document.getElementById("step3-3");

  document.querySelectorAll('input[name="ordo3"]').forEach(radio => {
    radio.addEventListener("change", () => {

      userAnswer[2].ordo = radio.value;

      step2.style.display = "block";
      step2.innerHTML = `
        <p><strong>Apakah matriks \\( C \\) dan \\( D \\) dapat dikurangkan?</strong></p>
        <label><input type="radio" name="kurang3" value="ya"> Ya</label>
        <label class="ms-3"><input type="radio" name="kurang3" value="tidak"> Tidak</label>
      `;
      setTimeout(() => {
  if (window.MathJax) {
    MathJax.typesetClear();
    MathJax.typesetPromise([step2]);
  }
}, 10);

      document.querySelectorAll('input[name="kurang3"]').forEach(r2 => {
        r2.addEventListener("change", () => {

          userAnswer[2].kurang = r2.value;

          if (r2.value === "ya") {
            step3.style.display = "block";

            step3.innerHTML = `
              <p><strong>Hitunglah hasil \\( C - D \\)!</strong></p>

              <p style="font-size:14px; color:#666;">
                Klik icon ☰, lalu pilih dan klik insert matriks, kemudian arahkan kursor dan tentukan jumlah baris dan kolomnya.
              </p>

              <math-field id="matrixInput3"
                style="
                  font-size: 28px;
                  padding: 10px;
                  border: 2px solid #ccc;
                  border-radius: 8px;
                  background: #f8f9fa;
                  min-width: 120px;
                  min-height: 60px;
                ">
              </math-field>
            `;

            setTimeout(() => {
  if (window.MathJax) {
    MathJax.typesetClear();
    MathJax.typesetPromise([step3]);
  }
}, 10);

            const mf = document.getElementById("matrixInput3");

            if (mf) {
              mf.setOptions({ virtualKeyboardMode: "onfocus" });

              mf.addEventListener("input", () => {
                userAnswer[2].matrixLatex = mf.value;
              });
            }

          } else {
            step3.style.display = "none";
          }
        });
      });

    });
  });
},

  restore: () => {

  // 🔥 restore radio ORDO
  if (userAnswer[2].ordo) {
    const r = document.querySelector(
      `input[name="ordo3"][value="${userAnswer[2].ordo}"]`
    );
    if (r) r.checked = true;

    const step2 = document.getElementById("step3-2");
    step2.style.display = "block";
    step2.innerHTML = `
      <p><strong>Apakah matriks \\( C \\) dan \\( D \\) dapat dikurangkan?</strong></p>
      <label><input type="radio" name="kurang3" value="ya"> Ya</label>
      <label class="ms-3"><input type="radio" name="kurang3" value="tidak"> Tidak</label>
    `;

    setTimeout(() => {
      if (window.MathJax) {
        MathJax.typesetClear();
        MathJax.typesetPromise([step2]);
      }
    }, 10);
  }

  // 🔥 restore radio KURANG
  if (userAnswer[2].kurang) {
    const r2 = document.querySelector(
      `input[name="kurang3"][value="${userAnswer[2].kurang}"]`
    );
    if (r2) r2.checked = true;

    if (userAnswer[2].kurang === "ya") {

      const step3 = document.getElementById("step3-3");
      step3.style.display = "block";

      step3.innerHTML = `
        <p><strong>Hitunglah hasil \\( C - D \\)!</strong></p>

        <p style="font-size:14px; color:#666;">
          Klik icon ☰, lalu pilih dan klik insert matriks, kemudian arahkan kursor dan tentukan jumlah baris dan kolomnya.
        </p>

        <math-field id="matrixInput3"
          style="
            font-size: 28px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background: #f8f9fa;
            min-width: 120px;
            min-height: 60px;
          ">
        </math-field>
      `;

      setTimeout(() => {
        if (window.MathJax) {
          MathJax.typesetClear();
          MathJax.typesetPromise([step3]);
        }
      }, 10);

      const mf = document.getElementById("matrixInput3");

      if (mf) {
        mf.setOptions({ virtualKeyboardMode: "onfocus" });

        // 🔥 INI YANG PALING PENTING
        if (userAnswer[2].matrixLatex) {
          mf.value = userAnswer[2].matrixLatex;
        }

        mf.addEventListener("input", () => {
          userAnswer[2].matrixLatex = mf.value;
        });
      }
    }
  }
},

 check: () => {

  if (userAnswer[2].ordo !== 'ya') return false;
  if (userAnswer[2].kurang !== 'ya') return false;

  const latex = userAnswer[2].matrixLatex;
  if (!latex) return false;

  const angka = latex.match(/-?\d+/g);
  if (!angka || angka.length !== 6) return false;

  const benar = ['8','-12','12','-25','1','11'];

  return angka.every((v, i) => v === benar[i]);
},

  reset: () => {
    userAnswer[2] = {};
  }
}



        ];

function renderSoal2b() {
  return `
    <p><strong>2. Diketahui matriks \\( A \\) dan \\( B \\) di bawah ini.</strong></p>

    <div class="matrix-wrapper">
      <div class="matrix-block">
        \\[
        A =
        \\begin{bmatrix}
        2 & 3 \\\\
        1 & 4 \\\\
        7 & 0
        \\end{bmatrix}
        \\]
      </div>

      <div class="matrix-block">
        \\[
        B =
        \\begin{bmatrix}
        4 & 1 \\\\
        5 & 9 \\\\
        3 & 6
        \\end{bmatrix}
        \\]
      </div>
    </div>

    <p>
      Jika \\( C = A + B \\), tentukan nilai elemen
      \\( C_{21} \\)!
    </p>

    <!-- JAWABAN SATU BARIS -->
    <div class="c21-inline">
  <span class="c21-text">\\( C_{21} = \\)</span>

  <input class="quiz-input input-mini" id="c21a" placeholder="...">

  <span class="c21-operator">+</span>

  <input class="quiz-input input-mini" id="c21b" placeholder="...">

  <span class="c21-operator">\\( = \\)</span>

  <input class="quiz-input input-mini" id="c21" placeholder="...">
</div>
  `;
}

function renderSoal3b() {
  return `
    <p><strong>3. Diketahui matriks \\( C \\) dan \\( D \\) di bawah ini.</strong></p>

    <div class="matrix-wrapper">
      <div class="matrix-block">
        \\[
        C =
        \\begin{bmatrix}
        12 & -2 & 9 \\\\
        -7 & -20 & 15
        \\end{bmatrix}
        \\]
      </div>

      <div class="matrix-block">
        \\[
        D =
        \\begin{bmatrix}
        4 & 10 & -3 \\\\
        18 & -21 & 4
        \\end{bmatrix}
        \\]
      </div>
    </div>

    <p>
  Nilai elemen baris ke-2 kolom ke-2 dari matriks
  \\( C - D \\) adalah
</p>

<div class="jawaban-inline">
  <span>\\( (C-D)_{22} = \\)</span>
  <input class="quiz-input input-mini" id="s3b-22">
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

  // Soal 1
  if (i === 0) {
    return !!userAnswer[0].matrixLatex;
  }

  // Soal 2a
  if (i === 1 && subIdx === 0) {
  return (
    userAnswer[1].ordo !== undefined &&
    userAnswer[1].jumlah !== undefined &&
    userAnswer[1].matrixLatex // tidak perlu benar, cukup terisi
  );
}

  // Soal 2b
  if (i === 1 && subIdx === 1) {
    return (
      userAnswer[1].c21a &&
      userAnswer[1].c21b &&
      userAnswer[1].c21
    );
  }

  // Soal 3a
  if (i === 2 && subIdx === 0) {
  return (
    userAnswer[2].ordo !== undefined &&
    userAnswer[2].kurang !== undefined &&
    userAnswer[2].matrixLatex
  );
}
  // Soal 3b
  if (i === 2 && subIdx === 1) {
  return userAnswer[2].elem22 !== '';
}

  return false;
}



        
        /* =====================================================
        UTIL & NAVIGASI
        ===================================================== */
        
        let idx = 0;
        let completed = 0; // jumlah soal yang sudah SAH dijawab
        let quizFinished = false;


//         let score = 0;
// score += soal[0].check() ? 1 : 0;
// score += soal[1].check() ? 1 : 0;
// score += soal[2].check() ? 1 : 0;

//             return score;
//         }

        function clearAllAnswers() {
    userAnswer[0] = {};
    userAnswer[1] = { a:'', b:'', c:'' };
    userAnswer[2] = { x:'', y:'', z:'' };

    idx = 0;
    completed = 0;

    renderSoal();
    updateQuizProgress();
    hasil.textContent = '';
    quizFinished = false;
}



        let subIdx = 0; // ⬅️ TAMBAHKAN

function renderSoal() {
  hasil.textContent = '';

  /* ===============================
     LABEL SUB-SOAL
  =============================== */
  if (idx === 1) {
    subLabel.textContent =
      subIdx === 0 ? 'Soal 2 bagian a' : 'Soal 2 bagian b';
  } 
  else if (idx === 2) {
    subLabel.textContent =
      subIdx === 0 ? 'Soal 3 bagian a' : 'Soal 3 bagian b';
  } 
  else {
    subLabel.textContent = '';
  }

  /* ===============================
     RENDER KONTEN
  =============================== */
  if (idx === 1 && subIdx === 1) {
    // Soal 2b
    container.innerHTML = renderSoal2b();

    ['c21a','c21b','c21'].forEach(id => {
      const el = document.getElementById(id);
      el.value = userAnswer[1][id] || '';
      el.addEventListener('input', () => {
        userAnswer[1][id] = el.value.trim();
      });
    });

  } 
  else if (idx === 2 && subIdx === 1) {
    // 🔥 Soal 3b
    container.innerHTML = renderSoal3b();

    const el = document.getElementById('s3b-22');
el.value = userAnswer[2].elem22 || '';
el.addEventListener('input', () => {
  userAnswer[2].elem22 = el.value.trim();
});

  } 
  else {
    // Soal normal (1, 2a, 3a)
    container.innerHTML = soal[idx].render();

    setTimeout(() => {
  if (window.MathJax) {
    MathJax.typesetClear();
    MathJax.typesetPromise();
  }
}, 50);
    if (soal[idx].restore) soal[idx].restore();
    if (soal[idx].afterRender) soal[idx].afterRender();
  }

  if (window.MathJax) {
  MathJax.typesetClear();
  MathJax.typesetPromise();
}

  btnPrev.style.visibility =
    idx === 0 && subIdx === 0 ? 'hidden' : 'visible';

  btnNext.innerHTML =
    (idx === soal.length - 1 && subIdx === 1)
      ? 'Selesai'
      : 'Berikutnya <i class="bi bi-arrow-right ms-2"></i>';

  updateQuizProgress();
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
        btnPeriksa.onclick = () => {
  let benar = false;

  // ===============================
  // SOAL 2b
  // ===============================
  if (idx === 1 && subIdx === 1) {
    benar =
      userAnswer[1].c21a === '1' &&
      userAnswer[1].c21b === '5' &&
      userAnswer[1].c21 === '6';
  }

  // ===============================
  // 🔥 SOAL 3b (INI YANG KURANG)
  // ===============================
  else if (idx === 2 && subIdx === 1) {
  benar = userAnswer[2].elem22 === '1';
}

  // ===============================
  // SOAL NORMAL (1, 2a, 3a)
  // ===============================
  else {
    benar = soal[idx].check();
  }

  playFeedbackSound(benar);

  hasil.textContent = benar
    ? 'Jawaban benar! ✅'
    : 'Jawaban belum tepat.';
  hasil.style.color = benar ? '#198754' : '#dc3545';
};

        btnReset.onclick = () => {
            soal[idx].reset();
            renderSoal();
        };

       function hitungSkor() {
  let score = 0;

  // Soal 1
  // ✅ Soal 1 (matrix)
let soal1Benar = false;

if (userAnswer[0].matrixLatex) {
  const angka = userAnswer[0].matrixLatex.match(/-?\d+/g);

  const benar = [
    '6','13','2',
    '19','21','16',
    '6','-8','6'
  ];

  soal1Benar =
    angka &&
    angka.length === 9 &&
    angka.every((v, i) => v === benar[i]);
}

if (soal1Benar) score++;

  // Soal 2 (2a + 2b)
  // 🔥 Soal 2a (radio)
const soal2aBenar =
  userAnswer[1].ordo === 'ya' &&
  userAnswer[1].jumlah === 'ya';

// 🔥 Soal 2b (C21)
const soal2bBenar =
  userAnswer[1].c21a === '1' &&
  userAnswer[1].c21b === '5' &&
  userAnswer[1].c21 === '6';

// 🔥 Soal 2c (matrix MathLive)
let soal2cBenar = false;

if (userAnswer[1].matrixLatex) {
  const angka = userAnswer[1].matrixLatex.match(/-?\d+/g);

  const benar = ['6','4','6','13','10','6'];

  soal2cBenar =
    angka &&
    angka.length === 6 &&
    angka.every((v, i) => v === benar[i]);
}

// ✅ semua harus benar
if (soal2aBenar && soal2bBenar && soal2cBenar) {
  score++;
}

  // Soal 3a
  

  // Soal 3b
  // ===============================
// Soal 3 (gabungan 3a + 3b)
// ===============================
let soal3aBenar = false;

if (userAnswer[2].matrixLatex) {
  const angka = userAnswer[2].matrixLatex.match(/-?\d+/g);
  const benar = ['8','-12','12','-25','1','11'];

  soal3aBenar =
    angka &&
    angka.length === 6 &&
    angka.every((v, i) => v === benar[i]);
}

const soal3bBenar = userAnswer[2].elem22 === '1';

if (
  userAnswer[2].ordo === 'ya' &&
  userAnswer[2].kurang === 'ya' &&
  soal3aBenar &&
  soal3bBenar
) {
  score++;
}
  return score;
}

        btnNext.onclick = function (e) {
    e.preventDefault();

    // ===============================
    // SOAL 2 (2a → 2b)
    // ===============================
    if (idx === 1) {

        if (subIdx === 0) {
            if (!isAnswered(1)) {
                showPopup('Selesaikan soal ini terlebih dahulu 🙂');
                return;
            }
            subIdx = 1;
            renderSoal();
            return;
        }

        if (subIdx === 1) {
            if (!isAnswered(1)) {
                showPopup('Selesaikan soal ini terlebih dahulu 🙂');
                return;
            }

            completed = Math.max(completed, 2);
            updateQuizProgress();

            subIdx = 0;
            idx++;
            renderSoal();
            return;
        }
    }

    // ===============================
    // SOAL 3 (3a → 3b → selesai)
    // ===============================
    if (idx === 2) {

        if (subIdx === 0) {
            if (!isAnswered(2)) {
                showPopup('Selesaikan soal ini terlebih dahulu 🙂');
                return;
            }

            subIdx = 1;
            renderSoal();
            return;
        }

        if (subIdx === 1) {
            if (!isAnswered(2)) {
                showPopup('Selesaikan soal ini terlebih dahulu 🙂');
                return;
            }

            completed = soal.length;
            updateQuizProgress();

            const score = hitungSkor();

setTimeout(() => {

    // ✅ semua soal benar
    if (score === soal.length) {

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'penjumlahan_pengurangan_matriks',
                sub_materi_slug: 'mari-mencoba-jumlahkurang-matriks'
            })
        })
        .then(() => {

            const btn = document.querySelector(
                '.btn-next-slide[data-check="mari-mencoba-jumlahkurang-matriks"]'
            );

            if (btn) {
                btn.dataset.allowed = "1";
            }

            showPopup(
                `<b>Luar Biasa! 🎉</b><br>
                Semua jawaban benar: <b>${score}/${soal.length}</b><br>
                Tombol Selanjutnya telah dibuka.`,
                () => {

                    userAnswer[0] = {};
                    userAnswer[1] = {};
                    userAnswer[2] = {};

                    idx = 0;
                    subIdx = 0;
                    completed = 0;

                    renderSoal();
                    updateQuizProgress();
                },
                '🎉'
            );

        });

    }

    // ❌ masih ada jawaban salah
    else {

        showPopup(
            `<b>Jawaban benar: ${score}/${soal.length}</b><br>
            Semua soal harus benar terlebih dahulu untuk membuka halaman selanjutnya.`,
            () => {

                userAnswer[0] = {};
                userAnswer[1] = {};
                userAnswer[2] = {};

                idx = 0;
                subIdx = 0;
                completed = 0;

                renderSoal();
                updateQuizProgress();
            },
            '⚠️'
        );

    }

}, 300);

return;
        }
    }

    // ===============================
    // SOAL NORMAL
    // ===============================
    if (!isAnswered(idx)) {
        showPopup('Selesaikan soal ini terlebih dahulu 🙂');
        return;
    }

    completed = Math.max(completed, idx + 1);
    updateQuizProgress();

    if (idx < soal.length - 1) {
        idx++;
        renderSoal();
    }
};


// ===============================
// PREV (HARUS DI LUAR)
// ===============================
btnPrev.onclick = () => {

    if (idx === 2 && subIdx === 1) {
        subIdx = 0;
        renderSoal();
        return;
    }

    if (idx === 2) {
        idx = 1;
        subIdx = 1;
        renderSoal();
        return;
    }

    if (idx === 1 && subIdx === 1) {
        subIdx = 0;
        renderSoal();
        return;
    }

    if (idx > 0) {
        idx--;
        subIdx = 0;
        renderSoal();
    }
};


// ===============================
// INIT
// ===============================
renderSoal();
updateQuizProgress();
                      });
    

</script>


<script>
let unlockedProgress = @json($progress ?? []);
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {

// ================== SYNC SIDEBAR DENGAN PROGRESS ==================
document.querySelectorAll('#sidebar_materi .sidebar-sublink')
  .forEach(link => {

    const sections = link.dataset.section?.split(',') || [];

    const isUnlocked = sections.some(sec => unlockedProgress.includes(sec));

    if(isUnlocked){
      link.classList.remove('locked');

      const icon = link.querySelector('.lock-icon');
      if(icon) icon.remove();
    }
});
  const slides = Array.from(document.querySelectorAll(".materi-slide"));
  const indicator = document.getElementById("slideIndicator");
  let index = 0;

  if (!slides.length) return;

  // ===== INDIKATOR =====
  if (indicator) {
    slides.forEach((_, i) => {
      const dot = document.createElement("span");
      dot.textContent = i + 1;
      dot.onclick = () => {
  if(dots[i].classList.contains("locked")) return;
  showSlide(i, false); // ❌ tidak unlock
};
      indicator.appendChild(dot);
    });
  }

  const dots = indicator ? [...indicator.children] : [];

  function getLastUnlockedIndex(){
  if(!unlockedProgress.length) return 0; // 🔥 penting

  let last = -1;

  slides.forEach((slide, i) => {
    const sec = slide.dataset.section;
    if(unlockedProgress.includes(sec)){
      last = i;
    }
  });

  return last;
}

  function updateIndicator(i){

  const lastUnlocked = getLastUnlockedIndex();

  dots.forEach((dot, idx) => {
    dot.classList.remove("active", "locked");

    if(idx > lastUnlocked){
      dot.classList.add("locked");
    }
  });

  // 🔥 ini bikin biru muncul
  if(dots[i]){
    dots[i].classList.remove("locked");
    dots[i].classList.add("active");
  }
}

  function unlockSubMateri(slug) {

  // ✅ update frontend dulu (biar langsung kebuka)
  if(!unlockedProgress.includes(slug)){
  unlockedProgress = [...unlockedProgress, slug];
}

  // ✅ update indicator langsung
  updateIndicator(index);

  // ✅ update sidebar langsung
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
    .forEach(link => {
      const sections = link.dataset.section?.split(',') || [];

      if(sections.includes(slug)){
        link.classList.remove('locked');

        const icon = link.querySelector('.lock-icon');
        if(icon) icon.remove();
      }
    });

  // 🔥 baru kirim ke backend
  fetch('/progress/unlock', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({
      materi_slug: 'penjumlahan_pengurangan_matriks',
      sub_materi_slug: slug
    })
  });
}

  function showSlide(i, fromNext = false, force = false){

  const lastUnlocked = getLastUnlockedIndex();

  // ❌ hanya block kalau bukan force
  if(!fromNext && !force && i > lastUnlocked) return;

  if(i < 0 || i >= slides.length) return;

  slides.forEach(s => s.classList.remove("active"));
  slides[i].classList.add("active");

  index = i;

  const section = slides[i].dataset.section;

  if(fromNext && section){
    unlockSubMateri(section);
  }

  updateIndicator(i);

  if(section){
    history.replaceState(null,"",`#${section}`);
    if(window.activateSidebarFor){
      activateSidebarFor(section);
    }
  }
}

  // ===== NEXT / PREV =====
  document.addEventListener("click", e => {

  if(e.target.closest(".btn-next-slide")){
    showSlide(index + 1, true); // ✅ unlock
  }

  if(e.target.closest(".btn-prev-slide")){
    showSlide(index - 1, false); // ❌ tidak unlock
  }

});

  // ===== SIDEBAR (INI KUNCI UTAMA) =====
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
  .forEach(link => {
    link.addEventListener("click", e => {

      if(link.classList.contains('locked')){
        e.preventDefault();
        return;
      }

      const sections = link.dataset.section?.split(',') || [];

      // 🔥 INI YANG FIX
      const idx = slides.findIndex(s =>
        sections.includes(s.dataset.section)
      );

      if(idx !== -1){
        e.preventDefault();
        showSlide(idx, false, true); // force lompat
      } else {
        window.location.href = link.href;
      }
    });
  });

  // ===== LOAD DARI HASH =====
  const hash = location.hash.replace('#','');
  if(hash){
    const idx = slides.findIndex(s => s.dataset.section === hash);
    if(idx !== -1) showSlide(idx);
    else showSlide(0);
  } else {
    showSlide(0);
  }

});
</script>

<!-- TIDAK ADA TOMBOL SEBELUMNYA DI SLIDE 1 -->
<script>
    document.querySelectorAll('.materi-slide').forEach((slide, i) => {
  const prevBtn = slide.querySelector('.btn-prev-slide');
  if (prevBtn && i === 0) {
    prevBtn.style.visibility = 'hidden';
  }
});

</script>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function(){

    document.querySelectorAll(".btn-next-slide").forEach(btn => {

        btn.addEventListener("click", function(e){

            const check = this.dataset.check;
            if(!check) return; // tombol biasa aman

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

<script>
function toggleBukti(id) {

    const box = document.getElementById(id);

    box.classList.toggle('show');
}
</script>



<script>

document.addEventListener('DOMContentLoaded', function () {

    const profileToggle = document.getElementById('profileToggle');
    const profileMenu = document.getElementById('profileMenu');

    if (!profileToggle || !profileMenu) return;

    profileToggle.addEventListener('click', function (e) {

        e.stopPropagation();

        profileMenu.style.display =
            profileMenu.style.display === 'block'
            ? 'none'
            : 'block';
    });

    document.addEventListener('click', function (e) {

        if (
            !profileToggle.contains(e.target) &&
            !profileMenu.contains(e.target)
        ) {

            profileMenu.style.display = 'none';
        }
    });

});

</script>
</body>
</html>
