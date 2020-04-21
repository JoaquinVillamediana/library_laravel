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
    return redirect('/admin/abooks');
});

Route::get('/admin', function () {
    return redirect('/admin/abooks');
});

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('login', function(){
    return view('auth.login');
})->name('login');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::middleware(['checkAdmin'])->group(function () {
        Route::resource('/users', 'admin\UsersController');
        Route::resource('/abooks', 'admin\BooksController');
        Route::resource('/records', 'admin\RecordsController');
         });
    });
});

Route::prefix('usr')->group(function () {
    Route::middleware(['auth'])->group(function () {
         Route::middleware(['checkUser'])->group(function () {
            Route::get('/home', 'usr\HomeController@index')->name('home');
            Route::resource('/profile' ,'usr\ProfileController' );
            Route::resource('/books', 'usr\BooksController');
               
         });
    });
});


