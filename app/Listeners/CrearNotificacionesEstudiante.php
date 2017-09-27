<?php

namespace App\Listeners;

use Illuminate\Support\Facades\DB;
use App\Events\NotificacionesEstudiante;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Usuario;
use Notification;
use App\Notifications\SubirCurriculum;
use App\Notifications\RegistrarPlanEstudios;

class CrearNotificacionesEstudiante
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
     * @param  NotificacionesEstudiante  $event
     * @return void
     */
    public function handle(NotificacionesEstudiante $event)
    {
        $usuario = Usuario::find($event->user->id);

        if ( count( auth()->user()->unreadNotifications ) )
        {
            if ( !DB::table('notifications')->where([ ['notifiable_id', '=', $event->user->id], ['type', 'LIKE', '*RegistrarPlanEstudios'], ])->get())
            {
                if ( !isset($usuario->estudiante) )
                {
                    $event->user->notify(new RegistrarPlanEstudios());
                }
            }

            if ( !DB::table('notifications')->where([ ['notifiable_id', '=', $event->user->id], ['type', 'LIKE', '*SubirCurriculum'], ])->get())
            {
                if ( !isset($usuario->estudiante) )
                {
                    $event->user->notify(new SubirCurriculum());
                }
                else
                {
                    if ( is_null( $usuario->estudiante->curriculum ) )
                    {
                        $event->user->notify(new SubirCurriculum());
                    }
                }
            }
        }
        else {
            if ( !isset($usuario->estudiante) )
            {
                $event->user->notify(new RegistrarPlanEstudios());
                $event->user->notify(new SubirCurriculum());
            }
            else
            {
                if ( is_null( $usuario->estudiante->curriculum ) )
                {
                    $event->user->notify(new SubirCurriculum());
                }
            }
        }

    }
}
