<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
        \Swift_TransportException::class,
        \Swift_RfcComplianceException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
         if ($exception instanceof \Illuminate\Auth\AuthenticationException)
         {
             return redirect()->route('acceso')->with('flash', 'Por favor inicie sesi&oacute;n.');
         }

         if ($exception instanceof \Illuminate\Session\TokenMismatchException)
         {
             return back()->with('flash', 'La p&aacute;gina ha caducado debido a la inactividad. Actualiza e int&eacute;ntalo de nuevo.');
         }

         if ($exception instanceof \Swift_TransportException)
         {
             return redirect()->route('acceso')->with('flash', 'La conexi&oacute;n con el host no se pudo establecer. Por favor compruebe su conexi&oacute;n a internet e inicie sessi&oacute;n.');
         }

         if ($exception instanceof \Swift_RfcComplianceException)
         {
             return back()->with('flash', 'Direcci&oacute;n de correo electr&oacute;nico inv&aacute;lida.');
         }

        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        return redirect()->guest(route('login'));
    }
}
