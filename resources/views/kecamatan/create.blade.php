@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data
                </div>
                <div class="card-body">
                    <form action="{{route('kecamatan.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Kecamatan</label>
                            <input type="text" name="kode_kec" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="nama_kec" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <select class="form-control" name="id_kota" id="">
                                @foreach($kota as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection