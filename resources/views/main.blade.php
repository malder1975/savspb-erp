<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="api-base-url" content="{{ config('app.url') . 'api' }}">


        <title>{{ config('app.name') }}</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
<body>
    <div id="app">
        <example-component></example-component>
    </div>

<script src="{{ asset('js/app1.js') }}"></script>
</body>
</html>
