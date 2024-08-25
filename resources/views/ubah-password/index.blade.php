@extends('layouts.app')

@section('title', 'Buat Akun Baru')

@section('content')
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

<body class="bg-gradient-primary">
    <div class="container centered-form ">
        <div class="row justify-content-center ">
             <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0 ">
                    <div class="col-lg-20"> <!-- Mengubah dari col-lg-7 ke col-lg-9 untuk menambah lebar -->
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Untuk Instansi!</h1>
                            </div>
                            <form class="user" method="POST" action="/ubah">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control " placeholder="Full Name" value="{{ $user->name }}" disabled>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control " placeholder="Email Address"  value="{{ $user->email }}"disabled>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control" placeholder="Password Baru" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="role" class="form-control"value="{{ $user->role }}" disabled>
                                            <option value="user">user</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                   Ubah Password
                                </button>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

@endsection