<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $Kelas = Kelas::paginate(10);
        return view('settingmaster.kelas', compact('Kelas'));
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
        $this->validate($request, ['kelas' => 'required|string', 'keterangan' => 'required|string']);
        Kelas::Create($request->all());
        return redirect()->route('kelas.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Kelas $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Kelas $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Kelas $kelas
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Kelas $kela)
    {
        Kelas::where('id', $kela->id)->update(['kelas' => $request->kelas, 'keterangan' => $request->keterangan]);
        return redirect()->route('kelas.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Kelas $kela
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kelas $kela)
    {
        $kela::where('id', $kela->id);
        $kela->delete();
        return redirect()->route('kelas.index')->with('status', 'Berhasil menghapus data');
    }
}
