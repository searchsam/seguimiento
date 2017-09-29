@extends('layouts/admin_template')

@section('content')
    <form id="curriculum-form" class="" action="index.html" method="post">

        <div class="box box-default" id="datos-presonales">
            <div class="box-header with-border">
                <h3 class="box-title">DATOS PERSONALES</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexo" value="1">
                                Masculino
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexo" value="0">
                                Femenino
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cedula" style="width:100%" placeholder="C&eacute;dula">
                        </div>
                        <div class="form-group">
                            <input type="text" name="celular" style="width:100%" placeholder="Celular">
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" style="width:100%" placeholder="Tel&eacute;fono">
                        </div>
                        <div class="form-group">
                            <input type="text" name="correo" style="width:100%" placeholder="Email" value="{{ $usuario->email_usuario }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ciudad" style="width:100%" placeholder="Ciudad">
                        </div>
                        <div class="form-group">
                            <textarea rows="5" name="direccion" style="width:100%" placeholder="Direcci&oacute;n"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center" id="user-foto">
                            <img src="{{ asset('/img/cliente.png') }}" class="rounded-circle img-fluid">
                            <input type="text" name="foto" hidden="true">
                            <a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="box box-default" id="formacion-academica">
            <div class="box-header with-border">
                <h3 class="box-title">FORMACI&Oacute;N ACAD&Eacute;MICA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <div class="form-select">
                                <select name="tipo_estudio" class="custom-select">
                                    <option value="0">Tipo de Estudio</option>
                                    @foreach ($tipo_estudio as $estudio)
                                        <option value="{{ $estudio->id_tipo_estudio }}">{{ $estudio->tipo_estudio }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="estudio" placeholder="Estudio/Carrera">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="escuela" placeholder="Instituci&oacute;n de Estudio">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="ciudad" placeholder="Ciudad">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="ano" placeholder="A&ntilde;o">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                            <button class="agregar"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="box box-default" id="experiencia">
            <div class="box-header with-border">
                <h3 class="box-title">EXPERIENCIA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="cargo" placeholder="Cargo">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="institucion" placeholder="Instituci&oacute;n">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="ciudad" placeholder="Ciudad">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="periodo" placeholder="Per&iacute;odo">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                            <button class="agregar"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="box box-default" id="desarrollo-personal">
            <div class="box-header with-border">
                <h3 class="box-title">DESARROLLO PERSONAL</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">

                    <div class="col-md-4">
                        <textarea name="habilidad" rows="8"></textarea>
                        <ul class="tags">
                            <li class="hab"><label class="tag">HTML</label> <span><i class="fa fa-minus"></i></span></li>
                            <li class="hab"><label class="tag">CSS</label> <span><i class="fa fa-minus"></i></span></li>
                            <li class="hab"><label class="tag">JavaScript</label> <span><i class="fa fa-minus"></i></span></li>
                        </ul>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" placeholder="Habilidades">
                                <span class="input-group-btn">
                                    <button class="btn" type="button">Agregar</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <textarea name="idioma" rows="8"></textarea>
                        <ul class="tags">
                            <li class="ido"><label class="tag">HTML</label> <span><i class="fa fa-minus"></i></span></li>
                            <li class="ido"><label class="tag">CSS</label> <span><i class="fa fa-minus"></i></span></li>
                            <li class="ido"><label class="tag">JavaScript</label> <span><i class="fa fa-minus"></i></span></li>
                        </ul>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" placeholder="Idiomas">
                                <span class="input-group-btn">
                                    <button class="btn" type="button">Agregar</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <textarea name="otro" rows="8"></textarea>
                        <ul class="tags">
                            <li class="otr"><label class="tag">HTML</label> <span><i class="fa fa-minus"></i></span></li>
                            <li class="otr"><label class="tag">CSS</label> <span><i class="fa fa-minus"></i></span></li>
                            <li class="otr"><label class="tag">JavaScript</label> <span><i class="fa fa-minus"></i></span></li>
                        </ul>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" placeholder="Otra Informaci&oacute;n">
                                <span class="input-group-btn">
                                    <button class="btn" type="button">Agregar</button>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="box box-default" id="reconocimientos">
            <div class="box-header with-border">
                <h3 class="box-title">RECONOCIMIENTOS</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="merito" placeholder="Merito">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="organizacion" placeholder="Organizaci&oacute;">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="ciudad" placeholder="Ciudad">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <div class="form-group">
                            <input type="text" name="periodo" placeholder="A&ntilde;o">
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-12">
                        <div class="form-group">
                            <button class="agregar"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="box box-default" id="referencia">
            <div class="box-header with-border">
                <h3 class="box-title">DATOS PERSONALES</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">

                    <div class="col-md-12">
                        <table class="table table-responsive" id="excel-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>(Titulo) Nombre y Apellido</th>
                                    <th>Cargo - Instituci&oacute;n</th>
                                    <th>Tel&eacute;fono</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><input type="text" name="" value=""></td>
                                    <td><input type="text" name="" value=""></td>
                                    <td><input type="text" name="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><input type="text" name="" value=""></td>
                                    <td><input type="text" name="" value=""></td>
                                    <td><input type="text" name="" value=""></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><input type="text" name="" value=""></td>
                                    <td><input type="text" name="" value=""></td>
                                    <td><input type="text" name="" value=""></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </form>
@endsection
