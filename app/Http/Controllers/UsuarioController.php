<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\Storage;

// Eventos
use App\Events\ActualizarSession;

// Modelos
use App\Oferta;
use App\Empresa;
use App\Usuario;
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
        $data['ofertas']     = Oferta::all()->count();
        $data['empresas']    = Empresa::all()->count();
        $data['estudiantes'] = Estudiante::all()->count();
        $data['page_title']  = 'Perfil de Usuario';
        return view('usuario.perfil_usuario', $data);
    }

    public function registro()
    {

    }
}
