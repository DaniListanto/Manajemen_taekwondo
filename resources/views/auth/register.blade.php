<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPP | Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templates/backend/AdminLTE-3.1.0') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box" style="margin-bottom: 20vh;">
        <div class="login-logo">
            <a href=""><b>Taekwondo Bumiaji</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <h3 class="login-box-msg">Silahkan Registrasi</h3>
                <h5>Pemberitahuan!</h5>
                <p>Password default SISTEM INI adalah : <b style="color:red;">bumiaji</b></p>
                @error('username')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <form role="form" method="post" action="register/store" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Peserta</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Peserta"
                                name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputPassword1"
                                placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputPassword1"
                                placeholder="Email">
                        </div>



                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('templates/backend/AdminLTE-3.1.0') }}/dist/js/adminlte.min.js"></script>
</body>

</html>