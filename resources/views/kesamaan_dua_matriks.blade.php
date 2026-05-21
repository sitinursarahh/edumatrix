<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Kesamaan Dua Matriks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/materi_pengertian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jenis_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kesamaan_dua_matriks.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
                <section class="materi-slide active" data-section="penyelesaian-kesamaan-1">

                    <div class="pengenalan-matriks-header">
                        <h1>KESAMAAN DUA MATRIKS</h1>
                    </div>

                    {{-- Tujuan Pembelajaran --}}
                    <div class="tujuan-box">
                        <h3 class="tujuan-title">Tujuan Pembelajaran</h3>
                        <ol class="tujuan-list">
                            <li>Peserta didik mampu menyelesaikan masalah yang berkaitan dengan kesamaan dua matriks berdasarkan informasi yang diberikan dengan benar.</li>
                        </ol>
                    </div>
                    <br>

                    <p>
                      Dua matriks, yakni matriks \(A\) dan matriks \(B\), dikatakan sama (ditulis \( A = B \)) apabila memenuhi dua syarat utama, yaitu:
                    </p>
                    <ul>
                      <li>
                        Kedua matriks memiliki ordo yang sama, artinya jumlah baris dan kolom pada
                        matriks \(A\) sama dengan jumlah baris dan kolom pada matriks \(B\).
                      </li>

                      <li>
                        Setiap elemen yang bersesuaian atau seletak pada kedua matriks memiliki nilai
                        yang identik, yaitu \(a_{ij} = b_{ij}\) untuk semua nilai \(i\) dan \(j\).
                      </li>
                    </ul>
                    <p>Dengan kata lain, kesamaan dua matriks tidak hanya ditentukan oleh banyaknya elemen, tetapi juga oleh posisi dan nilai setiap elemennya yang harus benar-benar sama.</p>
                    <div class="box-masalah">
                      <div class="box-masalah-title"><strong>Masalah</strong></div>

                      <div class="box-masalah-content">
                        <p>Misalkan diketahui tiga matriks berikut:</p>

                        <div class="matrix-group">
                          <div class="text-center my-3 matrix-display-big">
                            \( A =
                            \begin{bmatrix}
                              2 & 5 \\
                              4 & -3
                            \end{bmatrix}
                            \)
                          </div>

                          <div class="text-center my-3 matrix-display-big">
                            \( B =
                            \begin{bmatrix}
                              2 & \sqrt{25} \\
                              2 \times 2 & -3
                            \end{bmatrix}
                            \)
                          </div>

                          <div class="text-center my-3 matrix-display-big">
                            \( C =
                            \begin{bmatrix}
                              2 & 3 \\
                              4 & 1
                            \end{bmatrix}
                            \)
                          </div>
                        </div>

                        <p>Perhatikan ketiga matriks di atas!</p>

                        <ul>
                          <li>Apakah ada dua matriks yang mempunyai elemen-elemen yang sama?</li>
                          <li>Apakah ada matriks yang berbeda? Sebutkan dan jelaskan alasannya!</li>
                        </ul>
                      </div>
                    </div>
                    <br>
                    <p><strong>Alternatif Penyelesaian :</strong></p>
                    <p>
                      Matriks A dan B memiliki ordo yang sama, yaitu 2 × 2. Artinya, syarat pertama kesamaan dua matriks telah terpenuhi.
                      Selanjutnya, syarat kedua adalah setiap elemen yang seletak pada kedua matriks harus memiliki nilai yang sama.
                    </p>
                    <p>Mari kita bandingkan elemen-elemen matriks \(A\) dan \(B\):</p>

                    <div class="matrix-tutorial-stack matrix-horizontal">
                      <div class="matrix-tutorial-box row-tutorial">
                          <div class="matrix-frame">
                              <span class="matrix-label">\( A = \)</span>
                              <span class="math-bracket-2">\( \left[ \right. \)</span>

                              <table class="matrix-html">
  <tr>
    <td id="a11">2</td>
    <td id="a12">5</td>
  </tr>
  <tr>
    <td id="a21">4</td>
    <td id="a22">-3</td>
  </tr>
</table>

                              <span class="math-bracket-2">\( \left. \right] \)</span>
                          </div>
                      </div>

                      <div class="matrix-tutorial-box row-tutorial">
                          <div class="matrix-frame">
                              <span class="matrix-label">\( B = \)</span>
                              <span class="math-bracket-2">\( \left[ \right. \)</span>
                              <table class="matrix-html">
  <tr>
    <td id="b11">2</td>
    <td id="b12">√25</td>
  </tr>
  <tr>
    <td id="b21">2 × 2</td>
    <td id="b22">-3</td>
  </tr>
</table>
                              <span class="math-bracket-2">\( \left. \right] \)</span>
                          </div>
                      </div>
                  </div>

                    <div id="matrix-display" class="text-center my-3 matrix-display-big"></div>
                    <!-- ================= INTERAKTIF PERBANDINGAN ================= -->
<div class="interactive-box mt-4">

  <div class="interactive-title">
    Jawablah pertanyaan di bawah ini untuk membandingkan elemen-elemen matriks \( A \) dan \( B \)
  </div>

  <div id="interactive-question" class="mt-3"></div>

  <div class="interactive-options mt-3">

  <div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" id="radio-ya" value="ya">
    <label class="form-check-label" for="radio-ya">Ya</label>
  </div>

  <div class="form-check">
    <input class="form-check-input" type="radio" name="jawaban" id="radio-tidak" value="tidak">
    <label class="form-check-label" for="radio-tidak">Tidak</label>
  </div>

</div>

  <div id="interactive-feedback" class="mt-3"></div>

  <div class="mt-3 d-flex justify-content-between">
  <button id="btn-prev-step" class="btn btn-outline-secondary">
    Sebelumnya
  </button>

  <div>
    <button id="btn-restart" class="btn btn-warning me-2 d-none">
      Ulangi
    </button>

    <button id="btn-next-step" class="btn btn-secondary" disabled>
      Selanjutnya
    </button>
  </div>
</div>

</div>
                    
                    <!-- <p class="text-center">Hitung elemen pada matriks B:</p>
                    <br>
                    <div class="text-center my-3 matrix-display-big">
                      \[
                      \sqrt{25} = 5 \quad \text{dan} \quad 2 \times 2 = 4
                      \]
                    </div> -->
                    <!-- <div class="text-center my-3 matrix-display-big">
                      \[
                      A =
                      \begin{bmatrix}
                      2 & \bbox[background:#ffe8b3]{5} \\
                      \bbox[background:#d1f2eb]{4} & -3
                      \end{bmatrix}
                      \qquad
                      B =
                      \begin{bmatrix}
                      2 & \bbox[background:#ffe8b3]{\sqrt{25}} \\
                      \bbox[background:#d1f2eb]{2 \times 2} & -3
                      \end{bmatrix}
                      \]
                    </div> -->
                    
                  <br>
                  <p class="text-start">Sehingga</p>

<div class="text-start my-3 matrix-display-big">
  \[
  B =
  \begin{bmatrix}
  2 & 5 \\
  4 & -3
  \end{bmatrix}
  \]
</div>
                  <br>
                  <p>
                    Dapat dilihat bahwa semua elemen yang seletak sama, maka \( A = B \).
                    Namun, jika dibandingkan dengan matriks \( C \), terlihat bahwa elemen-elemen pada
                    \( C \) berbeda, sehingga \( A \ne C \) dan \( B \ne C \).
                  </p>
                  <p><strong>Kesimpulan:</strong></p>
                  <p>\( \text{Matriks } A = B \)</p>
                  <p>\( \text{Matriks } A \ne C \)</p>
                  <p>\( \text{Matriks } B \ne C \)</p>
                  <ul>
                      <li>
                        Ada dua matriks yang memiliki elemen-elemen yang sama, yaitu \(A\) dan \(B\).
                      </li>

                      <li>
                        Matriks \(C\) berbeda dengan \(A\) dan \(B\) karena elemen-elemennya tidak sama pada posisi yang bersesuaian.
                      </li>
                  </ul>
                  <div class="slide-nav mt-4 text-end">
                    <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                    <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="interaktif-contoh-1"
    data-allowed="{{ in_array('interaktif-contoh-1', $completed ?? []) ? '1' : '0' }}">
    Selanjutnya
</button>
                  </div>
                  </section>




                  <section class="materi-slide" data-section="penyelesaian-kesamaan-2">
                  <br>
                  <h5>Contoh:</h5>
                  <p>Sebuah aula akan digunakan untuk sebuah acara. Panitia ingin memastikan jumlah kursi yang disusun sesuai dengan jumlah
                    kursi yang tersedia di gudang.
                  </p>
                  <p>Jumlah kursi dapat dihitung dengan dua cara berbeda:</p>
                  <ol>
                    <li>Berdasarkan perhitungan susunan kursi di aula, yang dinyatakan dalam matriks \(A\). </li>
                    <li>Berdasarkan data jumlah kursi yang tersedia di gudang, yang dinyatakan dalam matriks \(B\).</li>
                  </ol>
                  <p>Karena data berasal dari dua sumber yang berbeda, maka harus diperiksa apakah matriks \(A\) sama dengan matriks \(B\).</p>
                  <p>Panitia menggunakan parameter berikut:</p>
                  <ul>
                      <li>
                        \(a\) menyatakan jumlah kursi dalam satu baris
                      </li>
                      <li>
                        \(b\) menyatakan jumlah baris kursi
                      </li>
                      <li>
                        \(c\) menyatakan jumlah kursi yang tidak digunakan (rusak atau cadangan)
                      </li>
                  </ul>
                  <p>Data jumlah kursi dinyatakan sebagai berikut:</p>
                  <div class="text-center my-3 matrix-display-big">
                    \(
                    A =
                    \begin{bmatrix}
                    a + 2 & 3b \\
                    2b - c & a + b
                    \end{bmatrix}
                    \)
                    </div>
                    <div class="text-center my-3 matrix-display-big">
                    \(
                    B =
                    \begin{bmatrix}
                    14 & 24 \\
                    14 & 20
                    \end{bmatrix}
                    \)
                  </div>
                  <p>Pertanyaan:</p>
                  <p>Tentukan nilai \(a\), \(b\), dan \(c\) agar matriks \(A\) dan matriks \(B\) menunjukkan jumlah kursi yang sama pada setiap bagian aula.</p>
                  
                  <br>
                  <p><strong>Alternatif Penyelesaian :</strong></p>
                  <p>Diketahui:</p>
                  <div class="text-center my-3 matrix-display-big">
                      \(
                      A =
                      \begin{bmatrix}
                      a + 2 & 3b \\
                      2b - c & a + b
                      \end{bmatrix}
                      \qquad
                      B =
                      \begin{bmatrix}
                      14 & 24 \\
                      14 & 20
                      \end{bmatrix}
                      \)
                    </div>
                    <p>Agar matriks \(A\) \(=\) \(B\), maka setiap elemen yang seletak harus sama.</p>
                    <div class="matrix-tutorial-stack matrix-horizontal">
                      <div class="matrix-tutorial-box row-tutorial">
                          <div class="matrix-frame">
                              <span class="matrix-label">\( A = \)</span>
                              <span class="math-bracket-2">\( \left[ \right. \)</span>

                              <table class="matrix-html">
  <tr>
    <td id="c_a11">a + 2</td>
<td id="c_a12">3b</td>
  </tr>
  <tr>
    <td id="c_a21">2b - c</td>
<td id="c_a22">a + b</td>
  </tr>
</table>

                              <span class="math-bracket-2">\( \left. \right] \)</span>
                          </div>
                      </div>

                      <div class="matrix-tutorial-box row-tutorial">
                          <div class="matrix-frame">
                              <span class="matrix-label">\( B = \)</span>
                              <span class="math-bracket-2">\( \left[ \right. \)</span>
                              <table class="matrix-html">
  <tr>
    <td id="c_b11">14</td>
<td id="c_b12">24</td>
  </tr>
  <tr>
    <td id="c_b21">14</td>
<td id="c_b22">20</td>
  </tr>
</table>
                              <span class="math-bracket-2">\( \left. \right] \)</span>
                          </div>
                      </div>
                  </div>
                    <!-- ================= INTERAKTIF CONTOH 2 ================= -->
<div class="interactive-box mt-4">

  <div class="interactive-title">
    Jawablah pertanyaan di bawah ini untuk menentukan nilai pada matriks \( A \) dan \( B \)
  </div>

  <div id="interactive-question-2" class="mt-3"></div>

  <div class="interactive-options-2 mt-3">

    <div class="form-check">
      <input class="form-check-input" type="radio" name="jawaban2" id="radio2-ya" value="ya">
      <label class="form-check-label" for="radio2-ya">Ya</label>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="jawaban2" id="radio2-tidak" value="tidak">
      <label class="form-check-label" for="radio2-tidak">Tidak</label>
    </div>

  </div>

  <div id="interactive-feedback-2" class="mt-3"></div>

  <div class="mt-3 d-flex justify-content-between">
    <button id="btn-prev-step-2" class="btn btn-outline-secondary">
      Sebelumnya
    </button>

    <div>
      <button id="btn-restart-2" class="btn btn-warning me-2 d-none">
        Ulangi
      </button>

      <button id="btn-next-step-2" class="btn btn-secondary" disabled>
        Selanjutnya
      </button>
    </div>
  </div>

</div>
                    <br>
                  <p class="text-start">Sehingga</p>

<div class="text-start my-3 matrix-display-big">
  \[
  A =
  \begin{bmatrix}
  14 & 24 \\
  14 & 20
  \end{bmatrix}
  \]
</div>
                  <br>
                    <br>
                    <p>Kesimpulan:</p>
                    <p>Berdasarkan hasil perhitungan, diperoleh:</p>
                    <div class="text-center my-3 matrix-display-big">
                          \(
                          a = 12, b = 8, c = 2
                          \)
                    </div>
                    <p>
                      Dengan nilai tersebut, jumlah kursi yang dihitung berdasarkan susunan kursi di aula sama dengan data jumlah kursi yang
                      tersedia di gudang pada setiap bagian aula. Oleh karena itu, dapat disimpulkan bahwa <strong>penyusunan kursi di aula sudah
                      sesuai dengan jumlah kursi yang tersedia</strong>, sehingga berlaku:
                    </p>
                    <div class="text-center my-3 matrix-display-big">
                          \(
                          A = B
                          \)
                    </div>
                    <div class="slide-nav mt-4 text-end">
                      <button class="btn btn-outline-secondary btn-prev-slide">Sebelumnya</button>
                      <button type="button"
    class="btn btn-primary btn-next-slide"
    data-check="interaktif-contoh-2"
    data-allowed="{{ in_array('interaktif-contoh-2', $completed ?? []) ? '1' : '0' }}">
    Selanjutnya
</button>
                    </div>
                  </section>












                {{-- END SECTION --}}

                 {{-- =================================================
                    SECTION: MARI MENCOBA
                ================================================= --}}
                <section class="materi-slide" data-section="mari-mencoba-kesamaan">
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
    data-check="mari-mencoba-kesamaan-matriks"
    data-allowed="{{ in_array('mari-mencoba-kesamaan-matriks', $completed ?? []) ? '1' : '0' }}">
    Selanjutnya
</button>
                    </div>
                </section>



                {{-- =================================================
                    SECTION: KUIS PENGERTIAN MATRIKS
                ================================================= --}}
                <section class="materi-slide" data-section="kuis-kesamaan">
                    <div class="quiz-action-wrapper">
                      <br>
                      <br>
                      <p class="refleksi-hint text-center">
                        Silahkan klik tombol di bawah ini
                        untuk mengerjakan kuis agar dapat <strong>melanjutkan ke materi berikutnya</strong> 👇
                    </p>
                        <!-- KARTU KUIS -->
                        <div class="quiz-link-wrapper mb-7">
                            <a href="{{ route('petunjuk.kuis', ['quiz_id' => 3]) }}" class="quiz-link-card">

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
                                'materi' => 'kesamaan_dua_matriks',
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
        <button onclick="closePopup()">Oke, Siap!</button>
    </div>
</div>

</body>
</html>

<script>

/* ======================================================
   SCROLL + ACTIVE (SECTION BASED)
====================================================== */
/* ================= SIDEBAR ACTIVE FINAL ================= */

window.activateSidebarFor = function(sectionId) {

  if(!sectionId) return;

  // reset sublink saja
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
    .forEach(a => a.classList.remove('active'));

  // cari link sesuai section
  const activeLink = Array.from(
  document.querySelectorAll('#sidebar_materi .sidebar-sublink')
).find(link => {
  const sections = link.dataset.section.split(',');
  return sections.includes(sectionId);
});

  if(!activeLink) {
    console.warn("❌ Tidak ketemu sublink untuk:", sectionId);
    return;
  }

  // ✅ AKTIFKAN SUB (INI TARGET UTAMA)
  activeLink.classList.add('active');

  // buka parent
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
};

// jalan saat pertama load
document.addEventListener('DOMContentLoaded', () => {
  const hash = location.hash.replace('#','');
  if(hash){
    activateSidebarFor(hash);
  } else {
    // default slide pertama
    activateSidebarFor('penyelesaian-kesamaan-1');
  }
});

/* ======================================================
   PAGE BASED ACTIVE (URL) — TIDAK RESET MENU
====================================================== */
// document.addEventListener('DOMContentLoaded', function () {
//   const path = window.location.pathname;

//   const activeLink = document.querySelector(
//     `#sidebar_materi .sidebar-sublink[href="${path}"]`
//   );

//   if(activeLink){
//     activeLink.classList.add('active');

//     const submenu = activeLink.closest('.sidebar-submenu');
//     if(submenu){
//       submenu.classList.add('open');

//       const parentBtn = document.querySelector(
//         `#sidebar_materi .sidebar-link.has-sub[data-target="${submenu.id}"]`
//       );
//       if(parentBtn){
//         parentBtn.classList.add('active');
//         parentBtn.setAttribute('aria-expanded','true');

//         const chev = parentBtn.querySelector('.chev i');
//         if(chev){
//           chev.classList.remove('bi-chevron-down');
//           chev.classList.add('bi-chevron-up');
//         }
//       }
//     }
//   }
// });



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
            { drop: {} },   // Soal 1
            { a:'', b:'', c:'' },   // Soal 2
            { x:'', y:'', z:'' }  // Soal 3
        ];

        /* =====================================================
        DATA SOAL
        ===================================================== */
        const soal = [

            /* ================= SOAL 1 ================= */
        {
            render: () => `
                <p><strong>1. Cocokkan syarat kesamaan matriks berikut!</strong></p>

                <table class="tabel-soal">
                    <tr>
                        <th>Syarat Kesamaan Matriks</th>
                        <th>Jawaban</th>
                    </tr>
                    <tr>
                        <td>a. Kedua matriks harus memiliki ....</td>
                        <td><div class="drop-box1" data-ans="ordo"></div></td>
                    </tr>
                    <tr>
                        <td>b. Setiap elemen yang seletak harus ....</td>
                        <td><div class="drop-box1" data-ans="nilai"></div></td>
                    </tr>
                    <tr>
                        <td>c. Jika salah satu elemen berbeda, maka ....</td>
                        <td><div class="drop-box1" data-ans="tidaksama"></div></td>
                    </tr>
                </table>

                <p><strong>Pilihan jawaban:</strong></p>
                <div class="opsi-jawaban-1">
                    <div class="opsi1" draggable="true" data-val="nilai">Bernilai sama</div>
                    <div class="opsi1" draggable="true" data-val="tidaksama">Matriks tidak sama</div>
                    <div class="opsi1" draggable="true" data-val="ordo">Ordo yang sama</div>
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
                userAnswer[0].drop?.nilai === 'nilai' &&
                userAnswer[0].drop?.tidaksama === 'tidaksama'
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
    // OPSI JAWABAN
    // ======================
    opsis.forEach(op => {

        // cegah teks terseleksi
        op.addEventListener('selectstart', e => e.preventDefault());

        // ===== DESKTOP =====
        op.addEventListener('dragstart', e => {
            dragged = op;
            e.dataTransfer.setData('text/plain', op.dataset.val);
            e.dataTransfer.setDragImage(op, op.offsetWidth / 2, op.offsetHeight / 2);
        });

        // ===== MOBILE =====
        op.addEventListener('touchstart', function () {
            dragged = this;
            this.classList.add('dragging');
        });

        op.addEventListener('touchmove', function (e) {
            e.preventDefault();

            const touch = e.touches[0];

            this.style.position = 'fixed';
            this.style.left = (touch.clientX - this.offsetWidth / 2) + 'px';
            this.style.top = (touch.clientY - this.offsetHeight / 2) + 'px';
            this.style.zIndex = '9999';
            this.style.pointerEvents = 'none';
        });

        op.addEventListener('touchend', function (e) {

            const touch = e.changedTouches[0];
            const target = document.elementFromPoint(touch.clientX, touch.clientY);

            const dropzone = target?.closest('.drop-box1');

            if (dropzone) {

                // kosongkan dulu box
                dropzone.innerHTML = '';
                dropzone.appendChild(this);

                const key = dropzone.dataset.ans;
                userAnswer[0].drop[key] = this.dataset.val;

            } else {

                // balik ke tempat opsi
                opsiContainer.appendChild(this);

                Object.keys(userAnswer[0].drop).forEach(k => {
                    if (userAnswer[0].drop[k] === this.dataset.val) {
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

            box.innerHTML = '';
            box.appendChild(dragged);

            userAnswer[0].drop[box.dataset.ans] = dragged.dataset.val;
        });

    });

    // ======================
    // KEMBALI KE OPSI
    // ======================
    opsiContainer.addEventListener('dragover', e => e.preventDefault());

    opsiContainer.addEventListener('drop', e => {
        e.preventDefault();

        if (!dragged) return;

        opsiContainer.appendChild(dragged);

        Object.keys(userAnswer[0].drop).forEach(k => {
            if (userAnswer[0].drop[k] === dragged.dataset.val) {
                delete userAnswer[0].drop[k];
            }
        });
    });

}
        },


            /* ================= SOAL 2 ================= */
{
    render: () => `
        <p><strong>2. Perhatikan matriks \\( A \\) dan \\( B \\) di bawah ini!</strong></p>

        <div class="matrix-center">
\\[ A = \\begin{bmatrix} a + 2 & b \\\\ 6 & 3c - 1 \\end{bmatrix}, \\; B = \\begin{bmatrix} 5 & 4 \\\\ 6 & 8 \\end{bmatrix} \\]
</div>


        <p>Tentukan nilai <strong>a</strong>, <strong>b</strong>, dan <strong>c</strong> agar \\( A = B \\).</p>

        <div class="ordo-input">
            a =
            <input class="quiz-input small" id="nilai-a" placeholder="...">
        </div>

        <div class="ordo-input">
            b =
            <input class="quiz-input small" id="nilai-b" placeholder="...">
        </div>

        <div class="ordo-input">
            c =
            <input class="quiz-input small" id="nilai-c" placeholder="...">
        </div>
    `,

    restore: () => {
        document.getElementById('nilai-a').value = userAnswer[1].a || '';
        document.getElementById('nilai-b').value = userAnswer[1].b || '';
        document.getElementById('nilai-c').value = userAnswer[1].c || '';
    },

    check: () => {
        userAnswer[1].a = document.getElementById('nilai-a').value.trim();
        userAnswer[1].b = document.getElementById('nilai-b').value.trim();
        userAnswer[1].c = document.getElementById('nilai-c').value.trim();

        return (
            userAnswer[1].a === '3' &&   // a + 2 = 5
            userAnswer[1].b === '4' &&   // b = 4
            userAnswer[1].c === '3'      // 3c - 1 = 8
        );
    },

    reset: () => {
        userAnswer[1] = { a: '', b: '', c: '' };
    }
},



            /* ================= SOAL 3 ================= */
{
    render: () => `
        <p><strong>3. Perhatikan matriks \\( A \\) dan \\( B \\) di bawah ini!</strong></p>

        <div class="matrix-center">
        \\[
        A =
        \\begin{bmatrix}
        2x + 3 & 5 & \\sqrt{9} \\\\
        4 & y - 2 & 8 \\\\
        \\dfrac{z}{3} & 6 & 7
        \\end{bmatrix},
        \\;
        B =
        \\begin{bmatrix}
        9 & 5 & 3 \\\\
        4 & 6 & 8 \\\\
        2 & 6 & 7
        \\end{bmatrix}
        \\]
        </div>

        <p>Jika \\( A = B \\), tentukan nilai <strong>x</strong>, <strong>y</strong>, dan <strong>z</strong>.</p>

        <div class="ordo-input">
            x =
            <input class="quiz-input small" id="nilai-x" placeholder="...">
        </div>

        <div class="ordo-input">
            y =
            <input class="quiz-input small" id="nilai-y" placeholder="...">
        </div>

        <div class="ordo-input">
            z =
            <input class="quiz-input small" id="nilai-z" placeholder="...">
        </div>
    `,

    restore: () => {
        document.getElementById('nilai-x').value = userAnswer[2].x || '';
        document.getElementById('nilai-y').value = userAnswer[2].y || '';
        document.getElementById('nilai-z').value = userAnswer[2].z || '';
    },

    check: () => {
        userAnswer[2].x = document.getElementById('nilai-x').value.trim();
        userAnswer[2].y = document.getElementById('nilai-y').value.trim();
        userAnswer[2].z = document.getElementById('nilai-z').value.trim();

        return (
            userAnswer[2].x === '3' &&   // 2x + 3 = 9
            userAnswer[2].y === '8' &&   // y - 2 = 6
            userAnswer[2].z === '6'      // z/3 = 2
        );
    },

    reset: () => {
        userAnswer[2] = { x: '', y: '', z: '' };
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
                return Object.keys(userAnswer[0].drop).length === 3;
            }

            // Soal 2 (drag & drop)
            if (i === 1) {
    return (
        userAnswer[1].a !== '' &&
        userAnswer[1].b !== '' &&
        userAnswer[1].c !== ''
    );
}


            // Soal 3 (isian transpos)
            if (i === 2) {
    return (
        userAnswer[2].x !== '' &&
        userAnswer[2].y !== '' &&
        userAnswer[2].z !== ''
    );
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
    userAnswer[0] = { drop:{} };
    userAnswer[1] = { a:'', b:'', c:'' };
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
                materi_slug: 'kesamaan_matriks',
                sub_materi_slug: 'mari-mencoba-kesamaan-matriks'
            })
        })
        .then(res => res.json())
        .then(() => {

            const btn = document.querySelector(
                '.btn-next-slide[data-check="mari-mencoba-kesamaan-matriks"]'
            );

            if(btn){
                btn.dataset.allowed = "1";
            }

            showPopup(
                `<b>Luar Biasa! 🎉</b><br>
                Semua jawaban benar: <b>${score}/${soal.length}</b><br>
                Tombol Selanjutnya telah dibuka.`,
                () => {

                    soal.forEach(s => {
                        delete s.isChecked;
                        delete s.isCorrect;
                    });

                    userAnswer[0] = { drop:{} };
                    userAnswer[1] = { a:'', b:'', c:'' };
                    userAnswer[2] = { x:'', y:'', z:'' };

                    idx = 0;
                    completed = 0;

                    renderSoal();
                    updateQuizProgress();
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
                userAnswer[1] = { a:'', b:'', c:'' };
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
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {

  const slides = Array.from(document.querySelectorAll(".materi-slide"));
  const indicator = document.getElementById("slideIndicator");
  let index = 0;

  if (!slides.length) return;

  const unlocked = @json($progress);

const mapping = [
  'penyelesaian-kesamaan-1',
  'penyelesaian-kesamaan-2',
  'mari-mencoba-kesamaan',
  'kuis-kesamaan'
];

if (indicator) {
  indicator.innerHTML = ""; // reset dulu

  slides.forEach((_, i) => {
    const dot = document.createElement("span");
    dot.textContent = i + 1;

    const slug = mapping[i];
    const currentHash = location.hash.replace('#','');

const isOpen = unlocked.includes(slug) || slug === currentHash || i === 0;

    if (isOpen) {
      dot.onclick = () => showSlide(i);
    } else {
      dot.classList.add("locked");
    }

    indicator.appendChild(dot);
  });
}

  // ===== INDIKATOR =====
  // if (indicator) {
  //   // slides.forEach((_, i) => {
  //   //   const dot = document.createElement("span");
  //   //   dot.textContent = i + 1;
  //   //   dot.onclick = () => showSlide(i);
  //   //   indicator.appendChild(dot);
  //   // });
  // }

  const dots = indicator ? [...indicator.children] : [];

  function updateIndicator(i){
    dots.forEach(d => d.classList.remove("active"));
    dots[i]?.classList.add("active");
  }

  function showSlide(i){

  if(i < 0 || i >= slides.length) return;

  slides.forEach(s => s.classList.remove("active"));
  slides[i].classList.add("active");

  index = i;
  updateIndicator(i);

  const section = slides[i].dataset.section;

  if(section){

    // 🔥 INI FIX UTAMA
    location.hash = section;

    // 🔥 PASTIKAN SIDEBAR LANGSUNG AKTIF
    if(window.activateSidebarFor){
      activateSidebarFor(section);
    }
  }
}

  // ===== NEXT / PREV =====
  document.addEventListener("click", e => {

  // ===== NEXT =====
  if(e.target.closest(".btn-next-slide")){

    const nextIndex = index + 1;
    if(nextIndex >= slides.length) return;

    const nextSection = slides[nextIndex].dataset.section;

    fetch("{{ route('progress.unlock') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify({
        materi_slug: "kesamaan_matriks", // 🔥 WAJIB
        sub_materi_slug: nextSection
      })
    })
    .then(res => res.json())
    .then(() => {

      // 🔥 update unlocked lokal (penting biar gak ke-lock lagi)
      if (!unlocked.includes(nextSection)) {
        unlocked.push(nextSection);
      }

      // pindah slide
      showSlide(nextIndex);

      // buka indikator
      const dot = dots[nextIndex];
      if(dot) dot.classList.remove("locked");

      // buka sidebar
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

  // ===== PREV =====
  if(e.target.closest(".btn-prev-slide")){
    showSlide(index - 1);
  }

});

  // ===== SIDEBAR (INI KUNCI UTAMA) =====
  // ===== SIDEBAR FIX FINAL (SMART) =====
document.querySelectorAll('#sidebar_materi .sidebar-sublink')
  .forEach(link => {

    link.addEventListener("click", function (e) {

      const sections = this.dataset.section;
      const href = this.getAttribute("href");

      // 🚀 1. Kalau TIDAK ADA data-section → pindah halaman
      if (!sections) return;

      // 🚀 2. Kalau href beda halaman → pindah halaman
      if (href && !href.startsWith("#") && !href.includes(window.location.pathname)) {
        return;
      }

      // 🔒 3. Baru anggap sebagai slide
      e.preventDefault();

      const sectionList = sections.split(',');

      let idx = -1;

      sectionList.forEach(sec => {
        const found = slides.findIndex(s => s.dataset.section === sec);
        if (found !== -1 && idx === -1) {
          idx = found;
        }
      });

      if (idx !== -1) {
        showSlide(idx);
        history.replaceState(null, null, '#' + sectionList[0]);
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

<script>
  document.addEventListener("DOMContentLoaded", () => {

//   function renderMatrix(highlight = []) {

//   function h(val, key) {
//     if (highlight.includes(key)) {
//       return `\\bbox[8px,#4e73df]{\\color{white}{\\mathbf{${val}}}}`;
//     }
//     return val;
//   }

//   const matrixLatex = `
//   \\[
//   A =
//   \\begin{bmatrix}
//   ${h(2, 'a11')} & ${h(5, 'a12')} \\\\
//   ${h(4, 'a21')} & ${h(-3, 'a22')}
//   \\end{bmatrix}
//   \\qquad
//   B =
//   \\begin{bmatrix}
//   ${h(2, 'b11')} & ${h('\\sqrt{25}', 'b12')} \\\\
//   ${h('2 \\times 2', 'b21')} & ${h(-3, 'b22')}
//   \\end{bmatrix}
//   \\]
//   `;

//   document.getElementById("matrix-display").innerHTML = matrixLatex;

//   if (window.MathJax) {
//     MathJax.typesetPromise().then(() => {
//       const highlights = document.querySelectorAll('[style*="#4e73df"]');
//       highlights.forEach(el => el.classList.add("matrix-animate"));
//     });
//   }
// }
let contoh1StepsCorrect = [];
let contoh1Done = false;


  const steps = [
  {
    q: "Apakah bentuk elemen \\(a_{11}\\) dan \\(b_{11}\\) sama?",
    a: "ya",
    correct: "Benar, bentuk elemen \\(a_{11}\\) dan \\(b_{11}\\) sama yaitu \\(2\\)",
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["a11", "b11"]
  },
  {
    q: "Apakah bentuk elemen \\(a_{12}\\) dan \\(b_{12}\\) sama?",
    a: "tidak",
    correct: `
      Benar, elemen \\(a_{12}\\) dan \\(b_{12}\\) tidak sama karena:
      <br>\\(a_{12} = 5\\) dan \\(b_{12} = \\sqrt{25}\\)
      <br><br><b>Penjelasan:</b><br>
      karena bentuk berbeda, hitung dulu:
      <br>\\(\\sqrt{25} = 5\\)
      <br><br>Jadi nilai elemen \\(a_{12}\\) dan \\(b_{12}\\) sama yaitu \\(5\\)
    `,
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["a12", "b12"]
  },
  {
    q: "Apakah bentuk elemen \\(a_{21}\\) dan \\(b_{21}\\) sama?",
    a: "tidak",
    correct: `
  Benar, elemen \\(a_{21}\\) dan \\(b_{21}\\) tidak sama karena:
  <br>\\(a_{21} = 4\\) dan \\(b_{21} = 2 \\times 2\\)
  <br><br><b>Penjelasan:</b><br>
  karena bentuk berbeda, hitung dulu:
  <br>\\(2 \\times 2 = 4\\)
  <br><br>Jadi nilai elemen \\(a_{21}\\) dan \\(b_{21}\\) sama yaitu \\(4\\)
`,
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["a21", "b21"]
  },
  {
    q: "Apakah bentuk elemen \\(a_{22}\\) dan \\(b_{22}\\) sama?",
    a: "ya",
    correct: "Benar, keduanya \\(-3\\)",
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["a22", "b22"]
  }
];

contoh1StepsCorrect = new Array(steps.length).fill(false);

  // renderMatrix();

  let current = 0;
  const userAnswers = {};

  const qEl = document.getElementById("interactive-question");
  const feedback = document.getElementById("interactive-feedback");
  // const btnYa = document.getElementById("btn-ya");
  // const btnTidak = document.getElementById("btn-tidak");
  const radioYa = document.getElementById("radio-ya");
  const radioTidak = document.getElementById("radio-tidak");
  const btnNext = document.getElementById("btn-next-step");
  const btnPrev = document.getElementById("btn-prev-step");
  const btnRestart = document.getElementById("btn-restart");
  const optionsBox = document.querySelector(".interactive-options");

//   function clearHighlight() {
//     document.querySelectorAll("td").forEach(td => {
//       td.classList.remove("highlight-blue");
//     });
//   }

//   function setHighlight(ids) {
//   clearHighlight();
//   ids.forEach(id => {
//     document.getElementById(id)?.classList.add("highlight-blue");
//   });
// }

function clearHighlight() {
  const ids = ['a11','a12','a21','a22','b11','b12','b21','b22'];

  ids.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.classList.remove("highlight-blue");
  });
}

function setHighlight(ids) {
  clearHighlight();

  ids.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.classList.add("highlight-blue");
  });
}

  function renderStep() {
    // 🔥 RESET UI NORMAL (SETIAP STEP)
btnNext.style.display = "inline-block";
btnRestart.classList.add("d-none");
optionsBox.style.display = "block";
  const step = steps[current];

  qEl.innerHTML = `<b>${step.q}</b>`;
  setHighlight(step.highlight);

  btnPrev.disabled = current === 0;

  const saved = userAnswers[current];

  radioYa.checked = false;
  radioTidak.checked = false;

  if (saved) {
    if (saved.answer === "ya") radioYa.checked = true;
    if (saved.answer === "tidak") radioTidak.checked = true;
    if (saved.isCorrect) {
      feedback.innerHTML = `<span style="color:green">${step.correct}</span>`;
      btnNext.disabled = false;
      btnNext.classList.remove("btn-secondary");
      btnNext.classList.add("btn-success");
    } else {
      feedback.innerHTML = `<span style="color:red">${step.wrong}</span>`;
      btnNext.disabled = true;
    }
  } else {
    feedback.innerHTML = "";
    btnNext.disabled = true;
    btnNext.classList.remove("btn-success");
    btnNext.classList.add("btn-secondary");
  }

  // 🔥 WAJIB
  if (window.MathJax) {
    MathJax.typesetPromise();
  }
  
}
  function checkAnswer(ans) {
  const step = steps[current];

  userAnswers[current] = {
    answer: ans,
    isCorrect: ans === step.a
  };

  if (ans === step.a) {
    contoh1StepsCorrect[current] = true;

    feedback.innerHTML = `<span style="color:green">${step.correct}</span>`;
    btnNext.disabled = false;
    btnNext.classList.remove("btn-secondary");
    btnNext.classList.add("btn-success");

    checkContoh1Complete();
  } else {
    feedback.innerHTML = `<span style="color:red">${step.wrong}</span>`;
  }

  // 🔥 TAMBAHKAN INI
  if (window.MathJax) {
    MathJax.typesetPromise();
  }
}

  radioYa.onchange = () => checkAnswer("ya");
  radioTidak.onchange = () => checkAnswer("tidak");

  btnNext.onclick = () => {
  current++;

  if (current < steps.length) {
    renderStep();
  } else {
    qEl.innerHTML = "<b>Selesai! Semua elemen sudah dibandingkan ✅</b>";
    feedback.innerHTML = "";

    btnNext.style.display = "none";
    btnRestart.classList.remove("d-none");

    optionsBox.style.display = "none"; // 🔥 sembunyikan radio

    clearHighlight();
  }
};

btnPrev.onclick = () => {
  if (current > 0) {
    current--;
    renderStep();
  }
};

btnRestart.onclick = () => {
  current = 0;

  for (let key in userAnswers) {
    delete userAnswers[key];
  }

  btnNext.style.display = "inline-block";
  btnRestart.classList.add("d-none");

  optionsBox.style.display = "block"; // 🔥 tampilkan lagi

  renderStep();
};

  renderStep();

  function checkContoh1Complete() {

  // cek semua step sudah benar
  const semuaBenar = contoh1StepsCorrect.every(v => v === true);

  if (semuaBenar && !contoh1Done) {

    contoh1Done = true;

    fetch('/progress/complete', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        materi_slug: 'kesamaan_matriks',
        sub_materi_slug: 'interaktif-contoh-1'
      })
    })
    .then(res => res.json())
    .then(() => {

      const btn = document.querySelector('[data-check="interaktif-contoh-1"]');
      if(btn){
        btn.dataset.allowed = "1";
      }

    });

  }
}
});



// ================= INTERAKTIF CONTOH 2 =================
document.addEventListener("DOMContentLoaded", () => {
let contoh2StepsCorrect = [];
let contoh2Done = false;
const steps2 = [
  {
    q: "Apakah bentuk elemen \\(a_{11}\\) dan \\(b_{11}\\) sama?",
    a: "tidak",
    correct: `
  Benar, elemen \\(a_{11}\\) dan \\(b_{11}\\) tidak sama karena:
  <br>\\(a_{11} = a + 2\\) dan \\(b_{11} = 14\\)

  <br><br><b>Penjelasan:</b><br>
  karena bentuk berbeda, hitung dulu:
  <br>\\(a + 2 = 14\\)
  <br>Kedua ruas dikurang \\(a\\)
  <br>\\(a + 2 - 2 = 14 - 2\\)
  <br>\\(a = 12\\)

  <br><br>Jadi nilai elemen \\(a_{11}\\) dan \\(b_{11}\\) sama yaitu \\(14\\), dimana nilai \\(a = 12\\).
`,
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["c_a11","c_b11"]
  },
  {
    q: "Apakah bentuk elemen \\(a_{12}\\) dan \\(b_{12}\\) sama?",
    a: "tidak",
    correct: `
  Benar, elemen \\(a_{12}\\) dan \\(b_{12}\\) tidak sama karena:
  <br>\\(a_{12} = 3b\\) dan \\(b_{12} = 24\\)

  <br><br><b>Penjelasan:</b><br>
  karena bentuk berbeda, hitung dulu:
  <br>\\(3b = 24\\)
  <br>Kedua ruas dibagi 3
  <br>\\(\\frac{3b}{3} = \\frac{24}{3}\\)
  <br>\\(b = 8\\)

  <br><br>Jadi nilai elemen \\(a_{12}\\) dan \\(b_{12}\\) sama yaitu \\(24\\), dimana nilai \\(b = 8\\).
`,
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["c_a12","c_b12"]
  },
  {
    q: "Apakah bentuk elemen \\(a_{21}\\) dan \\(b_{21}\\) sama?",
    a: "tidak",
   correct: `
  Benar, elemen \\(a_{21}\\) dan \\(b_{21}\\) tidak sama karena:
  <br>\\(a_{21} = 2b - c\\) dan \\(b_{21} = 14\\)

  <br><br><b>Penjelasan:</b><br>
  karena bentuk berbeda, hitung dulu:
  <br>\\(2b - c = 14\\)
  <br>Substitusi \\(b = 8\\):
  <br>\\(16 – 14 = c\\)
  <br>\\(2 = c\\)
  <br>\\(c = 2\\)

  <br><br>Jadi nilai elemen \\(a_{21}\\) dan \\(b_{21}\\) sama yaitu \\(14\\), dimana  nilai \\(c = 2\\).
`,
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["c_a21","c_b21"]
  },
  {
    q: "Apakah bentuk elemen \\(a_{22}\\) dan \\(b_{22}\\) sama?",
    a: "tidak",
    correct: `
  Benar, elemen \\(a_{22}\\) dan \\(b_{22}\\) tidak sama karena:
  <br>\\(a_{22} = a + b\\) dan \\(b_{22} = 20\\)

  <br><br><b>Penjelasan:</b><br>
  karena bentuk berbeda, hitung dulu:
  <br>\\(a + b = 20\\)
  <br>Substitusi \\(a = 12\\) dan \\(b = 8\\):
  <br>\\(12 + 8 = 20\\)

  <br><br>Jadi nilai elemen \\(a_{22}\\) dan \\(b_{22}\\) sama yaitu \\(20\\)
`,
    wrong: "Belum tepat, coba jawab lagi",
    highlight: ["c_a22","c_b22"]
  }
];
contoh2StepsCorrect = Array(steps2.length).fill(false);
let current2 = 0;
const userAnswers2 = {};

const qEl2 = document.getElementById("interactive-question-2");
const feedback2 = document.getElementById("interactive-feedback-2");
const radioYa2 = document.getElementById("radio2-ya");
const radioTidak2 = document.getElementById("radio2-tidak");
const btnNext2 = document.getElementById("btn-next-step-2");
const btnPrev2 = document.getElementById("btn-prev-step-2");
const btnRestart2 = document.getElementById("btn-restart-2");
const optionsBox2 = document.querySelector(".interactive-options-2");

function clearHighlight2(){
  const ids = ["c_a11","c_a12","c_a21","c_a22","c_b11","c_b12","c_b21","c_b22"];
  ids.forEach(id=>{
    document.getElementById(id)?.classList.remove("highlight-blue");
  });
}

function setHighlight2(ids){
  clearHighlight2();
  ids.forEach(id=>{
    document.getElementById(id)?.classList.add("highlight-blue");
  });
}

function renderStep2(){

  btnNext2.style.display = "inline-block";
  btnRestart2.classList.add("d-none");
  optionsBox2.style.display = "block";

  const step = steps2[current2];

  qEl2.innerHTML = `<b>${step.q}</b>`;
  setHighlight2(step.highlight);

  btnPrev2.disabled = current2 === 0;

  const saved = userAnswers2[current2];

  radioYa2.checked = false;
  radioTidak2.checked = false;

  if(saved){
    if(saved.answer === "ya") radioYa2.checked = true;
    if(saved.answer === "tidak") radioTidak2.checked = true;

    if(saved.isCorrect){
      feedback2.innerHTML = `<span style="color:green">${step.correct}</span>`;
      btnNext2.disabled = false;
    }else{
      feedback2.innerHTML = `<span style="color:red">${step.wrong}</span>`;
      btnNext2.disabled = true;
    }
  } else {
    feedback2.innerHTML = "";

    btnNext2.disabled = true;
    btnNext2.classList.remove("btn-success");
    btnNext2.classList.add("btn-secondary");
}

  if(window.MathJax) MathJax.typesetPromise();
}

function checkAnswer2(ans){
  const step = steps2[current2];

  userAnswers2[current2] = {
    answer: ans,
    isCorrect: ans === step.a
  };

  if(ans === step.a){
    contoh2StepsCorrect[current2] = true;
    feedback2.innerHTML = `<span style="color:green">${step.correct}</span>`;

    btnNext2.disabled = false;
    btnNext2.classList.remove("btn-secondary");
    btnNext2.classList.add("btn-success");

    checkContoh2Complete();
  } else {
    feedback2.innerHTML = `<span style="color:red">${step.wrong}</span>`;

    btnNext2.disabled = true;
    btnNext2.classList.remove("btn-success");
    btnNext2.classList.add("btn-secondary");
}

  if(window.MathJax) MathJax.typesetPromise();
}

radioYa2.onchange = ()=>checkAnswer2("ya");
radioTidak2.onchange = ()=>checkAnswer2("tidak");

btnNext2.onclick = ()=>{
  current2++;

  if(current2 < steps2.length){
    renderStep2();
  } else {
    qEl2.innerHTML = "<b>Selesai! Semua elemen sudah dibandingkan ✅</b>";
    feedback2.innerHTML = "";

    btnNext2.style.display = "none";
    btnRestart2.classList.remove("d-none");
    optionsBox2.style.display = "none";

    clearHighlight2();
  }
};

btnPrev2.onclick = ()=>{
  if(current2 > 0){
    current2--;
    renderStep2();
  }
};

btnRestart2.onclick = ()=>{
  current2 = 0;
  Object.keys(userAnswers2).forEach(k=>delete userAnswers2[k]);

  renderStep2();
};

renderStep2();

function checkContoh2Complete() {

  const semuaBenar = contoh2StepsCorrect.every(v => v === true);

  if (semuaBenar && !contoh2Done) {

    contoh2Done = true;

    fetch('/progress/complete', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        materi_slug: 'kesamaan_matriks',
        sub_materi_slug: 'interaktif-contoh-2'
      })
    })
    .then(() => {

      // 🔓 unlock tombol slide berikutnya
      const btn = document.querySelector('[data-check="interaktif-contoh-2"]');
      if(btn){
        btn.dataset.allowed = "1";
      }

    });

  }
}
});

</script>

<script>
function unlockMateri(subSlug) {
    fetch('/kesamaan_dua_matriks/unlock', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            sub_materi_slug: subSlug
        })
    })
    .then(() => {
        location.reload(); // 🔥 penting!
    });
}
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
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
