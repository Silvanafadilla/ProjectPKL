<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;

    protected $fillable = ['kode_kota', 'nama_kota', 'id_prov'];
    public $timetamps = true;

    public function provinsi(){
       return $this->belongsTo('App\Models\Provinsi', 'id_prov');
    }

    public function kecamatan(){
        return $this->hasMany('App\Models\Kecamatan', 'id_kota');
     }

}
