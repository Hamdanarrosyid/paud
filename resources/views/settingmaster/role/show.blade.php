@extends('layouts.dashboard2')

@section('pengaturan-user-active')
    active
@endsection
@section('pengaturan-user-show')
    show
@endsection
@section('content')
    <div class="card col-lg-9 m-auto">
        <form action="{{route('role.update',['role'=>$role->id])}}" method="post">
            @method('patch')
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
                                       value="{{$role->role}}">
                            </div>
                        </div>
                        <div class="form-group row">
{{--                            <div class="col-lg-4">--}}
{{--                                <label for="User" class="col-form-label">Pengaturan User Permission:</label>--}}
{{--                                @foreach($permissions as $permission)--}}
{{--                                    <div class="form-check col">--}}
{{--                                        @if($permission->for == 'user')--}}
{{--                                            <input class="form-check-input" type="checkbox"--}}
{{--                                                   @foreach($role->permissions as $check)--}}
{{--                                                   @if($check->id == $permission->id)--}}
{{--                                                   checked--}}
{{--                                                   @endif--}}
{{--                                                   @endforeach--}}
{{--                                                   value="{{$permission->id}}"--}}
{{--                                                   id="{{$permission->id}}" name="permission[]">--}}
{{--                                            <label class="form-check-label" for="{{$permission->id}}">--}}
{{--                                                {{$permission->permission}}--}}
{{--                                            </label>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Data Siswa Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'siswa')
                                            <input class="form-check-input" type="checkbox"
                                                   @foreach($role->permissions as $check)
                                                   @if($check->id == $permission->id)
                                                   checked
                                                   @endif
                                                   @endforeach
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
                                                   @foreach($role->permissions as $check)
                                                   @if($check->id == $permission->id)
                                                   checked
                                                   @endif
                                                   @endforeach
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
                                                   @foreach($role->permissions as $check)
                                                   @if($check->id == $permission->id)
                                                   checked
                                                   @endif
                                                   @endforeach
                                                   value="{{$permission->id}}"
                                                   id="{{$permission->id}}" name="permission[]">
                                            <label class="form-check-label" for="{{$permission->id}}">
                                                {{$permission->permission}}
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
{{--                            <div class="col-lg-4">--}}
{{--                                <label for="User" class="col-form-label">Data Role Permission:</label>--}}
{{--                                @foreach($permissions as $permission)--}}
{{--                                    <div class="form-check col">--}}
{{--                                        @if($permission->for == 'role')--}}
{{--                                            <input class="form-check-input" type="checkbox"--}}
{{--                                                   @foreach($role->permissions as $check)--}}
{{--                                                   @if($check->id == $permission->id)--}}
{{--                                                   checked--}}
{{--                                                   @endif--}}
{{--                                                   @endforeach--}}
{{--                                                   value="{{$permission->id}}"--}}
{{--                                                   id="{{$permission->id}}" name="permission[]">--}}
{{--                                            <label class="form-check-label" for="{{$permission->id}}">--}}
{{--                                                {{$permission->permission}}--}}
{{--                                            </label>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
                            <div class="col-lg-4">
                                <label for="User" class="col-form-label">Data Sarpras Permission:</label>
                                @foreach($permissions as $permission)
                                    <div class="form-check col">
                                        @if($permission->for == 'sarpras')
                                            <input class="form-check-input" type="checkbox"
                                                   @foreach($role->permissions as $check)
                                                   @if($check->id == $permission->id)
                                                   checked
                                                   @endif
                                                   @endforeach
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
                            <button type="submit" class="btn btn-success mr-2">Save</button>
                            <a href="#"
                               onclick="event.preventDefault();document.getElementById('deleteform').submit();"
                               class="btn @if($role->id == 1 || $role->id == 2 || $role->id == 3) d-none @endif btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form id="deleteform" method="POST" action="{{route('role.destroy',['role'=>$role->id])}}">
            @csrf
            @method('DELETE')
            {{--                        <button type="submit" class="btn btn-danger ">Delete Profile</button>--}}
        </form>
    </div>

@endsection
