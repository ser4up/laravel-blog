<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!--link rel="stylesheet" href="main.css"-->
        <link href="{{ asset('/css/bootstrap_5.3.2.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container vh-100" style="margin-bottom: -120px;">
            @include('front.layout.partial.header')
            @yield('content')
        </div>
        @include('front.layout.partial.footer')

        <script src="{{ asset('/js/bootstrap_5.3.2.min.js') }}"></script>
    </body>
</html>
