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
            <h3 class="card-title">{{__('Rencana Pembelajaran Per Minggu')}}</h3>
        </div>
        <div class="card-body">
            <form action="{{route('rppm.store')}}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="form-group col-lg-5">
                        <label for="inputTema" class="col-form-label">Tema</label>
                        <select required name="tema_id" id="inputTema"
                                class="form-control @error('tema_id') is-invalid @enderror">
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
                    <div class="form-group col-lg-5">
                        <label class="col-form-label" for="sub_tema">Sub Tema</label>
                        <select required name="sub_tema_id" id="sub_tema"
                                class="form-control @error('sub_tema_id') is-invalid @enderror">
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
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-lg-3">
                        <label class="col-form-label" for="kd_select_input">KD</label>
                        <select required name="kompetensi_dasar_id" id="kd_select_input"
                                class="form-control @error('kompetensi_dasar_id') is-invalid @enderror">
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
                    <div class="form-group col-lg-4">
                        <label for="input_muatan_belajar" class="col-form-label">Muatan Belajar</label>
                        <textarea required name="muatan_belajar" id="input_muatan_belajar"
                                  class="form-control @error('muatan_belajar') is-invalid @enderror"></textarea>
                        @error('muatan_belajar')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-lg-5">
                        <label for="input_rencana_kegiatan" class="col-form-label">Renacana Kegiatan</label>
                        <textarea required name="rencana_kegiatan" id="input_rencana_kegiatan"
                                  class="form-control @error('rencana_kegiatan') is-invalid @enderror"></textarea>
                        @error('rencana_kegiatan')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer text-center bg-transparent">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

@endsection
