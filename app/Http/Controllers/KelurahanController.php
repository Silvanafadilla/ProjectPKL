<?php

namespace App\Http\Controllers;

use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function __constract(){
        $this->middleware('auth');
    }

    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index', compact('kelurahan'));
    }

    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('kelurahan.create', compact('kecamatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kel' => 'required|unique.kelurahans',
        ],
            [
                'nama_kel.required' => 'Nama kelurahan harus diisi!',
                'nama_kel.unique' => 'Kelurahan sudah terdaftar!',
            ]
        );
        $kelurahan = new Kelurahan();
        $kelurahan->nama_kel = $request->nama_kel;
        $kelurahan->id_kec = $request->id_kec;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        return view('kelurahan.show', compact('kelurahan'));
    }

    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kel' => 'required',
        ],
            [
                'nama_kel.required' => 'Nama kecamatan harus diisi!',
            ]
        );
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->nama_kel = $request->nama_kel;
        $kelurahan->id_kec = $request->id_kec;
        $kelurahan->save();
        return redirect()->route('kelurahan.index')->with(['message'=>'Data berhasil diedit']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id)->delete();
        return redirect()->route('kelurahan.index')->with(['message'=>'Data berhasil dihapus']);
    }
}
