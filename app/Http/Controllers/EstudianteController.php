<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Validator;
use App\Usuario;
use App\Estudiante;
use App\TipoEstudio;
use App\Rules\Selectnumeric;
use App\Events\NotificacionesEstudiante;

class EstudianteController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function registro()
    {
        $data['usuario']        = session('usuario');
        $data['tipo_estudio']   = TipoEstudio::all();
        $data['page_title']     = 'Registrar Plan de Estudios';

        event(new NotificacionesEstudiante(Auth::user()));

        return view('tablero.curriculum', $data);
    }

    public function registrar(Request $request)
    {
        dd($request->all());
        $validator = Validator::make( $request->all(), [
            // Datos personales
            'sexo'      => 'required|boolean',
            'cedula'    => 'required|string',
            'celular'   => 'required|string',
            'telefono'  => 'required|string',
            'correo'    => 'email|required|string',
            'ciudad'    => 'required|string',
            'direccion' => 'required|string',
            'foto'      => 'required|image',

            // Formacion academica
            'tipo_estudio'          => ['required', new Selectnumeric],
            'estudio_academico'     => 'required|string',
            'institucion_academica' => 'required|string',
            'localidad_estudio'     => 'required|string',
            'fecha_estudio'         => 'required|numeric|interger'
        ]);

        return back()
            ->withErrors( $validator )
            ->withInput(
                request([
                    'sexo',
                    'cedula',
                    'celular',
                    'telefono',
                    'correo',
                    'ciudad',
                    'direccion',
                    'foto',
                    'tipo_estudio',
                    'estudio_academico',
                    'institucion_academica',
                    'localidad_estudio',
                    'fecha_estudio',
                    'cargo_laboral',
                    'institucion_laboral',
                    'ciudad_empresa',
                    'periodo_laboral',
                    'habilidad',
                    'idioma',
                    'otro',
                    'merito_reconocimiento',
                    'organizacion_reconocimiento',
                    'ciudad_reconocimiento',
                    'periodo_reconocimiento',
                    'nombre_referencia',
                    'cargo_referencia',
                    'telefono_referencia'
                ])
            );
    }
}
