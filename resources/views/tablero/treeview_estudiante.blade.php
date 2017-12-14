<li class="treeview menu-open">
    <a href="{{ route( 'perfil_estudiante' ) }}">
        <i class="fa fa-dashboard"></i><span>{{ $usuario->tipousuario->tipo_usuario }}</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route( 'perfil_estudiante' ) }}"><i class="fa fa-circle-o"></i>Perfil Estudiante</a></li>
        @if ( !$usuario->estudiante )
            <li><a href="{{ route( 'registro_curriculum' ) }}"><i class="fa fa-circle-o"></i>Regitrar Plan de Estudios</a></li>
        @endif
    </ul>
</li>
<li class="treeview menu-open">
    <a href="{{ route('aplicar_ofertas') }}">
        <i class="fa fa-address-card-o"></i><span>Ofertas</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>
    <ul class="treeview-menu">
        <li><a href="{{ route('aplicar_ofertas') }}"><i class="fa fa-circle-o"></i>Ver Ofertas</a></li>
    </ul>
</li>
