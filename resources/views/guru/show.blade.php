@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center  border-bottom-warning justify-content-between mb-4">
        <h1 class="h3 text-gray-800"><a href="{{route('guru.index')}}" class="text-gray-700 mr-4"><i
                    class="fas fa-angle-left"></i></a>Guru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-light"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-light" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item font-weight-light" aria-current="page">Detail Data Guru</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row mb-5">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="mt-5 pb-5" style="text-align: center;">
                    @if(in_array($data,['LAKI-LAKI','COWOK','LAKI LAKI','']))
                        <img src="{{asset('img/child.png')}}" class="img-circle" width="150"/>
                    @else
                        <img src="{{asset('img/wedok.png')}}" class="img-circle" width="150"/>
                    @endif
                    <h4 class="card-title mt-2">{{$guru->nama}}</h4>
                    {{--                        <h6 class="card-subtitle">Siswa paud Tunas Harapan</h6><br>--}}
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="p-3 mx-2 mt-2">
                    <form class="form-horizontal form-material" action="{{route('guru.update',['guru'=>$guru->id])}}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="col-md-12">Nama Lengkap*</label>
                            <div class="col-md-12">
                                <input type="text" name="nama" placeholder="Masukan nama lengkap" value="{{$guru->nama}}"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email*</label>
                            <div class="col-md-12">
                                <input disabled type="text" name="email" value="{{$guru->user->email}}"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">No Hp*</label>
                            <div class="col-md-12 input-group flex-nowrap">
                                <input type="text" required name="nohp" placeholder="Masukan no hp" value="{{$guru->nohp}}"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label class="col-sm-12" for="tempat">Tempat*</label>
                                <div class="col-sm-12">
                                    <select name="tempat" class="select2-single form-control">
                                        @foreach($kota as $data)
                                            @if($data->id == $guru->tempat_id)
                                                <option selected
                                                        value="{{$guru->tempat->id}}">{{$guru->tempat->kota}}</option>
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
                                    <input value="{{$guru->tanggal}}" required name="tanggal" type="date"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="kelamin">Gender*</label>
                            <div class="col-sm-12">
                                <select name="gender" class="form-control">
                                    @foreach($kelamin as $data)
                                        @if($data->id== $guru->gender_id)
                                            <option selected
                                                    value="{{$guru->gender_id}}">{{$guru->gender->jeniskelamin}}</option>
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
                                        @if($data->id == $guru->agama_id)
                                            <option selected
                                                    value="{{$guru->agama->id}}">{{$guru->agama->agama}}</option>
                                        @else
                                            <option value="{{$data->id}}">{{$data->agama}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Alamat*</label>
                            <div class="col-md-12">
                                <textarea required type="text" name="alamat" placeholder="Masukan alamat"
                                          class="form-control form-control-line">{{$guru->alamat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @can('guru.update')
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                @endcan
                                @can('guru.delete')
{{--                                    <div class="col-sm-12">--}}
                                        <button data-toggle="modal" data-target="#delete-user-profile" type="button" class="btn btn-danger">Delete Profile with user</button>
                                    @if($guru->nama == !null || $guru->nohp == !null || $guru->alamat == !null || $guru->tempat_id == !null)
                                        <button data-toggle="modal" data-target="#only-delete-profile" type="button" class="btn btn-warning">Only Delete Profile
                                        </button>
                                        @endif
{{--                                    </div>--}}
                                @endcan
                            </div>
                        </div>
                    </form>
                    @can('siswa.delete')
                        <form id="deleteform" method="POST" action="{{route('guru.destroy',['guru'=>$guru->id])}}">
                            @csrf
                            @method('DELETE')
                            {{--                        <button type="submit" class="btn btn-danger ">Delete Profile</button>--}}
                        </form>
                        <form id="only-profile" method="POST" action="{{route('guru.cdelete',['guru'=>$guru->id])}}">
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

    <div class="modal fade" id="only-delete-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-center">
                    <div>
                        <h1 style="font-size: 100px;color: #efbd67" class="fas fa-exclamation-circle mt-4"></h1>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <h2 class="text-gray-900">Apa anda yakin?</h2>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h4 class="text-gray-700">Data anda tidak bisa dikembalikan!</h4>
                    </div>
                </div>
                <div class="pb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mr-2" onclick="event.preventDefault();document.getElementById('only-profile').submit();">Ya Hapus</button>
                    <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-user-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="d-flex justify-content-center">
                    <div>
                        <h1 style="font-size: 100px;color: #efbd67" class="fas fa-exclamation-circle mt-4"></h1>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <h2 class="text-gray-900">Apa anda yakin?</h2>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h4 class="text-gray-700">Data anda tidak bisa dikembalikan!</h4>
                    </div>
                </div>
                <div class="pb-4 d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mr-2" onclick="event.preventDefault();document.getElementById('deleteform').submit();">Ya Hapus</button>
                    <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
@endsection
