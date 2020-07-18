@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-warning justify-content-between mb-4">
        <h1 class="h3 text-gray-800"><a href="{{route('user')}}" class="text-gray-700 mr-4"><i
                    class="fas fa-angle-left"></i></a>Edit User</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Edit User</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card col-lg-6 m-auto">
        <form action="{{route('user.update',['user'=>$user->id])}}" method="post">
            @method('patch')
            @csrf
            <div class="row">
                <!-- Form Sizing -->
                <div class="col-lg-12">
                    <div class="card-header mt-2">
                        <h6 class=" font-weight-bold text-primary mb-0" style="font-size: 20px">User</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{$user->name}}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group >
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input disabled id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ $user->email }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="password">{{ __('Password') }}</label>--}}
{{--                            <input id="password" type="password"--}}
{{--                                   class="form-control @error('password') is-invalid @enderror" name="password" required--}}
{{--                                   autocomplete="new-password" placeholder="********">--}}

{{--                            @error('password')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                <strong>{{ $message }}</strong>--}}
{{--                                                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="password-confirm">{{ __('Confirm Password*') }}</label>--}}
{{--                            <input id="password-confirm" type="password"--}}
{{--                                   class="form-control @error('confirm-password') is-invalid @enderror"--}}
{{--                                   name="password_confirmation" required autocomplete="new-password"--}}
{{--                                   placeholder="********">--}}
{{--                            @error('confirm-password')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                <strong>{{ $message }}</strong>--}}
{{--                                                            </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        {{--                        {{dd($user->role->id)}}--}}
                        <div class="form-group">
                            <label>Role*</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                @foreach($roles as $data)
                                    @if($user->role_id === $data->id)
                                        <option selected value="{{$user->role_id}}">{{$data->role}}</option>
                                    @else
                                        <option value="{{$data->id}}">{{$data->role}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            @can('user.update')
                                <button type="submit" class="btn btn-success">Submit</button>
                            @endcan
                            @can('user.delete')
                                <a href="#"
                                   onclick="event.preventDefault();document.getElementById('deleteform').submit();"
                                   class="btn btn-danger">Delete</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @can('user.delete')
            <form id="deleteform" method="POST" action="{{route('user.destroy',['user'=>$user->id])}}">
                @csrf
                @method('DELETE')
                {{--                        <button type="submit" class="btn btn-danger ">Delete Profile</button>--}}
            </form>
        @endcan
    </div>

@endsection
