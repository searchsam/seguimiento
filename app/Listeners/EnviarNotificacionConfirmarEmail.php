<?php

namespace App\Listeners;

use App\Events\ConfirmarEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Notification;
use App\Notifications\VerificacionEmail;
use App\Notifications\NotificacionError;

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

        auth()->user()->notify(new VerificacionEmail());
    }

    /**
     * Handle a job failure.
     *
     * @param  \App\Events\ConfirmarEmail  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(ConfirmarEmail $event, $exception)
    {
        //\Notification::route('nexmo', '+50586745072')->notify(new NotificacionError($event->user));
    }
}
