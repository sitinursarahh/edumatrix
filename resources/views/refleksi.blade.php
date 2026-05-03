<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>{{ $judul }}</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
body{ background:#fbf9d1; }
.card-refleksi{
    max-width:800px;
    margin:60px auto;
    background:#fff;
    padding:40px;
    border-radius:18px;
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}
h1{ color:#9a3f3f; font-weight:800; }
label{ font-weight:600; }

.checkmark-wrapper{
    display:flex;
    justify-content:center;
}
.checkmark{
    width:90px;
    height:90px;
    border-radius:50%;
    border:4px solid #198754;
    color:#198754;
    font-size:48px;
    font-weight:bold;
    display:flex;
    align-items:center;
    justify-content:center;
    animation:pop .4s ease-out forwards;
}
@keyframes pop{
    0%{transform:scale(0);opacity:0}
    80%{transform:scale(1.1)}
    100%{transform:scale(1);opacity:1}
}
.back-button {
    position: fixed;   /* 🔥 ini bikin tidak ikut scroll */
    top: 20px;
    left: 20px;
    z-index: 9999;

    width: 45px;
    height: 45px;

    border-radius: 50%;
    background: #c1856d;

    display: flex;
    align-items: center;
    justify-content: center;

    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    text-decoration: none;
    color: #ffffff;

    transition: 0.3s;
}

.back-button:hover {
    background: #e6cfa9;
    transform: scale(1.08);
}


</style>
</head>

<body>
<a href="{{ url()->previous() }}" class="back-button">
    <i class='bx bx-arrow-back'></i>
</a>
<div class="card-refleksi">
    <h1>{{ $judul }}</h1>
    <p class="text-muted">Jawablah refleksi berikut dengan jujur dan singkat.</p>

    <form id="refleksiForm">
        <input type="hidden" id="backUrl" value="{{ $back_url }}">

    @csrf


        <!-- identitas materi -->
        <input type="hidden" name="materi_kode" value="{{ $materi_kode }}">
        <input type="hidden" name="submateri_kode" value="{{ $submateri_kode }}">

        @foreach($pertanyaan as $i => $p)
<div class="mb-3">
    <label>{{ $i+1 }}. {{ $p }}</label>

    @if($i == count($pertanyaan)-1)
        <!-- soal terakhir = dropdown -->
        <select class="form-select" name="jawaban_{{ $i+1 }}" required>
            <option value="">-- Pilih --</option>
            <option value="Sangat paham">Sangat paham</option>
            <option value="Cukup paham">Cukup paham</option>
            <option value="Belum paham">Belum paham</option>
        </select>
    @else
        <textarea class="form-control" name="jawaban_{{ $i+1 }}" rows="3" required></textarea>
    @endif

</div>
@endforeach


        <div class="text-end">
            <button class="btn btn-success px-4">Kirim Refleksi</button>
        </div>
    </form>
</div>


<!-- MODAL SUCCESS -->
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">

      <div class="checkmark-wrapper mb-3">
        <div class="checkmark">✓</div>
      </div>

      <h4 class="text-success fw-bold">Refleksi Terkirim</h4>
      <p class="text-muted">Terima kasih telah mengisi refleksi.</p>

      <div class="d-flex justify-content-between gap-3 mt-4">

      @php
    $isGlobal = !request()->has('materi');
@endphp

  <!-- KEMBALI KE MATERI SEBELUMNYA -->
  <button type="button" class="btn btn-outline-secondary flex-fill"
        id="btnBackMateri">

    @if($isGlobal)
        ⬅ Kembali Belajar
    @else
        ⬅ Kembali ke Materi
    @endif

</button>

  @php
    $isGlobal = !request()->has('materi');
@endphp

<button type="button"
        class="btn btn-success flex-fill d-flex align-items-center justify-content-center gap-2"
        id="btnNextMateri">

    @if($isGlobal)
        Lanjut Mengerjakan Uji Kompetensi ➡
    @elseif($materi_kode === 'determinan_invers_matriks')
        Lanjut Mengisi Refleksi Semua Materi ➡
    @else
        Lanjut ke Materi Berikutnya ➡
    @endif

    <span class="icon-box ms-2">
        <i class="bi bi-arrow-right"></i>
    </span>

</button>


</div>


    </div>
  </div>
</div>

</body>
</html>

<script>
document.addEventListener("DOMContentLoaded", function () {

    console.log("JS AKTIF"); // 🔥 cek ini dulu

    const form = document.getElementById('refleksiForm');

    if (!form) {
        console.error("Form tidak ditemukan!");
        return;
    }

    form.addEventListener('submit', function(e){
        e.preventDefault();

        console.log("FORM DISUBMIT"); // 🔥 harus muncul

        fetch("{{ route('refleksi.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: new FormData(form)
        })
        .then(res => res.json())
.then(res => {

    console.log("RESPONSE:", res); // debug

    if(res.status === 'success'){

        const modalEl = document.getElementById('successModal');

        if (!modalEl) {
            console.error("Modal tidak ditemukan!");
            alert("Berhasil, tapi modal tidak ada");
            return;
        }

        const modal = new bootstrap.Modal(modalEl);
        modal.show();

        form.reset();
    }
})
    });

});
</script>

<script>
document.getElementById('btnBackMateri').addEventListener('click', function () {

    const isGlobal = "{{ request()->has('materi') ? '0' : '1' }}";

    if (isGlobal === "1") {
        // 🔥 kembali ke materi awal (pengertian matriks slide 0)
        window.location.href = "/materi_pengertian_matriks#slide-0";
        return;
    }

    // 🔥 selain itu → kembali ke materi sebelumnya
    window.location.href = "{{ $back_url ?? '/dashboard' }}";

});
</script>

<script>
// document.getElementById('btnBackMateri').addEventListener('click', function () {
//     window.location.href = "{{ $back_url }}";
// });



document.getElementById('btnNextMateri').addEventListener('click', function () {

    const isGlobal = "{{ request()->has('materi') ? '0' : '1' }}";

    if (isGlobal === "1") {
    // 🔥 refleksi global → uji kompetensi (petunjuk kuis)
    window.location.href = "/petunjuk_penggunaan_kuis?quiz_id=7";
    return;
}

    @if(isset($materi_kode) && $materi_kode === 'determinan_invers_matriks')
        // 🔥 dari determinan → refleksi global
        window.location.href = "/refleksi";
        return;
    @endif

    // 🔥 selain itu → materi berikutnya
    window.location.href = "{{ $next_url }}#slide-0";

});
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById("btnLanjutJenis").addEventListener("click", function() {

    const userId = "{{ auth()->id() }}";

    // Unlock hanya slide pertama (index 0)
    localStorage.setItem(
        `unlock_slide_jenis_matriks_user_${userId}`,
        "0"
    );

    window.location.href = "{{ route('jenis_matriks') }}";

});
</script>
