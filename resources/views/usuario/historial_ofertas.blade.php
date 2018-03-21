@extends('layouts.admin_template')

@section('content')
    @php use Carbon\Carbon; @endphp
    <div class='row'>
        <div class="col-md-12">
            <div class="box box-primary">

                <!-- /.box-header -->
                <div class="box-body">

                    <ul class="timeline timeline-inverse">
                    @foreach ($ofertas as $oferta)
                        @php
                            $update = new Carbon($oferta->fecha_registro_oferta);
                        @endphp
                        @if ($loop->first)
                            @php $carbon = $update; @endphp
                            <li class="time-label"><span class="bg-purple">{{ $update->toFormattedDateString() }}</span></li><!-- /.timeline-label -->
                        @else
                            @if ( !$update->isSameDay($carbon) )
                                @php $carbon = $update; @endphp
                                <li class="time-label"><span class="bg-purple">{{ $update->toFormattedDateString() }}</span></li><!-- /.timeline-label -->
                            @endif
                        @endif

                        <li>
                            <img class="img-circle" src="{{ asset($oferta->empresa->usuario->foto_usuario) }}" alt="User Image" style="height: 75px;">
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> {{ $update->format('h:i A') }}</span>
                                <h2 class="timeline-header no-border" style="font-size:25px;">{{ $oferta->descripcion_oferta }}</h2>
                                <hr style="color: white; height:2px;">
                                @foreach ($oferta->asignacion()->get() as $asignacion)
                                    @if (count($asignacion) > 1)
                                        @foreach ($asignacion as $estudiante)
                                            <div class="" style="display: inline-flex;">
                                                <img class="img-circle" src="{{ asset($estudiante->usuario->foto_usuario) }}" alt="User Image" style="height: 75px;">
                                                <a href="{{ route('estudiante_perfil', ['estudiante' => $asignacion->estudiante->id_estudiante]) }}"><h3>{{$estudiante->nombre_estudiante}} {{$estudiante->apellido_estudiante}}</h3></a>
                                            </div>
                                        @endforeach
                                    @else
                                    <div class="" style="display: inline-flex;">
                                        <img class="img-circle" src="{{ asset($asignacion->estudiante->usuario->foto_usuario) }}" alt="User Image" style="height: 75px;">
                                        <a href="{{ route('estudiante_perfil', ['estudiante' => $asignacion->estudiante->id_estudiante]) }}"><h3>{{$asignacion->estudiante->nombre_estudiante}} {{$asignacion->estudiante->apellido_estudiante}}</h3></a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div><!-- /.row -->
            </div><!-- /.tab-pane -->
        </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->

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
