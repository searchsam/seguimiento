<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Oferta;
use App\Usuario;
use App\TipoOferta;

class OfertaController extends Controller
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
        $data['usuario']     = session( 'usuario' );
        $usuario             = Usuario::find( Auth::id() )->empresa;
        $data['cliente']     = Oferta::where(  'empresa_id', $usuario->id_empresa )->get();
        $data['tipo_oferta'] = TipoOferta::all();
        $data['page_title']  = 'Ofertas de Empresa';
        return view('tablero.ofertas_empresa', $data);
    }

    public function registro()
    {
        $data['usuario']    = session( 'usuario' );
        $data['page_title'] = 'Generar Oferta';
        return view('tablero.oferta', $data);
    }

    public function registrar(Request $request)
    {
        dd($request->all());
        event( new MarcarComoLeida( Auth::user(), 'GenerarOferta' ) );
        return redirect()->route( 'ofertas' );
    }
}
