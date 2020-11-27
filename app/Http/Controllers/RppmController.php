<?php

namespace App\Http\Controllers;

use App\KompetensiDasar;
use App\ProgramSemester;
use App\Rppm;
use App\SubTema;
use App\Tema;
use Illuminate\Http\Request;

class RppmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $subtema = SubTema::all();
        $rppm = Rppm::paginate(10);
        return view('pembelajaran.rppm.index', compact('rppm', 'subtema'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $tema = Tema::all();
        $subtema = SubTema::all();
        $kd = KompetensiDasar::all();
        return view('pembelajaran.rppm.create', compact('kd', 'subtema', 'tema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sub_tema_id' => 'required|integer',
            'kompetensi_dasar_id' => 'required|integer',
            'muatan_belajar' => 'required|string',
            'rencana_kegiatan' => 'required|string'
        ]);
        Rppm::Create($request->all());
        return redirect()->route('rppm.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Rppm $rppm
     * @return \Illuminate\Http\Response
     */
    public function show(Rppm $rppm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Rppm $rppm
     * @return \Illuminate\Http\Response
     */
    public function edit(Rppm $rppm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Rppm $rppm
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Rppm $rppm)
    {
        $this->validate($request, [
            'sub_tema_id' => 'required',
            'kd' => 'required|string',
            'muatan_belajar' => 'required|string',
            'rencana_kegiatan' => 'required|string'
        ]);
        Rppm::where('id', $rppm->id)->update([
            'sub_tema_id' => $request->sub_tema_id,
            'kd' => $request->kd,
            'muatan_belajar' => $request->muatan_belajar,
            'rencana_kegiatan' => $request->rencana_kegiatan
        ]);
        return redirect()->route('rppm.index')->with('status', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Rppm $rppm
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Rppm $rppm)
    {
        $rppm::where('id', $rppm->id);
        $rppm->delete();
        return redirect()->route('rppm.index')->with('status', 'Berhasil menghapus data');
    }

    public function dataJson()
    {
        $data = ProgramSemester::all()->mapToGroups(function ($programSemester) {
            $subTema = $programSemester->tema->subTema;
            $datSubTema = $subTema->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nama_sub_tema' => $item->sub_tema
                ];
            });
            $kd = $programSemester->tema->kd;
            $dataKd = $kd->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nama_kd' => $item->kompetensi_dasar
                ];
            });
            return [
                'data' => [
                    'id' => $programSemester->tema_id,
                    'sub_tema' => $datSubTema,
                    'kd' => $dataKd
                ]
            ];
        });
        return response()->json($data);
    }
}
