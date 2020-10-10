<?php

namespace App\Http\Controllers;

use App\SubTema;
use App\Tema;
use Illuminate\Http\Request;

class SubTemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $subtema = SubTema::paginate(10);
        $tema = Tema::all();
        return view('pembelajaran.subtema.index',compact('subtema','tema'));
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
        $this->validate($request, ['sub_tema' => 'required|string|unique:sub_tema']);
        SubTema::Create($request->all());
        return redirect()->route('subtema.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SubTema $subtema
     * @return \Illuminate\Http\Response
     */
    public function show(SubTema $subtema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SubTema $subtema
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTema $subtema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SubTema $subtema
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SubTema $subtema)
    {
        $this->validate($request, ['sub_tema' => 'required|string']);
        SubTema::where('id', $subtema->id)->update(['sub_tema' => $request->sub_tema]);
        return redirect()->route('subtema.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\SubTema $subtema
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SubTema $subtema)
    {
        $subtema::where('id', $subtema->id);
        $subtema->delete();
        return redirect()->route('subtema.index')->with('status', 'Berhasil menghapus data');
    }
}
