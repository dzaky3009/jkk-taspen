@extends('layouts.app')

@section('title','Data Pelaporan')

@section('content')
<div class="card shadow mb-4">
    <div class="card-body">
        <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#ModalCreate">
            <i class="fa fa-plus">    
            </i>
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
                        <th>SURAT JAMIMAN</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($pelaporan as $row)
                        <tr>
                            <th>{{  $no++ }}</th>
                            <td>{{  $row->nip }}</td>
                            <td>{{  $row->nama }}</td>
                            <td>{{  $row->instansi }}</td>
                            <td>{{  $row->no_hp }}</td>
                            <td>{{  $row->diagnosa }}</td>
                            <td>{{  $row->kronologi }}</td>
                            <td>
                                <a href="#" class="btn btn-primary">Surat Jaminan</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('pelaporan.modal.create')
@endsection