<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table        = 'empresa';    // Nombre de la tabla
    protected $primaryKey   = 'id_empresa'; // Identicador

    /**
     * Obtener el registro del estudiante asociado con el usuario.
     */
    public function oferta()
    {
        return $this->hasOne('App\Oferta', 'empresa_id');
    }
}
