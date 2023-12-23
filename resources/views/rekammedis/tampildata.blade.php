@extends('layouts.master')
@section('title','Rekam Medis')
@section('content')
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title">Data Rekam Medis</h4>
        @if (auth()->user()->role == 'admin')
            
        <a href="{{ route('rekammedis.tambah') }}" class="btn btn-primary">[+] Tambah Rekam Medis</a>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Periksa</th>
                        <th>Nama Pasien</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Dokter</th>
                        <th>Obat</th>
                        <th>Ruangan</th>
                         @if (auth()->user()->role == 'admin')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekammedis as $rekammedis)
                    <tr>
                        <td scope="row">{{ $loop->iteration}}</td>
                        <td>{{date($rekammedis->tanggalperiksa)}}</td>
                        <td>{{ $rekammedis->pasien->namapasien }}</td>
                        <td>{{ $rekammedis->keluhan }}</td>
                        <td>{{ $rekammedis->diagnosa }}</td>
                        <td>{{ $rekammedis->dokter->namadokter }}</td>
                        <td>{{ $rekammedis->obat->nama_obat }}</td>
                        <td>{{ $rekammedis->ruangan?->ruangan }}</td>
                        <td>
                            {{-- <a href="{{route('dokter.edit',$rekammedis->id)}}" class="btn btn-sm btn-warning"><i
                                    class="fas fa-pencil-alt"></i></a> --}}
                        @if (auth()->user()->role == "admin")
                                        
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                data-target="#hapus">
                                <i class="fas fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapus" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda ingin menghapus?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <form method="POST" action="{{route('rekammedis.delete',$rekammedis->id)}}"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <center>Data Tidak Tersedia!</center>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection