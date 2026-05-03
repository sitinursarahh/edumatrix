<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Rooms</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

@include('layouts.header')
<div class="d-flex" style="min-height: 100vh; overflow: visible;">
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 d-flex flex-column p-4">

        <div class="info-pemberitahuan-header mb-4">
            <h1>PILIH ROOM CHAT</h1>
        </div>

        <div class="row">
            @foreach($classes as $kelas)
    <div class="col-md-3 mb-4">
        <a href="{{ url('/chat/'.$kelas->id) }}" class="text-decoration-none">
            
            <div class="card chat-room-card shadow-sm p-4 text-center position-relative">

                {{-- 🔥 BADGE NOTIF PER KELAS --}}
                @if(!empty($unreadPerClass[$kelas->id]) && $unreadPerClass[$kelas->id] > 0)
                    <span class="badge bg-danger position-absolute top-0 end-0 m-2">
                        {{ $unreadPerClass[$kelas->id] }}
                    </span>
                @endif

                <i class="bi bi-chat-dots fs-1 mb-3"></i>
                <h5>{{ $kelas->name }}</h5>

            </div>

        </a>
    </div>
@endforeach
        </div>

    </div>

</div>

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
</body>
</html>