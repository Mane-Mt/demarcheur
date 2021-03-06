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
Route::resource('/annonces', 'App\Http\Controllers\AnnonceController')->except(['index']);
    Route::get('/annonces-list/{usertype?}', 'App\Http\Controllers\AnnonceController@index')->name('annonces.index');

Route::group(['middleware' => 'auth'], function () {

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons');

    // Route::ressource('users','App\Http\Controllers\UserController');
    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


    ####################################################p########################
    #							Partie Artisan 								   #
    ############################################################################

});


