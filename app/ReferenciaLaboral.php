<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenciaLaboral extends Model
{
    protected $table        = 'referencia_laboral';    // Nombre de la tabla
    protected $primaryKey   = 'id_referencia_laboral'; // Identicador

    /**
     * Campos de la tabla de referencia_laboral para asignacion masiva
     */
    protected $fillable = [
        'nombre_referencia',
        'cargo_referencia',
        'telefono_referencia',
        'dato_profesional_id'
    ];
}
