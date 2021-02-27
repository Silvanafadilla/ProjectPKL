<div>
    <div class="form-group row">
        <div class="col-md-10">
            <label for="provinsi">Provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control">
                <option value= selected>Pilih Provinsi</option>
                @foreach($provinsi as $provinsis)
                <option value="{{$provinsis->id}}">{{$provinsis->nama_prov}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-10">
        <label for="kota">Kota</label>
            <select wire:model="selectedKota" class="form-control">
                <option value= selected>Pilih Kota</option>
                @foreach($kota as $kota)
                <option value="{{$kota->id}}">{{$kota->nama_kota}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-10">
        <label for="">Kecamatan</label>
            <select wire:model="selectedKecamatan" class="form-control">
                <option value= selected>Pilih Kecamatan</option>
                @foreach($kecamatan as $kecamatans)
                <option value="{{$kecamatans->id}}">{{$kecamatans->nama_kec}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-10">
        <label for="">Kelurahan</label>
            <select wire:model="selectedKelurahan" class="form-control">
                <option value= selected>Pilih Kelurahan</option>
                @foreach($kelurahan as $kelurahans)
                <option value="{{$kelurahans->id}}">{{$kelurahans->nama_kel}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-10">
        <label for="">Rw</label>
            <select name="id_rw" wire:model="selectedRw" class="form-control">
                <option value= selected>Pilih Rw</option>
                @foreach($rw as $rws)
                <option value="{{$rws->id}}">{{$rws->nama_rw}}</option>   
                @endforeach    
            </select>
        </div>
    </div>
</div>