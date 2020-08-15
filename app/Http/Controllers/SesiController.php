<?php

namespace App\Http\Controllers;

use App\Sesi;
use Exception;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $Sesi = Sesi::paginate(10);
        return view('settingmaster.sesi', compact('Sesi'));
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
            $this->validate($request, ['sesi' => 'required|string|unique:sesi']);
        } catch (Exception $exception) {
            return redirect()->route('sesi.index')->with('error', 'Sesi yang anda inputkan sudah ada');
        }

        Sesi::Create($request->all());
        return redirect()->route('sesi.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $sesi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Sesi $sesi)
    {
        Sesi::where('id', $sesi->id)->update(['sesi' => $request->sesi]);
        return redirect()->route('sesi.index', ['sesi' => $sesi])->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sesi
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Sesi $sesi)
    {
        try {
            $sesi::where('id', $sesi->id);
            $sesi->delete();
        } catch (Exception $exception) {

            return redirect()->route('sesi.index')->with('error', 'Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('sesi.index')->with('status', 'Berhasil menghapus data');
    }
}
