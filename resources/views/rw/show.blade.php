@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Menampilkan Data Rw
                </div>
                <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Rw</label>
                            <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="id_kel" value="{{$rw->kelurahan->nama_kel}}" class="form-control" readonly>
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