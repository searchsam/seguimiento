@extends('layouts/auth_template')

@section('content')

    <div class="container" id="panel">
        <!-- Content here -->
        <div class="card text-center">
            <div class="card-header"><h1>REGISTRO</h1></div>
            <div class="card-body">
                <form action="{{ route('registrar') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-margin">
                        <div class="spacer"></div>
                        <input type="text" name="nombre" placeholder="Nombre" class="{{ $errors->has('nombre') ? 'error' : '' }}" value="{{ old('nombre') }}">
                        {!! $errors->first('nombre', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="text" name="apellido" placeholder="Apellido" class="{{ $errors->has('apellido') ? 'error' : '' }}" value="{{ old('apellido') }}">
                        {!! $errors->first('apellido', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="email" name="email" placeholder="Correo Electronico" class="{{ $errors->has('email') ? 'error' : '' }}" value="{{ old('email') }}">
                        {!! $errors->first('email', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="password" name="password" placeholder="Contraseña" class="{{ $errors->has('password') ? 'error' : '' }}" value="{{ old('password') }}">
                        {!! $errors->first('password', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="password" name="confirm" placeholder="Confirmar Contraseña" class="{{ $errors->has('confirm') ? 'error' : '' }}" value="{{ old('confirm') }}">
                        {!! $errors->first('confirm', '<span class="help-block"><b>:message</b></span>') !!}
                        <div class="tipo">
                            <label class="switch">
                                <input type="checkbox" id="validador" name="empresa" value="{{ old('empresa') }}">
                                <span class="slider round"></span>
                                <div class="label" style="display:block; margin-left:70px;">
                                    <p class="lead">Empresa</p>
                                </div>
                            </label>
                            <p><small class="text-muted">Si no utiliza esta opcion asumimos que es un estudiante.</small></p>
                        </div>
                        <button type="submit" name="button">Aceptar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                <div class="spacer"></div>
            </div>
        </div>
    </div>

    @if (session()->has('flash'))
        <div class="alert alert-info" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('flash') }}
        </div>
    @endif

@endsection
