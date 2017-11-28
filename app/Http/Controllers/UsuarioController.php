<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use Illuminate\Support\Facades\Storage;

// Eventos
use App\Events\ActualizarSession;

// Modelos
use App\Usuario;

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
        $data['usuario']    = session('usuario');
        $data['cliente']    = NULL;
        $data['page_title'] = 'Perfil de Usuario';
        return view('usuario.perfil_usuario', $data);
    }

    public function registro()
    {
        
    }
}
