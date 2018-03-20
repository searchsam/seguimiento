@extends('layouts.admin_template')

@section('content')
    <div class='row'>
        @foreach ($estudiantes as $estudiante)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-gray thumbnail">
                        <img class="img-circle text-center center-block" src="{{ asset($estudiante->usuario->foto_usuario) }}" alt="User Image">
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $estudiante->codigo_estudiante }}</span>
                        {{-- <span class="info-box-number">{{ $estudiante->nombre_estudiante }} {{ $estudiante->apellido_estudiante }}</span> --}}
                        <span class="info-box-number"><a href="{{ route('estudiante_perfil', ['estudiante' => $estudiante->id_estudiante]) }}">{{ $estudiante->nombre_estudiante }} {{ $estudiante->apellido_estudiante }}</a></span>
                        @php $estudio = $estudiante->formacion_academica()->where('tipo_estudio_id', 5)->get(); @endphp
                        @foreach ($carreras as $carrera)
                            @if (strcmp($carrera->id_carrera, $estudio[0]->nombre_estudio) == 0)
                                <small>{{ $carrera->nombre_carrera }}</small>
                            @endif
                        @endforeach
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
        @endforeach
    </div><!-- /.row -->

    <!-- template for the modal component -->
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header widget-user-header bg-black" style="background: url(<?php echo asset($usuario->foto_usuario); ?>) center center; height: 128px;"></div>

                        <div class="modal-body warning">
                            <slot name="header">Contacto <slot name="sub-header">Empresa</slot></slot>
                            <slot name="body">Descriptcion de la Oferta</slot>
                            <div class="row">
                                <div class="col col-md-6">
                                    <slot name="color"></slot>
                                    <slot name="state">Estado de la Oferta</slot>
                                </div>
                                <div class="col col-md-6 right" style="float: right;">
                                    <slot name="limit"></slot>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Likes</span>
                                            <span class="info-box-number">41,410</span>
                                        </div><!-- /.info-box-content -->
                                    </div><!-- /.info-box -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </transition>
    </script>
@endsection
