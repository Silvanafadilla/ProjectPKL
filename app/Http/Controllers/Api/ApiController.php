<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\provinsi;
use App\Models\rw;
use App\Models\kota;
use App\Models\kelurahan;
use App\Models\kecamatan;
use App\Models\tracking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function rw()
    {
        $positif = DB::table('rws')
            ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->sum('trackings.positif');
        $sembuh = DB::table('rws')
            ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->sum('trackings.sembuh');
        $meninggal = DB::table('rws')
            ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->sum('trackings.meninggal');
        $res = [
            'success' => true,
            'data' => 'Data Covid-19 Indonesia',
            'positif' => $positif,
            'sembuh' => $sembuh,
            'meninggal' => $meninggal,
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
        // $rw = DB::table('rws')
        //     ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
        //     ->join('trackings', 'rws.id','=', 'trackings.id_rw')
        //     ->sum('trackings.positif', 'trackings.sembuh', 'trackings.meninggal');
        //     dd($rw);
        // $res = [
        //     'success' => true,
        //     'data' => $rw,
        //     'message' => 'berhasil'
        // ];
        // return response()->json($res, 200);
    }

    public function provinsi()
    {
        $provinsi = DB::table('provinsis')
        ->select('provinsis.kode_prov', 'provinsis.nama_prov', DB::raw('sum(positif) as posititf'), 
        DB::raw('sum(sembuh) as sembuh'), DB::raw('sum(meninggal) as meninggal'))
        ->join('kotas', 'kotas.id_prov', '=', 'provinsis.id')
        ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->groupBy('provinsis.id')
        ->get();
        
        $positif = DB::table('provinsis')
        ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
        ->join('kotas', 'provinsis.id', '=', 'kotas.id_prov')
        ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->sum('trackings.positif');
        $sembuh = DB::table('provinsis')
        ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
        ->join('kotas', 'provinsis.id', '=', 'kotas.id_prov')
        ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->sum('trackings.sembuh');
        $meninggal = DB::table('provinsis')
        ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
        ->join('kotas', 'provinsis.id', '=', 'kotas.id_prov')
        ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->sum('trackings.meninggal');
        
        // dd($provinsi);
        $res = [
            'success' => true,
            'data' => [ 'Hari ini' => $provinsi],
                    'total' => ['Positif' => $positif,
                    'Sembuh' => $sembuh,
                    'Meninggal' => $meninggal],
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
