<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class DownloadController extends Controller
{
    public function downloadfunc(){
      $download= Book::all();
      return view('book.viewfile', compact('download'));
    }
}
