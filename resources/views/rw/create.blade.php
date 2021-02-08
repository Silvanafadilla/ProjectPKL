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
                    <form action="{{route('rw.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Rw</label>
                            <input type="text" name="nama_rw" class="form-control">
                            @if ($errors->has('nama_rw'))
                                <span class="text-danger">{{$errors->first('nama_rw')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kelurahan</label>
                            <select class="form-control" name="id_kel" id="">
                                @foreach($kelurahan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kel}}</option>
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