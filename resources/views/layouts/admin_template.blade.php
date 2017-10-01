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
        <link href="{{ asset("css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!--
        AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("css/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Estilos de Seguimiento -->
        <link href="{{ asset("css/seguimiento.css") }}" rel="stylesheet" type="text/css" />
    </head>

    <body class="hold-transition skin-blue fixed sidebar-collapse sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <!-- Header -->
            @include('layouts/header')

            <!-- Sidebar -->
            @include('layouts/sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        {{ $page_title or "Page Title" }}
                        <small>{{ $page_description or null }}</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Your Page Content Here -->
                    @yield('content')

                </section><!-- /.content -->

            </div><!-- /.content-wrapper -->

            <!-- Footer -->
            @include('layouts/footer')

            <!-- Header -->
            @include('layouts/control-sidebar')

        </div><!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->
        <script src="{{ asset("js/app.js") }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset("js/slimscroll.min.js") }}"></script>
        <!-- FastClick -->
        <script src="{{ asset("js/fastclick.js") }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset("js/AdminLTE.min.js") }}"></script>
        <!-- Estilo de Seguimiento -->
        <script src="{{ asset("js/seguimiento.js") }}"></script>
    </body>

</html>
