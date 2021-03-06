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
Route::get('/register', 'Auth\AuthController@register')->name('register');
Route::post('/register', 'Auth\AuthController@storeUser');

Route::get('/login', 'Auth\AuthControllerLogin@login')->name('login');
Route::post('/login', 'Auth\AuthControllerLogin@authenticate');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

Route::get('/dashboard', 'Auth\checkuser@check')->name('dashboard');