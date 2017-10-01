<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Auth;
use App\Usuario;
use Carbon\Carbon;
use App\Events\ConfirmarEmail;
use App\Events\EmailConfirmado;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/error/registro_confirmacion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.registro');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['empresa'] = isset($data['empresa']) ? TRUE : FALSE;

        $user = User::create([
            'name'      => $data['name'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
        ]);

        Usuario::create([
            'nombre_usuario'    => $data['name'],
            'apellido_usuario'  => $data['lastname'],
            'email_usuario'     => $data['email'],
            'contrasena'        => bcrypt($data['password']),
            'estado_usuario'    => FALSE,
            'fecha_registro'    => strtotime(Carbon::now()),
            'foto_usuario'      => 'storage/cliente.svg',
            'tipo_usuario_id'   => $data['empresa'] ? 4 : 3,
        ]);

        return $user;
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered($data, $user)
    {
        $user->remember_token = str_random(25);
        $user->save();

        event(new ConfirmarEmail($user));
    }

    protected function confirmation($token, User $user)
    {
        static $usuario;

        if(str_is($user->remember_token, $token))
        {
            Auth::login($user);

            $usuario = Usuario::find(Auth::id());
            $usuario->estado_usuario = TRUE;
            $usuario->save();

            event(new EmailConfirmado($user));

            session(['usuario' => $usuario]);

            if ($usuario->tipo_usuario_id == 4) {
                return redirect()->route('registrar_entidad');
            }

            return redirect()->route('registrar_curriculum');
        }
        return redirect()->route('token_error');
    }
}
