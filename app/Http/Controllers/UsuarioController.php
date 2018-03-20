<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\Storage;

// Eventos
use App\Events\ActualizarSession;

// Modelos
use App\Oferta;
use App\Carrera;
use App\Empresa;
use App\Usuario;
use App\Asignacion;
use App\Estudiante;
use App\LineaTiempo;

class UsuarioController extends Controller
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
        $data['usuario']     = session('usuario');
        $data['cliente']     = FALSE;
        $data['ofertas']     = Oferta::where('estado_oferta', '<', 2)->count();
        $data['empresas']    = Empresa::all()->count();
        $data['estudiantes'] = Estudiante::all()->count();
        $data['page_title']  = 'Perfil de Usuario';
        return view('usuario.perfil_usuario', $data);
    }

    public function perfil()
    {
        $data['usuario']     = session('usuario');
        $data['cliente']     = FALSE;
        $data['ofertas']     = Oferta::where('estado_oferta', '<', 2)->count();
        $data['empresas']    = Empresa::all()->count();
        $data['estudiantes'] = Estudiante::all()->count();
        $data['usuarios']    = Usuario::all();
        $data['page_title']  = 'Perfil del Administrador';
        return view('administrador.perfil_admin', $data);
    }

    public function registro()
    {
        return true;
    }

    public function empresas()
    {
        $data['usuario']    = session('usuario');
        $data['empresas']   = Empresa::all();
        $data['page_title'] = 'Empresas Registrados';
        $data['usuarios']   = Usuario::all();
        return view('usuario.empresas', $data);
    }

    public function estudiantes()
    {
        $data['usuario']     = session('usuario');
        $data['carreras']    = Carrera::all();
        $data['estudiantes'] = Estudiante::all();
        $data['page_title']  = 'Estudiantes Registrados';
        $data['usuarios']    = Usuario::all();
        return view('usuario.estudiantes', $data);
    }

    public function ofertas()
    {
        $data['usuario']     = session( 'usuario' );
        $data['ofertas']     = Oferta::all();
        $data['page_title']  = 'Ofertas de Empresas';
        $data['usuarios']    = Usuario::all();
        return view('usuario.ofertas_empresas', $data);
    }
}
