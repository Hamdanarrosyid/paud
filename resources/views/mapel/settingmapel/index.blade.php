@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Guru dan Mapel</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal">Mapel</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Guru dan Mapel</li>
        </ol>
    </div>
@endsection
@section('content')
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                @can('user.create')
                    <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('mapelguru.create')}}"><i
                                class="fas fa-plus"></i> Tambah Data</a></h6>
                @endcan
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTable">
                    <thead class="thead-light">
                    <tr>
                        <th>Username</th>
                        <th>Mapel Yang Diampu</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guru as $dataguru)
                        @if(count($dataguru->mapels)==0)

                        @else
                        <tr>
                            <td>{{$dataguru->nama? $dataguru->nama:'Guru belum mengisi data diri'}}</td>
                            <td>
                                @foreach($dataguru->mapels as $data)
                                    {{$data->nama}}
                                    @if( !$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('mapelguru.edit',['mapelguru'=>$dataguru->id])}}"
                                   class="badge badge-info font-weight-light">Edit</a>
                                @can('guru.delete')
                                    <a href="#"
                                       data-toggle="modal" data-target="#delete-mapelguru"
                                       class="badge badge-danger font-weight-light">Hapus</a>
                                @endcan
                            </td>
                        </tr>
                        @can('guru.delete')
                            <div class="modal fade" id="delete-mapelguru" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="d-flex justify-content-center">
                                            <div>
                                                <h1 style="font-size: 100px;color: #efbd67"
                                                    class="fas fa-exclamation-circle mt-4"></h1>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center">
                                                <h2 class="text-gray-900">Apa anda yakin?</h2>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <h4 class="text-gray-700">Data anda tidak bisa dikembalikan!</h4>
                                            </div>
                                        </div>
                                        <div class="pb-4 d-flex justify-content-center">
                                            <form id="deleteform" method="POST"
                                                  action="{{route('mapelguru.destroy',['mapelguru'=>$dataguru->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary mr-2" >
                                                    Ya Hapus
                                                </button>
                                            </form>
                                            <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endcan
                        @endif
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
