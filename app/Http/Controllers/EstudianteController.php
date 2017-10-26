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
        /*$validated = $request->validate([
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
            'tipo_estudio[]'          => ['required', new Selectnumeric],
            'estudio_academico[]'     => 'required|string',
            'institucion_academica[]' => 'required|string',
            'localidad_estudio[]'     => 'required|string',
            'fecha_estudio[]'         => 'required|numeric|integer'
        ]);*/

        $estudiante = new Estudiante;
        $estudiante->codigo_estudiante      = $this->codigo_estudiante();
        $estudiante->nombre_estudiante      = Auth::user()->name;
        $estudiante->apellido_estudiante    = Auth::user()->lastname;
        $estudiante->cedula_estudiante      = $request->cedula;
        $estudiante->telefono_estudiante    = $request->telefono;
        $estudiante->direccion_estudiante   = $request->direccion;
        $estudiante->email_estudiante       = $request->correo;
        $estudiante->sexo_estudiante        = $request->sexo;
        $estudiante->usuario_id             = Auth::id();
        $estudiante->save();
    }

    public function codigo_estudiante()
    {
        $codigo = DB::table( 'estudiante' )->select( 'codigo_estudiante' )->orderBy( 'id_estudiante', 'asc' )->take( 1 )->get();
        $letra = array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Y', 'Z' );
        $consecutivo_literal_key = 0;
        $consecutivo_numeral = 0;
        if ( isset( $codigo ) )
        {
            $codigo = 'C' . $letra[$consecutivo_literal_key] . '-0001';
        }
        else
        {
            $consecutivo_literal = substr($codigo, 1, 1);
            $consecutivo_numeral = (int) substr($codigo, 3, 4);
            foreach ($letra as $key => $value)
            {
                if (strcmp($consecutivo_literal, $value) == 0)
                {
                    $consecutivo_literal_key = $key;
                }
            }
            if ($consecutivo_literal_key >= 25)
            {
                $consecutivo_literal_key = 0;
                $consecutivo_numeral = 0001;
            }
            else
            {
                if ($consecutivo_numeral >= 9999)
                {
                    $consecutivo_literal_key++;
                    $consecutivo_numeral = '0001';
                }
                else
                {
                    $consecutivo_numeral++;
                    $ceros = '000';
                    if ($consecutivo_numeral<10) $ceros = '000';
                    if ($consecutivo_numeral<100) $ceros = '00';
                    if ($consecutivo_numeral<1000) $ceros = '0';
                    if ($consecutivo_numeral>=1000) $ceros = '';
                    $consecutivo_numeral = $ceros . $consecutivo_numeral;
                }
            }

            $codigo = 'C' . $letra[$consecutivo_literal_key] . '-' . $consecutivo_numeral;
        }
        return $codigo;
    }
}
