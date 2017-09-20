<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Estudiante;

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
        $data['page_title'] = 'Registrar Curriculum';
        return view('tablero.curriculum', $data);
    }
}
