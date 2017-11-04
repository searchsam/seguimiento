<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;
use App\Usuario;
use App\Events\NotificacionesEmpresa;
use App\Events\NotificacionesEstudiante;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'acceder']);
    }

    public function acceder()
    {
        $credentials = $this->validate(request(), [
            'email'     => 'email|required|string',
            'password'  => 'required|string'
        ]);

        if(Auth::attempt($credentials))
        {
            $usuario = Usuario::find(Auth::id());
            session(['usuario' => $usuario]);

            if ( $usuario->tipo_usuario_id == 3 )
            {
                event(new NotificacionesEstudiante(Auth::user()));
                return redirect()->route( 'perfil_estudiante' );
            }
            if ( $usuario->tipo_usuario_id == 4 )
            {
                event(new NotificacionesEmpresa(Auth::user()));
                return redirect()->route( 'perfil_empresa' );
            }
        }

        return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
    }

    public function salir()
    {
        Auth::user()->notifications()->delete();
        session()->flush();
        Auth::logout();

        return redirect()->route('acceso');
    }
}
