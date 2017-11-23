<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="UTF-8">
        <title>{{ $page_title or config('app.name') }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- FavIcon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("img/favicon.png") }}">
        <!-- Style -->
        <link href="{{ asset("css/app.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset("css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("css/seguimiento.css") }}" rel="stylesheet" type="text/css" />
    </head>

    <body id="login">

        <!-- Your Page Content Here -->
        @yield('content')

        @if (session()->has('flash'))
            <div class="alert alert-info" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('flash') }}
            </div>
        @endif

        <!-- REQUIRED JS SCRIPTS -->
        <script src="{{ asset ("js/app.js") }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset ("js/AdminLTE.min.js") }}" type="text/javascript"></script>
        <!-- Estilo del Sistema -->
        <script src="{{ asset ("js/seguimiento.js") }}"></script>
    </body>

</html>
