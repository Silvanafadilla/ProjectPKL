<?php

namespace App\Http\Livewire;

use App\Provinsi;
use App\Kota;
use App\Kecamatan;
use App\Tracking;
use Livewire\Component;

class TrackingData extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;
    public $tracking1;
    public $idt;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $selectedRw = null;

    
    public function render()
    {
        return view('livewire.tracking-data');
    }
}