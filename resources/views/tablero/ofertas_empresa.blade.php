@extends('layouts.admin_template')

@section('content')
    <div class='row' id="mostrar-oferta">
        <div class='col-md-6'>
            <!-- Box -->
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Ofertas Creadas</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    <button type="button" data-toggle="modal" data-target="#oferta-modal" class="btn btn-default add-oferta"><i class="fa fa-plus"></i></button>
                    @if (count($cliente))
                        @foreach ($cliente as $oferta)
                            @if ($oferta->estado_oferta == 0)
                                <div class="card" id="show-modal" @click="showModal = true">

                                    <div class="triangle-container warning" data-toggle="tooltip" data-placement="left" title="Oferta en espera de ser atendida."></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-md-4">
                                                <img class="img-circle" src="{{ asset($usuario->foto_usuario) }}" alt="{{ $usuario->empresa->nombre_empresa }}" width="128px" height="128px">
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
                                    <h1 slot="header"><b>{{ $contacto->nombre_contacto }} {{ $contacto->apellido_contacto }}</b> <small slot="sub-header">{{ $usuario->empresa->nombre_empresa }}</small></h1>
                                    <p slot="body">{{ $oferta->descripcion_oferta }}</p>
                                    <div slot="color" class="espera aside"></div>
                                    <p slot="state" class="aside">En Espera de ser Atendida</p>
                                    @if (!is_null($oferta->fecha_limite_oferta))
                                        <p slot="limit">{{ $oferta->fecha_limite_oferta }}</p>
                                    @endif
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

                <div class="box-body">
                    @if (count($cliente))
                        @foreach ($cliente as $oferta)
                            @if ($oferta->estado_oferta == 1)
                                <div class="card" id="show-modal" @click="showModal = true">
                                    <div class="triangle-container success" data-toggle="tooltip" data-placement="left" title="Oferta atendida."></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col col-md-4">
                                                <img class="img-circle" src="{{ asset($usuario->foto_usuario) }}" alt="{{ $usuario->empresa->nombre_empresa }}" width="128px" height="128px">
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
                                    <h1 slot="header"><b>{{ $contacto->nombre_contacto }} {{ $contacto->apellido_contacto }}</b> <small slot="sub-header">{{ $usuario->empresa->nombre_empresa }}</small></h1>
                                    <p slot="body">{{ $oferta->descripcion_oferta }}</p>
                                    <div slot="color" class="atendida aside"></div>
                                    <p slot="state" class="aside">Oferta Atendida</p>
                                    @if (!is_null($oferta->fecha_limite_oferta))
                                        <p slot="limit">{{ $oferta->fecha_limite_oferta }}</p>
                                    @endif
                                </modal>
                            @endif
                        @endforeach
                    @endif
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!-- /.col -->

        <div class="modal fade" id="oferta-modal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header text-center">
                        <h1 class="modal-title">Generar Oferta</h1>
                    </div>

                    <div class="modal-body">
                        <form id="curriculum-form" action="{{ route('registrar_oferta') }}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="form-select {{ $errors->has('tipo_oferta') ? 'error' : '' }}">
                                    <select name="tipo_oferta" class="custom-select {{ $errors->has('tipo_oferta') ? 'error' : '' }}">
                                        <option value="0">Tipo de Oferta</option>
                                        @foreach ($tipo_oferta as $oferta)
                                            <option value="{{ $oferta->id_tipo_oferta }}" {{ (old('tipo_oferta')==$oferta->id_tipo_oferta) ? 'selected' : '' }}>{{ $oferta->tipo_oferta }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {!! $errors->first('tipo_oferta', '<span class="help-block"><b>:message</b></span>') !!}
                            </div>
                            <div class="form-group">
                                <input type="text" name="limite" id="Date" style="width:100%" placeholder="Fecha Limite" class="{{ $errors->has('limite') ? 'error' : '' }}" value="{{ old('limite') }}">
                                {!! $errors->first('limite', '<span class="help-block"><b>:message</b></span>') !!}
                            </div>
                            <div class="form-group">
                                <textarea name="descripcion" style="width:100%" placeholder="Descripci&oacute;n" class="{{ $errors->has('descripcion') ? 'error' : '' }}">{{ old('descripcion') }}</textarea>
                                {!! $errors->first('descripcion', '<span class="help-block"><b>:message</b></span>') !!}
                            </div>
                            <div class="row">
                                <div class="col col-md-6 seccess">
                                    <button type="submit">Generar</button>
                                </div>
                            </form>
                            <div class="col col-md-6 cancel">
                                <button type="button" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div><!-- /.row -->

    <!-- template for the modal component -->
    <script type="text/x-template" id="modal-template">
        <transition name="modal">
            <div class="modal-mask">
                <div class="modal-wrapper">
                    <div class="modal-container">

                        <div class="modal-header widget-user-header bg-blue" style="background: url(<?php echo asset($usuario->foto_usuario); ?>) center center; height: 128px;"></div>

                        <div class="modal-body warning">
                            <slot name="header">Contacto <slot name="sub-header">Empresa</slot></slot>
                            <slot name="body">Descriptcion de la Oferta</slot>
                            <div class="row">
                                <div class="col col-md-6">
                                    <slot name="color"></slot>
                                    <slot name="state">Estado de la Oferta</slot>
                                </div>
                                <div class="col col-md-6 right" style="float: right;">
                                    <slot name="limit">{{ $oferta->fecha_limite_oferta }}</slot>
                                </div>
                            </div>
                            <button class="modal-default-button" @click="$emit('close')" style="width: 100%;">Cerrar</button>
                        </div>

                    </div>
                </div>
            </div>
        </transition>
    </script>
@endsection
