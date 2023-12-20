@extends('layouts.master')
@section('title','Tambah Ruangan Baru')
@section('content')
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Form Tambah Data Ruangan</h4>
        <a href="{{ route('ruangan.index') }}" class="btn btn-outline-primary btn-sm">Kembali</a>
        <form method="POST" action="{{route('ruangan.simpan')}}">
          @csrf
            <div class="form-group my-4">
                <label for="ruangan">Nama Ruangan</label>
                <input type="text" name="ruangan" class="form-control" id="ruangan" placeholder="Masukkan Ruangan">
            </div>
            <div class="form-group my-4">
                <label for="keterangan_ruangan">Keterangan</label>
                <textarea class="form-control" name="keterangan_ruangan" id="keterangan_ruangan" placeholder="Masukkan Informasi Dan Keterangan Ruangan" rows="3"></textarea>
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
</div>
@endsection
