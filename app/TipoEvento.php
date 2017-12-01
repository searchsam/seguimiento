<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table        = 'tipo_evento';
    protected $primaryKey   = 'id_tipo_evento';

    /**
     * Campos de la tabla de tipo evento para asignacion masiva
     */
    protected $fillable = [
        'evento'
    ];
}
