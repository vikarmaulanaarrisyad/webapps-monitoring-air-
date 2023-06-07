<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | @yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css?v=3.2.0">

    <style>
        .login-page,
        .register-page {
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            height: 100vh;
            -ms-flex-pack: center;
            justify-content: center;
            background-color: #EBEDEF;
        }

        @media screen and (max-width: 600px) {

            .login-page,
            .register-page {
                -ms-flex-align: center;
                align-items: center;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column;
                height: 50vh;
                -ms-flex-pack: center;
                justify-content: center;
                background-color: #EBEDEF;
            }

            .login-logo a {
                font-size: 20px;
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="login-logo">
                    <a href="javascript:void(0)"><b>Aplikasi Monitoring </b>Muara</a>
                </div>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan inputkan email dan password yang benar.</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                            placeholder="Email" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror " placeholder="Password"
                            autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>

                    </div>
                </form>
                <p class="mb-0 mt-2">
                <p class="text-muted">belum punya akun? silahkan register <a class="text-muted"
                        href="">disini</a></p>
                </p>
            </div>

        </div>
    </div>


    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>

    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
