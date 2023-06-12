<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
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
    @yield('content')


    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>

    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
</body>

</html>
