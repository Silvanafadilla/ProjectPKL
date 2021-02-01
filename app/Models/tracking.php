<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_rw', 'positif', 'sembuh', 'meninggal', 'tanggal'];
    public $timetamps = true;

    public function rw(){
        return $this->belongsTo('App\Models\rw', 'id_rw');
    }

    public function tracking(){
        return $this->hasMany('App\Models\tracking', 'id_tracking');
    }
}
