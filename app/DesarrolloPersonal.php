<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesarrolloPersonal extends Model
{
    protected $table        = 'desarrollo_personal';    // Nombre de la tabla
    protected $primaryKey   = 'id_desarrollo_personal'; // Identicador

    /**
     * Campos de la tabla de desarrollo_personal para asignacion masiva
     */
    protected $fillable = [
        'habilidad_personal',
        'idomas_personal',
        'otro_personal',
        'estudiante_id'
    ];
}
