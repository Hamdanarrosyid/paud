<?php

namespace App\Http\Controllers;

use App\Guru;
use App\Mapel;
use Illuminate\Http\Request;

class MapelguruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $mapels = Mapel::all();
        $guru = Guru::all();

        return view('mapel.settingmapel.index', compact('mapels', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $mapels = Mapel::all();
        $guru = Guru::all();

        return view('mapel.settingmapel.create', compact('mapels', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $messages = [
            'guru_id.unique' => 'The guru has already been taken.',
            'guru_id.required' => 'The guru field is required.',
        ];
        $this->validate($request, [
            'guru_id' => ['required', 'integer', 'max:255', 'unique:guru_mapel'],
            'mapel' => ['required', 'array'],
        ],$messages);
        $guru = Guru::find($request->guru_id);
        $guru->mapels()->attach($request->mapel);
        return redirect()->route('mapelguru.index')->with('status', 'Berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Mapel $mapelguru
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Guru $mapelguru)
    {
        $guru = Guru::all();
        $mapels = Mapel::all();
        return view('mapel.settingmapel.edit', compact('mapelguru', 'guru', 'mapels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mapel $mapelguru
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Guru $mapelguru)
    {
        $this->validate($request, [
            'guru_id' => ['required', 'integer', 'max:255'],
            'mapel' => ['required', 'array'],
        ]);
        $guru = Guru::find($mapelguru->id);
        $guru->mapels()->sync($request->mapel);
        return redirect()->route('mapelguru.index')->with('status', 'Berhasil menambah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mapel $mapelguru
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Guru $mapelguru)
    {
        $guru = Guru::find($mapelguru->id);
        foreach ($mapelguru->mapels as $mapel) {
            $guru->mapels()->detach($mapel->id);

        }
        return redirect()->route('mapelguru.index')->with('status', 'Berhasil menghapus data');
    }
}
