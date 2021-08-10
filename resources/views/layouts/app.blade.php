<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @laravelPWA
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <script type="text/javascript" src="{{ asset('/idb.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/idb-open.js') }}"></script>
    </head>
    <body>
        <div id="main">
            @yield('content')
        </div> 
        <script src="{{ asset('/js/app.js') }}" defer></script> 
        @yield('script')      
    </body>
</html>
