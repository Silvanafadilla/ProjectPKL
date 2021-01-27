@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit Data Kelurahan
                </div>
                <div class="card-body">
                    <form action="{{route('kelurahan.update', $kelurahan->id)}}" method="post">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <input type="text" name="nama_kel" value="{{$kelurahan->nama_kel}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kecamatan</label>
                            <select class="form-control" name="id_kec" id="">
                                @foreach($kecamatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kec}}</option>
                                @endforeach
                            </select>
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