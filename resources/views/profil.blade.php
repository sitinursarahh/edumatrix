<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa</title>

    <!-- CSS bawaan project -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Profil -->
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
</head>

<body style="background: var(--c4);">

    {{-- NAVBAR --}}
    @include('layouts.header')

    <div class="d-flex">

        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- MAIN CONTENT --}}
        <div class="main-content flex-grow-1 p-4">

            <!-- JUDUL -->
            <div class="info-media-header">
                <h1>PROFIL</h1>
            </div>

            <!-- WRAPPER -->
            <div class="dashboard-wrapper p-4"
                style="background: #fff9d5; border-radius: 15px; padding: 25px; box-shadow: 0 6px 20px rgba(0,0,0,0.20);">

                <div class="row same-height">

                    <!-- ============================= -->
                    <!--          KOLOM KIRI           -->
                    <!-- ============================= -->
                    <div class="col-md-4 mb-4">
                        <div class="profile-card position-relative">

                            <!-- Tombol Edit -->
                            <button id="btnEditPhoto" class="edit-icon" aria-label="Edit foto" type="button">
                                <i class="bi bi-pencil-square"></i>
                            </button>

                            <!-- Foto -->
<img id="profileImagePreview"
     src="{{ auth()->user()->profile_photo_path
            ? asset('storage/' . auth()->user()->profile_photo_path)
            : asset('img/icon_profil_kosong.jpg') }}"
     class="profile-photo"
     alt="Foto Profil">

                            <!-- Nama & NIS -->
                            <div class="text-center">

                                <div class="profile-names">
                                    <div class="profile-name">{{ auth()->user()->name }}</div>
                                    <!-- <div class="profile-nis">ID: {{ auth()->user()->id }}</div> -->
                                </div>

                            </div>

                            <hr>

                            <!-- Kelas & Email -->
                            <div class="mt-3">
                                <p><strong>Kelas:</strong> {{ auth()->user()->kelas }}</p>
                                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            </div>

                        </div>
                    </div>

                    <!-- ============================= -->
                    <!--          KOLOM KANAN          -->
                    <!-- ============================= -->
                    <div class="col-md-8">

                        <!-- Progress -->
                        <div class="progress-card mb-4">
                            <h4 class="text-center mb-3">Progress Materi</h4>

                            <div class="text-center">
                                <div class="chart-wrapper">
                                    <canvas id="progressChart" width="200" height="200"></canvas>
                                </div>
                                <p id="progressText" class="text-center mt-2"
   style="font-weight:bold; color:#9a3f3f;">
    {{ $progressPercent }}% Selesai
</p>
                            </div>
                        </div>

                        <!-- Riwayat Penilaian -->
                        <div class="scores-card">
                            <h4 class="text-center mb-3">Riwayat Penilaian</h4>

                            <div class="row g-3">

                                <div class="row g-3">

                                    @php
                                        $uji = null;
                                        $index = 0;
                                    @endphp

                                    @foreach($quizzes as $quiz)

                                        @if(strtolower($quiz->title) === 'uji kompetensi')
                                            @php $uji = $quiz; @endphp
                                        @else

                                            @php $index++; @endphp

                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="score-item">
                                                    {{ $quiz->title }}

                                                    <span class="badge">
                                                        {{ $nilaiPerQuiz[$quiz->id] ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>

                                        @endif

                                    @endforeach

                                    {{-- Tambahkan 1 kolom kosong supaya Uji Kompetensi berada di tengah --}}
                                    @if($uji)

                                        <div class="col-lg-4 col-md-6 col-12"></div>

                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="score-item">
                                                {{ $uji->title }}

                                                <span class="badge">
                                                    {{ $nilaiPerQuiz[$uji->id] ?? '-' }}
                                                </span>
                                            </div>
                                        </div>

                                    @endif

                                    </div>

                            </div>
                        </div>

                    </div>

                </div> <!-- END row -->

            </div> <!-- END wrapper -->

            <!-- Tombol Kembali -->
            <a href="{{ url()->previous() }}" class="btn-kembali">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

        </div> <!-- END MAIN CONTENT -->

    </div> <!-- END d-flex -->


    <!-- ===================================================== -->
    <!--                   MODAL EDIT PROFIL                   -->
    <!-- ===================================================== -->
    <div class="edit-overlay" id="editOverlay">

        <div class="edit-modal">

            <!-- HEADER -->
            <div class="edit-header">
                <button id="closeModal" class="edit-back">‹</button>
                <h3>Edit Profil</h3>
            </div>

            <!-- BODY -->
            <div class="edit-body">

                <!-- <div class="edit-avatar">
    <img id="editAvatarPreview"
         src="{{ auth()->user()->profile_photo_path 
                ? asset('storage/' . auth()->user()->profile_photo_path) 
                : asset('img/pas_foto_sarah.jpeg') }}">

    <label class="edit-change-photo">
        <input type="file" name="photo" id="editAvatarInput" accept="image/*">
        <i class="bi bi-camera-fill"></i>
    </label>
</div> -->

                <form id="formEditProfil"
      class="edit-form"
      method="POST"
      action="{{ route('profil.update') }}"
      enctype="multipart/form-data">

    @csrf

    <div class="edit-avatar">
        <img id="editAvatarPreview"
             src="{{ auth()->user()->profile_photo_path 
                    ? asset('storage/' . auth()->user()->profile_photo_path) 
                    : asset('img/pas_foto_sarah.jpeg') }}">

        <label class="edit-change-photo">
            <input type="file" name="photo" id="editAvatarInput" accept="image/*">
            <i class="bi bi-camera-fill"></i>
        </label>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label>Nama</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" required>
        </div>

        <!-- <div class="col">
            <label>NIS</label>
            <input type="text" value="{{ auth()->user()->id }}" disabled>
        </div> -->
    </div>

    <div class="row mb-2">
        <div class="col">
            <label>Kelas</label>
            <input type="text" name="kelas" value="{{ auth()->user()->kelas }}">
        </div>

        <div class="col">
            <label>Email</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" required>
        </div>
    </div>

</form>

            </div>

            <!-- FOOTER -->
            <div class="edit-footer">
                <button class="btn-cancel" id="cancelModal">Batal</button>
                <button type="button" class="btn-save" onclick="document.getElementById('formEditProfil').submit();">
                    Simpan Perubahan
                </button>
            </div>

        </div>

    </div>
    <!-- ===================================================== -->
    <!--                END MODAL EDIT PROFIL                  -->
    <!-- ===================================================== -->


    <!-- ===================================================== -->
    <!--                        SCRIPT                         -->
    <!-- ===================================================== -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

    <script>
        /* SIDEBAR */
        const sidebar = document.getElementById('sidebar');
        const content = document.querySelector('.main-content');
        const toggleSidebar = document.getElementById('sidebarToggle');

        toggleSidebar?.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('expanded');
        });

        /* PROFILE DROPDOWN */
        const profileToggle = document.getElementById('profileToggle');
        const profileMenu = document.getElementById('profileMenu');

        profileToggle?.addEventListener('click', () => {
            profileMenu.style.display =
                profileMenu.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', (e) => {
            if (!profileToggle?.contains(e.target) &&
                !profileMenu?.contains(e.target)) {
                profileMenu.style.display = 'none';
            }
            
        });

    </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const progressValue = Number(@json($progressPercent ?? 0));

    const safeProgress = Math.min(100, Math.max(0, progressValue));
    const progressRemain = 100 - safeProgress;

    const progressText = document.getElementById("progressText");
    if (progressText) {
        progressText.innerText = safeProgress + "% Selesai";
    }

    const ctx = document.getElementById("progressChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Belum'],
            datasets: [{
                data: [safeProgress, progressRemain],
                backgroundColor: [
                    '#c1856d',
                    'rgba(193,133,109,0.1)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

});
</script>

<script>
document.addEventListener("DOMContentLoaded", function(){

    const btnEdit = document.getElementById("btnEditPhoto");
    const overlay = document.getElementById("editOverlay");
    const closeBtn = document.getElementById("closeModal");
    const cancelBtn = document.getElementById("cancelModal");

    // buka modal
    btnEdit?.addEventListener("click", function(){
        overlay.style.display = "flex";
    });

    // tutup modal (tombol panah)
    closeBtn?.addEventListener("click", function(){
        overlay.style.display = "none";
    });

    // tutup modal (tombol batal)
    cancelBtn?.addEventListener("click", function(){
        overlay.style.display = "none";
    });

});
</script>
</body>
</html>
