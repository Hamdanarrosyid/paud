<?php

namespace App\Http\Controllers;

use App\Bulan;
use App\KompetensiDasar;
use App\ProgramSemester;
use App\Semester;
use App\SubTema;
use App\Tema;
use Illuminate\Http\Request;

class ProgramSemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    public function index($filter = null)
    {
        if ($filter == null)
            $datas = ProgramSemester::paginate(10);
        else {
            $datas = ProgramSemester::where('semester_id', '=', $filter)->paginate(10);
        }
        $semester = Semester::all();
        return view('pembelajaran.programsemester.index', compact('datas', 'tema', 'subtema', 'bulan', 'kd', 'semester','filter'));
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
        $bulan = Bulan::all();
        $kd = KompetensiDasar::all();
        $semester = Semester::all();
        return view('pembelajaran.programsemester.create', compact('tema', 'subtema', 'bulan', 'kd', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'semester_id' => ['required', 'integer'],
            'tema_id' => ['required', 'integer', 'unique:program_semester'],
            'sub_tema_id' => ['required', 'array'],
            'kompetensi_dasar_id' => ['required', 'array'],
            'bulan_id' => ['required', 'integer','unique:program_semester'],
        ]);
        if ($validate) {
            $create = ProgramSemester::create([
                'semester_id' => $request->semester_id,
                'tema_id' => $request->tema_id,
                'bulan_id' => $request->bulan_id,
            ]);
            if ($create) {
                $tema = Tema::find($request->tema_id);
                $tema->subTema()->attach($request->sub_tema_id);
                $tema->kd()->attach($request->kompetensi_dasar_id);
            }
            return redirect()->route('program-semester.index')->with('status', 'Berhasil menambahkan data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ProgramSemester $programSemester
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(ProgramSemester $programSemester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ProgramSemester $programSemester
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(ProgramSemester $programSemester)
    {
        $tema = Tema::all();
        $subtema = SubTema::all();
        $bulan = Bulan::all();
        $kd = KompetensiDasar::all();
        $semester = Semester::all();
        return view('pembelajaran.programsemester.edit', compact('programSemester', 'tema', 'subtema', 'bulan', 'kd', 'semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ProgramSemester $programSemester
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, ProgramSemester $programSemester)
    {
        $validate = $request->validate([
            'semester_id' => ['required', 'integer'],
            'tema_id' => ['required', 'integer'],
            'sub_tema_id' => ['required', 'array'],
            'kompetensi_dasar_id' => ['required', 'array'],
            'bulan_id' => ['required', 'integer'],
        ]);
        if ($validate) {
            $update = ProgramSemester::where('id', $programSemester->id)->update([
                'semester_id' => $request->semester_id,
                'tema_id' => $request->tema_id,
                'bulan_id' => $request->bulan_id,
            ]);
            if ($update) {
                $tema = Tema::find($request->tema_id);
                $tema->subTema()->sync($request->sub_tema_id);
                $tema->kd()->sync($request->kompetensi_dasar_id);
            }
            return redirect()->route('program-semester.index')->with('status', 'Berhasil mengubah data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ProgramSemester $programSemester
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ProgramSemester $programSemester)
    {
        $delete = $programSemester::where('id', $programSemester->id)->delete();
        if ($delete) {
            $tema = Tema::find($programSemester->tema_id);
            foreach ($programSemester->tema->subTema as $sub_tema) {
                $tema->subTema()->detach($sub_tema->id);
            }
            foreach ($programSemester->tema->kd as $kd) {
                $tema->kd()->detach($kd->id);
            }
        }
        return redirect()->route('program-semester.index')->with('status', 'Berhasil menghapus data');
    }

    public function filter(Request $request)
    {
        $validation = $request->validate(['filter' => 'integer']);
        if ($validation) {
            $filter = $request->filter;
            return $this->index($filter);
        }
    }
}
