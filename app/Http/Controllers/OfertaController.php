<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Selectnumeric;
use Illuminate\Support\Facades\Auth;

// Eventos
use App\Events\MarcarComoLeida;
use App\Events\GenerarLineaTiempo;
use App\Events\NotificacionesOferta;
use App\Events\NotificacionesAplicacion;

// Modelos
use App\Oferta;
use App\Carrera;
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

        event( new MarcarComoLeida( Auth::user(), 'GenerarAplicacion' ) );
        return view('tablero.ofertas_empresa', $data);
    }

    public function registro()
    {
        $usuario = session( 'usuario' );
        if ( $usuario->empresa )
        {
            $data['usuario']     = $usuario;
            $data['tipo_oferta'] = TipoOferta::all();
            $data['carreras']    = Carrera::all();
            $data['page_title']  = 'Generar Oferta';
            return view( 'tablero.oferta', $data );
        }
        return back()->with( 'flash', 'Por favor regristre la identidad de la empresa.' );
    }

    public function registrar(Request $request)
    {
        $validate = $request->validate([
            'tipo_oferta'     => ['required', new Selectnumeric],
            'limite'          => 'nullable|string',
            'oferta_carreras' => 'required|string',
            'descripcion'     => 'required|string',
        ]);

        dd($request->limite)

        $empresa = Usuario::find( Auth::id() )->empresa;
        $oferta = new Oferta;
        $oferta->fecha_registro_oferta  = now()->toFormattedDateString();
        $oferta->fecha_limite_oferta    = $request->limite;
        $oferta->descripcion_oferta     = $request->descripcion;
        $oferta->carrera                = $request->oferta_carreras;
        $oferta->tipo_oferta_id         = $request->tipo_oferta;
        $oferta->empresa_id             = $empresa->id_empresa;
        $oferta->save();

        event( new GenerarLineaTiempo( Auth::user(), 6 ) );
        event( new MarcarComoLeida( Auth::user(), 'GenerarOferta' ) );
        event( new NotificacionesOferta( Auth::user() ) );
        return redirect()->route( 'ofertas' );
    }

    public function usuario_ofertas()
    {
        $data['usuario']     = session( 'usuario' );
        $data['ofertas']     = Oferta::all();
        $data['page_title']  = 'Ofertas de Empresas';
        event( new MarcarComoLeida(Auth::user(), 'GenerarAplicacion' ) );
        event( new MarcarComoLeida( Auth::user(), 'RegistrarOferta' ) );
        event( new MarcarComoLeida( Auth::user(), 'AtenderOferta' ) );
        return view('usuario.ofertas_empresas', $data);
    }

    // Cambia el estado de una oferta hacia aplicacion
    public function atender(Oferta $oferta)
    {
        $oferta->estado_oferta = 2;
        $oferta->save();
        event( new NotificacionesAplicacion(Auth::user(), $oferta->empresa->id_empresa ) );
        return redirect()->route( 'ver_ofertas' );
    }

    public function historial_oferta()
    {
        $data['usuario']     = session('usuario');
        $data['cliente']     = FALSE;
        $data['ofertas']     = Oferta::all();
        $data['page_title']  = 'Historial de Ofertas';
        return view('usuario.historial_ofertas', $data);
    }
}
