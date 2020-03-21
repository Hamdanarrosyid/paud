@extends('layouts.dashboard2')
@section('page-title')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Earnings (Monthly) Card Example -->
    <div class="row mb-3">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col ml-2">
                            <div class="text-xl font-weight-bold text-uppercase mb-2">Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$siswa}}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                {{--                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
                                <span>Since yesterday</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-child fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-3">
                            <div class="text-xl font-weight-bold text-uppercase mb-2">Guru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$guru}}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                {{--                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
                                <span>Since yesterday</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-chalkboard-teacher fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col ml-2">
                            <div class="text-xl font-weight-bold text-uppercase mb-2">Wali Murid</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$walimurid}}</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                {{--                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
                                <span>Since yesterday</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-user-shield fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
    {{--    <div class="col-xl-3 col-md-6 mb-4">--}}
    {{--        <div class="card h-100">--}}
    {{--            <div class="card-body">--}}
    {{--                <div class="row no-gutters align-items-center">--}}
    {{--                    <div class="col mr-2">--}}
    {{--                        <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>--}}
    {{--                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>--}}
    {{--                        <div class="mt-2 mb-0 text-muted text-xs">--}}
    {{--                            <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
    {{--                            <span>Since yesterday</span>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-auto">--}}
    {{--                        <i class="fas fa-comments fa-2x text-warning"></i>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <!-- Area Chart -->
        <figure class="highcharts-figure col-xl-8 col-lg-7">
            <div class="card">
                <div id="grafik"></div>
            </div>
        </figure>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card mb-4">
                <div id="calender" class="calendar-container"></div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {
                $("#calender").simpleCalendar({
                    fixedStartDay: false,
                    disableEmptyDetails: true,
                    events: [
                        
                    ],

                });
            });
        </script>




@endsection
