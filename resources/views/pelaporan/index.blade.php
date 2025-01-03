@extends('layouts.app')

@section('title', 'Data Pelaporan')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        @if(session('success'))
            <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    var alertElement = document.getElementById('successAlert');
                    if (alertElement) {
                        var bootstrapAlert = new bootstrap.Alert(alertElement);
                        bootstrapAlert.close();
                    }
                }, 2500); 
            </script>
        @endif

        @if(session('error'))
            <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <script>
                setTimeout(function() {
                    var alertElement = document.getElementById('errorAlert');
                    if (alertElement) {
                        var bootstrapAlert = new bootstrap.Alert(alertElement);
                        bootstrapAlert.close();
                    }
                }, 2500); 
            </script>
        @endif
        
        <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#ModalCreate">
            <i class="fa fa-plus"></i>
            LAPORAN BARU
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA</th>
                        <th>INSTANSI</th>
                        <th>NO HP</th>
                        <th>DIAGNOSA</th>
                        <th>KRONOLOGI</th>
                        <th>HASIL VERIFIKASI</th>
                        @if(auth()->user()->role === 'admin')
                        <th>TAMBAH HASIL VERIFIKASI</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($pelaporan as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->nip }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->instansi }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td>{{ $row->diagnosa }}</td>
                            <td>{{ $row->kronologi }}</td>
                            @if($row->surat_jaminan)
                                <td>
                                    <a href="/pelaporan/download/{{ $row->id }}/surat_jaminan" class="btn btn-primary" target="_blank">
                                        Hasil Verifikasi
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a href="#" class="btn btn-danger">
                                       Belum Ada Hasil Verifikasi
                                    </a>
                                </td>
                            @endif
                            @if(auth()->user()->role === 'admin')
                                <td>
                                    <button class="btn btn-warning"
                                        onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->kronologi }}', '{{ $row->surat_jaminan }}')"
                                        data-toggle="modal" data-target="#ModalCreate">
                                        <i class="fa fa-pencil-alt"></i>
                                        AKSI
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('pelaporan.modal.create')
@endsection
