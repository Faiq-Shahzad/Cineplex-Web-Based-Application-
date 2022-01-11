<?php

use App\Http\Controllers\MovieController;
use App\Models\Movies;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'chkAdmin'])-> group(function(){
    Route::get('/admin/home', function(){
        return view('admin.home');
    });

    Route::get('/admin/viewMovies', 'App\Http\Controllers\MovieController@show');
    Route::get('/admin/{id}/edit', 'App\Http\Controllers\MovieController@edit');
    Route::put('/admin/{id}/update', 'App\Http\Controllers\MovieController@update');
    Route::get('/admin/{id}/delete', 'App\Http\Controllers\MovieController@delete');
    Route::get('/admin/{id}/review', 'App\Http\Controllers\MovieController@review');
    
    Route::post('/admin/addMovies', 'App\Http\Controllers\MovieController@addMovie');
    
    Route::get('/admin/addMovies', function(){
        return view('admin.addMovies');
    });

    Route::get('/{id}/profile', 'App\Http\Controllers\UserController@viewprofile');
    Route::get('/admin/users', 'App\Http\Controllers\UserController@show');

    Route::get('/admin/aboutUs', function(){
        return view('admin.aboutUs');
    });

    

});

Route::get('/aboutUs', function(){
    return view('aboutUsUser');
});

Route::get('/viewMovies/{id}', 'App\Http\Controllers\MovieController@moviedetails');


