@extends('layouts.app')

@section('title', 'Data Claim')

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

@elseif (session('gagal'))

<div id="dangerAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('gagal') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="false">&times;</span>
    </button>
</div>
<script>
    setTimeout(function() {
        var alertElement = document.getElementById('dangerAlert');
        if (alertElement) {
            var bootstrapAlert = new bootstrap.Alert(alertElement);
            bootstrapAlert.close();
        }
    }, 2500); 
</script>
        @endif

        <a href="#" class="btn btn-warning mb-4" data-toggle="modal" data-target="#ModalCreate">
            <i class="fa fa-plus"></i>
            CLAIM 
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
                        <th>TGL.KEJADIAN</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($claim as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->nip }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->instansi }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td>{{ $row->diagnosa }}</td>
                            <td>{{ $row->tgl_kejadian }}</td>
                            <td>
                                @if ($row->status == 'draft')
                                    <button class="btn btn-warning"
                                        onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->tgl_kejadian }}', '{{ $row->surat_jaminan }}', '{{ $row->fpp }}', '{{ $row->kwitansi }}', '{{ $row->taspen_3 }}', '{{ $row->rincian_tagihan }}', '{{ $row->resume_medis }}', '{{ $row->bacaan_pemeriksaan_radiologi }}', '{{ $row->salinan_laporan_operasi }}', '{{ $row->surat_jaminan_jasa_raharja }}', '{{ $row->surat_keterangan_platform_jasa_raharja }}', '{{ $row->dokumen_pendukung_lainnya }}')"
                                        data-toggle="modal" data-target="#ModalCreate">
                                        <i class="fa fa-pencil-alt"></i>
                                        Draft
                                    </button>
                                @elseif ($row->status == 'belum memenuhi syarat')
                                    <button class="btn" style="background-color: orange; color:white"
                                        onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->tgl_kejadian }}', '{{ $row->note }}', '{{ $row->surat_jaminan }}', '{{ $row->fpp }}', '{{ $row->kwitansi }}', '{{ $row->taspen_3 }}', '{{ $row->rincian_tagihan }}', '{{ $row->resume_medis }}', '{{ $row->bacaan_pemeriksaan_radiologi }}', '{{ $row->salinan_laporan_operasi }}', '{{ $row->surat_jaminan_jasa_raharja }}', '{{ $row->surat_keterangan_platform_jasa_raharja }}', '{{ $row->dokumen_pendukung_lainnya }}')"
                                        data-toggle="modal" data-target="#ModalCreate">
                                        <i class="fa fa-times"></i>
                                        Belum Memenuhi Syarat
                                    </button>
                                @elseif ($row->status == 'tidak memenuhi syarat')
                                    <button class="btn btn-danger">
                                        <i class="fas fa-times"></i>
                                    Tidak Memenuhi Syarat
                                    </button>
                                @elseif ($row->status == 'send')
                                    <button class="btn btn-info">
                                        <i class="fas fa-check"></i>
                                    Dalam Proses
                                    </button>
                                @elseif ($row->status != 'draft')
                                    <button class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        Memenuhi Syarat
                                    </button>
                            
                                @else
                                    <span class="badge badge-secondary">UNKNOWN</span>
                                @endif
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('claim.modal.create')

@endsection
