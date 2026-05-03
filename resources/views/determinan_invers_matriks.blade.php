<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Determinan dan Invers Matriks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/materi_pengertian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jenis_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kesamaan_dua_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/penjumlahan_pengurangan_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perkalian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/determinan_invers_matriks.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://unpkg.com/mathlive"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
            <section class="materi-slide active" data-section="determinan-1">

                <div class="pengenalan-matriks-header">
                    <h1>Determinan Matriks dan Invers Matriks</h1>
                </div>

                {{-- Tujuan Pembelajaran --}}
                <div class="tujuan-box">
                    <h3 class="tujuan-title">Tujuan Pembelajaran</h3>
                    <ol class="tujuan-list">
                        <li>Peserta didik mampu menentukan determinan matriks berordo 2 × 2 dan 3 × 3 melalui pemberian soal dan contoh matriks dengan benar.</li>
                        <li>Peserta didik mampu menentukan invers matriks melalui latihan soal dan bimbingan langkah penyelesaian dengan tepat.</li>
                    </ol>
                </div>

                {{-- Judul Materi --}}
                <h2 class="materi-title">1. Determinan Matriks</h2>
                <p>
                    Determinan matriks adalah nilai tunggal (bilangan) yang diperoleh dari suatu matriks.
                </p>
                <p>Misalkan matriks</p>
                <div class="text-center my-3 matrix-display-big">
                    \(
                    A =
                    \begin{bmatrix}
                    a_{11} & a_{12} \\
                    a_{21} & a_{22}
                    \end{bmatrix}
                    \)
                </div>
                <p>
                    Maka determinan matriks \( A \) (ditulis sebagai \( |A| \) atau \( \det(A) \)) dapat dihitung dengan cara:
                </p>
                <div class="det-visual">
    <div class="matrix-box-det">
        <span class="bracket left"></span>

        <div class="matrix-det">
    <span>\( a_{11} \)</span>
    <span>\( a_{12} \)</span>
    <span>\( a_{21} \)</span>
    <span>\( a_{22} \)</span>
</div>

        <span class="bracket right"></span>

        <!-- PANAH -->
        <svg class="det-arrows" viewBox="0 0 100 100" preserveAspectRatio="none">
    <defs>
        <!-- panah biru -->
        <marker id="arrowBlue" markerWidth="6" markerHeight="6" refX="5" refY="3" orient="auto">
            <path d="M0,0 L6,3 L0,6 Z" fill="#1c7ed6"/>
        </marker>

        <!-- panah oranye -->
        <marker id="arrowOrange" markerWidth="6" markerHeight="6" refX="5" refY="3" orient="auto">
            <path d="M0,0 L6,3 L0,6 Z" fill="#e8590c"/>
        </marker>
    </defs>

    <!-- diagonal utama (+) -->
    <line x1="15" y1="15" x2="85" y2="85"
          stroke="#1c7ed6" stroke-width="2.5"
          marker-end="url(#arrowBlue)" />

    <!-- diagonal kedua (-) -->
    <line x1="85" y1="15" x2="15" y2="85"
          stroke="#e8590c" stroke-width="2.5"
          marker-end="url(#arrowOrange)" />
</svg>

        <!-- tanda -->
        <div class="det-sign det-plus">(+)</div>
        <div class="det-sign det-minus">(-)</div>
    </div>
</div>
<br>
                <div class="text-center my-3 matrix-display-big">
                    \(
                    \det(A) = a_{11}a_{22} - a_{21}a_{12}
                    \)
                </div>
                <p>Artinya, nilai determinan diperoleh dengan mengalikan elemen diagonal utama, lalu dikurangi hasil kali elemen diagonal kedua.</p>

                <div class="box-masalah">
                    <div class="box-masalah-title">
                        <strong>Sifat – Sifat Determinan Matriks</strong>
                    </div>
                    <div class="box-masalah-content">
                        <ul>
                        <li>
                            Misalkan matriks \( A \) dan \( B \) adalah matriks persegi
                            berordo \( n \times n \), dan \( k \) adalah konstanta,
                            maka berlaku:
                            <ul>
                            <li>
                                \( |AB| = |A| \times |B| \), determinan hasil perkalian
                                dua matriks sama dengan hasil kali determinannya.
                            </li>
                            <li>
                                \( |A^T| = |A| \), determinan matriks tidak berubah
                                jika ditranspos.
                            </li>
                            <li>
                                \( |kA| = k^n |A| \), jika setiap elemen matriks
                                dikalikan dengan \( k \), maka determinannya dikalikan
                                dengan \( k^n \), di mana \( n \) adalah ordo matriks.
                            </li>
                            <li>
                                \( |A^{-1}| = \frac{1}{|A|} \), determinan invers
                                matriks sama dengan kebalikan dari determinan matriks \( A \).
                            </li>
                            </ul>
                        </li>
                        <li>
                            Jika semua elemen matriks \( A \) bernilai nol,
                            maka \( |A| = 0 \).
                        </li>
                        <li>
                            Jika ada dua baris atau dua kolom yang sama persis,
                            maka \( |A| = 0 \).
                        </li>
                        <li>
                            Jika ada satu baris atau kolom yang merupakan kelipatan
                            dari baris atau kolom lain, maka \( |A| = 0 \).
                        </li>
                        </ul>
                    </div>
                    </div>
                    <br>
                    <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('determinan-2')">Selanjutnya</button>
                    </div>
                    </section>


                    <section class="materi-slide" data-section="determinan-2">
                    <p><strong>Contoh:</strong></p>
                    <p>Tentukan nilai determinan matriks</p>
                    <div class="text-center my-3 matrix-display-big">
                        \(
                        A =
                        \begin{bmatrix}
                        6 & -4 \\
                        2 & 5
                        \end{bmatrix}
                        \)
                    </div>
                    <!-- ================= TUTORIAL DETERMINAN MATRIKS ================= -->
                    <div class="matrix-tutorial-stack tutorial-det">
                    <div class="matrix-tutorial-box row-tutorial">
                        <!-- det(A) = -->
                        <div class="matrix-frame matrix-label">
                        \( \det(A) = \)
                        </div>
                        <!-- MATRIX A -->
                        <div class="matrix-frame bracket-frame">
                        <table class="matrix-html matrix-a">
                            <tr>
                            <td data-pos="a11">6</td>
                            <td data-pos="a12">-4</td>
                            </tr>
                            <tr>
                            <td data-pos="a21">2</td>
                            <td data-pos="a22">5</td>
                            </tr>
                        </table>
                        </div>
                        <!-- = -->
                        <div class="matrix-frame matrix-label">
                        \( = \)
                        </div>
                        <!-- PROSES (TANPA KURUNG SIKU) -->
                        <div class="matrix-frame matrix-plain">
                        <span class="res-left"></span>
<span class="res-op"> − </span>
<span class="res-right"></span>

<span class="eq2"> = </span>

<span class="res-left-2"></span>
<span class="res-op-2"> − </span>
<span class="res-right-2"></span>

<span class="eq3"> = </span>

<span class="res-final"></span>
                        </div>
                        <!-- = -->
                        <!-- <div class="matrix-frame matrix-label">
                        \( = \)
                        </div> -->
                        <!-- HASIL AKHIR (POLOS) -->
                        <div class="matrix-frame matrix-plain">
                        <span class="final-result"></span>
                        </div>
                    </div>
                    </div>
                    <!-- TOMBOL -->
                    <div class="matrix-step-controls">
                    <button id="btnPrevDet" class="btn btn-outline-secondary" disabled>Sebelumnya</button>
                    <button id="btnMainDet" class="btn btn-success">Mulai</button>
                    </div>
                    <!-- PENJELASAN -->
                    <div class="matrix-explanation" id="detExplanation">
                    Tekan <b>Mulai</b> untuk melihat langkah penyelesaian determinan
                    </div>
                    <br>
                    <p>Kita juga bisa menghitung nilai determinan matriks menggunakan metode Sarrus atau metode ekspansi kofaktor.</p>
                    <br>
                    <div class="slide-nav mt-4 text-end">
                        <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                        <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('determinan-3')">Selanjutnya</button>
                    </div>
                    </section>




                    <section class="materi-slide" data-section="determinan-3">
                        <h4 class="materi-subtitle">
                            ▶ Metode Sarrus
                        </h4>
                        <p>
                            Cara menghitung determinan matriks dengan <strong>Metode Sarrus</strong>
                            yaitu dengan menyalin kembali dua kolom pertama matriks ke sisi kanan matriks.
                            Selanjutnya, nilai determinan diperoleh dengan menjumlahkan hasil
                            perkalian elemen-elemen pada tiga diagonal utama, lalu mengurangkan
                            hasil perkalian elemen-elemen pada tiga diagonal sekunder,
                            seperti pada contoh berikut.
                        </p>
                        <div class="text-center my-3 matrix-display-big">
                            \(
                            A =
                            \begin{bmatrix}
                                a_{11} & a_{12} & a_{13} \\
                                a_{21} & a_{22} & a_{23} \\
                                a_{31} & a_{32} & a_{33}
                            \end{bmatrix}
                            \)
                        </div>
                        <p>
                            maka determinan matriks \( A \) adalah:
                        </p>

                        <!-- MathJax -->
                        <script>
                        window.MathJax = {
                          tex: { inlineMath: [['$', '$'], ['\\(', '\\)']] }
                        };
                        </script>
                        <!-- <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-chtml.js"></script> -->
                        <br>
                        <div class="sarrus-wrapper">
                          <!-- ===== MATRKS KIRI (TANPA PANAH) ===== -->
                          <div class="matrix-left">
                            $$
                            \begin{bmatrix}
                            a_{11} & a_{12} & a_{13} \\
                            a_{21} & a_{22} & a_{23} \\
                            a_{31} & a_{32} & a_{33}
                            \end{bmatrix}
                            $$
                          </div>
                          <div class="equals">=</div>
                          <!-- ===== MATRKS KANAN (PANAH DI SINI SAJA) ===== -->
                          <div class="matrix-right">
                            <!-- 3x3 PAKAI KURUNG -->
                            <span class="main-matrix">
                              $$
                              \begin{vmatrix}
                              a_{11} & a_{12} & a_{13} \\
                              a_{21} & a_{22} & a_{23} \\
                              a_{31} & a_{32} & a_{33}
                              \end{vmatrix}
                              $$
                            </span>
                            <!-- 2 KOLOM TAMBAHAN TANPA KURUNG -->
                            <span class="dup-matrix">
                              $$
                              \begin{matrix}
                              a_{11} & a_{12} \\
                              a_{21} & a_{22} \\
                              a_{31} & a_{32}
                              \end{matrix}
                              $$
                            </span>
                            <!-- ===== PANAH (HANYA UNTUK MATRKS KANAN) ===== -->
                            <svg class="sarrus-arrows"
     viewBox="0 0 560 260"
     preserveAspectRatio="none">

  <defs>
    <!-- PANAH LEBIH KECIL & OFFSET -->
    <marker id="arrowPlus" markerWidth="7" markerHeight="7"
            refX="5" refY="3.5" orient="auto">
      <path d="M0,0 L7,3.5 L0,7 Z" fill="#1c7ed6"/>
    </marker>

    <marker id="arrowMinus" markerWidth="7" markerHeight="7"
            refX="5" refY="3.5" orient="auto">
      <path d="M0,0 L7,3.5 L0,7 Z" fill="#e8590c"/>
    </marker>
  </defs>

  <!-- (+) diagonal utama (GESER KIRI + DIPENDEKKAN) -->
  <!-- (+) diagonal utama -->
<!-- (+) diagonal utama -->
<line x1="10"  y1="30" x2="325" y2="250"
      class="plus" marker-end="url(#arrowPlus)"/>

<line x1="120" y1="30" x2="430" y2="250"
      class="plus" marker-end="url(#arrowPlus)"/>

<line x1="220" y1="30" x2="550" y2="250"
      class="plus" marker-end="url(#arrowPlus)"/>


<!-- (-) diagonal sekunder -->
<line x1="340" y1="30" x2="10"  y2="250"
      class="minus" marker-end="url(#arrowMinus)"/>

<line x1="430" y1="30" x2="110" y2="250"
      class="minus" marker-end="url(#arrowMinus)"/>

<line x1="530" y1="30" x2="210" y2="250"
      class="minus" marker-end="url(#arrowMinus)"/>

</svg>
                            <br>
                            <!-- tanda -->
                            <div class="signs bottom">
    <span>(-)</span>
    <span>(-)</span>
    <span>(-)</span>
    <span style="margin-left:-15px;">(+)</span>
    <span>(+)</span>
    <span>(+)</span>
</div>
                            <!-- <div class="signs bottom">
                              <span>(+)</span><span>(+)</span><span>(+)</span>
                            </div> -->
                          </div>
                        </div>
                        <br>
                        <br>
                        <div class="text-center my-3 matrix-display-big">
                          $$
                          =\; a_{11}a_{22}a_{33}
                          + a_{12}a_{23}a_{31}
                          + a_{13}a_{21}a_{32}
                          - a_{31}a_{22}a_{13}
                          - a_{32}a_{23}a_{11}
                          - a_{33}a_{21}a_{12}
                          $$
                        </div>
                        <p><strong>Catatan:</strong> Metode Sarrus digunakan untuk menentukan determinan matriks berordo 3 × 3. Metode ini ditemukan oleh matematikawan Prancis bernama Pierre Frédéric Sarrus.</p>
                        <br>
                        <br>
                        <div class="slide-nav mt-4 text-end">
                            <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                            <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('determinan-4')">Selanjutnya</button>
                        </div>
                        </section>




                        <section class="materi-slide" data-section="determinan-4">
                        <h4 class="materi-subtitle">
                            ▶ Metode Ekspansi Kofaktor
                        </h4>
                        <p>
                          Jika <span>\( A \)</span> merupakan matriks persegi, maka minor elemen
                          <span>\( a_{ij} \)</span> (ditulis <span>\( M_{ij} \)</span>) adalah determinan
                          dari matriks baru yang diperoleh dengan menghapus baris ke-<span>\( i \)</span>
                          dan kolom ke-<span>\( j \)</span> dari matriks <span>\( A \)</span>.
                          Sedangkan kofaktor elemen pada baris ke-<span>\( i \)</span> dan kolom ke-<span>\( j \)</span>
                          (ditulis <span>\( K_{ij} \)</span>) dihitung dengan rumus:
                        </p>
                        <div class="text-center my-3 matrix-display-big">
                          \(
                          K_{ij} = (-1)^{\,i+j} \, M_{ij}
                          \)
                        </div>
                        <p>Artinya, kofaktor diperoleh dari minor yang dikalikan dengan tanda positif atau negatif bergantung pada posisi elemennya.</p>
                        <p>
                          Misalkan <span>\( A \)</span> adalah matriks berordo
                          <span>\( 3 \times 3 \)</span>.
                          Minor <span>\( a_{22} \)</span> diperoleh dengan menghilangkan elemen pada baris kedua dan kolom kedua.
                        </p>
                        <!-- MathJax -->
                        <div class="minor-visual-wrapper">
                          <!-- Matriks kiri -->
                          <div class="matrix-block">
                            <div class="matrix-box">
                              <div class="bracket left"></div>
                              <div class="matrix-wrap">
                                <span>\(a_{11}\)</span>
                                <span class="hl">\(a_{12}\)</span>
                                <span>\(a_{13}\)</span>
                                <span class="hl">\(a_{21}\)</span>
                                <span class="hl">\(a_{22}\)</span>
                                <span class="hl">\(a_{23}\)</span>
                                <span>\(a_{31}\)</span>
                                <span class="hl">\(a_{32}\)</span>
                                <span>\(a_{33}\)</span>
                              </div>
                              <div class="bracket right"></div>
                            </div>
                            <!-- Panah -->
                            <div class="arrow">↓</div>
                            <!-- Keterangan -->
                            <div class="note">
                              Baris kedua dan<br>
                              kolom kedua<br>
                              dihilangkan
                            </div>
                          </div>
                          <!-- Teks + matriks hasil -->
                          <div class="result-block">
                            <p class="result-text">
                              maka \( M_{22} = \)
                            </p>
                            <div class="matrix result">
                              $$
                              \begin{vmatrix}
                              a_{11} & a_{13} \\
                              a_{31} & a_{33}
                              \end{vmatrix}
                              $$
                            </div>
                          </div>
                        </div>
                        <p>
                          Kofaktor elemen <span>\( a_{22} \)</span> adalah <span>\( k_{22} = (-1)^{2+2} \, M_{22} = M_{22} \)</span>.
                        </p>
                        <p>
                          Kofaktor elemen <span>\( a_{23} \)</span> adalah <span>\( k_{23} = (-1)^{2+3} \, M_{23} = -M_{23} \)</span>.
                        </p>
                        <p>Matriks kofaktor \( A \): </p>
                        <div class="text-center my-3 matrix-display-big">
                          \(
                          K(A) =
                          \begin{bmatrix}
                          +M_{11} & -M_{12} & +M_{13} \\
                          -M_{21} & +M_{22} & -M_{23} \\
                          +M_{31} & -M_{32} & +M_{33}
                          \end{bmatrix}
                          \)
                        </div>
                        <div class="kofaktor-wrapper">

    <!-- KOFATOR + KURUNG -->
    <div class="kofaktor-box">
        <span class="bracket left"></span>

        <div class="kofaktor-matrix">
            <span class="kofaktor" data-row="1" data-col="1">+M₁₁</span>
            <span class="kofaktor" data-row="1" data-col="2">−M₁₂</span>
            <span class="kofaktor" data-row="1" data-col="3">+M₁₃</span>

            <span class="kofaktor" data-row="2" data-col="1">−M₂₁</span>
            <span class="kofaktor" data-row="2" data-col="2">+M₂₂</span>
            <span class="kofaktor" data-row="2" data-col="3">−M₂₃</span>

            <span class="kofaktor" data-row="3" data-col="1">+M₃₁</span>
            <span class="kofaktor" data-row="3" data-col="2">−M₃₂</span>
            <span class="kofaktor" data-row="3" data-col="3">+M₃₃</span>
        </div>

        <span class="bracket right"></span>
    </div>

    <!-- PANAH -->
    <div class="arrow-mid">→</div>

    <!-- MATRIX MINOR -->
    <div class="minor-anim" id="minorBox">
        <div class="minor-grid">
            <span data-r="1" data-c="1">a₁₁</span>
            <span data-r="1" data-c="2">a₁₂</span>
            <span data-r="1" data-c="3">a₁₃</span>

            <span data-r="2" data-c="1">a₂₁</span>
            <span data-r="2" data-c="2">a₂₂</span>
            <span data-r="2" data-c="3">a₂₃</span>

            <span data-r="3" data-c="1">a₃₁</span>
            <span data-r="3" data-c="2">a₃₂</span>
            <span data-r="3" data-c="3">a₃₃</span>
        </div>
        
    </div>
    <div class="minor-info" id="minorInfo">
    Klik salah satu kofaktor di matriks \(A\) untuk melihat penjelasan
</div>

</div>
                        <br>
                        <div class="slide-nav mt-4 text-end">
                            <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                            <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('determinan-5')">Selanjutnya</button>
                        </div>
                        </section>




                        <section class="materi-slide" data-section="determinan-5">
                          <p><strong>Contoh 1:</strong></p>
                          <p>Tentukan determinan matriks <span>\( Q = \)</span></p>
                          <p class="text-center my-3 matrix-display-big">
                            \(
                            Q =
                            \begin{bmatrix}
                            2 & 4 & 1 \\
                            3 & 5 & 2 \\
                            6 & 7 & 3
                            \end{bmatrix}
                            \)
                          </p>
                          <p><strong>Alternatif Penyelesaian I:</strong></p>
                          <p>Determinan matriks \( Q \) dengan Metode <strong>Sarrus.</strong></p>

                          <!-- ================= TUTORIAL DETERMINAN 3x3 (SARRUS) ================= -->
                          <div class="matrix-tutorial-stack tutorial-det3">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">|Q| =</div>
                              <!-- MATRKS UTAMA -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-q">
                                  <tr>
                                    <td data-pos="q11">2</td>
                                    <td data-pos="q12">4</td>
                                    <td data-pos="q13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q21">3</td>
                                    <td data-pos="q22">5</td>
                                    <td data-pos="q23">2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q31">6</td>
                                    <td data-pos="q32">7</td>
                                    <td data-pos="q33">3</td>
                                  </tr>
                                </table>
                              </div>
                              <!-- DUPLIKASI 2 KOLOM -->
                              <table class="matrix-html matrix-dup">
                                <tr><td data-pos="d11">2</td><td data-pos="d12">4</td></tr>
                                <tr><td data-pos="d21">3</td><td data-pos="d22">5</td></tr>
                                <tr><td data-pos="d31">6</td><td data-pos="d32">7</td></tr>
                              </table>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- BARIS EKSPRESI -->
                          <div class="matrix-frame matrix-plain det-line det-exp">
                            <span class="slot"></span>
                            <span class="sign plus">+</span>
                            <span class="slot"></span>
                            <span class="sign plus">+</span>
                            <span class="slot"></span>
                            <span class="sign minus">−</span>
                            <span class="slot"></span>
                            <span class="sign minus">−</span>
                            <span class="slot"></span>
                            <span class="sign minus">−</span>
                            <span class="slot"></span>
                          </div>
                          <div class="matrix-frame matrix-label">=</div>
                          <!-- BARIS NILAI -->
                          <div class="matrix-frame matrix-plain det-line det-val">
                            <span class="slot"></span>
                            <span class="sign plus">+</span>
                            <span class="slot"></span>
                            <span class="sign plus">+</span>
                            <span class="slot"></span>
                            <span class="sign minus">−</span>
                            <span class="slot"></span>
                            <span class="sign minus">−</span>
                            <span class="slot"></span>
                            <span class="sign minus">−</span>
                            <span class="slot"></span>
                          </div>
                          <div class="matrix-frame matrix-label">=</div>
                          <div class="matrix-frame matrix-plain det-line det-final">
                            <span class="final-slot"></span>
                          </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevDet3" class="btn btn-outline-secondary" disabled>Sebelumnya</button>
                            <button id="btnMainDet3" class="btn btn-success">Mulai</button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="det3Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>Jadi, determinan matriks \( Q \) adalah 5.</p>
                          <br>
                        <div class="slide-nav mt-4 text-end">
                            <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                            <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('determinan-6')">Selanjutnya</button>
                        </div>
                        </section>




                        <section class="materi-slide" data-section="determinan-6">
                          <p><strong>Alternatif Penyelesaian II:</strong></p>
                          <p>Kita akan menggunakan ekspansi kofaktor baris pertama untuk menentukan determinan matriks \( Q \)</p>
                          <div class="text-center my-3 matrix-display-big">
                              \(
                              Q =
                              \begin{bmatrix}
                              2 & 4 & 1 \\
                              3 & 5 & 2 \\
                              6 & 7 & 3
                              \end{bmatrix}
                              \)
                          </div>
                          <ol>
                            <li>
                              Tentukan elemen baris pertama:<br>\( a_{11} = 2,\; a_{12} = 4,\; a_{13} = 1 \)
                            </li>
                            <li>
                              Hitung minor dan kofaktornya:<br>Minor \( M_{11} \) :<br>Hilangkan baris ke-1 dan kolom ke-1
                            <!-- </li> -->
                          

                          <!-- ================= TUTORIAL EKSPANSI KOFAKTOR ================= -->
                          <div class="matrix-tutorial-stack tutorial-det-cofactor">
                            <div class="matrix-tutorial-box row-tutorial">
                              <!-- LABEL -->
                              <div class="matrix-frame matrix-label">
                                \( Q = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-q">
                                  <tr>
                                    <td data-pos="q11">2</td>
                                    <td data-pos="q12">4</td>
                                    <td data-pos="q13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q21">3</td>
                                    <td data-pos="q22">5</td>
                                    <td data-pos="q23">2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q31">6</td>
                                    <td data-pos="q32">7</td>
                                    <td data-pos="q33">3</td>
                                  </tr>
                                </table>
                              </div>
                              <!-- TANDA SAMA DENGAN -->
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">5</td>
                                    <td data-pos="m12">2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">7</td>
                                    <td data-pos="m22">3</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="exp1"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="exp2"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="val1"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="val2"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL AKHIR -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalResult"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevCof" class="btn btn-outline-secondary" disabled>Sebelumnya</button>
                            <button id="btnMainCof" class="btn btn-success">Mulai</button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="cofExplanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>Kofaktor \( C_{11} = (-1)^{1+1} M_{11} = (-1) \cdot 1 = 1\)</p>
                          </li>
                          <br>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('determinan-7')">Selanjutnya</button>
                          </div>
                        </section>




                        <section class="materi-slide" data-section="determinan-7">
                          <p>Minor \( M_{12} \) :</p>
                          <p>Hilangkan baris ke-1 dan kolom ke-2:</p>
                          <!-- ================= TUTORIAL EKSPANSI KOFAKTOR (M12) ================= -->
                          <div class="matrix-tutorial-stack tutorial-det-cofactor cof-m12">
                            <div class="matrix-tutorial-box row-tutorial">
                              <!-- LABEL -->
                              <div class="matrix-frame matrix-label">
                                \( Q = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-q">
                                  <tr>
                                    <td data-pos="q11">2</td>
                                    <td data-pos="q12">4</td>
                                    <td data-pos="q13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q21">3</td>
                                    <td data-pos="q22">5</td>
                                    <td data-pos="q23">2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q31">6</td>
                                    <td data-pos="q32">7</td>
                                    <td data-pos="q33">3</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">3</td>
                                    <td data-pos="m12">2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">6</td>
                                    <td data-pos="m22">3</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="exp1_m12"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="exp2_m12"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="val1_m12"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="val2_m12"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="final_m12"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevM12" class="btn btn-outline-secondary" disabled>Sebelumnya</button>
                            <button id="btnMainM12" class="btn btn-success">Mulai</button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="expM12">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>

                          <p>Kofaktor \( C_{12} = (-1)^{1+2} M_{12} = (-1) \cdot (-3) = 3 \)</p>
                          <br>
                          <p>Minor \( M_{13} \) :</p>
                          <p>Hilangkan baris ke-1 dan kolom ke-3:</p>
                          <!-- ================= TUTORIAL EKSPANSI KOFAKTOR (M13) ================= -->
                          <div class="matrix-tutorial-stack tutorial-det-cofactor cof-m13">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( Q = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-q">
                                  <tr>
                                    <td data-pos="q11">2</td>
                                    <td data-pos="q12">4</td>
                                    <td data-pos="q13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q21">3</td>
                                    <td data-pos="q22">5</td>
                                    <td data-pos="q23">2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="q31">6</td>
                                    <td data-pos="q32">7</td>
                                    <td data-pos="q33">3</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">3</td>
                                    <td data-pos="m12">5</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">6</td>
                                    <td data-pos="m22">7</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="exp1_m13"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="exp2_m13"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="val1_m13"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="val2_m13"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="final_m13"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevM13" class="btn btn-outline-secondary" disabled>Sebelumnya</button>
                            <button id="btnMainM13" class="btn btn-success">Mulai</button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="expM13">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>Kofaktor \( C_{13} = (-1)^{1+3} M_{13} = (1) \cdot (-9) = -9 \)</p>



                          <ol start="3">
                            <li>
                              Substitusikan ke rumus ekspansi<br>
                              \( |Q| = a_{11} \cdot C_{11} + a_{12} \cdot C_{12} + a_{13} \cdot C_{13} \)<br>
                              \( |Q| = (2)(1) + (4)(3) + (1)(-9) \)<br>
                              \( |Q| = 2 + 12 - 9 = 5 \)<br>
                              <p><strong>Jadi, determinan matriks Q dengan metode ekspansi kofaktor adalah 5.</strong></p>
                              

                            </li>
                          </ol>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-1')">Selanjutnya</button>
                          </div>
                        </section>




                         <section class="materi-slide active" data-section="invers-1">
                          {{-- Judul Materi --}}
                          <h2 class="materi-title">2. Invers Matriks</h2>
                          <p>
                            Dalam himpunan bilangan real, setiap bilangan \( a \) (selain nol) memiliki kebalikan atau invers,
                            yaitu \( a^{-1} \), yang memenuhi sifat \( a \times a^{-1} = a^{-1} \times a = 1 \).
                            Dengan mengacu pada konsep tersebut, invers matriks dapat didefinisikan secara serupa seperti invers pada bilangan real.
                          </p>
                          <p>
                            Jika \( A \) adalah matriks persegi berordo \( n \times n \) dan \( I \) merupakan matriks
                            identitas dengan ordo yang sama, maka akan ada matriks lain, yaitu \( A^{-1} \), yang memenuhi hubungan:
                          </p>
                          <div class="text-center my-3 matrix-display-big">
                              \(
                              A \cdot A^{-1} = A^{-1} \cdot A = I
                              \)
                          </div>
                          <p>
                            Matriks \( A \) disebut matriks nonsingular, sedangkan \( A^{-1} \) disebut invers dari
                            matriks \( A \). Apabila matriks \( A^{-1} \) tidak ada atau tidak dapat dihitung,
                            maka matriks \( A \) disebut matriks singular.
                          </p>
                          <div class="box-masalah">
                            <div class="box-masalah-title">
                                <strong>Invers Matriks Berordo 2 × 2</strong>
                            </div>

                            <div class="box-masalah-content">
                                <p>
                                    Matriks
                                    \(
                                    A =
                                    \begin{bmatrix}
                                    a_{11} & a_{12} \\
                                    a_{21} & a_{22}
                                    \end{bmatrix}
                                    \)
                                    memiliki invers jika dan hanya jika
                                </p>

                                <p>
                                    \( |A| = a_{11}a_{22} - a_{21}a_{12} \neq 0 \).
                                    Invers matriks \( A \) dapat ditentukan sebagai berikut.
                                </p>

                                <div class="text-center my-3 matrix-display-big">
                                    \[
                                    A^{-1} = \frac{1}{|A|}\,\textit{Adjoint}(A)
                                    \]
                                </div>
                            </div>
                        </div>
                        <br>
                        <p>
                          Dengan \( |A| = a_{11}a_{22} - a_{21}a_{12} \) dan
                          \( \textit{Adjoint}(A) =
                          \begin{bmatrix}
                          a_{22} & -a_{12} \\
                          -a_{21} & a_{11}
                          \end{bmatrix}
                          \)
                        </p>
                        <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-2')">Selanjutnya</button>
                        </div>
                        </section>




                        <section class="materi-slide" data-section="invers-2">
                          <p><strong>Contoh:</strong></p>
                          <p>Tentukan invers dari matriks </p>
                          <div class="text-center my-3 matrix-display-big">
                              \(
                              A =
                              \begin{bmatrix}
                              4 & -5 \\
                              2 & 3
                              \end{bmatrix}
                              \)
                          </div>
                          <p><strong>Alternatif Penyelesaian:</strong></p>
                          <ol>
                            <li>
                              Cari determinan matriks \( A \) untuk mencari \( \textit{Adjoin} \).
                            </li>

                            <!-- ================= TUTORIAL DETERMINAN MATRIKS 2 ================= -->
                            <div class="matrix-tutorial-stack tutorial-det-2">
                              <div class="matrix-tutorial-box row-tutorial">
                                <div class="matrix-frame matrix-label">
                                  \( \det(A) = \)
                                </div>
                                <div class="matrix-frame bracket-frame">
                                  <table class="matrix-html matrix-a">
                                    <tr>
                                      <td data-pos="a11">4</td>
                                      <td data-pos="a12">-5</td>
                                    </tr>
                                    <tr>
                                      <td data-pos="a21">2</td>
                                      <td data-pos="a22">3</td>
                                    </tr>
                                  </table>
                                </div>
                                <div class="matrix-frame matrix-label">\( = \)</div>
                                <div class="matrix-frame matrix-plain">
  <span class="res-left"></span>
  <span class="res-op"> − </span>
  <span class="res-right"></span>

  <span class="eq2"> = </span>

  <span class="res-left-2"></span>
  <span class="res-op-2"> − </span>
  <span class="res-right-2"></span>

  <span class="eq3"> = </span>

  <span class="res-final"></span>
</div>
                              </div>
                            </div>
                            <!-- TOMBOL -->
                            <div class="matrix-step-controls">
                              <button id="btnPrevDet2" class="btn btn-outline-secondary" disabled>
                                Sebelumnya
                              </button>
                              <button id="btnMainDet2" class="btn btn-success">
                                Mulai
                              </button>
                            </div>
                            <!-- PENJELASAN -->
                            <div class="matrix-explanation" id="detExplanation2">
                              Tekan <b>Mulai</b> untuk melihat langkah penyelesaian determinan
                            </div>

                            <li>
                              <p>Cari \( \textit{Adjoint}(A) \) untuk matriks \( 2 \times 2 \):</p>
                              
                                <div class="matrix-display-big adjoint-block">
  $$
  \begin{aligned}
  \textit{Adjoint}(A) &= 
  \begin{bmatrix}
  a_{22} & -a_{12} \\
  -a_{21} & a_{11}
  \end{bmatrix}
  \Rightarrow
  \begin{bmatrix}
  3 & 5 \\
  -2 & 4
  \end{bmatrix}
  \end{aligned}
  $$
</div>
                              
                              <P>Maka invers dari \( A \) adalah:</P>
                              <p>
                                \( A^{-1} = \frac{1}{|A|}\,\textit{Adjoint}(A) \)
                              </p>
                              <p>
                                \( A^{-1} = \frac{1}{|22|}
                                \begin{bmatrix}
                                3 & 5 \\
                                -2 & 4
                                \end{bmatrix}
                                \)
                              </p>
                              <p><strong>Jadi, invers matriks A adalah:</strong></p>
                              <div class="matrix-display-big">
                                \[
                                A^{-1} =
                                \begin{bmatrix}
                                \dfrac{3}{22} & \dfrac{5}{22} \\
                                -\dfrac{1}{11} & \dfrac{2}{11}
                                \end{bmatrix}
                                \]
                              </div>
                            </li>
                          </ol>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-3')">Selanjutnya</button>
                          </div>
                        </section>




                        <section class="materi-slide" data-section="invers-3">
                          <div class="box-masalah">
                            <div class="box-masalah-title">
                                <strong>Invers Matriks Berordo 3 × 3</strong>
                            </div>
                            <div class="box-masalah-content">
                                <p>
                                    Matriks
                                    \(
                                    A =
                                    \begin{bmatrix}
                                    a_{11} & a_{12} & a_{13} \\
                                    a_{21} & a_{22} & a_{23} \\
                                    a_{31} & a_{32} & a_{33}
                                    \end{bmatrix}
                                    \)
                                    memiliki invers jika dan hanya jika \( |A| \neq 0 \).
                                </p>
                                <p>
                                    Jadi, invers matriks \( A \) dapat ditentukan sebagai berikut.
                                </p>
                                <div class="text-center my-3 matrix-display-big">
                                    \[
                                    A^{-1} = \frac{1}{|A|}\,\textit{Adjoint}(A)
                                    \]
                                </div>
                                <p>
                                    Determinan matriks \( A \) dapat ditentukan dengan Metode Sarrus atau Metode Ekspansi Kofaktor
                                </p>
                            </div>
                        </div>
                        <br>
                        <p>
                          Untuk mencari invers matriks berordo 3×3 maka menggunakan Ekspansi Kofaktor Minor. Adapun \( \textit{Adjoint}(A) \) dapat ditentukan dengan
                          transpos dari matriks kofaktor.
                        </p>
                        <p><strong>Contoh :</strong></p>
                        <p>Tentukan invers dari matriks</p>
                        <div class="text-center my-3 matrix-display-big">
                              \(
                              P =
                              \begin{bmatrix}
                              3 & -2 & 1 \\
                              4 & 1 & -3 \\
                              2 & 0 & 1
                              \end{bmatrix}
                              \)
                        </div>
                        <div class="slide-nav mt-4 text-end">
                            <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                            <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-4')">Selanjutnya</button>
                        </div>
                        </section>




                        <section class="materi-slide" data-section="invers-4">
                          <p><strong>Alternatif Penyelesaian:</strong></p>
                          <ol>
                            <li>
                              Cari determinan matriks \( P \) :
                              <!-- ================= TUTORIAL DETERMINAN 3x3 (INVERS MATRIKS) ================= -->
                              <div class="matrix-tutorial-stack tutorial-det3x3-sarrus">
                                <div class="matrix-tutorial-box row-tutorial">
                                  <div class="matrix-frame matrix-label">|P| =</div>
                                  <!-- MATRKS UTAMA -->
                                  <div class="matrix-frame bracket-frame">
                                    <table class="matrix-html matrix-q">
                                      <tr>
                                        <td data-pos="q11">3</td>
                                        <td data-pos="q12">-2</td>
                                        <td data-pos="q13">1</td>
                                      </tr>
                                      <tr>
                                        <td data-pos="q21">4</td>
                                        <td data-pos="q22">1</td>
                                        <td data-pos="q23">-3</td>
                                      </tr>
                                      <tr>
                                        <td data-pos="q31">2</td>
                                        <td data-pos="q32">0</td>
                                        <td data-pos="q33">1</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <!-- DUPLIKASI -->
                                  <table class="matrix-html matrix-dup">
                                    <tr><td data-pos="d11">3</td><td data-pos="d12">-2</td></tr>
                                    <tr><td data-pos="d21">4</td><td data-pos="d22">1</td></tr>
                                    <tr><td data-pos="d31">2</td><td data-pos="d32">0</td></tr>
                                  </table>
                                  <div class="matrix-frame matrix-label">=</div>
                                  <div class="matrix-frame matrix-plain det-line det-exp">
                                    <span class="slot"></span><span class="sign plus">+</span>
                                    <span class="slot"></span><span class="sign plus">+</span>
                                    <span class="slot"></span><span class="sign minus">−</span>
                                    <span class="slot"></span><span class="sign minus">−</span>
                                    <span class="slot"></span><span class="sign minus">−</span>
                                    <span class="slot"></span>
                                  </div>
                                  <div class="matrix-frame matrix-label">=</div>
                                  <div class="matrix-frame matrix-plain det-line det-val">
                                    <span class="slot"></span><span class="sign plus">+</span>
                                    <span class="slot"></span><span class="sign plus">+</span>
                                    <span class="slot"></span><span class="sign minus">−</span>
                                    <span class="slot"></span><span class="sign minus">−</span>
                                    <span class="slot"></span><span class="sign minus">−</span>
                                    <span class="slot"></span>
                                  </div>
                                  <div class="matrix-frame matrix-label">=</div>
                                  <div class="matrix-frame matrix-plain det-line det-final">
                                    <span class="final-slot"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="matrix-step-controls">
                                <button id="btnPrevDet3x3" class="btn btn-outline-secondary" disabled>Sebelumnya</button>
                                <button id="btnMainDet3x3" class="btn btn-success">Mulai</button>
                              </div>
                              <div class="matrix-explanation" id="det3x3Explanation">
                                Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                              </div>


                            </li>
                            <li>
                              Hitung minor dan kofaktornya:<br>Matriks kofaktor \( P \): <br>
                              <div class="text-center my-3 matrix-display-big">
                                  \(
                                  K(P) =
                                  \begin{bmatrix}
                                  +M_{11} & -M_{12} & +M_{13} \\
                                  -M_{21} & +M_{22} & -M_{23} \\
                                  +M_{31} & -M_{32} & +M_{33}
                                  \end{bmatrix}
                                  \)
                              </div> <br>Minor \( M_{11} \) :<br>Hilangkan baris ke-1 dan kolom ke-1<br>
                              <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M11 ================= -->
                              <div class="matrix-tutorial-stack tutorial-invers-cof-m11">
                                <div class="matrix-tutorial-box row-tutorial">
                                  <!-- LABEL -->
                                  <div class="matrix-frame matrix-label">
                                    \( P = \)
                                  </div>
                                  <!-- MATRIX 3x3 -->
                                  <div class="matrix-frame bracket-frame">
                                    <table class="matrix-html matrix-p">
                                      <tr>
                                        <td data-pos="p11">3</td>
                                        <td data-pos="p12">-2</td>
                                        <td data-pos="p13">1</td>
                                      </tr>
                                      <tr>
                                        <td data-pos="p21">4</td>
                                        <td data-pos="p22">1</td>
                                        <td data-pos="p23">-3</td>
                                      </tr>
                                      <tr>
                                        <td data-pos="p31">2</td>
                                        <td data-pos="p32">0</td>
                                        <td data-pos="p33">1</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="matrix-frame matrix-label">=</div>
                                  <!-- MATRIX 2x2 (MINOR M11) -->
                                  <div class="matrix-frame bracket-frame">
                                    <table class="matrix-html matrix-2x2">
                                      <tr>
                                        <td data-pos="m11">1</td>
                                        <td data-pos="m12">-3</td>
                                      </tr>
                                      <tr>
                                        <td data-pos="m21">0</td>
                                        <td data-pos="m22">1</td>
                                      </tr>
                                    </table>
                                  </div>
                                  <div class="matrix-frame matrix-label">=</div>
                                  <!-- EKSPRESI -->
                                  <div class="matrix-frame matrix-plain det-line det-exp">
                                    <span class="slot" id="expM11a"></span>
                                    <span class="sign minus">−</span>
                                    <span class="slot" id="expM11b"></span>
                                  </div>
                                  <div class="matrix-frame matrix-label">=</div>
                                  <!-- NILAI -->
                                  <div class="matrix-frame matrix-plain det-line det-val">
                                    <span class="slot" id="valM11a"></span>
                                    <span class="sign minus">−</span>
                                    <span class="slot" id="valM11b"></span>
                                  </div>
                                  <div class="matrix-frame matrix-label">=</div>
                                  <!-- HASIL -->
                                  <div class="matrix-frame matrix-plain det-line det-final">
                                    <span class="final-slot" id="finalM11"></span>
                                  </div>
                                </div>
                              </div>
                              <!-- TOMBOL -->
                              <div class="matrix-step-controls">
                                <button id="btnPrevInvM11" class="btn btn-outline-secondary" disabled>
                                  Sebelumnya
                                </button>
                                <button id="btnMainInvM11" class="btn btn-success">
                                  Mulai
                                </button>
                              </div>
                              <!-- PENJELASAN -->
                              <div class="matrix-explanation" id="invM11Explanation">
                                Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                              </div>
                              <p>Kofaktor \( C_{11} = (-1)^{1+1} M_{11} = 1 \cdot 1 = 1\)</p>
                            </li>
                          </ol>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-5')">Selanjutnya</button>
                          </div>
                        </section>



                        <section class="materi-slide" data-section="invers-5">
                          <p>Minor \( M_{12} \) :</p>
                          <p>Hilangkan baris ke-1 dan kolom ke-2:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M12 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m12">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M12) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">4</td>
                                    <td data-pos="m12">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">2</td>
                                    <td data-pos="m22">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM12a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM12b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM12a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM12b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM12"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM12" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM12" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM12Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{12} = (-1)^{1+2} M_{12} = (-1) \cdot 10 = -10 \)
                          </p>
                          <br>
                          <p>Minor \( M_{13} \) :</p>
                          <p>Hilangkan baris ke-1 dan kolom ke-3:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M13 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m13">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M13) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">4</td>
                                    <td data-pos="m12">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">2</td>
                                    <td data-pos="m22">0</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM13a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM13b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM13a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM13b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM13"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM13" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM13" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM13Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{13} = (-1)^{1+3} M_{13} = 1 \cdot (-2) = -2 \)
                          </p>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-6')">Selanjutnya</button>
                          </div>
                        </section>



                        <section class="materi-slide" data-section="invers-6">
                          <p>Minor \( M_{21} \) :</p>
                          <p>Hilangkan baris ke-2 dan kolom ke-1:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M21 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m21">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M21) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">-2</td>
                                    <td data-pos="m12">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">0</td>
                                    <td data-pos="m22">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM21a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM21b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM21a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM21b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM21"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM21" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM21" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM21Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{21} = (-1)^{2+1} M_{21} = (-1) \cdot (-2) = 2 \)
                          </p>
                          <br>
                          <p>Minor \( M_{22} \) :</p>
                          <p>Hilangkan baris ke-2 dan kolom ke-2:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M22 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m22">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M22) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">3</td>
                                    <td data-pos="m12">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">2</td>
                                    <td data-pos="m22">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM22a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM22b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM22a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM22b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM22"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM22" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM22" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM22Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{22} = (-1)^{2+2} M_{22} = 1 \cdot 1 = 1 \)
                          </p>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-7')">Selanjutnya</button>
                          </div>
                        </section>



                        <section class="materi-slide" data-section="invers-7">
                          <p>Minor \( M_{23} \) :</p>
                          <p>Hilangkan baris ke-2 dan kolom ke-3:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M23 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m23">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M23) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">3</td>
                                    <td data-pos="m12">-2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">2</td>
                                    <td data-pos="m22">0</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM23a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM23b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM23a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM23b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM23"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM23" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM23" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM23Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{23} = (-1)^{2+3} M_{23} = (-1) \cdot 4 = -4 \)
                          </p>
                          <br>
                          <p>Minor \( M_{31} \) :</p>
                          <p>Hilangkan baris ke-3 dan kolom ke-1:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M31 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m31">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M31) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">-2</td>
                                    <td data-pos="m12">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">1</td>
                                    <td data-pos="m22">-3</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM31a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM31b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM31a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM31b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM31"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM31" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM31" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM31Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{31} = (-1)^{3+1} M_{31} = 1 \cdot 5 = 5 \)
                          </p>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-8')">Selanjutnya</button>
                          </div>
                        </section>



                        <section class="materi-slide" data-section="invers-8">
                          <p>Minor \( M_{32} \) :</p>
                          <p>Hilangkan baris ke-3 dan kolom ke-2:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M32 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m32">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M32) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">3</td>
                                    <td data-pos="m12">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">4</td>
                                    <td data-pos="m22">-3</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM32a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM32b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM32a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM32b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM32"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM32" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM32" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM32Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{32} = (-1)^{3+2} M_{32} = (-1) \cdot (-13) = 13 \)
                          </p>
                          <br>
                          <p>Minor \( M_{33} \) :</p>
                          <p>Hilangkan baris ke-3 dan kolom ke-3:</p>
                          <!-- ================= INVERS MATRIKS – EKSPANSI KOFAKTOR M33 ================= -->
                          <div class="matrix-tutorial-stack tutorial-invers-cof-m33">
                            <div class="matrix-tutorial-box row-tutorial">
                              <div class="matrix-frame matrix-label">
                                \( P = \)
                              </div>
                              <!-- MATRIX 3x3 -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-p">
                                  <tr>
                                    <td data-pos="p11">3</td>
                                    <td data-pos="p12">-2</td>
                                    <td data-pos="p13">1</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p21">4</td>
                                    <td data-pos="p22">1</td>
                                    <td data-pos="p23">-3</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="p31">2</td>
                                    <td data-pos="p32">0</td>
                                    <td data-pos="p33">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- MATRIX 2x2 (MINOR M33) -->
                              <div class="matrix-frame bracket-frame">
                                <table class="matrix-html matrix-2x2">
                                  <tr>
                                    <td data-pos="m11">3</td>
                                    <td data-pos="m12">-2</td>
                                  </tr>
                                  <tr>
                                    <td data-pos="m21">4</td>
                                    <td data-pos="m22">1</td>
                                  </tr>
                                </table>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- EKSPRESI -->
                              <div class="matrix-frame matrix-plain det-line det-exp">
                                <span class="slot" id="expM33a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="expM33b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- NILAI -->
                              <div class="matrix-frame matrix-plain det-line det-val">
                                <span class="slot" id="valM33a"></span>
                                <span class="sign minus">−</span>
                                <span class="slot" id="valM33b"></span>
                              </div>
                              <div class="matrix-frame matrix-label">=</div>
                              <!-- HASIL -->
                              <div class="matrix-frame matrix-plain det-line det-final">
                                <span class="final-slot" id="finalM33"></span>
                              </div>
                            </div>
                          </div>
                          <!-- TOMBOL -->
                          <div class="matrix-step-controls">
                            <button id="btnPrevInvM33" class="btn btn-outline-secondary" disabled>
                              Sebelumnya
                            </button>
                            <button id="btnMainInvM33" class="btn btn-success">
                              Mulai
                            </button>
                          </div>
                          <!-- PENJELASAN -->
                          <div class="matrix-explanation" id="invM33Explanation">
                            Tekan <b>Mulai</b> untuk melihat langkah penyelesaian
                          </div>
                          <p>
                            Kofaktor
                            \( C_{33} = (-1)^{3+3} M_{33} = 1 \cdot (11) = 11 \)
                          </p>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('invers-9')">Selanjutnya</button>
                          </div>
                        </section>



                        <section class="materi-slide" data-section="invers-9">
                          <ol start="3">
                            <li>Menentukan kofaktor<br>
                              <div class="text-center my-3 matrix-display-big">
                                \(
                                \text{Kofaktor } C_{ij} =
                                \begin{bmatrix}
                                1 & -10 & -2 \\
                                2 & 1 & -4 \\
                                5 & 13 & 11
                                \end{bmatrix}
                                \)
                              </div>
                            </li>
                            <li>
                              Menentukan \( \textit{Adjoint}(P) \)<br>\( Adjoin \) untuk matriks 3×3 merupakan transpose dari matriks kofaktor
                              <div class="text-center my-3 matrix-display-big">
                                \(
                                \textit{Adjoint}(P) =
                                \begin{bmatrix}
                                1 & 2 & 5 \\
                                -10 & 1 & 13 \\
                                -2 & -4 & 11
                                \end{bmatrix}
                                \)
                              </div>
                            </li>
                            <li>
                              Menghitung Invers Matriks<br>
                              <div class="text-center my-3 matrix-display-big">
                                \(
                                P^{-1} =
                                \frac{1}{21}
                                \begin{bmatrix}
                                1 & 2 & 5 \\
                                -10 & 1 & 13 \\
                                -2 & -4 & 11
                                \end{bmatrix}
                                \)
                              </div>
                              <br>
                              <strong>Jadi, invers matriks \( P \) adalah:</strong>
                              <div class="text-center my-3 matrix-display-big">
                                \(
                                P^{-1} =
                                \begin{bmatrix}
                                \dfrac{1}{21} & \dfrac{2}{21} & \dfrac{5}{21} \\
                                -\dfrac{10}{21} & \dfrac{1}{21} & \dfrac{13}{21} \\
                                -\dfrac{2}{21} & -\dfrac{4}{21} & \dfrac{11}{21}
                                \end{bmatrix}
                                \)
                              </div>
                            </li>
                          </ol>
                          <div class="slide-nav mt-4 text-end">
                              <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                              <button class="btn btn-primary btn-next-slide" onclick="unlockMateri('mari-mencoba-determinan-invers')">Selanjutnya</button>
                          </div>
                        </section>



                        <section class="materi-slide" data-section="mari-mencoba-determinan-invers">
                      <br><br>
                      <div class="quiz-wrapper">
                        <div class="quiz-container">
                          <!-- HEADER -->
                          <div class="quiz-header">
                            Mari Mencoba <i class="bi bi-pen"></i>
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
    data-check="mari-mencoba-determinan-invers-matriks"
    data-unlock="kuis-determinan-invers"
    data-allowed="{{ in_array('mari-mencoba-determinan-invers-matriks', $completed ?? []) ? '1' : '0' }}">
    Selanjutnya
</button>
                      </div>
                    </section>



                    {{-- =================================================
                    SECTION: KUIS PENGERTIAN MATRIKS
                ================================================= --}}
                <section class="materi-slide" data-section="kuis-determinan-invers">
                    <div class="quiz-action-wrapper">
                      <br>
                      <br>
                      <p class="refleksi-hint text-center">
                        Silahkan klik tombol di bawah ini
                        untuk mengerjakan kuis agar dapat <strong>melanjutkan ke materi berikutnya</strong> 👇
                    </p>
                        <!-- KARTU KUIS -->
                        <div class="quiz-link-wrapper mb-7">
                            <a href="{{ route('petunjuk.kuis', ['quiz_id' => 6]) }}" class="quiz-link-card">

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
                                'materi' => 'determinan_invers_matriks',
                                'back' => url()->current()
                            ]) }}"
                            class="btn btn-outline-success px-4">
                                Refleksi Pembelajaran
                            </a>

                        </div> -->
                    </div>

                    <!-- ================= PAGE INDICATOR ================= -->
                    <!-- SINGLE PAGE INDICATOR (GLOBAL) -->
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
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
        <h3>Akses Terkunci</h3>
        <p>Selesaikan soal terlebih dahulu ya</p>
        <button onclick="closePopup()">Oke</button>
    </div>
</div>



<script>
    window.unlockedSections = @json($progress);
</script>
<script>



// =================== TUTORIAL DETERMINAN MATRIKS ===================== //

document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finished = false;
  let endConfirmed = false; // fase setelah 38 muncul
  let history = [];

  const btnMain = document.getElementById('btnMainDet');
  const btnPrev = document.getElementById('btnPrevDet');
  const explain = document.getElementById('detExplanation');

  const resLeft  = document.querySelector('.tutorial-det .res-left');
  const resOp    = document.querySelector('.tutorial-det .res-op');
  const resRight = document.querySelector('.tutorial-det .res-right');
  const finalRes = document.querySelector('.tutorial-det .final-result');

  const resLeft2  = document.querySelector('.res-left-2');
const resRight2 = document.querySelector('.res-right-2');

  // tanda minus sudah ada sejak awal
  resOp.textContent = '−';

  const cell = key =>
    document.querySelector(`.tutorial-det td[data-pos="${key}"]`);

  const clearHighlightOnly = () => {
    document
      .querySelectorAll('.tutorial-det .matrix-mark,.tutorial-det .matrix-pop')
      .forEach(el => el.classList.remove('matrix-mark','matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  

  function renderStep(){
    clearHighlightOnly();

    switch(step){

      // STEP 1
      case 0:
        cell('a11').classList.add('matrix-mark');
        cell('a22').classList.add('matrix-mark');
        explain.textContent = 'Ambil elemen A11 dan A22';
        break;

      // STEP 2
      case 1:
        resLeft.textContent = '(6) × (5)';
        pop(resLeft);
        explain.textContent = 'Kalikan elemen A11 dan A22';
        break;

      // STEP 3
      case 2:
  resLeft2.textContent = '30';
  pop(resLeft2);
  explain.textContent =
    'Ini adalah hasil perkalian elemen A11 dan A22';
  break;

      // STEP 4
      case 3:
        cell('a12').classList.add('matrix-mark');
        cell('a21').classList.add('matrix-mark');
        explain.textContent = 'Ambil elemen A12 dan A21';
        break;

      // STEP 5
      case 4:
        resRight.textContent = '(2) × (-4)';
        pop(resRight);
        explain.textContent = 'Kalikan elemen A12 dan A21';
        break;

      // STEP 6
      case 5:
  resRight2.textContent = '(-8)';
  pop(resRight2);
  explain.textContent =
    'Ini adalah hasil perkalian elemen A12 dan A21';
  break;

      // STEP 7 – 38 MUNCUL (MASIH BIRU)
      case 6:
  finalRes.textContent = '38';
  pop(finalRes);
  explain.textContent =
    'Ini adalah hasil akhir dari operasi determinan matriks yang didapat dari 30-(-8)';
  break;
    }
  }

  function nextStep(){

  // 👉 JIKA BARU SAMPAI STEP 6, TAMPILKAN DULU 38
  if(step === 6 && !endConfirmed){
    renderStep();          // 🔥 INI YANG SEBELUMNYA HILANG
    endConfirmed = true;   // tandai sudah pernah tampil
    return;
  }

  // 👉 KLIK SETELAH 38 TAMPIL → KONFIRMASI AKHIR
  if(step === 6 && endConfirmed){
    clearHighlightOnly(); // hilangkan warna biru saja

    explain.textContent = 'Hasil akhir determinan matriks';

    btnMain.textContent = 'Selesai';
    btnMain.classList.replace('btn-primary','btn-warning');
    btnPrev.disabled = true;

    finished = true;
    return;
  }

  history.push(step - 1);
renderStep();
step++;

}


  btnMain.onclick = () => {

    // 🔄 RESET SETELAH KLIK "SELESAI"
    if(finished){
      step = 0;
      started = false;
      finished = false;
      endConfirmed = false;
      history = [];

      resLeft.textContent = '';
      resRight.textContent = '';
      finalRes.textContent = '';
      resOp.textContent = '−';
      resLeft2.textContent = '';
resRight2.textContent = '';

      clearHighlightOnly();

      btnMain.textContent = 'Mulai';
      btnMain.classList.replace('btn-warning','btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian determinan';
      return;
    }

    if(!started){
      started = true;
      step = 0;
      history = [];

      renderStep();
      step++;

      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    } else {
      nextStep();
    }
  };

  btnPrev.onclick = () => {
  if(step > 0){
    step--;
    renderStep();
  }
};
});





// ========== TUTORIAL DETERMINAN MATRIKS 3x3 (SARRUS) ==========
document.addEventListener('DOMContentLoaded', () => {

  const diagonals = [
  // ===== POSITIF (↘) =====
  { cells: ['q11','q22','q33'], values: [2,5,3] },
  { cells: ['q12','q23','d31'], values: [4,2,6] },
  { cells: ['q13','d21','d32'], values: [1,3,7] },

  // ===== NEGATIF (↗) =====
  { cells: ['q31','q22','q13'], values: [6,5,1], sign:'-' },
  { cells: ['q32','q23','d11'], values: [7,2,2], sign:'-' },
  { cells: ['q33','d21','d12'], values: [3,3,4], sign:'-' }
];

  let diagIndex = 0;
  let step = 0;
  let total = 0;
  let started = false;
  let finished = false;
  let showFinal = false;
  let finalConfirmed = false;
  let history = [];
  let phase = 'mark';

  const btnMain = document.getElementById('btnMainDet3');
  const btnPrev = document.getElementById('btnPrevDet3');
  const explain = document.getElementById('det3Explanation');
  const expBox  = document.querySelector('.tutorial-det3 .det-exp');
  const valBox  = document.querySelector('.tutorial-det3 .det-val');

  if(!btnMain || !btnPrev) return;
  // ===== UTIL =====
  const clear = () => {
    document
      .querySelectorAll('.tutorial-det3 .matrix-mark')
      .forEach(el => el.classList.remove('matrix-mark'));
  };

  const mark = cells => {
    cells.forEach(c => {
      const el = document.querySelector(`.tutorial-det3 [data-pos="${c}"]`);
      if(el) el.classList.add('matrix-mark');
    });
  };

  const clearPop = () => {
    document
      .querySelectorAll('.tutorial-det3 .matrix-pop')
      .forEach(el => el.classList.remove('matrix-pop'));
  };

  const pop = el => {
  if(!el) return;
  el.classList.remove('matrix-pop');
  void el.offsetWidth; // force reflow
  el.classList.add('matrix-pop');
};

const toQLabel = c =>
  c.replace(/^d/i, 'q').toUpperCase();
const expSlots = document.querySelectorAll('.det-exp .slot');
const valSlots = document.querySelectorAll('.det-val .slot');
const finalSlot = document.querySelector('.det-final .final-slot');

function saveState(){
  let activeType = null;

  if(showFinal){
    activeType = 'final';
  } else if(step === 2){
    activeType = 'val';
  } else if(step === 1){
    activeType = 'exp';
  }

  history.push({
    diagIndex,
    step,
    total,
    showFinal,
    finalConfirmed,
    activeType,
    exp: [...expSlots].map(s => s.textContent),
    val: [...valSlots].map(s => s.textContent),
    final: finalSlot.textContent,
    explain: explain.textContent
  });
}

  // ===== RENDER =====
  function renderStep(){
  clear();
  const d = diagonals[diagIndex];

  if(step === 0){
  mark(d.cells);
  explain.textContent =
    `Ambil elemen ${d.cells.map(toQLabel).join(', ')}`;
}

if(step === 1){
  clearPop();
  const slot = expSlots[diagIndex];
  slot.textContent = `(${d.values.join(' × ')})`;
  pop(slot);

  explain.textContent =
    `Kalikan elemen matriks ${d.cells.map(toQLabel).join(', ')}`;
}

if(step === 2){
  clearPop();
  const hasil = d.values.reduce((a,b)=>a*b,1);
  const slot = valSlots[diagIndex];
  slot.textContent = hasil;
  pop(slot);

  const elemen = d.cells.map(toQLabel).join(', ');
  explain.textContent =
    `Ini adalah hasil perkalian elemen matriks ${elemen}`;
}
}

  // ===== NEXT =====
  function nextStep(){

  // =============================
  // STEP FINAL – ANGKA 5 MUNCUL
  // =============================
  if(showFinal && !finalConfirmed){
    clearPop();
    finalSlot.textContent = total;
    pop(finalSlot);

    explain.textContent =
      'Ini adalah hasil akhir determinan matriks';

    saveState();          // ✅ SIMPAN SETELAH BIRU MUNCUL
    finalConfirmed = true;
    return;
  }

  // =============================
  // STEP FINAL – KONFIRMASI AKHIR
  // =============================
  if(showFinal && finalConfirmed){
    clearPop();

    explain.textContent =
      'Hasil akhir determinan matriks metode Sarrus';

    btnMain.textContent = 'Selesai';
    btnMain.classList.replace('btn-primary','btn-warning');
    btnPrev.disabled = true;
    finished = true;

    saveState();          // ✅ SIMPAN STATE AKHIR
    return;
  }

  // =============================
  // STEP NORMAL
  // =============================
  renderStep();           // 🔥 tampilkan dulu
  saveState();            // 🔥 baru simpan

  if(step === 2){
    const d = diagonals[diagIndex];
    const hasil = d.values.reduce((a,b)=>a*b,1);
    total += d.sign === '-' ? -hasil : hasil;

    diagIndex++;
    step = 0;

    if(diagIndex >= diagonals.length){
      showFinal = true;
    }
    return;
  }

  step++;
}

  // ===== BUTTON =====
  btnMain.onclick = () => {

    if(finished){
  diagIndex = step = total = 0;
  finished = false;
  started = false;
  showFinal = false;
  finalConfirmed = false;

  expSlots.forEach(s => {
  s.textContent = '';
  s.classList.remove('matrix-pop');
});

valSlots.forEach(s => {
  s.textContent = '';
  s.classList.remove('matrix-pop');
});

finalSlot.textContent = '';
  finalSlot.classList.remove('matrix-pop');

  clear();

  btnMain.textContent = 'Mulai';
  btnMain.classList.replace('btn-warning','btn-success');
  btnPrev.disabled = true;

  explain.textContent =
    'Tekan Mulai untuk melihat langkah penyelesaian';
  return;
}

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }
    nextStep();
  };

  btnPrev.onclick = () => {
  if(history.length === 0) return;

  const prev = history.pop();

  diagIndex = prev.diagIndex;
  step = prev.step;
  total = prev.total;
  showFinal = prev.showFinal;
  finalConfirmed = prev.finalConfirmed;

  clear();
  clearPop();

  // restore isi teks
  expSlots.forEach((s,i) => s.textContent = prev.exp[i]);
  valSlots.forEach((s,i) => s.textContent = prev.val[i]);
  finalSlot.textContent = prev.final;

  explain.textContent = prev.explain;

  // 🔥 URUTAN VISUAL SESUAI STEP
  if(prev.activeType === 'val'){
    // nilai muncul → pop nilai
    pop(valSlots[diagIndex]);
  }
  else if(prev.activeType === 'exp'){
    // ekspresi muncul → pop ekspresi
    pop(expSlots[diagIndex]);
  }
  else if(prev.activeType === 'final'){
    pop(finalSlot);
  }

  // 🔶 tandai matriks PALING TERAKHIR
  if(diagonals[diagIndex] && step >= 0){
    mark(diagonals[diagIndex].cells);
  }

  btnMain.textContent = 'Lanjut';
  btnMain.classList.remove('btn-warning');
  btnMain.classList.add('btn-primary');
  finished = false;
};
});





// ========== TUTORIAL DETERMINAN MATRIKS (EKSPANSI KOFAKTOR) M11 ==========

document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;   // angka 1 sudah muncul & biru
let finalCleared = false; // biru sudah dihapus
let isDone = false;


  const btnMain = document.getElementById('btnMainCof');
  const btnPrev = document.getElementById('btnPrevCof');
  const explain = document.getElementById('cofExplanation');

  const exp1 = document.getElementById('exp1');
  const exp2 = document.getElementById('exp2');
  const val1 = document.getElementById('val1');
  const val2 = document.getElementById('val2');
  const final = document.getElementById('finalResult');

  const cell = p =>
    document.querySelector(`.tutorial-det-cofactor [data-pos="${p}"]`);

  const clearPop = () => {
    document
      .querySelectorAll('.tutorial-det-cofactor .matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 1 & kolom 1 (tetap aktif)
  const markRowCol1 = () => {
    ['q11','q12','q13','q21','q31']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
  clearPop();
  markRowCol1();

  switch(step){

    case 0:
      explain.textContent =
        'Hilangkan baris ke-1 dan kolom ke-1';
      break;

    case 1:
      pop(cell('m11'));
      pop(cell('m22'));
      exp1.textContent = '(5) × (3)';
      pop(exp1);
      explain.textContent =
        'Setelah menghilangkan baris ke-1 dan kolom ke-1, kalikan elemen Q11 dengan Q22';
      break;

    case 2:
      val1.textContent = '15';
      pop(val1);
      explain.textContent =
        'Ini adalah hasil perkalian dari elemen Q11 dengan Q22';
      break;

    case 3:
      pop(cell('m12'));
      pop(cell('m21'));
      exp2.textContent = '(2) × (7)';
      pop(exp2);
      explain.textContent =
        'Selanjutnya kalikan elemen Q12 dengan Q21';
      break;

    case 4:
      val2.textContent = '14';
      pop(val2);
      explain.textContent =
        'Ini adalah hasil perkalian dari elemen Q12 dengan Q21';
      break;

    case 5:
      final.textContent = '1';
      pop(final);
      explain.textContent =
        'Ini adalah hasil Minor \\(M_{11}\\) pada matriks Q';
      MathJax.typeset();
      finalShown = true;     // 🔵 angka biru muncul
      break;
  }
}


  btnMain.onclick = () => {

  // ===== RESET SETELAH SELESAI =====
if(isDone){
  step = 0;
  started = false;
  finalShown = false;
  finalCleared = false;
  isDone = false;      // ✅ reset flag

  exp1.textContent = '';
  exp2.textContent = '';
  val1.textContent = '';
  val2.textContent = '';
  final.textContent = '';

  clearPop();

  document
    .querySelectorAll('.tutorial-det-cofactor .matrix-mark')
    .forEach(e => e.classList.remove('matrix-mark'));

  btnMain.textContent = 'Mulai';
  btnMain.classList.remove('btn-warning');
  btnMain.classList.add('btn-success');
  btnPrev.disabled = true;

  explain.textContent =
    'Tekan Mulai untuk melihat langkah penyelesaian';

  return;
}

  // ===== HAPUS BIRU ANGKA 1 =====
  // ===== HAPUS BIRU ANGKA 1 =====
if(finalShown && !finalCleared){
  clearPop();

  explain.textContent =
    'Hasil akhir Minor \\(M_{11}\\) dengan metode Ekspansi Kofaktor';
  MathJax.typeset();

  btnMain.textContent = 'Selesai';
  btnMain.classList.replace('btn-primary','btn-warning');
  btnPrev.disabled = true;

  finalCleared = true;
  isDone = true;        // ✅ TAMBAHKAN INI
  return;
}


  // ===== NORMAL STEP =====
  if(!started){
    started = true;
    btnMain.textContent = 'Lanjut';
    btnMain.classList.replace('btn-success','btn-primary');
    btnPrev.disabled = false;
  }

  if(step <= 5){
    render();
    step++;
  }
};


  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});

// ===== TUTORIAL EKSPANSI KOFAKTOR (M12) =====
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const btnMain = document.getElementById('btnMainM12');
  const btnPrev = document.getElementById('btnPrevM12');
  const explain = document.getElementById('expM12');

  const exp1 = document.getElementById('exp1_m12');
  const exp2 = document.getElementById('exp2_m12');
  const val1 = document.getElementById('val1_m12');
  const val2 = document.getElementById('val2_m12');
  const final = document.getElementById('final_m12');

  const cell = p =>
    document.querySelector(`.cof-m12 [data-pos="${p}"]`);

  const clearPop = () => {
    document
      .querySelectorAll('.cof-m12 .matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 1 & kolom 2
  const markRowCol2 = () => {
    ['q11','q12','q13','q22','q32']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol2();

    switch(step){
      case 0:
        explain.textContent =
          'Hilangkan baris ke-1 dan kolom ke-2';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(3) × (3)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen Q11 dengan Q22';
        break;

      case 2:
        val1.textContent = '9';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen Q11 dengan Q22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(2) × (6)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen Q12 dengan Q21';
        break;

      case 4:
        val2.textContent = '12';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen Q12 dengan Q21';
        break;

      case 5:
        final.textContent = '-3';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\(M_{12}\\) pada matriks Q';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      document
        .querySelectorAll('.cof-m12 .matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.replace('btn-warning','btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\(M_{12}\\) dengan metode Ekspansi Kofaktor';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});




// ===== TUTORIAL EKSPANSI KOFAKTOR (M13) =====
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const btnMain = document.getElementById('btnMainM13');
  const btnPrev = document.getElementById('btnPrevM13');
  const explain = document.getElementById('expM13');

  const exp1 = document.getElementById('exp1_m13');
  const exp2 = document.getElementById('exp2_m13');
  const val1 = document.getElementById('val1_m13');
  const val2 = document.getElementById('val2_m13');
  const final = document.getElementById('final_m13');

  const cell = p =>
    document.querySelector(`.cof-m13 [data-pos="${p}"]`);

  const clearPop = () => {
    document
      .querySelectorAll('.cof-m13 .matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 1 & kolom 3
  const markRowCol3 = () => {
    ['q11','q12','q13','q23','q33']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol3();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-1 dan kolom ke-3';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(3) × (7)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-3, kalikan elemen Q11 dengan Q22';
        break;

      case 2:
        val1.textContent = '21';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen Q11 dengan Q22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(5) × (6)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen Q12 dengan Q21';
        break;

      case 4:
        val2.textContent = '30';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen Q12 dengan Q21';
        break;

      case 5:
        final.textContent = '-9';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\(M_{13}\\) pada matriks Q';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      document
        .querySelectorAll('.cof-m13 .matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.replace('btn-warning','btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\(M_{13}\\) dengan metode Ekspansi Kofaktor';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});



// =================== TUTORIAL DETERMINAN MATRIKS (DI INVERS MATRIKS PERTAMA) ===================== //

// =================== TUTORIAL DETERMINAN MATRIKS 2 ===================== //

document.addEventListener('DOMContentLoaded', () => {

  let step2 = 0;
  let started2 = false;
  let finished2 = false;
  let endConfirmed2 = false;
  let history2 = [];

  const root = document.querySelector('.tutorial-det-2');

  const btnMain2 = document.getElementById('btnMainDet2');
  const btnPrev2 = document.getElementById('btnPrevDet2');
  const explain2 = document.getElementById('detExplanation2');

  const resLeft2  = root.querySelector('.res-left');
const resOp2    = root.querySelector('.res-op');
const resRight2 = root.querySelector('.res-right');

const resLeftMid  = root.querySelector('.res-left-2');
const resRightMid = root.querySelector('.res-right-2');

const finalRes2 = root.querySelector('.res-final');

  resOp2.textContent = '−';

  const cell2 = key =>
    root.querySelector(`td[data-pos="${key}"]`);

  const clearHighlight2 = () => {
    root
      .querySelectorAll('.matrix-mark,.matrix-pop')
      .forEach(el =>
        el.classList.remove('matrix-mark','matrix-pop')
      );
  };

  const pop2 = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  function renderStep2(){
  clearHighlight2();

  switch(step2){

    case 0:
      cell2('a11').classList.add('matrix-mark');
      cell2('a22').classList.add('matrix-mark');
      explain2.textContent = 'Ambil elemen A11 dan A22';
      break;

    case 1:
      resLeft2.textContent = '(4) × (3)';
      pop2(resLeft2);
      explain2.textContent = 'Kalikan elemen A11 dan A22';
      break;

    case 2:
      resLeftMid.textContent = '12';
      pop2(resLeftMid);
      explain2.textContent = 'Ini adalah hasil perkalian elemen A11 dan A22';
      break;

    // 🔥 TAMBAHAN STEP BARU
    case 3:
      cell2('a12').classList.add('matrix-mark');
      cell2('a21').classList.add('matrix-mark');
      explain2.textContent = 'Ambil elemen A21 dan A12';
      break;

    case 4:
      resRight2.textContent = '(2) × (-5)';
      pop2(resRight2);
      explain2.textContent = 'Kalikan elemen A21 dan A12';
      break;

    case 5:
      resRightMid.textContent = '(-10)';
      pop2(resRightMid);
      explain2.textContent = 'Ini adalah hasil perkalian elemen A21 dan A12';
      break;

    case 6:
      finalRes2.textContent = '22';
      pop2(finalRes2);
      explain2.textContent = 'Ini adalah hasil akhir dari operasi determinan matriks yang didapat dari 12−(-10)';
      break;
  }
}
  function nextStep2(){

    if(step2 === 6 && !endConfirmed2){
      renderStep2();
      endConfirmed2 = true;
      return;
    }

    if(step2 === 6 && endConfirmed2){
      clearHighlight2();
      explain2.textContent = 'Hasil akhir determinan matriks';
      btnMain2.textContent = 'Selesai';
      btnMain2.classList.replace('btn-primary','btn-warning');
      btnPrev2.disabled = true;
      finished2 = true;
      return;
    }

    // history2.push(step2 - 1);
    history2.push(step2);
    renderStep2();
    step2++;
  }

  btnMain2.onclick = () => {

    if(finished2){
      step2 = 0;
      started2 = false;
      finished2 = false;
      endConfirmed2 = false;
      history2 = [];

      resLeft2.textContent = '';
      resRight2.textContent = '';
      resLeftMid.textContent = '';
  resRightMid.textContent = '';
      finalRes2.textContent = '';

      clearHighlight2();

      btnMain2.textContent = 'Mulai';
      btnMain2.classList.replace('btn-warning','btn-success');
      btnPrev2.disabled = true;

      explain2.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian determinan';
      return;
    }

    if(!started2){
      started2 = true;
      step2 = 0;
      history2 = [];

      renderStep2();
      step2++;

      btnMain2.textContent = 'Lanjut';
      btnMain2.classList.replace('btn-success','btn-primary');
      btnPrev2.disabled = false;
    } else {
      nextStep2();
    }
  };

  btnPrev2.onclick = () => {
  if(step2 > 0){
    step2--;
    renderStep2();
  }
};

});



// =================== TUTORIAL DETERMINAN MATRIKS 3 ===================== //
// ========== TUTORIAL DETERMINAN MATRIKS 3x3 (UNTUK INVERS – SAFE & SAMA ALUR) ==========
document.addEventListener('DOMContentLoaded', () => {

  const root = document.querySelector('.tutorial-det3x3-sarrus');
  const btnMain = document.getElementById('btnMainDet3x3');
  const btnPrev = document.getElementById('btnPrevDet3x3');
  const explain = document.getElementById('det3x3Explanation');

  if (!root || !btnMain || !btnPrev || !explain) return;

  // === DATA DIAGONAL (SESUAI MATRKS P)
  const diagonals = [
    { cells: ['q11','q22','q33'], values: [3,1,1] },
    { cells: ['q12','q23','d31'], values: [-2,-3,2] },
    { cells: ['q13','d21','d32'], values: [1,4,0] },

    { cells: ['q31','q22','q13'], values: [2,1,1], sign:'-' },
    { cells: ['q32','q23','d11'], values: [0,-3,3], sign:'-' },
    { cells: ['q33','d21','d12'], values: [1,4,-2], sign:'-' }
  ];

  let diagIndex = 0;
  let step = 0;
  let total = 0;
  let started = false;
  let finished = false;
  let showFinal = false;
  let finalConfirmed = false;
  let history = [];

  const expSlots = root.querySelectorAll('.det-exp .slot');
  const valSlots = root.querySelectorAll('.det-val .slot');
  const finalSlot = root.querySelector('.det-final .final-slot');

  // ===== UTIL =====
  const clearMark = () => {
    root.querySelectorAll('.matrix-mark').forEach(e =>
      e.classList.remove('matrix-mark')
    );
  };

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop').forEach(e =>
      e.classList.remove('matrix-pop')
    );
  };

  const mark = cells => {
    cells.forEach(c => {
      const el = root.querySelector(`[data-pos="${c}"]`);
      if(el) el.classList.add('matrix-mark');
    });
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  const toLabel = c => c.replace(/^d/i,'q').toUpperCase();

  function saveState(activeType){
    history.push({
      diagIndex,
      step,
      total,
      showFinal,
      finalConfirmed,
      activeType,
      exp: [...expSlots].map(s => s.textContent),
      val: [...valSlots].map(s => s.textContent),
      final: finalSlot.textContent,
      explain: explain.textContent
    });
  }

  // ===== RENDER =====
  function renderStep(){
    clearMark();
    clearPop();

    const d = diagonals[diagIndex];

    // STEP 0 — MARK
    if(step === 0){
      mark(d.cells);
      explain.textContent =
        `Ambil elemen ${d.cells.map(toLabel).join(', ')}`;
    }

    // STEP 1 — EKSPRESI
    if(step === 1){
      const slot = expSlots[diagIndex];
      slot.textContent = `(${d.values.join(' × ')})`;
      pop(slot);

      explain.textContent =
        `Kalikan elemen matriks ${d.cells.map(toLabel).join(', ')}`;
    }

    // STEP 2 — NILAI
    if(step === 2){
      const hasil = d.values.reduce((a,b)=>a*b,1);
      const slot = valSlots[diagIndex];
      slot.textContent = hasil;
      pop(slot);

      explain.textContent =
        `Ini adalah hasil perkalian elemen matriks ${d.cells.map(toLabel).join(', ')}`;
    }
  }

  // ===== NEXT =====
  function nextStep(){

    // FINAL – TAMPILKAN HASIL
    if(showFinal && !finalConfirmed){
      clearPop();
      finalSlot.textContent = total;
      pop(finalSlot);

      explain.textContent =
        'Ini adalah hasil akhir determinan matriks';

      saveState('final');
      finalConfirmed = true;
      return;
    }

    // FINAL – KONFIRMASI
    if(showFinal && finalConfirmed){
      clearPop();

      explain.textContent =
        'Hasil akhir determinan matriks';

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;
      finished = true;

      saveState('final');
      return;
    }

    // NORMAL
    renderStep();
    saveState(step === 2 ? 'val' : step === 1 ? 'exp' : null);

    if(step === 2){
      const d = diagonals[diagIndex];
      const hasil = d.values.reduce((a,b)=>a*b,1);
      total += d.sign === '-' ? -hasil : hasil;

      diagIndex++;
      step = 0;

      if(diagIndex >= diagonals.length){
        showFinal = true;
      }
      return;
    }

    step++;
  }

  // ===== BUTTON =====
  btnMain.onclick = () => {

    // RESET
    if(finished){
      diagIndex = step = total = 0;
      started = finished = showFinal = finalConfirmed = false;
      history = [];

      expSlots.forEach(s => s.textContent = '');
      valSlots.forEach(s => s.textContent = '');
      finalSlot.textContent = '';

      clearMark();
      clearPop();

      btnMain.textContent = 'Mulai';
      btnMain.classList.replace('btn-warning','btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    nextStep();
  };

  btnPrev.onclick = () => {
    if(history.length === 0) return;

    const prev = history.pop();

    diagIndex = prev.diagIndex;
    step = prev.step;
    total = prev.total;
    showFinal = prev.showFinal;
    finalConfirmed = prev.finalConfirmed;

    clearMark();
    clearPop();

    expSlots.forEach((s,i) => s.textContent = prev.exp[i]);
    valSlots.forEach((s,i) => s.textContent = prev.val[i]);
    finalSlot.textContent = prev.final;

    explain.textContent = prev.explain;

    if(prev.activeType === 'exp') pop(expSlots[diagIndex]);
    if(prev.activeType === 'val') pop(valSlots[diagIndex]);
    if(prev.activeType === 'final') pop(finalSlot);

    if(diagonals[diagIndex]) mark(diagonals[diagIndex].cells);

    btnMain.textContent = 'Lanjut';
    btnMain.classList.remove('btn-warning');
    btnMain.classList.add('btn-primary');
    finished = false;
  };

});



// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M11 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m11');
  const btnMain = document.getElementById('btnMainInvM11');
  const btnPrev = document.getElementById('btnPrevInvM11');
  const explain = document.getElementById('invM11Explanation');

  const exp1 = document.getElementById('expM11a');
  const exp2 = document.getElementById('expM11b');
  const val1 = document.getElementById('valM11a');
  const val2 = document.getElementById('valM11b');
  const final = document.getElementById('finalM11');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 1 & kolom 1
  const markRowCol1 = () => {
    ['p11','p12','p13','p21','p31']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol1();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-1 dan kolom ke-1';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(1) × (1)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-1, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '1';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(-3) × (0)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '0';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '1';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{11} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    // RESET
    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{11} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});

// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M12 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m12');
  const btnMain = document.getElementById('btnMainInvM12');
  const btnPrev = document.getElementById('btnPrevInvM12');
  const explain = document.getElementById('invM12Explanation');

  const exp1 = document.getElementById('expM12a');
  const exp2 = document.getElementById('expM12b');
  const val1 = document.getElementById('valM12a');
  const val2 = document.getElementById('valM12b');
  const final = document.getElementById('finalM12');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 1 & kolom 2
  const markRowCol = () => {
    ['p11','p12','p13','p22','p32']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-1 dan kolom ke-2';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(4) × (1)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '4';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(-3) × (2)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '-6';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '10';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{12} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{12} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});


// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M13 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m13');
  const btnMain = document.getElementById('btnMainInvM13');
  const btnPrev = document.getElementById('btnPrevInvM13');
  const explain = document.getElementById('invM13Explanation');

  const exp1 = document.getElementById('expM13a');
  const exp2 = document.getElementById('expM13b');
  const val1 = document.getElementById('valM13a');
  const val2 = document.getElementById('valM13b');
  const final = document.getElementById('finalM13');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 1 & kolom 3
  const markRowCol = () => {
    ['p11','p12','p13','p23','p33']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-1 dan kolom ke-3';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(4) × (0)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '0';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(1) × (2)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '2';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '-2';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{13} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{13} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});


// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M21 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m21');
  const btnMain = document.getElementById('btnMainInvM21');
  const btnPrev = document.getElementById('btnPrevInvM21');
  const explain = document.getElementById('invM21Explanation');

  const exp1 = document.getElementById('expM21a');
  const exp2 = document.getElementById('expM21b');
  const val1 = document.getElementById('valM21a');
  const val2 = document.getElementById('valM21b');
  const final = document.getElementById('finalM21');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 2 & kolom 1
  const markRowCol = () => {
    ['p21','p22','p23','p11','p31']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-2 dan kolom ke-1';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(-2) × (1)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '-2';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(1) × (0)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '0';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '-2';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{21} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{21} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});


// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M22 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m22');
  const btnMain = document.getElementById('btnMainInvM22');
  const btnPrev = document.getElementById('btnPrevInvM22');
  const explain = document.getElementById('invM22Explanation');

  const exp1 = document.getElementById('expM22a');
  const exp2 = document.getElementById('expM22b');
  const val1 = document.getElementById('valM22a');
  const val2 = document.getElementById('valM22b');
  const final = document.getElementById('finalM22');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 2 & kolom 2
  const markRowCol = () => {
    ['p21','p22','p23','p12','p32']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-2 dan kolom ke-2';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(3) × (1)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '3';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(1) × (2)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '2';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '1';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{22} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{22} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});


// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M23 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m23');
  const btnMain = document.getElementById('btnMainInvM23');
  const btnPrev = document.getElementById('btnPrevInvM23');
  const explain = document.getElementById('invM23Explanation');

  const exp1 = document.getElementById('expM23a');
  const exp2 = document.getElementById('expM23b');
  const val1 = document.getElementById('valM23a');
  const val2 = document.getElementById('valM23b');
  const final = document.getElementById('finalM23');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 2 & kolom 3
  const markRowCol = () => {
    ['p21','p22','p23','p13','p33']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-2 dan kolom ke-3';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(3) × (0)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '0';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(-2) × (2)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '-4';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '4';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{23} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{23} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});

// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M31 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m31');
  const btnMain = document.getElementById('btnMainInvM31');
  const btnPrev = document.getElementById('btnPrevInvM31');
  const explain = document.getElementById('invM31Explanation');

  const exp1 = document.getElementById('expM31a');
  const exp2 = document.getElementById('expM31b');
  const val1 = document.getElementById('valM31a');
  const val2 = document.getElementById('valM31b');
  const final = document.getElementById('finalM31');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 3 & kolom 1
  const markRowCol = () => {
    ['p31','p32','p33','p11','p21']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-3 dan kolom ke-1';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(-2) × (-3)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '6';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(1) × (1)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '1';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '5';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{31} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{31} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});


// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M32 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m32');
  const btnMain = document.getElementById('btnMainInvM32');
  const btnPrev = document.getElementById('btnPrevInvM32');
  const explain = document.getElementById('invM32Explanation');

  const exp1 = document.getElementById('expM32a');
  const exp2 = document.getElementById('expM32b');
  const val1 = document.getElementById('valM32a');
  const val2 = document.getElementById('valM32b');
  const final = document.getElementById('finalM32');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 3 & kolom 2
  const markRowCol = () => {
    ['p31','p32','p33','p12','p22']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-3 dan kolom ke-2';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(3) × (-3)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '-9';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(1) × (4)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '4';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '-13';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{32} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{32} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});


// ========== INVERS MATRIKS – EKSPANSI KOFAKTOR M33 (SAFE) ==========
document.addEventListener('DOMContentLoaded', () => {

  let step = 0;
  let started = false;
  let finalShown = false;
  let finalCleared = false;
  let isDone = false;

  const root = document.querySelector('.tutorial-invers-cof-m33');
  const btnMain = document.getElementById('btnMainInvM33');
  const btnPrev = document.getElementById('btnPrevInvM33');
  const explain = document.getElementById('invM33Explanation');

  const exp1 = document.getElementById('expM33a');
  const exp2 = document.getElementById('expM33b');
  const val1 = document.getElementById('valM33a');
  const val2 = document.getElementById('valM33b');
  const final = document.getElementById('finalM33');

  const cell = p =>
    root.querySelector(`[data-pos="${p}"]`);

  const clearPop = () => {
    root.querySelectorAll('.matrix-pop')
      .forEach(e => e.classList.remove('matrix-pop'));
  };

  const pop = el => {
    if(!el) return;
    el.classList.remove('matrix-pop');
    void el.offsetWidth;
    el.classList.add('matrix-pop');
  };

  // 🔶 tandai baris 3 & kolom 3
  const markRowCol = () => {
    ['p31','p32','p33','p13','p23']
      .forEach(p => cell(p).classList.add('matrix-mark'));
  };

  function render(){
    clearPop();
    markRowCol();

    switch(step){

      case 0:
        explain.textContent =
          'Hilangkan baris ke-3 dan kolom ke-3';
        break;

      case 1:
        pop(cell('m11'));
        pop(cell('m22'));
        exp1.textContent = '(3) × (1)';
        pop(exp1);
        explain.textContent =
          'Setelah menghilangkan baris ke-1 dan kolom ke-2, kalikan elemen P11 dengan P22';
        break;

      case 2:
        val1.textContent = '3';
        pop(val1);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P11 dengan P22';
        break;

      case 3:
        pop(cell('m12'));
        pop(cell('m21'));
        exp2.textContent = '(-2) × (4)';
        pop(exp2);
        explain.textContent =
          'Selanjutnya kalikan elemen P12 dengan P21';
        break;

      case 4:
        val2.textContent = '-8';
        pop(val2);
        explain.textContent =
          'Ini adalah hasil perkalian dari elemen P12 dengan P21';
        break;

      case 5:
        final.textContent = '11';
        pop(final);
        explain.textContent =
          'Ini adalah hasil Minor \\( M_{33} \\) pada matriks P';
        MathJax.typeset();
        finalShown = true;
        break;
    }
  }

  btnMain.onclick = () => {

    if(isDone){
      step = 0;
      started = false;
      finalShown = false;
      finalCleared = false;
      isDone = false;

      exp1.textContent = '';
      exp2.textContent = '';
      val1.textContent = '';
      val2.textContent = '';
      final.textContent = '';

      clearPop();
      root.querySelectorAll('.matrix-mark')
        .forEach(e => e.classList.remove('matrix-mark'));

      btnMain.textContent = 'Mulai';
      btnMain.classList.remove('btn-warning');
      btnMain.classList.add('btn-success');
      btnPrev.disabled = true;

      explain.textContent =
        'Tekan Mulai untuk melihat langkah penyelesaian';
      return;
    }

    if(finalShown && !finalCleared){
      clearPop();
      explain.textContent =
        'Hasil akhir Minor \\( M_{33} \\) untuk invers matriks';
      MathJax.typeset();

      btnMain.textContent = 'Selesai';
      btnMain.classList.replace('btn-primary','btn-warning');
      btnPrev.disabled = true;

      finalCleared = true;
      isDone = true;
      return;
    }

    if(!started){
      started = true;
      btnMain.textContent = 'Lanjut';
      btnMain.classList.replace('btn-success','btn-primary');
      btnPrev.disabled = false;
    }

    if(step <= 5){
      render();
      step++;
    }
  };

  btnPrev.onclick = () => {
    if(step === 0) return;
    step--;
    render();
  };

});






</script>

<!-- Quiz Determinan -->
<script src="/js/mencoba-determinan.js"></script>
<script src="/js/unlock-determinan.js"></script>


<!-- TIDAK ADA TOMBOL SEBELUMNYA DI SLIDE 1 -->
<script>
    document.querySelectorAll('.materi-slide').forEach((slide, i) => {
  const prevBtn = slide.querySelector('.btn-prev-slide');
  if (prevBtn && i === 0) {
    prevBtn.style.visibility = 'hidden';
  }
});

</script>

<script>
window.addEventListener('load', () => {
  const canvas = document.getElementById('sarrusCanvas');

  // 🔥 kalau canvas tidak ada, hentikan script
  if (!canvas) return;

  const table = canvas.previousElementSibling;

  const w = table.offsetWidth;
  const h = table.offsetHeight;

  canvas.width  = w;
  canvas.height = h;

  const ctx = canvas.getContext('2d');
  ctx.lineWidth = 3;
  ctx.lineCap = 'round';

  // (+) diagonal utama (biru)
  ctx.strokeStyle = '#1c7ed6';
  drawLine(10, 10, w*0.7, h-10);
  drawLine(w*0.2, 10, w*0.9, h-10);
  drawLine(w*0.4, 10, w, h-10);

  // (-) diagonal sekunder (oranye)
  ctx.strokeStyle = '#e8590c';
  drawLine(10, h-10, w*0.7, 10);
  drawLine(w*0.2, h-10, w*0.9, 10);
  drawLine(w*0.4, h-10, w, 10);

  function drawLine(x1,y1,x2,y2){
    ctx.beginPath();
    ctx.moveTo(x1,y1);
    ctx.lineTo(x2,y2);
    ctx.stroke();
  }
});
</script>


<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const kofaktor = document.querySelectorAll('.kofaktor');
    const cells = document.querySelectorAll('.minor-grid span');
    const info = document.getElementById('minorInfo');

    kofaktor.forEach(btn => {
        btn.addEventListener('click', () => {

            const row = btn.dataset.row;
            const col = btn.dataset.col;

            // ACTIVE
            kofaktor.forEach(k => k.classList.remove('active'));
            btn.classList.add('active');

            // RESET
            cells.forEach(c => c.classList.remove('fade-out'));

            // ANIMASI
            cells.forEach(c => {
                if (c.dataset.r === row || c.dataset.c === col) {
                    c.classList.add('fade-out');
                }
            });

            // PENJELASAN
            if (info) {
                info.innerHTML = `
                    Menghilangkan <b>baris ${row}</b> dan <b>kolom ${col}</b>.<br>
                    Sehingga diperoleh minor \\( M_{${row}${col}} \\) seperti disamping.<br>
                    Ini adalah bagian dari kofaktor \\( C_{${row}${col}} \\).
                `;

                // MATHJAX RENDER
                if (window.MathJax) {
                    MathJax.typesetPromise();
                }
            }

        });
    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function(){

    document.querySelectorAll(".btn-next-slide").forEach(btn => {

        btn.addEventListener("click", function(e){

            const check = this.dataset.check;
            if(!check) return;

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
    window.completedSections = @json($completed ?? []);
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    // kalau belum ada
    window.unlockedSections = window.unlockedSections || [];

    // 🔥 ambil dari server (completed)
    if (window.completedSections) {
        window.completedSections.forEach(sec => {
            if (!window.unlockedSections.includes(sec)) {
                window.unlockedSections.push(sec);
            }
        });
    }
});
</script>
</body>
</html>