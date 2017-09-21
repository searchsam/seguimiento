<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Estudiante;
use App\Usuario;

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
        $data['usuario'] = session('usuario');
        $data['page_title'] = 'Registrar Plan de Estudios';
        return view('tablero.curriculum', $data);
    }
}
