<?php

namespace App\Listeners;

use App\Events\NotificacionesEmpresa;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Usuario;
use Notification;
use App\Notifications\GenerarOferta;
use App\Notifications\RegistrarEntidadEmpresarial;

class CrearNotificacionesEmpresa
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
     * @param  NotificacionesEmpresa  $event
     * @return void
     */
    public function handle(NotificacionesEmpresa $event)
    {
        $usuario = Usuario::find($event->user->id);

        if ( !isset($usuario->empresa) )
        {
            $event->user->notify(new RegistrarEntidadEmpresarial());
        }

        if ( !isset($usuario->empresa->oferta) )
        {
            $event->user->notify(new GenerarOferta());
        }
    }
}
