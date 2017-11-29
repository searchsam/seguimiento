@extends('layouts.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">

                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue-active">
                    <h3 class="widget-user-username">{{ $usuario->nombre_usuario }}{{ $usuario->apellido_usuario }}</h3>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ asset( $usuario->foto_usuario ) }}" alt="User Avatar" style="background-color:white;">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">OFERTAS</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">EMPRESAS</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">ESTUDIANTES</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div><!-- /.widget-user -->

        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
