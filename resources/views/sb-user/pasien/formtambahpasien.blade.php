@extends('sb-user/app')

@section('content')

@section('judul','Form Pendaftaran')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@yield('judul')</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<div class="container">
    @if (session('status'))
        <div class="alert alert-primary">{{ session('status') }}</div>
    @endif
</div>

<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Form Pendaftaran Pasien</h6>
                    </div>
                    <form action="{{route('simpan')}}" method="POST">
                    @csrf
                    <div class="row form-group mt-3">
                        <div class="col col-md-3 mt-3">
                            <label for="text-input" class="form-control-label ml-3">Nama</label>
                        </div>
                        <div class="col-12 col-md-9 mt-3">
                            <input type="text" id="namapasien" name="namapasien" class="form-control" placeholder="Masukkan Nama ">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label ml-3">Nomor Telefon</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="no_telp_pasien" name="no_telp_pasien" class="form-control" placeholder="Masukkan Nomor Telefon ">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class="form-control-label ml-3">Jenis Kelamin</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="disabled-input" class="form-control-label ml-3">Keluhan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="keluhan" name="keluhan" class="form-control" placeholder="Masukkan Keluhan ">
                        </div>
                    </div>    
                    {{-- <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class="form-control-label ml-3">Tanggal</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="tanggal" name="tanggal" placeholder="Text" class="form-control">
                        </div>
                    </div>          --}}
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
