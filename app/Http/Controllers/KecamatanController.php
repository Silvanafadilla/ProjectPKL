<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kota;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __constract(){
        $this->middleware('auth');
    }
    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('kecamatan.index', compact('kecamatan'));
    }

    public function create()
    {
        $kota = Kota::all();
        return view('kecamatan.create', compact('kota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kec' => 'required|unique:kecamatans',
            'nama_kec' => 'required|unique:kecamatans',
        ],
            [
                'kode_kec.required' => 'Kode harus diisi!',
                'kode_kec.unique' => 'Kode kecamatan sudah terdaftar!',
                'nama_kec.required' => 'Nama harus diisi!',
                'nama_kec.unique' => 'Kecamatan sudah terdaftar!',
            ]
        );
        $kecamatan = new Kecamatan();
        $kecamatan->kode_kec = $request->kode_kec;
        $kecamatan->nama_kec = $request->nama_kec;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.show', compact('kecamatan'));
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('kecamatan.edit', compact('kecamatan', 'kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_kec' => 'required',
            'nama_kec' => 'required',
        ],
            [
                'kode_kec.required' => 'Kode harus diisi!',
                'nama_kec.required' => 'Nama harus diisi!',
            ]
        );
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->kode_kec = $request->kode_kec;
        $kecamatan->nama_kec = $request->nama_kec;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['message'=>'Data berhasil diedit']);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index')->with(['message'=>'Data berhasil dihapus']);
    }
}
