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
                    Data Kelurahan
                    <a href="{{route('kelurahan.create')}}"
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
                                    <th>Nama Kelurahan</th>
                                    <th>Nama Kecamatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($kelurahan as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_kel}}</td>
                                    <td>{{$data->kecamatan->nama_kec}}</td>
                                    <td>
                                        <form action="{{route('kelurahan.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{route('kelurahan.show', $data->id)}}">Lihat</a>|
                                            <a href="{{route('kelurahan.edit', $data->id)}}">Edit</a>|
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


