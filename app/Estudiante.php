<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Estudiante extends Model
{

    use Notifiable;

    protected $table        = 'estudiante';    // Nombre de la tabla
    protected $primaryKey   = 'id_estudiante'; // Identicador

    /**
     * Campos de la tabla de estudiante para asignacion masiva
     *
     * @var array
     *
     */
    protected $fillable = [
        'codigo_estudiante',
        'nombre_estudiante',
        'apellido_estudiante',
        'cedula_estudiante',
        'celular_estudiante',
        'telefono_estudiante',
        'direccion_estudiante',
        'email_estudiante',
        'sexo_estudiante',
        'tipo_estudiante_id',
        'dato_profecional_id',
        'usuario_id'
    ];

    /**
     * Obtener el registro del usuario asociado con el estudiante.
     */
    public function usuario()
    {
        return $this->belongsTo('App\Usuario', 'usuario_id');
    }

    /**
     * Obtener el registro de la formacion academica asociado con el estudiante.
     */
    public function formacion_academica()
    {
        return $this->hasMany('App\FormacionAcademica', 'estudiante_id');
    }

    /**
     * Obtener el registro de la experiencia laboral asociado con el estudiante.
     */
    public function experiencia_laboral()
    {
        return $this->hasMany('App\ExperienciaLaboral', 'estudiante_id');
    }

    /**
     * Obtener el registro del desarrollo persosnal asociado con el estudiante.
     */
    public function desarrollo_personal()
    {
        return $this->hasOne('App\DesarrolloPersonal', 'estudiante_id');
    }

    /**
     * Obtener el registro de los reconocimientos asociado con el estudiante.
     */
    public function reconocimiento()
    {
        return $this->hasMany('App\Reconocimiento', 'estudiante_id');
    }

    /**
     * Obtener el registro de las referencias laborales asociado con el estudiante.
     */
    public function referencia_laboral()
    {
        return $this->hasMany('App\ReferenciaLaboral', 'estudiante_id');
    }
}
