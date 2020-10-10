@extends('layouts.dashboard2')

@section('pengaturan-user-active')
    active
@endsection
@section('pengaturan-user-show')
    show
@endsection
@section('content')
    <div class="card col-lg-6 mx-auto mb-5">
        <form action="{{route('registerme')}}" method="post">
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
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

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
                                   name="password_confirmation" required autocomplete="new-password">
                            @error('confirm-password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Role*</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option  value="{{null}}">Select..</option>
                                @foreach($roles as $data)
                                    <option value="{{$data->id}}">{{$data->role}}</option>
                                @endforeach
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" name="reset" value="reset" class="btn btn-danger">Batal</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
