@extends('layouts.dashboard2')

@section('guru-active')
    active
@endsection
@section('content')
    <div class="card col-lg-6 mx-auto mb-5">
        <form action="{{route('guru.store')}}" method="post">
            @csrf
            <div class="row">
                <!-- Form Sizing -->
                <div class="col-lg-12">
                    <div class="card-header mt-2">
                        <h6 class=" font-weight-bold text-primary mb-0" style="font-size: 20px">Guru</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap Guru*</label>
                            <input name="nama" type="text"  id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan nama lengkap">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <select class="select2-single form-control @error('user_id') is-invalid @enderror" name="user_id" id="email">
                                <option value="{{null}}">Select..</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->email}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nohp">No Telfon*</label>
                            <input name="nohp" id="nohp" class="form-control input-element @error('nohp') is-invalid @enderror" placeholder="Masukan nohp" type="text">
                            @error('nohp')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="tempat">Tempat*</label>
                                <select name="tempat" class="form-control @error('tempat') is-invalid @enderror">
                                    <option value="{{null}}">Select..</option>
                                    @foreach($kota as $data)
                                        <option name="tempat" value="{{$data->id}}">{{$data->kota}}</option>
                                    @endforeach
                                </select>
                                @error('tempat')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-7">
                                <label for="tanggal">Tanggal Lahir*</label>
                                <input required name="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror">
                                @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Gender*</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="{{null}}">Select..</option>
                                @foreach($kelamin as $data)
                                    <option  value="{{$data->id}}">{{$data->jeniskelamin}}</option>
                                @endforeach
                            </select>
                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama*</label>
                            <select name="agama" class="form-control  @error('agama') is-invalid @enderror">
                                <option value="{{null}}">Select..</option>
                                @foreach($agama as $data)
                                    <option value="{{$data->id}}">{{$data->agama}}</option>
                                @endforeach
                            </select>
                            @error('agama')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat*</label>
                            <textarea name="alamat" id="alamat" class="form-control  @error('alamat') is-invalid @enderror"
                                      placeholder="Masukan alamat"></textarea>
                            @error('alamat')
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
