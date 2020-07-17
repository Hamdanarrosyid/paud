<?php

namespace App\Http\Controllers;

use App\Agama;
use App\Guru;
use App\Kelamin;
use App\Kota;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $kota = Kota::all();
        $kelamin = Kelamin::all();
        $agama = Agama::all();
        return view('profile.index', ['kota' => $kota, 'kelamin' => $kelamin, 'agama' => $agama]);
    }
    public function update(Request $request,Guru $guru)
    {
//        dd($request);
            $this->validate($request, [
                'nama' => 'required|string|max:255',
                'tempat' => 'required|integer',
                'nohp' => 'required|string',
                'tanggal' => 'required|date',
                'gender' => 'required|integer',
                'agama' => 'required|integer',
                'alamat' => 'required|string|max:1000',
            ]);
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
        return redirect()->route('home')->with('status', 'Data anda berhasil disimpan');
    }
}
