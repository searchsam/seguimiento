@extends('layouts/admin_template')

@section('content')

    <form id="curriculum-form" action="{{ route('registrar_entidad') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="box box-default" id="datos-presonales">
            <div class="box-header with-border">
                <h3 class="box-title">DATOS EMPRESARIALES</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="nombre_empresa" style="width:100%" placeholder="Nombre de la Empresa" class="{{ $errors->has('nombre_empresa') ? 'error' : '' }}" value="{{ old('nombre_empresa') }}">
                            {!! $errors->first('nombre_empresa', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="ruc" style="width:100%" placeholder="N&uacute;mero RUC" class="{{ $errors->has('ruc') ? 'error' : '' }}" value="{{ old('ruc') }}">
                            {!! $errors->first('ruc', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <textarea rows="5" name="direccion" style="width:100%" placeholder="Direcci&oacute;n de la Empresa" class="{{ $errors->has('direccion') ? 'error' : '' }}">{{ old('direccion') }}</textarea>
                            {!! $errors->first('direccion', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="nombre" style="width:100%" placeholder="Nombre del Contacto" value="{{ $usuario->nombre_usuario }}" class="{{ $errors->has('nombre') ? 'error' : '' }}">
                            {!! $errors->first('nombre', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="apellido" style="width:100%" placeholder="Apellido del Contacto" value="{{ $usuario->apellido_usuario }}" class="{{ $errors->has('apellido') ? 'error' : '' }}">
                            {!! $errors->first('apellido', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="cedula" style="width:100%" placeholder="Cedula del Contacto" class="{{ $errors->has('cedula') ? 'error' : '' }}" value="{{ old('cedula') }}">
                            {!! $errors->first('cedula', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="cargo" style="width:100%" placeholder="Cargo del Contacto" class="{{ $errors->has('cargo') ? 'error' : '' }}" value="{{ old('cargo') }}">
                            {!! $errors->first('cargo', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" style="width:100%" placeholder="Correo Institucional" value="{{ $usuario->email_usuario }}" class="{{ $errors->has('email') ? 'error' : '' }}">
                            {!! $errors->first('email', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" style="width:100%" placeholder="Telefono Empresarial" class="{{ $errors->has('telefono') ? 'error' : '' }}" value="{{ old('telefono') }}">
                            {!! $errors->first('telefono', '<span class="help-block"><b>:message</b></span>') !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="text-center" id="user-foto">
                            <img :src="image" class="rounded-circle img-fluid">
                            <input type="text" value="{{ asset($usuario->foto_usuario) }}" style="visibility: hidden;" id="default">
                            <input type="file" name="foto" @change="onFileChange" class="{{ $errors->has('foto') ? 'error' : '' }}" value="{{ !is_null(old('foto')) ? old('foto') : ' ' }}">
                            {!! $errors->first('foto', '<span class="help-block"><b>:message</b></span>') !!}
                            <label><i class="fa fa-camera" aria-hidden="true"></i> @{{ message }}</label>
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

    @if (session()->has('flash'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('flash') }}
        </div>
    @endif

@endsection
