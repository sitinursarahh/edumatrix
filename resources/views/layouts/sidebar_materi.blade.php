<!-- layouts/sidebar_materi.blade.php -->
@php
  /**
   * Helper: cek apakah salah satu path cocok dengan URL sekarang
   */
  function submenu_active(...$paths) {
      foreach ($paths as $p) {
          if (request()->is(ltrim($p, '/'))) return true;
      }
      return false;
  }
@endphp

@php
    use App\Models\UserProgress;

    $userId = auth()->id();

    $allProgress = UserProgress::where('user_id', $userId)->get();

    function isUnlocked($progress, $materi, $sub) {
        return $progress
            ->where('materi_slug', $materi)
            ->where('sub_materi_slug', $sub)
            ->where('unlocked', true)
            ->count() > 0;
    }
@endphp

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


<div id="sidebar_materi" class="sidebar">

  <!-- ================= HEADER ================= -->
<div class="sidebar-top">

    <button id="sidebarToggle" class="btn-toggle" type="button">
      &#9776;
    </button>

</div>
<div class="sidebar-scroll">
<div class="sidebar-title-menu">
    Menu
</div>



  <!-- ================= DASHBOARD ================= -->
  <a class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}"
     href="/dashboard">
     <i class="bi bi-house-door"></i>
     <span class="sidebar-label">Dashboard</span>
  </a>

  <!-- ================= INFORMASI MEDIA ================= -->
  <a class="sidebar-link {{ Request::is('informasi_media') ? 'active' : '' }}"
     href="/informasi_media">

     <i class="bi bi-info-circle"></i>
     <span class="sidebar-label">Informasi Media</span>
  </a>

  <!-- ================= PEMBERITAHUAN ================= -->
  <a class="sidebar-link {{ Request::is('pemberitahuan') ? 'active' : '' }}"
     href="/pemberitahuan">

     <i class="bi bi-megaphone"></i>
     <span class="sidebar-label">Pemberitahuan</span>

     @if($notifCount > 0 && !Request::is('pemberitahuan'))
         <span class="chat-badge">{{ $notifCount }}</span>
     @endif
  </a>

  <!-- ================= CHAT ================= -->
  <a class="sidebar-link {{ Request::is('chat*') ? 'active' : '' }}"
     href="/chat/{{ $user->class_id }}">

     <i class="bi bi-chat-dots"></i>
     <span class="sidebar-label">Chat</span>

     @if($unreadCount > 0 && !Request::is('chat/*'))
         <span class="chat-badge">{{ $unreadCount }}</span>
     @endif
  </a>

  <!-- ================= TITLE MATERI ================= -->
   <br>
<div class="sidebar-title-menu">
    Materi
</div>

  <!-- <div class="sidebar-scroll"> -->

    <!-- ==================================================
         PENGENALAN MATRIKS
    =================================================== -->
    @php
      $openPengenalan = submenu_active(
        'materi_pengertian_matriks',
        'kuis-pengenalan'
      );
    @endphp

    <button class="sidebar-link has-sub {{ $openPengenalan ? 'active' : '' }}"
            data-target="sub-pengenalan"
            aria-expanded="{{ $openPengenalan ? 'true' : 'false' }}">
      <i class="bi bi-lightbulb"></i>
      <span class="sidebar-label">Pengenalan Matriks</span>
      <span class="chev">
        <i class="bi {{ $openPengenalan ? 'bi-chevron-up' : 'bi-chevron-down' }}"></i>
      </span>
    </button>

    <div id="sub-pengenalan" class="sidebar-submenu {{ $openPengenalan ? 'open' : '' }}">

      @php
    $slug = 'pengertian-matriks';

    $isFirstUnlocked =
        isUnlocked($allProgress, 'pengenalan_matriks', $slug)
        || $allProgress->count() == 0;
@endphp

<a class="sidebar-sublink 
    {{ !$isFirstUnlocked ? 'locked' : '' }}"
   href="{{ $isFirstUnlocked
        ? '/materi_pengertian_matriks#'.$slug
        : '#' }}"
   data-section="{{ $slug }}">

   Pengertian Matriks

   @if(!$isFirstUnlocked)
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'mari-mencoba'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'pengenalan_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'pengenalan_matriks', $slug) 
        ? '/materi_pengertian_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Mari Mencoba 1

   @if(!isUnlocked($allProgress, 'pengenalan_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'baris-kolom-matriks'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'pengenalan_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'pengenalan_matriks', $slug) 
        ? '/materi_pengertian_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Baris dan Kolom Matriks

   @if(!isUnlocked($allProgress, 'pengenalan_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'mari-mencoba-2'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'pengenalan_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'pengenalan_matriks', $slug) 
        ? '/materi_pengertian_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Mari Mencoba 2

   @if(!isUnlocked($allProgress, 'pengenalan_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'kuis-pengertian-matriks'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'pengenalan_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'pengenalan_matriks', $slug) 
        ? '/materi_pengertian_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Kuis

   @if(!isUnlocked($allProgress, 'pengenalan_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

    </div>

    <!-- ==================================================
         JENIS-JENIS MATRIKS
    =================================================== -->
    @php
      $openJenis = submenu_active(
        'jenis_matriks',
        'matriks-*',
        'mari-mencoba-jenis',
        'kuis-jenis-matriks'
      );
    @endphp

    <button class="sidebar-link has-sub {{ $openJenis ? 'active' : '' }}"
            data-target="sub-jenis"
            aria-expanded="{{ $openJenis ? 'true' : 'false' }}">
      <i class="bi bi-table"></i>
      <span class="sidebar-label">Jenis-Jenis Matriks</span>
      <span class="chev">
        <i class="bi {{ $openJenis ? 'bi-chevron-up' : 'bi-chevron-down' }}"></i>
      </span>
    </button>

    <div id="sub-jenis" class="sidebar-submenu {{ $openJenis ? 'open' : '' }}">
      @php $slug = 'matriks-baris'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Baris

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      

      @php $slug = 'matriks-persegi'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Persegi

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'matriks-datar-tegak'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Datar & Tegak

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'matriks-segitiga'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Segitiga

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'matriks-diagonal'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Diagonal

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'matriks-identitas'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Identitas

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'matriks-nol'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Nol

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'matriks-simetris'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Simetris

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'matriks-transpos'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Matriks Transpos

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'mari-mencoba-jenis'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Mari Mencoba

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

      @php $slug = 'kuis-jenis-matriks'; @endphp
<a class="sidebar-sublink 
    {{ !isUnlocked($allProgress, 'jenis_matriks', $slug) ? 'locked' : '' }}"
   href="{{ isUnlocked($allProgress, 'jenis_matriks', $slug) 
        ? '/jenis_matriks#'.$slug 
        : '#' }}"
   data-section="{{ $slug }}">

   Kuis

   @if(!isUnlocked($allProgress, 'jenis_matriks', $slug))
       <i class="bi bi-lock-fill ms-2"></i>
   @endif
</a>

    </div>

    <!-- ==================================================
     KESAMAAN DUA MATRIKS
=================================================== -->
@php
  $openKesamaan = submenu_active(
    'kesamaan_dua_matriks',
    'kesamaan_dua_matriks*',
    'mari-mencoba-kesamaan',
    'kuis-kesamaan'
  );
@endphp

<button class="sidebar-link has-sub {{ $openKesamaan ? 'active' : '' }}"
        data-target="sub-kesamaan"
        aria-expanded="{{ $openKesamaan ? 'true' : 'false' }}">
  <i class="bi bi-check2-square"></i>
  <span class="sidebar-label">Kesamaan Dua Matriks</span>
  <span class="chev">
    <i class="bi {{ $openKesamaan ? 'bi-chevron-up' : 'bi-chevron-down' }}"></i>
  </span>
</button>

<div id="sub-kesamaan" class="sidebar-submenu {{ $openKesamaan ? 'open' : '' }}">

  {{-- ================= PENGERTIAN ================= --}}
  @php $slug = 'penyelesaian-kesamaan-1'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'kesamaan_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'kesamaan_matriks', $slug) 
          ? '/kesamaan_dua_matriks#'.$slug 
          : '#' }}"
     data-section="penyelesaian-kesamaan-1,penyelesaian-kesamaan-2">

     Pengertian dan Penyelesaian Kesamaan Matriks

     @if(!isUnlocked($allProgress, 'kesamaan_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

  

  {{-- ================= MARI MENCOBA ================= --}}
  @php $slug = 'mari-mencoba-kesamaan'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'kesamaan_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'kesamaan_matriks', $slug) 
          ? '/kesamaan_dua_matriks#'.$slug 
          : '#' }}"
     data-section="{{ $slug }}">

     Mari Mencoba

     @if(!isUnlocked($allProgress, 'kesamaan_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>


  {{-- ================= KUIS ================= --}}
  @php $slug = 'kuis-kesamaan'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'kesamaan_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'kesamaan_matriks', $slug) 
          ? '/kesamaan_dua_matriks#'.$slug 
          : '#' }}"
     data-section="{{ $slug }}">

     Kuis

     @if(!isUnlocked($allProgress, 'kesamaan_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

</div>


    <!-- PENJUMLAHAN & PENGURANGAN -->
    <!-- ==================================================
     PENJUMLAHAN & PENGURANGAN MATRIKS
================================================== -->
@php
  $openJumlahKurang = submenu_active(
    'penjumlahan_pengurangan_matriks',
    'penjumlahan_pengurangan_matriks*'
  );
@endphp

<button class="sidebar-link has-sub {{ $openJumlahKurang ? 'active' : '' }}"
        data-target="sub-jumlahkurang"
        aria-expanded="{{ $openJumlahKurang ? 'true' : 'false' }}">
  <i class="bi bi-plus-slash-minus"></i>
  <span class="sidebar-label">Penjumlahan & Pengurangan Matriks</span>
  <span class="chev">
    <i class="bi {{ $openJumlahKurang ? 'bi-chevron-up' : 'bi-chevron-down' }}"></i>
  </span>
</button>

<div id="sub-jumlahkurang" class="sidebar-submenu {{ $openJumlahKurang ? 'open' : '' }}">

  {{-- ================= PENJUMLAHAN ================= --}}
  @php $slug = 'penjumlahan-matriks-1'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) 
          ? '/penjumlahan_pengurangan_matriks#penjumlahan-matriks-1' 
          : '#' }}"
     data-section="penjumlahan-matriks-1,penjumlahan-matriks-2,penjumlahan-matriks-3">

     Penjumlahan Matriks

     @if(!isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

  {{-- ================= PENGURANGAN ================= --}}
  @php $slug = 'pengurangan-matriks-1'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) 
          ? '/penjumlahan_pengurangan_matriks#pengurangan-matriks-1' 
          : '#' }}"
     data-section="pengurangan-matriks-1,pengurangan-matriks-2">

     Pengurangan Matriks

     @if(!isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

  {{-- ================= MARI MENCOBA ================= --}}
  @php $slug = 'mari-mencoba-jumlahkurang'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) 
          ? '/penjumlahan_pengurangan_matriks#mari-mencoba-jumlahkurang' 
          : '#' }}"
     data-section="mari-mencoba-jumlahkurang">

     Mari Mencoba

     @if(!isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

  {{-- ================= KUIS ================= --}}
  @php $slug = 'kuis-jumlahkurang'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug) 
          ? '/penjumlahan_pengurangan_matriks#kuis-jumlahkurang' 
          : '#' }}"
     data-section="kuis-jumlahkurang">

     Kuis

     @if(!isUnlocked($allProgress, 'penjumlahan_pengurangan_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

</div>


    <!-- PERKALIAN MATRIKS -->
@php
  $openPerkalian = submenu_active(
    'perkalian_matriks',
    'perkalian_matriks*'
  );
@endphp

<button class="sidebar-link has-sub {{ $openPerkalian ? 'active' : '' }}"
        data-target="sub-perkalian"
        aria-expanded="{{ $openPerkalian ? 'true' : 'false' }}">
  <i class="bi bi-x"></i>
  <span class="sidebar-label">Perkalian Matriks</span>
  <span class="chev">
    <i class="bi {{ $openPerkalian ? 'bi-chevron-up' : 'bi-chevron-down' }}"></i>
  </span>
</button>

<div id="sub-perkalian" class="sidebar-submenu {{ $openPerkalian ? 'open' : '' }}">

  {{-- ================= PERKALIAN SKALAR ================= --}}
  @php $slug = 'perkalian-skalar'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'perkalian_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'perkalian_matriks', $slug) 
          ? '/perkalian_matriks#'.$slug 
          : '#' }}"
     data-section="perkalian-skalar,perkalian-skalar-2,perkalian-skalar-3">

     Perkalian Skalar

     @if(!isUnlocked($allProgress, 'perkalian_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

  {{-- ================= PERKALIAN DUA MATRIKS ================= --}}
  @php $slug = 'perkalian-dua-matriks'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'perkalian_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'perkalian_matriks', $slug) 
          ? '/perkalian_matriks#'.$slug 
          : '#' }}"
     data-section="perkalian-dua-matriks,perkalian-dua-matriks-2,perkalian-dua-matriks-3">

     Perkalian Dua Matriks

     @if(!isUnlocked($allProgress, 'perkalian_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

  {{-- ================= MARI MENCOBA ================= --}}
  @php $slug = 'mari-mencoba-perkalian'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'perkalian_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'perkalian_matriks', $slug) 
          ? '/perkalian_matriks#'.$slug 
          : '#' }}"
     data-section="mari-mencoba-perkalian">

     Mari Mencoba

     @if(!isUnlocked($allProgress, 'perkalian_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

  {{-- ================= KUIS ================= --}}
  @php $slug = 'kuis-perkalian'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'perkalian_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'perkalian_matriks', $slug) 
          ? '/perkalian_matriks#'.$slug 
          : '#' }}"
     data-section="kuis-perkalian">

     Kuis

     @if(!isUnlocked($allProgress, 'perkalian_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

</div>

    <!-- DETERMINAN & INVERS -->
    @php
  $openDeterminant = submenu_active(
    'determinan_invers_matriks',
    'determinan-1',
    'invers-1',
    'mari-mencoba-invers',
    'kuis-invers'
  );
@endphp

<button class="sidebar-link has-sub {{ $openDeterminant ? 'active' : '' }}"
        data-target="sub-determinant"
        aria-expanded="{{ $openDeterminant ? 'true' : 'false' }}">
  <i class="bi bi-calculator"></i>
  <span class="sidebar-label">Determinan & Invers Matriks</span>
  <span class="chev">
    <i class="bi {{ $openDeterminant ? 'bi-chevron-up' : 'bi-chevron-down' }}"></i>
  </span>
</button>

<div id="sub-determinant" class="sidebar-submenu {{ $openDeterminant ? 'open' : '' }}">

  {{-- ================= DETERMINAN ================= --}}
  @php $slug = 'determinan-1'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'determinan_invers_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'determinan_invers_matriks', $slug) 
          ? '/determinan_invers_matriks#'.$slug 
          : '#' }}"
     data-section="determinan-1,determinan-2,determinan-3,determinan-4,determinan-5,determinan-6,determinan-7">

     Determinan Matriks

     @if(!isUnlocked($allProgress, 'determinan_invers_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>


  {{-- ================= INVERS ================= --}}
  @php $slug = 'invers-1'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'determinan_invers_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'determinan_invers_matriks', $slug) 
          ? '/determinan_invers_matriks#'.$slug 
          : '#' }}"
     data-section="invers-1,invers-2,invers-3,invers-4,invers-5,invers-6,invers-7,invers-8,invers-9">

     Invers Matriks

     @if(!isUnlocked($allProgress, 'determinan_invers_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>


  {{-- ================= MARI MENCOBA ================= --}}
  @php $slug = 'mari-mencoba-determinan-invers'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'determinan_invers_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'determinan_invers_matriks', $slug) 
          ? '/determinan_invers_matriks#'.$slug 
          : '#' }}"
     data-section="mari-mencoba-determinan-invers">

     Mari Mencoba

     @if(!isUnlocked($allProgress, 'determinan_invers_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>


  {{-- ================= KUIS ================= --}}
  @php $slug = 'kuis-determinan-invers'; @endphp
  <a class="sidebar-sublink 
      {{ !isUnlocked($allProgress, 'determinan_invers_matriks', $slug) ? 'locked' : '' }}"
     href="{{ isUnlocked($allProgress, 'determinan_invers_matriks', $slug) 
          ? '/determinan_invers_matriks#'.$slug 
          : '#' }}"
     data-section="kuis-determinan-invers">

     Kuis

     @if(!isUnlocked($allProgress, 'determinan_invers_matriks', $slug))
         <i class="bi bi-lock-fill lock-icon"></i>
     @endif
  </a>

</div>

    <!-- REFLEKSI (link biasa) -->
    <a href="{{ $isRefleksiUnlocked ? route('refleksi.index') : '#' }}"
   class="sidebar-link {{ !$isRefleksiUnlocked ? 'locked' : '' }}"
   {{ !$isRefleksiUnlocked ? 'onclick=return false;' : '' }}>

    <!-- icon utama (WAJIB satu saja biar sejajar) -->
    <i class="bi bi-arrow-repeat"></i>

    <span class="sidebar-label">Refleksi Semua Materi</span>
</a>

    <!-- UJI KOMPETENSI (link biasa) -->
    <!-- <a class="sidebar-link 
    {{ $isUjiUnlocked ? '' : 'locked' }} 
    {{ Request::is('uji-kompetensi') ? 'active' : '' }}"
    href="{{ $isUjiUnlocked ? route('kuis.show', ['quiz_id' => 7]) : '#' }}"
    
    {{ $isUjiUnlocked ? '' : 'onclick=return false;' }}>
    <i class="bi bi-journal-text"></i>
    Uji Kompetensi
</a> -->
<a class="sidebar-link 
    {{ $isUjiUnlocked ? '' : 'locked' }} 
    {{ Request::is('uji-kompetensi') ? 'active' : '' }}"
    href="{{ $isUjiUnlocked ? route('kuis.show', ['quiz_id' => 7]) : '#' }}"
    
    {{ $isUjiUnlocked ? '' : 'onclick=return false;' }}>

    <i class="bi bi-journal-text"></i>

    <span class="sidebar-label">
        Uji Kompetensi
    </span>

</a>
  </div> <!-- end sidebar-scroll -->
</div> <!-- end sidebar_materi -->

<!-- Client-side JS: toggle sidebar + buka/tutup submenus -->
<!-- <script>
(function(){
  // toggle collapse sidebar (tambah class pada body untuk kompatibilitas)
  const btn = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar_materi');
  const main = document.querySelector('.main-content');

  btn?.addEventListener('click', function(e){
    e.preventDefault();
    sidebar.classList.toggle('collapsed');
    document.body.classList.toggle('sidebar-collapsed');
    if(main) main.classList.toggle('expanded');
  });

  // buka/tutup submenus (menggunakan data-target)
  document.querySelectorAll('#sidebar_materi .sidebar-link.has-sub').forEach(btn => {
    btn.addEventListener('click', function(e){
      const targetId = btn.getAttribute('data-target');
      if(!targetId) return;
      const submenu = document.getElementById(targetId);

      // toggle class "open" pada submenu
      const open = submenu.classList.toggle('open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');

      // ganti ikon chevron
      const chev = btn.querySelector('.chev i');
      if(chev){
        if(open){
          chev.classList.remove('bi-chevron-down');
          chev.classList.add('bi-chevron-up');
        } else {
          chev.classList.remove('bi-chevron-up');
          chev.classList.add('bi-chevron-down');
        }
      }
    });
  });

  // jika ada .sidebar-sublink.active, pastikan parent submenu terbuka (fallback client-side)
  document.querySelectorAll('#sidebar_materi .sidebar-submenu').forEach(sm => {
    if(sm.querySelector('.sidebar-sublink.active')) {
      sm.classList.add('open');
      const btn = document.querySelector(`#sidebar_materi .sidebar-link.has-sub[data-target="${sm.id}"]`);
      if(btn) {
        btn.setAttribute('aria-expanded','true');
        const chev = btn.querySelector('.chev i');
        if(chev){
          chev.classList.remove('bi-chevron-down');
          chev.classList.add('bi-chevron-up');
        }
      }
    }
  });
})();


</script> -->
<script>

window.addEventListener('load', function () {

  // =========================================
  // ELEMENT
  // =========================================
  const btn = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar_materi');

  // =========================================
  // VALIDASI
  // =========================================
  if (!btn || !sidebar) return;

  // =========================================
  // AUTO COLLAPSE MOBILE
  // =========================================
  

  // =========================================
  // TOGGLE SIDEBAR
  // =========================================
  btn.addEventListener('click', function (e) {

    e.preventDefault();
    e.stopPropagation();

    sidebar.classList.toggle('collapsed');

    document.body.classList.toggle('sidebar-collapsed');
  });

  // =========================================
  // SUBMENU TOGGLE
  // =========================================
  document.querySelectorAll(
    '#sidebar_materi .sidebar-link.has-sub'
  ).forEach(menuBtn => {

    menuBtn.addEventListener('click', function () {

      // kalau sidebar collapse jangan buka submenu
      if (sidebar.classList.contains('collapsed')) return;

      const targetId = menuBtn.getAttribute('data-target');

      if (!targetId) return;

      const submenu = document.getElementById(targetId);

      if (!submenu) return;

      // toggle submenu
      const open = submenu.classList.toggle('open');

      // aria
      menuBtn.setAttribute(
        'aria-expanded',
        open ? 'true' : 'false'
      );

      // chevron
      const chev = menuBtn.querySelector('.chev i');

      if (chev) {

        chev.classList.toggle('bi-chevron-up', open);
        chev.classList.toggle('bi-chevron-down', !open);
      }
    });
  });

  // =========================================
  // FALLBACK ACTIVE SUBMENU
  // =========================================
  document.querySelectorAll(
    '#sidebar_materi .sidebar-submenu'
  ).forEach(sm => {

    if (sm.querySelector('.sidebar-sublink.active')) {

      sm.classList.add('open');

      const parentBtn = document.querySelector(
        `#sidebar_materi .sidebar-link.has-sub[data-target="${sm.id}"]`
      );

      if (parentBtn) {

        parentBtn.setAttribute('aria-expanded', 'true');

        const chev = parentBtn.querySelector('.chev i');

        if (chev) {

          chev.classList.remove('bi-chevron-down');
          chev.classList.add('bi-chevron-up');
        }
      }
    }
  });

});

</script>

<script>

window.addEventListener('load', function () {

    // cari menu aktif
    const activeMenu = document.querySelector(
        '#sidebar_materi .sidebar-link.has-sub.active'
    );

    // area scroll sidebar
    const sidebarScroll = document.querySelector(
        '#sidebar_materi .sidebar-scroll'
    );

    // jika ada menu aktif
    if (activeMenu && sidebarScroll) {

        // scroll otomatis ke posisi menu aktif
        sidebarScroll.scrollTo({
            top: activeMenu.offsetTop - 120,
            behavior: 'smooth'
        });
    }

});

</script>