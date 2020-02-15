@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-success justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pendaftaran Siswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item" aria-current="page">Pendaftaran Siswa</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card">
        <form action="{{route('siswa.store')}}" method="post">
            @csrf
            <div class=" row">
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card-header mt-2">
                        <h6 class=" font-weight-bold text-primary">Calon Peserta Didik</h6>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap*</label>
                                <input required value="hamdan" name="nama" id="nama" class="form-control" placeholder="Masukan nama lengkap">
                            </div>
                            <div class="row">
                                <div class="form-group col-5">
                                    <label for="tempat">Tempat*</label>
                                    <select name="tempat" class="form-control">
                                        @foreach($kota as $data)
                                            <option name="tempat" value="{{$data->id}}">{{$data->kota}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-7">
                                    <label for="tanggal">Tanggal Lahir*</label>
                                    <input value="2020-02-11" required name="tanggal" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kelamin">Gender*</label>
                                <select name="gender" class="form-control">
                                    @foreach($kelamin as $data)
                                        <option  value="{{$data->id}}">{{$data->jeniskelamin}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama*</label>
                                <select name="agama" class="form-control">
                                    @foreach($agama as $data)
                                        <option value="{{$data->id}}">{{$data->agama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Form Sizing -->
                <div class="col-lg-6">
                    <div class="card-header mt-2">
                        <h6 class=" font-weight-bold text-primary">Orang Tua/Wali Murid</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="namawali">Nama Lengkap Ayah/Ibu*</label>
                            <input name="namawali" type="text"  id="namawali" class="form-control"
                                   placeholder="Masukan nama lengkap" value="Hamdan">
                        </div>
                        <div class="form-group">
                            <label for="nohp">No Telfon*</label>
                            <input name="nohp" id="nohp" class="form-control" placeholder="Masukan nohp" type="number">
                        </div>
                        <div class="form-group">
                            <label for="kelamin">Gender*</label>
                            <select name="genderwali" class="form-control">
                                @foreach($kelamin as $data)
                                    <option  value="{{$data->id}}">{{$data->jeniskelamin}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama*</label>
                            <select name="agamawali" class="form-control">
                                @foreach($agama as $data)
                                    <option value="{{$data->id}}">{{$data->agama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan*</label>
                            <select name="pekerjaan" class="form-control">
                                @foreach($pekerjaan as $data)
                                    <option value="{{$data->id}}">{{$data->pekerjaan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat*</label>
                            <input type="text" name="alamat" id="alamat" class="form-control"
                                   placeholder="Masukan alamat">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" name="reset" value="reset" class="btn btn-danger">Batal</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
