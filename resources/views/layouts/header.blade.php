<nav class="header navbar-dark" style="background: var(--c1);">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Logo + Judul -->
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logo.png') }}"
                 alt="Logo"
                 style="height: 60px; width: 60px; object-fit: cover; margin-right: 12px;">

            <span class="navbar-brand mb-0 h1" style="font-size: 24px;">
                EduMatrix
            </span>
        </div>

        <!-- Profile Section -->
        @auth
        <div class="position-relative">

            <div id="profileToggle"
                 class="d-flex align-items-center text-white"
                 style="cursor: pointer;">

                <i class="bi bi-person-circle" style="font-size: 26px;"></i>

                <!-- NAMA USER LOGIN -->
                <span class="ms-2">{{ auth()->user()->name }}</span>

                <i class="bi bi-caret-down-fill ms-2" style="font-size: 16px;"></i>
            </div>

            <div id="profileMenu"
                 style="
                    display: none;
                    position: absolute;
                    right: 0;
                    margin-top: 10px;
                    background: white;
                    border-radius: 8px;
                    padding: 10px 15px;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
                 ">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="btn btn-link text-dark text-decoration-none p-0">
                        Logout
                    </button>
                </form>
            </div>

        </div>
        @endauth

    </div>
</nav>
