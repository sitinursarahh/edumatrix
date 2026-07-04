<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Perkalian Matriks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/materi_pengertian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/jenis_matriks.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/kesamaan_dua_matriks.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/penjumlahan_pengurangan_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perkalian_matriks.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://unpkg.com/mathlive"></script>
    <link rel="stylesheet" href="https://unpkg.com/mathlive/dist/mathlive.core.css">
    <link rel="stylesheet" href="https://unpkg.com/mathlive/dist/mathlive.css">
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
            <section class="materi-slide active" data-section="perkalian-skalar">

                <div class="pengenalan-matriks-header">
                    <h1>PERKALIAN MATRIKS</h1>
                </div>

                {{-- Tujuan Pembelajaran --}}
                <div class="tujuan-box">
                    <h3 class="tujuan-title">Tujuan Pembelajaran</h3>
                    <ol class="tujuan-list">
                        <li>Peserta didik mampu menjelaskan dan melakukan operasi perkalian skalar dengan matriks serta perkalian dua matriks diberikan dengan benar.</li>
                    </ol>
                </div>

                {{-- Judul Materi --}}
                <h2 class="materi-title">1. Perkalian Skalar dengan Matriks</h2>
                <p class="paragraf-indent">
                    Dalam aljabar matriks, bilangan real \( k \) disebut skalar. Jadi, ketika suatu matriks dikalikan dengan bilangan real, hal itu
                    disebut perkalian skalar dengan matriks. Secara sederhana, perkalian skalar dengan matriks berarti setiap elemen (angka) di
                    dalam matriks dikalikan dengan bilangan tersebut.
                </p>
                <p>Rumus umumnya seperti ini:</p>
                <p>
                    Misalkan matriks \( A \) berukuran \( m \times n \) dengan elemen-elemen
                    \( a_{ij} \), dan \( k \) adalah bilangan real.
                    Maka hasil perkaliannya, disebut matriks
                    \( C = k \times A \), juga berukuran \( m \times n \),
                    dengan setiap elemennya dihitung dengan rumus:
                </p>
                <p class="text-center my-3 matrix-center-fix">
                    \(                        
                      c_{ij} = k \cdot a_{ij}
                    \)
                </p>
                <p>Artinya, setiap elemen matriks \( A \) dikalikan dengan bilangan \( k \).</p>
                
                <div class="box-masalah">
                    <div class="box-masalah-title">
                        <strong>Sifat - Sifat Perkalian Skalar dengan Matriks</strong>
                    </div>

                    <div class="box-masalah-content">
                      <br>
                        <p>
                        Misalkan matriks \( A \) dan \( B \) memiliki ordo yang sama,
                        serta \( k \) dan \( h \) adalah bilangan skalar,
                        maka berlaku beberapa sifat berikut:
                        </p>

                        <ul>
                        <li>
                            <strong>Sifat matriks nol:</strong><br>
                            \( kO = O \), artinya jika suatu skalar dikalikan dengan matriks nol,
                            maka hasilnya tetap matriks nol.
                        </li>

                        <li>
                            <strong>Sifat skalar nol:</strong><br>
                            \( kA = O \) jika \( k = 0 \), artinya jika skalar nol dikalikan
                            dengan matriks apa pun, maka hasilnya adalah matriks nol.
                        </li>

                        <li>
                            <strong>Sifat asosiatif terhadap skalar:</strong><br>
                            \( h(kA) = (hk)A \), artinya urutan perkalian dua skalar
                            terhadap suatu matriks tidak memengaruhi hasil.
                        </li>

                        <li>
                            <strong>Sifat distributif terhadap skalar:</strong><br>
                            \( (h \pm k)A = hA \pm kA \), artinya jika dua skalar
                            dijumlahkan atau dikurangkan kemudian dikalikan dengan matriks,
                            hasilnya sama dengan menjumlahkan atau mengurangkan
                            hasil perkalian masing-masing skalar dengan matriks.
                        </li>

                        <li>
                            <strong>Sifat distributif terhadap matriks:</strong><br>
                            \( k(A \pm B) = kA \pm kB \), artinya jika skalar dikalikan
                            dengan penjumlahan atau pengurangan dua matriks,
                            hasilnya sama dengan menjumlahkan atau mengurangkan
                            hasil perkalian skalar dengan masing-masing matriks.
                        </li>
                        </ul>
                    </div>
                    </div>
                    <br>
                    <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide"
onclick="unlockMateri('perkalian-skalar-2')">
Selanjutnya
</button>
                    </div>
                    </section>

                    <section class="materi-slide" data-section="perkalian-skalar-2">
                      <p><strong>Contoh 1:</strong></p>
                      <p>Seorang pedagang buah mencatat rata-rata penjualan harian (dalam kg) sebagai berikut:</p>
                      <ul>
                        <li>Baris 1: penjualan pagi</li>
                        <li>Baris 2: penjualan siang</li>
                        <li>Kolom: Pisang, Jeruk, Apel</li>
                      </ul>
                      <p>Dinyatakan dalam bentuk matriks \( P \) di bawah ini</p>
                      <div class="text-center my-3 matrix-display-big">
                        \(
                        P =
                        \begin{bmatrix}
                        10 & 6 & 4 \\
                        14 & 9 & 5
                        \end{bmatrix}
                        \)
                      </div>
                      <p>Menjelang hari libur, penjualan buah diperkirakan meningkat 2 kali lipat.</p>
                      <p>Tentukan matriks penjualan buah saat hari libur tersebut.</p>

                      <p><strong>Penyelesaian :</strong></p>

                      <div class="matrix-tutorial-stack tutorial-scalar">
                        <div class="matrix-tutorial-box row-tutorial">
                          <!-- 2P = -->
                          <div class="matrix-frame">
                            <span class="matrix-label">\( 2P = \)</span>
                          </div>
                          <!-- Skalar -->
                          <div class="matrix-frame scalar-frame">
                            <span class="scalar-value" data-scalar="2">2</span>
                            <span class="scalar-times">×</span>
                          </div>
                          <!-- Matriks P -->
                          <div class="matrix-frame">
                            <span class="math-bracket-2">\( \left[ \right. \)</span>
                            <table class="matrix-html matrix-p">
                              <tr>
                                <td data-row="0" data-col="0">10</td>
                                <td data-row="0" data-col="1">6</td>
                                <td data-row="0" data-col="2">4</td>
                              </tr>
                              <tr>
                                <td data-row="1" data-col="0">14</td>
                                <td data-row="1" data-col="1">9</td>
                                <td data-row="1" data-col="2">5</td>
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
                                <td data-row="0" data-col="0">20</td>
                                <td data-row="0" data-col="1">12</td>
                                <td data-row="0" data-col="2">8</td>
                              </tr>
                              <tr>
                                <td data-row="1" data-col="0">28</td>
                                <td data-row="1" data-col="1">18</td>
                                <td data-row="1" data-col="2">10</td>
                              </tr>
                            </table>
                            <span class="math-bracket-2">\( \left. \right] \)</span>
                          </div>
                        </div>
                        <!-- KETERANGAN -->
                        <div class="matrix-explanation">
                          Klik salah satu elemen hasil untuk melihat perhitungannya
                        </div>
                      </div>

                      <p><strong>Simpulan</strong></p>
                      <p>Selama hari libur, penjualan buah adalah sebagai berikut:</p>
                      <p>Pada pagi hari terjual</p>
                      <ul>
                        <li>20 kg buah jenis pertama</li>
                        <li>12 kg buah jenis kedua</li>
                        <li>8 kg buah jenis ketiga</li>
                      </ul>
                      <p>Pada siang hari terjual</p>
                      <ul>
                        <li>28 kg buah jenis pertama</li>
                        <li>18 kg buah jenis kedua</li>
                        <li>10 kg buah jenis ketiga</li>
                      </ul>
                      <p>
                        Jadi, penjualan buah pada hari libur meningkat sehingga jumlah penjualan pagi dan siang untuk setiap jenis buah menjadi
                        seperti yang ditunjukkan pada matriks hasil di atas.
                      </p>
                      <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide"
onclick="unlockMateri('perkalian-skalar-3')">
Selanjutnya
</button>
                      </div>
                    </section>


                    <section class="materi-slide" data-section="perkalian-skalar-3">
                      <p><strong>Contoh 2:</strong></p>
                      <p>Diketahui</p>
                      <div class="text-center my-3 matrix-display-big">
                        \(
                        P =
                        \begin{bmatrix}
                        4 & 2 \\
                        6 & 3
                        \end{bmatrix}
                        \quad \text{dan} \quad
                        Q =
                        \begin{bmatrix}
                        7 & 5 \\
                        9 & 4
                        \end{bmatrix}
                        \)
                      </div>
                      <p>Jika \( c = -2 \), maka tentukan \( c (P - Q) \).</p>
                      <p><strong>Penyelesaian :</strong></p>

                      <div class="matrix-tutorial-stack tutorial-cpq">
                        <div class="matrix-tutorial-box row-tutorial">
                        <!-- c(P - Q) -->
                        <div class="matrix-frame">
                          <span class="matrix-label">\( c (P - Q) \)</span>
                        </div>
                        <!-- = -->
                        <div class="matrix-frame">
                            <span class="matrix-label">\( = \)</span>
                          </div>
                        <!-- -2 -->
                        <div class="matrix-frame scalar-frame">
                          <span class="scalar-value">-2</span>
                        </div>
                        <!-- ( -->
                        <div class="matrix-frame paren-frame paren">(</div>
                        <!-- Matriks P -->
                        <div class="matrix-frame bracket-frame">
                          <table class="matrix-html matrix-p">
                            <tr><td>4</td><td>2</td></tr>
                            <tr><td>6</td><td>3</td></tr>
                          </table>
                          <!-- <span class="math-bracket-2">]</span> -->
                        </div>
                        <!-- − -->
                        <div class="matrix-frame">
                            <span class="matrix-label">\( - \)</span>
                          </div>
                        <!-- Matriks Q -->
                        <div class="matrix-frame bracket-frame">
                          <table class="matrix-html matrix-q">
                            <tr><td>7</td><td>5</td></tr>
                            <tr><td>9</td><td>4</td></tr>
                          </table>
                          <!-- <span class="math-bracket-2">]</span> -->
                        </div>
                        <!-- ) -->
                        <div class="matrix-frame paren-frame paren">)</div>
                        <!-- = -->
                        <div class="matrix-frame">
                            <span class="matrix-label">\( = \)</span>
                          </div>
                        <!-- -2 [   ]  (HASIL PENGURANGAN) -->
                        <!-- -2 [ 4 - 7 ] -->
<div class="matrix-frame scalar-frame">
  <span class="scalar-value">-2</span>
</div>
<div class="matrix-frame bracket-frame">
  <table class="matrix-html matrix-result">
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
  </table>
</div>

<!-- = -->
<div class="matrix-frame">
  <span class="matrix-label">\( = \)</span>
</div>

<!-- -2 [ -3 ] -->
<div class="matrix-frame scalar-frame">
  <span class="scalar-value">-2</span>
</div>
<div class="matrix-frame bracket-frame">
  <table class="matrix-html matrix-mid">
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
  </table>
</div>

<!-- = -->
<div class="matrix-frame">
  <span class="matrix-label">\( = \)</span>
</div>

<!-- HASIL -->
<div class="matrix-frame bracket-frame">
  <table class="matrix-html matrix-final">
    <tr><td></td><td></td></tr>
    <tr><td></td><td></td></tr>
  </table>
</div>
                      </div>
                          <!-- Skalar -->
                          <div class="matrix-frame scalar-frame">
                            <!-- <span class="scalar-value">-2</span> -->
                          </div>
                        </div>
                        <!-- Tombol -->
                        <div class="matrix-step-controls">
                        <button id="btnPrevCPQ" class="btn btn-outline-secondary" disabled>
                          Sebelumnya
                        </button>
                        <button id="btnMainCPQ" class="btn btn-success">
                          Mulai
                        </button>
                      </div>
                        <!-- Keterangan -->
                        <div class="matrix-explanation" id="cpqExplanation">
                          Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                        </div>
                        <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide"
onclick="unlockMateri('perkalian-dua-matriks')">
Selanjutnya
</button>
                      </div>
                    </section>



                    <section class="materi-slide" data-section="perkalian-dua-matriks">
                      <!-- <div class="pengenalan-matriks-header">
                        <h1>PERKALIAN DUA MATRIKS</h1>
                      </div> -->
                      <h2 class="materi-title">2. Perkalian Dua Matriks</h2>
                      <p class="paragraf-indent">
                        Jika matriks \( A \) berukuran \( m \times n \) dan matriks \( B \) berukuran \( n \times p \),
                        maka keduanya dapat dikalikan dan menghasilkan matriks baru
                        \( C = AB \).
                        Matriks \( C \) memiliki ukuran \( m \times p \). Jumlah kolom pada matriks \(A\) harus sama dengan jumlah baris di matriks \(B\).
                      </p>
                      <div class="text-center my-3 matrix-center-fix">
  \[
  A_{m \times n} \times B_{n \times p} = AB_{m \times p}
  \]
</div>
                      <p>
                        Untuk menentukan setiap elemen
                        \( c_{ij} \) pada matriks \( C \),
                        caranya adalah dengan mengalikan setiap elemen pada baris ke-\( i \)
                        matriks \( A \) dengan elemen yang bersesuaian pada kolom ke-\( j \)
                        matriks \( B \), kemudian menjumlahkan seluruh hasil perkaliannya.
                      </p>
                      <p class="text-center my-3 matrix-center-fix">
                        \[
                        c_{ij} = a_{i1}\cdot b_{1j} + a_{i2}\cdot b_{2j} + a_{i3}\cdot b_{3j} + \cdots + a_{in}\cdot b_{nj}
                        \]
                      </p>
                      <div class="box-masalah">
                        <div class="box-masalah-title">
                          <strong>Sifat – Sifat Perkalian Dua Matriks</strong>
                        </div>
                        <div class="box-masalah-content">
                          <br>
                          <p>
                            Misalkan ada matriks \( A \), \( B \), \( C \), dan \( I \) yang semuanya
                            memiliki ordo yang sama, dengan \( I \) sebagai matriks identitas.
                            Maka berlaku beberapa sifat penting sebagai berikut:
                          </p>
                          <ul>
                            <li>
                              <strong>Sifat asosiatif:</strong><br>
                              Urutan pengelompokan pada perkalian tidak memengaruhi hasilnya,
                              artinya \( (AB)C = A(BC) \).
                            </li>
                            <li>
                              <strong>Sifat identitas:</strong><br>
                              Jika suatu matriks dikalikan dengan matriks identitas,
                              hasilnya tetap sama, yaitu \( AI = IA = A \).
                            </li>
                            <li>
                              <strong>Sifat distributif:</strong><br>
                              Perkalian matriks dapat didistribusikan terhadap penjumlahan
                              atau pengurangan, yaitu
                              \( A(B \pm C) = AB \pm AC \) atau
                              \( (A \pm B)C = AC \pm BC \).
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide"
onclick="unlockMateri('perkalian-dua-matriks-2')">
Selanjutnya
</button>
                      </div>
                    </section>




                    <section class="materi-slide" data-section="perkalian-dua-matriks-2">
                      <p><strong>Contoh 1:</strong></p>
                      <p>Diketahui matriks di bawah ini</p>
                      <div class="text-center my-3 matrix-display-big">
                        \(
                        A =
                        \begin{bmatrix}
                        4 & 3 \\
                        1 & 5 \\
                        2 & 1
                        \end{bmatrix}
                        \qquad
                        B =
                        \begin{bmatrix}
                        2 & 1 & 3 \\
                        0 & 4 & -1
                        \end{bmatrix}
                        \)
                    </div>
                    <p>Tentukan hasil perkalian \( 𝐴 × 𝐵 \)!</p>
                    <div class="matrix-tutorial-stack tutorial-ab">
                      <div class="matrix-tutorial-box row-tutorial">
                        <!-- LABEL A × B = -->
                        <div class="matrix-frame matrix-label">
                          \( A \times B = \)
                        </div>
                        <!-- MATRIX A -->
                        <div class="matrix-frame bracket-frame">
                          <table class="matrix-html matrix-a">
                            <tr><td>4</td><td>3</td></tr>
                            <tr><td>1</td><td>5</td></tr>
                            <tr><td>2</td><td>1</td></tr>
                          </table>
                        </div>
                        <!-- TANDA KALI -->
                        <div class="matrix-frame matrix-label">
                          \( \times \)
                        </div>
                        <!-- MATRIX B -->
                        <div class="matrix-frame bracket-frame">
                          <table class="matrix-html matrix-b">
                            <tr><td>2</td><td>1</td><td>3</td></tr>
                            <tr><td>0</td><td>4</td><td>-1</td></tr>
                          </table>
                        </div>
                        <!-- TANDA = -->
                        <div class="matrix-frame matrix-label">
                          \( = \)
                        </div>
                        <!-- MATRIX HASIL -->
                        <div class="matrix-frame bracket-frame">
                          <table class="matrix-html matrix-result">
                            <tr><td></td><td></td><td></td></tr>
                            <tr><td></td><td></td><td></td></tr>
                            <tr><td></td><td></td><td></td></tr>
                          </table>
                        </div>
                        <!-- = -->
<div class="matrix-frame matrix-label">\( = \)</div>

<!-- KURUNG HASIL SEMENTARA -->
<div class="matrix-frame bracket-frame">
  <table class="matrix-html matrix-mid-ab">
    <tr><td></td><td></td><td></td></tr>
    <tr><td></td><td></td><td></td></tr>
    <tr><td></td><td></td><td></td></tr>
  </table>
</div>
                      </div>
                    </div>
                    <!-- TOMBOL -->
                    <div class="matrix-step-controls">
                      <button id="btnPrevAB" class="btn btn-outline-secondary" disabled>Sebelumnya</button>
                      <button id="btnMainAB" class="btn btn-success">Mulai</button>
                    </div>
                    <!-- PENJELASAN -->
                    <div class="matrix-explanation" id="abExplanation">
                      Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                    </div>
                    <div class="slide-nav mt-4 text-end">
                          <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                          <button class="btn btn-primary btn-next-slide"
onclick="unlockMateri('perkalian-dua-matriks-3')">
Selanjutnya
</button>
                    </div>
                    </section>



                    <section class="materi-slide" data-section="perkalian-dua-matriks-3">
                      <p><strong>Contoh 2:</strong></p>
                      <p>Sebuah perusahaan logistik memiliki tiga gudang utama di Jawa Barat, yaitu Gudang 1 di Cikampek, Gudang 2 di Cirebon,
                        dan Gudang 3 di Sukabumi. Setiap gudang mengirimkan tiga jenis barang ke berbagai kota, yaitu barang elektronik,
                        makanan, dan pakaian.
                      </p>
                      <p>Jumlah truk yang digunakan untuk mengirim tiap jenis barang dari setiap gudang ditunjukkan pada tabel berikut. </p>
                      <!-- ===== Tabel Data ===== -->
                      <div class="table-scroll-horizontal mb-3">
                          <table class="tabel-matriks">
                              <thead>
                                  <tr>
                                      <th>Gudang</th>
                                      <th>Elektronik (truk)</th>
                                      <th>Makanan (truk)</th>
                                      <th>Pakaian (truk)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Gudang 1</td>
                                      <td>5</td>
                                      <td>3</td>
                                      <td>4</td>
                                  </tr>
                                  <tr>
                                      <td>Gudang 2</td>
                                      <td>2</td>
                                      <td>6</td>
                                      <td>5</td>
                                  </tr>
                                  <tr>
                                      <td>Gudang 3</td>
                                      <td>4</td>
                                      <td>2</td>
                                      <td>3</td>
                                  </tr>
                              </tbody>
                          </table>
                          <!-- CAPTION -->
                          <div class="image-caption">
                              Table 5.1 Data Jumlah Truk
                          </div>
                      </div>
                      <p>Selain itu, diketahui juga kapasitas rata-rata muatan tiap truk untuk masing-masing jenis barang.</p>
                      <!-- ===== Tabel Data ===== -->
                      <div class="table-responsive table-cuaca mb-3">
                          <table class="tabel-matriks">
                              <thead>
                                  <tr>
                                      <th>Jenis Barang</th>
                                      <th>Kapasitas per Truk (ton)</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>Elektronik</td>
                                      <td>10</td>
                                  </tr>
                                  <tr>
                                      <td>Makanan</td>
                                      <td>8</td>
                                  </tr>
                                  <tr>
                                      <td>Pakaian</td>
                                      <td>6</td>
                                  </tr>
                              </tbody>
                          </table>
                          <!-- CAPTION -->
                          <div class="image-caption">
                              Table 5.2 Data Kapasitas Rata-Rata Truk
                          </div>
                      </div>
                      <p>Tentukan total kapasitas muatan yang dikirim dari setiap gudang!</p>
                      <p><strong>Penyelesaian:</strong></p>
                      <div class="text-center my-3 matrix-display-big">
                        \(
                        A =
                        \begin{bmatrix}
                        5 & 3 & 4 \\
                        2 & 6 & 5 \\
                        4 & 2 & 3
                        \end{bmatrix}
                        \)
                      </div>
                      <p class="text-center">(matriks jumlah truk tiap jenis barang dari setiap gudang)</p>
                      <div class="text-center my-3 matrix-display-big">
                        \(
                        B =
                        \begin{bmatrix}
                        10 \\
                        8 \\
                        6
                        \end{bmatrix}
                        \)
                      </div>
                      <p class="text-center">(matriks kapasitas muatan per truk (dalam ton))</p>
                      <div class="matrix-tutorial-stack tutorial-a3b1">
                        <div class="matrix-tutorial-box row-tutorial">
                          <!-- LABEL -->
                          <div class="matrix-frame matrix-label">
                            \( A \times B = \)
                          </div>
                          <!-- MATRIX A (3x3) -->
                          <div class="matrix-frame bracket-frame">
                            <table class="matrix-html matrix-a">
                              <tr><td>5</td><td>3</td><td>4</td></tr>
                              <tr><td>2</td><td>6</td><td>5</td></tr>
                              <tr><td>4</td><td>2</td><td>3</td></tr>
                            </table>
                          </div>
                          <!-- TANDA KALI -->
                          <div class="matrix-frame matrix-label">
                            \( \times \)
                          </div>
                          <!-- MATRIX B (3x1) -->
                          <div class="matrix-frame bracket-frame">
                            <table class="matrix-html matrix-b">
                              <tr><td>10</td></tr>
                              <tr><td>8</td></tr>
                              <tr><td>6</td></tr>
                            </table>
                          </div>
                          <!-- TANDA = -->
                          <div class="matrix-frame matrix-label">
                            \( = \)
                          </div>
                          <!-- MATRIX HASIL (OPERASI) -->
<div class="matrix-frame bracket-frame">
  <table class="matrix-html matrix-result">
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
  </table>
</div>

<!-- = -->
<div class="matrix-frame matrix-label">\( = \)</div>

<!-- MATRIX MID (HASIL ANGKA) -->
<div class="matrix-frame bracket-frame">
  <table class="matrix-html matrix-mid-a3b1">
    <tr><td></td></tr>
    <tr><td></td></tr>
    <tr><td></td></tr>
  </table>
</div>
                        </div>
                      </div>
                      <!-- TOMBOL -->
                      <div class="matrix-step-controls">
                        <button id="btnPrevA3B1" class="btn btn-outline-secondary" disabled>
                          Sebelumnya
                        </button>
                        <button id="btnMainA3B1" class="btn btn-success">
                          Mulai
                        </button>
                      </div>
                      <!-- PENJELASAN -->
                      <div class="matrix-explanation" id="a3b1Explanation">
                        Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                      </div>
                      <p>Jadi, total kapasitas muatan yang dikirim adalah:</p>
                      <p>Gudang 1 : 98 ton</p>
                      <p>Gudang 2 : 98 ton</p>
                      <p>Gudang 3 : 74 ton</p>
                      <div class="slide-nav mt-4 text-end">
                          <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                          <button class="btn btn-primary btn-next-slide"
onclick="unlockMateri('mari-mencoba-perkalian')">
Selanjutnya
</button>
                      </div>
                    </section>



                    <section class="materi-slide" data-section="mari-mencoba-perkalian">
                      <br><br>
                      <div class="quiz-wrapper">
                        <div class="quiz-container">
                          <!-- HEADER -->
                          <div class="quiz-header">
                            Mari Mencoba <i class="bi bi-pen"></i>
                          </div>
                          <!-- ===== PETUNJUK PENGERJAAN ===== -->
<p class="mb-2">
    <a href="javascript:void(0)"
       id="togglePetunjuk"
       class="fw-bold text-decoration-none">
        <i class="bi bi-info-circle"></i>
        Petunjuk Pengerjaan
        <i class="bi bi-chevron-down" id="iconPetunjuk"></i>
    </a>
</p>

<div id="petunjukMariMencoba"
     style="display:none; text-align:justify; line-height:1.7; margin-bottom:15px;">
    Kerjakan setiap soal sesuai instruksi pada masing-masing soal.
    Bentuk soal dapat berupa pilihan ganda,
    <i>drag and drop</i>, isian singkat, maupun bentuk interaktif lainnya.
    Gunakan tombol <strong>Periksa Jawaban</strong> untuk mengecek jawaban.
    Apabila jawaban telah benar, lanjutkan ke soal berikutnya hingga seluruh
    soal selesai. Halaman berikutnya akan terbuka jika semua jawaban benar.
</div>
                          <!-- PROGRESS -->
                          <div class="quiz-progress-wrapper">
                            <div class="quiz-progress-bar">
                              <div class="quiz-progress-fill" id="quizProgressFill-2"></div>
                              <div class="quiz-progress-star" id="quizProgressStar-2">⭐</div>
                            </div>
                            <div class="quiz-progress-text">
                              Soal
                              <span id="currentQuestion-2">1</span>
                              dari
                              <span id="totalQuestion-2">1</span>
                            </div>
                          </div>
                          <!-- ⬇️ SOAL MUNCUL DI SINI (HASIL render() JS) -->
                          <div class="quiz-question" id="quiz-question-2"></div>
                          <!-- BUTTON -->
                          <div class="quiz-buttons">
                            <button type="button" id="btn-periksa-2">Periksa Jawaban</button>
                            <button type="button" id="btn-reset-2">Reset Jawaban</button>
                          </div>
                          <!-- NAV -->
                          <div class="quiz-nav">
                            <button type="button" id="btn-prev-2">
                              <i class="bi bi-arrow-left me-2"></i>Sebelumnya
                            </button>
                            <button type="button" id="btn-next-2">
                              Berikutnya <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                          </div>
                          <!-- HASIL -->
                          <p id="hasil-jawaban-2"></p>
                        </div>
                      </div>
                      <div class="slide-nav mt-4 text-end">
                          <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                          <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="mari-mencoba-perkalian-matriks"
    data-allowed="{{ in_array('mari-mencoba-perkalian-matriks', $completed ?? []) ? '1' : '0' }}">
    Selanjutnya
</button>
                      </div>
                    </section>




                    {{-- =================================================
                    SECTION: KUIS PENGERTIAN MATRIKS
                ================================================= --}}
                <section class="materi-slide" data-section="kuis-perkalian">
                    <div class="quiz-action-wrapper">
                      <br>
                      <br>
                      <p class="refleksi-hint text-center">
                        Silahkan klik tombol di bawah ini
                        untuk mengerjakan kuis agar dapat <strong>melanjutkan ke materi berikutnya</strong> 👇
                    </p>
                        <!-- KARTU KUIS -->
                        <div class="quiz-link-wrapper mb-7">
                            <a href="{{ route('petunjuk.kuis', ['quiz_id' => 5]) }}" class="quiz-link-card">

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
                                'materi' => 'perkalian_matriks',
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

                    <!-- ================= PAGE INDICATOR ================= -->
                    <!-- SINGLE PAGE INDICATOR (GLOBAL) -->
                    <div class="slide-indicator-wrapper" id="globalIndicator">
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
        <h3>Selesaikan soal terlebih dahulu ya</h3>
        <p>Selesaikan Mari Mencoba terlebih dahulu!</p>
        <button onclick="closePopup()">Oke</button>
    </div>
</div>




<script>

    
/* ======================================================
   SCROLL + ACTIVE (SECTION BASED)
====================================================== */
(function(){

  window.activateSidebarFor = function(sectionId) {
  // clear active
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
    .forEach(a => a.classList.remove('active'));

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
).filter(link => {
  const sections = link.dataset.section?.split(',') || [];
  return sections.includes(sectionId);
});

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

// =================== TUTORIAL PERKALIAN SKALAR MATRKS ===================== //
document.addEventListener('DOMContentLoaded', () => {

  const SKALAR = 2;

  document
    .querySelectorAll('.tutorial-scalar .matrix-result td')
    .forEach(resultCell => {

      resultCell.addEventListener('click', () => {

        // RESET highlight
        document
          .querySelectorAll('.matrix-mark')
          .forEach(el => el.classList.remove('matrix-mark'));

        const row = resultCell.dataset.row;
        const col = resultCell.dataset.col;

        // highlight hasil
        resultCell.classList.add('matrix-mark');

        const tutorialBox = resultCell.closest('.matrix-tutorial-box');
        const stack = resultCell.closest('.matrix-tutorial-stack');
        if (!tutorialBox || !stack) return;

        // ambil sel matriks P
        const cellP = tutorialBox.querySelector(
          `.matrix-p td[data-row="${row}"][data-col="${col}"]`
        );

        // ambil skalar
        const scalarEl = tutorialBox.querySelector('.scalar-value');

        if (!cellP || !scalarEl) return;

        // highlight asal + skalar
        cellP.classList.add('matrix-mark');
        scalarEl.classList.add('matrix-mark');

        // update keterangan
        const explanation = stack.querySelector('.matrix-explanation');
        if (!explanation) return;

        explanation.textContent =
          `${SKALAR} × ${cellP.textContent} = ${resultCell.textContent}`;
      });

    });
});


// =================== TUTORIAL PERKALIAN SKALAR c(P − Q) ===================== //
document.addEventListener('DOMContentLoaded', () => {

  const P = [[4,2],[6,3]];
  const Q = [[7,5],[9,4]];
  const C = -2;

  let row = 0;
  let col = 0;
  let step = 0;
  let started = false;
  let finished = false;

  const historyStack = [];

  const btnMain = document.getElementById('btnMainCPQ');
  const btnPrev = document.getElementById('btnPrevCPQ');
  const explain = document.getElementById('cpqExplanation');

  // ================= UTIL =================
  const clear = () => {
    document
      .querySelectorAll('.matrix-mark,.matrix-pop')
      .forEach(el => el.classList.remove('matrix-mark','matrix-pop'));
  };

  function pop(el){
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  }

  const pCell = () =>
    document.querySelector(`.tutorial-cpq .matrix-p tr:nth-child(${row+1}) td:nth-child(${col+1})`);

  const qCell = () =>
    document.querySelector(`.tutorial-cpq .matrix-q tr:nth-child(${row+1}) td:nth-child(${col+1})`);

  const rCell = () =>
    document.querySelector(`.tutorial-cpq .matrix-result tr:nth-child(${row+1}) td:nth-child(${col+1})`);

  const finalCell = () =>
    document.querySelector(`.tutorial-cpq .matrix-final tr:nth-child(${row+1}) td:nth-child(${col+1})`);

  const midCell = () =>
    document.querySelector(`.tutorial-cpq .matrix-mid tr:nth-child(${row+1}) td:nth-child(${col+1})`);

  // ================= RENDER STEP =================
  function renderStep(){
    clear();

    const p = P[row][col];
    const q = Q[row][col];
    const diff = p - q;
    const result = C * diff;

    const pIdx = `P${row+1}${col+1}`;
    const qIdx = `Q${row+1}${col+1}`;

    switch(step){

      case 0:
        pCell().classList.add('matrix-mark');
        qCell().classList.add('matrix-mark');
        explain.textContent =
          `Ambil elemen Matriks ${pIdx} dan Matriks ${qIdx}`;
        break;

      case 1:
        rCell().textContent = `${p} − ${q}`;
        pop(rCell());
        explain.textContent =
          `Kurangkan elemen Matriks ${pIdx} dengan Matriks ${qIdx}`;
        break;

      case 2:
  // JANGAN ubah rCell!
  midCell().textContent = diff;
  pop(midCell());

  explain.textContent =
    `Hasil ${p} - ${q} adalah ${diff}`;
  break;

      case 3:
  document.querySelectorAll('.tutorial-cpq .scalar-value')[2]
    .classList.add('matrix-mark');

  midCell().classList.add('matrix-mark');

  explain.textContent =
    `Kalikan ${C} dengan ${diff}`;
  break;

      case 4:
        finalCell().textContent = result;
        pop(finalCell());
        explain.textContent =
          `Ini adalah hasil nilai c dikalikan dengan hasil operasi pengurangan tadi`;
        break;
    }
  }

  // ================= NEXT =================
  function nextStep(){

    historyStack.push({ row, col, step });
    renderStep();
    step++;

    if(step > 4){
      step = 0;
      col++;

      if(col >= P[0].length){
        col = 0;
        row++;
      }

      // === SEMUA SELESAI ===
      if(row >= P.length){
  clear();

  // ✅ keterangan akhir
  explain.textContent = 'Hasil akhir perkalian skalar matriks';

  btnMain.textContent = 'Selesai';
  btnMain.classList.remove('btn-primary','btn-success');
  btnMain.classList.add('btn-warning');

  btnPrev.disabled = true;
  started = false;
  finished = true;
  historyStack.length = 0;
}

    }
  }

  // ================= BUTTON MAIN =================
  btnMain.onclick = () => {

    // === KLIK SELESAI → RESET TOTAL ===
    if(finished){
      document
  .querySelectorAll(`
    .tutorial-cpq .matrix-result td,
    .tutorial-cpq .matrix-mid td,
    .tutorial-cpq .matrix-final td
  `)
  .forEach(td => td.textContent = '');

      row = col = step = 0;
      started = false;
      finished = false;
      historyStack.length = 0;

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning','btn-primary');
      btnMain.classList.add('btn-success');

      btnPrev.disabled = true;
      explain.textContent = 'Tekan Mulai untuk melihat langkah penyelesaian';
      clear();
      return;
    }

    // === MULAI / LANJUT ===
    if(!started){
      started = true;
      row = col = step = 0;
      historyStack.length = 0;

      nextStep();

      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    } else {
      nextStep();
    }
  };

  // ================= BUTTON PREV =================
  btnPrev.onclick = () => {
    if(historyStack.length === 0) return;

    const prev = historyStack.pop();
    row  = prev.row;
    col  = prev.col;
    step = prev.step;

    renderStep();
  };

});







// =================== TUTORIAL PERKALIAN DUA MATRIKS ===================== //

document.addEventListener('DOMContentLoaded', () => {

  const A = [
    [4,3],
    [1,5],
    [2,1]
  ];

  const B = [
    [2,1,3],
    [0,4,-1]
  ];

  let row = 0, col = 0, step = 0;
  let started = false;
  let finished = false;
  let historyStack = [];

  const btnMain = document.getElementById('btnMainAB');
  const btnPrev = document.getElementById('btnPrevAB');
  const explain = document.getElementById('abExplanation');

  if (!btnMain || !btnPrev) return;

  // ================= UTIL =================
  const clear = () => {
    document
      .querySelectorAll('.tutorial-ab .matrix-mark,.tutorial-ab .matrix-pop')
      .forEach(el => el.classList.remove('matrix-mark','matrix-pop'));
  };

  function pop(el){
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  }

  const aCell = (r,c) =>
    document.querySelector(`.tutorial-ab .matrix-a tr:nth-child(${r+1}) td:nth-child(${c+1})`);

  const bCell = (r,c) =>
    document.querySelector(`.tutorial-ab .matrix-b tr:nth-child(${r+1}) td:nth-child(${c+1})`);

  const resultCell = () =>
    document.querySelector(`.tutorial-ab .matrix-result tr:nth-child(${row+1}) td:nth-child(${col+1})`);

  const midCell = () =>
    document.querySelector(`.tutorial-ab .matrix-mid-ab tr:nth-child(${row+1}) td:nth-child(${col+1})`);

  // ================= RENDER STEP =================
  function renderStep(){
  clear();

  const aRow = row + 1;
  const bCol = col + 1;

  switch(step){

    // STEP 1
    case 0:
      A[row].forEach((_,i)=> aCell(row,i).classList.add('matrix-mark'));
      B.forEach((_,i)=> bCell(i,col).classList.add('matrix-mark'));

      explain.textContent =
        `Ambil elemen matriks A baris ${aRow} dan Matriks B kolom ${bCol}`;
      break;

    // STEP 2
    case 1:
      aCell(row,0).classList.add('matrix-mark');
      bCell(0,col).classList.add('matrix-mark');
      aCell(row,1).classList.add('matrix-mark');
      bCell(1,col).classList.add('matrix-mark');

      resultCell().textContent =
        `${A[row][0]}×(${B[0][col]}) + ${A[row][1]}×(${B[1][col]})`;
      pop(resultCell());

      explain.textContent =
        `Elemen A${aRow}1 dikalikan dengan B1${bCol} ditambah A${aRow}2 dikalikan dengan B2${bCol}`;
      break;

    // STEP 3
    // STEP 3 → hasil pindah ke kurung baru
case 2: {
  const hasil =
    A[row][0]*B[0][col] + A[row][1]*B[1][col];

  midCell().textContent = hasil;
  pop(midCell());

  explain.textContent =
    `Hasil dari operasi tersebut adalah ${hasil}`;

  break;
}


  }
}

  // ================= NEXT STEP =================
  function nextStep(){

  historyStack.push({ row, col, step });

  // STEP NORMAL
  step++;

  // 🔥 KALAU HABIS STEP 2 → LANGSUNG PINDAH ELEMEN
  if(step > 2){

    // simpan hasil ke matrix result (sekali saja)
    const hasil =
      A[row][0]*B[0][col] + A[row][1]*B[1][col];

    if(resultCell().textContent === ''){
      resultCell().textContent = hasil;
      pop(resultCell());
    }

    step = 0;
    col++;

    if(col >= B[0].length){
      col = 0;
      row++;
    }

    if(row >= A.length){
      clear();
      explain.textContent = 'Hasil akhir perkalian dua matriks';

      btnMain.textContent = 'Selesai';
      btnMain.classList.remove('btn-primary','btn-success');
      btnMain.classList.add('btn-warning');

      btnPrev.disabled = true;
      started = false;
      finished = true;
      historyStack = [];
      return;
    }
  }

  renderStep();
}
  

  // ================= BUTTON MAIN =================
  btnMain.onclick = () => {

    // reset setelah selesai
    if(finished){

  // 🔥 RESET SEMUA OUTPUT
  document
    .querySelectorAll('.tutorial-ab .matrix-result td')
    .forEach(td => td.textContent = '');

  document
    .querySelectorAll('.tutorial-ab .matrix-mid-ab td')
    .forEach(td => td.textContent = '');

  // 🔥 RESET STATE
  row = col = step = 0;
  finished = false;
  started = false;
  historyStack = [];

  btnMain.textContent = 'Mulai';
  btnMain.classList.remove('btn-warning','btn-primary');
  btnMain.classList.add('btn-success');

  btnPrev.disabled = true;

  explain.textContent = 'Tekan Mulai untuk melihat langkah penyelesaian';

  clear(); // penting banget buat hapus highlight

  return;
}

    if(!started){
      started = true;
      row = col = step = 0;
      historyStack = [];

      nextStep();

      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    } else {
      nextStep();
    }
  };

  // ================= BUTTON PREV =================
  btnPrev.onclick = () => {
    if(historyStack.length === 0) return;

    const prev = historyStack.pop();
    row  = prev.row;
    col  = prev.col;
    step = prev.step;

    renderStep();
  };

});


// =================== TUTORIAL PERKALIAN DUA MATRIKS 2 ===================== //

// ========== TUTORIAL PERKALIAN 3x3 × 3x1 ==========
document.addEventListener('DOMContentLoaded', () => {

  const A = [
    [5,3,4],
    [2,6,5],
    [4,2,3]
  ];

  const B = [
    [10],
    [8],
    [6]
  ];

  let row = 0;
  let step = 0;
  let started = false;
  let finished = false;
  let historyStack = [];
  let lastStepMode = false;

  const btnMain = document.getElementById('btnMainA3B1');
  const btnPrev = document.getElementById('btnPrevA3B1');
  const explain = document.getElementById('a3b1Explanation');

  if (!btnMain || !btnPrev) return;

  // ========= UTIL =========
  const clear = () => {
    document
      .querySelectorAll('.tutorial-a3b1 .matrix-mark,.tutorial-a3b1 .matrix-pop')
      .forEach(el => el.classList.remove('matrix-mark','matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  const aCell = (r,c) =>
    document.querySelector(`.tutorial-a3b1 .matrix-a tr:nth-child(${r+1}) td:nth-child(${c+1})`);

  const bCell = (r) =>
    document.querySelector(`.tutorial-a3b1 .matrix-b tr:nth-child(${r+1}) td:nth-child(1)`);

  const resultCell = () =>
    document.querySelector(`.tutorial-a3b1 .matrix-result tr:nth-child(${row+1}) td:nth-child(1)`);

  const midCell = () =>
    document.querySelector(`.tutorial-a3b1 .matrix-mid-a3b1 tr:nth-child(${row+1}) td:nth-child(1)`);

  // ========= RENDER STEP =========
  function renderStep(){
    clear();
    const aRow = row + 1;

    switch(step){

      // STEP 1
      case 0:
        A[row].forEach((_,i)=> aCell(row,i).classList.add('matrix-mark'));
        B.forEach((_,i)=> bCell(i).classList.add('matrix-mark'));

        explain.textContent =
          `Ambil elemen matriks A baris ${aRow} dan matriks B kolom 1`;
        break;

      // STEP 2
      case 1:
        for(let i=0;i<3;i++){
          aCell(row,i).classList.add('matrix-mark');
          bCell(i).classList.add('matrix-mark');
        }

        resultCell().textContent =
          `(${A[row][0]}×${B[0][0]}) + (${A[row][1]}×${B[1][0]}) + (${A[row][2]}×${B[2][0]})`;
        pop(resultCell());

        explain.textContent =
          `Elemen A${aRow}1 kalikan dengan B11 ditambah A${aRow}2 kalikan dengan B21 ditambah A${aRow}3 kalikan dengan B31`;
        break;

      // STEP 3
      // STEP 3 → hasil pindah ke MID (BUKAN overwrite)
case 2: {
  const hasil =
    A[row][0]*B[0][0] +
    A[row][1]*B[1][0] +
    A[row][2]*B[2][0];

  midCell().textContent = hasil;
  pop(midCell());

  explain.textContent =
    `Hasil dari operasi tersebut adalah ${hasil}`;
  break;
}
    }
  }

  // ========= NEXT =========
  function nextStep(){
    historyStack.push({ row, step });
    renderStep();
    step++;

    if(step > 2){

  const hasil =
    A[row][0]*B[0][0] +
    A[row][1]*B[1][0] +
    A[row][2]*B[2][0];

  // simpan ke matrix kiri (final)
  if(resultCell().textContent === ''){
    resultCell().textContent = hasil;
    pop(resultCell());
  }

  step = 0;
  row++;

      if(row >= A.length){

  // 🔥 STOP DULU DI HASIL TERAKHIR (74)
  if(!lastStepMode){
    lastStepMode = true;
    step = 2; // balik ke step hasil (biar 74 tampil dulu)
    row = A.length - 1; // tetap di baris terakhir
    renderStep();
    return;
  }

  // 🔥 BARU MASUK KE HASIL AKHIR
  clear();
  explain.textContent = 'Hasil akhir perkalian matriks A dan B';

  btnMain.textContent = 'Selesai';
  btnMain.classList.replace('btn-primary','btn-warning');
  btnPrev.disabled = true;

  finished = true;
  started = false;
  historyStack = [];
  lastStepMode = false;
  return;
}
    }
  }

  // ========= BUTTON MAIN =========
  btnMain.onclick = () => {

    if(finished){

  // 🔥 RESET HASIL KIRI
  document
    .querySelectorAll('.tutorial-a3b1 .matrix-result td')
    .forEach(td => td.textContent = '');

  // 🔥 RESET MID (INI YANG KAMU LUPA!)
  document
    .querySelectorAll('.tutorial-a3b1 .matrix-mid-a3b1 td')
    .forEach(td => td.textContent = '');

  // 🔥 RESET STATE
  row = 0;
  step = 0;
  finished = false;
  started = false;
  historyStack = [];
  lastStepMode = false;

  btnMain.textContent = 'Mulai';
  btnMain.classList.replace('btn-warning','btn-success');
  btnPrev.disabled = true;

  explain.textContent = 'Tekan Mulai untuk melihat langkah penyelesaian';

  clear(); // hapus highlight

  return;
}

    if(!started){
      started = true;
      nextStep();

      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    } else {
      nextStep();
    }
  };

  // ========= PREV =========
  btnPrev.onclick = () => {
    if(historyStack.length === 0) return;

    const prev = historyStack.pop();
    row  = prev.row;
    step = prev.step;

    renderStep();
  };

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
          { drop: {} },
          {
            's2-00':'','s2-01':'',
            's2-10':'','s2-11':''
          },
          {
            's3-00':'','s3-01':'','s3-02':'',
            's3-10':'','s3-11':'','s3-12':''
          }
        ];


        /* =====================================================
        DATA SOAL
        ===================================================== */
        const soal = [

            /* ================= SOAL 1 ================= */
        {
  render: () => `
    <p>1. Seret jawaban yang sesuai ke kolom pernyataan!</p>

    <table class="tabel-soal">
      <tr>
        <th>Pernyataan</th>
        <th>Jawaban</th>
      </tr>

      <tr>
        <td>
          Hasil kali antara matriks berordo 
          \\( m \\times n \\) dengan matriks 
          \\( n \\times p \\) adalah matriks berordo ....
        </td>
        <td><div class="drop-box1" data-ans="ordo"></div></td>
      </tr>

      <tr>
        <td>
          Elemen \\( c_{ij} \\) diperoleh dari ....
        </td>
        <td><div class="drop-box1" data-ans="elemen"></div></td>
      </tr>

      <tr>
        <td>
          Agar dua matriks dapat dikalikan, ....
        </td>
        <td><div class="drop-box1" data-ans="syarat"></div></td>
      </tr>

      <tr>
        <td>
          Matriks identitas (I) memiliki sifat ....
        </td>
        <td><div class="drop-box1" data-ans="identitas"></div></td>
      </tr>
    </table>

    <p>Pilihan jawaban:</p>

    <div class="opsi-jawaban-1">
      <div class="opsi1" draggable="true" data-val="syarat">
        jumlah kolom matriks pertama = jumlah baris matriks kedua
      </div>

      <div class="opsi1" draggable="true" data-val="elemen">
        hasil kali setiap elemen baris ke-i pada A dengan kolom ke-j pada B lalu dijumlahkan
      </div>

      <div class="opsi1" draggable="true" data-val="ordo">
        m × p
      </div>

      <div class="opsi1" draggable="true" data-val="identitas">
        AI = IA = A
      </div>
    </div>
    <br>
  `,

  restore: () => {
    Object.entries(userAnswer[0].drop || {}).forEach(([key, val]) => {
      const box = document.querySelector(`.drop-box1[data-ans="${key}"]`);
      const opt = document.querySelector(`.opsi1[data-val="${val}"]`);
      if (box && opt) box.appendChild(opt);
    });
  },

  check: () => (
    userAnswer[0].drop?.ordo === 'ordo' &&
    userAnswer[0].drop?.elemen === 'elemen' &&
    userAnswer[0].drop?.syarat === 'syarat' &&
    userAnswer[0].drop?.identitas === 'identitas'
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

    // ======================
    // OPSI
    // ======================
    opsis.forEach(op => {

        // cegah select text
        op.addEventListener('selectstart', e => e.preventDefault());

        // ======================
        // DESKTOP
        // ======================
        op.addEventListener('dragstart', e => {
            dragged = op;

            e.dataTransfer.setData('text/plain', op.dataset.val);

            e.dataTransfer.setDragImage(
                op,
                op.offsetWidth / 2,
                op.offsetHeight / 2
            );
        });

        // ======================
        // MOBILE
        // ======================
        op.addEventListener('touchstart', function () {

            dragged = this;

            this.classList.add('dragging');
        });

        op.addEventListener('touchmove', function (e) {

            e.preventDefault();

            const touch = e.touches[0];

            this.style.position = 'fixed';
            this.style.left =
                touch.clientX - this.offsetWidth / 2 + 'px';

            this.style.top =
                touch.clientY - this.offsetHeight / 2 + 'px';

            this.style.zIndex = 9999;

            /* 🔥 penting */
            this.style.pointerEvents = 'none';
        });

        op.addEventListener('touchend', function (e) {

            const touch = e.changedTouches[0];

            const target = document.elementFromPoint(
                touch.clientX,
                touch.clientY
            );

            const dropzone = target?.closest('.drop-box1');

            // ======================
            // MASUK DROPBOX
            // ======================
            if (dropzone) {

                // kalau kosong
                if (!dropzone.children.length) {

                    dropzone.appendChild(this);

                    userAnswer[0].drop[
                        dropzone.dataset.ans
                    ] = this.dataset.val;
                }

            } else {

                // ======================
                // BALIK KE CONTAINER
                // ======================
                opsiContainer.appendChild(this);

                Object.keys(userAnswer[0].drop).forEach(k => {

                    if (
                        userAnswer[0].drop[k] === this.dataset.val
                    ) {
                        delete userAnswer[0].drop[k];
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

        box.addEventListener('drop', e => {

            e.preventDefault();

            if (!dragged) return;

            if (!box.children.length) {

                box.appendChild(dragged);

                userAnswer[0].drop[
                    box.dataset.ans
                ] = dragged.dataset.val;
            }
        });

    });

    // ======================
    // BALIK KE CONTAINER
    // ======================
    opsiContainer.addEventListener(
        'dragover',
        e => e.preventDefault()
    );

    opsiContainer.addEventListener('drop', e => {

        e.preventDefault();

        if (!dragged) return;

        opsiContainer.appendChild(dragged);

        Object.keys(userAnswer[0].drop).forEach(k => {

            if (
                userAnswer[0].drop[k] === dragged.dataset.val
            ) {
                delete userAnswer[0].drop[k];
            }

        });

    });

}},


            /* ================= SOAL 2 ================= */
{
  render: () => `
    <p>2. Diketahui</p>

    \\[
    A =
    \\begin{bmatrix}
    2 & 3 \\\\
    1 & 4
    \\end{bmatrix}
    \\quad
    B =
    \\begin{bmatrix}
    3 & 2 \\\\
    5 & 1
    \\end{bmatrix}
    \\]

    <hr>

    <p>Hitunglah hasil \\( A \\times B \\)!</p>
    <p>Jawab:</p>
    <p style="font-size:14px; color:#666;">
      Klik icon ☰, lalu pilih dan klik insert matriks, kemudian arahkan kursor dan tentukan jumlah baris dan kolomnya.
    </p>

    <math-field id="matrixInput2"
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
  `,

  afterRender: () => {

    const mf = document.getElementById("matrixInput2");

    if (mf) {
      mf.setOptions({ virtualKeyboardMode: "onfocus" });

      mf.addEventListener("input", () => {
        userAnswer[1].matrixLatex = mf.value;
      });
    }

    if (window.MathJax) MathJax.typesetPromise();
  },

  restore: () => {
  const mf = document.getElementById("matrixInput2");
  if (mf && userAnswer[1].matrixLatex) {
    mf.value = userAnswer[1].matrixLatex;
  }
},

  check: () => {

  const latex = userAnswer[1].matrixLatex;
  if (!latex) return false;

  const angka = (latex.match(/-?\d+/g) || []).map(Number);

  if (angka.length !== 4) return false;

  return (
    angka[0] === 21 &&
    angka[1] === 7 &&
    angka[2] === 23 &&
    angka[3] === 6
  );
}, // ⬅️ INI WAJIB ADA!

reset: () => {
  userAnswer[1] = {};
}

},



            /* ================= SOAL 3 ================= */
{
  render: () => `
    <p>3. Jika</p>

    \\[
    B =
    \\begin{bmatrix}
    5 & -2 & 1 \\\\
    0 & 3 & 4
    \\end{bmatrix}
    \\]

    <p>dan \\( k = -2 \\)</p>

    <hr>

    <p>Hitung hasil \\( kB \\)</p>
    <p>Jawab:</p>
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
  `,

  afterRender: () => {

    const mf = document.getElementById("matrixInput3");

    if (mf) {
      mf.setOptions({ virtualKeyboardMode: "onfocus" });

      mf.addEventListener("input", () => {
        userAnswer[2].matrixLatex = mf.value;
      });
    }

    if (window.MathJax) MathJax.typesetPromise();
  },

  restore: () => {
  const mf = document.getElementById("matrixInput3");
  if (mf && userAnswer[2].matrixLatex) {
    mf.value = userAnswer[2].matrixLatex;
  }
},

  check: () => {

    const latex = userAnswer[2].matrixLatex;
    if (!latex) return false;

    const angka = (latex.match(/-?\d+/g) || []).map(Number);

    // hasil -2B
    const benar = [-10, 4, -2, 0, -6, -8];

    return (
      angka.length === 6 &&
      angka.every((v,i)=>v === benar[i])
    );
  },

  reset: () => {
    userAnswer[2] = {};
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

            // Soal 1 (drag & drop)
            if (i === 0) {
              return Object.keys(userAnswer[0].drop).length === 4;
            }

            // Soal 2 (drag & drop)
            if (i === 1) {
  return !!userAnswer[1].matrixLatex;
}

            // Soal 3 (isian transpos)
            if (i === 2) {
  return !!userAnswer[2].matrixLatex;
}

            return false;
        }



        
        /* =====================================================
        UTIL & NAVIGASI
        ===================================================== */
        
        let idx = 0;
        let completed = 0; // jumlah soal yang sudah SAH dijawab
        let quizFinished = false;


        function clearAllAnswers() {
            userAnswer[0] = { drop:{} };
            userAnswer[1] = {
              r11:'', r12:'',
              r21:'', r22:''
            };

            userAnswer[2] = { x:'', y:'', z:'' };

            idx = 0;
            completed = 0;

            renderSoal();
            updateQuizProgress();
            hasil.textContent = '';
            quizFinished = false;
        }



        function renderSoal() {
            hasil.textContent = '';
            container.innerHTML = soal[idx].render();

            if (window.MathJax) MathJax.typesetPromise();
            if (soal[idx].afterRender) soal[idx].afterRender();
            if (soal[idx].restore) soal[idx].restore();

            btnPrev.style.visibility = idx === 0 ? 'hidden' : 'visible';
            btnNext.innerHTML = idx === soal.length - 1 ? 'Selesai' : 'Berikutnya <i class="bi bi-arrow-right ms-2"></i>';

            updateQuizProgress(); // ✅ WAJIB DI SINI
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
            const benar = soal[idx].check();
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

        btnNext.onclick = function (e) {
          e.preventDefault();

          // VALIDASI JAWABAN TERISI
          if (!isAnswered(idx)) {
              showPopup('Selesaikan soal ini terlebih dahulu 🙂');
              return;
          }

          // SIMPAN STATUS BENAR / SALAH SEKALI SAJA
          if (!soal[idx].isChecked) {
              soal[idx].isCorrect = soal[idx].check();
              soal[idx].isChecked = true;
          }

          completed = Math.max(completed, idx + 1);
          updateQuizProgress();

          // PINDAH KE SOAL BERIKUTNYA
          if (idx < soal.length - 1) {
              idx++;
              renderSoal();
              return;
          }


    
    // ===============================
    // SOAL TERAKHIR — FINAL & AMAN
    // ===============================
    completed = soal.length;
    updateQuizProgress(); // ⭐ 100% dulu

    // HITUNG SKOR
    let score = 0;
    soal.forEach(s => {
      if (s.isCorrect) score++;
    });

    
    

    // ⏳ tunggu progress tampil
    setTimeout(() => {

    // ✅ Semua soal benar
    if (score === soal.length) {

        fetch('/progress/complete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                materi_slug: 'perkalian_matriks',
                sub_materi_slug: 'mari-mencoba-perkalian-matriks'
            })
        })
        .then(() => {

            const btn = document.querySelector(
                '.btn-next-slide[data-check="mari-mencoba-perkalian-matriks"]'
            );

            if(btn){
                btn.dataset.allowed = "1";
            }

            showPopup(
    `<b>Luar Biasa! 🎉</b><br>
    Semua jawaban benar: <b>${score}/${soal.length}</b><br>
    Tombol Selanjutnya telah dibuka.`,
    () => {

        // buka tombol Selanjutnya
        const btn = document.querySelector(
            '.btn-next-slide[data-check="mari-mencoba-perkalian-matriks"]'
        );

        if (btn) {
            btn.dataset.allowed = "1";
        }

        // reset status soal
        soal.forEach(s => {
            delete s.isChecked;
            delete s.isCorrect;
        });

        // reset jawaban
        userAnswer[0] = { drop:{} };
        userAnswer[1] = {};
        userAnswer[2] = {};

        idx = 0;
        completed = 0;

        renderSoal();
        updateQuizProgress();

        // otomatis pindah ke slide berikutnya
        setTimeout(() => {
            document
                .querySelector('.btn-next-slide[data-check="mari-mencoba-perkalian-matriks"]')
                ?.click();
        }, 100);

    },
    '🎉'
);

        });

    }

    // ❌ Masih ada jawaban salah
    else {

        showPopup(
            `<b>Jawaban benar: ${score}/${soal.length}</b><br>
            Semua soal harus benar terlebih dahulu untuk membuka halaman selanjutnya.`,
            () => {

                soal.forEach(s => {
                    delete s.isChecked;
                    delete s.isCorrect;
                });

                userAnswer[0] = { drop:{} };
                userAnswer[1] = {
                    r11:'', r12:'',
                    r21:'', r22:''
                };
                userAnswer[2] = { x:'', y:'', z:'' };

                idx = 0;
                completed = 0;

                renderSoal();
                updateQuizProgress();
            },
            '⚠️'
        );

    }

}, 300);

    }; // ⬅️⬅️⬅️ INI WAJIB ADA (MENUTUP btnNext.onclick)



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
    
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {

  /* ===============================
     SLIDE CORE
  =============================== */
  const slides = [...document.querySelectorAll(".materi-slide")];
  const indicator = document.getElementById("slideIndicator");
  const globalIndicator = document.getElementById("globalIndicator");
  let index = 0;

  // ================= UNLOCK SYSTEM =================
window.unlocked = @json($progress);

const mapping = [
  'perkalian-skalar',
  'perkalian-skalar-2',
  'perkalian-skalar-3',
  'perkalian-dua-matriks',
  'perkalian-dua-matriks-2',
  'perkalian-dua-matriks-3',
  'mari-mencoba-perkalian',
  'kuis-perkalian'
];

  // === GLOBAL FUNCTION (PENTING)
  window.showSlide = function(i){
    if(i < 0 || i >= slides.length) return;

    slides.forEach(s => s.classList.remove("active"));
    slides[i].classList.add("active");
    index = i;

    // pindahkan indikator
    slides[i].appendChild(globalIndicator);

    // update dot aktif
    [...indicator.children].forEach(d => d.classList.remove("active"));
    indicator.children[i]?.classList.add("active");

    // 🔥 TAMBAHKAN DI SINI (WAJIB DI SINI)
    const currentSlug = slides[i].dataset.section;
    if (currentSlug === 'kuis-perkalian') {

    // unlock frontend
    if (!window.unlocked.includes('kuis-perkalian')) {
        window.unlocked.push('kuis-perkalian');
    }

    // 🔥 SIMPAN KE DATABASE (INI YANG KAMU TANYA)
    fetch('/progress/complete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            materi_slug: 'perkalian_matriks',
            sub_materi_slug: 'kuis-perkalian'
        })
    });

    syncSidebarUnlock();
}
    const currentIndex = mapping.indexOf(currentSlug);

    if (currentIndex !== -1) {
        const dots = document.querySelectorAll('.page-dot');

        dots.forEach((dot, j) => {
            if (j <= currentIndex) {
                dot.classList.remove('locked');
                dot.onclick = () => showSlide(j);
            }
        });
    }

    // sync sidebar + hash
    const section = slides[i].dataset.section;
    if(section){
        history.replaceState(null,"",`#${section}`);
        if(window.activateSidebarFor){
            activateSidebarFor(section);
        }
    }
    syncSidebarUnlock();
};
  /* ===============================
     PREV / NEXT BUTTON
  =============================== */
  document.addEventListener("click", e => {

  const nextBtn = e.target.closest(".btn-next-slide");
  const prevBtn = e.target.closest(".btn-prev-slide");

  if(nextBtn){

    // 🔒 CEK VALIDASI DULU
    const check = nextBtn.dataset.check;
    const allowed = nextBtn.dataset.allowed;

    if(check && allowed !== "1"){
      return; // ❌ STOP — jangan pindah slide
    }

    showSlide(index + 1);
  }

  if(prevBtn){
    showSlide(index - 1);
  }

});

  /* ===============================
     PAGE DOT
  =============================== */
  indicator.innerHTML = "";

slides.forEach((_, i) => {
  const dot = document.createElement("span");
dot.classList.add("page-dot"); // penting!
dot.textContent = i + 1;
  dot.textContent = i + 1;

  const slug = mapping[i];
  const currentHash = location.hash.replace('#','');

  const isOpen =
    window.unlocked.includes(slug)
    slug === currentHash ||
    i === 0;

  if (isOpen) {
    dot.onclick = () => showSlide(i);
  } else {
    dot.classList.add("locked");
  }

  indicator.appendChild(dot);
});

  /* ===============================
     SIDEBAR CLICK
  =============================== */
  /* ===============================
   SIDEBAR CLICK (FIX MULTI SECTION)
=============================== */
document.addEventListener("click", e => {
  const link = e.target.closest(".sidebar-sublink");
  if(!link) return;

  if(link.classList.contains('locked')){
    e.preventDefault();
    return;
  }

  const sections = link.dataset.section?.split(',') || [];

  // cari slide pertama yang cocok
  const idx = slides.findIndex(s =>
    sections.includes(s.dataset.section)
  );

  if(idx !== -1){
    e.preventDefault();
    showSlide(idx); // lompat ke slide pertama dari grup
  }
});

  /* ===============================
     HASH LOAD (SATU-SATUNYA)
  =============================== */
  const hash = location.hash.replace("#","");
  const idx = slides.findIndex(s => s.dataset.section === hash);
  showSlide(idx !== -1 ? idx : 0);

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
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function syncSidebarUnlock() {
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
    .forEach(link => {

      const sections = link.dataset.section?.split(',') || [];

      const isUnlocked = sections.some(sec => window.unlocked.includes(sec));

      if (isUnlocked) {
        link.classList.remove('locked');

        const icon = link.querySelector('.lock-icon');
        if (icon) icon.remove();
      }
    });
}

  function unlockMateri(subSlug) {
    fetch('/perkalian_matriks/unlock', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            sub_materi_slug: subSlug
        })
    });

    // ✅ update frontend TANPA reload
    if (!window.unlocked.includes(subSlug)) {
    window.unlocked.push(subSlug);
}

    // 🔓 buka dot berikutnya langsung
    const dots = document.querySelectorAll('.page-dot');
    const mappingIndex = mapping.indexOf(subSlug);

// 🔥 unlock SEMUA sampai index tersebut (biar konsisten)
dots.forEach((dot, i) => {
    if (i <= mappingIndex) {
        dot.classList.remove('locked');
        dot.onclick = () => showSlide(i);
    }
});

    // 🔓 buka sidebar juga
    // 🔓 update sidebar realtime
syncSidebarUnlock();
}
</script>
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

<script>
    document.addEventListener("DOMContentLoaded", function () {

    const btn = document.getElementById("togglePetunjuk");
    const box = document.getElementById("petunjukMariMencoba");
    const icon = document.getElementById("iconPetunjuk");

    btn.addEventListener("click", function () {

        if (box.style.display === "none" || box.style.display === "") {
            box.style.display = "block";
            icon.classList.remove("bi-chevron-down");
            icon.classList.add("bi-chevron-up");
        } else {
            box.style.display = "none";
            icon.classList.remove("bi-chevron-up");
            icon.classList.add("bi-chevron-down");
        }

    });

});
</script>
</body>
</html>
