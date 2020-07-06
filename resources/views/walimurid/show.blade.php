@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-success justify-content-between mb-4">
         <h1 class="h3 text-gray-800"><a href="{{route('walimurid.index')}}" class="text-gray-700 mr-4"><i class="fas fa-angle-left"></i></a>Wali Murid</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-light"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-light" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-light" aria-current="page">Detail Data Wali Murid</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row mb-5">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="mt-5 pb-5" style="text-align: center;">
                    @if(in_array($data,['LAKI-LAKI','COWOK','LAKI LAKI']))
                        <img src="{{asset('img/child.png')}}" class="img-circle" width="150"/>
                    @else
                        <img src="{{asset('img/wedok.png')}}" class="img-circle" width="150"/>
                    @endif
                    <h4 class="card-title mt-2">{{$walimurid->nama}}</h4>
                    {{--                        <h6 class="card-subtitle">Siswa paud Tunas Harapan</h6><br>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="p-3 mx-2 mt-2">
                    <form class="form-horizontal form-material" action="{{route('walimurid.update',['walimurid'=>$walimurid->id])}}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="col-md-12">Nama Lengkap*</label>
                            <div class="col-md-12">
                                <input required type="text" name="nama" value="{{$walimurid->nama}}" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Hp*</label>
                            <div class="col-md-12 input-group flex-nowrap">
{{--                                <div class="input-group-prepend">--}}
{{--                                    <span class="input-group-text bg-gray-400 text-dark border-0" id="addon-wrapping">+62</span>--}}
{{--                                </div>--}}
                                <input type="text"  required name="nohp" value="{{$walimurid->nohp}}" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="kelamin">Gender*</label>
                            <div class="col-sm-12">
                                <select name="gender" class="form-control">
                                    @foreach($kelamin as $data)
                                            <option @if($data->jeniskelamin == $walimurid->gender->jeniskelamin) selected @endif value="{{$data->id}}">{{$data->jeniskelamin}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="agama">Agama*</label>
                            <div class="col-sm-12">
                                <select name="agama" class="form-control">
                                    @foreach($agama as $data)
                                        @if($data->agama== $walimurid->agama->agama)
                                            <option selected value="{{$walimurid->agama->id}}">{{$walimurid->agama->agama}}</option>
                                        @else
                                        <option value="{{$data->id}}">{{$data->agama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="pekerjaan">Pekerjaan*</label>
                            <div class="col-sm-12">
                                <select name="pekerjaan" class="form-control">
                                    @foreach($pekerjaan as $data)
                                        @if($data->pekerjaan == $walimurid->pekerjaan->pekerjaan)
                                            <option selected value="{{$walimurid->pekerjaan->id}}">{{$walimurid->pekerjaan->pekerjaan}}</option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->pekerjaan}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat*</label>
                            <div class="col-md-12">
                                <input required type="text" name="alamat" value="{{$walimurid->alamat}}" class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                                <a href="{{route('walimurid.destroy',['walimurid'=>$walimurid->id])}}"
                                   onclick="event.preventDefault();document.getElementById('deleteform').submit();"
                                   class="btn btn-danger">Delete Profile</a>
                            </div>
                        </div>
                    </form>
                    <form id="deleteform" method="POST" action="{{route('walimurid.destroy',['walimurid'=>$walimurid->id])}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
