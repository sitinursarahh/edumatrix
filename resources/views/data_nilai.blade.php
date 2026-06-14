<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemberitahuan</title>
    <link rel="stylesheet" href="{{ asset('css/kelola_soal.css') }}"> <!-- Link ke file CSS untuk halaman ini -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Link ke file CSS untuk navbar & sidebar -->
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/data_siswa.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Tambahkan link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


@include('layouts.header')

<div class="d-flex">
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 p-4">

        <div class="info-pemberitahuan-header">
            <h1>DATA NILAI</h1>
        </div>



        <div class="filter-container mb-3 d-flex justify-content-between align-items-center">

    <!-- Filter Kelas -->
    <div class="d-flex align-items-center gap-2">
        <label class="filter-label">Filter Kelas:</label>
        <select id="filterKelas" class="filter-select">
            <option value="">Semua Kelas</option>
            <option value="XI IPA 1">XI IPA 1</option>
            <option value="XI IPA 2">XI IPA 2</option>
            <option value="XI IPS 1">XI IPS 1</option>
            <option value="XI IPS 2">XI IPS 2</option>
        </select>
    </div>

    <!-- Search -->
    <div class="search-wrapper">
        <i class="bi bi-search search-icon"></i>
        <input type="text" id="searchInput" class="search-input" placeholder="Cari nama atau email...">
    </div>

</div>


<div class="d-flex justify-content-end gap-2 mb-3">

    <a id="btnPdf" href="{{ route('data_nilai.export.pdf') }}" class="btn btn-danger">
    <i class="bi bi-file-earmark-pdf"></i> Export PDF
</a>

<a id="btnExcel" href="{{ route('data_nilai.export.excel') }}" class="btn btn-success">
    <i class="bi bi-file-earmark-excel"></i> Export Excel
</a>

</div>

<form method="GET" class="d-flex align-items-center gap-2">
    <label class="mb-0">Tampilkan</label>

    <select name="per_page"
            class="form-select form-select-sm"
            style="width:100px"
            onchange="this.form.submit()">

        <option value="10" {{ request('per_page',10)==10 ? 'selected' : '' }}>10</option>
        <option value="20" {{ request('per_page')==20 ? 'selected' : '' }}>20</option>
        <option value="30" {{ request('per_page')==30 ? 'selected' : '' }}>30</option>
        <option value="50" {{ request('per_page')==50 ? 'selected' : '' }}>50</option>
        <option value="100" {{ request('per_page')==100 ? 'selected' : '' }}>100</option>

    </select>

    <span>data</span>
</form>
<br>

        <div class="table-responsive-custom table-scroll">
    <table class="table table-bordered align-middle text-center">
        <thead class="table-secondary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>

                @foreach($quizzes as $quiz)
    <th>{{ $quiz->title }}</th>
@endforeach

<th>Nilai Keaktifan</th>
<th>Total Nilai</th>
            </tr>
        </thead>

        <tbody>
            @foreach($siswa as $index => $item)
            <tr>
                <td>
    {{ ($siswa->currentPage() - 1) * $siswa->perPage() + $index + 1 }}
</td>
                <td class="text-start">{{ $item->name }}</td>
                <td>
    {{ \App\Models\Kelas::where('id', $item->class_id)->value('name') ?? '-' }}
</td>

                @foreach($quizzes as $quiz)
<td>
    <input
        type="number"
        class="form-control"
        value="{{ $item->{'kuis_'.$quiz->id} }}"
        readonly
    >
</td>
@endforeach

<td>
    <div class="edit-wrapper">
        <input
            type="number"
            class="form-control keaktifan-input"
            value="{{ $item->nilai_keaktifan }}"
            data-user="{{ $item->id }}"
            readonly
        >

        <button class="btn-edit-keaktifan">
            <i class="fas fa-pen"></i>
        </button>
    </div>
</td>

<td>
    <strong>{{ $item->total_nilai }}</strong>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $siswa->links('pagination::bootstrap-5') }}
</div>

</div>

</div>



<!-- JavaScript untuk toggle sidebar -->
    <script>
        /* SIDEBAR TOGGLE */
        const sidebar = document.getElementById('sidebar');
        const content = document.querySelector('.main-content');
        const toggleSidebar = document.getElementById('sidebarToggle');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        });

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

        
    </script>

<!-- FILTERING -->
    <script>
const searchInput = document.getElementById("searchInput");
const filterKelas = document.getElementById("filterKelas");

function filterTable() {

    const searchValue = searchInput.value.toLowerCase().trim();
    const kelasValue = filterKelas.value.trim();

    document.querySelectorAll("tbody tr").forEach(row => {

        const nama = row.children[1].textContent.toLowerCase().trim();
        const kelas = row.children[2].textContent.trim();

        const matchSearch = nama.includes(searchValue);
        const matchKelas = kelasValue === "" || kelas === kelasValue;

        row.style.display =
            (matchSearch && matchKelas)
                ? ""
                : "none";
    });
}

searchInput.addEventListener("keyup", filterTable);
filterKelas.addEventListener("change", filterTable);
</script>

<script>
const btnPdf = document.getElementById("btnPdf");
const btnExcel = document.getElementById("btnExcel");

function updateExportLinks() {
    const kelas = filterKelas.value;

    let pdfUrl = "{{ route('data_nilai.export.pdf') }}";
    let excelUrl = "{{ route('data_nilai.export.excel') }}";

    if (kelas) {
        pdfUrl += "?kelas=" + encodeURIComponent(kelas);
        excelUrl += "?kelas=" + encodeURIComponent(kelas);
    }

    btnPdf.href = pdfUrl;
    btnExcel.href = excelUrl;
}

filterKelas.addEventListener("change", updateExportLinks);
</script>


<!-- <script>
document.querySelectorAll('.nilai-input').forEach(input => {
    input.addEventListener('change', function () {

        const userId = this.dataset.user;
        const quizId = this.dataset.quiz;
        const nilai = this.value;

        fetch("{{ route('data_nilai.update') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
    user_id: userId,
    nilai_keaktifan: nilai
})
        })
        .then(res => res.json())
        .then(data => {
            console.log("Berhasil update:", data);
        })
        .catch(err => {
            console.error("Error:", err);
            alert("Gagal menyimpan nilai");
        });

    });
});
</script> -->
<script>
document.addEventListener("DOMContentLoaded", function () {

  document.querySelectorAll(".btn-edit-keaktifan").forEach(button => {

    button.addEventListener("click", async function () {

      const wrapper = this.closest(".edit-wrapper");
      const input = wrapper.querySelector(".keaktifan-input");
      const icon = this.querySelector("i");

      // MODE EDIT
      if (input.hasAttribute("readonly")) {
        input.removeAttribute("readonly");
        input.focus();
        icon.classList.replace("fa-pen", "fa-paper-plane");
        return;
      }

      const userId = input.dataset.user;
      const nilai = input.value;

      try {
        await fetch("/data-nilai/update", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          body: JSON.stringify({
    user_id: userId,
    nilai_keaktifan: nilai
})
        });

        // 🔥 LANGSUNG ANGAP SUKSES
        input.setAttribute("readonly", true);
        icon.classList.replace("fa-paper-plane", "fa-pen");

        showPopup("Nilai berhasil diupdate", false);

setTimeout(() => {
    location.reload();
}, 1000);

      } catch (error) {
        console.error("ERROR:", error);

        showPopup("Gagal update", true);
      }

    });

  });

});


// POPUP
function showPopup(message, isError = false) {

  const old = document.querySelector(".popup-overlay");
  if (old) old.remove();

  const overlay = document.createElement("div");
  overlay.className = "popup-overlay";

  const content = document.createElement("div");
  content.className = "popup-content " + (isError ? "error" : "success");

  content.innerHTML = `
    <div class="icon">
      ${isError 
  ? '<i class="fas fa-times-circle"></i>' 
  : `
  <svg class="checkmark" viewBox="0 0 52 52">
    <circle class="checkmark-circle" cx="26" cy="26" r="25"/>
    <polyline class="checkmark-check" points="14,27 22,35 38,18"/>
  </svg>
`}
    </div>
    <div class="text">${message}</div>
  `;

  overlay.appendChild(content);
  document.body.appendChild(overlay);

  setTimeout(() => overlay.classList.add("show"), 10);

  setTimeout(() => {
    overlay.classList.remove("show");
    setTimeout(() => overlay.remove(), 300);
  }, 2000);
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const btn = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.main-content');

    if (!btn || !sidebar) return;

    btn.addEventListener('click', function () {

        sidebar.classList.toggle('collapsed');

        if (content) {
            content.classList.toggle('expanded');
        }

    });

});
</script>
</body>
</html>