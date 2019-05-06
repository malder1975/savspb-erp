<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="windows-1251">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Система компании САВ') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i,900,900i&amp;subset=cyrillic" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <App></App>
        </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>

