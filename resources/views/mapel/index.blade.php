@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Mapel</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Mapel</li>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                                @can('guru.create')
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
                        <th>kode</th>
                        <th>Mapel</th>
                        <th>Tahun Ajaran</th>
                        <th>Kelas</th>
                        <th>Keterangan</th>
                                                @canany(['guru.update','guru.delete'])
                        <th>Action</th>
                                                @endcan
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mapel as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$data->kode}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->tahun->tahun}}<span> - semester </span>{{$data->tahun->semester}}</td>
                            <td>{{$data->kelas->kelas}}</td>
                            <td>{{$data->keterangan}}</td>
                                                        @canany(['guru.update','guru.delete'])
                            <td>
                                                                    @can('guru.update')
                                <a href="#" data-toggle="modal" data-target="#editmodal-{{$data->id}}"
                                   class="badge badge-primary font-weight-light">Edit</a>
                                                                    @endcan
                                                                    @can('guru.delete')
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Input Data Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('mapel.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="input-group mb-3">
                            <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                            <input type="text" required name="kode" placeholder="Masukan kode"
                                   class="form-control @error('kode') is-invalid @enderror" id="kode">
                            @error('kode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label for="nama" class="col-sm-4 col-form-label">Mapel</label>
                            <input type="text" placeholder="Masukan mapel" required name="nama"
                                   class="form-control @error('nama') is-invalid @enderror" id="nama"
                                   aria-describedby="basic-addon2">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label for="tahunajaran_id" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                            <select name="tahunajaran_id" class="form-control @error('tahun') is-invalid @enderror">
                                @foreach($tahunajaran as $data)
                                    <option value="{{$data->id}}">{{$data->tahun}}
                                        <span> - semester </span>{{$data->semester}}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label for="kelas_id" class="col-sm-4 col-form-label">Kelas</label>
                            <select name="kelas_id" class="form-control @error('kelas') is-invalid @enderror">
                                @foreach($kelas as $data)
                                    <option value="{{$data->id}}">{{$data->kelas}}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                            <textarea required name="keterangan"
                                      class="form-control @error('keterangan') is-invalid @enderror" id="keterangan"
                                      placeholder="Masukan keterangan"></textarea>
                            @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
    @foreach($mapel as $value)
        <div class="modal fade" id="editmodal-{{$value->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data Mapel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('mapel.update',['mapel'=>$value->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="input-group mb-3">
                                <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                                <input type="text" required name="kode" disabled value="{{$value->kode}}"
                                       placeholder="Masukan kode"
                                       class="form-control @error('kode') is-invalid @enderror" id="kode">
                                {{--                                @error('kode')--}}
                                {{--                                <span class="invalid-feedback" role="alert">--}}
                                {{--                                        <strong>{{ $message }}</strong>--}}
                                {{--                                    </span>--}}
                                {{--                                @enderror--}}
                            </div>
                            <div class="input-group mb-3">
                                <label for="nama" class="col-sm-4 col-form-label">Mapel</label>
                                <input type="text" placeholder="Masukan mapel" value="{{$value->nama}}" required
                                       name="nama" class="@error('nama') is-invalid @enderror form-control" id="nama"
                                       aria-describedby="basic-addon2">
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <label for="tahunajaran_id" class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                <select name="tahunajaran_id" class="form-control @error('tahun') is-invalid @enderror">
                                    @foreach($tahunajaran as $data)
                                        @if($value->tahunajaran_id == $data->id)
                                            <option selected value="{{$value->tahunajaran_id}}">{{$value->tahun->tahun}}
                                                <span> - semester </span>{{$value->tahun->semester}}</option>
                                        @endif
                                        <option value="{{$data->id}}">{{$data->tahun}}
                                            <span> - semester </span>{{$data->semester}}</option>
                                    @endforeach
                                </select>
                                @error('tahun')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <label for="kelas_id" class="col-sm-4 col-form-label">Kelas</label>
                                <select name="kelas_id" class="form-control @error('kelas') is-invalid @enderror">
                                    @foreach($kelas as $data)
                                        @if($value->kelas_id == $data->id)
                                            <option selected
                                                    value="{{$value->kelas_id}}">{{$value->kelas->kelas}}</option>
                                        @endif
                                        <option value="{{$data->id}}">{{$data->kelas}}</option>
                                    @endforeach
                                </select>
                                @error('kelas')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                <textarea required name="keterangan"
                                          class="form-control @error('keterangan') is-invalid @enderror"
                                          id="keterangan">{{$value->keterangan}}</textarea>
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    @foreach($mapel as $data)
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
                    <form action="{{route('mapel.destroy',['mapel'=>$data->id])}}" method="post">
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
