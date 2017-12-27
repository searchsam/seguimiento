<?php

namespace App\Listeners;

use App\Events\NotificacionesAplicacion;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use App\Empresa;
use Notification;
use App\Notifications\GenerarAplicacion;

class CrearNotificacionAplicacion implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificacionesAplicacion  $event
     * @return void
     */
    public function handle(NotificacionesAplicacion $event)
    {
        $empresa = Empresa::find($event->empresa);
        $usuario = User::find($empresa->usuario_id);
        $usuario->notify(new GenerarAplicacion());
    }
}
