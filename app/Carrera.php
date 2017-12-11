<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table        = 'carrera';    // Nombre de la tabla
    protected $primaryKey   = 'id_carrera'; // Identicador

    /**
     * Campos de la tabla de contacto para asignacion masiva
     */
    protected $fillable = [
        'nombre_carrera',
        'facultad_id'
    ];
}
