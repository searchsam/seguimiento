<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use Notifiable;
    
    protected $table        = 'usuario';    // Nombre de la tabla
    protected $primaryKey   = 'id_usuario'; // Identicador

    /**
     * Campos de la tabla de usuario para asignacion masiva
     */
    protected $fillable = [
        'nombre_usuario',
        'apellido_usuario',
        'email_usuario',
        'contrasena',
        'estado_usuario',
        'fecha_registro',
        'foto_usuario',
        'tipo_usuario_id'
    ];

    /**
     * Devuelve los registros realcionados de la tabla de estudiante
     */
    public function estudiante()
    {
        return $this->hasOne('App\Estudiante');
    }
}
