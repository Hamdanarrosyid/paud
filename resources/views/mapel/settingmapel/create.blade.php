@extends('layouts.dashboard2')

@section('page-title')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 text-gray-800"><a href="{{route('mapelguru.index')}}" class="text-gray-700 mr-4"><i
                    class="fas fa-angle-left"></i></a>Tambah Guru Mapel</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-weight-normal"><a href="./">Home</a></li>
            <li class="breadcrumb-item font-weight-normal">Dashboard</li>
            <li class="breadcrumb-item font-weight-normal">Mapel</li>
            <li class="breadcrumb-item font-weight-normal">Guru Mapel</li>
            <li class="breadcrumb-item font-weight-normal" aria-current="page">Create Guru Mapel</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="card col-lg-6 m-auto">
        <form action="{{route('mapelguru.store')}}" method="post">
            @csrf
            <div class="row">
                <!-- Form Sizing -->
                <div class="col-lg-12">
                    <div class="card-header mt-2">
                        <h6 class=" font-weight-bold text-primary mb-0" style="font-size: 20px">Mapel Guru</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="guru">Guru*</label>
                            <select class="select-single form-control @error('guru_id') is-invalid @enderror" name="guru_id" id="guru">
                                <option value="{{null}}">Select..</option>
                                @foreach($guru as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('guru_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mapel">Mapel*</label>
                            <select name="mapel[]" multiple="multiple" id="myMultiple" class="select2-multiple form-control @error('mapel') is-invalid @enderror">
                                @foreach($mapels as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('mapel')
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
