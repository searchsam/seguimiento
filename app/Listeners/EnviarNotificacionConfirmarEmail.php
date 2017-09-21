<?php

namespace App\Listeners;

use App\Events\ConfirmarEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Notification;
use App\Notifications\VerificacionEmail;

class EnviarNotificacionConfirmarEmail implements ShouldQueue
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
     * @param  ConfirmarEmail  $event
     * @return void
     */
    public function handle(ConfirmarEmail $event)
    {
        $event->user->notify(new VerificacionEmail());
    }
}
