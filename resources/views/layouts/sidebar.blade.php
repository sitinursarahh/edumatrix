@php
$user = auth()->user();

# =============================
# HITUNG NOTIF CHAT
# =============================
$lastSeen = $user->last_seen_chat_at;

$unreadQuery = \App\Models\Message::where('class_id', $user->class_id)
    ->where('user_id', '!=', $user->id);

if ($lastSeen) {
    $unreadQuery->where('created_at', '>', $lastSeen);
}

$unreadCount = $unreadQuery->count();


# =============================
# HITUNG NOTIF PEMBERITAHUAN
# =============================
$notifQuery = \App\Models\Pemberitahuan::query();

if ($user->last_seen_notification_at) {
    $notifQuery->where('created_at', '>', $user->last_seen_notification_at);
}

$notifCount = $notifQuery->count();

@endphp

<div class="sidebar p-3" id="sidebar">

    <!-- Tombol strip 3 di dalam sidebar -->
    <div id="sidebarToggle" class="mb-3" style="cursor: pointer; font-size: 24px;">
        &#9776;
    </div>

    <a class="sidebar-link 
      {{ Request::is('dashboard') || Request::is('informasi_media') ? 'active' : '' }}"
      href="/dashboard">
      <i class="bi bi-house-door"></i> Dashboard
   </a>

    <a class="sidebar-link {{ Request::is('profil') ? 'active' : '' }}"
       href="/profil">
       <i class="bi bi-person"></i> Profil
    </a>

    <a class="sidebar-link {{ Request::is('pemberitahuan') ? 'active' : '' }}"
   href="/pemberitahuan">

   <i class="bi bi-megaphone"></i> Pemberitahuan

   @if($notifCount > 0 && !Request::is('pemberitahuan'))
       <span class="chat-badge">{{ $notifCount }}</span>
   @endif

</a>

    <!-- <a class="sidebar-link {{ Request::is('uji-kompetensi') ? 'active' : '' }}"
       href="/uji-kompetensi">
       <i class="bi bi-journal-text"></i> Uji Kompetensi
    </a> -->

    <a class="sidebar-link {{ Request::is('chat*') ? 'active' : '' }}"
   href="/chat/{{ $user->class_id }}">
   <i class="bi bi-chat-dots"></i> Chat

   @if($unreadCount > 0 && !Request::is('chat/*'))
       <span class="chat-badge">{{ $unreadCount }}</span>
   @endif
</a>

</div>

<script>

const sidebar = document.getElementById("sidebar");

if (window.innerWidth <= 768) {
    sidebar.classList.add("collapsed");
}

</script>