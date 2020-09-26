<?php

namespace App\Http\Controllers;

use App\Sarana;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SaranaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('sarpras.viewAny');
        $sarana = Sarana::all();
        return view('sarana.index',['sarana'=>$sarana]);
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
        $kondisibaik=$request->kondisibaik;
        $kondisirusak=$request->kondisirusak;
        try {
            if ($kondisibaik == null){
                $kondisibaik=0;
            }
            if ($kondisirusak == null) {
                $kondisirusak = 0;
            }
            $this->validate($request,[
                'perlengkapan'=>'required|string|max:255',
                'kondisibaik'=>'max:65',
                'kondisirusak'=>'max:65'
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('sarana.index')->with('error','Gagal menambahkan data');
        }
        $jumlah = $kondisibaik + $kondisirusak;
        Sarana::Create([
            'perlengkapan'=>$request->perlengkapan,
            'kondisibaik'=>$kondisibaik,
            'kondisirusak'=>$kondisirusak,
            'jumlah'=>$jumlah
        ]);
        return redirect()->route('sarana.index')->with('status','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function show(Sarana $sarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function edit(Sarana $sarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Sarana $sarana)
    {
        $this->authorize('sarpras.update');
            $kondisibaik=$request->kondisibaik;
            $kondisirusak=$request->kondisirusak;
            try {
                if ($kondisibaik == null){
                    $kondisibaik=0;
                }
                if ($kondisirusak == null) {
                    $kondisirusak = 0;
                }
                $this->validate($request,[
                    'perlengkapan'=>'required|string|max:255',
                    'kondisibaik'=>'max:65',
                    'kondisirusak'=>'max:65'
                ]);
        } catch (ValidationException $e) {
            return redirect()->route('sarana.index')->with('error','Gagal mengubah data');
        }
        $jumlah = $kondisibaik + $kondisirusak;
        Sarana::where('id',$sarana->id)
        ->update([
            'perlengkapan'=>$request->perlengkapan,
            'kondisibaik'=>$kondisibaik,
            'kondisirusak'=>$kondisirusak,
            'jumlah'=>$jumlah
        ]);
        return redirect()->route('sarana.index')->with('status','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sarana  $sarana
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Sarana $sarana)
    {
        $this->authorize('sarpras.delete');
        try {
            $sarana::where('id', $sarana->id);
            $sarana->delete();
        }
        catch (Exception $exception){

            return redirect()->route('sarana.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
        }
        return redirect()->route('sarana.index')->with('status', 'Berhasil menghapus data');
    }
}
