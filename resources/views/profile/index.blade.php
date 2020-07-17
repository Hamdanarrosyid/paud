<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--    <link href="img/logo/logo.png" rel="icon">--}}
    <title>Paud Tunas Harapan - Dashboard</title>
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/ruang-admin.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/simple-calendar.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
</head>

<body id="page-top">
<div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <a href="{{route('welcome')}}" class="nav-link text-white">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
                <ul class="navbar-nav ml-auto">
                    <div class="d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-astronaut"></i>
                            <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal"
                               href="#">
                                <i class="fas fa-sign-out-alt fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- Topbar -->

            <!-- Container Fluid-->
            <div class="container-fluid" id="container-wrapper">
                <div class="card col-lg-6 m-auto">
                    <form action="{{route('profile.update',['guru'=>auth()->user()->guru->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <!-- Form Sizing -->
                            <div class="col-lg-12">
                                <div class="card-header mt-2">
                                    <h6 class=" font-weight-bold text-primary mb-0" style="font-size: 20px">Profile Guru</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama lengkap guru*</label>
                                        <input name="nama" type="text" id="nama"
                                               class="form-control @error('nama') is-invalid @enderror"
                                               placeholder="Masukan nama lengkap">
                                        @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input disabled name="email" type="text" value="{{auth()->user()->email}}" id="email"
                                               class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No telfon*</label>
                                        <input name="nohp" id="nohp"
                                               class="form-control input-element @error('nohp') is-invalid @enderror"
                                               placeholder="Masukan nohp" type="text">
                                        @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-5">
                                            <label for="tempat">Tempat*</label>
                                            <select name="tempat"
                                                    class="form-control @error('tempat') is-invalid @enderror">
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
                                            <label for="tanggal">Tanggal lahir*</label>
                                            <input required name="tanggal" type="date"
                                                   class="form-control @error('tanggal') is-invalid @enderror">
                                            @error('tanggal')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender*</label>
                                        <select name="gender"
                                                class="form-control @error('gender') is-invalid @enderror">
                                            @foreach($kelamin as $data)
                                                <option value="{{$data->id}}">{{$data->jeniskelamin}}</option>
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
                                        <textarea name="alamat" id="alamat"
                                               class="form-control  @error('alamat') is-invalid @enderror"
                                                  placeholder="Masukan alamat"></textarea>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" name="reset" value="reset" class="btn btn-danger">Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        <footer class="sticky-footer bg-white mt-5">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
            <span>copyright &copy; 2019 - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
                </div>
            </div>
        </footer>
        <!-- Footer -->
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Yakin Untuk Keluar?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" data-toggle="modal" data-target="#logoutModal" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('js/ruang-admin.min.js')}}"></script>
{{--<script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>--}}
{{--<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>--}}
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('js/jquery.simple-calendar.js')}}"></script>


<script>
    $(document).ready(function () {
        $('#dataTable').DataTable(); // ID From dataTable
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
    // $('input[name="nohp"]').mask('0000 0000 000000');
    var cleave = new Cleave('.input-element', {
        phone: true,
        phoneRegionCode: "ID"
    });
</script>

</body>

</html>
