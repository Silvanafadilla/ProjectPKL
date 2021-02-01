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
                        <div class="form-group">
                            <label for="">Jumlah Positif</label>
                            <input type="text" name="positif" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Sembuh</label>
                            <input type="text" name="sembuh" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Meninggal</label>
                            <input type="text" name="meninggal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
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