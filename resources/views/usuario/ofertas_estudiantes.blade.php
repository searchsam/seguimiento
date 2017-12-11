@extends('layouts.admin_template')

@section('content')
    <form id="asignar-form" action="{{ route('asignar') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input value="{{ $oferta }}" name="oferta" hidden="true"/>
    @foreach ($estudiantes as $estudiante)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box box-selectable">
                <span class="info-box-icon bg-gray">
                    <img class="img-circle" src="{{ asset($estudiante->usuario->foto_usuario) }}" alt="User Image">
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ $estudiante->codigo_estudiante }}</span>
                    <span class="info-box-number"><a href="{{ route('estudiante_perfil', ['estudiante' => $estudiante->id_estudiante]) }}">{{ $estudiante->nombre_estudiante }} {{ $estudiante->apellido_estudiante }}</a></span>
                    @php $estudio = $estudiante->formacion_academica()->where('tipo_estudio_id', 5)->get(); @endphp
                    @foreach ($carreras as $carrera)
                        @if (strcmp($carrera->id_carrera, $estudio[0]->nombre_estudio) == 0)
                            <small>{{ $carrera->nombre_carrera }}</small>
                        @endif
                    @endforeach
                </div><!-- /.info-box-content -->
                <input type="checkbox" name="estudiante[]" value="{{ $estudiante->id_estudiante }}" hidden="true">
            </div><!-- /.info-box -->
        </div>
    @endforeach
        <button id="enviar" type="button" class="notifications-success messages-success">Enviar Oferta</button>
    </form>
@endsection
