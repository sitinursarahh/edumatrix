<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<meta charset="UTF-8">
<title>Petunjuk Pengerjaan Kuis</title>

<style>
:root {
    --c1: #9a3f3f; /* merah tua */
    --c2: #c1856d; /* coklat muda */
    --c3: #e6cfa9; /* pastel kuning */
    --c4: #fbf9d1; /* pastel krem */
}

* {
    box-sizing: border-box;
    font-family: 'Segoe UI', system-ui, sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, var(--c3), var(--c4));
    display: flex;
    align-items: center;
    justify-content: center;
}

/* =============================
   CARD PETUNJUK
============================= */
.instruction-card {
    max-width: 760px;
    width: 90%;
    background: var(--c4);
    padding: 40px 45px;
    border-radius: 20px;
    box-shadow: 0 20px 45px rgba(0,0,0,0.15);
    animation: fadeUp 0.6s ease;
}

.instruction-card h1 {
    text-align: center;
    color: var(--c1);
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 10px;
}

.subtitle {
    text-align: center;
    color: #555;
    margin-bottom: 30px;
    font-size: 1rem;
}

/* =============================
   LIST PETUNJUK
============================= */
.instruction-list {
    padding-left: 22px;
    margin-bottom: 35px;
}

.instruction-list li {
    margin-bottom: 14px;
    line-height: 1.7;
    color: #333;
}

/* =============================
   TOMBOL MULAI
============================= */
.action-area {
    text-align: center;
}

.btn-start {
    background: linear-gradient(135deg, var(--c1), var(--c2));
    color: #fff;
    border: none;
    padding: 14px 42px;
    font-size: 1.1rem;
    font-weight: 700;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(154,63,63,0.4);
}

.btn-start:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 35px rgba(154,63,63,0.55);
}

/* =============================
   ANIMASI
============================= */
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* =============================
   RESPONSIVE
============================= */
@media (max-width: 600px) {
    .instruction-card {
        padding: 30px 25px;
    }

    .instruction-card h1 {
        font-size: 1.6rem;
    }
}

.back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 45px;
    height: 45px;
    background: #fbf9d1;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #333;
    font-size: 22px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
    z-index: 1000;
}

.back-button:hover {
    background: #9a3f3f; /* biru elegan */
    color: white;
    transform: scale(1.1);
}

/* =============================
   FIX MOBILE SPACING
============================= */
@media (max-width: 600px) {
    body {
        padding: 20px; /* biar ada jarak dari pinggir layar */
        align-items: flex-start; /* card turun dikit */
    }

    .back-button {
        top: 15px;
        left: 15px;
        width: 40px;
        height: 40px;
        font-size: 20px;
    }

    .instruction-card {
        margin-top: 60px; /* ⬅️ ini kunci biar gak ketabrak tombol */
        padding: 25px 20px;
    }
}
</style>

</head>
<body>

<a href="{{ url()->previous() }}" class="back-button">
    <i class='bx bx-arrow-back'></i>
</a>

<div class="instruction-card">
    <h1>Petunjuk Pengerjaan Soal</h1>
    <p class="subtitle">
        Bacalah petunjuk berikut dengan cermat sebelum mengerjakan.
    </p>

    <ol class="instruction-list">
        <li>Bacalah setiap soal dengan teliti sebelum menjawab.</li>
        <li>Setiap soal <strong>TIDAK</strong> harus dikerjakan secara berurutan (boleh tidak urut).</li>
        <li>Pilih satu jawaban yang paling tepat.</li>
        <li>Setelah memilih jawaban, klik tombol “Selanjutnya” untuk menyimpan jawaban.</li>
        <li>Pastikan semua jawaban sudah benar sebelum mengklik "Selesai".</li>
        <!-- <li>Jawaban yang telah dikirim tidak dapat diubah.</li> -->
        <li>Nilai akan ditampilkan setelah seluruh soal selesai.</li>
        <li>Jika terjadi kendala teknis, muat ulang halaman dan ulangi soal dari awal.</li>
        <li>Kerjakan soal secara mandiri dan jujur.</li>
    </ol>

    <div class="action-area">
    <button class="btn-start"
        onclick="window.location.href='{{ route('kuis.show', $quiz_id) }}'">
        Mulai
    </button>


</div>

</div>

</body>
</html>
