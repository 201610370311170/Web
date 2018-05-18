<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    // biar bisa diakses walaupun sudah login sebagai user
    // dengan middleware = 'guest:admin', pengguna bisa menggunakan USER dan ADMIN sekaligus
    public function __construct(){
      $this->middleware('guest:admin');
    }

    // tampilan login form
    public function showLoginForm(){
      return view('auth.admin-login');
    }

    public function login(Request $request){
      //validate the form
      $this->validate($request, [
        'email'   => 'required|email',
        'password'=> 'required|min:6'
      ]);

      //Attempt to log user in
      //kalo guard = admin
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
      {
        //jika sukses maka redirect ke admin dashboard
        return redirect()->intended(route('admin.dashboard'));
      }
        //kalo guard tidak sama dengan admin, maka balik ke halaman login dengan input email dan remember
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
