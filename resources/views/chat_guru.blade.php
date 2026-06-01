<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemberitahuan</title>
    <link rel="stylesheet" href="{{ asset('css/pemberitahuan.css') }}"> <!-- Link ke file CSS untuk halaman ini -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> <!-- Link ke file CSS untuk navbar & sidebar -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Tambahkan link FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    {{-- NAVBAR FULL WIDTH --}}
    @include('layouts.header') <!-- Menambahkan header/navbar -->

    <div class="d-flex" style="height: calc(100vh - 10px); overflow: hidden;">
        {{-- SIDEBAR --}}
        @include('layouts.sidebar_guru') <!-- Menambahkan sidebar -->

        <!-- JUDUL INFORMASI MEDIA -->
        <!-- <div class="info-media-header">
            <h1>INFORMASI MEDIA</h1>
        </div> -->


        {{-- MAIN CONTENT --}}
        <div class="main-content flex-grow-1 d-flex flex-column p-4"
     style="overflow: hidden;">

    <!-- HEADER DI LUAR KOTAK -->
    <div class="info-pemberitahuan-header mb-4">
        <h1>CHAT</h1>
    </div>

    <!-- KOTAK PEMBUNGKUS CHAT -->
    <div class="chat-wrapper d-flex flex-column flex-grow-1">

        <!-- CHAT AREA -->
        <div id="chat-box"
             class="flex-grow-1 overflow-auto p-4">

            @foreach($messages as $msg)
                @php
                    $isMe = $msg->user_id == auth()->id();
                @endphp

                <div class="d-flex {{ $isMe ? 'justify-content-end' : 'justify-content-start' }} align-items-end mb-3"
     data-wrapper-id="{{ $msg->id }}">

    {{-- FOTO USER LAIN (KIRI) --}}
    @if(!$isMe)
    @if($msg->user->profile_photo_path)
        <img 
            src="{{ asset('storage/'.$msg->user->profile_photo_path) }}"
            class="chat-avatar me-2">
    @else
        <div class="chat-avatar chat-initial me-2">
            {{ strtoupper(substr($msg->user->name, 0, 1)) }}
        </div>
    @endif
@endif

    {{-- BUBBLE CHAT --}}
    <div class="chat-bubble {{ $isMe ? 'bubble-me' : 'bubble-other' }}"
     data-id="{{ $msg->id }}"
     ondblclick="confirmDelete({{ $msg->id }})">

    <small class="fw-bold d-block mb-1">
        {{ $msg->user->name }}
    </small>

    @if($msg->message)
    <div class="chat-text">{{ $msg->message }}</div>
@endif

@if($msg->file_path)
    <div class="mt-2">
        @php
            $extension = pathinfo($msg->file_name, PATHINFO_EXTENSION);
        @endphp

        @if(in_array(strtolower($extension), ['jpg','jpeg','png','gif']))
            <img src="{{ asset('storage/'.$msg->file_path) }}" 
                 style="max-width:200px;border-radius:10px;">
        @else
            <a href="{{ asset('storage/'.$msg->file_path) }}" target="_blank">
                📎 {{ $msg->file_name }}
            </a>
        @endif
    </div>
@endif

    

    <div class="chat-time">
        {{ $msg->created_at->format('H:i') }}
    </div>
</div>

        

    {{-- FOTO SENDIRI (KANAN) --}}
    @if($isMe)
    @if(auth()->user()->profile_photo_path)
        <img 
            src="{{ asset('storage/'.auth()->user()->profile_photo_path) }}"
            class="chat-avatar ms-2">
    @else
        <div class="chat-avatar chat-initial ms-2">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
    @endif
@endif

</div>
            @endforeach

        </div>

        <!-- INPUT -->
        <div class="chat-input-area p-3">
            <form id="chat-form"
      class="d-flex gap-2 align-items-center"
      enctype="multipart/form-data"
      onsubmit="event.preventDefault();">
                <label for="file-input" class="btn btn-light mb-0">
    <i class="bi bi-paperclip"></i>
</label>
<input type="file" id="file-input" name="file" hidden>

<!-- PREVIEW -->
<div id="file-preview" class="mb-2 d-none"></div>

<textarea 
    id="message-input" 
    name="message"
    class="form-control"
    placeholder="Tulis pesan..."
    rows="1"
    style="resize:none;">
</textarea>

<button type="button" id="send-btn" class="btn btn-primary">
    <i class="bi bi-send"></i>
</button>
            </form>
        </div>

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
    window.classId = {{ $classId }};
    window.userId = {{ auth()->id() }};
</script>
<script>
    window.currentUserName = "{{ auth()->user()->name }}";
    window.currentUserPhoto = "{{ auth()->user()->profile_photo_path }}";
</script>
@vite(['resources/js/app.js'])

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus Pesan?',
        text: "Apakah anda ingin menghapus pesan?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            deleteMessage(id);
        }
    });
}

function deleteMessage(id) {
    fetch('/chat/delete/' + id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            let wrapper = document.querySelector('[data-wrapper-id="'+id+'"]');
if (wrapper) wrapper.remove();
        }
    });
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