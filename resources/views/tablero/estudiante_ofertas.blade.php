@extends('layouts.admin_template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Ofertas Recividas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body mostrar-oferta" id="mostrar-aplicar">
                    <!-- button type="button" data-toggle="modal" data-target="#oferta-modal" class="btn btn-default add-oferta"><i class="fa fa-plus"></i></button -->
                    @if (count($asignaciones))
                        @foreach ($asignaciones as $asignacion)
                            @if ($asignacion->oferta->estado_oferta == 1)
                                <div class='col-md-6'>
                                    <div class="card" id="show-modal" @click="showModal = true">
                                        <div class="triangle-container warning" data-toggle="tooltip" data-placement="left" title="Oferta en espera de ser atendida."></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col col-md-4">
                                                    <img class="img-circle" src="{{ asset($asignacion->oferta->empresa->usuario->foto_usuario) }}" alt="{{ $asignacion->oferta->empresa->nombre_empresa }}" width="128px" height="128px">
                                                </div>
                                                <div class="col col-md-8">
                                                    <h1><b>{{ $asignacion->oferta->empresa->nombre_empresa }}</b> <small>{{ $asignacion->oferta->empresa->contacto->nombre_contacto }} {{ $asignacion->oferta->empresa->contacto->apellido_contacto }}</small> </h1>
                                                    <div class="text-truncate">
                                                        <p>{{ $asignacion->oferta->descripcion_oferta }}</p>
                                                    </div>
                                                    <p>{{ $asignacion->oferta->fecha_limite_oferta }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <modal v-if="showModal" @close="showModal = false">
                                    <div slot="banner" class="modal-header widget-user-header bg-blue" style="background: url(<?php echo asset($asignacion->oferta->empresa->usuario->foto_usuario); ?>) center center; height: 128px;"></div>
                                    <h1 slot="header"><b>{{ $asignacion->oferta->empresa->contacto->nombre_contacto }} {{ $asignacion->oferta->empresa->contacto->apellido_contacto }}</b> <small slot="sub-header">{{ $asignacion->oferta->empresa->nombre_empresa }}</small></h1>
                                    <p slot="body">{{ $asignacion->oferta->descripcion_oferta }}</p>
                                    <div slot="color" class="espera aside"></div>
                                    <p slot="state" class="aside">En Espera de ser Atendida</p>
                                    @if (!is_null($asignacion->oferta->fecha_limite_oferta))
                                        <p slot="limit">{{ $asignacion->oferta->fecha_limite_oferta }}</p>
                                    @endif
                                    <a slot="oferta" class="btn btn-default btn-flat" href="{{ route('aplicacion', ['oferta' => $asignacion->id_asignacion]) }}" style="width: 100%; background-color: #28A745; color: #fff; height: 50px; font-size: 17px;">Aplicar</a>
                                </modal>
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
                            <!-- button class="modal-default-button" @click="$emit('close')" style="width: 100%;">Cerrar</button -->
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
