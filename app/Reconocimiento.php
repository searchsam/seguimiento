<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reconocimiento extends Model
{
    protected $table        = 'reconocimiento';    // Nombre de la tabla
    protected $primaryKey   = 'id_reconocimiento'; // Identicador

    /**
     * Campos de la tabla de reconocimiento para asignacion masiva
     */
    protected $fillable = [
        'merito_reconocimiento',
        'organizacion_reconocimiento',
        'ciudad_reconocimiento',
        'fecha_reconocimiento',
        'estudiante_id'
    ];

    /**
     * Obtener el registro del estudiante asociado con los reconociemintos.
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'estudiante_id');
    }
}
