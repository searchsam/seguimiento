<li class="treeview menu-open">
    <a href="{{ route( 'perfil_usuario' ) }}">
        <i class="fa fa-dashboard"></i><span>{{ $usuario->tipousuario->tipo_usuario }}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route( 'perfil_usuario' ) }}"><i class="fa fa-circle-o"></i>Perfil Usuario</a></li>
        <li><a href="{{ route( 'registro_usuario' ) }}"><i class="fa fa-circle-o"></i>Regitrar Usuario</a></li>
    </ul>
</li>
<li class="treeview menu-open">
    <a href="{{ route('ver_ofertas') }}">
        <i class="fa fa-address-card-o"></i><span>Ofertas</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('ver_ofertas') }}"><i class="fa fa-circle-o"></i>Ver Ofertas</a></li>
        <li><a href="{{ route('registro_oferta') }}"><i class="fa fa-circle-o"></i>Generar Oferta</a></li>
        <li><a href="{{ route('historial_oferta') }}"><i class="fa fa-circle-o"></i>Historial de Ofertas</a></li>
    </ul>
</li>
