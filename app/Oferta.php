<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table        = 'oferta';    // Nombre de la tabla
    protected $primaryKey   = 'id_oferta'; // Identicador

    /**
     * Campos de la tabla de oferta para asignacion masiva
     */
    protected $fillable = [
        'fecha_registro_oferta',
        'estado_oferta',
        'fecha_limite_oferta',
        'descripcion_oferta',
        'carrera',
        'empresa_id',
        'tipo_oferta_id'
    ];

    /**
     * Obtener el registro de la empresa asociada con la oferta.
     */
    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'empresa_id');
    }

    /**
     * Obtener el registro del tipo de oferta asociada con la oferta.
     */
    public function tipo_oferta()
    {
        return $this->belongsTo('App\TipoOferta', 'tipo_oferta_id');
    }
}
