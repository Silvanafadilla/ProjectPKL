<?php

namespace App\Http\Controllers;

use App\Models\rw;
use App\Models\kelurahan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function __constract(){
        $this->middleware('auth');
    }

    public function index()
    {
        $rw = Rw::with('kelurahan')->get();
        return view('rw.index', compact('rw'));
    }

    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('rw.create', compact('kelurahan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rw' => 'required|unique:rws',
        ],
            [
                'nama_rw.required' => 'Nomer rw harus diisi!',
                'nama_rw.unique' => 'Nomer rw sudah terdaftar!'
            ]
        );
        $rw = new Rw();
        $rw->nama_rw = $request->nama_rw;
        $rw->id_kel = $request->id_kel;
        $rw->save();
        return redirect()->route('rw.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        return view('rw.show', compact('rw'));
    }

    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('rw.edit', compact('rw', 'kelurahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rw' => 'required',
        ],
            [
                'nama_rw.required' => 'Nomer rw harus diisi!',
            ]
        );
        $rw = Rw::findOrFail($id);
        $rw->nama_rw = $request->nama_rw;
        $rw->id_kel = $request->id_kel;
        $rw->save();
        return redirect()->route('rw.index')->with(['message'=>'Data berhasil diedit']);
    }

    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')->with(['message'=>'Data berhasil dihapus']);
    }
}
