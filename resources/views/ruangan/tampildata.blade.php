@extends('layouts.master')
@section('title','Ruangan')
@section('content')
    <div class="card text-left">
      <div class="card-body">
        {{-- {{ $ruangan }} --}}
        <h4 class="card-title">Data Ruangan</h4>
        <a href="{{ route('ruangan.tambah') }}" class="btn btn-primary">[+] Tambah Ruangan</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ruangan</th>
                        <th>Keterangan</th>
                        @if (auth()->user()->role == 'admin')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ruangan as $ruangan)
                    <tr>
                        <td scope="row">{{ $loop->iteration}}</td>
                        <td>{{ $ruangan->ruangan }}</td>
                        <td>{{ $ruangan->keterangan_ruangan }}</td>
                        <td>

                            @if (auth()->user()->role == 'admin')
                            <a href="{{route('ruangan.edit',$ruangan->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt    "></i></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{ $ruangan->id }}">
                              <i class="fas fa-trash    "></i>
                            </button>
                            @endif  
                            
                            <!-- Modal -->
                            <div class="modal fade" id="hapus{{ $ruangan->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                            <form method="POST" action="{{ route('ruangan.hapus',$ruangan->id) }}" class="d-inline">
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
                            <td colspan="4"><center>Data Tidak Tersedia!</center></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>
    </div>
@endsection