<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap') * {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;

        }

        /* body {
            background-image: url('images/bg-01.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            overflow: hidden;
        } */

        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
            height: 100vh;
            /* Make sure body takes full viewport height */
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('images/bg-01.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            filter: blur(8px);
            /* Adjust the blur level as needed */
            z-index: -1;
            /* Ensure it is behind other content */
        }

        .container {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 100px;
        }
        
        .card-w-h {
            margin-top: 100px;
            width: 400px;
            height: 450px;
        }

        .card {
            background-color: #ffffffa4;
            padding: 25px 80px 25px 80px !important;
            border-radius: 4%;
            box-shadow: 3px 3px 1px 0px #00000070
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #976239;
        }

        .label-float input {
            width: 100%;
            padding: 5px 5px;
            display: inline-block;
            border: 0;
            border-bottom: 2px solid #976239;
            background-color: #E8F0FE;
            outline: none;
            min-width: 180px;
            font-size: 14px;
            transition: all .3s ease-out;
            border-radius: 0;

        }

        .label-float {
            position: relative;
            padding-top: 13px;
            margin-top: 5%;
            margin-bottom: 5%;
        }

        .label-float input:focus {
            border-bottom: 2px solid #41C9F1;

        }

        .label-float label {
            color: #976239;
            pointer-event: none;
            position: absolute;
            top: 0;
            left: 0;
            margin-top: 3px;
            transition: all .3s ease-out;
        }

        .label-float input:focus+label {
            font-size: 13px;
            margin-top: 0;
            color:
        }

        .button {
            background-color: transparent;
            border-color: transparent;
            color: #976239;
            padding: 7px;
            font-weight: bold;
            font-size: 12px;
            margin-top: 20px;
            border-radius: 4px;
            cursor: pointer;
            outline: none;
            transition: all .2s ease-out;
        }

        .button:hover {
            background-color: #976239;
            color: #fff;
        }

        .justify-center {
            display: flex;
            justify-content: center;
        }

        .hr {
            margin-top: 10%;
            margin-bottom: 10%;
            widht: 60%;
        }

        p {

            font-size: 12pt;
            /* margin-left: 50px !important; */
            margin-bottom: 0px !important;
            /* text-align: center !important; */

        }

        a {
            color: #976239;
            font-weight: 600;
            text-decoration: none;
            margin-left: 50px !important;
        }

        a:hover {
            color: #976239;

        }

        .button {
            width: 100%;
            background-color: transparent;
            border: 2px solid #976239;
            color: #976239;
            padding: 10px;
            font-weight: bold;
            font-size: 14px;
            margin-top: 30px;
            border-radius: 4px;
            cursor: pointer;
            transition: all .3s ease-out;
            text-transform: uppercase;
        }

        .button:hover {
            background-color: #976239;
            color: #fff;
        }

        @media (max-width: 768px) {
            .container {
                margin-top: 50px;
            }

            .card-w-h {
                width: 300px;
                height: auto;
            }

            .card {
                padding: 20px 40px !important;
            }

            h1 {
                font-size: 24px;
            }

            .label-float input {
                font-size: 12px;
            }

            .button {
                padding: 8px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin-top: 20px;
            }

            .card-w-h {
                width: 90%;
                height: auto;
            }

            .card {
                padding: 15px 20px !important;
            }

            h1 {
                font-size: 20px;
            }

            .label-float input {
                font-size: 10px;
            }

            .button {
                padding: 6px;
                font-size: 10px;
            }
        }
    </style>
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        @yield('content')
    </div>
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')

</body>

</html>
