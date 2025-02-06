<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>

        :root {
            --primary: rgb(0, 156, 255);
            --light: #F3F6F9;
            --dark: #191C24;
            --success: #28a745;
        }


        *
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .col-lg-6.d-flex.align-items-center.gradient-custom-2 {
            background-color: blue;
        }

        .loginFormLeftDiv
        {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        .loginFormDiv
        {
            width: 30%;
            border-radius: 10px;
            background-color: white;
            padding: 60px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 50px 2px black;
        }
        label{
            color: black;
            font-size: 15px;
            font-weight: 500;
        }

        input
        {
            border: 1px solid var(--primary) !important;
            border-radius: 3px !important;
            padding: 10px !important;
            width: 100% !important;
            margin-bottom: 10px !important;
            color: black !important;
            font-weight: 500 !important;
        }
        .loginFormDiv img{
            height: 80px;
            width: auto;
        }

        .submitButtonDiv input
        {
            background-color: var(--primary) !important;
            color: white !important;
            font-weight: 500 !important;
            font-size: 20px !important;
            margin-top: 10px !important;
            transition:  0.5s !important;
        }
        .submitButtonDiv a
        {
            color: var(--primary) !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            transition:  0.5s !important;

        }
        .submitButtonDiv a:hover
        {
            color: var(--dark) !important;
        }
        .submitButtonDiv input:hover
        {
            background-color: var(--dark) !important;
        }

        @media (max-width: 1400px) {
            .loginFormDiv
            {
                width: 50%;
            }
        }
        @media (max-width: 992px) {
            .loginFormDiv {
                width: 60%;
            }
        }

        @media (max-width: 768px) {
            .loginFormDiv
            {
                width: 100%;
            }
            .loginFormDiv img{
                height: 60px;
                width: auto;
            }
        }

    </style>
</head>
<body style="overflow: hidden">
    @yield('content')
</body>
</html>
