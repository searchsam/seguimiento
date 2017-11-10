<li class="treeview menu-open">
    <a href="{{ route( 'inicio' ) }}">
        <i class="fa fa-dashboard"></i><span>{{ $usuario->tipousuario->tipo_usuario }}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route( 'registro_entidad' ) }}"><i class="fa fa-circle-o"></i>Regitrar Entidad de Empresa</a></li>
    </ul>
</li>
<li class="treeview menu-open">
    <a href="#">
        <i class="fa fa-sticky-note"></i><span>Ofertas</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="#"><i class="fa fa-circle-o"></i>Ver Ofertas</a></li>
        <li><a href="#"><i class="fa fa-circle-o"></i>Generar Oferta</a></li>
    </ul>
</li>
