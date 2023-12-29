@extends('layouts.master')
@section('title','Tambah Rekam Pasien')
@section('content')
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Form Tambah Rekam Pasien</h4>
        <a href="{{route('rekammedis.index')}}" class="btn btn-outline-primary btn-sm">Kembali</a>
        <form method="POST" action="{{route('rekammedis.simpan')}}">
            @csrf
            <div class="form-group my-4">
                <label for="tanggalperiksa">Tanggal Periksa</label>
                <input type="date" name="tanggalperiksa" class="form-control" id="tanggalperiksa"
                    placeholder="Masukkan Kode Obat">
            </div>
            <div class="form-group my-4">
                <label for="pasien_id">Nama Pasien</label>
                <select class="form-control" name="pasien_id" id="pasien_id">
                    <option value="" selected disabled></option>
                    @foreach ($pasien as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->namapasien }} | {{ $pasien->no_telp_pasien }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-4">
                <label for="keluhan">Keluhan</label>
                <textarea class="form-control" name="keluhan" id="keluhan" placeholder="Masukkan Keluhan"
                    rows="3"></textarea>
            </div>
            <div class="form-group my-4">
                <label for="dokter_id">Nama Dokter</label>
                <select class="form-control" name="dokter_id" id="dokter_id">
                    <option value="" selected disabled></option>
                    @foreach ($dokter as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->namadokter }} | {{ $dokter->spesialis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-4">
                <label for="diagnosa">Diagnosa</label>
                <input type="text" name="diagnosa" class="form-control" id="diagnosa" placeholder="Masukkan Diagnosa">
            </div>
            <div class="form-group my-4">
                <label for="obat_id">Obat</label>
                <select class="form-control" name="obat_id" id="obat_id">
                    <option value="" selected disabled></option>
                    @foreach ($obat as $obat)
                    <option value="{{ $obat->id }}">{{ $obat->nama_obat }} | {{ $obat->keterangan_obat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-4">
                <label for="ruangan_id">Ruangan</label>
                <select class="form-control" name="ruangan_id" id="ruangan_id">
                    <option value="" selected disabled></option>
                    @foreach ($ruangan as $ruangan)
                    <option value="{{ $ruangan->id }}">{{ $ruangan->ruangan }} | {{ $ruangan->keterangan_ruangan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option>Selesai</option>
                    <option>Proses</option>
                    <option>Terkonfirmasi</option>
                    <option>Belum Terkonfirmasi</option>
                </select>
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $("#pasien_id").select2({
        placeholder: "Pilih Pasien",
        allowClear: true

    });

    $("#dokter_id").select2({
        placeholder: "Pilih Dokter",
        allowClear: true

    });

    $("#obat_id").select2({
        placeholder: "Pilih Obat",
        allowClear: true

    });

    $("#ruangan_id").select2({
        placeholder: "Pilih Ruangan",
        allowClear: true

    });

</script>
@endpush
