<?php

namespace App\Listeners;

use App\Events\ActualizarSession;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RefrescarSesionUsuario
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
     * @param  ActualizarSession  $event
     * @return void
     */
    public function handle(ActualizarSession $event)
    {
        $usuario = Usuario::find($event->user->id);
        session(['usuario' => $usuario]);
    }
}
