<?php

namespace App\Http\Controllers;

use App\Pendidikan;
use Exception;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $Pendidikan = Pendidikan::paginate(10);
        return view('settingmaster.pendidikan',compact('Pendidikan'));
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
            $this->validate($request,['pendidikan'=>'required|string|unique:pendidikan']);
        }
        catch (Exception $exception){
            return redirect()->route('pendidikan.index')->with('error','Pendidikan yang anda inputkan sudah ada');
        }

        Pendidikan::Create($request->all());
        return redirect()->route('pendidikan.index')->with('status','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendidikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pendidikan $pendidikan)
    {
        Pendidikan::where('id',$pendidikan->id)->update(['pendidikan'=>$request->pendidikan]);
        return redirect()->route('pendidikan.index', ['pendidikan' => $pendidikan])->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendidikan  $pendidikan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pendidikan $pendidikan)
    {
        try {
            $pendidikan::where('id', $pendidikan->id);
            $pendidikan->delete();
        }
        catch (Exception $exception){

            return redirect()->route('pendidikan.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('pendidikan.index')->with('status', 'Berhasil menghapus data');
    }
}
