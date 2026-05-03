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
<body>

@include('layouts.header')

<div class="d-flex">
    @include('layouts.sidebar_guru')

    <div class="main-content flex-grow-1 p-4">

        <div class="info-pemberitahuan-header">
            <h1>KELOLA SOAL</h1>
        </div>

        <div class="kkm-setting mb-4 d-flex align-items-center gap-3">

    <label for="kkmInput" class="fw-bold">
        Pengaturan KKM :
    </label>

    <input 
        type="number"
        id="kkmInput"
        class="form-control"
        value="{{ $kkm ?? 70 }}"
        min="0"
        max="100"
        style="width:100px;"
    >

    <button class="btn btn-success" id="simpanKKM">
        Simpan
    </button>

</div>

        <!-- WRAPPER -->
            <div class="dashboard-wrapper p-4" style="
                background: #fff9d5;
                border-radius: 15px;
                padding: 25px;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.20);
            ">
            <div class="kelola-container">

                <!-- BARIS 1 -->
                <div class="row-kelola">
                    <a href="{{ route('kelola_soal.show', 1) }}" class="box-kelola">
                        Kuis Pengertian Matriks
                    </a>
                    <a href="{{ route('kelola_soal.show', 2) }}" class="box-kelola">
                        Kuis Jenis-Jenis Matriks
                    </a>
                    <a href="{{ route('kelola_soal.show', 3) }}" class="box-kelola">
                        Kuis Kesamaan Dua Matriks
                    </a>
                </div>

                <!-- BARIS 2 -->
                <div class="row-kelola">
                    <a href="{{ route('kelola_soal.show', 4) }}" class="box-kelola">
                        Kuis Penjumlahan & Pengurangan Matriks
                    </a>
                    <a href="{{ route('kelola_soal.show', 5) }}" class="box-kelola">
                        Kuis Perkalian Matriks
                    </a>
                    <a href="{{ route('kelola_soal.show', 6) }}" class="box-kelola">
                        Kuis Determinan & Invers Matriks
                    </a>
                </div>

                <!-- UJI KOMPETENSI -->
                <div class="row-uji">
                    <a href="{{ route('kelola_soal.show', 7) }}" class="box-uji">
                        Uji Kompetensi
                    </a>
                </div>

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
document.getElementById("simpanKKM").addEventListener("click", function(){

    let kkm = document.getElementById("kkmInput").value;

    fetch("{{ route('kkm.update') }}",{
        method:"POST",
        headers:{
            "Content-Type":"application/json",
            "X-CSRF-TOKEN":"{{ csrf_token() }}"
        },
        body: JSON.stringify({
            kkm: kkm
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("kkmInput").value = kkm;
        alert("KKM berhasil disimpan : " + kkm);
    });

});
</script>
</body>
</html>