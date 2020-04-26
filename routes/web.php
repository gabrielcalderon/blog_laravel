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

// Rutas para los administradores
Route::prefix('admin')->name('admin.')->group(function () {
  Route::resource('users', 'AdminUsersController');
});
Route::prefix('user')->group(function (){
		Route::resource('account','ProfileController')
					->parameters([
						'account' => 'profile'
					])
					->except(['index','create','store']);
});

Route::resource('auth.posts','PostController')
  ->except(['index','show']);

Auth::routes();

Route::get('/home', 'HomeController')->name('home');