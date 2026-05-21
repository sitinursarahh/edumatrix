<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemberitahuan</title>
    <link rel="stylesheet" href="{{ asset('css/kelola_soal.css') }}"> <!-- Link ke file CSS untuk halaman ini -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Link ke file CSS untuk navbar & sidebar -->
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}">
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
            <h1>KELOLA SOAL</h1>
        </div>

    <!-- TOMBOL TAMBAH -->
    <a href="{{ route('questions.create', $quiz->id) }}" class="btn btn-success mb-3">
        + Tambah Soal
    </a>

    <div class="card shadow-sm">
    <div class="card-body p-0"> <!-- 🔥 biar tidak mepet keluar -->

        <div class="table-responsive-custom">
            <table class="table table-bordered align-middle mb-0">

                <thead class="table-secondary text-center">
                    <tr>
                        <th style="min-width:60px;">No.</th>
                        <th style="min-width:300px;">Soal</th>
                        <th style="min-width:250px;">Pilihan Jawaban</th>
                        <th style="min-width:180px;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($quiz->questions as $index => $question)
                    <tr>

                        <!-- NO -->
                        <td class="text-center fw-semibold">
                            {{ $index + 1 }}
                        </td>

                        <!-- SOAL -->
                        <td>
                            {!! $question->question_text !!}
                        </td>

                        <!-- OPTIONS -->
                        <td>
                            <ol type="A" class="mb-0 ps-3">
                                @foreach($question->options as $option)
                                    <li>
                                        {{ $option->option_text }}

                                        @if($option->is_correct)
                                            <span class="badge bg-success ms-1">
                                                Benar
                                            </span>
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        </td>

                        <!-- AKSI -->
                        <td class="text-center">
                            <div class="d-flex flex-wrap justify-content-center gap-2">

                                <a href="{{ route('questions.edit', $question->id) }}"
                                   class="btn btn-warning btn-sm d-flex align-items-center gap-1">
                                    <i class="bi bi-pencil-square"></i>
                                    Edit
                                </a>

                                <form action="{{ route('questions.destroy', $question->id) }}"
      method="POST"
      class="delete-form d-inline">

    @csrf
    @method('DELETE')

    <button type="button"
            class="btn btn-danger btn-sm btn-delete d-flex align-items-center gap-1">
        <i class="bi bi-trash"></i>
        Hapus
    </button>

</form>

                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
<!-- TOMBOL KEMBALI -->
<div class="mt-3">
    <a href="{{ route('kelola_soal') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
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
    <script>
window.MathJax = {
  tex: {
    inlineMath: [['\\(', '\\)'], ['$', '$']],
    displayMath: [['\\[', '\\]']]
  },
  svg: {
    fontCache: 'global'
  }
};
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function() {

        let form = this.closest('.delete-form');

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Soal yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
            showClass: {
                popup: 'animate__animated animate__zoomIn'
            },
            hideClass: {
                popup: 'animate__animated animate__zoomOut'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });

    });
});
</script>
@if(session('success'))
<script>
Swal.fire({
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    icon: 'success',
    showConfirmButton: false,
    timer: 1800,
    timerProgressBar: true,
    showClass: {
        popup: 'animate__animated animate__zoomIn'
    },
    hideClass: {
        popup: 'animate__animated animate__zoomOut'
    }
});
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js"></script>
</body>
</html>