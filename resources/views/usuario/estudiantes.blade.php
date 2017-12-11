@extends('layouts.admin_template')

@section('content')
    <div class='row'>
        @foreach ($estudiantes as $estudiane)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-gray">
                        <img class="img-circle" src="{{ asset($estudiane->usuario->foto_usuario) }}" alt="User Image">
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{ $estudiane->codigo_estudiante }}</span>
                        <span class="info-box-number">{{ $estudiane->nombre_estudiante }} {{ $estudiane->apellido_estudiante }}</span>
                        @php $estudio = $estudiane->formacion_academica()->where('tipo_estudio_id', 5)->get(); @endphp
                        <small>{{ $estudio[0]->nombre_estudio }}</small>
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
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </transition>
    </script>
@endsection
