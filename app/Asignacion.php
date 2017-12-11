<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table        = 'asignacion';    // Nombre de la tabla
    protected $primaryKey   = 'id_asignacion'; // Identicador

    /**
     * Campos de la tabla de empresa para asignacion masiva
     */
    protected $fillable = [
        'oferta_id',
        'estudiante_id',
        'aplica'
    ];

    /**
     * Obtener el registro del estudiante asociado con la asignacion.
     */
    public function estudiante()
    {
        return $this->belongsTo('App\Estudiante', 'estudiante_id');
    }

    /**
     * Obtener el registro de la oferta asociado con la asignacion.
     */
    public function oferta()
    {
        return $this->belongsTo('App\Oferta', 'oferta_id');
    }
}
