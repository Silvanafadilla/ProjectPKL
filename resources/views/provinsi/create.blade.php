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
                    <form action="{{route('provinsi.index')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Provinsi</label>
                            <input type="text" name="kode_prov" class="form-control">                      
                            @if ($errors->has('kode_prov'))
                                <span class="text-danger">{{$errors->first('kode_prov')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Provinsi</label>
                            <input type="text" name="nama_prov" class="form-control">
                            @if ($errors->has('nama_prov'))
                                <span class="text-danger">{{$errors->first('nama_prov')}}</span>
                            @endif
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
