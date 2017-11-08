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
                    <li class="treeview menu-open">
                        <a href="{{ route( 'inicio' ) }}">
                            <i class="fa fa-dashboard"></i><span>Tablero</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            @if ($usuario->tipo_usuario_id == 3)
                                <li><a href="{{ route( 'registro_curriculum' ) }}"><i class="fa fa-circle-o"></i>Regitrar Plan de Estudio</a></li>
                            @endif
                            @if ($usuario->tipo_usuario_id == 4)
                                <li><a href="{{ route( 'registro_entidad' ) }}"><i class="fa fa-circle-o"></i>Regitrar Entidad de Empresa</a></li>
                            @endif
                            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Layout Options</span>
                            <span class="pull-right-container">
                                <span class="label label-primary pull-right">4</span>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->

    </section>
    <!-- /.sidebar -->

</aside>
