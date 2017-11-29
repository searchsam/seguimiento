<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Selectnumeric;
use Illuminate\Support\Facades\Auth;

// Eventos
use App\Events\MarcarComoLeida;

// Modelos
use App\Oferta;
use App\Empresa;
use App\Usuario;
use App\Contacto;
use App\TipoOferta;
use App\LineaTiempo;

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
        $data['contacto']    = Empresa::find(  $usuario->id_empresa )->contacto;
        $data['tipo_oferta'] = TipoOferta::all();
        $data['page_title']  = 'Ofertas de Empresa';
        return view('tablero.ofertas_empresa', $data);
    }

    public function registro()
    {
        $usuario = session( 'usuario' );
        if ( $usuario->empresa )
        {
            $data['usuario']     = $usuario;
            $data['tipo_oferta'] = TipoOferta::all();
            $data['page_title']  = 'Generar Oferta';
            return view( 'tablero.oferta', $data );
        }
        return back()->with( 'flash', 'Por favor regristre la identidad de la empresa.' );
    }

    public function registrar(Request $request)
    {
        $validate = $request->validate([
            'tipo_oferta' => ['required', new Selectnumeric],
            'limite'      => 'nullable|string',
            'descripcion' => 'required|string',
        ]);

        $empresa = Usuario::find( Auth::id() )->empresa;
        $oferta = new Oferta;
        $oferta->fecha_registro_oferta  = now()->toFormattedDateString();
        $oferta->fecha_limite_oferta    = $request->limite;
        $oferta->descripcion_oferta     = $request->descripcion;
        $oferta->tipo_oferta_id         = $request->tipo_oferta;
        $oferta->empresa_id             = $empresa->id_empresa;
        $oferta->save();

        LineaTiempo::create([
            'evento'     => 'Genero una oferta ' . $oferta->tipo_oferta->tipo_oferta . '.',
            'usuario_id' => Auth::id(),
        ]);

        event( new MarcarComoLeida( Auth::user(), 'GenerarOferta' ) );
        return redirect()->route( 'ofertas' );
    }

    public function usuario_ofertas()
    {
        $data['usuario']     = session( 'usuario' );
        $data['ofertas']     = Oferta::all();
        $data['page_title']  = 'Ofertas de Empresas';
        return view('usuario.ofertas_empresas', $data);
    }
}
