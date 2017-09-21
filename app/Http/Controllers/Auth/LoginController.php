<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;
use App\Usuario;

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

            return redirect()->route('inicio');
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
