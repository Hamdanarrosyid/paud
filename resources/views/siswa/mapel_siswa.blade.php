@extends('layouts.dashboard2')

@section('siswa-active')
    active
@endsection
@section('content')
    <div class="row mb-5">
        <!-- Column -->
{{--        <div class="col-lg-4 col-xlg-3 col-md-5">--}}
{{--            <div class="card">--}}
{{--                <div class="mt-5 pb-5" style="text-align: center;">--}}
{{--                    @if(in_array($data,['LAKI-LAKI','COWOK','LAKI LAKI','PRIA']))--}}
{{--                        <img src="{{asset('img/child.png')}}" class="img-circle" width="150"/>--}}
{{--                    @else--}}
{{--                        <img src="{{asset('img/wedok.png')}}" class="img-circle" width="150"/>--}}
{{--                    @endif--}}
{{--                    <h4 class="card-title mt-2">{{$siswa->nama}}</h4>--}}
{{--                    --}}{{--                        <h6 class="card-subtitle">Siswa paud Tunas Harapan</h6><br>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-lg-8 m-auto col-xlg-9 col-md-7">
            <div class="card">
                <div class="p-3 mx-2 mt-2">
                    <form class="form-horizontal form-material" action="{{route('siswa.mapel.update',['siswa'=>$siswa->id])}}"
                          method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="col-md-12">Nama Lengkap</label>
                            <div class="col-md-12">
                                <input disabled type="text" name="" value="{{$siswa->nama}}"
                                       class="form-control form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12" for="agama">Mapel*</label>
                            <div class="col-sm-12">
                                <select name="mapel[]" multiple="multiple" id="myMultiple" class="select2-multiple form-control @error('mapel') is-invalid @enderror">
                                    @foreach($mapels as $data)
                                        <option
                                            @foreach($siswa->mapel as $mapel)
                                            @if($data->id == $mapel->id)
                                            selected
                                            @endif
                                            @endforeach
                                            value="{{$data->id}}">{{$data->nama}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('mapel')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @can('siswa.update')
                                    <button type="submit" class="btn btn-success">Update</button>
                                @endcan
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

@endsection
