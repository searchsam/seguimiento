<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table        = 'empresa';    // Nombre de la tabla
    protected $primaryKey   = 'id_empresa'; // Identicador

    /**
     * Campos de la tabla de empresa para asignacion masiva
     */
    protected $fillable = [
        'nombre_empresa',
        'ruc_empresa',
        'logo_empresa',
        'direccion_empresa',
        'usuario_id'
    ];

    /**
     * Obtener el registro del tipo de usuario asociado con el usuario.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuario_id');
    }

    /**
     * Obtener el registro de oferta asociado con la empresa.
     */
    public function oferta()
    {
        return $this->hasMany('App\Oferta', 'empresa_id');
    }

    /**
     * Obtener el registro del contacto asociado con la empresa.
     */
    public function contacto()
    {
        return $this->hasOne('App\Contacto', 'empresa_id');
    }
}
