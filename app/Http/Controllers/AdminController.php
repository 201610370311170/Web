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
        $usersSum = User::count('id');
        $booksSum = Book::count('id');
        $book = Book::all();
        $booktime = Book::latest('created_at')->first();

        return view('admin.admin', compact('usersSum', 'booksSum', 'book', '$booktime'));

    }

    // public function test(){
    //   return view('admin');
    // }


}
