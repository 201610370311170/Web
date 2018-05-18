<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        /*
        dibuat pertama kali untuk mencegah jika ada guard
        selain admin yang mencoba mengakses masuk konten admin
        */
        $this->middleware('auth:admin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::sum('id');

        return view('admin.admin', ['user' => $user]);

    }

    // public function test(){
    //   return view('admin');
    // }


}
