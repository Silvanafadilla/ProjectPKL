@extends('layouts.master')
@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                <div class="row">
                        <div class="col">
                    <form action="{{route('tracking.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                        @livewire('data-tracking')
                            </div>
                            <div class="col">
                        <div class="form-group">
                            <label for="">Jumlah Positif</label>
                            <input type="number" min="1" name="positif" class="form-control">
                            @if ($errors->has('positif'))
                                <span class="text-danger">{{$errors->first('positif')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Sembuh</label>
                            <input type="number" min="1" name="sembuh" class="form-control">
                            @if ($errors->has('sembuh'))
                                <span class="text-danger">{{$errors->first('sembuh')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Meninggal</label>
                            <input type="number" min="1" name="meninggal" class="form-control">
                            @if ($errors->has('meninggal'))
                                <span class="text-danger">{{$errors->first('meninggal')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                            @if ($errors->has('tanggal'))
                                <span class="text-danger">{{$errors->first('tanggal')}}</span>
                            @endif
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
</div>
                        </div>
@endsection