<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOferta extends Model
{
    protected $table        = 'tipo_oferta';    // Nombre de la tabla
    protected $primaryKey   = 'id_tipo_oferta'; // Identicador

    /**
     * Obtener el registro del tipo de oferta asociado con la oferta.
     */
    public function oferta()
    {
        return $this->hasOne('App\Oferta', 'tipo_oferta_id');
    }
}
