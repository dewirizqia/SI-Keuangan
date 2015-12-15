<?php

use App\Bagian;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
if (Schema::hasTable('Bagian'))
{
    View::share('sbagian', Bagian::orderBy('bagian', 'asc')->get());
}


Route::get('/', ['as'=>'home','middleware' => 'auth', function () {return view('@layout.base_admin');}]);
Route::get('/admin', function () {return view('home.admin');});
Route::get('/keuangan', function () {return view('home.keuangan');});
Route::get('/dekan', function () {return view('home.dekan');});
Route::get('/bpp', function () {return view('home.bpp');});
Route::get('/ktu', function () {return view('home.ktu');});

// Route::get('login', function () {return view('auth/login');});

// Route::get('auth/login', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::controllers([
	'auth' => 'Auth\AuthController',
	// 'password' => 'Auth\PasswordController'
	]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

route::get('/mail', function() {
	Mail::send('emails.test', ['name'=> 'Dewi'], function($message)
	{
		$message->to('qiqiechinen@gmail.com', 'qiqiechinen')->from('19dewi@gmail.com', 'dewi')
		->subject('welcome!');
	}
		);
});


// pagu
Route::get('pagu/daftar', array('as'=>'daftar_pagu', 'uses'=> 'AdminController@daftar_pagu'));
Route::get('pagu/buat', array('as'=>'buat_pagu', 'uses'=> 'AdminController@buat_pagu'));
Route::post('pagu/daftar', array('as'=>'simpan_pagu', 'uses'=> 'AdminController@simpan_pagu'));
// pagu bagian
Route::get('pagu/bagian/daftar', array('as'=>'daftar_pagu_bagian', 'uses'=> 'AdminController@daftar_pagu_bagian'));
Route::get('pagu/bagian/buat', array('as'=>'buat_pagu_bagian', 'uses'=> 'AdminController@buat_pagu_bagian'));
Route::post('pagu/bagian/daftar', array('as'=>'simpan_pagu_bagian', 'uses'=> 'AdminController@simpan_pagu_bagian'));
// pagu output
Route::get('pagu/output/daftar', array('as'=>'daftar_pagu_output', 'uses'=> 'AdminController@daftar_pagu_output'));
Route::get('pagu/output/buat', array('as'=>'buat_pagu_output', 'uses'=> 'AdminController@buat_pagu_output'));
Route::post('pagu/output/daftar', array('as'=>'simpan_pagu_output', 'uses'=> 'AdminController@simpan_pagu_output'));
//usulan
Route::get('usulan/bagian/{id}/daftar', array('as'=>'daftar_usulan_bagian', 'uses'=> 'AdminController@daftar_usulan_bagian'));
Route::get('usulan/bagian/{id}/buat', array('as'=>'buat_usulan_bagian', 'uses'=> 'AdminController@buat_usulan_bagian'));
Route::get('usulan/{id}/detail', array('as'=>'detail_usulan', 'uses'=> 'AdminController@detail_usulan'));
//bagian
Route::get('bagian/daftar', array('as'=>'daftar_bagian', 'uses'=> 'AdminController@daftar_bagian'));
Route::get('bagian/buat', array('as'=>'buat_bagian', 'uses'=> 'AdminController@buat_bagian'));
Route::post('bagian/daftar', array('as'=>'simpan_bagian', 'uses'=> 'AdminController@simpan_bagian'));
//output
Route::get('output/daftar', array('as'=>'daftar_output', 'uses'=> 'AdminController@daftar_output'));
Route::get('output/buat', array('as'=>'buat_output', 'uses'=> 'AdminController@buat_output'));
Route::post('output/daftar', array('as'=>'simpan_output', 'uses'=> 'AdminController@simpan_output'));
//sub output
Route::get('suboutput/daftar', array('as'=>'daftar_suboutput', 'uses'=> 'AdminController@daftar_suboutput'));
Route::get('suboutput/buat', array('as'=>'buat_suboutput', 'uses'=> 'AdminController@buat_suboutput'));
Route::post('suboutput/daftar', array('as'=>'simpan_suboutput', 'uses'=> 'AdminController@simpan_suboutput'));
//komponen input
Route::get('input/daftar', array('as'=>'daftar_input', 'uses'=> 'AdminController@daftar_input'));
Route::get('input/buat', array('as'=>'buat_input', 'uses'=> 'AdminController@buat_input'));
Route::post('input/daftar', array('as'=>'simpan_input', 'uses'=> 'AdminController@simpan_input'));
//sub input
Route::get('subinput/daftar', array('as'=>'daftar_subinput', 'uses'=> 'AdminController@daftar_subinput'));
Route::get('subinput/buat', array('as'=>'buat_subinput', 'uses'=> 'AdminController@buat_subinput'));
Route::post('subinput/daftar', array('as'=>'simpan_subinput', 'uses'=> 'AdminController@simpan_subinput'));
//akun
Route::get('akun/daftar', array('as'=>'daftar_akun', 'uses'=> 'AdminController@daftar_akun'));
Route::get('akun/buat', array('as'=>'buat_akun', 'uses'=> 'AdminController@buat_akun'));
Route::post('akun/daftar', array('as'=>'simpan_akun', 'uses'=> 'AdminController@simpan_akun'));
//rekap belanja
Route::get('belanja/daftar', array('as'=>'daftar_belanja', 'uses'=> 'AdminController@daftar_belanja'));
Route::get('belanja/buat', array('as'=>'buat_belanja', 'uses'=> 'AdminController@buat_belanja'));
Route::post('belanja/daftar', array('as'=>'simpan_belanja', 'uses'=> 'AdminController@simpan_belanja'));
//spj
Route::get('spj/daftar', array('as'=>'daftar_spj', 'uses'=> 'AdminController@daftar_spj'));
Route::get('spj/buat', array('as'=>'buat_spj', 'uses'=> 'AdminController@buat_spj'));
Route::post('spj/daftar', array('as'=>'simpan_spj', 'uses'=> 'AdminController@simpan_spj'));
//sk
Route::get('sk/daftar', array('as'=>'daftar_sk', 'uses'=> 'AdminController@daftar_sk'));
Route::get('sk/buat', array('as'=>'buat_sk', 'uses'=> 'AdminController@buat_sk'));
Route::post('sk/daftar', array('as'=>'simpan_sk', 'uses'=> 'AdminController@simpan_sk'));
//user
Route::get('user/daftar', array('as'=>'daftar_user', 'uses'=> 'AdminController@daftar_user'));
Route::get('user/buat', array('as'=>'buat_user', 'uses'=> 'AdminController@buat_user'));
Route::post('user/daftar', array('as'=>'simpan_user', 'uses'=> 'AdminController@simpan_user'));