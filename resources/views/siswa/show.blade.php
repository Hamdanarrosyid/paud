@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-success justify-content-between mb-4">
        <h1 class="h3 text-gray-800"><a href="{{route('siswa.index')}}" class="text-gray-700 mr-4"><i
                    class="fas fa-angle-left"></i></a>Siswa</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-light"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-light" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-light" aria-current="page">Detail Data Siswa</li>
        </ol>
    </div>
@endsection
@section('content')
{{--    <div class="container">--}}
{{--        <div class="button-wrapper" id="button-profile">--}}
{{--                <button class="button-style" type="button">Profile data</button>--}}
{{--                <div id="btn-arrow" class="button-arrow"></div>--}}
{{--        </div>--}}
{{--                <div class="button-wrapper">--}}
{{--                    <button class="button-style" type="button">Mapel data</button>--}}
{{--                    <div class="button-arrow"></div>--}}
{{--                </div>--}}
{{--    </div>--}}
    <div class="row mb-5" id="form-profile">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="mt-5 pb-5" style="text-align: center;">
                    @if(in_array($data,['LAKI-LAKI','COWOK','LAKI LAKI','PRIA']))
                        <img src="{{asset('img/child.png')}}" class="img-circle" width="150"/>
                    @else
                        <img src="{{asset('img/wedok.png')}}" class="img-circle" width="150"/>
                    @endif
                    <h4 class="card-title mt-2">{{$siswa->nama}}</h4>
                    {{--                        <h6 class="card-subtitle">Siswa paud Tunas Harapan</h6><br>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="p-3 mx-2 mt-2">
                    <form class="form-horizontal form-material" action="{{route('siswa.update',['siswa'=>$siswa->id])}}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="col-md-12">Nama Lengkap*</label>
                            <div class="col-md-12">
                                <input type="text" name="nama" value="{{$siswa->nama}}"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="walisiswa">Nama Wali Murid*</label>
                            <div class="col-md-12">
                                <input type="text" name="walimurid" value="{{$siswa->walimurid->nama}}"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label class="col-sm-12" for="tempat">Tempat*</label>
                                <div class="col-sm-12">
                                    <select name="tempat" class="form-control">
                                        @foreach($kota as $data)
                                            @if($data->kota== $siswa->tempat->kota)
                                                <option selected
                                                        value="{{$siswa->tempat->id}}">{{$siswa->tempat->kota}}</option>
                                            @else
                                                <option value="{{$data->id}}">{{$data->kota}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-7">
                                <label class="col-sm-12" for="tanggal">Tanggal Lahir*</label>
                                <div class="col-sm-12">
                                    <input value="{{$siswa->tanggal}}" required name="tanggal" type="date"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="kelamin">Gender*</label>
                            <div class="col-sm-12">
                                <select name="gender" class="form-control">
                                    @foreach($kelamin as $data)
                                        @if($data->jeniskelamin== $siswa->gender->jeniskelamin)
                                            <option selected
                                                    value="{{$siswa->gender->id}}">{{$siswa->gender->jeniskelamin}}</option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->jeniskelamin}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="agama">Agama*</label>
                            <div class="col-sm-12">
                                <select name="agama" class="form-control">
                                    @foreach($agama as $data)
                                        @if($data->agama== $siswa->agama->agama)
                                            <option selected
                                                    value="{{$siswa->agama->id}}">{{$siswa->agama->agama}}</option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->agama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @can('siswa.update')
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                @endcan
                                @can('siswa.delete')
                                    <a href="{{route('siswa.destroy',['siswa'=>$siswa->id])}}"
                                       onclick="event.preventDefault();document.getElementById('deleteform').submit();"
                                       class="btn btn-danger">Delete Profile</a>
                                @endcan
                            </div>
                        </div>
                    </form>
                    @can('siswa.delete')
                        <form id="deleteform" method="POST" action="{{route('siswa.destroy',['siswa'=>$siswa->id])}}">
                            @csrf
                            @method('DELETE')
                            {{--                        <button type="submit" class="btn btn-danger ">Delete Profile</button>--}}
                        </form>
                    @endcan
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

@endsection
