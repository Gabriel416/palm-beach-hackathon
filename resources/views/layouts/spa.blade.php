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
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: normal;
            height: 100%;
            overflow-y: auto !important;
            margin: 0;
        }

        .full-height {
            min-height: 100%;
            background-color: black;
            background-image: url("/images/Rectangle.png");
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #app {
            height: 100%;
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

    @include ('footer')
</body>
</html>