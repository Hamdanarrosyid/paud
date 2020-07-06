<?php

namespace App\Http\Controllers;

use App\Prasarana;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('sarpras.viewAny');
        $prasarana = Prasarana::all();
        return view('prasarana.index',['prasarana'=>$prasarana]);
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
        $this->authorize('sarpras.create');
        try {
            $this->validate($request,[
                'namaruang'=>'required|string|max:255',
                'jumlah'=>'required|integer|max:65',
                'panjang'=>'required|max:65',
                'lebar'=>'required|max:65'
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('prasarana.index')->with('error','Gagal menambahkan data');
        }
        Prasarana::Create([
            'namaruang'=>$request->namaruang,
            'jumlah'=>$request->jumlah,
            'panjang'=>$request->panjang,
            'lebar'=>$request->lebar
        ]);
        return redirect()->route('prasarana.index')->with('status','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prasarana  $prasarana
     * @return \Illuminate\Http\Response
     */
    public function show(Prasarana $prasarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prasarana  $prasarana
     * @return \Illuminate\Http\Response
     */
    public function edit(Prasarana $prasarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prasarana  $prasarana
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Prasarana $prasarana)
    {
        $this->authorize('sarpras.update');
        try {
            $this->validate($request,[
                'namaruang'=>'required|string|max:255',
                'jumlah'=>'required|integer|max:65',
                'panjang'=>'required|max:65',
                'lebar'=>'required|max:65'
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('prasarana.index')->with('error','Gagal mengubah data');
        }
        Prasarana::where('id',$prasarana->id)
        ->update([
            'namaruang'=>$request->namaruang,
            'jumlah'=>$request->jumlah,
            'panjang'=>$request->panjang,
            'lebar'=>$request->lebar
        ]);
        return redirect()->route('prasarana.index')->with('status','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prasarana  $prasarana
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Prasarana $prasarana)
    {
        $this->authorize('sarpras.delete');
        try {
            $prasarana::where('id', $prasarana->id);
            $prasarana->delete();
        }
        catch (Exception $exception){

            return redirect()->route('prasarana.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('prasarana.index')->with('status', 'Berhasil menghapus data');
    }
}
