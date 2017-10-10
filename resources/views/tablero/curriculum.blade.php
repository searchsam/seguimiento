@extends('layouts/admin_template')

@section('content')

    <form id="curriculum-form" class="" action="{{ route('registrar_curriculum') }}" method="post" enctype="multipart/form-data">

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
                            <img :src="image" class="rounded-circle img-fluid">
                            <input type="text" value="{{ asset($usuario->foto_usuario) }}" style="visibility: hidden;" id="default">
                            <input type="file" name="foto" @change="onFileChange">
                            <label><i class="fa fa-camera" aria-hidden="true"></i> @{{ message }}</label>
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

            <div class="box-body" id="estudio-form">
                <div id="estudio-row">
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
                            <a id="agregar-academico" class="agregar"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-default" id="experiencia">
            <div class="box-header with-border">
                <h3 class="box-title">EXPERIENCIA LABORAL</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div id="laboral-row">
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
                                <a class="agregar" id="agregar-laraboral"><i class="fa fa-plus"></i></a>
                            </div>
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

                    <div class="col-md-4" id="habilidades">
                        <textarea id="hab-all" name="habilidad" rows="8" hidden="true"></textarea>
                        <ul class="tags">
                            <li class="hab" v-for="(value, key) in habilidades"><label class="tag"> @{{ value }} </label> <span @click="rmHabilidad(key)"><i class="fa fa-minus"></i></span></li>
                        </ul>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="text-hab" type="text" placeholder="Habilidades">
                                <span class="input-group-btn">
                                    <button type="button" @click="addHabilidad()">Agregar</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" id="idiomas">
                        <textarea id="ido-all" name="idioma" rows="8" hidden="true"></textarea>
                        <ul class="tags">
                            <li class="ido" v-for="(value, key) in idiomas" :key="key"><label class="tag"> @{{ value }} </label> <span @click="rmIdioma(key)"><i class="fa fa-minus"></i></span></li>
                        </ul>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="text-ido" type="text" placeholder="Idiomas">
                                <span class="input-group-btn">
                                    <button type="button" @click="addIdioma()">Agregar</button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" id="informacion">
                        <textarea id="info-all" name="otro" rows="8" hidden="true"></textarea>
                        <ul class="tags">
                            <li class="otr" v-for="(value, key) in informacion" :key="key"><label class="tag"> @{{ value }} </label> <span @click="rmInfo(key)"><i class="fa fa-minus"></i></span></li>
                        </ul>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="text-info" type="text" placeholder="Otra Informaci&oacute;n">
                                <span class="input-group-btn">
                                    <button type="button" @click="addInfo()">Agregar</button>
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
                <div id="reconocimiento-row">
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
                                <a id="agregar-reconocimiento" class="agregar"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box box-default" id="referencia">
            <div class="box-header with-border">
                <h3 class="box-title">CONTACTOS DE REFERENCIA</h3>
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
                                    <th scope="row">3</th>
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

        <div class="row float-right">
            <div class="col-md-12 ">
                <button type="submit" name="button" class="notifications-success messages-success" style="float:right;">Guardar</button>
            </div>
        </div>

    </form>
@endsection
