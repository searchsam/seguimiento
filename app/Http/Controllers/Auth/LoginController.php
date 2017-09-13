<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => 'acceso']);
    }

    public function acceso()
    {
        return view('auth.acceso');
    }

    public function acceder()
    {
        $credentials = $this->validate(request(), [
            'email'     => 'email|required|string',
            'password'  => 'required|string'
        ]);

        if(Auth::attempt($credentials))
        {
            return redirect()->route('inicio');
        }

        return back()
            ->withErrors(['email' => trans('auth.failed')])
            ->withInput(request(['email']));
    }

    public function salir()
    {
        Auth::logout();

        return redirect()->route('acceso');
    }
}
