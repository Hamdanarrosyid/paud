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
            <a href="{{route('rppm.create')}}" class="button-pill">
                <div class="icon"><i class="fas fa-plus"></i></div>
                <span>Tambah data</span>
            </a>
        </div>
    </div>
    <table class="table col-lg-12 mt-2 px-0 bg-white">
        <tr>
            {{--            <th>No</th>--}}
            <th>Sub Tema</th>
            <th>KD</th>
            <th>Muatan Belajar</th>
            <th>Rencana Kegiatan</th>
            <th>Aksi</th>
        </tr>
        @foreach($rppm as $data)
            <tr>
                {{--                <td>{{$loop->iteration}}</td>--}}
                <td>{{$data->subTema->sub_tema}}</td>
                <td>{{$data->kd}}</td>
                <td>{{$data->muatan_belajar}}</td>
                <td>{{$data->rencana_kegiatan}}</td>
                <td>
                    <a href="#" type="button" class="btn badge badge-success " data-toggle="modal"
                       data-target="#editmodal-{{$data->id}}">Edit</a>
                    <form action="{{route('rppm.destroy',['rppm'=>$data->id])}}" method="post" class="d-inline">
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
    {{$rppm->links()}}
    {{--Create Modal--}}
    <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <form action="{{route('rppm.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Sub Tema</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="tema-insert" class="col-sm-4 col-form-label">Sub Tema</label>
                            <div class="col-sm-8">
                                <select name="sub_tema_id" class="form-control" id="tema-insert">
                                    <option value="">{{__('Select...')}}</option>
                                    @foreach($subtema as $data)
                                        <option value="{{$data->id}}">{{$data->sub_tema}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kd" class="col-sm-4 col-form-label">KD</label>
                            <div class="col-sm-8">
                                <input type="text" name="kd" class="form-control" id="kd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="muatan_belajar" class="col-sm-4 col-form-label">Muatan Belajar</label>
                            <div class="col-sm-8">
                                <textarea name="muatan_belajar" class="form-control" id="muatan_belajar"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rencana_kegiatan" class="col-sm-4 col-form-label">Rencana Kegiatan</label>
                            <div class="col-sm-8">
                                <textarea name="rencana_kegiatan" class="form-control" id="rencana_kegiatan"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
            </form>
        </div>
    </div>
    </div>

    {{--Edit Modal--}}
    @foreach($rppm as $data)
        <div class="modal fade" id="editmodal-{{$data->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <form action="{{route('rppm.update',['rppm'=>$data->id])}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Sub Tema</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="tema-insert" class="col-sm-4 col-form-label">Sub Tema</label>
                                <div class="col-sm-8">
                                    <select name="sub_tema_id" class="form-control" id="tema-insert">
                                        <option value="">{{__('Select...')}}</option>
                                        @foreach($subtema as $data)
                                            <option value="{{$data->id}}">{{$data->sub_tema}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kd" class="col-sm-4 col-form-label">KD</label>
                                <div class="col-sm-8">
                                    <input type="text" name="kd" class="form-control" id="kd">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="muatan_belajar" class="col-sm-4 col-form-label">Muatan Belajar</label>
                                <div class="col-sm-8">
                                    <textarea name="muatan_belajar" class="form-control" id="muatan_belajar"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rencana_kegiatan" class="col-sm-4 col-form-label">Rencana Kegiatan</label>
                                <div class="col-sm-8">
                                    <textarea name="rencana_kegiatan" class="form-control" id="rencana_kegiatan"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
