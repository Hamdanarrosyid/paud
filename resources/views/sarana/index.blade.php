@extends('layouts.dashboard2')

@section('sarpras-active')
    active
@endsection
@section('sarpras-show')
    show
@endsection
@section('content')
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                @can('sarpras.create')
                    <h6 class="m-0 font-weight-bold text-primary"><a href="#" data-toggle="modal"
                                                                     data-target="#createmodal"><i
                                class="fas fa-plus"></i>
                            Tambah Data</a></h6>
                @endcan
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTable">
                    <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Perlengkapan</th>
                        <th>Jumlah(unit)</th>
                        <th>Kondisi baik(unit)</th>
                        <th>Kondisi rusak(unit)</th>
                        @canany(['sarpras.update','sarpras.delete'])
                            <th>Action</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sarana as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->perlengkapan}}</td>
                            <td>{{$data->jumlah}} unit</td>
                            <td>{{$data->kondisibaik}} unit</td>
                            <td>{{$data->kondisirusak}} unit</td>
                            @canany(['sarpras.update','sarpras.delete'])
                                <td>
                                    @can('sarpras.update')
                                        <a href="#" data-toggle="modal" data-target="#editmodal-{{$data->id}}"
                                           class="badge badge-primary font-weight-light">Edit</a>
                                    @endcan
                                    @can('sarpras.delete')
                                        <a href="#" data-toggle="modal" data-target="#hapusmodal-{{$data->id}}"
                                           class="badge badge-danger font-weight-light">Delete</a>
                                    @endcan
                                </td>
                            @endcan
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Sarana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('sarana.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="perlengkapan" class="col-sm-4 col-form-label">Perlengkapan</label>
                            <div class="col-sm-8">
                                <input type="text" placeholder="Masukan perlengkapan" name="perlengkapan"
                                       class="form-control" id="perlengkapan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisibaik" class="col-sm-4 col-form-label">Kondisi Baik</label>
                            <div class="col-sm-8">
                                <input type="number" value="0" name="kondisibaik" class="form-control" id="kondisibaik">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisirusak" class="col-sm-4 col-form-label">Kondisi Rusak</label>
                            <div class="col-sm-8">
                                <input type="number" value="0" name="kondisirusak" class="form-control"
                                       id="kondisirusak">
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
    @foreach($sarana as $data)
        <div class="modal fade" id="editmodal-{{$data->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Sarana</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('sarana.update',['sarana'=>$data->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="perlengkapan" class="col-sm-4 col-form-label">Perlengkapan</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$data->perlengkapan}}" name="perlengkapan"
                                           class="form-control" id="perlengkapan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kondisibaik" class="col-sm-4 col-form-label">Kondisi Baik</label>
                                <div class="col-sm-8">
                                    <input type="number" value="{{$data->kondisibaik}}" name="kondisibaik"
                                           class="form-control" id="kondisibaik">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kondisirusak" class="col-sm-4 col-form-label">Kondisi Rusak</label>
                                <div class="col-sm-8">
                                    <input type="number" value="{{$data->kondisirusak}}" name="kondisirusak"
                                           class="form-control" id="kondisirusak">
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
    @foreach($sarana as $data)
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
                    <form action="{{route('sarana.destroy',['sarana'=>$data->id])}}" method="post">
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
