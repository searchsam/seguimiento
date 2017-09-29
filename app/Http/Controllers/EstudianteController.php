<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Usuario;
use App\Estudiante;
use App\TipoEstudio;
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

    public function registrar()
    {
        $data['usuario']        = session('usuario');
        $data['tipo_estudio']   = TipoEstudio::all(); 
        $data['page_title']     = 'Registrar Plan de Estudios';

        event(new NotificacionesEstudiante(Auth::user()));

        return view('tablero.curriculum', $data);
    }
}
