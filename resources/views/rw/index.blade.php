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
                    Data Rw
                    <a href="{{route('rw.create')}}"
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
                                    <th scope="col">Nama Rw</th>
                                    <th scope="col">Nama Kelurahan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($rw as $data)
                                <tr>
                                    <td scope="row">{{$no++}}</td>
                                    <td>{{$data->nama_rw}}</td>
                                    <td>{{$data->kelurahan->nama_kel}}</td>
                                    <td>
                                        <form action="{{route('rw.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <a href="{{route('rw.show', $data->id)}}" class="btn btn-outline-primary">Lihat</a>|
                                            <a href="{{route('rw.edit', $data->id)}}" class="btn btn-outline-warning">Edit</a>|
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


