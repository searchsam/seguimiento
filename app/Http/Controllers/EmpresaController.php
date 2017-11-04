<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Eventos
use App\Events\NotificacionesEmpresa;

// Modelos
use App\Empresa;

class EmpresaController extends Controller
{
    public function index()
    {
        $data['usuario'] = session('usuario');
        $data['cliente'] = Empresa::where('usuario_id', Auth::id())->get();
        $data['page_title'] = 'Perfil de Empresa';
        return view('tablero.perfil_empresa', $data);
    }

    public function registro()
    {
        $data['usuario']        = session('usuario');
        //$data['tipo_estudio']   = TipoEstudio::all();
        $data['page_title']     = 'Registrar Entidad Empresarial';

        return view('tablero.entidad', $data);
    }

    public function registrar()
    {
        event(new NotificacionesEmpresa(Auth::user()));
        return view('tablero.curriculum');
    }
}
