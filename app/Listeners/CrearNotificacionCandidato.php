<?php

namespace App\Listeners;

use App\Events\NotificacionesCandidato;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;
use Notification;
use App\Notifications\AtenderOferta;

class CrearNotificacionCandidato implements ShouldQueue
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
     * @param  NotificacionesCandidato  $event
     * @return void
     */
    public function handle(NotificacionesCandidato $event)
    {
        $usuario = User::find(2);
        $usuario->notify(new AtenderOferta());
    }
}
