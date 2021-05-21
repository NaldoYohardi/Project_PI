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
    return view('auth/login');
});

Route::get('/home', 'Controller@home');
Route::get('/table', 'Controller@table');

Auth::routes();
Route::post('/check', 'Auth\LoginController@check');
// route for verification email
Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');

//route loginIN
Route::get('/loginIN', 'Auth\LoginController@loginIN');
