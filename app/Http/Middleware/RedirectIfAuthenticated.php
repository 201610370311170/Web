<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

     /*
     MAIN CASE : JIKA SUDAH LOGIN LALU KITA MENGAKSES HALAMAN LOGIN LAGI.
     MAKA AKAN DI REDIRECT KE HALAMAN TERTENTU (DASHBOARD)
     */

     public function handle($request, Closure $next, $guard = null)
     {
        switch ($guard) {
        case 'admin':
            // in case jika dia login sebagai User, maka dia tidak akan di redirect ke dashboard admin
            if(Auth::guard($guard)->check()){
              return redirect()->route('admin.dashboard');
            }
            break;

          default:
          // secara default, pengguna selain admin ketika login berhasil akan di redirect ke user dahsboard
          if (Auth::guard($guard)->check()) {
              return redirect('/home');
          }
            break;
        }


        //

        return $next($request);
    }
}
