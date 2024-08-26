@extends('layouts.app')

@section('title', $judul)

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        {{-- <a href="#" class="btn btn-warning mb-4" data-toggle="modal" data-target="#ModalCreate">
            <i class="fa fa-plus"></i>
            CLAIM BARU
        </a> --}}
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
                        <th>Catatan</th>
                        <th>STATUS</th>
                        @if(auth()->user()->role === 'admin')
                            <th>AKSI</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($proses as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->nip }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->instansi }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td>{{ $row->diagnosa }}</td>
                            <td>{{ $row->tgl_kejadian }}</td>
                            <td>{{ $row->note }}</td>
                            <td>
                                @if ($row->status == 'send')
                                    <button class="btn btn-info">
                                        {{-- <i class="fas fa-check"></i> --}}
                                        Dalam Proses
                                    </button>
                                @elseif ($row->status == 'belum memenuhi syarat')
                                    <button class="btn" style="background-color:orange ;color:white"
                                    onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->tgl_kejadian }}', '{{ $row->note }}', '{{ $row->surat_jaminan }}', '{{ $row->fpp }}', '{{ $row->kwitansi }}', '{{ $row->taspen_3 }}','{{ $row->rincian_tagihan }}','{{ $row->resume_medis }}','{{ $row->bacaan_pemeriksaan_radiologi}}','{{ $row->salinan_laporan_operasi}}','{{ $row->surat_jaminan_jasa_raharja}}','{{ $row->surat_keterangan_platform_jasa_raharja}}','{{ $row->dokumen_pendukung_lainnya }}')"
                                    data-toggle="modal" data-target="#ModalCreate">
                                        <i class="fa fa-times"></i>
                                    BMS
                                </button>
                                @elseif ($row->status == 'memenuhi syarat')
                                    <button class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                        MS
                                    </button>   
                                @elseif ($row->status == 'tidak memenuhi syarat')
                                    <button class="btn btn-danger" 
                                    onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->tgl_kejadian }}', '{{ $row->note }}', '{{ $row->surat_jaminan }}', '{{ $row->fpp }}', '{{ $row->kwitansi }}', '{{ $row->taspen_3 }}','{{ $row->rincian_tagihan }}','{{ $row->resume_medis }}','{{ $row->bacaan_pemeriksaan_radiologi}}','{{ $row->salinan_laporan_operasi}}','{{ $row->surat_jaminan_jasa_raharja}}','{{ $row->surat_keterangan_platform_jasa_raharja}}','{{ $row->dokumen_pendukung_lainnya }}')"
                                    data-toggle="modal" data-target="#ModalCreate">
                                        
                                        <i class="fa fa-times"></i>
                                        TMS
                                    </button>   
                                @else
                                    <span class="badge badge-secondary">UNKNOWN</span>
                                @endif
                            </td>
                            @if(auth()->user()->role === 'admin')
                            <td>
                                <button class="btn btn-warning"
                                    onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->tgl_kejadian }}', '{{ $row->note }}', '{{ $row->surat_jaminan }}', '{{ $row->fpp }}', '{{ $row->kwitansi }}', '{{ $row->taspen_3 }}','{{ $row->rincian_tagihan }}','{{ $row->resume_medis }}','{{ $row->bacaan_pemeriksaan_radiologi}}','{{ $row->salinan_laporan_operasi}}','{{ $row->surat_jaminan_jasa_raharja}}','{{ $row->surat_keterangan_platform_jasa_raharja}}','{{ $row->dokumen_pendukung_lainnya }}')"
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

@include('proses.modal.create')

@endsection
