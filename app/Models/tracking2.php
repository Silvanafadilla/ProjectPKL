<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracking2 extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'positif', 'sembuh', 'meninggal', 'tanggal'];
    public $timetamps = true;

    public function negara(){
        return $this->belongsTo('App\Models\Negara', 'id_negara');
    }
}
