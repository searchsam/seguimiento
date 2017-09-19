<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Estudiante;
use App\Events\VerificacionEmail;

class EstudianteController extends Controller
{
    public function registrar()
    {

        $data['usuario'] = session('usuario');
        $data['page_title'] = 'Registrar Curriculum';
        return view('tablero.curriculum', $data);
    }
}
