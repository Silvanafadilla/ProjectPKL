<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function __constract(){
        $this->middleware('auth');
    }

    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('kota.index', compact('kota'));
    }

    public function create()
    {
        $provinsi = Provinsi::all();
        return view('kota.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $kota = new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_prov = $request->id_prov;
        $kota->save();
        return redirect()->route('kota.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('kota.show', compact('kota'));
    }

    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('kota.edit', compact('kota', 'provinsi'));
    }

    public function update(Request $request, $id)
    {
        $kota = Kota::findOrFail($id);
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->id_prov = $request->id_prov;
        $kota->save();
        return redirect()->route('kota.index')->with(['message'=>'Data berhasil diedit']);
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id)->delete();
        return redirect()->route('kota.index')->with(['message'=>'Data berhasil dihapus']);
    }
}
