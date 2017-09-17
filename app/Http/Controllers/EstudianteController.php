<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    public function index()
    {

    }

    public function registrar()
    {
        return View::('tablero.curriculum');
    }
}
