@extends('layouts.master')
@section('title','Edit Obat')
@section('content')
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Edit Data Obat</h4>
        <a href="{{ route('obat.index') }}" class="btn btn-outline-primary btn-sm">Kembali</a>
        <form method="POST" action="{{route('obat.update',$obat->id)}}">
          @csrf
          @method('PUT')
          <div class="form-group my-4">
                <label for="kode_obat">Kode Obat</label>
                <input type="text" class="form-control" name="kode_obat" value="{{$obat->kode_obat}}" class="form-control" id="kode_obat" placeholder="Masukkan Kode Obat">
            </div>
             <div class="form-group my-4">
                <label for="nama_obat">Nama Obat</label>
                <input type="text" class="form-control" name="nama_obat" value="{{$obat->nama_obat}}" class="form-control" id="nama_obat" placeholder="Masukkan Obat">
            </div>
            <div class="form-group my-4">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Masukkan Informasi Tentang Obat" rows="3">{{$obat->keluhan}}</textarea>
            </div>
             <div class="form-group my-4">
                <label for="keterangan_obat">Keterangan</label>
                <input type="text" class="form-control" name="keterangan_obat" value="{{$obat->keterangan_obat}}" id="keterangan_obat" placeholder="Masukkan Obat">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
</div>
@endsection
