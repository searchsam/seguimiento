<?php

namespace App\Listeners;

use App\Events\MarcarComoLeida;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Notification;

class MarcarNotificacion implements ShouldQueue
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
     * @param  MarcarComoMeida  $event
     * @return void
     */
    public function handle(MarcarComoLeida $event)
    {
        $tipo_notificacion = 'App\Notifications\\' . $event->notificacion;
        
        foreach ( $event->user->unreadNotifications as $notificacion ) {
            if ( str_is( $notificacion->type, $tipo_notificacion ) ) {
                $notificacion->markAsRead();
            }
        }
    }
}
