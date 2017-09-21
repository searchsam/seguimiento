<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use App\Events\UsuarioUpdated;

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
     * Obtener el registro del tipo de usuario asociado con el usuario.
     */
    public function tipousuario()
    {
        return $this->belongsTo('App\TipoUsuario', 'tipo_usuario_id');
    }

    /**
     * Obtener el registro del estudiante asociado con el usuario.
     */
    public function estudiante()
    {
        return $this->hasOne('App\Estudiante', 'usuario_id');
    }

    /**
     * Obtener el registro del estudiante asociado con el usuario.
     */
    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'usuario_id');
    }
}
