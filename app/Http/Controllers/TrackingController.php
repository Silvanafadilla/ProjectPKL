<?php

namespace App\Http\Controllers;

use App\Models\tracking;
use App\Models\rw;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function __constract(){
        $this->middleware('auth');
    }
    public function index()
    {
        $tracking = Tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('tracking.index', compact('tracking'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('tracking.create', compact('rw'));
    }

    public function store(Request $request)
    {
        $tracking = new Tracking();
        $tracking->positif = $request->positif;
        $tracking->sembuh = $request->sembuh;
        $tracking->meninggal = $request->meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->id_rw = $request->id_rw;
        $tracking->save();
        return redirect()->route('tracking.index')->with(['message'=>'Data berhasil dibuat']);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $tracking = Tracking::findOrFail($id);
        $rw = rw::all();
        return view('tracking.edit', compact('tracking', 'rw'));
    }

    public function update(Request $request, $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->positif = $request->positif;
        $tracking->sembuh = $request->sembuh;
        $tracking->meninggal = $request->meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->id_rw = $request->id_rw;
        $tracking->save();
        return redirect()->route('tracking.index')->with(['message'=>'Data berhasil diedit']);
    }

    public function destroy($id)
    {
        $tracking = Tracking::findOrFail($id)->delete();
        return redirect()->route('tracking.index');
    }
}
