@extends('layouts/admin_template')

@section('content')
    <form id="curriculum-form" class="" action="index.html" method="post">

        <div class="box box-default">
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
                            <input type="text" name="ciudad" style="width:100%" placeholder="Ciudad">
                        </div>
                        <div class="form-group">
                            <textarea rows="5" name="direccion" style="width:100%" placeholder="Direcci&oacute;n"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="{{ asset('/img/cliente.png') }}" class="rounded-circle">
                            <input type="text" name="foto" hidden="true">
                            <h1 class="display-3">Codigo usuario</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">FORMACI&Oacute;N ACAD&Eacute;MICA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">


                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" name="estudio" style="width:100%" placeholder="Estudio/Carrera">
                        </div>
                        <div class="form-group">
                            <input type="text" name="institucion" style="width:100%" placeholder="Institucion de Estudio">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ciudad" style="width:100%" placeholder="Ciudad">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ano" style="width:100%" placeholder="Año">
                        </div>
                    </div>

            </div>
        </div>

    </form>
@endsection
