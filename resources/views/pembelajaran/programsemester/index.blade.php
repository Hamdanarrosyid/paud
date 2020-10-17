@extends('layouts.dashboard2')

@section('pembelajaran-active')
    active
@endsection
@section('pembelajaran-show')
    show
@endsection
@section('content')
    <div class="d-flex justify-content-between">
        {{--        <input type="text" class="rounded-pill px-2 w-25 border-0" placeholder="search">--}}
        <form action="{{route('program-semester.filter')}}" method="GET">
            <div class="input-group">
                <select name="filter" class="custom-select" id="filter">
{{--                    <option value="">{{__('Filter...')}}</option>--}}
                    @foreach($semester as $data)
                        <option
                            @if($filter != null && $filter == $data->id)
                                selected
                            @endif
                            value="{{$data->id}}">{{$data->tahunAjaran->tahun}} {{$data->semester}}
                        </option>
                    @endforeach
                </select>
{{--                @error('filter')--}}
{{--                <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                @enderror--}}
                <div class="input-group-append">
                    <button type="submit" class="btn-dark btn input-group-text">Filter</button>
                </div>
                <a href="{{route('program-semester.index')}}" class="btn ml-lg-2 btn-success">All</a>
            </div>
        </form>
        <div class="wrapper">
            <a href="{{route('program-semester.create')}}" class="button-pill">
                <div class="icon"><i class="fas fa-plus"></i></div>
                <span>Tambah data</span>
            </a>
        </div>
    </div>
    <table class="table col-lg-12 mt-2 px-0 bg-white">
        <tr>
            <th>Tahun Ajaran</th>
            <th>Tema</th>
            <th>Sub Tema</th>
            <th>KD</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
        @foreach($datas as $data)
            <tr>
                <td>{{$data->semester->tahunAjaran->tahun}} {{$data->semester->semester}}</td>
                <td>{{$data->tema->tema}}</td>
                <td>
                    <ul class="list-group">
                        @foreach($data->tema->subTema as $sub_tema_data)
                            <li>{{$sub_tema_data->sub_tema}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul class="list-group">
                        @foreach($data->tema->kd as $kd_data)
                            <li>{{$kd_data->kompetensi_dasar}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{$data->bulan->bulan}}</td>
                <td>
                    <a href="{{route('program-semester.edit',['program_semester'=>$data->id])}}" type="button"
                       class="btn badge badge-success ">Edit</a>
                    <form action="{{route('program-semester.destroy',['program_semester'=>$data->id])}}" method="post"
                          class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn badge badge-danger " style="cursor: pointer">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session('status'))
        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{$datas->appends(['filter' => $filter])->links()}}

@endsection
