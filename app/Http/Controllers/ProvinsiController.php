<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function __constract(){
        $this->middleware('auth');
    }

    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index',compact('provinsi'));
    }

    public function create()
    {
        return view('provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prov' => 'required|unique:provinsis',
            'nama_prov' => 'required|unique:provinsis',
        ],
            [
                'kode_prov.required' => 'Kode Provinsi harus diisi!',
                'kode_prov.unique' => 'Kode Provinsi sudah terdaftar!',
                'nama_prov.required' => 'Nama Provinsi harus diisi!',
                'nama_prov.unique' => 'Provinsi sudah terdaftar!'
            ]
        );

        $provinsi = new Provinsi();
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['message'=>'tabel provinsi berhasil dibuat']);
    }

    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.show', compact('provinsi'));
    }

    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_prov' => 'required',
            'nama_prov' => 'required',
        ],
            [
                'kode_prov.required' => 'Kode Provinsi harus diisi!',
                'nama_prov.required' => 'Nama Provinsi harus diisi!',
            ]
        );
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['message'=>'tabel provinsi berhasil diedit']);
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')->with(['message'=>'tabel provinsi berhasil dihapus']);
    }
}
