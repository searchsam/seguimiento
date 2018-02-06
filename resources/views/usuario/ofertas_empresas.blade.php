@extends('layouts.admin_template')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Ofertas Creadas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body mostrar-oferta" id="mostrar-asignar">
                    @if (count($ofertas))
                        @foreach ($ofertas as $oferta)
                            @if ($oferta->estado_oferta == 0)
                                <div class="card" id="show-modal" @click="showModal = true">
                                    <div class="triangle-container warning" data-toggle="tooltip" data-placement="left" title="Oferta en espera de ser atendida."></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-md-4">
                                                <img class="img-circle" src="{{ asset($oferta->empresa->usuario->foto_usuario) }}" alt="{{ $oferta->empresa->nombre_empresa }}" width="128px" height="128px">
                                            </div>
                                            <div class="col col-md-8">
                                                <h1><b>{{ $oferta->empresa->nombre_empresa }}</b> <small>{{ $oferta->empresa->contacto->nombre_contacto }} {{ $oferta->empresa->contacto->apellido_contacto }}</small> </h1>
                                                <div class="text-truncate">
                                                    <p>{{ $oferta->descripcion_oferta }}</p>
                                                </div>
                                                <p>{{ $oferta->fecha_limite_oferta }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <modal v-if="showModal" @close="showModal = false">
                                    <div slot="banner" class="modal-header widget-user-header bg-blue" style="background: url(<?php echo asset($oferta->empresa->usuario->foto_usuario); ?>) center center; height: 128px;"></div>
                                    <h1 slot="header"><b>{{ $oferta->empresa->contacto->nombre_contacto }} {{ $oferta->empresa->contacto->apellido_contacto }}</b> <small slot="sub-header">{{ $oferta->empresa->nombre_empresa }}</small></h1>
                                    <p slot="body">{{ $oferta->descripcion_oferta }}</p>
                                    <div slot="color" class="espera aside"></div>
                                    <p slot="state" class="aside">En Espera de ser Atendida</p>
                                    @if (!is_null($oferta->fecha_limite_oferta))
                                        <p slot="limit">{{ $oferta->fecha_limite_oferta }}</p>
                                    @endif
                                    <a slot="oferta" class="btn btn-default btn-flat" href="{{ route('asignacion', ['oferta' => $oferta->id_oferta]) }}" style="width: 100%; background-color: #28A745; color: #fff; height: 50px; font-size: 17px;">Asignar</a>
                                </modal>

                            @endif
                        @endforeach
                    @endif
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class='col-md-6'>
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Ofertas Atendidas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body mostrar-oferta" id="mostrar-enviar">
                    @if (count($ofertas))
                        @foreach ($ofertas as $oferta)
                            @if ($oferta->estado_oferta == 1)
                                @if ( $oferta->asignacion()->where( [['aplica', '=', '1'], ['oferta_id', '=', $oferta->id_oferta]] )->first() )
                                    <div class="card" id="show-modal" @click="showModal = true">
                                        <div class="triangle-container success" data-toggle="tooltip" data-placement="left" title="Oferta atendida."></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col col-md-4">
                                                    <img class="img-circle" src="{{ asset($oferta->empresa->usuario->foto_usuario) }}" alt="{{ $oferta->empresa->nombre_empresa }}" width="128px" height="128px">
                                                </div>
                                                <div class="col col-md-8">
                                                    <h1><b>{{ $oferta->empresa->nombre_empresa }}</b> <small>{{ $oferta->empresa->contacto->nombre_contacto }} {{ $oferta->empresa->contacto->apellido_contacto }}</small> </h1>
                                                    <div class="text-truncate">
                                                        <p>{{ $oferta->descripcion_oferta }}</p>
                                                    </div>
                                                    <p>{{ $oferta->fecha_limite_oferta }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <modal-students v-if="showModal" @close="showModal = false">
                                        <div slot="banner" class="modal-header widget-user-header bg-blue" style="background: url(<?php echo asset($oferta->empresa->usuario->foto_usuario); ?>) center center; height: 128px;"></div>
                                        <h1 slot="header"><b>{{ $oferta->empresa->contacto->nombre_contacto }} {{ $oferta->empresa->contacto->apellido_contacto }}</b> <small slot="sub-header">{{ $oferta->empresa->nombre_empresa }}</small></h1>
                                        <p slot="body">{{ $oferta->descripcion_oferta }}</p>
                                        <div slot="color" class="atendida aside"></div>
                                        <p slot="state" class="aside">Oferta Atendida</p>
                                        @if (!is_null($oferta->fecha_limite_oferta))
                                            <p slot="limit">{{ $oferta->fecha_limite_oferta }}</p>
                                        @endif
                                        @php $asignaciones = $oferta->asignacion; @endphp
                                        @foreach ($asignaciones as $asignacion)
                                        <li slot="candidato">
                                            <img src="{{ asset($asignacion->estudiante->usuario->foto_usuario) }}" alt="User Image" style="width: 128px; height: 128px;">
                                            <a class="users-list-name" href="{{ route('estudiante_perfil', ['estudiante' => $asignacion->estudiante->id_estudiante]) }}">{{ $asignacion->estudiante->nombre_estudiante }} {{ $asignacion->estudiante->apellido_estudiante }}</a>
                                        </li>
                                        @endforeach
                                        <a slot="oferta" class="btn btn-default btn-flat" href="{{ route('atender', ['oferta' => $oferta->id_oferta]) }}" style="width: 100%; background-color: #28A745; color: #fff; height: 50px; font-size: 17px;">Enviar</a>
                                    </modal-students>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- template for the modal component -->
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <slot name="banner"></slot>

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
                                <div class="col col-md-6 seccess">
                                    <slot name="oferta">Asignar</slot>
                                </div>
                                <div class="col col-md-6 cancel">
                                    <button type="button" class="modal-default-button" @click="$emit('close')" style="width: 100%;">Cerrar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </transition>
    </script>

    <!-- template for the modal component -->
    <script type="text/x-template" id="modal-template-students">
        <transition name="modal-students">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">
                        <slot name="banner"></slot>

                        <div class="modal-body warning">
                            <slot name="header">Contacto <slot name="sub-header">Empresa a estudiante</slot></slot>
                            <slot name="body">Descriptcion de la Oferta para el estudiante</slot>
                            <div class="row">
                                <div class="col col-md-6">
                                    <slot name="color"></slot>
                                    <slot name="state">Estado de la Oferta</slot>
                                </div>
                                <div class="col col-md-6 right" style="float: right;">
                                    <slot name="limit"></slot>
                                </div>
                            </div>
                            <div class="no-padding">
                                <ul class="users-list clearfix">
                                    <slot name="candidato"></slot>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col col-md-6 seccess">
                                    <slot name="oferta">Asignar</slot>
                                </div>
                                <div class="col col-md-6 cancel">
                                    <button type="button" class="modal-default-button" @click="$emit('close')" style="width: 100%;">Cerrar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </transition>
    </script>
@endsection
