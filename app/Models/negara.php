<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class negara extends Model
{
    use HasFactory;

    protected $fillable = ['kode_negara', 'nama_negara'];
    public $timetamps = true;

    public function tracking2(){
        return $this->hasMany('App\Models\Tracking2', 'id_negara');
    }
}
