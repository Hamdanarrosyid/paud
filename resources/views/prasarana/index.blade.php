@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-info justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Prasarana</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Prasarana</li>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                <h6 class="m-0 font-weight-bold text-primary"><a href="#" data-toggle="modal" data-target="#createmodal"><i class="fas fa-plus"></i>
                        Tambah Data</a></h6>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTable">
                    <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Ruang</th>
                        <th>Jumlah(unit)</th>
                        <th>panjang(m)</th>
                        <th>lebar(m)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prasarana as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->namaruang}}</td>
                            <td>{{$data->jumlah}} unit</td>
                            <td>{{$data->panjang}} m</td>
                            <td>{{$data->lebar}} m</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#editmodal-{{$data->id}}"
                                   class="badge badge-primary font-weight-light">Edit</a>
                                <a href="#" data-toggle="modal" data-target="#hapusmodal-{{$data->id}}"
                                   class="badge badge-danger font-weight-light">Delete</a>
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
    {{--Create Modal--}}
    <div class="modal fade " id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Prasarana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('prasarana.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <label for="namaruang" class="col-sm-4 col-form-label">Nama ruang</label>
                                <input type="text" required name="namaruang" placeholder="Masukan nama ruang" class="form-control" id="namaruang">
                        </div>
                        <div class="input-group mb-3">
                            <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                                <input type="number" required value="0" name="jumlah" class="form-control" id="jumlah" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <label for="panjang" class="col-sm-4 col-form-label">panjang</label>
                            <input type="number"step="any" required name="panjang" class="form-control" value="0"  aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text bg-gray-400 border-0 text-dark" id="basic-addon2">meter</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="lebar" class="col-sm-4 col-form-label">lebar</label>
                            <input type="number" step="any" required name="lebar" class="form-control" value="0"  aria-describedby="basic-addon2">
                            <div class=" input-group-append">
                                <span class="bg-gray-400 border-0 text-dark input-group-text" id="basic-addon2">meter</span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--Edit Modal--}}
    @foreach($prasarana as $data)
        <div class="modal fade" id="editmodal-{{$data->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Prasarana</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('prasarana.update',['prasarana'=>$data->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="input-group mb-3">
                                <label for="namaruang" class="col-sm-4 col-form-label">Nama ruang</label>
                                <input type="text" value="{{$data->namaruang}}" required name="namaruang" placeholder="Masukan nama ruang" class="form-control" id="namaruang">
                            </div>
                            <div class="input-group mb-3">
                                <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                                <input type="number" value="{{$data->jumlah}}" required name="jumlah" class="form-control" id="jumlah" aria-describedby="basic-addon2">
                            </div>
                            <div class="input-group mb-3">
                                <label for="panjang" class="col-sm-4 col-form-label">panjang</label>
                                <input type="number" step="any" name="panjang" class="form-control" value="{{$data->panjang}}" required  aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-gray-400 border-0 text-dark" id="basic-addon2">meter</span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label for="lebar" class="col-sm-4 col-form-label">lebar</label>
                                <input type="number" step="any" name="lebar" class="form-control" value="{{$data->lebar}}" required  aria-describedby="basic-addon2">
                                <div class=" input-group-append">
                                    <span class="bg-gray-400 border-0 text-dark input-group-text" id="basic-addon2">meter</span>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!--Hapus Modal -->
    @foreach($prasarana as $data)
        <div class="modal fade" id="hapusmodal-{{$data->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('prasarana.destroy',['prasarana'=>$data->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            Yakin menghapus data?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
