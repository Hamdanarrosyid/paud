@extends('layouts.dashboard2')

@section('pembelajaran-active')
    active
@endsection
@section('pembelajaran-show')
    show
@endsection
@section('content')
    {{--    <div class="d-flex justify-content-between">--}}
    {{--        --}}{{--        <input type="text" class="rounded-pill px-2 w-25 border-0" placeholder="search">--}}
    {{--        <div class="input-group row">--}}
    {{--            <div class="col-lg-6 col-sm-2">--}}
    {{--                <select name="filter" class="custom-select" id="filter">--}}
    {{--                    <option value="">{{__('Filter...')}}</option>--}}
    {{--                    @foreach($semester as $data)--}}
    {{--                        <option value="{{$data->id}}">{{$data->tahunAjaran->tahun}} {{$data->semester}}</option>--}}
    {{--                    @endforeach--}}
    {{--                </select>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="wrapper">--}}
    {{--            <a href="{{route('program-semester.create')}}" class="button-pill">--}}
    {{--                <div class="icon"><i class="fas fa-plus"></i></div>--}}
    {{--                <span>Tambah data</span>--}}
    {{--            </a>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div>
        <div class="card-header bg-transparent text-center">
            <h3 class="card-title">{{__('Program Semester')}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('program-semester.store')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="inputSemester" class="col-sm-2 col-form-label">Semester</label>
                    <select required name="semester_id" id="inputSemester"
                            class="form-control col-sm-9 @error('semester_id') is-invalid @enderror">
                        <option>{{__('Select...')}}</option>
                        @foreach($semester as $data)
                            <option
                                @if(old('semester_id') == $data->id)
                                selected
                                @endif
                                value="{{$data->id}}">{{$data->tahunAjaran->tahun}} {{$data->semester}}
                            </option>
                        @endforeach
                    </select>
                    @error('semester_id')
                    <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="inputTema" class="col-sm-2 col-form-label">Tema</label>
                    <select required name="tema_id" id="inputTema"
                            class="form-control col-sm-9 @error('tema_id') is-invalid @enderror">
                        <option>{{__('Select...')}}</option>
                        @foreach($tema as $data)
                            <option
                                @if(old('tema_id') == $data->id)
                                selected
                                @endif
                                value="{{$data->id}}">{{$data->tema}}
                            </option>
                        @endforeach
                    </select>
                    @error('tema_id')
                    <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="sub_tema_select">Sub Tema</label>
                    <select required name="sub_tema_id[]" multiple="multiple" id="sub_tema_select"
                            class="form-control col-sm-9 select2-multiple @error('sub_tema_id') is-invalid @enderror">
                        @foreach($subtema as $data)
                            <option
                                @if(old('sub_tema_id') != null)
                                @foreach(old('sub_tema_id') as $old)
                                @if($old == $data->id)
                                selected
                                @endif
                                @endforeach
                                @endif
                                value="{{$data->id}}">{{$data->sub_tema}}
                            </option>
                        @endforeach
                    </select>
                    @error('sub_tema_id')
                    <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="kd_select">KD</label>
                    <select required name="kompetensi_dasar_id[]" multiple="multiple" id="kd_select"
                            class="form-control col-sm-9 select2-multiple @error('kompetensi_dasar_id') is-invalid @enderror">
                        @foreach($kd as $data)
                            <option
                                @if(old('kompetensi_dasar_id') != null)
                                @foreach(old('kompetensi_dasar_id') as $old)
                                @if($old == $data->id)
                                selected
                                @endif
                                @endforeach
                                @endif
                                value="{{$data->id}}">{{$data->kompetensi_dasar}}
                            </option>
                        @endforeach
                    </select>
                    @error('kompetensi_dasar_id')
                    <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="inputWaktu" class="col-sm-2 col-form-label">Waktu</label>
                    <select required name="bulan_id" id="inputWaktu"
                            class="select-single form-control col-sm-9 @error('bulan_id') is-invalid @enderror">
                        <option>{{__('Select...')}}</option>
                        @foreach($bulan as $data)
                            <option
                                @if(old('bulan_id') == $data->id)
                                selected
                                @endif
                                value="{{$data->id}}">{{$data->bulan}}
                            </option>
                        @endforeach
                    </select>
                    @error('bulan_id')
                    <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="card-footer text-center bg-transparent">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

@endsection
