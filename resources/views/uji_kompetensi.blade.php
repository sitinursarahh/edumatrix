<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Pembelajaran Matriks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/materi_pengertian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar_materi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jenis_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kesamaan_dua_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/penjumlahan_pengurangan_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perkalian_matriks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/determinan_invers_matriks.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

{{-- ================= NAVBAR ================= --}}
@include('layouts.header')

<div class="d-flex">

    {{-- ================= SIDEBAR ================= --}}
    @include('layouts.sidebar_materi')

    {{-- ================= MAIN CONTENT ================= --}}
    <div class="main-content flex-grow-1 p-4">

        <div class="dashboard-wrapper p-4">

        {{-- =================================================
                    SECTION: KUIS PENGERTIAN MATRIKS
                ================================================= --}}
                    <div class="quiz-action-wrapper">
                        <!-- KARTU KUIS -->
                        <div class="quiz-link-wrapper mb-7">
                            <a href="{{ route('petunjuk.kuis', ['quiz_id' => 7]) }}" class="quiz-link-card">

                                <div class="quiz-link-icon">
                                    <i class="bi bi-journal-text"></i>
                                </div>
                                <div class="quiz-link-text">
                                    Klik di sini untuk mengerjakan Uji Kompetensi
                                </div>
                            </a>
                        </div>
                        
                    </div>
    </div>
        {{-- END dashboard-wrapper --}}

    </div>
    {{-- END main-content --}}

</div>
{{-- END d-flex --}}
</body>
</html>