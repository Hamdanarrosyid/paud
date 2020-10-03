<?php

namespace App\Http\Controllers;

use App\Kelamin;
use Exception;
use Illuminate\Http\Request;

class KelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $Kelamin = Kelamin::paginate(5);
       return view('settingmaster.kelamin',compact('Kelamin'));
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
            $this->validate($request,['jeniskelamin'=>'required|string|unique:jenis_kelamin']);
        }
        catch (Exception $exception){
            return redirect()->route('kelamin.index')->with('error','Jenis kelamin sudah ada');
        }

        Kelamin::Create($request->all());
        return redirect()->route('kelamin.index')->with('status','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelamin  $kelamin
     * @return \Illuminate\Http\Response
     */
    public function show(Kelamin $kelamin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelamin  $kelamin
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelamin $kelamin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelamin  $kelamin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Kelamin $kelamin)
    {
        Kelamin::where('id',$kelamin->id)->update(['jeniskelamin'=>$request->jeniskelamin]);
        return redirect()->route('kelamin.index', ['kelamin' => $kelamin])->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelamin  $kelamin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Kelamin $kelamin)
    {
        try {
            $kelamin::where('id', $kelamin->id);
            $kelamin->delete();
        }
        catch (Exception $exception){

            return redirect()->route('kelamin.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('kelamin.index')->with('status', 'Berhasil menghapus data');
    }
}
