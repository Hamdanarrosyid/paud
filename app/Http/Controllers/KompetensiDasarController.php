<?php

namespace App\Http\Controllers;

use App\KompetensiDasar;
use Illuminate\Http\Request;

class KompetensiDasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $kd = KompetensiDasar::paginate(10);
        return view('pembelajaran.kd.index', compact('kd'));
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
        $this->validate($request, ['kode' => 'required|string|unique:kompetensi_dasar', 'kompetensi_dasar' => 'required|string']);
        KompetensiDasar::Create($request->all());
        return redirect()->route('kd.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\KompetensiDasar $kompetensiDasar
     * @return \Illuminate\Http\Response
     */
    public function show(KompetensiDasar $kompetensiDasar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\KompetensiDasar $kompetensiDasar
     * @return \Illuminate\Http\Response
     */
    public function edit(KompetensiDasar $kompetensiDasar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\KompetensiDasar $kd
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KompetensiDasar $kd)
    {
        $this->validate($request, ['kode' => 'required|string', 'kompetensi_dasar' => 'required|string']);
        KompetensiDasar::where('id', $kd->id)->update(['kode' => $request->kode, 'kompetensi_dasar' => $request->kompetensi_dasar]);
        return redirect()->route('kd.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\KompetensiDasar $kd
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(KompetensiDasar $kd)
    {
        KompetensiDasar::where('id', $kd->id);
        $kd->delete();
        return redirect()->route('kd.index')->with('status', 'Berhasil menghapus data');
    }
}
