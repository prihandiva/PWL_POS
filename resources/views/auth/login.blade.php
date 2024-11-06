<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pengguna - Webss Kitchen</title>
    <!-- Google Font: Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            background-image: url('{{ asset('images/background.png') }}');
             
        }

        .login-box {
            width: 400px;
        }

        .login-box .card {
            border-radius: 10px;
            background-color: #3D5A80; /* Warna navy lebih terang */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .login-box .card-header {
            background-color: #FAF3E0; /* Warna coklat */
            border-bottom: none;
            text-align: center;
            color: #FAF3E0; /* Cream */
        }

        .login-box .card-header .h1 {
            font-size: 32px;
            font-weight: bold;
            color: #563C5C;
        }

        .login-box .card-body {
            color: #FAF3E0; /* Cream */
        }

        .input-group-text {
            background-color: #563C5C; /* Warna coklat */
            border: none;
            color: #FFF;
        }

        .form-control {
            background-color: #E0FBFC; /* Warna biru muda */
            border: none;
            color: #01153E;
        }

        .form-control:focus {
            background-color: #E0FBFC;
            border-color: #563C5C; /* Border coklat saat fokus */
        }

        .btn-primary {
            background-color: #E0FBFC;
            border-color: #563C5C;
            color: #563C5C;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-primary:hover {
            background-color: #FF9673; /* Warna coklat lebih terang */
            transform: scale(1.05);
        }

        .icheck-primary input[type="checkbox"]:checked + label::before {
            background-color: #563C5C; /* Warna coklat untuk checkbox */
        }

        a {
            color: #563C5C; /* Warna coklat untuk link */
        }

        a:hover {
            color: #FF9673; /* Warna coklat lebih terang saat hover */
        }

        .error-text {
            color: #FFB5A1; /* Warna merah muda untuk pesan error */
        }

        .login-box-msg {
            color: #FAF3E0 /* Cream untuk teks */
            font-size: 18px;
        }

        .login-page {
            background-color: #01153E; /* Dark navy background */
        }

        .login-box .card-body {
            padding: 30px;
        }

        .login-box .btn-block {
            padding: 10px 0;
        }
        .h1{
            color: #01153E;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="{{ url('/') }}" class="h1"><b>🍴 Webss </b>Kitchen 🍴</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ url('login') }}" method="POST" id="form-login">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <p>Don't have an account? <a href="{{ url('register') }}">Register!</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $("#form-login").validate({
                rules: {
                    username: { required: true, minlength: 4, maxlength: 20 },
                    password: { required: true, minlength: 6, maxlength: 20 }
                },
                submitHandler: function (form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function (response) {
                            if (response.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                }).then(function () {
                                    window.location = response.redirect;
                                });
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function (prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>