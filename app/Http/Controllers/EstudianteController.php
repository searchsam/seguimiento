<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Validator;
use App\Rules\Selectnumeric;
use Illuminate\Support\Facades\Storage;

// Eventos
use App\Events\MarcarComoLeida;
use App\Events\ActualizarSession;
use App\Events\GenerarLineaTiempo;
use App\Events\NotificacionesEstudiante;

// Modelos
use App\Usuario;
use App\Estudiante;
use App\TipoEstudio;
use App\LineaTiempo;
use App\Reconocimiento;
use App\ReferenciaLaboral;
use App\DesarrolloPersonal;
use App\ExperienciaLaboral;
use App\FormacionAcademica;

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

    public function index()
    {
        $data['usuario']    = session('usuario');
        $data['cliente']    = Estudiante::where( 'usuario_id', Auth::id() )->get();
        $data['page_title'] = 'Perfil de Estudiante';
        return view('tablero.perfil_estudiante', $data);
    }

    public function registro()
    {
        $data['usuario']        = session('usuario');
        $data['tipo_estudio']   = TipoEstudio::all();
        $data['page_title']     = 'Registrar Plan de Estudios';

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

        // Guardar Estudiante
        $estudiante = new Estudiante;
        if ( !empty($request->cedula) and !empty($request->celular) and !empty($request->direccion) and !empty($request->correo) and isset($request->sexo) and !empty($request->ciudad) )
        {
            $estudiante->codigo_estudiante    = $this->gen_codestudiante();
            $estudiante->nombre_estudiante    = Auth::user()->name;
            $estudiante->apellido_estudiante  = Auth::user()->lastname;
            $estudiante->cedula_estudiante    = trim( $request->cedula );
            $estudiante->celular_estudiante   = trim( $request->celular );
            $estudiante->telefono_estudiante  = trim( $request->telefono );
            $estudiante->direccion_estudiante = trim( $request->direccion );
            $estudiante->ciudad_estudiante    = trim( $request->ciudad );
            $estudiante->email_estudiante     = trim( $request->correo );
            $estudiante->sexo_estudiante      = trim( $request->sexo );
            $estudiante->usuario_id           = Auth::id();
            $estudiante->save();
        }

        // Almacenar y guardar foto de usuario
        if ( isset( $request->foto ) )
        {
            // Subir foto
            $img_dir = $request->file( 'foto' )->storeAs( 'fotos', $this->fotos_name( Auth::user()->name ) );

            // Guardar foto
            $usuario = Usuario::find( Auth::id() );
            $usuario->foto_usuario = 'storage/' . $img_dir;
            $usuario->save();

            event(new ActualizarSession(Auth::user()));
        }
        // Guardar datos de formacion academica
        if ( $estudio = $this->formacion_academica_ordered( $request->tipo_estudio, $request->estudio_academico, $request->institucion_academica, $request->localidad_estudio, $request->fecha_estudio ) )
        {
            // Guardar cada elemento del arreglo
            foreach ($estudio as $value) {
                $formacion = new FormacionAcademica;
                $formacion->nombre_estudio      = trim( $value->estudio_academico );
                $formacion->institucion_estudio = trim( $value->institucion_academica );
                $formacion->localidad_estudio   = trim( $value->localidad_academica );
                $formacion->fecha_estudio       = trim( $value->fecha_academica );
                $formacion->tipo_estudio_id     = trim( $value->tipo_estudio );
                $formacion->estudiante_id       = $estudiante->id_estudiante;
                $formacion->save();
            }
        }

        // Guardar datos de experiencia laboral
        if ( $laboral = $this->experiencia_laboral_ordered( $request->cargo_laboral, $request->institucion_laboral, $request->ciudad_empresa, $request->periodo_laboral ) )
        {
            // Guardar cada elemento del arreglo
            foreach ($laboral as $value) {
                $experiencia = new ExperienciaLaboral;
                $experiencia->institucion_laboral = trim( $value->cargo_laboral );
                $experiencia->cargo_laboral       = trim( $value->institucion_laboral );
                $experiencia->cuidad_laboral      = trim( $value->ciudad_empresa );
                $experiencia->periodo_laboral     = trim( $value->periodo_laboral );
                $experiencia->estudiante_id       = $estudiante->id_estudiante;
                $experiencia->save();
            }
        }

        // Guarda datos de habilidades personales
        if ( !is_null($request->habilidad) or !is_null($request->idioma) or !is_null($request->otro) )
        {
            $desarrollo = new DesarrolloPersonal;
            $desarrollo->habilidad_personal = trim( $request->habilidad );
            $desarrollo->idomas_personal    = trim( $request->idioma );
            $desarrollo->otro_personal      = trim( $request->otro );
            $desarrollo->estudiante_id      = $estudiante->id_estudiante;
            $desarrollo->save();
        }

        // Guardar datos de reconocimientos
        if ( $merito = $this->reconocimientos_ordered( $request->merito_reconocimiento, $request->organizacion_reconocimiento, $request->ciudad_reconocimiento, $request->periodo_reconicimiento ) )
        {
            // Guardar cada elemento del arreglo
            foreach ($merito as $value) {
                $reconocimiento = new Reconocimiento;
                $reconocimiento->merito_reconocimiento       = trim( $value->merito_reconocimiento );
                $reconocimiento->organizacion_reconocimiento = trim( $value->organizacion_reconocimiento );
                $reconocimiento->ciudad_reconocimiento       = trim( $value->ciudad_reconocimiento );
                $reconocimiento->fecha_reconocimiento        = trim( $value->periodo_reconicimiento );
                $reconocimiento->estudiante_id               = $estudiante->id_estudiante;
                $reconocimiento->save();
            }
        }

        // Guardar datos de referencia laboral
        if ( $referencias = $this->referencia_laboral_ordered( $request->nombre_referencia, $request->cargo_referencia, $request->telefono_referencia ) )
        {
            // Guardar cada elemento del arreglo
            foreach ($referencias as $value) {
                $referencia_laboral = new ReferenciaLaboral;
                $referencia_laboral->nombre_referencia   = trim( $value->nombre_referencia );
                $referencia_laboral->cargo_referencia    = trim( $value->cargo_referencia );
                $referencia_laboral->telefono_referencia = trim( $value->telefono_referencia );
                $referencia_laboral->estudiante_id       = $estudiante->id_estudiante;
                $referencia_laboral->save();
            }
        }

        event( new GenerarLineaTiempo( Auth::user(), 3 ) );
        event(new MarcarComoLeida(Auth::user(), 'RegistrarPlanEstudios'));
        return redirect()->route( 'perfil_estudiante' );
    }

    // Generar codigo de curriculum de estudiante
    public function gen_codestudiante()
    {
        $letra = array( 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'Y', 'Z' );
        $consecutivo_literal_key = 0;
        $consecutivo_numeral = 0;

        // Verificar condigo existentes
        $codigo = DB::table( 'estudiante' )->select( 'codigo_estudiante' )->orderBy( 'id_estudiante', 'desc' )->take( 1 )->get();

        if ( count( $codigo ) == 0 )
        {
            // Sino existe codigo previo
            $codigo = 'C' . $letra[$consecutivo_literal_key] . '-0001';
        }
        else
        {
            // Si existe codigo previo
            $codigo_actual       = $codigo[0]->codigo_estudiante;
            $consecutivo_literal = substr( $codigo_actual, 1, 1 );
            $consecutivo_numeral = (int) substr( $codigo_actual, 3, 4 );
            // Verificacion de las partes secuenciles del codigo
            foreach ( $letra as $key => $value )
            {
                // Verificar la letra actual
                if ( strcmp( $consecutivo_literal, $value ) == 0 )
                {
                    $consecutivo_literal_key = $key;
                }
            }
            // Verificar si es la ultima letra
            if ( $consecutivo_literal_key >= 25 )
            {
                $consecutivo_literal_key = 0;
                $consecutivo_numeral     = 0001;
            }
            else
            {
                // Verificar si el ultimo numero
                if ( $consecutivo_numeral >= 9999 )
                {
                    $consecutivo_literal_key++;
                    $consecutivo_numeral = '0001';
                }
                else
                {
                    // Verificar el siguiete numero y la cantidad de ceros
                    $consecutivo_numeral++;
                    $ceros = '000';
                    if ( $consecutivo_numeral<10 ) $ceros = '000';
                    if ( $consecutivo_numeral>=10 and $consecutivo_numeral<100 ) $ceros = '00';
                    if ( $consecutivo_numeral>=100 and $consecutivo_numeral<1000 ) $ceros = '0';
                    if ( $consecutivo_numeral>=1000 ) $ceros = '';
                    $consecutivo_numeral = $ceros . $consecutivo_numeral;
                }
            }
            // Generar codigo
            $codigo = 'C' . $letra[$consecutivo_literal_key] . '-' . $consecutivo_numeral;
        }
        return $codigo;
    }

    // Generar nombre de archivo para la foto de usuario
    public function fotos_name( string $name )
    {
        // Elimina los espacios en blanco
        $name = str_replace( ' ', '', trim( $name ) );
        $name = strtolower( $name );
        return $name;
    }

    // Ordena los datos de la formacion academica para assignacion masiva
    public function formacion_academica_ordered( array $tipo_estudio, $estudio_academico, $institucion_academica, $localidad_estudio, $fecha_estudio )
    {
        $contador_vacios = 0;
        $variable        = array();
        // Ciclo de la cantidad de elementos de los arreglos
        for ($i=0; $i<count($tipo_estudio); $i++)
        {
            // Verificar que los arreglos no esten vacios
            if( !empty($tipo_estudio[$i]) and !empty($estudio_academico[$i]) and !empty($institucion_academica[$i]) and !empty($localidad_estudio[$i]) and !empty($fecha_estudio[$i]) )
            {
                // Crear el nuevo objeto con los elementos ornados
                $variable[] = (object) array(
                    'tipo_estudio'          => trim($tipo_estudio[$i]),
                    'estudio_academico'     => trim($estudio_academico[$i]),
                    'institucion_academica' => trim($institucion_academica[$i]),
                    'localidad_academica'   => trim($localidad_estudio[$i]),
                    'fecha_academica'       => trim($fecha_estudio[$i])
                );
                // Contador de elementos no vacios
                $contador_vacios++;
            }
        }
        return ($contador_vacios>0) ? $variable : false;
    }

    // Ordena los datos de experiencia laboral para assignacion masiva
    public function experiencia_laboral_ordered( array $cargo_laboral, $institucion_laboral, $ciudad_empresa, $periodo_laboral )
    {
        $contador_vacios = 0;
        $variable = array();
        // Ciclo de la cantidad de elementos de los arreglos
        for ($i=0; $i<count($cargo_laboral); $i++)
        {
            // Verificar que los arreglos no esten vacios
            if( !empty($cargo_laboral[$i]) and !empty($institucion_laboral[$i]) and !empty($ciudad_empresa[$i]) and !empty($periodo_laboral[$i]) )
            {
                // Crear el nuevo objeto con los elementos ornados
                $variable[] = (object) array(
                    'cargo_laboral'       => trim($cargo_laboral[$i]),
                    'institucion_laboral' => trim($institucion_laboral[$i]),
                    'ciudad_empresa'      => trim($ciudad_empresa[$i]),
                    'periodo_laboral'     => trim($periodo_laboral[$i])
                );
                // Contador de elementos no vacios
                $contador_vacios++;
            }
        }
        return ($contador_vacios>0) ? $variable : false;
    }

    // Ordena los datos de experiencia laboral para assignacion masiva
    public function reconocimientos_ordered( array $merito_reconocimiento, $organizacion_reconocimiento, $ciudad_reconocimiento, $periodo_reconicimiento )
    {
        $contador_vacios = 0;
        $variable = array();
        // Ciclo de la cantidad de elementos de los arreglos
        for ($i=0; $i<count($merito_reconocimiento); $i++)
        {
            // Verificar que los arreglos no esten vacios
            if( !empty($merito_reconocimiento[$i]) and !empty($organizacion_reconocimiento[$i]) and !empty($ciudad_reconocimiento[$i]) and !empty($periodo_reconicimiento[$i]) )
            {
                // Crear el nuevo objeto con los elementos ornados
                $variable[] = (object) array(
                    'merito_reconocimiento'       => trim($merito_reconocimiento[$i]),
                    'organizacion_reconocimiento' => trim($organizacion_reconocimiento[$i]),
                    'ciudad_reconocimiento'       => trim($ciudad_reconocimiento[$i]),
                    'periodo_reconicimiento'      => trim($periodo_reconicimiento[$i])
                );
                // Contador de elementos no vacios
                $contador_vacios++;
            }
        }
        return ($contador_vacios>0) ? $variable : false;
    }

    public function referencia_laboral_ordered( array $nombre_referencia, $cargo_referencia, $telefono_referencia )
    {
        $contador_vacios = 0;
        $variable = array();
        for ($i=0; $i<3; $i++)
        {
            if( !empty($nombre_referencia[$i]) and !empty($cargo_referencia[$i]) and !empty($telefono_referencia[$i]) )
            {
                $variable[] = (object) array(
                    'nombre_referencia'   => trim($nombre_referencia[$i]),
                    'cargo_referencia'    => trim($cargo_referencia[$i]),
                    'telefono_referencia' => trim($telefono_referencia[$i])
                );
                $contador_vacios++;
            }
        }

        return ($contador_vacios>0) ? $variable : false;
    }

    public function subir()
    {
        $usuario = session( 'usuario' );
        if ( $usuario->estudiante )
        {
            event( new GenerarLineaTiempo( Auth::user(), 4 ) );
            return false;
        }
        return back()->with( 'flash', 'Por favor regristre el plan de estudio.' );
    }

}
