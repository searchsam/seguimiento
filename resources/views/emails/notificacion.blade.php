@component('mail::message')
# Estimado {{ $usuario->nombre_usuario }} {{ $usuario->apellido_usuario }}.

Ha recivido una nueva oferta {{ $usuario->asignacion->oferta->tipo_oferta->tipo_oferta }},
por favor dirijase al a su cuenta en el sistema del Programa de Seguimiento a Graduados de
la Universidad Nacional de Ingenieria UNI o de click en el siguiente boton para visualizar
la oferta que ha recivido.

@component('mail::button', ['url' => '#'])
Confirmar
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
