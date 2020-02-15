@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-warning justify-content-between mb-4">
        <h1 class="h3 text-gray-800"><a href="{{route('guru.index')}}" class="text-gray-700 mr-4"><i class="fas fa-angle-left"></i></a>Pendaftaran Guru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Pendaftaran Guru</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card col-lg-6 m-auto mb-5">
        <form action="{{route('guru.store')}}" method="post">
            @csrf
            <div class=" row">
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
                            <input type="text" name="alamat" id="alamat" class="form-control  @error('alamat') is-invalid @enderror"
                                   placeholder="Masukan alamat">
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
