@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-success justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Siswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Pendaftaran Siswa</li>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                    <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('exportpdf')}}">Download PDF</a></h6>
                @can('siswa.create')
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('siswa.create')}}"><i
                                class="fas fa-plus"></i> Tambah Data</a></h6>
                @endcan
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTable">
                    <thead class="thead-light">
                    <tr>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Tempat tanggal Lahir</th>
                        <th>Wali murid</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($siswa as $data)
                        <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->gender->jeniskelamin}}</td>
                            <td>
                                {{$data->tempat->kota}} {{$data->tanggal}}
                            </td>
                            <td>{{$data->walimurid->nama}}</td>
                            <td>
                                <a href="{{route('siswa.edit',['siswa'=>$data->id])}}"
                                   class="badge badge-info font-weight-light">Show & Edit</a>
                                <a href="{{route('siswa.show',['siswa'=>$data->id])}}"
                                   class="badge badge-success font-weight-light">Mapel</a>
                            </td>
                        </tr>
                    @endforeach
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
            </div>
        </div>
    </div>

@endsection
