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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Kode Kecamatan</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Nama Kota</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($kecamatan as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->kode_kec}}</td>
                                    <td>{{$data->nama_kec}}</td>
                                    <td>{{$data->kota->nama_kota}}</td>
                                    <td>
                                        <form action="{{route('kecamatan.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{route('kecamatan.show', $data->id)}}">Lihat</a>|
                                            <a href="{{route('kecamatan.edit', $data->id)}}">Edit</a>|
                                            <button type="submit" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
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


