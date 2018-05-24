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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//ADMIN//
Route::prefix('admin')->group(function() {	
	Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login')->middleware('guest');
	Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit')->middleware('guest');
	Route::get('register', 'AdminController@showRegisterForm')->name('admin.register');
	Route::post('register', 'AdminController@register')->name('admin.register.submit');
	Route::get('index', 'AdminController@index')->name('admin.index')->middleware('auth:admin');
	Route::get('logout', 'AdminController@logout')->name('admin.logout')->middleware('auth:admin');

	Route::get('member', 'AdminController@getMember')->name('admin.member')->middleware('auth:admin');
	Route::get('banned/member', 'AdminController@getBannedMember')->name('admin.getBannedMember')->middleware('auth:admin');
	Route::get('banned/member/banned/{id}', 'AdminController@bannedMember')->name('admin.banned-member')->middleware('auth:admin');
	Route::get('banned/member/restore/{id}', 'AdminController@restoreMember')->name('admin.restore-member')->middleware('auth:admin');

	Route::get('printing', 'AdminController@getPrinting')->name('admin.printing')->middleware('auth:admin');
	Route::get('banned/printing', 'AdminController@getBannedPrinting')->name('admin.getBannedPrinting')->middleware('auth:admin');
	Route::get('banned/printing/banned/{id}', 'AdminController@bannedPrinting')->name('admin.banned-printing')->middleware('auth:admin');
	Route::get('banned/printing/restore/{id}', 'AdminController@restorePrinting')->name('admin.restore-printing')->middleware('auth:admin');

	Route::get('transaksi', 'AdminController@getTransaksi')->name('admin.getTransaksi')->middleware('auth:admin');
	Route::get('transaksi/{id}', 'AdminController@konfirmasiTrx')->name('admin.konfirmasiTrx')->middleware('auth:admin');
	Route::get('transaksi/{id}/tolak', 'AdminController@tolakTrx')->name('admin.tolakTrx')->middleware('auth:admin');
	Route::get('profile', 'AdminController@show')->name('admin.profile')->middleware('auth:admin');
	Route::get('profile/edit', 'AdminController@edit')->name('admin.edit')->middleware('auth:admin');
	Route::post('profile/edit', 'AdminController@update')->name('admin.update')->middleware('auth:admin');
});

//PRINTING SIDE//
Route::prefix('printing')->group(function() {
	Route::get('/', 'PrintingController@home')->name('printing.dashboard');
	Route::get('/login', 'Auth\PrintingLoginController@showLoginForm')->name('printing.login')->middleware('guest');
    Route::post('/login', 'Auth\PrintingLoginController@login')->name('printing.login.submit')->middleware('guest');
    Route::get('/profile', 'PrintingController@profile')->name('printing.profile')->middleware('auth:printing');
    Route::get('/profile/edit', 'PrintingController@editProfile')->name('printing.profileEdit')->middleware('auth:printing');
    Route::post('/profile/edit', 'PrintingController@storeProfile')->name('printing.profileStore')->middleware('auth:printing');;

	Route::get('/layanan', 'PrintingController@layanan')->name('printing.layanan')->middleware('auth:printing');

	Route::get('/layanan/create', 'PrintingController@tambahLayanan')->name('printing.tambahLayanan')->middleware('auth:printing');
	Route::post('/layanan', 'PrintingController@storeLayanan')->name('printing.storeLayanan')->middleware('auth:printing');

	Route::get('/jenis/create', 'PrintingController@tambahJenis')->name('printing.tambahJenis')->middleware('auth:printing');
	Route::post('/jenis', 'PrintingController@storeJenis')->name('printing.storeJenis')->middleware('auth:printing');

	Route::get('/layanan/{id}/edit', 'PrintingController@editLayanan')->name('printing.editLayanan')->middleware('auth:printing');
	Route::post('/layanan/{id}/edit', 'PrintingController@storeEditLayanan')->name('printing.storeEditLayanan')->middleware('auth:printing');

	Route::post('/layanan/{id}/hapus', 'PrintingController@hapusLayanan')->name('printing.hapusLayanan')->middleware('auth:printing');

	Route::get('/transaksi', 'PrintingController@Transaksi')->name('printing.transaksi')->middleware('auth:printing');
	Route::post('/transaksi/{trx_id}', 'PrintingController@trxSelesai')->name('printing.trx_selesai')->middleware('auth:printing');
});

//MEMBER SIDE//
Route::prefix('member')->group(function() {
	Route::resource('/profile', 'UserController')->middleware('auth:web');
	Route::get('{printing_id}/transaksi', 'UserController@transaksi')->name('member.transaksi')->middleware('auth:web');
	Route::post('{printing_id}/transaksi', 'UserController@transaksi2')->name('member.transaksi-2')->middleware('auth:web');
	Route::post('{printing_id}/transaksi/save', 'UserController@transaksi3')->name('member.transaksi-3')->middleware('auth:web');
	Route::get('{user_id}/transaksi/cart', 'UserController@cart')->name('member.cart')->middleware('auth:web');
	Route::post('/transaksi/download', 'UserController@download')->name('member.download');
	Route::get('/transaksi/checkout/{transaksi_id}', 'UserController@checkout')->name('member.checkout')->middleware('auth:web');
	Route::get('/transaksi/bukti/{transaksi_id}', 'UserController@getbukti')->name('member.getbukti')->middleware('auth:web');
	Route::post('/transaksi/bukti/{transaksi_id}', 'UserController@postbukti')->name('member.postbukti')->middleware('auth:web');
	Route::get('/transaksi/bukti/{transaksi_id}/rating', 'UserController@getrating')->name('member.getrating')->middleware('auth:web');
	Route::post('/transaksi/bukti/{transaksi_id}/rating', 'UserController@postrating')->name('member.postrating')->middleware('auth:web');
});

//EVERYONE SIDE//
Route::get('/index', 'RegularController@home')->name('everyone.index');
Route::get('{kota}', 'RegularController@kota')->name('everyone.city');
Route::get('{kota}/{nama}/detail', 'RegularController@detailprinting')->name('everyone.detail');
