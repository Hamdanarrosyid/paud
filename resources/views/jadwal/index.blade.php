@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-warning justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Jadwal</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Jadwal</li>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                {{--                <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('jadwal.create')}}"><i class="fas fa-plus"></i> Tambah Data</a></h6>--}}
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" id="Table">
                    <thead class="thead-light">
                    <tr>
                        <th>Time</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                        {{session('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(session('status'))
                    <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                        {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{--                <div class="d-flex flex-row float-lg-right m-lg-2 justify-content-center">--}}
                {{--                    <button class="btn btn-success mt-2" type="button" id="save">Save</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>


    <script src="{{asset('js/jadwal.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>


        $(document).ready(function () {
            fetch_data()

            function fetch_data() {
                $.ajax({
                    url: 'jadwal/fetch',
                    dataType: 'json',
                    success: function (data) {
                        var html = '';

                        for (var count = 0; count < data.length; count++) {
                            html += '<tr id="baris">';
                            html += '<td contenteditable data-id="' + data[count].id + '" data-column_name="time">' + data[count].time + '</td>'
                            html += '<td contenteditable class="column" data-column_name="senin"  data-id="' + data[count].id + '">' + data[count].senin + '</td>'
                            html += '<td contenteditable class="column" data-column_name="selasa" data-id="' + data[count].id + '">' + data[count].selasa + '</td>'
                            html += '<td contenteditable class="column" data-column_name="rabu" data-id="' + data[count].id + '">' + data[count].rabu + '</td>'
                            html += '<td contenteditable class="column" data-column_name="kamis" data-id="' + data[count].id + '">' + data[count].kamis + '</td>'
                            html += '<td contenteditable class="column" data-column_name="jumat" data-id="' + data[count].id + '">' + data[count].jumat + '</td>'
                            html += '<td>'
                            html += '<button type="button" class="btn btn-info btn-xs " id="update"><i class="fas fa-pen"/></button>'
                            html += '<button type="button" class="btn btn-danger btn-xs"  data-id="' + data[count].id + '" id="delete"><i class="fas fa-trash"/> </button>'
                            html += '</td></tr>';

                        }
                        html += '<tr style="border-bottom: 1px solid lightgrey" >';
                        html += '<td contenteditable id="time"></td>'
                        html += '<td contenteditable id="senin" ></td>'
                        html += '<td contenteditable id="selasa"></td>'
                        html += '<td contenteditable id="rabu"></td>'
                        html += '<td contenteditable id="kamis"></td>'
                        html += '<td contenteditable id="jumat"></td>'
                        html += '<td><button type="button" class="btn btn-success btn-xs " id="add"><i class="fas fa-plus"/></button></td></tr>';
                        html += '</tr>';

                        // $('tbody').html(html)
                        $('tbody').on('click', '.column', function () {
                            $(this).data('id', function () {
                                $('#delete').hide()
                            })
                            // console.log('click',id)
                        })
                    }
                })
            }

            var _token = $('input[name="_token"]').val();

            $(document).on('click', '#add', function () {
                var time = $('#time').text();
                var senin = $('#senin').text();
                var selasa = $('#selasa').text();
                var rabu = $('#rabu').text();
                var kamis = $('#kamis').text();
                var jumat = $('#jumat').text();
                if (time !== '' || senin !== '' || selasa !== '') {
                    $.ajax({
                        url: "{{ route('jadwal.store') }}",
                        method: "POST",
                        data: {
                            time: time,
                            senin: senin,
                            selasa: selasa,
                            rabu: rabu,
                            kamis: kamis,
                            jumat: jumat,
                            _token: _token
                        },
                        success: function (data) {
                            $('#message').html(data);
                            fetch_data();
                        }
                    });
                } else {
                    alert('not null')
                }
            });
        })
    </script>

@endsection
