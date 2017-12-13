<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AsignarNotificacion extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function via($notifiable)
     {
         return ['database'];//, 'mail'];
     }

     /**
      * Get the mail representation of the notification.
      *
      * @param  mixed  $notifiable
      * @return \Illuminate\Notifications\Messages\MailMessage
      */
     public function toMail($notifiable)
     {
         return (new MailMessage)->markdown('emails.confirmacion', ['usuario' => $notifiable]);
     }

     /**
      * Get the array representation of the notification.
      *
      * @param  mixed  $notifiable
      * @return array
      */
     public function toDatabase($notifiable)
     {
         return [
             'tipo' => 'bell',
             'text' => 'Se te ha enviado una oferta.',
             'ruta' => 'ver_ofertas'
         ];
     }
}
