<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Book;
use Session;
use Validator;
use File;

class BookController extends Controller
{

    public function __construct()
    {
         /*
         dibuat pertama kali untuk mencegah jika ada guard
         selain admin yang mencoba mengakses masuk konten admin
         */
         $this->middleware('auth:admin');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Book::all();
      //dd($books);
      return view('Book.data_table', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          Session::flash('flash_message', 'Data berhasil ditambahkan.');
          Session::flash('flash_type', 'alert-success');


          $request->file('file');
          $name = Input::file('file')->getClientOriginalName();
          $file = $request->file->storeAs('public/files', $name);
          //Storage::putFileAs('file', new File('public/files'), '$name');
          $this->validate($request, [
              'ID'          => 'required|unique:books',
              'Nama_Buku'   => 'required',
              'Kota'        => 'required',
              'tahun'       => 'required|date_format:"Y"|size:4',
              'Penerbit'    => 'required',
              'Penulis'     => 'required',
              'file'        => 'required'
          ],
          [
              'ID.unique' => 'ID buku telah dipakai'

          ]);

            $books                   = new Book;
            $books->id               = $request->ID;
            $books->Judul_buku       = $request->Nama_Buku;
            $books->Kota             = $request->Kota;
            $books->Tahun_terbit     = $request->tahun;
            $books->Penerbit         = $request->Penerbit;
            $books->Nama_penulis     = $request->Penulis;
            $books->Kategori         = $request->Kategori;
            $books->url              = $name;
            $books->save();
            return redirect('/admin/book') ;
      }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $book = Book::find($id);

      return view('Book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      Session::flash('flash_message', 'Data berhasil diupdate.');
      Session::flash('flash_type', 'alert-success');


      $request->file('file');
      $name = Input::file('file')->getClientOriginalName();
      $file = $request->file->storeAs('public/files', $name);
      //Storage::putFileAs('file', new File('public/files'), '$name');
      $this->validate($request, [
          'ID'          => 'required',
          'Nama_Buku'   => 'required',
          'Kota'        => 'required',
          'tahun'       => 'required|date_format:"Y"|size:4',
          'Penerbit'    => 'required',
          'Penulis'     => 'required',
          'file'        => 'required'
      ]);

        $books                   = Book::find($id);
        $books->id               = $request->ID;
        $books->Judul_buku       = $request->Nama_Buku;
        $books->Kota             = $request->Kota;
        $books->Tahun_terbit     = $request->tahun;
        $books->Penerbit         = $request->Penerbit;
        $books->Nama_penulis     = $request->Penulis;
        $books->Kategori         = $request->Kategori;
        $books->url              = $name;
        $books->save();
        return redirect('/admin/book') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $book = Book::find($id);

      Session::flash('flash_message', '"'.$book->Judul_buku.'" telah dihapus.');
      Session::flash('flash_type', 'alert-success');

      $book = Book::find($id);
      $book->delete();
      return redirect('/admin/book');
    }
}
