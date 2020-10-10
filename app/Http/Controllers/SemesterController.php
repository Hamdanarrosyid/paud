<?php

namespace App\Http\Controllers;

use App\Semester;
use App\Tahunajaran;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $semester = Semester::paginate(10);
        $tahunAjaran = Tahunajaran::all();
        return view('pembelajaran.semester.index',compact('semester','tahunAjaran'));
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
         $this->validate($request, [
            'semester' => ['required','string'],
            'tahun_id' => 'required|integer'
            ]);
        Semester::Create($request->all());
        return redirect()->route('semester.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Semester $semester)
    {
        $this->validate($request, [
            'semester' => ['required','string'],
            'tahun_id' => 'required|integer'
        ]);
        Semester::where('id', $semester->id)->update([
            'semester' => $request->semester,
            'tahun_id' => $request->tahun_id
        ]);
        return redirect()->route('semester.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Semester  $semester
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Semester $semester)
    {
        $semester::where('id', $semester->id);
        $semester->delete();
        return redirect()->route('semester.index')->with('status', 'Berhasil menghapus data');
    }
}
