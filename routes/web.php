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

Route::prefix('printing')->group(function() {
	Route::get('', 'AdminController@index')->name('printing');
    Route::get('/login', 'Auth\PrintingLoginController@showLoginForm')->name('printing.login');
    Route::post('/login', 'Auth\PrintingLoginController@login')->name('printing.login.submit');
	Route::get('/{kota}/{nama}/edit', ['uses' =>'PrintingController@edit']);
    Route::get('/', 'PrintingController@home')->name('printing.dashboard');
  });



//ADMIN//
Route::prefix('admin')->group(function() {
	Route::resource('/print', 'DetailPrintController');
	Route::prefix('print')->group(function() {
		//
	});
	
	
});

//PRINTING SIDE//
Route::prefix('printing')->group(function() {
	Route::get('/login', 'Auth\PrintingLoginController@showLoginForm')->name('printing.login');
    Route::post('/login', 'Auth\PrintingLoginController@login')->name('printing.login.submit');
	Route::get('/layanan/{id}', 'PrintingController@layananTersedia')->middleware('auth:printing');
	Route::get('/layanan/{id}/create', 'PrintingController@tambahLayananTersedia')->middleware('auth:printing');
	Route::post('/layanan/{id}', 'PrintingController@storeTambahLayananTersedia')->middleware('auth:printing');
});

//MEMBER SIDE//
Route::prefix('member')->group(function() {
	Route::resource('/profile', 'UserController')->middleware('auth:web');;
	Route::get('{printing_id}/transaksi', 'UserController@transaksi')->name('member.transaksi')->middleware('auth:web');
	Route::post('{printing_id}/transaksi', 'UserController@transaksi2')->name('member.transaksi-2')->middleware('auth:web');
	Route::post('{printing_id}/transaksi/save', 'UserController@transaksi3')->name('member.transaksi-3')->middleware('auth:web');
});

//EVERYONE SIDE//
Route::get('/index', 'RegularController@home')->name('everyone.index');
Route::get('{kota}', 'RegularController@kota')->name('everyone.city');
Route::get('{kota}/{nama}/detail', 'RegularController@detailprinting')->name('everyone.detail');
