<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_prov', 'nama_prov'];
    public $timetamps = true;

    public function kota(){
        return $this->hasMany('App\Models\kota', 'id_prov');
    }
}
