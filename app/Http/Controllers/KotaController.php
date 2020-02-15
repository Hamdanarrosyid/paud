<?php

namespace App\Http\Controllers;

use App\Kota;
use Exception;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $Kota = Kota::paginate(10);
        return view('settingmaster.kota',compact('Kota'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,['kota'=>'required|string|unique:kota']);
        }
        catch (Exception $exception){
            return redirect()->route('kota.index')->with('error','Kota yang anda inputkan sudah ada');
        }

        Kota::Create($request->all());
        return redirect()->route('kota.index')->with('status','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kota $kota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kota  $kota
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Kota $kotum)
    {
        Kota::where('id',$kotum->id)->update(['kota'=>$request->kota]);
        return redirect()->route('kota.index', ['kota' => $kotum])->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kota  $kotum
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kota $kotum)
    {
        try {
            $kotum::where('id', $kotum->id);
            $kotum->delete();
        }
        catch (Exception $exception){

            return redirect()->route('kota.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('kota.index')->with('status', 'Berhasil menghapus data');
    }
}
