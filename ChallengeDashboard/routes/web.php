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

Route::get('/', 'HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createChallenge','ChallengeController@create')->name('createChallenge')->middleware('auth')->middleware('organizer');
Route::post('/createChallenge','ChallengeController@store')->name('saveChallenge')->middleware('auth')->middleware('organizer');
Route::get('/challenges','ChallengeController@show')->name('challenges')->middleware('auth');
Route::post('/dashboard','ChallengeController@show')->name('dashboard')->middleware('auth');
Route::delete('/challenge/{id}','ChallengeController@destroy')->name('deleteChallenge')->middleware('auth')->middleware('organizer');
Route::resource('challenge','ChallengeController')->middleware('auth');
Route::resource('user','manageUsers')->middleware('auth')->middleware('organizer')->middleware('organizer');
Route::get('/manageUsers','manageUsers@show')->name('manageUsers')->middleware('auth')->middleware('organizer');
Route::get('dashboard','UserChartController@dashboard')->middleware('auth')->middleware('organizer');
Route::get('notifications','manageUsers@guestsList')->middleware('auth')->middleware('organizer');
Route::post('approve/{id}','manageUsers@approve')->name('approve')->middleware('auth')->middleware('organizer');
Route::post('participate/{idUser}/{idChallenge}','ChallengeController@participate')->name('participate')->middleware('auth');
Route::post('submitCode/{idUser}/{idChallenge}','ChallengeController@submitCode')->name('submitCode')->middleware('auth');
Route::get('/updateChallenge/{id}','ChallengeController@updateChallenge')->name('updateChallenge')->middleware('auth')->middleware('organizer');
Route::post('editChallenge/{id}','ChallengeController@editChallenge')->name('editChallenge')->middleware('auth')->middleware('organizer');
Route::get('seeChallenge/{id}','ChallengeController@seeChallenge')->middleware('auth');
Route::post('comment/{idUser}/{idChallenge}','ChallengeController@comment')->name('comment')->middleware('auth');
