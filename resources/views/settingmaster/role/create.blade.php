@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-warning justify-content-between mb-4">
        <h1 class="h3 text-gray-800"><a href="{{route('role.index')}}" class="text-gray-700 mr-4"><i
                    class="fas fa-angle-left"></i></a>Tambah Role</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Tambah Role</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card col-lg-9 m-auto">
        <form action="{{route('role.store')}}" method="post">
            @csrf
            <div class="row">
                <!-- Form Sizing -->
                <div class="col-lg-12">
                    <div class="card-header mt-2">
                        <h6 class=" font-weight-bold text-primary mb-0" style="font-size: 20px">Role</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Role</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control text-body text-capitalize" id="staticEmail" name="role"
                                       placeholder="Masukan nama role">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Pengaturan User Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'user')
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{$permission->id}}"
                                                   id="{{$permission->id}}" name="permission[]">
                                            <label class="form-check-label" for="{{$permission->id}}">
                                                {{$permission->permission}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Data Siswa Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'siswa')
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{$permission->id}}"
                                                   id="{{$permission->id}}" name="permission[]">
                                            <label class="form-check-label" for="{{$permission->id}}">
                                                {{$permission->permission}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Data Guru Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'guru')
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{$permission->id}}"
                                                   id="{{$permission->id}}" name="permission[]">
                                            <label class="form-check-label" for="{{$permission->id}}">
                                                {{$permission->permission}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Data Wali Murid Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'walimurid')
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{$permission->id}}"
                                                   id="{{$permission->id}}" name="permission[]">
                                            <label class="form-check-label" for="{{$permission->id}}">
                                                {{$permission->permission}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Data Jadwal Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'jadwal')
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{$permission->id}}"
                                                   id="{{$permission->id}}" name="permission[]">
                                            <label class="form-check-label" for="{{$permission->id}}">
                                                {{$permission->permission}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Data Sarpras Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'sarpras')
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{$permission->id}}"
                                                   id="{{$permission->id}}" name="permission[]">
                                            <label class="form-check-label" for="{{$permission->id}}">
                                                {{$permission->permission}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="d-flex flex-row justify-content-end">
                            <button type="submit" class="btn btn-sm btn-success mr-2">Save</button>
                            <button type="reset" name="reset" value="reset" class="btn-sm btn btn-danger">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
