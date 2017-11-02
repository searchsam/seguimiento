<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatoProfecional extends Model
{
    protected $table        = 'dato_profesional';    // Nombre de la tabla
    protected $primaryKey   = 'id_dato_profesional'; // Identicador

    /**
     * Campos de la tabla de dato_profecional para asignacion masiva
     */
    protected $fillable = [
        'especializacion',
        'grado_especializacion',
        'situacion_laraboral',
        'monografia_id',
        'experiencia_laboral_id',
        'otro_estudio_id',
        'facultad_id'
    ];
}
