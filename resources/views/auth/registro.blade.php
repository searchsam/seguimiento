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
                        <input type="text" name="name" placeholder="Nombre" class="{{ $errors->has('name') ? 'error' : '' }}" value="{{ old('name') }}">
                        {!! $errors->first('name', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="text" name="lastname" placeholder="Apellido" class="{{ $errors->has('lastname') ? 'error' : '' }}" value="{{ old('lastname') }}">
                        {!! $errors->first('lastname', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="email" name="email" placeholder="Correo Electronico" class="{{ $errors->has('email') ? 'error' : '' }}" value="{{ old('email') }}">
                        {!! $errors->first('email', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="password" name="password" placeholder="Contraseña" class="{{ $errors->has('password') ? 'error' : '' }}">
                        {!! $errors->first('password', '<span class="help-block"><b>:message</b></span>') !!}
                        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" class="{{ $errors->has('password') ? 'error' : '' }}">
                        <div class="tipo" id="interruptor">
                            <label class="switch" :click="checkToggle">
                                <input type="checkbox" id="validador" name="empresa" v-modal="checkValue">
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
