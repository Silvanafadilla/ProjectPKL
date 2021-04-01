@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Menampilkan Data Kelurahan
                </div>
                <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kel" value="{{$kelurahan->nama_kel}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="id_kec" value="{{$kelurahan->kecamatan->nama_kec}}" class="form-control" readonly>
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