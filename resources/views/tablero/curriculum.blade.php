@extends('layouts/admin_template')

@section('content')
    <div class="box box-default">
        <form id="curriculum-form" class="" action="index.html" method="post">

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
                            <textarea rows="5" style="width:100%"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <h1>FOTO</h1>
                        </div>
                    </div>

                </div>
            </div>

        </form>
    </div>
@endsection
