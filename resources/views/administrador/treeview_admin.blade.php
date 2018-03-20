<li class="treeview menu-open">
    <a href="{{ route( 'perfil_usuario' ) }}">
        <i class="fa fa-dashboard"></i><span>{{ $usuario->tipousuario->tipo_usuario }}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route( 'perfil_usuario' ) }}"><i class="fa fa-circle-o"></i>Perfil Administrador</a></li>
        <li><a href="{{ route( 'registro_usuario' ) }}"><i class="fa fa-circle-o"></i>Regitrar Administrador</a></li>
    </ul>
</li>
<li class="treeview menu-open">
    <a href="{{ route( 'perfil_estudiante' ) }}">
        <i class="fa fa-graduation-cap"></i><span>Estudiante</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route( 'perfil_estudiante' ) }}"><i class="fa fa-circle-o"></i>Perfil Estudiante</a></li>
        <li><a href="{{ route( 'registro_curriculum' ) }}"><i class="fa fa-circle-o"></i>Regitrar Plan de Estudios</a></li>
    </ul>
</li>
<li class="treeview menu-open">
    <a href="{{ route( 'perfil_empresa' ) }}">
        <i class="fa fa-briefcase"></i><span>Empresa</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route( 'perfil_empresa' ) }}"><i class="fa fa-circle-o"></i>Perfil Empresa</a></li>
        <li><a href="{{ route( 'registro_entidad' ) }}"><i class="fa fa-circle-o"></i>Regitrar Entidad de Empresa</a></li>
    </ul>
</li>
<li class="treeview menu-open">
    <a href="{{ route('ver_ofertas') }}">
        <i class="fa fa-address-card"></i><span>Ofertas</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('ver_ofertas') }}"><i class="fa fa-circle-o"></i>Ver Ofertas</a></li>
        <li><a href="{{ route('registro_oferta') }}"><i class="fa fa-circle-o"></i>Generar Oferta</a></li>
        <li><a href="{{ route('historial_oferta') }}"><i class="fa fa-circle-o"></i>Historial de Ofertas</a></li>
    </ul>
</li>
