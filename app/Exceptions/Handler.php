<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Request;
use Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
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


     /*
     MAIN CASE :
     ketika akan mengakses halaman dengan guard tertentu, maka akan dicek. jika belum login,
     maka akan redirect ke halaman login sesuai dengan 'web-guard' atau ROLE
     */
     public function render($request, Exception $exception)
     {
         $class = get_class($exception);
         switch($class) {
             case 'Illuminate\Auth\AuthenticationException':
                 $guard = array_get($exception->guards(), 0);
                 switch ($guard) {
                      // jika yang diakses adalah konten admin guard
                     case 'admin':
                         $login = 'admin.login';
                         break;
                     default:
                         $login = 'login';
                         break;
                 }
                 return redirect()->route($login);
         }
         return parent::render($request, $exception);
     }





    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //         return $request->expectsJson()
    //                 ? response()->json(['message' => 'Unauthenticated.'], 401)
    //                 : redirect()->guest(route('authentication.index'));
    // }


}
