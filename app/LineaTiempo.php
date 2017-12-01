<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineaTiempo extends Model
{
    protected $table        = 'linea_tiempo';    // Nombre de la tabla
    protected $primaryKey   = 'id_linea_tiempo'; // Identicador

    /**
     * Campos de la tabla de empresa para asignacion masiva
     */
    protected $fillable = [
        'tipo_evento_id',
        'usuario_id'
    ];

    /**
     * Obtener el registro del usuario asociado con la linea de tiempo.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuario_id');
    }

    /**
     * Obtener el registro del evento asociado con la linea de tiempo.
     */
    public function tipo_evento()
    {
        return $this->belongsTo('App\TipoEvento', 'tipo_evento_id');
    }
}
