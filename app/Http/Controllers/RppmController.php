<?php

namespace App\Http\Controllers;

use App\Rppm;
use App\SubTema;
use App\Tema;
use Illuminate\Http\Request;

class RppmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $subtema = SubTema::all();
        $rppm = Rppm::paginate(10);
        return view('pembelajaran.rppm.index',compact('rppm','subtema'));
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
//        dd($request);
        $this->validate($request, [
            'sub_tema_id' => 'required',
            'kd'=> 'required|string',
            'muatan_belajar'=> 'required|string',
            'rencana_kegiatan'=> 'required|string'
        ]);
        Rppm::Create($request->all());
        return redirect()->route('rppm.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rppm  $rppm
     * @return \Illuminate\Http\Response
     */
    public function show(Rppm $rppm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rppm  $rppm
     * @return \Illuminate\Http\Response
     */
    public function edit(Rppm $rppm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rppm  $rppm
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Rppm $rppm)
    {
        $this->validate($request, [
            'sub_tema_id' => 'required',
            'kd'=> 'required|string',
            'muatan_belajar'=> 'required|string',
            'rencana_kegiatan'=> 'required|string'
        ]);
        Rppm::where('id', $rppm->id)->update([
            'sub_tema_id' => $request->sub_tema_id,
            'kd'=> $request->kd,
            'muatan_belajar'=> $request->muatan_belajar,
            'rencana_kegiatan'=> $request->rencana_kegiatan
        ]);
        return redirect()->route('rppm.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rppm  $rppm
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Rppm $rppm)
    {
        $rppm::where('id', $rppm->id);
        $rppm->delete();
        return redirect()->route('rppm.index')->with('status', 'Berhasil menghapus data');
    }
}
