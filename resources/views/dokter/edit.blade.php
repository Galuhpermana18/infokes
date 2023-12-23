@extends('layouts.master')
@section('title','Edit Dokter')
@section('content')
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Edit Data Dokter</h4>
        <a href="{{ route('dokter.index') }}" class="btn btn-outline-primary btn-sm">Kembali</a>
        <form action="{{ route('dokter.update',$dokter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group my-4">
                <label for="nama_dokter">Nama Dokter</label>
                <input type="text" name="nama_dokter" class="form-control" value="{{$dokter->namadokter}}" id="nama_dokter"
                    placeholder="Masukkan Nama Dokter">
            </div>
            <div class="form-group my-4">
                <label for="foto_dokter">Dokter</label>
                <input type="file" name="foto_dokter" class="form-control" value="{{$dokter->foto_fokter}}" id="foto_dokter">
                <img src="{{$dokter->foto_dokter}}" style="width:12em;" alt="">
            </div>
            <div class="form-group my-4">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" value="{{$dokter->jenis_kelamin}}" id="jenis_kelamin">
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group my-4">
                <label for="nama_dokter">Spesialis</label>
                <input type="text" name="spesialis" class="form-control" value="{{$dokter->spesialis}}" id="spesialist"
                    placeholder="Masukkan Spesialis">
            </div>
            <div class="form-group my-4">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" name="jam_mulai" class="form-control" value="{{$dokter->jam_mulai}}" id="jam_mulai">
            </div>
            <div class="form-group my-4">
                <label for="jam_selesai">Jam Selesai</label>
                <input type="time" name="jam_selesai" class="form-control" value="{{$dokter->jam_selesai}}" id="jam_selesai">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection