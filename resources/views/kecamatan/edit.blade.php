@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Data Kecamatan
                </div>
                <div class="card-body">
                    <form action="{{route('kecamatan.update', $kecamatan->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama kota</label>
                            <input type="text" name="nama_kec" value="{{$kecamatan->nama_kec}}" class="form-control">
                            @if ($errors->has('nama_kec'))
                                <span class="text-danger">{{$errors->first('nama_kec')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Provinsi</label>
                            <select class="form-control" name="id_kota" id="">
                                @foreach($kota as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kota}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{url()->previous()}}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection