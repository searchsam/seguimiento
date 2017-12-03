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

    /**
     * Obtener el registro del estudiante asociado con el desarrollo personal.
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'estudiante_id');
    }
}
