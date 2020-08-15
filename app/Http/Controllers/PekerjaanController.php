<?php

namespace App\Http\Controllers;

use App\Pekerjaan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
            $Pekerjaan = Pekerjaan::paginate(10);
            return view('settingmaster.pekerjaan', compact('Pekerjaan'));
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
        try {
            $this->validate($request, ['pekerjaan' => 'required|string|unique:pekerjaan']);
        } catch (Exception $exception) {
            return redirect()->route('pekerjaan.index')->with('error', 'Pekerjaan yang anda inputkan sudah ada');
        }

        Pekerjaan::Create($request->all());
        return redirect()->route('pekerjaan.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Pekerjaan $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Pekerjaan $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Pekerjaan $pekerjaan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        Pekerjaan::where('id', $pekerjaan->id)->update(['pekerjaan' => $request->pekerjaan]);
        return redirect()->route('pekerjaan.index', ['pekerjaan' => $pekerjaan])->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Pekerjaan $pekerjaan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        try {
            $pekerjaan::where('id', $pekerjaan->id);
            $pekerjaan->delete();
        } catch (Exception $exception) {

            return redirect()->route('pekerjaan.index')->with('error', 'Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('pekerjaan.index')->with('status', 'Berhasil menghapus data');
    }
}
