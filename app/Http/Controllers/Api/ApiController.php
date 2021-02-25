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
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function provinsi(){
        $provinsi = DB::table('provinsis')        
        ->join('kotas', 'kotas.id_prov', '=', 'provinsis.id')
        ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->whereDate('tanggal', date('Y-m-d'))
        ->select('provinsis.kode_prov', 'provinsis.nama_prov', DB::raw('sum(trackings.positif) as positif'), 
        DB::raw('sum(trackings.sembuh) as sembuh'), DB::raw('sum(trackings.meninggal) as meninggal'))
        ->groupBy('provinsis.id')
        ->get();
        
        $prov = DB::table('provinsis')        
        ->join('kotas', 'kotas.id_prov', '=', 'provinsis.id')
        ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->select('provinsis.kode_prov', 'provinsis.nama_prov', DB::raw('sum(trackings.positif) as posititf'), 
        DB::raw('sum(trackings.sembuh) as sembuh'), DB::raw('sum(trackings.meninggal) as meninggal'))
        ->groupBy('provinsis.id')
        ->get();
        // dd($provinsi);
        $res = [
            'success' => true,
            'data' => [ 'Hari ini' => $provinsi],
                    'total' => [ $prov],
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
    }

    public function kota()
    {
        $kota = DB::table('kotas')
        ->select('kotas.kode_kota', 'kotas.nama_kota', 
        DB::raw('sum(positif) as positif'), DB::raw('sum(sembuh) as sembuh'), 
        DB::raw('sum(meninggal) as meninggal'))
        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->whereDate('tanggal', date('Y-m-d'))
        ->groupBy('kotas.id')
        ->get();

        $kot = DB::table('kotas')
        ->select('kotas.kode_kota', 'kotas.nama_kota', 
        DB::raw('sum(positif) as positif'), DB::raw('sum(sembuh) as sembuh'), 
        DB::raw('sum(meninggal) as meninggal'))
        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->groupBy('kotas.id')
        ->get();
        var_dump($kota);
        $res = [
            'success' => true,
            'data' => ['Hari ini' => $kota ],
                'total' => $kot,
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
    }

    public function kecamatan()
    {
        $kecamatan = DB::table('kecamatans')
        ->select('kecamatans.kode_kec', 'kecamatans.nama_kec',
        DB::raw('sum(positif) as positif'), DB::raw('sum(sembuh) as sembuh'),
        DB::raw('sum(meninggal) as meninggal'))
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->whereDate('tanggal', date('Y-m-d'))
        ->groupBy('kecamatans.id')
        ->get();
        
        $kec = DB::table('kecamatans')
        ->select('kecamatans.kode_kec', 'kecamatans.nama_kec',
        DB::raw('sum(positif) as positif'), DB::raw('sum(sembuh) as sembuh'),
        DB::raw('sum(meninggal) as meninggal'))
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kec')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->groupBy('kecamatans.id')
        ->get();
        var_dump($kecamatan);

        $res = [
            'success' => true,
            'data' => ['Hari ini' => $kecamatan ],
                'total' => $kec,
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
    }

    public function kelurahan()
    {
        $kelurahan = DB::table('kelurahans')
        ->select('kelurahans.nama_kel', DB::raw('sum(trackings.positif) as positif'),
        DB::raw('sum(trackings.sembuh) as sembuh'), DB::raw('sum(trackings.meninggal) as meninggal'))
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->whereDate('tanggal', date('Y-m-d'))
        ->groupBy('kelurahans.id')
        ->get();

        $kel = DB::table('kelurahans')
        ->select('kelurahans.nama_kel', DB::raw('sum(trackings.positif) as positif'),
        DB::raw('sum(trackings.sembuh) as sembuh'), DB::raw('sum(trackings.meninggal) as meninggal'))
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kel')
        ->join('trackings', 'rws.id', '=', 'trackings.id_rw')
        ->groupBy('kelurahans.id')
        ->get();

        $res = [
            'success' => true,
            'data' => ['Hari ini' => $kelurahan],
                'total' => $kel,
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
    }

    public function rw()
    {
        $rw = DB::table('rws')
            ->select('rws.nama_rw', DB::raw('sum(trackings.positif) as positif'), 
            DB::raw('sum(trackings.sembuh) as sembuh'), DB::raw('sum(trackings.meninggal) as meninggal'))
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->whereDate('tanggal', date('Y-m-d'))
            ->groupBy('rws.id')
            ->get();
            
        $r = DB::table('rws')
            ->select('rws.nama_rw', DB::raw('sum(trackings.positif) as positif'), 
            DB::raw('sum(trackings.sembuh) as sembuh'), DB::raw('sum(trackings.meninggal) as meninggal'))
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->groupBy('rws.id')
            ->get();
            // dd($rw);
        $res = [
            'success' => true,
            'data' => ['Hari ini' => $rw],
                'total' => $r,
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);        
    }

    public function indonesia()
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
     }

     public function positif(){
        $positif = DB::table('rws')
            ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->sum('trackings.positif');
        $res = [
            'success' => true,
            'data' => ['Positif' => $positif],
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
     }

     public function sembuh()
     {
        $sembuh = DB::table('rws')
            ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->sum('trackings.sembuh');
        $res = [
            'success' => true,
            'data' => ['Sembuh' => $sembuh],
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
     }

     public function meninggal()
     {
        $meninggal = DB::table('rws')
            ->select('trackings.positif', 'trackings.sembuh', 'trackings.meninggal')
            ->join('trackings', 'rws.id','=', 'trackings.id_rw')
            ->sum('trackings.meninggal');
        $res = [
            'success' => true,
            'data' => ['meninggal' => $meninggal],
            'message' => 'berhasil'
        ];
        return response()->json($res, 200);
     }

     public function global()
     {
         $url = Http::get('https://api.kawalcorona.com/')->json();
         $res = [
             'success' => true,
             'data' => $url,
             'message' => 'Menampilkan data Global'
         ];
         return response()->json($res, 200);
     }
}
