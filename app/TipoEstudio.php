<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstudio extends Model
{
    protected $table        = 'tipo_estudio';
    protected $primaryKey   = 'id_tipo_estudio';

    /**
     * Obtener el registro de la formacion academica asociado con el estudiante.
     */
    public function formacion_academica()
    {
        return $this->hasMany('App\FormacionAcademica', 'tipo_estudio_id');
    }
}
