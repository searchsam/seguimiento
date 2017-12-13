@extends('layouts.admin_template')

@section('content')
    @php use Carbon\Carbon; @endphp
    <div class='row'>
        @if ( count( $cliente ) )
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset( $usuario->foto_usuario ) }}" alt="User profile picture">
                    <h3 class="profile-username text-center">{{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }}</h3>
                    <p class="text-muted text-center">{{ $usuario->estudiante->codigo_estudiante }}</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">Sexo:
                            @if ($usuario->estudiante->sexo_estudiante)
                                <b class="pull-right">Masculino</b>
                            @else
                                <b class="pull-right">Masculino</b>
                            @endif
                        </li>
                        <li class="list-group-item">Cedula: <b class="pull-right">{{ $usuario->estudiante->cedula_estudiante }}</b></li>
                        <li class="list-group-item">Estado:
                            <b class="pull-right time-label">
                                @if ( $usuario->estado_usuario )
                                    <span class="bg-green">Activo</span>
                                @else
                                    <span class="bg-red">Inactivo</span>
                                @endif
                            </b>
                        </li>

                    </ul>
                    @if ($usuario->tipo_usuario == 1)
                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    @endif
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">

                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Direcci&oacute;n</strong>
                    <p class="text-muted">{{ $usuario->estudiante->direccion_estudiante }} - {{ $usuario->estudiante->ciudad_estudiante }}</p>
                    <hr />
                    <strong><i class="fa fa-envelope margin-r-5"></i> Correo Electronico</strong>
                    <p class="text-muted">{{ $usuario->estudiante->email_estudiante }}</p>
                    <hr />
                    <strong><i class="fa fa-mobile margin-r-5"></i> Celular</strong>
                    <p class="text-muted">{{ $usuario->estudiante->celular_estudiante }}</p>
                    @if (count($usuario->estudiante->telefono_estudiante))
                        <hr />
                        <strong><i class="fa fa-phone margin-r-5"></i> Telefono</strong>
                        <p class="text-muted">{{ $usuario->estudiante->telefono_estudiante }}</p>
                    @endif
                    @if ($usuario->estudiante->curriculum)
                        <hr />
                        <strong><i class="fa fa-newspaper-o margin-r-5"></i> Soporte Fisico</strong>
                        <p class="text-muted"><a href="{{ $usuario->estudiante->curriculum }}">Curriculum</a></p>
                    @endif
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
            @if ( count( $usuario->estudiante->formacion_academica ) )
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">FORMACI&Oacute;N ACAD&Eacute;MICA</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipo Estudio</th>
                                <th>Estudio/Carrera</th>
                                <th>Instituci&oacute;n</th>
                                <th>Ciudad</th>
                                <th>A&ntilde;o</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuario->estudiante->formacion_academica as $estudio)
                            <tr>
                              <td>{{ $estudio->tipo_estudio->tipo_estudio }}</td>
                              @if ( strcmp($estudio->nombre_estudio, '5') == 0 )
                                  @foreach ($carreras as $carrera)
                                      @if (strcmp($carrera->id_carrera, '5') == 0)
                                      <td>{{ $carrera->nombre_carrera }}</td>
                                      @endif
                                  @endforeach
                              @else
                              <td>{{ $estudio->nombre_estudio }}</td>
                              @endif
                              <td>{{ $estudio->institucion_estudio }}</td>
                              <td>{{ $estudio->localidad_estudio }}</td>
                              <td>{{ $estudio->fecha_estudio }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
            @endif
            @if ( count( $usuario->estudiante->experiencia_laboral ) )
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">EXPERIENCIA LABORAL</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cargo</th>
                                <th>Intituci&oacute;n</th>
                                <th>Ciudad</th>
                                <th>A&ntilde;o/Periodo</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuario->estudiante->experiencia_laboral as $laboral)
                            <tr>
                              <td>{{ $laboral->cargo_laboral }}</td>
                              <td>{{ $laboral->institucion_laboral }}</td>
                              <td>{{ $laboral->cuidad_laboral }}</td>
                              <td>{{ $laboral->periodo_laboral }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
            @endif
            @if (count($usuario->estudiante->desarrollo_personal))
            <div class="row">
                <div class="col-md-4">
                    <div class="small-box box-alternate grad-bg">
                        <div class="inner">
                            <h3>Habilidades</h3>
                            <p>{{ str_replace( ',', ', ', $usuario->estudiante->desarrollo_personal->habilidad_personal ) }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="small-box box-alternate grad-md">
                        <div class="inner">
                            <h3>Idioma</h3>
                            <p>{{ str_replace( ',', ', ', $usuario->estudiante->desarrollo_personal->idomas_personal ) }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="small-box box-alternate grad-sm">
                        <div class="inner">
                            <h3>Otra Informaci&oacute;</h3>
                            <p>{{ str_replace( ',', ', ', $usuario->estudiante->desarrollo_personal->otro_personal ) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if ( count( $usuario->estudiante->reconocimiento ) )
            <div class="box box-orange box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">RECONOCIMIENTOS</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>M&eacute;rito</th>
                                <th>Intituci&oacute;n</th>
                                <th>Ciudad</th>
                                <th>A&ntilde;o/Periodo</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuario->estudiante->reconocimiento as $merito)
                            <tr>
                              <td>{{ $merito->merito_reconocimiento }}</td>
                              <td>{{ $merito->organizacion_reconocimiento }}</td>
                              <td>{{ $merito->ciudad_reconocimiento }}</td>
                              <td>{{ $merito->fecha_reconocimiento }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
            @endif
            @if ( count( $usuario->estudiante->referencia_laboral ) )
            <div class="box box-purple box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">CONTACTOS DE REFERENCIA</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>(T&iacute;tulo) Nombre y Apellido</th>
                                <th>Cargo - Intituci&oacute;n</th>
                                <th>Tel&eacute;fono</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuario->estudiante->referencia_laboral as $referencia)
                            <tr>
                              <td>{{ $referencia->nombre_referencia }}</td>
                              <td>{{ $referencia->cargo_referencia }}</td>
                              <td>{{ $referencia->telefono_referencia }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div>
            @endif
        </div><!-- /.nav-tabs-custom -->
        @else
            <p style="margin-left:20px; margin-bottom:0;">Perfil vacio, por favor registre la entidad de la empresa.</p>
            <div class="flex-center">
                <div class="content">
                    <img src="{{ asset('storage/slogo.svg') }}" alt="Seguimiento" height="300px">
                </div>
            </div>
        @endif
    </div><!-- /.row -->
@endsection
