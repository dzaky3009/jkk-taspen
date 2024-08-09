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
                                @if ($row->status == 'send')
                                    <button class="btn btn-success">
                                        <i class="fas fa-check"></i>
                                        Send
                                    </button>
                                @elseif ($row->status == 'draft')
                                    <button class="btn btn-warning"
                                        onclick="editDraft('{{ $row->id }}', '{{ $row->nip }}', '{{ $row->nama }}', '{{ $row->instansi }}', '{{ $row->no_hp }}', '{{ $row->diagnosa }}', '{{ $row->tgl_kejadian }}')"
                                        data-toggle="modal" data-target="#ModalCreate">
                                        <i class="fa fa-pencil-alt"></i>
                                        DRAFT
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