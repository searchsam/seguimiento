<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">

            <div class="pull-left image">
                <img src="{{ asset($usuario->foto_usuario) }}" class="img-circle" alt="User Image" />
            </div>

            <div class="pull-left info">
                @php
                    $user_name = explode(" ", $usuario->nombre_usuario);
                @endphp
                <p>{{ strtolower($user_name[0]) }}</p>

                <!-- Status -->
                <!-- a href="#"><i class="fa fa-circle text-success"></i> Online</a -->
            </div>

        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="header">NAVEGACIÓN PRINCIPAL</li>
                    @switch($usuario->tipo_usuario_id)
                        @case(2)
                            @include('usuario.treeview_usuario')
                            @break

                        @case(3)
                            @include('tablero.treeview_estudiante')
                            @break

                        @case(4)
                            @include('tablero.treeview_empresa')
                            @break
                    @endswitch
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->

</aside>
