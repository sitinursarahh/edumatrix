@php
use App\Models\ChatRead;
use App\Models\Message;
use App\Models\Kelas;

$user = auth()->user();
$totalUnread = 0;

if ($user && $user->role == 'guru') {

    foreach (Kelas::all() as $class) {

        $lastSeen = ChatRead::where('user_id', $user->id)
            ->where('class_id', $class->id)
            ->value('last_seen_at');

        $query = Message::where('class_id', $class->id)
            ->where('user_id', '!=', $user->id);

        if ($lastSeen) {
            $query->where('created_at', '>', $lastSeen);
        }

        $totalUnread += $query->count();
    }
}
@endphp

<div class="sidebar p-3" id="sidebar">

    <!-- Tombol strip 3 di dalam sidebar -->
    <div id="sidebarToggle" class="mb-3" style="cursor: pointer; font-size: 24px;">
        &#9776;
    </div>

    <a class="sidebar-link {{ Request::is('dashboard_guru') ? 'active' : '' }}"
       href="/dashboard_guru">
       <i class="bi bi-house-door"></i> Dashboard
    </a>

    <a class="sidebar-link
      {{ Request::is('kelola_soal*') || Request::is('questions*') ? 'active' : '' }}"
      href="/kelola_soal">
      <i class="bi bi-ui-checks-grid"></i> Kelola Soal
   </a>

    <a class="sidebar-link {{ Request::is('data_siswa') ? 'active' : '' }}"
       href="/data_siswa">
       <i class="bi bi-people"></i> Data Siswa
    </a>

    <a class="sidebar-link {{ Request::is('data_nilai') ? 'active' : '' }}"
       href="/data_nilai">
       <i class="bi bi-journal-text"></i> Data Nilai
    </a>

    <a class="sidebar-link {{ Request::is('refleksi*') ? 'active' : '' }}"
   href="/refleksi_guru">
   <i class="bi bi-arrow-repeat"></i> Data Refleksi
</a>

    <a class="sidebar-link {{ Request::is('pemberitahuan_guru') ? 'active' : '' }}"
      href="/pemberitahuan_guru">
      <i class="bi bi-megaphone"></i> Kelola Pemberitahuan
   </a>

    <a class="sidebar-link {{ Request::is('chat*') ? 'active' : '' }}"
   href="/chat">
   <i class="bi bi-chat-dots"></i> Chat

   @if($totalUnread > 0)
       <span class="chat-badge">{{ $totalUnread }}</span>
   @endif
</a>


</div>
