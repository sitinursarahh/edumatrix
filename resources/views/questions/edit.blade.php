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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>

@include('layouts.header')

<div class="d-flex">
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 p-4">

        <!-- HEADER -->
        <div class="info-pemberitahuan-header mb-4">
            <h1 class="fw-bold">Edit Soal</h1>
        </div>

        <!-- CARD FORM -->
        <div class="card shadow-lg border-0" style="border-radius:15px;">
            <div class="card-body p-4">

                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- SOAL -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Soal</label>
                        <textarea name="question_text"
                                  class="form-control"
                                  rows="3"
                                  style="border-radius:10px;">{{ $question_clean }}</textarea>
                    </div>

                    <!-- OPTIONS -->
                    <div class="row">
                        @foreach($question->options as $index => $option)
                            <div class="col-md-6 mb-4">
                                <div class="p-3 border rounded-3 bg-light">
                                    <label class="fw-semibold">
                                        Pilihan {{ chr(65+$index) }}
                                    </label>

                                    <input type="text"
                                           name="options[]"
                                           class="form-control mb-2"
                                           value="{{ $options_clean[$loop->index] }}"
                                           style="border-radius:8px;">

                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="correct_option"
                                               value="{{ $index }}"
                                               {{ $option->is_correct ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            Jadikan Jawaban Benar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- BUTTONS -->
                    <div class="d-flex justify-content-between align-items-center mt-3">

                        <!-- Tombol Kembali (kiri) -->
                        <a href="{{ route('kelola_soal.show', $quiz->id) }}" 
                        class="btn btn-outline-secondary px-4">
                            ⬅ Kembali
                        </a>

                        <!-- Tombol Update (kanan) -->
                        <button type="submit" class="btn btn-success px-4 shadow-sm">
                            💾 Update Soal
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
</div>


<!-- SweetAlert2 -->
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        icon: 'success',
        showConfirmButton: false,   // ❌ hilangkan tombol OK
        timer: 1800,                // auto close
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showClass: {
            popup: 'animate__animated animate__zoomIn'
        },
        hideClass: {
            popup: 'animate__animated animate__zoomOut'
        }
    });
</script>
@endif


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
</body>
</html>