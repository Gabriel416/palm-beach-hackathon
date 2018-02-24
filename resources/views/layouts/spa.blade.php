<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
            background-color: black;
            background-image: url("/images/Rectangle.png");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div id="app">
        <div class="flex-center position-ref full-height">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
Ï