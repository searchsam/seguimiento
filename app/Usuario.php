<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table        = 'usuario';
    protected $primaryKey   = 'id_usuario';

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
}
