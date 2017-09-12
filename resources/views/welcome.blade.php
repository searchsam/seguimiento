<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <title>{{ $page_title or "Seguimiento" }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("img/favicon.png") }}">

        <link href="{{ asset("css/app.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("css/seguimiento.css") }}" rel="stylesheet" type="text/css" />
    </head>
    <body id="login">
        <form action="" method="POST" class="">
            <div class="form-log-cont">
                <div class="form-log-header">
                    <img src="{{ asset("img/form-log-logo.png")}}" alt="">
                </div>
                <div class="form-log-body">
                    <input type="text" name="user" id="user" placeholder="Usuario">
                    <input type="password" name="password" id="password" placeholder="Contraseña">
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
