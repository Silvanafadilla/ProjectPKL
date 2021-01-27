<div>
    <div class="form-group row">
        <div class="col-md-6">
            <label for="provinsi">provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control">
                <option value= selected>Pilih Provinsi</option>
                @foreach($provinsi as $provinsis)
                <option value="{{$provinsis->id}}">{{$provinsis->nama_prov}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <label for="">Jumlah Positif</label>
            <input type="text" value="@if(isset($tracking1)){{$tracking1->positif}}@endif" name="positif" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
@if (!is_null($selectedProvinsi))
        <label for="kota">Kota</label>
            <select wire:model="selectedKota" class="form-control">
                <option value= selected>Pilih Kota</option>
                @foreach($kota as $kota)
                <option value="{{$kota->id}}">{{$kota->nama_kota}}</option>
                @endforeach
            </select>
            @endif

        </div>
        <div class="col-md-6">
        <label for="">Jumlah Sembuh</label>
        <input type="text" value="@if(isset($tracking1)){{$tracking1->sembuh}}@endif" name="sembuh" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
@if (!is_null($selectedKota))
        <label for="">Kecamatan</label>
            <select wire:model="selectedKecamatan" class="form-control">
                <option value= selected>Pilih Kecamatan</option>
                @foreach($kecamatan as $kecamatans)
                <option value="{{$kecamatans->id}}">{{$kecamatans->nama_kec}}</option>
                @endforeach
            </select>
            @endif
        </div>
        <div class="col-md-6">
        <label for="">Jumlah Meninggal</label>
        <input type="text" value="@if(isset($tracking1)){{$tracking1->meninggal}}@endif" name="meninggal" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
@if (!is_null($selectedKecamatan))
        <label for="">Kelurahan</label>
            <select wire:model="selectedKelurahan" class="form-control">
                <option value= selected>Pilih Kelurahan</option>
                @foreach($kelurahan as $kelurahans)
                <option value="{{$kelurahans->id}}">{{$kelurahans->nama_kel}}</option>
                @endforeach
            </select>
            @endif
        </div>
        <div class="col-md-6">
        <label for="">Tanggal</label>
        <input type="text" value="@if(isset($tracking1)){{$tracking1->meninggal}}@endif" name="tanggal" class="form-control" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
@if (!is_null($selectedKelurahan))
        <label for="">Rw</label>
            <select wire:model="selectedRw" class="form-control">
                <option value= selected></option>
                @foreach($rw as $rws)
                <option value="{{$rws->id}}">{{$rws->nama_rw}}</option>   
                @endforeach    
            </select>
            @endif
        </div>
    </div>
</div>