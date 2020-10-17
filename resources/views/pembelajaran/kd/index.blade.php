@extends('layouts.dashboard2')

@section('pembelajaran-active')
    active
@endsection
@section('pembelajaran-show')
    show
@endsection
@section('content')
    <div class="container d-flex justify-content-end">
        {{--        <input type="text" class="rounded-pill px-2 w-25 border-0" placeholder="search">--}}
        <div class="wrapper">
            <a href="#" class="button-pill" data-toggle="modal" data-target="#createmodal">
                <div class="icon"><i class="fas fa-plus"></i></div>
                <span>Tambah data</span>
            </a>
        </div>
    </div>
    <table class="table col-lg-12 mt-2 px-0 bg-white">
        <tr>
            <th>Kode</th>
            <th>Kompetensi Dasar</th>
            <th>Aksi</th>
        </tr>
        @foreach($kd as $data)
            <tr>
                <td>{{$data->kode}}</td>
                <td>{{$data->kompetensi_dasar}}</td>
                <td>
                    <a href="#" type="button" class="btn badge badge-success " data-toggle="modal"
                       data-target="#editmodal-{{$data->id}}">Edit</a>
                    <form action="{{route('kd.destroy',['kd'=>$data->id])}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn badge badge-danger " style="cursor: pointer">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
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
    {{$kd->links()}}
    {{--    </ul>--}}
    {{--Create Modal--}}
    <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kompetensi Dasar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('kd.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                            <div class="col-sm-8">
                                <input required type="text" placeholder="1.1" name="kode" class="form-control" id="kode">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kompetensi_dasar" class="col-sm-4 col-form-label">Kompetensi Dasar</label>
                            <div class="col-sm-8">
                                <input required type="text" placeholder="nama kd" name="kompetensi_dasar" class="form-control" id="kompetensi_dasar">
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
    @foreach($kd as $data)
        <div class="modal fade" id="editmodal-{{$data->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kompetensi Dasar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('kd.update',['kd'=>$data->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                                <div class="col-sm-8">
                                    <input required type="text" value="{{$data->kode}}" name="kode" class="form-control" id="kode">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kompetensi_dasar" class="col-sm-4 col-form-label">Kompetensi Dasar</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$data->kompetensi_dasar}}" name="kompetensi_dasar" class="form-control"
                                           id="kompetensi_dasar">
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
@endsection
