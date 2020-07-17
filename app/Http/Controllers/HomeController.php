<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Guru;
use App\Prasarana;
use App\Sarana;
use App\Siswa;
use App\Walimurid;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $siswa = Siswa::all()->count();
        $guru = Guru::all()->count();
        $walimurid = Walimurid::all()->count();
        $sarana = Sarana::all()->count();
        $prasarana = Prasarana::all()->count();

        return view('home',['siswa'=>$siswa,'guru'=>$guru,'walimurid'=>$walimurid,'sarana'=>$sarana,'prasarana'=>$prasarana]);
    }
    public function welcome()
    {
        return view('welcome');
    }
}
