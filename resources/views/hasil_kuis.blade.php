<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hasil Kuis</title>

<style>
:root{
    --c1:#9a3f3f;
    --c2:#c1856d;
    --c3:#e6cfa9;
    --c4:#fbf9d1;
}

body{
    margin:0;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Segoe UI', sans-serif;
    background: linear-gradient(135deg, var(--c3), var(--c4));
}

.result-card{
    background: var(--c4);
    padding:40px;
    width:420px;
    border-radius:20px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.2);
    text-align:center;
    border:4px solid var(--c2);
}

.result-card h2{
    margin-top:0;
    color:var(--c1);
    font-size:28px;
    margin-bottom:25px;
}

.score-box{
    background: var(--c3);
    border-radius:16px;
    padding:25px;
    margin-bottom:25px;
}

.score-box p{
    margin:10px 0;
    font-size:16px;
    color:#333;
}

.final-score{
    font-size:42px;
    font-weight:800;
    color:var(--c1);
    margin-top:10px;
}

/* ===== BUTTON AREA ===== */
.btn-group{
    display:flex;
    justify-content:space-between;
    gap:15px;
    margin-top:20px;
}

.btn-action{
    flex:1;
    padding:12px 18px;
    border-radius:30px;
    font-weight:bold;
    text-decoration:none;

    /* 🔥 PUSATKAN TEKS SEMPURNA */
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;

    transition:
        background 0.3s ease,
        transform 0.2s ease,
        box-shadow 0.2s ease,
        color 0.3s ease;
}


/* Ulangi */
.btn-repeat{
    background:var(--c2);
    color:var(--c1);
}

.btn-repeat:hover{
    background:var(--c1);
    color:var(--c4);
    transform: translateY(-2px);
}

/* Lanjut */
.btn-next{
    background:var(--c1);
    color:var(--c4);
}

.btn-next:hover{
    background:var(--c2);
    color:var(--c1);
    transform: translateY(-2px);
}

.kkm-warning{
    background:#fbeaea;
    color:#8a1f1f;
    padding:12px 16px;
    border-radius:12px;
    font-size:14px;
    margin-top:15px;
    border:1.5px dashed #c1856d;
}

.kkm-success{
    background:#e6f4ea;
    color:#1f6f43;
    padding:12px 16px;
    border-radius:12px;
    font-size:14px;
    margin-top:15px;
    border:1.5px dashed #7fbf9a;
}

</style>
</head>

<body>

<div class="result-card">
    <h2>
    🎉 {{ $quiz_id == 7 ? 'Hasil Uji Kompetensi' : 'Hasil Kuis' }} 🎉
</h2>

    <div class="score-box">
        <p>Jumlah Jawaban Benar</p>
        <p><strong>{{ $jumlahBenar }}</strong> dari <strong>{{ $jumlahSoal }}</strong> soal</p>

        <div class="final-score">
            {{ $nilai }}
        </div>
        <p>Nilai Akhir</p>
    </div>

    <!-- ===== TOMBOL ===== -->
    <!-- ===== TOMBOL ===== -->
<div class="btn-group">

    {{-- ================= UJI KOMPETENSI ================= --}}
    @if ($quiz_id == 7)

        {{-- ❌ BELUM LULUS --}}
        @if ($nilai < $kkm)
            <a href="{{ route('petunjuk.kuis', ['quiz_id' => $quiz_id]) }}"
               class="btn-action btn-repeat">
                Ulangi Uji Kompetensi
            </a>

        {{-- ✅ LULUS --}}
        @else
            <a href="{{ route('petunjuk.kuis', ['quiz_id' => $quiz_id]) }}"
               class="btn-action btn-repeat">
                Ulangi Uji Kompetensi
            </a>

            <a href="{{ route('dashboard') }}"
               class="btn-action btn-next">
                Kembali ke Dashboard
            </a>
        @endif

    {{-- ================= KUIS BIASA ================= --}}
    @else

        <a href="{{ route('petunjuk.kuis', ['quiz_id' => $quiz_id]) }}"
           class="btn-action btn-repeat">
            Ulangi Kuis
        </a>

        @if ($nilai >= $kkm && $materi_kode)
            <a href="{{ route('refleksi.index', [
                    'materi' => $materi_kode,
                    'back' => url()->previous()
                ]) }}"
               class="btn-action btn-next">
                Lanjut Mengisi Refleksi Pembelajaran
            </a>
        @endif

    @endif

</div>

@if($quiz_id == 7)

    @if($nilai < $kkm)
        <div class="kkm-warning">
            ❌ Nilai Anda belum mencapai <strong>KKM ({{ $kkm }})</strong>.<br>
            Silakan ulangi Uji Kompetensi untuk dapat menyelesaikan pembelajaran.
        </div>
    @else
        <div class="kkm-success">
            ✅ Selamat! Anda sudah menyelesaikan pembelajaran Matriks 🎉
        </div>
    @endif

@else

    @if($nilai < $kkm)
        <div class="kkm-warning">
            ⚠️ Nilai Anda belum mencapai <strong>KKM ({{ $kkm }})</strong>.<br>
            Silakan <strong>ulangi kuis</strong> untuk dapat melanjutkan ke refleksi dan materi berikutnya.
        </div>
    @else
        <div class="kkm-success">
            ✅ Selamat! Nilai Anda telah mencapai <strong>KKM ({{ $kkm }})</strong>.<br>
            Anda dapat melanjutkan ke refleksi pembelajaran.
        </div>
    @endif

@endif



</div>

</body>
</html>
