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
                    <form action="{{route('kota.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Kota</label>
                            <input type="text" name="kode_kota" class="form-control">
                            @if ($errors->has('kode_kota'))
                                <span class="text-danger">{{$errors->first('kode_kota')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <input type="text" name="nama_kota" class="form-control">
                            @if ($errors->has('nama_kota'))
                                <span class="text-danger">{{$errors->first('nama_kota')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Provinsi</label>
                            <select class="form-control" name="id_prov" id="">
                                @foreach($provinsi as $data)
                                    <option value="{{$data->id}}">{{$data->nama_prov}}</option>
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