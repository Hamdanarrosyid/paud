<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Mapel;
use App\Tahunajaran;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MapelController extends Controller
{
    protected $eror = false;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $mapel = Mapel::paginate(10);
        $tahunajaran = Tahunajaran::all();
        $kelas = Kelas::all();
//        $e = $this->eror;
        return view('mapel.index', compact('mapel','tahunajaran','kelas'));
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
//        dd($request);
//        $this->authorize('sarpras.create');
        $this->validate($request, [
            'kode' => 'required|string|max:10|unique:mapel',
            'nama' => 'required|string|max:65',
            'tahunajaran_id' => 'required|integer',
            'kelas_id' => 'required|integer',
            'keterangan' => 'required|string',
        ]);
        Mapel::Create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'tahunajaran_id' => $request->tahunajaran_id,
            'kelas_id' => $request->kelas_id,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('mapel.index')->with('status', 'Berhasil menambahkan data');
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
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Mapel $mapel)
    {
//        $this->authorize('sarpras.update');
//        try {
            $this->validate($request,[
//                'kode' => 'required|string|max:10|unique:mapel',
                'nama' => 'required|integer|max:65',
                'tahunajaran_id' => 'required|integer',
                'kelas_id' => 'required|integer',
                'keterangan' => 'required|string',
            ]);
//        } catch (ValidationException $e) {
//            $this->eror = true;
//            $e = $this->eror;
////            dd($e);
//            return redirect()->route('mapel.index',compact('e'));
//        }
        Mapel::where('id',$mapel->id)
            ->update([
//                'kode' => $request->kode,
                'nama' => $request->nama,
                'tahunajaran_id' => $request->tahunajaran_id,
                'kelas_id' => $request->kelas_id,
                'keterangan' => $request->keterangan
            ]);
        return redirect()->route('mapel.index')->with('status','Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mapel $mapel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Mapel $mapel)
    {
//        $this->authorize('sarpras.delete');
//        try {
            $mapel::where('id', $mapel->id);
            $mapel->delete();
//        }
//        catch (Exception $exception){

//            return redirect()->route('prasarana.index')->with('error','Tidak dapat menghapus data karena data digunakan pada tabel lain');
//        }
        return redirect()->route('mapel.index')->with('status', 'Berhasil menghapus data');
    }
}
