<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

    {{-- NAVBAR FULL WIDTH --}}
    @include('layouts.header')


        <div class="d-flex">
            @include('layouts.sidebar')



        {{-- MAIN CONTENT --}}
<div class="main-content flex-grow-1 p-4">

    <!-- WRAPPER -->

    <div class="dashboard-wrapper p-4" style="
        background: #fff9d5;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.20);

    ">

        <!-- Welcome Box -->
       <div class="p-4 mb-4" style="background: var(--c3); border-radius: 12px;">
    <div class="welcome-box d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fw-bold">SELAMAT DATANG,</h2>
            <h4>{{ auth()->user()->name }}</h4>
        </div>

        <img src="{{ asset('img/selamat_datang.png') }}"
             style="height: 200px; width: 200px; border-radius: 50%; object-fit: cover;">
    </div>
</div>


        <!-- Media Pembelajaran Matriks BOX -->
        <div class="p-4" style="background: var(--c4); border-radius: 12px;">

            <h3 class="text-center fw-bold mb-4" style="color: var(--c1);">
                Media Pembelajaran Matriks
            </h3>

            <div class="row g-4 mt-2 text-center justify-content-center">

                <!-- CARD 1 -->
                <div class="col-md-4">
                    <a href="{{ route('informasi_media') }}" class="text-decoration-none">
                        <div class="card-outer">
                            <div class="card-inner">
                                <img src="{{ asset('img/informasi_media.png') }}" alt="">
                            </div>
                            <p class="card-title-custom">Informasi Media</p>
                        </div>
                    </a>
                </div>

                <!-- CARD 2 -->
                <div class="col-md-4">
                    <a href="{{ route('materi_pengertian_matriks') }}" class="text-decoration-none text-dark">

                        <div class="card-outer">
                            <div class="card-inner">
                                <img src="{{ asset('img/materi_dashboard.png') }}" alt="">
                            </div>
                            <p class="card-title-custom">Materi</p>
                        </div>
                    </a>
                </div>

                <!-- CARD 3 -->
                <!-- <div class="col-md-4">
                    <div class="card-outer">
                        <div class="card-inner">
                            <img src="{{ asset('img/leaderboard.png') }}" alt="">
                        </div>
                        <p class="card-title-custom">Leaderboard</p>
                    </div>
                </div> -->

            </div>

        </div> <!-- END BOX -->


        <!-- ================= TOTAL STARS RANK ================= -->
        <div class="rank-outer">

            <div class="rank-card">

                <!-- Judul -->
                <div class="rank-title">
                    Papan Juara
                </div>

                <div class="rank-podium">

                    <!-- JUARA 2 -->
                    <div class="rank-item second">
                        @if(isset($topThree[1]))
<img 
    src="{{ $topThree[1]->profile_photo_path 
            ? asset('storage/'.$topThree[1]->profile_photo_path) 
            : asset('img/icon_profil_kosong.jpg') }}" 
    class="rank-avatar">
<div class="rank-name">{{ $topThree[1]->name }}</div>
<div class="rank-score">⭐ {{ $topThree[1]->progress_percent }}</div>
@endif

                        <div class="podium-card silver">
                            <div class="podium-rank">2</div>
                            <div class="podium-icon">🏆</div>
                        </div>
                    </div>

                    <!-- JUARA 1 -->
                    <div class="rank-item first">
                        <div class="rank-crown">👑</div>
                        @if(isset($topThree[0]))
<img 
    src="{{ $topThree[0]->profile_photo_path 
            ? asset('storage/'.$topThree[0]->profile_photo_path) 
            : asset('img/icon_profil_kosong.jpg') }}" 
    class="rank-avatar">
<div class="rank-name">{{ $topThree[0]->name }}</div>
<div class="rank-score">⭐ {{ $topThree[0]->progress_percent }}</div>
@endif

                        <div class="podium-card gold">
                            <div class="podium-rank">1</div>
                            <div class="podium-icon">🏆</div>
                        </div>
                    </div>

                    <!-- JUARA 3 -->
                    <div class="rank-item third">
                        @if(isset($topThree[2]))
<img 
    src="{{ $topThree[2]->profile_photo_path 
            ? asset('storage/'.$topThree[2]->profile_photo_path) 
            : asset('img/icon_profil_kosong.jpg') }}" 
    class="rank-avatar">
<div class="rank-name">{{ $topThree[2]->name }}</div>
<div class="rank-score">⭐ {{ $topThree[2]->progress_percent }}</div>
@endif

                        <div class="podium-card bronze">
                            <div class="podium-rank">3</div>
                            <div class="podium-icon">🏆</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- ================= LEADERBOARD AKSES MATERI ================= -->
        <div class="leaderboard-wrapper mt-4">

            <h4 class="fw-bold mb-4" style="color: var(--c1);">
                🏆 Leaderboard
            </h4>

            <!-- ITEM 1 -->
            @foreach($ranking as $index => $item)
<div class="leaderboard-item">

    <div class="rank">{{ $index + 1 }}</div>

    <img 
    src="{{ $item->profile_photo_path 
            ? asset('storage/'.$item->profile_photo_path) 
            : asset('img/icon_profil_kosong.jpg') }}" 
    class="leaderboard-avatar">

    <div class="leaderboard-content">
        <div class="leaderboard-top">
            <span class="leaderboard-name">{{ $item->name }}</span>
            <span class="leaderboard-score-text">
                {{ $item->progress_percent }}%
            </span>
        </div>

        <div class="leaderboard-bar">
            <div class="leaderboard-bar-fill"
                 style="width: {{ $item->progress_percent }}%;">
            </div>
        </div>
    </div>

</div>
@endforeach
        <!-- ================= END LEADERBOARD ================= -->


    </div> <!-- END WRAPPER -->

</div> <!-- END MAIN CONTENT -->




    </div>

<!-- <script>
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
        profileMenu.style.display =
            profileMenu.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function(e) {
        if (!profileToggle.contains(e.target) && !profileMenu.contains(e.target)) {
            profileMenu.style.display = 'none';
        }
    });
</script> -->

<script>

    /* SIDEBAR TOGGLE */
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.main-content');
    const toggleSidebar = document.getElementById('sidebarToggle');

    /* TOGGLE SIDEBAR */
    toggleSidebar.addEventListener('click', () => {

        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
    });

    /* PROFILE DROPDOWN */
    const profileToggle = document.getElementById('profileToggle');
    const profileMenu = document.getElementById('profileMenu');

    profileToggle.addEventListener('click', () => {

        profileMenu.style.display =
            profileMenu.style.display === 'block'
            ? 'none'
            : 'block';
    });

    /* TUTUP DROPDOWN SAAT KLIK LUAR */
    document.addEventListener('click', function(e) {

        if (
            !profileToggle.contains(e.target) &&
            !profileMenu.contains(e.target)
        ) {

            profileMenu.style.display = 'none';
        }
    });

</script>

</body>
</html>
