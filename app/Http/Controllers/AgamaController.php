<?php

namespace App\Http\Controllers;

use App\Agama;
use Exception;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $Agama = Agama::paginate(10);
        return view('settingmaster.agama',compact('Agama'));
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
            $this->validate($request,['agama'=>'required|string|unique:agama']);
        }
        catch (Exception $exception){
            return redirect()->route('agama.index')->with('error','Agama yang anda inputkan sudah ada');
        }

        Agama::Create($request->all());
        return redirect()->route('agama.index')->with('status','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function show(Agama $agama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\Response
     */
    public function edit(Agama $agama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Agama $agama)
    {
        Agama::where('id',$agama->id)->update(['agama'=>$request->agama]);
        return redirect()->route('agama.index', ['agama' => $agama])->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agama  $agama
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Agama $agama)
    {
        try {
            $agama::where('id', $agama->id);
            $agama->delete();
        }
        catch (Exception $exception){

            return redirect()->route('agama.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('agama.index')->with('status', 'Berhasil menghapus data');
    }
}
