@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Data Provinsi
                </div>
                <div class="card-body">
                    <form action="{{route('provinsi.update', $provinsi->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Provinsi</label>
                            <input type="text" name="kode_prov" value="{{$provinsi->kode_prov}}" class="form-control">
                            @if ($errors->has('kode_prov'))
                                <span class="text-danger">{{$errors->first('kode_prov')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Provinsi</label>
                            <input type="text" name="nama_prov" value="{{$provinsi->nama_prov}}" class="form-control">
                            @if ($errors->has('nama_prov'))
                                <span class="text-danger">{{$errors->first('nama_prov')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{url()->previous()}}" classs="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection