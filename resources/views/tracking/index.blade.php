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
                    class="float-right btn btn-outline-info">
                    Tambah Data
                </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Lokasi</th>
                                    <th scope="col">Rw</th>
                                    <th scope="col">Positif</th>
                                    <th scope="col">Sembuh</th>
                                    <th scope="col">Meninggal</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($tracking as $data)
                                <tr>
                                    <td scope="row">{{$no++}}</td>
                                    <td>Kelurahan : {{$data->rw->kelurahan->nama_kel}} <br>
                                        Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kec}} <br>
                                        Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}} <br>
                                        Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_prov}}
                                    </td>
                                    <td>{{$data->rw->nama_rw}}</td>
                                    <td>{{$data->positif}}</td>
                                    <td>{{$data->sembuh}}</td>
                                    <td>{{$data->meninggal}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>
                                        <form action="{{route('tracking.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            
                                        <a href="{{route('tracking.edit', $data->id)}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    
                                        <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
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


