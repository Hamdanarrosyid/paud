@extends('layouts.dashboard2')

@section('pengaturan-user-active')
    active
@endsection
@section('pengaturan-user-show')
    show
@endsection
@section('content')
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                @can('user.create')
                <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('user.create')}}"><i class="fas fa-plus"></i> Tambah Data</a></h6>
                @endcan
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTable">
                    <thead class="thead-light">
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
{{--                        <th>Role</th>--}}
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td >
                                {{$data->email}}
                            </td>
                            <td><a href="{{route('user.show',['user'=>$data->id])}}" class="badge badge-info font-weight-light">Show & Edit</a></td>
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
