<?php

namespace App\Listeners;

use App\Events\EmailConfirmado;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Notification;

class EnviarNotificacionEmailConfirmado
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
     * @param  EmailConfirmado  $event
     * @return void
     */
    public function handle(EmailConfirmado $event)
    {
        foreach ($event->user->unreadNotifications as $notificacion) {
            if ( str_is($notificacion->type, 'App\Notifications\VerificacionEmail') ) {
                $notificacion->markAsRead();
            }
        }
    }
}
