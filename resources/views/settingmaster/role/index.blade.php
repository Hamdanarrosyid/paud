@extends('layouts.dashboard2')

@section('pengaturan-user-active')
    active
@endsection
@section('pengaturan-user-show')
    show
@endsection
@section('content')

    <ul class="list-group m-auto col-lg-10">
        <li class="list-group-item d-flex justify-content-between mb-2" aria-disabled="true">
            <span class="text-gray-900">Role</span>
            @can('role.create')
            <a class="text-dark" href="{{route('role.create')}}">
                <i class="fas fa-plus"></i>
                Tambah Data</a>
            @endcan
        </li>
        @foreach($roles as $data)
            <li class="list-group-item d-flex justify-content-between"><span class="mt-2 text-capitalize">{{$data->role}}</span>
                <div>
                    @can('role.update')
                    <a href="{{route('role.show',['role'=>$data->id])}}" type="button"class="@if($data->id == 1) d-none @endif badge badge-primary font-weight-light">lihat Permission</a>
                    @endcan
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
        {{$roles->links()}}
    </ul>
@endsection
