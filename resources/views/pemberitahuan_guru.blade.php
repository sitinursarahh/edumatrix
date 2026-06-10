<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemberitahuan</title>
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}"> <!-- Link ke file CSS untuk halaman ini -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Link ke file CSS untuk navbar & sidebar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Tambahkan link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.header')

<div class="d-flex">
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 p-4">

        <div class="info-pemberitahuan-header">
            <h1>PEMBERITAHUAN</h1>
        </div>

        <div class="pemberitahuan-info-box p-4"
             style="background:#fff9d5; border-radius:15px;
                    box-shadow:0 6px 20px rgba(0,0,0,0.20);">

            <!-- Tombol Tambah -->
            <button class="btn btn-primary mb-3" onclick="toggleForm()">
                + Tambahkan Pemberitahuan
            </button>
            <div>Klik di kotak teks untuk mengedit</div>

            <!-- FORM TAMBAH -->
            <div id="formBox"
                 style="display:none;
                        background:#c1856d;
                        color:white;
                        padding:20px;
                        border-radius:12px;">

                <form method="POST" action="/pemberitahuan">
                    @csrf

                    <textarea name="isi"
          class="form-control mb-3"
          rows="3"
          placeholder="Tulis pemberitahuan di sini..."
          style="background:rgba(255,255,255,0.15);
                 color:white;
                 border:1px solid rgba(255,255,255,0.4);">
</textarea>

                    <div class="d-flex justify-content-between">
                        <button type="reset"
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>

                        <button type="submit"
                                class="btn btn-success btn-sm">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>

            <hr>

            <!-- LIST PEMBERITAHUAN -->
            @forelse($data as $item)
                <div class="mb-3 p-3 rounded"
                     style="background:#c1856d;
                            color:white;">

                    <form method="POST"
                          action="/pemberitahuan/{{ $item->id }}">
                        @csrf
                        @method('PUT')

                        <textarea name="isi"
                                  class="form-control mb-3"
                                  rows="3"
                                  style="background:rgba(255,255,255,0.15);
                                         color:white;
                                         border:1px solid rgba(255,255,255,0.4);">
{{ $item->isi }}
                        </textarea>

                        <div class="d-flex justify-content-between">

                            <!-- HAPUS -->
                            <button type="button"
        class="btn btn-danger btn-sm"
        onclick="confirmDelete({{ $item->id }})">
    Hapus
</button>

                            <!-- EDIT -->
                            <button type="submit"
                                class="btn btn-success btn-sm">
                            Kirim yang sudah di edit
                        </button>

                        </div>
                    </form>

                    <!-- FORM DELETE -->
                    <form id="delete{{ $item->id }}"
                          method="POST"
                          action="/pemberitahuan/{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>

            @empty
                <div class="text-center text-muted">
                    Belum ada pemberitahuan
                </div>
            @endforelse

        </div>

        <a href="{{ url()->previous() }}" class="btn-kembali mt-3">
            ← Kembali
        </a>

    </div>
</div>

<script>
function toggleForm() {
    // Mengambil elemen form.
    const box = document.getElementById("formBox");
    box.style.display = box.style.display === "none" ? "block" : "none";
}
</script>


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


@if(session('success'))
<div id="successPopup" class="popup-overlay">
    <div class="popup-box">
        <div class="checkmark-circle">
            <div class="checkmark draw"></div>
        </div>
        <div class="popup-text">
            {{ session('success') }}
        </div>
    </div>
</div>
@endif

@if(session('success'))
<script>
setTimeout(() => {
    const popup = document.getElementById('successPopup');
    if (popup) {
        popup.style.opacity = '0';
        popup.style.transition = '0.3s';
        setTimeout(() => popup.remove(), 300);
    }
}, 2000);
</script>
@endif

<!-- POPUP KONFIRMASI HAPUS -->
<div id="deletePopup" class="popup-overlay" style="display:none;">
    <div class="popup-box">
        <div style="font-size:18px; font-weight:600; margin-bottom:15px;">
            Anda yakin menghapus pemberitahuan ini?
        </div>

        <div class="d-flex justify-content-center gap-3">
            <button class="btn btn-secondary"
                    onclick="closeDeletePopup()">
                Tidak
            </button>

            <button class="btn btn-danger"
                    id="confirmDeleteBtn">
                Ya
            </button>
        </div>
    </div>
</div>

<script>
let deleteFormId = null;

function confirmDelete(id) {
    deleteFormId = 'delete' + id;
    document.getElementById('deletePopup').style.display = 'flex';
}

function closeDeletePopup() {
    document.getElementById('deletePopup').style.display = 'none';
}

document.getElementById('confirmDeleteBtn')
    .addEventListener('click', function() {

        if (deleteFormId) {
            document.getElementById(deleteFormId).submit();
        }
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