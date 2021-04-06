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
                    Data provinsi
                    {{-- <a href="{{route('provinsi.create')}}"
                    class="float-right btn btn-outline-info">
                    Tambah Data --}}
                </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Kode Provinsi</th>
                                    <th scope="col">Nama Provinsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                                @foreach($provinsi as $data)
                                <tr>
                                    <td scope="row">{{$no++}}</td>
                                    <td>{{$data->kode_prov}}</td>
                                    <td>{{$data->nama_prov}}</td>
                                    <td>
                                        <form action="{{route('provinsi.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                                <a href="{{route('provinsi.edit', $data->id)}}" class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                            
                                                <button class="btn btn-danger btn-sm rounded-0" type="submit" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                            
                                        
                                            {{-- <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-outline-danger">Hapus</button> --}}
                                        </form>
                                        <!-- <a href="{{route('provinsi.destroy', $data->id)}}">Hapus</a> -->
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
    </div>
</div>
@endsection