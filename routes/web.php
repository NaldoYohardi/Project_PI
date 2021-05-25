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

Route::get('/','HomeController@index');

Route::get('/reset', 'Controller@forget');

Route::get('/home', 'Controller@home');

Route::get('/table', 'Controller@table');

Route::get('/inbox', 'Controller@inbox');

Auth::routes();

Route::post('/check', 'Auth\LoginController@check');

// route for verification email
Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');

// route for generateQr
Route::get('generateQr', 'QrController@generateQrCode');

//route Employee Login
Route::get('/loginIN', 'Auth\LoginController@loginIN');

//route Admin Login
Route::get('/loginIN1', 'Auth\LoginController@loginIN1');

//route Manager Login
Route::get('/loginIN2', 'Auth\LoginController@loginIN2');

//route Logout
Route::get('/logOUT', 'Auth\LoginController@logOUT');

//route forgotPass
Route::get('/resetPass', 'Auth\ResetPasswordController@resetPass');

//route profile
Route::get('/profile/{name}', 'Controller@profile');

//route edit
Route::get('/edit/{id}', 'Controller@edit');

//route update
Route::post('/update/{user}', 'Controller@update');

//route delete
Route::get('/delete/{id}', 'Controller@delete');
