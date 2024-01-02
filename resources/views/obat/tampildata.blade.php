@extends('layouts.master')
@section('title','Obat')
@section('content')
    <div class="card text-left">
      <div class="card-body">
        {{-- {{ $obat }} --}}
        <h4 class="card-title">Data Obat</h4>
        @if (auth()->user()->role == 'admin') 
        <a href="{{ route('obat.tambah') }}" class="btn btn-primary">[+] Tambah Obat</a>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Keluhan</th>
                        <th>Keterangan Obat</th>
                        @if (auth()->user()->role == 'admin')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($obat as $obat)
                    <tr>
                        <td scope="row">{{ $loop->iteration}}</td>
                        <td>{{ $obat->kode_obat }}</td>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->keluhan }}</td>
                        <td>{{ $obat->keterangan_obat }}</td>
                        <td>

                            @if (auth()->user()->role == 'admin')

                            <a href="{{route('obat.edit',$obat->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt    "></i></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus">
                              <i class="fas fa-trash    "></i>
                            </button>

                            @endif
                            
                            <!-- Modal -->
                            <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form method="POST" action="{{ route('obat.hapus',$obat->id) }}" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6"><center>Data Tidak Tersedia!</center></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>
    </div>
@endsection