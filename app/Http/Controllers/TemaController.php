<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $tema = Tema::paginate(10);
        return view('pembelajaran.tema.index',compact('tema'));
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
        $this->validate($request, ['tema' => 'required|string|unique:tema']);
        Tema::Create($request->all());
        return redirect()->route('tema.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tema $tema)
    {
        Tema::where('id', $tema->id)->update(['tema' => $request->tema]);
        return redirect()->route('tema.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tema  $tema
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tema $tema)
    {
        $tema::where('id', $tema->id);
        $tema->delete();
        return redirect()->route('tema.index')->with('status', 'Berhasil menghapus data');
    }
}
