@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Menampilkan Data Kecamatan
                </div>
                <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="nama_kec" value="{{$kecamatan->nama_kec}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" name="id_kota" value="{{$kecamatan->kota->nama_kota}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" class="btn btn-secondary">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection