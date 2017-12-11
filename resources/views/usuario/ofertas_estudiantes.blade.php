@extends('layouts.admin_template')

@section('content')
    <form id="asignar-form" action="{{ route('asignar') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input value="{{ $oferta }}" name="oferta" hidden="true"/>
    @foreach ($estudiantes as $estudiane)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box box-selectable">
                <span class="info-box-icon bg-gray">
                    <img class="img-circle" src="{{ asset($estudiane->usuario->foto_usuario) }}" alt="User Image">
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ $estudiane->codigo_estudiante }}</span>
                    <span class="info-box-number"><a href="perfil_estudiante/{{ $estudiane->id_estudiante }}">{{ $estudiane->nombre_estudiante }} {{ $estudiane->apellido_estudiante }}</a></span>
                    @php $estudio = $estudiane->formacion_academica()->where('tipo_estudio_id', 5)->get(); @endphp
                    <small>{{ $estudio[0]->nombre_estudio }}</small>
                </div><!-- /.info-box-content -->
                <input type="checkbox" name="estudiante[]" value="{{ $estudiane->id_estudiante }}" hidden="true">
            </div><!-- /.info-box -->
        </div>
    @endforeach
        <button id="enviar" type="button" class="notifications-success messages-success">Enviar Oferta</button>
    </form>
@endsection
