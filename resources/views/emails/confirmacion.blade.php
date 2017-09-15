@component('mail::message')
# Bienvenido {{ $user->name }} {{ $user->lastname }}.

A creado una cuenta en el Sistema de Seguimiento del Programa de Seguimiento
a Graduados - PSG de la Universidad Nacional de Ingenieria - UNI. Le invitamos a hacer click en siguiente boton para
confirmar su correo electronico.

@component('mail::button', ['url' => 'http://localhost:8000/autenticacion/validar_confirmacion/' . $user->remember_token . '/' . $user->id])
Confirmar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
