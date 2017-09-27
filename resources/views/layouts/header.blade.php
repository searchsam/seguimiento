<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><h1>SEGUIMIENTO</h1></span>
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="{{ asset('img/s.png') }}"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @php
                    $flags = array();
                    $bells = array();

                    if ( count( auth()->user()->unreadNotifications ) )
                    {
                        foreach (auth()->user()->unreadNotifications as $notificacion)
                        {
                            if ( str_is($notificacion->data['tipo'], 'flag') )
                            {
                                $flags[] = $notificacion;
                            }
                            else
                            {
                                $bells[] = $notificacion;
                            }
                        }
                    }
                    else
                    {
                        $flags = NULL;
                        $bells = NULL;
                    }
                @endphp

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">

                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    @if ( !is_null( $bells ) )
                            <i class="fa fa-bell"></i>
                        <span class="label notifications-warning">{{ count( $bells ) }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">Tienes {{ count( $bells ) }} notificaciones.</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                @foreach ( $bells as $bell )
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-circle messages-warning"></i>{{ $bell->data['text'] }}
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                @endforeach
                            </ul>
                        </li>
                        <!-- li class="footer"><a href="#">View all</a></li -->
                    </ul>
                    @else
                        <i class="fa fa-bell-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">No tienes notificaciones.</li>
                    </ul>
                    @endif
                </li>

                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">

                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    @if ( !is_null( $flags ) )
                            <i class="fa fa-flag"></i>
                        <span class="label notifications-error">{{ count( $flags ) }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="header">Tienes {{ count( $flags ) }} tareas pendientes.</li>

                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                @foreach ( $flags as $flag )
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-circle messages-error"></i>{{ $flag->data['text'] }}
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                @endforeach
                            </ul>
                        </li>
                        <!-- li class="footer"><a href="#">View all tasks</a></li -->
                    </ul>
                    @else
                        <i class="fa fa-flag-o"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">No tienes tareas pendientes.</li>
                    </ul>
                    @endif
                </li>

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">

                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset($usuario->foto_usuario) }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }}</span>
                    </a>

                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset($usuario->foto_usuario) }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }} <br> {{ $usuario->tipousuario->tipo_usuario }}
                            </p>
                        </li>

                        <!-- Menu Body -->
                        <!-- li class="user-body">

                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>

                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>

                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>

                            </div>
                            <!-- /.row -->
                        <!-- /li>

                        <!-- Menu Footer -->
                        <li class="user-footer">

                            <div class="pull-left">
                                <a href="{{ route('perfil') }}" class="btn btn-default btn-flat">Perfil</a>
                            </div>

                            <div class="pull-right">
                                <form action="{{ route('salir') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-default btn-flat">Salir</button>
                                </form>
                            </div>

                        </li>
                    </ul>
                </li>

                <!-- Control Sidebar Toggle Button -->
                @if ($usuario->tipo_usuario_id == 1)
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
