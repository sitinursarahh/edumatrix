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
    <link rel="stylesheet" href="{{ asset('css/dashboard_guru.css') }}">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

    {{-- NAVBAR FULL WIDTH --}}
    @include('layouts.header')


        <div class="d-flex">
            @include('layouts.sidebar_guru')



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

    <div class="welcome-content">

        <!-- TEXT -->
        <div class="welcome-text">

            <h2 class="fw-bold">SELAMAT DATANG,</h2>

            <h4>{{ auth()->user()->name }}</h4>

            <br>

            <div class="mt-2 d-flex align-items-center gap-2 position-relative flex-wrap">

                <span class="fw-semibold">
                    Token Kelas:
                </span>

                <div class="token-box">

                    <span id="tokenText" class="me-2">
                        SISWA123
                    </span>

                    <button onclick="copyToken()" class="copy-btn">
                        <i class="bi bi-clipboard"></i>
                    </button>

                    <!-- POPUP -->
                    <div id="copyPopup" class="copy-popup">
                        ✔ Token berhasil disalin!
                    </div>

                </div>

            </div>

        </div>

        <!-- IMAGE -->
        <div class="welcome-img">

    <img src="{{ asset('img/selamat_datang.png') }}"
         class="welcome-photo"
         alt="Selamat Datang">

</div>

    </div>

</div>




    </div> <!-- END WRAPPER -->

    <!-- STAT CARDS -->
<div class="row g-4 mt-3">

    <!-- TOTAL SISWA -->
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <h6>Total Siswa</h6>
                    <h3 class="fw-bold mb-0">
    {{ $totalSiswa }} <small>Orang</small>
</h3>

                </div>
            </div>
        </div>
    </div>

    <!-- RATA-RATA NILAI -->
    <div class="col-md-6">
    <div class="stat-card">
        <div class="mb-2">
    <h6 class="mb-0">Rata-rata Nilai</h6>
</div>

        <div style="height:160px;">
    <canvas id="avgChart"></canvas>
</div>



    </div>
</div>


    <!-- SISWA SELESAI -->
    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon selesai">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
    <h6>Siswa Menyelesaikan Pembelajaran</h6>
    <h3 class="fw-bold mb-0">
        {{ $jumlahSelesai }} 
        <small>dari {{ $totalSiswa }} Siswa</small>
    </h3>
</div>
            </div>
        </div>
    </div>

</div>

<!-- AKTIVITAS SISWA TERAKHIR -->
<div class="row mt-4">
    <div class="col-12">
        <div class="activity-card">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Aktivitas Terakhir Siswa Hari Ini</h5>
                <i class="bi bi-clock-history"></i>
            </div>

            <div class="activity-list">

@forelse($activities as $activity)

    <div class="activity-item">
        <div>
            <strong>{{ $activity['name'] }}</strong>
            <div class="text-muted small">
                {{ $activity['description'] }}
            </div>
        </div>
        <div class="activity-time">
            {{ \Carbon\Carbon::parse($activity['time'])->diffForHumans() }}
        </div>
    </div>

@empty
    <div class="text-muted">
        Belum ada aktivitas hari ini.
    </div>
@endforelse

</div>

        </div>
    </div>
</div>


</div> <!-- END MAIN CONTENT -->





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
        profileMenu.style.display =
            profileMenu.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function(e) {
        if (!profileToggle.contains(e.target) && !profileMenu.contains(e.target)) {
            profileMenu.style.display = 'none';
        }
    });
</script>

<script>
function copyToken() {
    const token = document.getElementById("tokenText").innerText;
    navigator.clipboard.writeText(token).then(function() {

        const popup = document.getElementById("copyPopup");
        popup.classList.add("show");

        setTimeout(() => {
            popup.classList.remove("show");
        }, 1500);

    });
}
</script>

<!-- GRAFIK RATA-RAT NILAI -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

<script>
const ctx = document.getElementById('avgChart');

Chart.register(ChartDataLabels);

// 🔥 Label Kuis
const kuisLabels = @json($quizzes->pluck('title'));
const simpleLabels = kuisLabels.map((item, index) => {
    if (item.toLowerCase().includes('uji')) {
        return 'UK';
    }
    return 'Kuis ' + (index + 1);
});

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: simpleLabels,
        datasets: [{
            data: @json($avgData),
            backgroundColor: [
                '#e6cfa9',
                '#d9b98f',
                '#c1856d',
                '#e6cfa9',
                '#d9b98f',
                '#c1856d',
                '#9a3f3f'
            ],
            borderRadius: 8,
            borderSkipped: false,
            categoryPercentage: 0.9,
            barPercentage: 0.8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,

        // 🔥 FIX UTAMA: kasih ruang atas biar label tidak kepotong
        layout: {
            padding: {
                top: 30
            }
        },

        plugins: {
            legend: { display: false },

            tooltip: {
                enabled: true,
                callbacks: {
                    title: function(context) {
                        return kuisLabels[context[0].dataIndex];
                    },
                    label: function(context) {
                        return 'Rata-rata: ' + context.parsed.y + '%';
                    }
                }
            },

            datalabels: {
                anchor: 'end',
                align: 'top',
                offset: 4, // 🔥 biar tidak nempel ke bar
                color: '#5a3e1b',
                font: {
                    weight: 'bold',
                    size: 13
                },
                formatter: function(value) {
                    return value + '%';
                }
            }
        },

        scales: {
            y: {
                beginAtZero: true,
                max: 100,
                display: false
            },
            x: {
                grid: { display: false },
                offset: true,
                ticks: {
                    maxRotation: 0,
                    minRotation: 0,
                    color: '#7a5c3a',
                    font: { size: 12 }
                }
            }
        }
    }
});
</script>





<div id="copyToast" class="copy-toast">
    ✅ Token berhasil disalin!
</div>

</body>
</html>
