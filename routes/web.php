<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
Auth::routes();

Route::get('/','HomeController@index');

Route::get('/reset', 'Controller@forget');

Route::get('/home', 'Controller@home');

Route::get('/homeadmin/{name}', 'Controller@home2');

Route::get('/table', 'Controller@table');

Route::get('/inbox', 'Controller@inbox');

Route::get('/history', 'Controller@history');

Route::post('/check', 'Auth\LoginController@check');

// route for verification email
Route::get('/verify', 'Auth\RegisterController@verifyUser')->name('verify.user');

// route for generateQr
Route::get('generateQr', 'QrController@generateQrCode');

//route Employee Login
Route::get('/loginIN', 'Auth\LoginController@loginIN');

//route Logout
Route::get('/logOUT', 'Auth\LoginController@logOUT');

//route profile
Route::get('/profile/{name}', 'Controller@profile');

//route edit
Route::get('/edit/{id}', 'Controller@edit');

//route update
Route::post('/update/{user}', 'Controller@update');

//route delete
Route::get('/delete/{id}', 'Controller@delete');

Route::get('/test',function(){
  return view('test');
});

Route::get('/add', 'Controller@add');

Route::post('/addData', function(Request $req){
    $n = $req->amount;
    $category = DB::select("SELECT * FROM category");
    return view('tambahData', compact('category'), compact('n'));
});

Route::post('/tambahData', 'Controller@tambahData');

Route::get('/accpt/{id},{i}', 'Controller@accpt');

Route::get('/decline/{id},{i}', 'Controller@decline');

Route::get('/done/{id},{i}', 'Controller@done');

Route::get('/addstok/{id}', 'Controller@addstok');

Route::post('/addstoks', 'Controller@addstoks');

Route::get('/outstok/{id}', 'Controller@out');

Route::post('/outstoks', 'Controller@outstok');

Route::get('/editInventory/{id}', 'Controller@editI');

Route::post('/updateInventory', 'Controller@updateI');

Route::get('/deleteInventory/{id}', 'Controller@deleteI');
