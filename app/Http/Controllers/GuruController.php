<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Guru;
use App\Kelamin;
use App\Kota;
use App\Permissions;
use App\Role;
use App\User;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class GuruController extends Controller
{
    public function __construct()
    {
//        $this->authorizeResource(Guru::class,'guru');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', ['guru' => $guru]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $kota = Kota::all();
        $kelamin = Kelamin::all();
        $agama = Agama::all();
        return view('guru.create', ['kota' => $kota, 'kelamin' => $kelamin, 'agama' => $agama]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'tempat' => 'required|integer',
            'nohp' => 'required|string',
            'tanggal' => 'required|date',
            'gender' => 'required|integer',
            'agama' => 'required|integer',
            'alamat' => 'required|string|max:1000',
        ]);
        Guru::create([
            'nama' => $request->nama,
            'tempat_id' => $request->tempat,
            'nohp' => $request->nohp,
            'tanggal' => $request->tanggal,
            'gender_id' => $request->gender,
            'agama_id' => $request->agama,
            'alamat' => $request->alamat
        ]);
        return redirect()->route('guru.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param Guru $guru
     * @return Factory|View
     */
    public function show(Guru $guru)
    {
        $kota = Kota::all();
        $kelamin = Kelamin::all();
        $agama = Agama::all();
        if ($guru->gender_id == null) {
            $data = '';
        } else {
            $data = $guru->gender->jeniskelamin;
        }
        $upper = strtoupper($data);

        return view('guru.show', [
            'guru' => $guru,
            'kota' => $kota,
            'kelamin' => $kelamin,
            'agama' => $agama,
            'data' => $upper,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Guru $guru
     * @return Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Guru $guru
     * @return RedirectResponse
     */
    public function update(Request $request, Guru $guru)
    {
        try {
            $this->validate($request, [
                'nama' => 'required|string|max:255',
                'tempat' => 'required|integer',
                'nohp' => 'required|string',
                'tanggal' => 'required|date',
                'gender' => 'required|integer',
                'agama' => 'required|integer',
                'alamat' => 'required|string|max:1000',
            ]);
        } catch (Exception $exception) {
            return redirect()->route('guru.index')->with('error', 'Gagal menambahkan data');
        }
        Guru::Where('id', $guru->id)
            ->update([
                'nama' => $request->nama,
                'nohp' => $request->nohp,
                'tempat_id' => $request->tempat,
                'tanggal' => $request->tanggal,
                'gender_id' => $request->gender,
                'agama_id' => $request->agama,
                'alamat' => $request->alamat
            ]);
        return redirect()->route('guru.index')->with('status', 'Berhasil menambahkan data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Guru $guru
     * @return RedirectResponse
     */
    public function destroy(Guru $guru)
    {
        $guru::where('id', $guru->id);
        $delete = $guru->delete();
        if ($delete) {
            $user = $guru->user->role_id;
            $guru->user->role()->detach($user);
            User::where('id', $guru->user_id)->delete();
            return redirect()->route('guru.index')->with('status', 'Berhasil menghapus data');
        }
    }

    public function cdelete(Guru $guru)
    {
        Guru::Where('id', $guru->id)
            ->update([
                'nama' => null,
                'nohp' => null,
                'tempat_id' => null,
                'tanggal' => null,
                'gender_id' => null,
                'agama_id' => null,
                'alamat' => null
            ]);
        return redirect()->route('guru.index')->with('status', 'Berhasil menghapus profil data');

    }
}
