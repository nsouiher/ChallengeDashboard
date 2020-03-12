<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createChallenge','ChallengeController@create')->name('createChallenge');
Route::post('/createChallenge','ChallengeController@store')->name('saveChallenge');
Route::get('/challenges','ChallengeController@show')->name('challenges');
Route::post('/dashboard','ChallengeController@show')->name('dashboard');
Route::get('/challenges','ChallengeController@show')->name('notifications');
//Route::any('/challenges/delete','ChallengeController@destroy')->name('deleteChallenge');
Route::delete('/challenge/{id}','ChallengeController@destroy')->name('deleteChallenge');
Route::resource('challenge','ChallengeController');
Route::resource('user','manageUsers');
Route::get('/manageUsers','manageUsers@show')->name('manageUsers');
