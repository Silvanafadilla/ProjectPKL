@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Menampilkan Data Provinsi
                </div>
                <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Provinsi</label>
                            <input type="text" name="kode_prov" value="{{$provinsi->kode_prov}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Provinsi</label>
                            <input type="text" name="nama_prov" value="{{$provinsi->nama_prov}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <a href="{{url()->previous()}}" classs="btn btn-outline-secondary">Kembali</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection