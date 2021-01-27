<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use App\Http\Controller\DB;
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
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_prov = $request->kode_prov;
        $provinsi->nama_prov = $request->nama_prov;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['message'=>'tabel provinsi berhasil diedit']);
    }

    public function destroy(provinsi $provinsi)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')->with(['message'=>'tabel provinsi berhasil dihapus']);
    }
}
