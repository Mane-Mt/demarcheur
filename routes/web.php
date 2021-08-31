<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', 'App\Http\Controllers\WelcomeController@index')->name('welcome');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons');
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::resource('annonces', 'App\Http\Controllers\AnnonceController')->except(['index']);
Route::get('/annonces/{usertypes?}', 'App\Http\Controllers\AnnonceController@index')->name('annonces.index');

####################################################p########################
#							Partie Artisan 								   #
############################################################################
Route::post('/saveannonce', 'App\Http\Controllers\AnnonceController@saveannonce');
Route::get('/demarcheur/ancienannonce', 'App\Http\Controllers\AnnonceController@ancienannonce');
Route::delete('/annonceDelete/{id}', 'App\Http\Controllers\AnnonceController@deleteAnnonce');
Route::get('/annonceEdit/{id}', 'App\Http\Controllers\AnnonceController@editAnnonce');
Route::put('/updateAnnonce/{id}', 'App\Http\Controllers\AnnonceController@updateAnnonce');
Route::get('/annonceDetail/{id}','App\Http\Controllers\AnnonceController@showAnnonce');

