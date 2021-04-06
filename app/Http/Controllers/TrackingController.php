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
        $positif = (int)$request->positif;
        $meninggal = $request->positif - $request->sembuh;
        $request->validate([
            'positif' => 'required|numeric|min:1',
            'sembuh' => "required|numeric|min:1|max:$positif",
            'meninggal' => "required|numeric|min:1|max:$meninggal",
            'tanggal' => 'required',
        ],
            [
                'positif.required' => 'Data harus diisi',
                'positif.min' => 'Data positif tidak boleh kurang dari 1',
                'sembuh.required' => 'Data harus diisi',
                'sembuh.min' => 'Jumlah sembuh tidak boleh kurang dari 1',
                'sembuh.max' => 'Jumlah sembuh tidak boleh melebihi jumlah positif',
                'meninggal.required' => 'Data harus diisi',
                'meninggal.min' => 'Jumlah meninggal tidak boleh kuarng dari 1',
                'meninggal.max' => 'Jumlah meninggal tidak boleh melebihi jumlah positif',
                'tanggal' => 'Tanggal harus diisi!',
            ]
        );
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
        $request->validate([
            'positif' => 'required|max:5',
            'sembuh' => 'required|max:5',
            'meninggal' => 'required|max:5',
            'tanggal' => 'required|before:date|after:date',
        ],
            [
                'positif.required' => 'Jumlah harus diisi!',
                'positif.max' => 'Maximal 5 angka!',
                'sembuh.required' => 'Jumlah harus diisi!',
                'sembuh.max' => 'Maximal 5 angka!',
                'meninggal.required' => 'Jumlah harus diisi!',
                'meninggal.max' => 'Maximal 5 angka!',
                'tanggal' => 'Tanggal harus diisi!',
                'tanggal.before' => 'Tidak bisa menginput hari kemarin',
                'tanggal.after' => 'Tidak bisa menginput hari kemarin'
            ]
        );
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
