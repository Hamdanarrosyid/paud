<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Kelamin;
use App\Kota;
use App\Pekerjaan;
use App\Siswa;
use App\Walimurid;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Mockery\Exception;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    protected $siswa;

    public function index(Siswa $siswa)
    {
//        $this->siswa = $siswa;
        $siswa = Siswa::all();
        return view('siswa.index',['siswa'=>$siswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $kota = Kota::all();
        $kelamin = Kelamin::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        return view('siswa.create',['kota'=>$kota,'kelamin'=>$kelamin,'agama'=>$agama,'pekerjaan'=>$pekerjaan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'namawali'=> 'required|string|max:255',
                'nohp'=>'required|string',
                'genderwali'=>'required|integer',
                'agamawali'=>'required|integer',
                'alamat'=>'required|string|max:1000',
            ]);
        }
        catch (Exception $exception){
            return redirect()->route('siswa.index')->with('error','Gagal menambahkan data');
        }
        $walimurid = Walimurid::create([
            'nama'=>$request->namawali,
            'nohp'=>$request->nohp,
            'gender_id'=>$request->genderwali,
            'agama_id'=>$request->agamawali,
            'pekerjaan_id'=>$request->pekerjaan,
            'alamat'=>$request->alamat
        ]);

        try {
            $this->validate($request,[
                'nama'=> 'required|string|max:255',
                'tempat'=>'required|integer',
                'tanggal'=>'required|date',
                'gender'=>'required|integer',
                'agama'=>'required|integer',
            ]);
        }
        catch (Exception $exception){
            return redirect()->route('siswa.index')->with('error','Gagal menambahkan data');
        }
        Siswa::create([
            'nama'=>$request->nama,
            'walimurid_id'=>$walimurid->id,
            'tempat_id'=>$request->tempat,
            'tanggal'=>$request->tanggal,
            'gender_id'=>$request->gender,
            'agama_id'=>$request->agama
        ]);
        return redirect()->route('siswa.index')->with('status','Berhasil menambahkan data');
//        return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Siswa $siswa)
    {
        $kota = Kota::all();
        $kelamin = Kelamin::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $data = $siswa->gender->jeniskelamin;
        $upper = strtoupper($data);
        $walimurid = Walimurid::all();

        return view('siswa.show',[
            'siswa'=>$siswa,
            'kota'=>$kota,
            'kelamin'=>$kelamin,
            'agama'=>$agama,
            'pekerjaan'=>$pekerjaan,
            'data'=>$upper,
            'walimurid'=>$walimurid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Siswa $siswa)
    {
        try {
            $this->validate($request,[
                'nama'=> 'required|string|max:255',
                'walimurid'=> 'required|string|max:255',
                'tempat'=>'required|integer',
                'tanggal'=>'required|date',
                'gender'=>'required|integer',
                'agama'=>'required|integer',
            ]);
        }
        catch (Exception $exception){
            return redirect()->route('siswa.index')->with('error','Gagal mengubah data');
        }
        Siswa::where('id',$siswa->id)
            ->update([
                'nama'=>$request->nama,
                'tempat_id'=>$request->tempat,
                'tanggal'=>$request->tanggal,
                'gender_id'=>$request->gender,
                'agama_id'=>$request->agama
            ]);
        Walimurid::where('id',$siswa->walimurid_id)
            ->update([
                'nama'=>$request->walimurid,
            ]);
        return redirect()->route('siswa.index')->with('status','Berhasil mengubah data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Siswa $siswa)
    {
        try {
            $siswa::where('id', $siswa->id);
            $siswa->delete();
        }
        catch (Exception $exception){

            return redirect()->route('siswa.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('siswa.index')->with('status', 'Berhasil menghapus data');
    }

    public function exportpdf()
    {
        $siswa = Siswa::all();
        $pdf = \PDF::loadView('html',['siswa'=>$siswa]);
        return $pdf->download('tes.pdf');
    }
    public function tes()
    {
        $siswa = Siswa::all();
        return view('html',['siswa'=>$siswa]);
    }

}
