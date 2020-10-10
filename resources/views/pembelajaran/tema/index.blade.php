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
                <th>No</th>
                <th>Tema</th>
                <th>Aksi</th>
            </tr>
        @foreach($tema as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->tema}}</td>
            <td>
            <a href="#" type="button" class="btn badge badge-success " data-toggle="modal"
               data-target="#editmodal-{{$data->id}}">Edit</a>
            <form action="{{route('tema.destroy',['tema'=>$data->id])}}" method="post" class="d-inline">
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
    {{$tema->links()}}
    {{--    </ul>--}}
    {{--Create Modal--}}
    <div class="modal fade" id="createmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('tema.store')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="tema" class="col-sm-4 col-form-label">Tema</label>
                            <div class="col-sm-8">
                                <input type="text" name="tema" class="form-control" id="tema">
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
    @foreach($tema as $data)
        <div class="modal fade" id="editmodal-{{$data->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Tema</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('tema.update',['tema'=>$data->id])}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="tema" class="col-sm-4 col-form-label">Tema</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{$data->tema}}" name="tema" class="form-control"
                                           id="tema">
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
