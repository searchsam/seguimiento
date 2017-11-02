<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {

    }

    public function registrar()
    {
        return view('tablero.curriculum');
    }
}
