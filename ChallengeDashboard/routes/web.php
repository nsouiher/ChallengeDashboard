<?php

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
<<<<<<< HEAD

Route::get('/hello', 'HelloController@test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::get('/login', function () {
    return "login";
});
>>>>>>> 3065e9179eeb5e84b876937c0b156b4fb0d598c0

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
