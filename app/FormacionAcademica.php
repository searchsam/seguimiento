<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormacionAcademica extends Model
{
    protected $table        = 'formacion_academica';    // Nombre de la tabla
    protected $primaryKey   = 'id_formacion_academica'; // Identicador

    /**
     * Campos de la tabla de formacion_academica para asignacion masiva
     */
    protected $fillable = [
        'nombre_estudio',
        'institucion_estudio',
        'localidad_estudio',
        'fecha_estudio',
        'tipo_estudio_id',
        'estudiante_id'
    ];
}
