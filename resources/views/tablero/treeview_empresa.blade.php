<li class="treeview menu-open">
    <a href="{{ route( 'perfil_empresa' ) }}">
        <i class="fa fa-dashboard"></i><span>{{ $usuario->tipousuario->tipo_usuario }}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route( 'perfil_empresa' ) }}"><i class="fa fa-circle-o"></i>Perfil Empresa</a></li>
        <li><a href="{{ route( 'registro_entidad' ) }}"><i class="fa fa-circle-o"></i>Regitrar Entidad de Empresa</a></li>
    </ul>
</li>
<li class="treeview menu-open">
    <a href="{{ route('ofertas') }}">
        <i class="fa fa-sticky-note"></i><span>Ofertas</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('ofertas') }}"><i class="fa fa-circle-o"></i>Ver Ofertas</a></li>
        <li><a href="{{ route('registro_oferta') }}"><i class="fa fa-circle-o"></i>Generar Oferta</a></li>
    </ul>
</li>
