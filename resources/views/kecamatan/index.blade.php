@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <div class="card">
                <div class="card-header">
                    Data Kecamatan
                    <a href="{{route('kecamatan.create')}}"
                    class="float-right">
                    Tambah Data
                </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Kode Kecamatan</th>
                                    <th scope="col">Nama Kecamatan</th>
                                    <th scope="col">Nama Kota</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($kecamatan as $data)
                                <tr>
                                    <td scope="row">{{$no++}}</td>
                                    <td>{{$data->kode_kec}}</td>
                                    <td>{{$data->nama_kec}}</td>
                                    <td>{{$data->kota->nama_kota}}</td>
                                    <td>
                                        <form action="{{route('kecamatan.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{route('kecamatan.show', $data->id)}}" class="btn btn-outline-primary">Lihat</a>|
                                            <a href="{{route('kecamatan.edit', $data->id)}}" class="btn btn-outline-warning">Edit</a>|
                                            <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-outline-danger">Hapus</button>
                                        </form>
                                        <!-- <a href="{{route('kota.destroy', $data->id)}}">Hapus</a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


