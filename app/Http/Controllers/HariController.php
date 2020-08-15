<?php

namespace App\Http\Controllers;

use App\Hari;
use Illuminate\Http\Request;

class HariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $Hari = Hari::paginate(10);
        return view('settingmaster.hari', compact('Hari'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['hari' => 'required|string|unique:hari']);
        Hari::Create($request->all());
        return redirect()->route('hari.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Hari $hari
     * @return \Illuminate\Http\Response
     */
    public function show(Hari $hari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Hari $hari
     * @return \Illuminate\Http\Response
     */
    public function edit(Hari $hari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Hari $hari
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Hari $hari)
    {
        Hari::where('id', $hari->id)->update(['hari' => $request->hari]);
        return redirect()->route('hari.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Hari $hari
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Hari $hari)
    {
        $hari::where('id', $hari->id);
        $hari->delete();
        return redirect()->route('hari.index')->with('status', 'Berhasil menghapus data');
    }
}
