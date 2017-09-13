<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <title>{{ $page_title or "Seguimiento" }}</title>
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
        <form action="{{ route('acceder') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-log-cont">
                <div class="form-log-header">
                    <img src="{{ asset("img/form-log-logo.png")}}" alt="">
                </div>
                <div class="form-log-body">
                    <input type="email" name="email" id="email" placeholder="Email" class="{{ $errors->has('email') ? 'error' : '' }}" value="{{ old('email') }}">
                    {!! $errors->first('email', '<span class="help-block"><b>:message</b></span>') !!}
                    <input type="password" name="password" id="password" placeholder="Contraseña" class="{{ $errors->has('password') ? 'error' : '' }}">
                    {!! $errors->first('password', '<span class="help-block"><b>:message</b></span>') !!}
                </div>
                <div class="form-log-footer">
                    <button type="submit" class="btn btn-light form-log-btn">Acceder</button>
                </div>
            </div>
        </form>
        <!-- REQUIRED JS SCRIPTS -->
        <script src="{{ asset ("js/app.js") }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset ("js/AdminLTE.min.js") }}" type="text/javascript"></script>
        <!-- Estilo del Sistema -->
        <script src="{{ asset ("js/seguimiento.js") }}"></script>
    </body>
</html>
