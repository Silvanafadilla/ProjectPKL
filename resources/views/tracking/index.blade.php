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
                    Data Tracking
                    <a href="{{route('tracking.create')}}"
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
                                    <th>Lokasi</th>
                                    <th>Rw</th>
                                    <th>Positif</th>
                                    <th>Sembuh</th>
                                    <th>Meninggal</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($tracking as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->positif}}</td>
                                    <td>{{$data->sembuh}}</td>
                                    <td>{{$data->meninggal}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->kelurahan->nama_kel}}</td>
                                    <td>
                                        <form action="{{route('tracking.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{route('tracking.show', $data->id)}}">Lihat</a>|
                                            <a href="{{route('tracking.edit', $data->id)}}">Edit</a>|
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


