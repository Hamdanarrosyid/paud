<?php

namespace App\Http\Controllers;

use App\Tahunajaran;
use Illuminate\Http\Request;

class TahunajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $Tahunajaran = Tahunajaran::paginate(10);
        return view('settingmaster.tahunajaran', compact('Tahunajaran'));
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
        $this->validate($request, ['tahun' => 'required|string']);
        Tahunajaran::Create($request->all());
        return redirect()->route('tahunajaran.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tahunajaran  $tahunajaran
     * @return \Illuminate\Http\Response
     */
    public function show(Tahunajaran $tahunajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tahunajaran  $tahunajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Tahunajaran $tahunajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tahunajaran  $tahunajaran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Tahunajaran $tahunajaran)
    {
        Tahunajaran::where('id', $tahunajaran->id)->update(['tahun' => $request->tahun]);
        return redirect()->route('tahunajaran.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tahunajaran  $tahunajaran
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tahunajaran $tahunajaran)
    {
        $tahunajaran::where('id', $tahunajaran->id);
        $tahunajaran->delete();
        return redirect()->route('tahunajaran.index')->with('status', 'Berhasil menghapus data');
    }
}
