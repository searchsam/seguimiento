<?php

namespace App\Listeners;

use App\Events\NotificacionesOferta;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use Notification;
use App\Notifications\RegistrarOferta;

class CrearNotificacionOferta implements ShouldQueue
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
     * @param  NotificacionesOferta  $event
     * @return void
     */
    public function handle(NotificacionesOferta $event)
    {
        $usuario = User::find(2);
        $usuario->notify(new RegistrarOferta());
    }
}
