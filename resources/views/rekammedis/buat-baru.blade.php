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
                <input type="date" name="tanggalperiksa" class="form-control" id="tanggalperiksa"
                    placeholder="Masukkan Kode Obat">
            </div>
            <div class="form-group my-4">
                <label for="nama_pasien">Nama Pasien</label>
                <select class="form-control" name="nama_pasien" id="nama_pasien">
                    <option value="" selected disabled></option>
                    @foreach ($pasien as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->namapasien }} | {{ $pasien->no_telp_pasien }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-4">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Masukkan Informasi Tentang Obat"
                    rows="3"></textarea>
            </div>
            <div class="form-group my-4">
                <label for="keterangan_obat">Keterangan</label>
                <input type="text" name="keterangan_obat" class="form-control" id="keterangan_obat"
                    placeholder="Masukkan Obat">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $("#nama_pasien").select2({
        placeholder: "Pilih pasien",
    allowClear: true

    });
</script>
@endpush