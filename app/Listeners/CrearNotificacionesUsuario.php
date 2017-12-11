<?php

namespace App\Listeners;

use App\Events\NotificacionesUsuario;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Usuario;
use Notification;

class CrearNotificacionesUsuario implements ShouldQueue
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
     * @param  NotificacionesUsuario  $event
     * @return void
     */
    public function handle(NotificacionesUsuario $event)
    {
        //
    }
}
