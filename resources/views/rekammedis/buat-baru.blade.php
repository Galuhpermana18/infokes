@extends('layouts.master')
@section('title','Tambah Rekam Pasien')
@section('content')
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Form Tambah Rekam Pasien</h4>
        <a href="" class="btn btn-outline-primary btn-sm">Kembali</a>
        <form method="POST" action="">
          @csrf
            <div class="form-group my-4">
                <label for="tanggalperiksa">Tanggal Periksa</label>
                <input type="date" name="tanggalperiksa" class="form-control" id="tanggalperiksa" placeholder="Masukkan Kode Obat">
            </div>
             <div class="form-group my-4">
                <label for="nama_obat">Nama Pasien</label>
                <input type="text" name="nama_obat" class="form-control" id="nama_obat" placeholder="Masukkan Obat">
            </div>
            <div class="form-group my-4">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Masukkan Informasi Tentang Obat" rows="3"></textarea>
            </div>
             <div class="form-group my-4">
                <label for="keterangan_obat">Keterangan</label>
                <input type="text" name="keterangan_obat" class="form-control" id="keterangan_obat" placeholder="Masukkan Obat">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
</div>
@endsection
