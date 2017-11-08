<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table        = 'contacto';    // Nombre de la tabla
    protected $primaryKey   = 'id_contacto'; // Identicador

    /**
     * Campos de la tabla de contacto para asignacion masiva
     */
    protected $fillable = [
        'nombre_contacto',
        'apellido_contacto',
        'cedula_contacto',
        'cargo_contacto',
        'email_contacto',
        'telefono_institucional',
        'empresa_id'
    ];
}
