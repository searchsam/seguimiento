@extends('layouts.admin_template')

@section('content')
    <div class='row'>
        @foreach ($empresas as $empresa)
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue" style="background: url('{{ asset($empresa->usuario->foto_usuario) }}') repeat scroll center center; height: 128px;">
                    <div class="inner">
                        <h3>{{ $empresa->nombre_empresa }}</h3>
                        <p>{{ $empresa->direccion_empresa }}</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-briefcase"></i>
                    </div>
                    <a href="{{ route('empresa_perfil', ['empresa' => $empresa->id_empresa]) }}" class="small-box-footer">
                        Mas informaci&oacute;n <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div><!-- /.row -->
@endsection