<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
{{--    <link href="img/logo/logo.png" rel="icon">--}}
    <title>Paud Tunas Harapan - Dashboard</title>
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/simple-calendar.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
</head>

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('welcome')}}">
            <div class="sidebar-brand-text mx-3">Paud</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{route('siswa.index')}}">
                <i class="fas fa-fw fa-child"></i>
                <span>Pendaftaran Siswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('guru.index')}}">
                <i class="fas fa-fw fa-chalkboard-teacher"></i>
                <span>Guru</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('walimurid.index')}}">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>Orang tua/Wali murid</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
               aria-controls="collapsePage">
                <i class="fas fa-fw fa-columns"></i>
                <span>Sarpras</span>
            </a>
            <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Sarpras</h6>
                    <a class="collapse-item" href="{{route('sarana.index')}}">Sarana</a>
                    <a class="collapse-item" href="{{route('prasarana.index')}}">Prasarana</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider">
        <div class="version">Paud Version 0.1</div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                                           aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-envelope fa-fw"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown  no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs"></i><span class="ml-1">Master</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="messagesDropdown">
                            <h6 class="dropdown-header">
                                Setting Master
                            </h6>
                            <a class="dropdown-item" href="{{route('kelamin.index')}}">Gender</a>
                            <a class="dropdown-item" href="{{route('agama.index')}}">Agama</a>
                            <a class="dropdown-item" href="{{route('kota.index')}}">Kab/Kota</a>
                            <a class="dropdown-item" href="{{route('pendidikan.index')}}">Pendidikan</a>
                            <a class="dropdown-item" href="{{route('pekerjaan.index')}}">Pekerjaan</a>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-astronaut"></i>
                            <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
               @yield('page-title')
                @yield('content')
            </div>
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
            <span>copyright &copy; 2019 - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
                </div>
            </div>
        </footer>
        <!-- Footer -->
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/ruang-admin.min.js')}}"></script>
{{--<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>--}}
{{--<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>--}}
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}

<script src="{{asset('js/jquery.simple-calendar.js')}}"></script>



<script src="https://code.highcharts.com/highcharts.js"></script>
{{--    <script src="https://code.highcharts.com/modules/data.js"></script>--}}
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
{{--    <script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
{{--    <script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    // Create the chart
    Highcharts.chart('grafik', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Paud Tunas Harapan'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total data saat ini',
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },

        tooltip: {
            headerFormat: null,
            pointFormat: '<span style="color:{point.color}">Total</span>: <b>{point.y}</b> {point.name}<br/>'
        },

        series: [
            {
                name: "Browsers",
                colorByPoint: true,
                data: [
                    {
                        name: "Siswa",
                        y: {{$siswa}},
                        drilldown: "null"
                    },
                    {
                        name: "Guru",
                        y: {{$guru}},
                        drilldown: "null"

                    },
                    {
                        name: "Wali Murid",
                        y: {{$walimurid}},
                        drilldown: "null"
                    },
                    {
                        name: "Sarana",
                        y: {{$sarana}},
                        drilldown: "null"
                    },
                    {
                        name: "Prasarana",
                        y: {{$prasarana}},
                        drilldown: "null"
                    },
                ]
            }
        ]
    });
</script>



<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
    // $('input[name="nohp"]').mask('0000 0000 000000');
    var cleave = new Cleave('.input-element', {
        phone: true,
        phoneRegionCode: "ID"
    });
</script>

</body>

</html>
