<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//user
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/detail/{id}', 'HomeController@show')->name('detail');
Route::get('/home/all-book', 'HomeController@showAll')->name('showAll');
Route::get('/home/all-book/search', 'HomeController@search')->name('search');


Route::prefix('admin')->group(function(){
  //Login Admin
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');



  //user list(admin)
  Route::get('/user-list', 'User@index')->name('user-list');

  //Buku(admin)
  Route::resource('book', 'BookController');

});
