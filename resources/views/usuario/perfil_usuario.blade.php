@extends('layouts.admin_template')

@section('content')
    <div class='row'>
        <div class='col-md-6 col-md-offset-3'>
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">

                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-blue-active">
                    <h3 class="widget-user-username">{{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }}</h3>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ asset( $usuario->foto_usuario ) }}" alt="User Avatar" style="background-color:white;">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $ofertas }}</h5>
                                <span class="description-text"><a href="{{ route('ver_ofertas') }}">OFERTAS</a></span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $empresas }}</h5>
                                <span class="description-text"><a href="#">EMPRESAS</a></span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">{{ $estudiantes }}</h5>
                                <span class="description-text"><a href="#">ESTUDIANTES</a></span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div><!-- /.widget-user -->

        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
