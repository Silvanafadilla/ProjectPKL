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
        $tracking = Tracking::with('rw')->get();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit(tracking $tracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tracking $tracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(tracking $tracking)
    {
        //
    }
}
