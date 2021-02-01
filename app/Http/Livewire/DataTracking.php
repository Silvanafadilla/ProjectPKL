<?php

namespace App\Http\Livewire;

use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use App\Models\Tracking;
use Livewire\Component;

class DataTracking extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;
    public $idt;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $selectedRw = null;

    public function mount($selectedRw = null){
        $this->provinsi = Provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();
        $this->selectedRw = $selectedRw;
        
        if (!is_null($selectedRw)) {
            $rw = Rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedRw);

            if ($rw) {
                $this->rw = Rw::where('id_kel', $rw->id_kel)->get();
                $this->kelurahan = Kelurahan::where('id_kec', $rw->kelurahan
                ->id_kec)->get();
                $this->kecamatan = Kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_prov', $rw->kelurahan->kecamatan
                ->kota->id_prov)->get();
                $this->selectedProvinsi = $rw->kelurahan->kecamatan->kota->id_prov;
                $this->selectedKota = $rw->kelurahan->kecamatan->id_kota;
                $this->selectedKecamatan = $rw->kelurahan->id_kec;
                $this->selectedKelurahan = $rw->id_kel;
            }
        }
    }

    public function render(){
        return view('livewire.data-tracking');
    }

    public function updatedSelectedProvinsi($provinsi){
        $this->kota = Kota::where('id_prov', $provinsi)->get();
    }

    public function updatedSelectedKota($kota){
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
    }

    public function updatedSelectedKecamatan($kecamatan){
        $this->kelurahan = Kelurahan::where('id_kec', $kecamatan)->get();
    }

    public function updatedSelectedKelurahan($kelurahan){
        if (!is_null($kelurahan)) {
            $this->rw = Rw::where('id_kel', $kelurahan)->get();
        }else {
            $this->selectedRw = NULL;
        }
    }
}