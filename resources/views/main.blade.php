<!DOCTYPE html>
<html lang="en">

@include('include.header')

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-600 bg-primary position-absolute w-100"></div>
    @include('include.sidebar')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        @include('include.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row mx-6">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <a href="#">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class=" mb-0 text-uppercase font-weight-bolder">Status Tinggal Tetap</p>
                                            <h5 class="font-weight-bolder">
                                                {{ $statusTinggal ?? 0 }}
                                            </h5>
                                            <p class="mb-0">
                                                penghuni
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                            <i class="fa fa-user-md text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <a href="#">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class=" mb-0 text-uppercase font-weight-bolder">Status Tinggal Kontrak
                                            </p>
                                            <h5 class="font-weight-bolder">
                                                {{ $statusTinggal2 ?? 0 }}
                                            </h5>
                                            <p class="mb-0">
                                                penghuni
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                            <i class="fa fa-hospital-o text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <a href="#">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class=" mb-0 text-uppercase font-weight-bolder">Status Rumah Kosong</p>
                                            <h5 class="font-weight-bolder">
                                                {{ $statusRumah ?? 0 }}
                                            </h5>
                                            <p class="mb-0">
                                                rumah
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                            <i class="fa fa-heartbeat text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <a href="#">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class=" mb-0 text-uppercase font-weight-bolder">Status Rumah Ditempati
                                            </p>
                                            <h5 class="font-weight-bolder">
                                                {{ $statusRumah3 ?? 0 }}
                                            </h5>
                                            <p class="mb-0">
                                                rumah
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-primary shadow-success text-center rounded-circle">
                                            <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row mt-4 mx-6 d-flex justify-content-center">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <a href="{{ url('report/umum') }}">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class=" mb-0 text-uppercase font-weight-bolder">Kebersihan
                                                Lunas</p>
                                            <h5 class="font-weight-bolder">
                                                {{ $kebersihan ?? 0 }}
                                            </h5>
                                            <p class="mb-0">
                                                penghuni
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                            <i class="fa fa-stethoscope text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <a href="{{ url('report/MTBS') }}">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class=" mb-0 text-uppercase font-weight-bolder"> Keamanan Lunas
                                            </p>
                                            <h5 class="font-weight-bolder">
                                                {{ $keamanan ?? 0 }}
                                            </h5>
                                            <p class="mb-0">
                                                penghuni
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                                            <i class="ni ni-sound-wave text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <a href="#">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class=" mb-0 text-uppercase font-weight-bolder">Jumlah Rumah Singgah</p>
                                            <h5 class="font-weight-bolder">
                                                {{ $homeservice ?? 0 }}
                                            </h5>
                                            <p class="mb-0">
                                                rumah
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div
                                            class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                            <i class="fa fa-ambulance text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @include('include.footer')

        </div>
    </main>
    <!--   Core JS Files   -->
    @include('include.script')
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

</body>

</html>
