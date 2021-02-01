<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;
    
    protected $fillable = ['id', 'nama_rw'];
    public $timetamps = true;


    public function kelurahan(){
        return $this->belongsTo('App\Models\kelurahan', 'id_kel');
    }

    public function tracking(){
        return $this->hasMany('App\Models\tracking', 'id_rw');
    }
}
