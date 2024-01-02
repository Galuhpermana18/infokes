@extends('layouts.master')
@section('title','Pasien')
@section('content')
    <div class="card text-left">
      <div class="card-body">
        <h4 class="card-title">Data Pasien</h4>
        <a href="{{route('pasien.tambah')}}" class="btn btn-primary">[+] Tambah Pasien</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        {{-- <th>Pasien</th> --}}
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>No Handpone</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasien as $pasien)
                    <tr>
                        <td scope="row">{{ $loop->iteration}}</td>
                        <td>{{ $pasien->namapasien }}</td>
                        {{-- <td>{{ $pasien->foto }}</td> --}}
                        <td>{{ $pasien->jenis_kelamin }}</td>
                        <td>{{ $pasien->user->email }}</td>
                        <td>{{ $pasien->no_telp_pasien }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->tanggal }}</td>
                        <td>
                            {{-- <a href="" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt    "></i></a> --}}
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus">
                              <i class="fas fa-trash"></i>
                            </button>
                            
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
                                            <form method="POST" action="{{ route('pasien.delete',$pasien->id) }}" class="d-inline">
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
                            <td colspan="8"><center>Data Tidak Tersedia!</center></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>
    </div>
@endsection