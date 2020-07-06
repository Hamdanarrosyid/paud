@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center border-bottom-warning justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="../../../..">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Setting master</li>
            <li class="breadcrumb-item active font-weight-normal" aria-current="page">Role</li>
        </ol>
    </div>
@endsection
@section('content')

    <ul class="list-group m-auto col-lg-10">
        <li class="list-group-item d-flex justify-content-between mb-2" aria-disabled="true">
            <span class="text-gray-900">Role</span>
            <a class="text-dark" href="{{route('role.create')}}">
                <i class="fas fa-plus"></i>
                Tambah Data</a>
        </li>
        @foreach($roles as $data)
            <li class="list-group-item d-flex justify-content-between"><span class="mt-2 text-capitalize">{{$data->role}}</span>
                <div>
                    <a href="{{route('role.show',['role'=>$data->id])}}" type="button"class="badge badge-primary font-weight-light">lihat Permission</a>
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
