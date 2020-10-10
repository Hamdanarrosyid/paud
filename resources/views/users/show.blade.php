@extends('layouts.dashboard2')

@section('pengaturan-user-active')
    active
@endsection
@section('pengaturan-user-show')
    show
@endsection
@section('content')
    <div class="card col-lg-6 mx-auto mb-5">
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
                        <div class="form-group">
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
                        <button class="btn-sm btn-primary col-12" type="button" id="p">Ubah password</button>
                        <div class="form-group" id="form-pass">
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       autocomplete="new-password" placeholder="********">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm Password*') }}</label>
                                <input id="password-confirm" type="password"
                                       class="form-control @error('confirm-password') is-invalid @enderror"
                                       name="password_confirmation" autocomplete="new-password"
                                       placeholder="********">
                                @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                @enderror
                            </div>
                        </div>
                        {{--                        {{dd($user->role->id)}}--}}
                        <div class="form-group">
                            <label>Role*</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option  value="{{null}}">Select..</option>
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
                                <button type="button" data-toggle="modal" data-target="#delete-modal"
                                        class="btn btn-danger">Delete
                                </button>
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

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-center">
                    <div>
                        @if($user->guru == null)
                            <h1 style="font-size: 100px;color: #efbd67" class="fas fa-exclamation-circle mt-4"></h1>
                        @else
                            <h1 style="font-size: 100px;color: #f13333" class="fas fa-exclamation-circle mt-4"></h1>
                        @endif
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <h2 class="text-gray-900">Apa anda yakin?</h2>
                    </div>
                    <div class="d-flex justify-content-center">
                        @if($user->guru == null)
                            <h4 class="text-gray-700">Data anda tidak bisa dikembalikan!</h4>
                        @else
                            <div>
                                <h5 class="text-gray-900 justify-content-center">Akun ini terhubung dengan data <a href="{{route('guru.show',['guru'=>$user->guru->id])}}">{{$user->guru->nama}}</a></h5>
                                <p class="text-gray-700 d-flex justify-content-center">Jika anda yakin akan menghapus data {{$user->guru->nama}} seluruh datanya akan ikut terhapus.</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="pb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mr-2"
                            onclick="event.preventDefault();document.getElementById('deleteform').submit();">Ya Hapus
                    </button>
                    <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            {{--if ({?W@error()})--}}
            $('#form-pass').hide();
            $('#p').click(function () {
                // $('#p').text('hide');
                $('#form-pass').toggle(500);
            });
        })
    </script>
@endsection
