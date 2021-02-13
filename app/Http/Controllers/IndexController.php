<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\kota;
use App\Models\provinsi;
use App\Models\rw;
use App\Models\tracking;

class IndexController extends Controller
{
    public function index()
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
        $provinsi = DB::table('provinsis')
            ->select('provinsis.kode_prov', 'provinsis.nama_prov', DB::raw('sum(trackings.positif) as positif'), 
            DB::raw('sum(trackings.sembuh) as sembuh'), DB::raw('sum(trackings.meninggal) as meninggal'))
            ->join('kotas', 'kotas.id_prov', '=', 'provinsis.id')
            ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
            ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
            ->groupBy('provinsis.id')
            ->get();
        
        return view('frontend.index', compact('positif', 'sembuh', 'meninggal', 'provinsi'));
    }
}
