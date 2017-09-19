<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table        = 'estudiante';    // Nombre de la tabla
    protected $primaryKey   = 'id_estudiante'; // Identicador

    /**
     * Campos de la tabla de usuario para asignacion masiva
     */
    protected $fillable = [
        'carnet',
        'nombre_estudiante',
        'apellido_estudiante',
        'cedula_estudiante',
        'telefono_estudiante',
        'direccion_estudiante',
        'email_estudiante',
        'edad_estudiante',
        'tipo_estudiante_id',
        'dato_profecional_id',
        'usuario_id'
    ];
    /**
     * Get the user that owns the phone.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
