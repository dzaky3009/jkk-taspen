@extends('layouts.app')

@section('title', 'Data Claim')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="#" class="btn btn-warning mb-4" data-toggle="modal" data-target="#ModalCreate">
            <i class="fa fa-plus"></i>
            CLAIM BARU
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
                        <th>AKSI</th>
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
                            <td>
                                @if ($row->status == 'send')
                                    <button class="btn btn-warning">
                                        <i class="fas fa-check"></i>
                                        Diproses
                                    </button>
                                    @elseif  ($row->status == 'belum memenuhi syarat')
                                    <button class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                        BMS
                                    </button>
                                @elseif ($row->status == 'memenuhi syarat')
                                    <button class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                        MS
                                    </button>
         
                                
                                @else
                                    <span class="badge badge-secondary">UNKNOWN</span>
                                @endif
                            </td>
                            <TD>
                                <button class="btn btn-warning"
                                onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->tgl_kejadian }}', '{{ $row->fpp }}', '{{ $row->kwitansi }}', '{{ $row->taspen_3 }}','{{ $row->rincian_tagihan }}','{{ $row->resume_medis }}','{{ $row->bacaan_pemeriksaan_radiologi}}','{{ $row->salinan_laporan_operasi}}','{{ $row->surat_jaminan_jasa_raharja}}','{{ $row->surat_keterangan_platform_jasa_raharja}}','{{ $row->dokumen_pendukung_lainnya}}')"
                                data-toggle="modal" data-target="#ModalCreate">
                                <i class="fa fa-pencil-alt"></i>
                                AKSI
                            </button>
                            </TD>
                            {{-- <td>
                                @if($row->fpp)
                                    <a href="{{ route('claim.file', ['id' => $row->id, 'type' => 'fpp']) }}" target="_blank">Lihat FPP</a>
                                @endif
                                @if($row->kwitansi)
                                    <a href="{{ route('claim.file', ['id' => $row->id, 'type' => 'kwitansi']) }}" target="_blank">Lihat Kwitansi</a>
                                @endif
                                @if($row->taspen_3)
                                    <a href="{{ route('claim.file', ['id' => $row->id, 'type' => 'taspen_3']) }}" target="_blank">Lihat Taspen 3</a>
                                @endif
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('proses.modal.create')

@endsection
