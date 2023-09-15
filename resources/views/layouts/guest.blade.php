<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css?v=3.2.0">


    {{--  Firebase  --}}

    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

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

    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyCPSPgjsLLq_KmgBvE_xVyy_0BcVMHsM2w",
            authDomain: "notification-22b68.firebaseapp.com",
            projectId: "notification-22b68",
            storageBucket: "notification-22b68.appspot.com",
            messagingSenderId: "976012907275",
            appId: "1:976012907275:web:906433d0413d5d9de2880e"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);

        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging.requestPermission().then(function() {
                return messaging.getToken()
            }).then(function(token) {

                axios.post("{{ route('fcmToken') }}", {
                    _method: "PATCH",
                    token
                }).then(({
                    data
                }) => {
                    console.log(data)
                }).catch(({
                    response: {
                        data
                    }
                }) => {
                    console.error(data)
                })

            }).catch(function(err) {
                console.log(`Token Error :: ${err}`);
            });
        }

        initFirebaseMessagingRegistration();

        messaging.onMessage(function({
            data: {
                body,
                title
            }
        }) {
            new Notification(title, {
                body
            });
        });
    </script>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/firebase-messaging-sw.js')
                .then(function(registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                })
                .catch(function(error) {
                    console.error('Service Worker registration failed:', error);
                });
        }
    </script>


    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        // Define a variable to store the previous nilai value and status
        let previousNilai = null;
        let previousStatus = '';

        // Define a function to fetch data
        function fetchData() {
            $.ajax({
                type: "GET",
                url: '{{ route('getSingleSensor') }}',
                dataType: "json",
                success: function(response) {
                    // Update your UI with the new data here
                    let nilai = response.distance;
                    let status = response.status;

                    console.log('Fetched nilai:', nilai);
                    console.log('Fetched status:', status);

                    // Compare the fetched nilai with the previous nilai and status
                    if (previousNilai !== null && previousNilai !== nilai && previousStatus !== '' &&
                        status === 'Bahaya') {
                        // The nilai has changed since the last fetch, and the status is now 'Bahaya'
                        console.log('Nilai has changed and is now "Bahaya"!');

                        // Send a POST request to the notification route
                        $.ajax({
                            type: "POST",
                            url: '{{ route('notification') }}',
                            dataType: "json",

                        });
                    }

                    // Store the current nilai and status as the previous nilai and status
                    previousNilai = nilai;
                    previousStatus = status;
                },
                error: function(error) {
                    // Handle any errors that occur during the GET request
                    console.error('Error fetching data:', error);
                }
            });
        }

        // Call fetchData initially
        fetchData();

        // Set up an interval to fetch data every 5 seconds (adjust the interval as needed)
        const interval = 5000; // 5 seconds
        setInterval(fetchData, interval);
    </script>
</body>

</html>
