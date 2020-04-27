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

Route::get('/','IndexController')
    ->name('index');

// Rutas para los administradores
Route::prefix('admin')->name('admin.')->group(function () {
	Route::resource('users', 'AdminUsersController');
	Route::get('/dashboard', 'AdminUsersController@dashboard')->name('dashboard');
});

// Route for User registrados
Route::prefix('user')->group(function () {
	Route::resource('account', 'ProfileController')
		->parameters([
			'account' => 'profile'
		])
		->except(['index', 'create', 'store']);
});

// Routes for Posts created for User(Auth)
Route::resource('auth.posts', 'PostController')
	->except(['index']);


Auth::routes();
Route::get('/home', 'HomeController')->name('home');
