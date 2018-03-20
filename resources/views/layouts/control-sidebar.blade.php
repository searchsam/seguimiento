<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">

    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-home-tab">

            <h3 class="control-sidebar-heading">Usuarios</h3>

            <ul class="control-sidebar-menu">
                @foreach ($usuarios as $usuario)
                    @if ($usuario->id_usuario > 1)
                    @php
                        $activo = '';
                        if (session()->has('flash_user'))
                        {
                            if(session('flash_user')->id_usuario == $usuario->id_usuario)
                            {
                                $activo = 'selected';
                            }
                        }
                    @endphp
                    <li data="{{ $usuario->id_usuario }}" class="{{ $activo }}">
                        <a href="#">
                            <div class="user-block">
                                <img class="img-circle" src="{{ asset($usuario->foto_usuario) }}" alt="User Image">
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">{{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }}</h4>
                                    <p>{{ $usuario->tipousuario->tipo_usuario }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endif
                @endforeach
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>

            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:;">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="pull-right-container">
                                <span class="label label-danger pull-right">70%</span>
                            </span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->

        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->

        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">

                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <!-- /.form-group -->

            </form>
        </div>
        <!-- /.tab-pane -->

    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
