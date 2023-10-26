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
        <div class="container-fluid bg-light">
            @include('admin.layout.partial.header')
            <div class="row ">
                <div class="col-auto bg-secondary-subtle pt-3">
                    @include('admin.layout.partial.sidebar')
                </div>
                <div class="col p-3">
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </div>

        <script src="{{ asset('/js/bootstrap_5.3.2.min.js') }}"></script>
        @yield('script')
    </body>
</html>
