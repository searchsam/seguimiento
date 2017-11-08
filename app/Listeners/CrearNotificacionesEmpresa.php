<?php

namespace App\Listeners;

use App\Events\NotificacionesEmpresa;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\DB;

use App\Usuario;
use Notification;
use App\Notifications\GenerarOferta;
use App\Notifications\RegistrarEntidadEmpresarial;

class CrearNotificacionesEmpresa implements ShouldQueue
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
    public function handle( NotificacionesEmpresa $event )
    {
        $usuario = Usuario::find( $event->user->id );

        if ( count( auth()->user()->unreadNotifications ) )
        {
            if ( !DB::table( 'notifications' )->where( [ ['notifiable_id', '=', $event->user->id], ['type', 'LIKE', '*RegistrarEntidadEmpresarial'], ] )->get() )
            {
                if ( !isset( $usuario->empresa ) )
                {
                    $event->user->notify( new RegistrarEntidadEmpresarial() );
                }
            }
            if ( !DB::table( 'notifications' )->where( [ ['notifiable_id', '=', $event->user->id], ['type', 'LIKE', '*GenerarOferta'], ])->get() )
            {
                if ( !isset( $usuario->empresa->oferta ) )
                {
                    $event->user->notify( new GenerarOferta() );
                }
                else
                {
                    if ( is_null( $usuario->empresa->oferta ) )
                    {
                        $event->user->notify( new GenerarOferta() );
                    }
                }
            }
        }
        else
        {
            if ( !isset( $usuario->empresa ) )
            {
                $event->user->notify( new RegistrarEntidadEmpresarial() );
                $event->user->notify( new GenerarOferta() );
            }
            else
            {
                if ( is_null( $usuario->empresa->oferta ) )
                {
                    $event->user->notify( new GenerarOferta() );
                }
            }
        }

    }
}
