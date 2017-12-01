<?php

namespace App\Listeners;

use App\Events\GenerarLineaTiempo;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Usuario;
use App\LineaTiempo;

class CrearEvento implements ShouldQueue
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
     * @param  GenerarLineaTiempo  $event
     * @return void
     */
    public function handle(GenerarLineaTiempo $event)
    {
        $tmp = LineaTiempo::where([ ['usuario_id', '=', $event->user->id], ['tipo_evento_id', '=', $event->evento],])->get();
        switch ( $event->evento ) {
            case 1:
                if( count($tmp) ) break;
                $linea = new LineaTiempo;
                $linea->tipo_evento_id = $event->evento;
                $linea->usuario_id = $event->user->id;
                $linea->save();
                break;
            case 2:
                if( count($tmp) ) break;
                $linea = new LineaTiempo;
                $linea->tipo_evento_id = $event->evento;
                $linea->usuario_id = $event->user->id;
                $linea->save();
                break;
            case 3:
                if( count($tmp) ) break;
                $linea = new LineaTiempo;
                $linea->tipo_evento_id = $event->evento;
                $linea->usuario_id = $event->user->id;
                $linea->save();
                break;
            case 4:
                if( count($tmp) ) $event->evento = 5;
                $linea = new LineaTiempo;
                $linea->tipo_evento_id = $event->evento;
                $linea->usuario_id = $event->user->id;
                $linea->save();
                break;
            case 5:
                if( count($tmp) ) break;
                $linea = new LineaTiempo;
                $linea->tipo_evento_id = $event->evento;
                $linea->usuario_id = $event->user->id;
                $linea->save();
                break;
            default:
                $linea = new LineaTiempo;
                $linea->tipo_evento_id = $event->evento;
                $linea->usuario_id = $event->user->id;
                $linea->save();
                break;
        }

    }
}
