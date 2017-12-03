<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table        = 'tipo_evento';
    protected $primaryKey   = 'id_tipo_evento';

    /**
     * Campos de la tabla de tipo evento para asignacion masiva
     */
    protected $fillable = [
        'evento'
    ];

    /**
     * Obtener el registro de la empresa asociado con el usuario.
     */
    public function linea_tiempo()
    {
        return $this->hasMany('App\LineaTiempo', 'tipo_evento_id');
    }
}
