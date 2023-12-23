@extends('layouts.master')
@section('title','Tambah Pasien')
@section('content')
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Form Tambah Data Pasien</h4>
        <a href="{{ route('pasien.index') }}" class="btn btn-outline-primary btn-sm">Kembali</a>
        <form method="POST" action="{{route('pasien.simpan')}}">
          @csrf
            <div class="form-group my-4">
                <label for="kode_obat">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" id="_nama_pasien" placeholder="Masukkan Nama Pasien">
            </div>
            <div class="form-group my-4">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
             {{-- <div class="form-group my-4">
                <label for="emailpasien">Email</label>
                <input type="emailpasien" name="emailpasien" class="form-control" id="emailpasien" placeholder="Masukkan Email">
            </div> --}}
              <div class="form-group my-4">
                <label for="no_telp_pasien">No Handpone</label>
                <input type="number" name="no_telp_pasien" class="form-control" id="no_telp_pasien" placeholder="Masukkan No Handpone">
            </div>
            <div class="form-group my-4">
                <label for="keluhan">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" rows="3"></textarea>
            </div>
             {{-- <div class="form-group my-4">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan anggal">
            </div> --}}
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
</div>
@endsection
