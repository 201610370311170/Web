<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksSum = Book::count('id');
        $book = Book::all();

        return view('user.index', compact('booksSum', 'book'));
    }

    public function show($id)
    {
        $book = Book::find($id);

        return view('user.detail-page',compact('book'));
    }

    public function showAll(){

        $book = Book::all();

        return view('user.viewAllBook', compact('book'));
    }

    public function search(Request $request){

      $book = Book::when($request->keyword, function ($query) use ($request) {
      $query->where('Judul_buku', 'like', "%{$request->keyword}%")
          ->orWhere('Nama_penulis', 'like', "%{$request->keyword}%");
      })->paginate();

      return view('user.viewAllBook', compact('book'));

    }


}
