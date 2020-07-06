<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Kelamin;
use App\Pekerjaan;
use App\Walimurid;
use Illuminate\Http\Request;
use Exception;

class WalimuridController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Walimurid::class,'walimurid');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $walimurid = Walimurid::all();
        return view('walimurid.index',['walimurid'=>$walimurid]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Walimurid  $walimurid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Walimurid $walimurid)
    {
        $kelamin = Kelamin::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $data = $walimurid->gender->jeniskelamin;
        $upper = strtoupper($data);

        return view('walimurid.show',[
            'kelamin'=>$kelamin,
            'agama'=>$agama,
            'pekerjaan'=>$pekerjaan,
            'data'=>$upper,
            'walimurid'=>$walimurid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Walimurid  $walimurid
     * @return \Illuminate\Http\Response
     */
    public function edit(Walimurid $walimurid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Walimurid  $walimurid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Walimurid $walimurid)
    {
        try {
            $this->validate($request,[
                'nama'=> 'required|string|max:255',
                'nohp'=>'required|string',
                'gender'=>'required|integer',
                'agama'=>'required|integer',
                'pekerjaan'=>'required|integer',
                'alamat'=>'required|string|max:1000',
            ]);
        }
        catch (Exception $exception){
            return redirect()->route('walimurid.index')->with('error','Gagal mengubah data');
        }
        Walimurid::where('id',$walimurid->id)
            ->update([
                'nama'=>$request->nama,
                'nohp'=>$request->nohp,
                'gender_id'=>$request->gender,
                'agama_id'=>$request->agama,
                'pekerjaan_id'=>$request->pekerjaan,
                'alamat'=>$request->alamat
            ]);
        return redirect()->route('walimurid.index')->with('status','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Walimurid  $walimurid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Walimurid $walimurid)
    {
        try {
            $walimurid::where('id', $walimurid->id);
            $walimurid->delete();
        }
        catch (Exception $exception){

            return redirect()->route('walimurid.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('walimurid.index')->with('status', 'Berhasil menghapus data');
    }
}
