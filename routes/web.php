<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/index', 'PrintingController@home');

Route::prefix('printing')->group(function() {
    Route::get('/login', 'Auth\PrintingLoginController@showLoginForm')->name('printing.login');
    Route::post('/login', 'Auth\PrintingLoginController@login')->name('printing.login.submit');
	Route::get('{kota}', ['uses' =>'PrintingController@kota']);
	Route::get('/{kota}/{nama}', ['uses' =>'PrintingController@detailprinting']);
	Route::get('/{kota}/{nama}/edit', ['uses' =>'PrintingController@edit']);
    Route::get('/', 'PrintingController@home')->name('printing.dashboard');
  });



//ADMIN//
Route::prefix('admin')->group(function() {
	Route::resource('/print', 'DetailPrintController');
	Route::prefix('print')->group(function() {
		Route::get('/createJenis', 'DetailPrintController@createJenis');
	});
	
	
	});
