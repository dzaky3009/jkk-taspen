@extends('layouts.app')

@section('title', 'Detail User')

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
                        <th>AKSI</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($user as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->role }}</td>
                            <td>
                                <a href="/detail/{{ $row->id }}" class="btn btn-warning">
                                    <i class="fa fa-pencil-alt"></i> AKSI
                                </a>
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
