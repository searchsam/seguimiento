@extends('layouts.admin_template')

@section('content')

    <form id="curriculum-form" action="{{ route('registrar_oferta') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="box box-default" id="datos-presonales">
            <div class="box-header with-border">
                <h3 class="box-title">DATOS DE LA OFERTA</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

                <div class="row">
                    <div class="col-md-6">
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
                    </div>

                    <div class="col-md-6" id="carrera_oferta">
                        <textarea id="carrera-all" name="oferta_carreras" rows="8" hidden="true"></textarea>
                        <ul class="tags">
                            <li class="carrera" v-for="(value, key) in carreras"><label class="tag"> @{{ value }} </label> <span @click="rmCarrera(key)"><i class="fa fa-minus"></i></span></li>
                        </ul>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="form-select {{ $errors->has('oferta_carreras') ? 'error' : '' }}">
                                    <select id="opt-carrera" class="custom-select {{ $errors->has('tipo_oferta') ? 'error' : '' }}">
                                        <option value="0">Carreras Requeridas</option>
                                        @foreach ($carreras as $carrera)
                                            <option value="{{ $carrera->id_carrera }}">{{ $carrera->nombre_carrera }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="input-group-btn">
                                    <button type="button" @click="addCarrera()">Agregar</button>
                                </span>
                            </div>
                            {!! $errors->first('oferta_carreras', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
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
