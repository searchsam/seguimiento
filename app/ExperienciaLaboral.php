<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model
{
    protected $table        = 'experiencia_laboral';    // Nombre de la tabla
    protected $primaryKey   = 'id_experiencia_laboral'; // Identicador

    /**
     * Campos de la tabla de experiencia_laboral para asignacion masiva
     */
    protected $fillable = [
        'institucion_laboral',
        'cargo_laboral',
        'cuidad_laboral',
        'periodo_laboral',
        'estudiante_id'
    ];
}
