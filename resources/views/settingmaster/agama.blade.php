@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center border-bottom-info justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Agama</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Setting master</li>
            <li class="breadcrumb-item active font-weight-normal" aria-current="page">Agama</li>
        </ol>
    </div>
@endsection
@section('content')
        <ul class="list-group m-auto col-lg-10 ">
            <li class="list-group-item d-flex bg-navbar justify-content-between" aria-disabled="true">
                <span class="text-white">Agama</span>
                <a class="text-white" href="#" data-toggle="modal" data-target="#createmodal">
                    <i class="fas fa-plus"></i>
                    Tambah Data</a>
            </li>
            @foreach($Agama as $data)
            <li class="list-group-item d-flex justify-content-between">{{$data->agama}}
                <div>
                    <a href="#" type="button" class="badge badge-success " data-toggle="modal" data-target="#editmodal-{{$data->id}}">Edit</a>
                    <form action="{{route('agama.destroy',['agama'=>$data->id])}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit"  class="badge badge-danger " style="cursor: pointer">Hapus</button>
                    </form>
                </div>
            </li>
                @endforeach

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
{{$Agama->links()}}
        </ul>
        {{--Create Modal--}}
        <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Agama</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('agama.store')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="agama" class="form-control" id="agama">
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
        @foreach($Agama as $data)
        <div class="modal fade" id="editmodal-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Agama</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('agama.update',['agama'=>$data->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="agama" class="col-sm-4 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$data->agama}}" name="agama" class="form-control" id="agama">
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
