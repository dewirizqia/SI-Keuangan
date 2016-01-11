<?php

use App\Bagian;
use App\Sub_Output;

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
Route::get('export', ['as'=>'export', 'uses'=> 'ReportController@export']);

// pagu
Route::get('pagu/daftar', array('as'=>'daftar_pagu', 'uses'=> 'PaguController@daftar_pagu'));
Route::post('pagu/daftar', array('as'=>'simpan_pagu', 'uses'=> 'PaguController@simpan_pagu'));
Route::get('pagu/daftar/{id}/edit', array('as'=>'edit_pagu', 'uses'=> 'PaguController@edit_pagu'));
Route::patch('pagu/daftar/{id}', array('as'=>'update_pagu', 'uses'=> 'PaguController@update_pagu'));
Route::delete('pagu/daftar/{id}', ['as'=>'delete_pagu', 'uses'=>'PaguController@delete_pagu']);
// pagu bagian
Route::get('pagu/bagian/daftar', array('as'=>'daftar_pagu_bagian', 'uses'=> 'PaguController@daftar_pagu_bagian'));
Route::get('pagu/bagian/buat', array('as'=>'buat_pagu_bagian', 'uses'=> 'PaguController@buat_pagu_bagian'));
Route::post('pagu/bagian/daftar', array('as'=>'simpan_pagu_bagian', 'uses'=> 'PaguController@simpan_pagu_bagian'));
Route::get('pagu/bagian/daftar/{id}/edit', array('as'=>'edit_pagu_bagian', 'uses'=> 'PaguController@edit_pagu_bagian'));
Route::patch('pagu/bagian/daftar/{id}', array('as'=>'update_pagu_bagian', 'uses'=> 'PaguController@update_pagu_bagian'));
Route::delete('pagu/bagian/daftar/{id}', ['as'=>'delete_pagu_bagian', 'uses'=>'PaguController@delete_pagu_bagian']);
// pagu output
Route::get('pagu/output/daftar', array('as'=>'daftar_pagu_output', 'uses'=> 'PaguController@daftar_pagu_output'));
Route::get('pagu/output/buat', array('as'=>'buat_pagu_output', 'uses'=> 'PaguController@buat_pagu_output'));
Route::post('pagu/output/daftar', array('as'=>'simpan_pagu_output', 'uses'=> 'PaguController@simpan_pagu_output'));
Route::get('pagu/output/daftar/{id}/edit', array('as'=>'edit_pagu_output', 'uses'=> 'PaguController@edit_pagu_output'));
Route::patch('pagu/output/daftar/{id}', array('as'=>'update_pagu_output', 'uses'=> 'PaguController@update_pagu_output'));
Route::delete('pagu/output/daftar/{id}', ['as'=>'delete_pagu_output', 'uses'=>'PaguController@delete_pagu_output']);
// pagu Kegiatan
Route::get('pagu/kegiatan/daftar', array('as'=>'daftar_pagu_kegiatan', 'uses'=> 'PaguController@daftar_pagu_kegiatan'));
Route::get('pagu/kegiatan/buat', array('as'=>'buat_pagu_kegiatan', 'uses'=> 'PaguController@buat_pagu_kegiatan'));
Route::post('pagu/kegiatan/daftar', array('as'=>'simpan_pagu_kegiatan', 'uses'=> 'PaguController@simpan_pagu_kegiatan'));
Route::get('pagu/kegiatan/daftar/{id}/edit', array('as'=>'edit_pagu_kegiatan', 'uses'=> 'PaguController@edit_pagu_kegiatan'));
Route::patch('pagu/kegiatan/daftar/{id}', array('as'=>'update_pagu_kegiatan', 'uses'=> 'PaguController@update_pagu_kegiatan'));
Route::delete('pagu/kegiatan/daftar/{id}', ['as'=>'delete_pagu_kegiatan', 'uses'=>'PaguController@delete_pagu_kegiatan']);
//Serapan Dana
Route::get('serapan/bagian/{id}/daftar', array('as'=>'daftar_serapan_bagian', 'uses'=> 'UsulanController@daftar_serapan_bagian'));
Route::post('serapan/bagian/{id}/daftar', array('as'=>'tambah_serapan_bagian', 'uses'=> 'UsulanController@tambah_serapan_bagian'));

//Usulan
Route::get('usulan/daftar', array('as'=>'daftar_usulan', 'uses'=> 'UsulanController@daftar_usulan'));
Route::post('usulan/daftar', array('as'=>'tambah_usulan', 'uses'=> 'UsulanController@tambah_usulan'));
Route::delete('usulan/daftar/{idd}', ['as'=>'delete_usulan', 'uses'=>'UsulanController@delete_usulan']);

//REVISI
Route::get('revisi/daftar', array('as'=>'daftar_revisi', 'uses'=> 'UsulanController@daftar_revisi'));
Route::post('revisi/daftar', array('as'=>'tambah_revisi', 'uses'=> 'UsulanController@tambah_revisi'));
Route::delete('revisi/daftar/{idd}', ['as'=>'delete_revisi', 'uses'=>'UsulanController@delete_revisi']);

//Ubah Status Usulan
Route::get('usulan/daftar/ubah/{id}', array('as'=>'status_usulan', 'uses'=> 'UsulanController@status_usulan'));

//usulan Bagian
Route::get('usulan/bagian/{id}/daftar', array('as'=>'daftar_usulan_bagian', 'uses'=> 'UsulanController@daftar_usulan_bagian'));
Route::post('usulan/bagian/{id}/daftar', array('as'=>'tambah_usulan_bagian', 'uses'=> 'UsulanController@tambah_usulan_bagian'));
Route::delete('usulan/bagian/{id}/daftar/{idd}', ['as'=>'delete_usulan_bagian', 'uses'=>'UsulanController@delete_usulan_bagian']);

//usulan per Bagian (bagian yang akses)
Route::get('usulan/perbagian/{id}/daftar', array('as'=>'daftar_usulan_perbagian', 'uses'=> 'UsulanController@daftar_usulan_perbagian'));
Route::post('usulan/perbagian/{id}/daftar', array('as'=>'tambah_usulan_perbagian', 'uses'=> 'UsulanController@tambah_usulan_perbagian'));
Route::delete('usulan/perbagian/{id}/daftar/{idd}', ['as'=>'delete_usulan_perbagian', 'uses'=>'UsulanController@delete_usulan_perbagian']);

//detail usulan bagian
Route::post('usulan/bagian/{id_bagian}', array('as'=>'tambah_detail','uses'=> 'UsulanController@buat_detail'));
Route::get('usulan/bagian/{usulan}/buat', array('as'=>'buat_usulan_bagian', 'uses'=> 'UsulanController@buat_usulan_bagian'));
Route::post('usulan/bagian/{usulan}/nilai', array('as'=>'nilai_detail', 'uses'=> 'UsulanController@nilai_detail'));
Route::get('usulan/bagian/{id_bagian}/{tahun}/{subkom}/{akun}/buat', array('as'=>'buat_detail_usulan_bagian', 'uses'=> 'UsulanController@buat_detail_usulan_bagian'));
Route::post('usulan/bagian/{id_bagian}/{tahun}/{subkom}/{akun}/buat', array('as'=>'detail_usulan_bagian_simpan', 'uses'=> 'UsulanController@detail_usulan_bagian_simpan'));

//RKAKL
Route::get('rkakl/daftar', array('as'=>'daftar_rkakl', 'uses'=> 'UsulanController@daftar_rkakl'));
Route::post('rkakl/daftar', array('as'=>'tambah_rkakl', 'uses'=> 'UsulanController@tambah_rkakl'));
Route::delete('rkakl/daftar/{id}', ['as'=>'delete_rkakl', 'uses'=>'UsulanController@delete_rkakl']);
Route::get('rkakl/detail/daftar/{tahun}/{subkom}/{akun}/buat', array('as'=>'buat_detail_rkakl', 'uses'=> 'UsulanController@buat_detail_rkakl'));
Route::post('rkakl/detail/daftar/{tahun}/{subkom}/{akun}/buat', array('as'=>'detail_rkakl_simpan', 'uses'=> 'UsulanController@detail_rkakl_simpan'));

//Detail RKAKL
Route::get('rkakl/daftar/{rkakl}/buat', array('as'=>'buat_rkakl', 'uses'=> 'UsulanController@buat_rkakl'));
Route::post('rkakl/daftar/{rkakl}/nilai', array('as'=>'nilai_rkakl', 'uses'=> 'UsulanController@nilai_rkakl'));

//bagian
Route::get('bagian/daftar', array('as'=>'daftar_bagian', 'uses'=> 'AdminController@daftar_bagian'));
// Route::get('bagian/buat', array('as'=>'tambah_bagian', 'uses'=> 'AdminController@buat_bagian'));
Route::post('bagian/daftar', array('as'=>'simpan_bagian', 'uses'=> 'AdminController@simpan_bagian'));
Route::get('bagian/daftar/{id}/edit', array('as'=>'edit_bagian', 'uses'=> 'AdminController@edit_bagian'));
Route::patch('bagian/daftar/{id}', array('as'=>'update_bagian', 'uses'=> 'AdminController@update_bagian'));
Route::delete('bagian/daftar/{id}', ['as'=>'delete_bagian', 'uses'=>'AdminController@delete_bagian']);
//kegiatan
Route::get('kegiatan/daftar', array('as'=>'daftar_kegiatan', 'uses'=> 'KodeOutputController@daftar_kegiatan'));
Route::post('kegiatan/daftar', array('as'=>'simpan_kegiatan', 'uses'=> 'KodeOutputController@simpan_kegiatan'));
Route::get('kegiatan/daftar/{id}/edit', array('as'=>'edit_kegiatan', 'uses'=> 'KodeOutputController@edit_kegiatan'));
Route::patch('kegiatan/daftar/{id}', array('as'=>'update_kegiatan', 'uses'=> 'KodeOutputController@update_kegiatan'));
Route::delete('kegiatan/daftar/{id}', ['as'=>'delete_kegiatan', 'uses'=>'KodeOutputController@delete_kegiatan']);
//output
Route::get('output/daftar', array('as'=>'daftar_output', 'uses'=> 'KodeOutputController@daftar_output'));
Route::post('output/daftar', array('as'=>'simpan_output', 'uses'=> 'KodeOutputController@simpan_output'));
Route::get('output/daftar/{id}/edit', array('as'=>'edit_output', 'uses'=> 'KodeOutputController@edit_output'));
Route::patch('output/daftar/{id}', array('as'=>'update_output', 'uses'=> 'KodeOutputController@update_output'));
Route::delete('output/daftar/{id}', ['as'=>'delete_output', 'uses'=>'KodeOutputController@delete_output']);
//sub output
Route::get('suboutput/daftar', array('as'=>'daftar_suboutput', 'uses'=> 'KodeOutputController@daftar_suboutput'));
Route::post('suboutput/daftar', array('as'=>'simpan_suboutput', 'uses'=> 'KodeOutputController@simpan_suboutput'));
Route::get('suboutput/daftar/{id}/edit', array('as'=>'edit_suboutput', 'uses'=> 'KodeOutputController@edit_suboutput'));
Route::patch('suboutput/daftar/{id}', array('as'=>'update_suboutput', 'uses'=> 'KodeOutputController@update_suboutput'));
Route::delete('suboutput/daftar/{id}', ['as'=>'delete_suboutput', 'uses'=>'KodeOutputController@delete_suboutput']);
//komponen input
Route::get('input/daftar', array('as'=>'daftar_input', 'uses'=> 'KodeOutputController@daftar_input'));
Route::post('input/daftar', array('as'=>'simpan_input', 'uses'=> 'KodeOutputController@simpan_input'));
Route::get('input/daftar/{id}/edit', array('as'=>'edit_input', 'uses'=> 'KodeOutputController@edit_input'));
Route::patch('input/daftar/{id}', array('as'=>'update_input', 'uses'=> 'KodeOutputController@update_input'));
Route::delete('input/daftar/{id}', ['as'=>'delete_input', 'uses'=>'KodeOutputController@delete_input']);
//sub input
Route::get('subinput/daftar', array('as'=>'daftar_subinput', 'uses'=> 'KodeOutputController@daftar_subinput'));
Route::post('subinput/daftar', array('as'=>'simpan_subinput', 'uses'=> 'KodeOutputController@simpan_subinput'));
Route::get('subinput/daftar/{id}/edit', array('as'=>'edit_subinput', 'uses'=> 'KodeOutputController@edit_subinput'));
Route::patch('subinput/daftar/{id}', array('as'=>'update_subinput', 'uses'=> 'KodeOutputController@update_subinput'));
Route::delete('subinput/daftar/{id}', ['as'=>'delete_subinput', 'uses'=>'KodeOutputController@delete_subinput']);
//akun
Route::get('akun/daftar', array('as'=>'daftar_akun', 'uses'=> 'KodeOutputController@daftar_akun'));
Route::post('akun/daftar', array('as'=>'simpan_akun', 'uses'=> 'KodeOutputController@simpan_akun'));
Route::get('akun/daftar/{id}/edit', array('as'=>'edit_akun', 'uses'=> 'KodeOutputController@edit_akun'));
Route::patch('akun/daftar/{id}', array('as'=>'update_akun', 'uses'=> 'KodeOutputController@update_akun'));
Route::delete('akun/daftar/{id}', ['as'=>'delete_akun', 'uses'=>'KodeOutputController@delete_akun']);
//rekap belanja
Route::get('belanja/daftar', array('as'=>'belanja_daftar', 'uses'=> 'BelanjaController@belanja_daftar'));
Route::get('belanja/buat', array('as'=>'belanja_buat', 'uses'=> 'BelanjaController@belanja_buat'));
Route::post('belanja/simpan', array('as'=>'simpan_belanja', 'uses'=> 'BelanjaController@simpan_belanja'));
//rekap belanja bagian
Route::get('belanja/bagian/daftar', array('as'=>'belanja_bagian_daftar', 'uses'=> 'BelanjaController@belanja_bagian_daftar'));

//sk
Route::get('sk/daftar', array('as'=>'daftar_sk', 'uses'=> 'AdminController@daftar_sk'));
Route::get('sk/buat', array('as'=>'buat_sk', 'uses'=> 'AdminController@buat_sk'));
Route::post('sk/daftar', array('as'=>'simpan_sk', 'uses'=> 'AdminController@simpan_sk'));
//user
Route::get('user/daftar', array('as'=>'daftar_user', 'uses'=> 'AdminController@daftar_user'));
Route::post('user/daftar', array('as'=>'simpan_user', 'uses'=> 'AdminController@simpan_user'));
Route::get('user/buat', array('as'=>'buat_user', 'uses'=> 'AdminController@buat_user'));
Route::get('user/daftar/{id}/edit', array('as'=>'edit_user', 'uses'=> 'AdminController@edit_user'));
Route::patch('user/daftar/{id}', array('as'=>'update_user', 'uses'=> 'AdminController@update_user'));
Route::delete('user/daftar/{id}', ['as'=>'delete_user', 'uses'=>'AdminController@delete_user']);
//SPJ UP
Route::get('spj_up/daftar', array('as'=>'spjup_daftar', 'uses'=> 'SpjController@spjup_daftar'));
Route::get('spj_up/buat', array('as'=>'spjup_buat', 'uses'=> 'SpjController@spjup_buat'));
Route::post('spj_up/daftar', array('as'=>'spjup_simpan', 'uses'=> 'SpjController@spjup_simpan'));
Route::get('spj_up/daftar/{id}/edit', array('as'=>'spjup_edit', 'uses'=> 'SpjController@spjup_edit'));
Route::patch('spj_up/daftar/{id}', array('as'=>'spjup_update', 'uses'=> 'SpjController@spjup_update'));
Route::delete('spj_up/daftar/{id}', ['as'=>'spjup_delete', 'uses'=>'SpjController@spjup_delete']);
Route::get('spj_up/daftar/{id}/detail', array('as'=>'spjup_detail', 'uses'=> 'SpjController@spjup_detail'));
Route::post('spj_up/daftar/{id}/detail', array('as'=>'spjup_detail_simpan', 'uses'=> 'SpjController@spjup_detail_simpan'));
Route::get('spj_up/detail/edit', array('as'=>'spjup_edit2', 'uses'=> 'SpjController@spjup_edit2'));
//SPJ LS dan Daftar Nominatif
Route::get('spj_ls/daftar', array('as'=>'spjls_daftar', 'uses'=> 'SpjController@spjls_daftar'));
Route::get('spj_ls/buat', array('as'=>'spjls_buat', 'uses'=> 'SpjController@spjls_buat'));
Route::get('spj_ls/edit', array('as'=>'spjls_edit', 'uses'=> 'SpjController@spjls_edit'));
Route::get('spj_ls/daftar/{id}', array('as'=>'spjls_detail', 'uses'=> 'SpjController@spjls_detail'));
Route::post('spj_ls/daftar/{id}', array('as'=>'spjls_tambah', 'uses'=> 'SpjController@spjls_tambah'));
Route::get('spj_ls/daftar/{id}/edit', array('as'=>'nominatif_edit', 'uses'=> 'SpjController@nominatif_edit'));
Route::get('nominatif/buat', array('as'=>'nominatif_buat', 'uses'=> 'SpjController@nominatif_buat'));
