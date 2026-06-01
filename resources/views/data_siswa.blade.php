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
</head>


@include('layouts.header')

<div class="d-flex">
    
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 p-4">

        <div class="info-pemberitahuan-header">
            <h1>DATA SISWA</h1>
        </div>

<!-- FILTER & SEARCH -->
<div class="filter-container mb-3 d-flex justify-content-between align-items-center flex-wrap">

    <!-- Filter -->
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
        <input type="text" id="searchInput" class="search-input"
               placeholder="Cari nama atau email...">
    </div>

</div>


<!-- ACTION BUTTON -->
<div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

    <!-- KIRI -->
    <button class="btn btn-primary" onclick="openAddModal()">
        <i class="fas fa-plus"></i> Tambah Data
    </button>

    <!-- KANAN -->
    <div class="export-wrapper">

    <a href="{{ route('dataSiswa.exportPDF') }}" class="btn btn-danger me-2">
        <i class="fas fa-file-pdf"></i> Export PDF
    </a>

    <a href="{{ route('dataSiswa.exportExcel') }}" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Export Excel
    </a>

</div>

</div>

<div class="d-flex justify-content-between align-items-center mb-3">

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

</div>
        <div class="table-responsive-custom table-scroll">
    <table class="table table-bordered align-middle text-center">

        <thead class="table-secondary">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Email</th>
                <th>Riwayat Login</th>
                <th>Progress</th>
                <th>Aksi</th>
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
                <td>{{ $item->email }}</td>
                <td>{{ $item->login_count }}x</td>

                <!-- Progress -->
                <td style="min-width: 200px;">
                    <div class="d-flex align-items-center gap-2">

                        <div class="progress flex-grow-1" style="height: 18px;">
                            <div class="progress-bar bg-success"
                                role="progressbar"
                                style="width: {{ $item->progress_percent }}%">
                            </div>
                        </div>

                        <span style="min-width: 40px; font-weight: 600;">
                            {{ $item->progress_percent }}%
                        </span>

                    </div>
                </td>

                <!-- AKSI -->
                <td style="min-width: 180px;">

                    <button 
                        onclick="openEditModal('{{ $item->id }}','{{ $item->name }}','{{ \App\Models\Kelas::where('id', $item->class_id)->value('name') ?? '-' }}','{{ $item->email }}')" 
                        class="btn btn-warning btn-sm me-1">
                        <i class="fas fa-edit"></i>
                    </button>

                    <button 
                        type="button"
                        onclick="deleteSiswa('{{ $item->id }}')" 
                        class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="d-flex justify-content-center mt-4">
    {{ $siswa->links() }}
</div>
</div>

{{-- ===== MODAL EDIT (TARUH DI SINI) ===== --}}
<div id="editModal" class="custom-modal">
    <div class="custom-modal-content">

        <h5 class="modal-title text-center mb-4">Edit Data Siswa</h5>

        <form id="editForm" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="fw-semibold">Nama</label>
                <input type="text" name="name" id="editName" class="form-control input-custom">
            </div>

            <div class="mb-3">
                <label class="fw-semibold">Kelas</label>
                <input type="text" name="kelas" id="editKelas" class="form-control input-custom">
            </div>

            <div class="mb-4">
                <label class="fw-semibold">Email</label>
                <input type="email" name="email" id="editEmail" class="form-control input-custom">
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>

    </div>
</div>

<div id="addModal" class="custom-modal">
    <div class="custom-modal-content">

        <h5 class="modal-title text-center mb-3">Tambah Data Siswa</h5>

        <form id="addForm" method="POST">
            @csrf

            <!-- Nama -->
            <label class="fw-semibold">Nama</label>
            <input type="text" name="name" class="form-control input-custom mb-2" required>

            <!-- Kelas -->
            <label class="fw-semibold">Kelas</label>
            <input type="text" name="kelas" class="form-control input-custom mb-2" required>

            <!-- Email -->
            <label class="fw-semibold">Email</label>
            <input type="email" name="email" class="form-control input-custom mb-3" required>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="closeAddModal()">Batal</button>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>

    </div>
</div>


    </div>

</div>


<div id="successModal" class="custom-modal">
    <div class="custom-modal-content text-center">

        <svg class="checkmark" viewBox="0 0 52 52">
            <circle cx="26" cy="26" r="25"></circle>
            <path d="M14 27 L22 35 L38 18"></path>
        </svg>

        <h5 class="fw-bold mt-3">Berhasil!</h5>
        <p class="text-muted">Data siswa berhasil diperbarui</p>

        <button id="btnOk" type="button" class="btn btn-primary mt-2">OK</button>
    </div>
</div>

<div id="deleteSuccessModal" class="custom-modal">
    <div class="custom-modal-content text-center">

        <svg class="checkmark" viewBox="0 0 52 52">
            <circle cx="26" cy="26" r="25"></circle>
            <path d="M14 27 L22 35 L38 18"></path>
        </svg>

        <h5 class="fw-bold mt-3">Berhasil!</h5>
        <p class="text-muted">Data siswa berhasil dihapus</p>

        <button id="btnOkDelete" type="button" class="btn btn-primary mt-2">OK</button>
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
        const email = row.children[3].textContent.toLowerCase().trim();

        const matchSearch =
            nama.includes(searchValue) ||
            email.includes(searchValue);

        const matchKelas =
            kelasValue === "" ||
            kelas === kelasValue;

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
const filterSelect = document.getElementById("filterKelas");
const pdfBtn = document.getElementById("exportPdfBtn");
const excelBtn = document.getElementById("exportExcelBtn");

filterSelect.addEventListener("change", function() {
    const kelas = this.value;

    pdfBtn.href = "{{ route('dataSiswa.exportPDF') }}?kelas=" + kelas;
    excelBtn.href = "{{ route('dataSiswa.exportExcel') }}?kelas=" + kelas;
});
</script>

<script>
// ================== OPEN MODAL ==================
function openEditModal(id, name, kelas, email) {
    const modal = document.getElementById('editModal');

    modal.style.display = 'flex'; // 🔥 penting

    document.getElementById('editName').value = name;
    document.getElementById('editKelas').value = kelas;
    document.getElementById('editEmail').value = email;

    document.getElementById('editForm').action = '/data_siswa/' + id;
}

// ================== CLOSE MODAL ==================
function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}

// ================== CLOSE SUCCESS ==================
function closeSuccessModal() {
    document.getElementById('successModal').style.display = 'none';
    location.reload();
}

// ================== SUBMIT FORM ==================
document.getElementById('editForm').addEventListener('submit', function(e){
    e.preventDefault();

    let form = this;
    let action = form.action;
    let formData = new FormData(form);

    fetch(action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(res => {
        if (!res.ok) throw new Error("HTTP error " + res.status);
        return res.json();
    })
    .then(data => {

        closeModal();

        const successModal = document.getElementById('successModal');
        successModal.style.display = 'flex';

        // auto close 5 detik
        let autoClose = setTimeout(() => {
            closeSuccessModal();
        }, 5000);

        // klik OK
        document.getElementById('btnOk').onclick = function(){
            clearTimeout(autoClose);
            closeSuccessModal();
        };

    })
    .catch(err => {
        console.error(err);
        alert('Terjadi error');
    });
});
</script>

<script>
document.getElementById('editForm').addEventListener('submit', function(e){
    e.preventDefault();

    let form = this;
    let action = form.action;
    let formData = new FormData(form);

    fetch(action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        // tutup modal edit
        closeModal();

        // tampilkan modal sukses
        document.getElementById('successModal').style.display = 'flex';

        // optional: reload setelah 1.5 detik
        setTimeout(() => {
            location.reload();
        }, 5000);

    })
    .catch(err => {
        console.error(err);
        alert('Terjadi error');
    });
});
</script>

<script>
function deleteSiswa(id) {

    if (!confirm('Yakin ingin menghapus data ini?')) return;

    fetch('/data_siswa/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        },
        body: new URLSearchParams({
            _method: 'DELETE'
        })
    })
    .then(res => {
        if (!res.ok) throw new Error("Gagal hapus");
        return res.json();
    })
    .then(data => {

        const modal = document.getElementById('deleteSuccessModal');
        modal.style.display = 'flex';

        // auto close 5 detik
        let autoClose = setTimeout(() => {
            closeDeleteModal();
        }, 5000);

        // klik OK
        document.getElementById('btnOkDelete').onclick = function(){
            clearTimeout(autoClose);
            closeDeleteModal();
        };

    })
    .catch(err => {
        console.error(err);
        alert('Terjadi error saat menghapus');
    });
}

function closeDeleteModal() {
    document.getElementById('deleteSuccessModal').style.display = 'none';
    location.reload();
}
</script>

<script>
function openAddModal() {
    document.getElementById('addModal').style.display = 'flex';
}

function closeAddModal() {
    document.getElementById('addModal').style.display = 'none';
}

// SUBMIT TAMBAH DATA
document.getElementById('addForm').addEventListener('submit', function(e){
    e.preventDefault();

    let form = this;
    let formData = new FormData(form);

    fetch('/data_siswa', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        },
        body: formData
    })
    .then(async res => {

        let data;

        try {
            data = await res.json();
        } catch {
            throw new Error('Response bukan JSON (cek controller)');
        }

        if (!res.ok) {
            throw new Error(data.message || 'Gagal menambahkan data');
        }

        return data;
    })
    .then(data => {

        closeAddModal();

        // 🔥 tampilkan popup sukses
        const modal = document.getElementById('successModal');
        modal.style.display = 'flex';

        modal.querySelector('h5').innerText = 'Berhasil!';
        modal.querySelector('p').innerText = 'Data siswa berhasil ditambahkan';

        let autoClose = setTimeout(() => {
            location.reload();
        }, 5000);

        document.getElementById('btnOk').onclick = function(){
            clearTimeout(autoClose);
            location.reload();
        };

    })
    .catch(err => {
        console.error(err);

        // 🔥 tampilkan error asli (penting banget buat debug)
        alert(err.message);
    });
});
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