<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelurahan extends Model
{
    use HasFactory;

    protected $fillable = ['kode_kel', 'nama_kel'];
    public $timetamps = true;

    public function kecamatan(){
        return $this->belongsTo('App\Models\kecamatan', 'id_kec');
    }

    public function rw(){
        return $this->hasMany('App\Models\rw', 'id_kel');
    }
}
