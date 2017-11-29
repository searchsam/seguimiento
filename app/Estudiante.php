<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table        = 'estudiante';    // Nombre de la tabla
    protected $primaryKey   = 'id_estudiante'; // Identicador

    /**
     * Campos de la tabla de estudiante para asignacion masiva
     */
    protected $fillable = [
        'codigo_estudiante',
        'nombre_estudiante',
        'apellido_estudiante',
        'cedula_estudiante',
        'celular_estudiante',
        'telefono_estudiante',
        'direccion_estudiante',
        'email_estudiante',
        'sexo_estudiante',
        'tipo_estudiante_id',
        'dato_profecional_id',
        'usuario_id'
    ];

    /**
     * Obtener el registro del usuario asociado con el estudiante.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuario_id');
    }
}
