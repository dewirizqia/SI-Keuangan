<?php

use App\Bagian;
use App\Sub_Output;
use App\Role;

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


Route::get('/admin', ['as'=>'dashboard_admin','middleware' => 'super_admin', function () {return view('@layout.base_admin');}]);
Route::get('/bagian', ['as'=>'dashboard_bagian','middleware' => 'admin', function () {return view('home.admin');}]);
Route::get('/keuangan', ['as'=>'dashboard_keuangan','middleware' => 'keuangan', function () {return view('home.keuangan');}]);
Route::get('/wd2', function () {return view('home.wd2');});
Route::get('/dekan', function () {return view('home.dekan');});
Route::get('/bpp', function () {return view('home.bpp');});
Route::get('/ktu', function () {return view('home.ktu');});

// Route::get('login', function () {return view('auth/login');});

Route::get('/', 'Auth\AuthController@getLogin');
// Route::post('auth/login', 'Auth\AuthController@postLogin');
// Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
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

// Route::get('admin/pw/{$id}', array('as'=>'ubah_password_admin', 'uses'=> 'AdminController@ubahpassword_admin'));
// Route::patch('admin/pw/{$id}', array('as'=>'update_password_admin', 'uses'=> 'AdminController@update_password_admin'));
// Route::get('bagian/pw/{$id}', array('as'=>'ubah_password_bagian', 'uses'=> 'BagianController@ubahpassword_bagian'));
// Route::patch('bagian/pw/{$id}', array('as'=>'update_password_bagian', 'uses'=> 'BagianController@update_password_bagian'));
// Route::get('keuangan/pw/', function () {return view('home.dekan');});
// Route::patch('keuangan/pw/{$id}', array('as'=>'update_password_keuangan', 'uses'=> 'UsulanController@update_password_keuangan'));

/////////////////////////////////////HALAMAN SUPER ADMIN/////////////////////////////
//user
Route::get('admin/user/daftar', array('as'=>'daftar_user', 'uses'=> 'UserController@daftar_user'));
Route::post('admin/user/daftar', array('as'=>'simpan_user', 'uses'=> 'UserController@simpan_user'));
Route::get('admin/user/buat', array('as'=>'buat_user', 'uses'=> 'UserController@buat_user'));
Route::get('admin/user/daftar/{id}/edit', array('as'=>'edit_user', 'uses'=> 'UserController@edit_user'));
Route::patch('admin/user/daftar/{id}', array('as'=>'update_user', 'uses'=> 'UserController@update_user'));
Route::delete('admin/user/daftar/{id}', ['as'=>'delete_user', 'uses'=>'UserController@delete_user']);
//bagian
Route::get('admin/bagian/daftar', array('as'=>'daftar_bagian', 'uses'=> 'AdminController@daftar_bagian'));
Route::get('admin/bagian/buat', array('as'=>'tambah_bagian', 'uses'=> 'AdminController@buat_bagian'));
Route::post('admin/bagian/daftar', array('as'=>'simpan_bagian', 'uses'=> 'AdminController@simpan_bagian'));
Route::get('admin/bagian/daftar/{id}/edit', array('as'=>'edit_bagian', 'uses'=> 'AdminController@edit_bagian'));
Route::patch('admin/bagian/daftar/{id}', array('as'=>'update_bagian', 'uses'=> 'AdminController@update_bagian'));
Route::delete('admin/bagian/daftar/{id}', ['as'=>'delete_bagian', 'uses'=>'AdminController@delete_bagian']);
//kegiatan
Route::get('admin/kegiatan/daftar', array('as'=>'daftar_kegiatan', 'uses'=> 'KodeOutputController@daftar_kegiatan'));
Route::post('admin/kegiatan/daftar', array('as'=>'simpan_kegiatan', 'uses'=> 'KodeOutputController@simpan_kegiatan'));
Route::get('admin/kegiatan/daftar/{id}/edit', array('as'=>'edit_kegiatan', 'uses'=> 'KodeOutputController@edit_kegiatan'));
Route::patch('admin/kegiatan/daftar/{id}', array('as'=>'update_kegiatan', 'uses'=> 'KodeOutputController@update_kegiatan'));
Route::delete('admin/kegiatan/daftar/{id}', ['as'=>'delete_kegiatan', 'uses'=>'KodeOutputController@delete_kegiatan']);
//output
Route::get('admin/output/daftar', array('as'=>'daftar_output', 'uses'=> 'KodeOutputController@daftar_output'));
Route::post('admin/output/daftar', array('as'=>'simpan_output', 'uses'=> 'KodeOutputController@simpan_output'));
Route::get('admin/output/daftar/{id}/edit', array('as'=>'edit_output', 'uses'=> 'KodeOutputController@edit_output'));
Route::patch('admin/output/daftar/{id}', array('as'=>'update_output', 'uses'=> 'KodeOutputController@update_output'));
Route::delete('admin/output/daftar/{id}', ['as'=>'delete_output', 'uses'=>'KodeOutputController@delete_output']);
//sub output
Route::get('admin/suboutput/daftar', array('as'=>'daftar_suboutput', 'uses'=> 'KodeOutputController@daftar_suboutput'));
Route::post('admin/suboutput/daftar', array('as'=>'simpan_suboutput', 'uses'=> 'KodeOutputController@simpan_suboutput'));
Route::get('admin/suboutput/daftar/{id}/edit', array('as'=>'edit_suboutput', 'uses'=> 'KodeOutputController@edit_suboutput'));
Route::patch('admin/suboutput/daftar/{id}', array('as'=>'update_suboutput', 'uses'=> 'KodeOutputController@update_suboutput'));
Route::delete('admin/suboutput/daftar/{id}', ['as'=>'delete_suboutput', 'uses'=>'KodeOutputController@delete_suboutput']);
//komponen input
Route::get('admin/input/daftar', array('as'=>'daftar_input', 'uses'=> 'KodeOutputController@daftar_input'));
Route::post('admin/input/daftar', array('as'=>'simpan_input', 'uses'=> 'KodeOutputController@simpan_input'));
Route::get('admin/input/daftar/{id}/edit', array('as'=>'edit_input', 'uses'=> 'KodeOutputController@edit_input'));
Route::patch('admin/input/daftar/{id}', array('as'=>'update_input', 'uses'=> 'KodeOutputController@update_input'));
Route::delete('admin/input/daftar/{id}', ['as'=>'delete_input', 'uses'=>'KodeOutputController@delete_input']);
//sub input
Route::get('admin/subinput/daftar', array('as'=>'daftar_subinput', 'uses'=> 'KodeOutputController@daftar_subinput'));
Route::post('admin/subinput/daftar', array('as'=>'simpan_subinput', 'uses'=> 'KodeOutputController@simpan_subinput'));
Route::get('admin/subinput/daftar/{id}/edit', array('as'=>'edit_subinput', 'uses'=> 'KodeOutputController@edit_subinput'));
Route::patch('admin/subinput/daftar/{id}', array('as'=>'update_subinput', 'uses'=> 'KodeOutputController@update_subinput'));
Route::delete('admin/subinput/daftar/{id}', ['as'=>'delete_subinput', 'uses'=>'KodeOutputController@delete_subinput']);
//akun
Route::get('admin/akun/daftar', array('as'=>'daftar_akun', 'uses'=> 'KodeOutputController@daftar_akun'));
Route::post('admin/akun/daftar', array('as'=>'simpan_akun', 'uses'=> 'KodeOutputController@simpan_akun'));
Route::get('admin/akun/daftar/{id}/edit', array('as'=>'edit_akun', 'uses'=> 'KodeOutputController@edit_akun'));
Route::patch('admin/akun/daftar/{id}', array('as'=>'update_akun', 'uses'=> 'KodeOutputController@update_akun'));
Route::delete('admin/akun/daftar/{id}', ['as'=>'delete_akun', 'uses'=>'KodeOutputController@delete_akun']);

/////////////////////////////////////HALAMAN SUBBAGIAN KEUANGAN/////////////////////////////
// pagu
Route::get('keuangan/pagu/daftar', array('as'=>'daftar_pagu', 'uses'=> 'PaguController@daftar_pagu'));
Route::post('keuangan/pagu/daftar', array('as'=>'simpan_pagu', 'uses'=> 'PaguController@simpan_pagu'));
Route::get('keuangan/pagu/daftar/{id}/edit', array('as'=>'edit_pagu', 'uses'=> 'PaguController@edit_pagu'));
Route::patch('keuangan/pagu/daftar/{id}', array('as'=>'update_pagu', 'uses'=> 'PaguController@update_pagu'));
Route::delete('keuangan/pagu/daftar/{id}', ['as'=>'delete_pagu', 'uses'=>'PaguController@delete_pagu']);
// pagu bagian
Route::get('keuangan/pagu/bagian/daftar', array('as'=>'daftar_pagu_bagian', 'uses'=> 'PaguController@daftar_pagu_bagian'));
Route::post('keuangan/pagu/bagian/daftar', array('as'=>'simpan_pagu_bagian', 'uses'=> 'PaguController@simpan_pagu_bagian'));
Route::get('keuangan/pagu/bagian/daftar/{id}/edit', array('as'=>'edit_pagu_bagian', 'uses'=> 'PaguController@edit_pagu_bagian'));
Route::patch('keuangan/pagu/bagian/daftar/{id}', array('as'=>'update_pagu_bagian', 'uses'=> 'PaguController@update_pagu_bagian'));
Route::delete('keuangan/pagu/bagian/daftar/{id}', ['as'=>'delete_pagu_bagian', 'uses'=>'PaguController@delete_pagu_bagian']);
//Detail Pagu Bagian
Route::get('keuangan/pagu/bagian/daftar/{id}/detail', array('as'=>'detail_pagu_bagian', 'uses'=> 'PaguController@detail_pagu_bagian'));
// pagu output
Route::get('keuangan/pagu/output/daftar', array('as'=>'daftar_pagu_output', 'uses'=> 'PaguController@daftar_pagu_output'));
Route::get('keuangan/pagu/output/buat', array('as'=>'buat_pagu_output', 'uses'=> 'PaguController@buat_pagu_output'));
Route::post('keuangan/pagu/output/daftar', array('as'=>'simpan_pagu_output', 'uses'=> 'PaguController@simpan_pagu_output'));
Route::get('keuangan/pagu/output/daftar/{id}/edit', array('as'=>'edit_pagu_output', 'uses'=> 'PaguController@edit_pagu_output'));
Route::patch('keuangan/pagu/output/daftar/{id}', array('as'=>'update_pagu_output', 'uses'=> 'PaguController@update_pagu_output'));
Route::delete('keuangan/pagu/output/daftar/{id}', ['as'=>'delete_pagu_output', 'uses'=>'PaguController@delete_pagu_output']);
//Detail Pagu Output
Route::get('keuangan/pagu/output/daftar/{id}/detail', array('as'=>'detail_pagu_output', 'uses'=> 'PaguController@detail_pagu_output'));

// pagu Kegiatan
Route::get('keuangan/pagu/kegiatan/daftar', array('as'=>'daftar_pagu_kegiatan', 'uses'=> 'PaguController@daftar_pagu_kegiatan'));
Route::get('keuangan/pagu/kegiatan/buat', array('as'=>'buat_pagu_kegiatan', 'uses'=> 'PaguController@buat_pagu_kegiatan'));
Route::post('keuangan/pagu/kegiatan/daftar', array('as'=>'simpan_pagu_kegiatan', 'uses'=> 'PaguController@simpan_pagu_kegiatan'));
Route::get('keuangan/pagu/kegiatan/daftar/{id}/edit', array('as'=>'edit_pagu_kegiatan', 'uses'=> 'PaguController@edit_pagu_kegiatan'));
Route::patch('keuangan/pagu/kegiatan/daftar/{id}', array('as'=>'update_pagu_kegiatan', 'uses'=> 'PaguController@update_pagu_kegiatan'));
Route::delete('keuangan/pagu/kegiatan/daftar/{id}', ['as'=>'delete_pagu_kegiatan', 'uses'=>'PaguController@delete_pagu_kegiatan']);

// //usulan Bagian
Route::get('keuangan/usulan/{id}/daftar', array('as'=>'daftar_usulan_bagian', 'uses'=> 'UsulanController@daftar_usulan_bagian'));
Route::post('keuangan/usulan/{id}/daftar', array('as'=>'tambah_usulan_bagian', 'uses'=> 'BagianController@tambah_usulan_bagian'));
Route::delete('keuangan/usulan/{id}/daftar/{idd}', ['as'=>'delete_usulan_bagian', 'uses'=>'UsulanController@delete_usulan_bagian']);

//RKAKL
Route::get('keuangan/rkakl/daftar', array('as'=>'daftar_rkakl', 'uses'=> 'UsulanController@daftar_rkakl'));
Route::post('keuangan/rkakl/daftar', array('as'=>'tambah_rkakl', 'uses'=> 'UsulanController@tambah_rkakl'));
Route::delete('keuangan/rkakl/daftar/{id}', ['as'=>'delete_rkakl', 'uses'=>'UsulanController@delete_rkakl']);
Route::get('keuangan/rkakl/detail/daftar/{tahun}/{subkom}/{akun}/buat', array('as'=>'buat_detail_rkakl', 'uses'=> 'UsulanController@buat_detail_rkakl'));
Route::post('keuangan/rkakl/detail/daftar/{tahun}/{subkom}/{akun}/buat', array('as'=>'detail_rkakl_simpan', 'uses'=> 'UsulanController@detail_rkakl_simpan'));

//Detail RKAKL
Route::get('keuangan/rkakl/daftar/{rkakl}/buat', array('as'=>'buat_rkakl', 'uses'=> 'UsulanController@buat_rkakl'));
Route::post('keuangan/rkakl/daftar/{rkakl}/nilai', array('as'=>'nilai_rkakl', 'uses'=> 'UsulanController@nilai_rkakl'));

//Usulan
Route::get('keuangan/usulan/daftar', array('as'=>'daftar_usulan', 'uses'=> 'UsulanController@daftar_usulan'));
Route::post('keuangan/usulan/daftar', array('as'=>'tambah_usulan', 'uses'=> 'UsulanController@tambah_usulan'));
Route::delete('keuangan/usulan/daftar/{idd}', ['as'=>'delete_usulan', 'uses'=>'UsulanController@delete_usulan']);

//detail
Route::get('keuangan/usulan/daftar/{tahun}/detail', array('as'=>'detail_usulan_tahun', 'uses'=> 'UsulanController@detail_usulan_tahun'));
Route::get('keuangan/usulan/daftar/detail/{id}/edit', array('as'=>'detail_usulan_edit', 'uses'=> 'UsulanController@detail_usulan_edit'));
Route::patch('keuangan/usulan/daftar/detail/{id}', array('as'=>'detail_usulan_update', 'uses'=> 'UsulanController@detail_usulan_update'));
Route::delete('keuangan/usulan/daftar/detail/{id}', array('as'=>'detail_usulan_delete', 'uses'=> 'UsulanController@detail_usulan_delete'));
//REVISI
Route::get('keuangan/revisi/daftar', array('as'=>'daftar_revisi', 'uses'=> 'UsulanController@daftar_revisi'));
Route::post('keuangan/revisi/daftar', array('as'=>'tambah_revisi', 'uses'=> 'UsulanController@tambah_revisi'));
Route::delete('keuangan/revisi/daftar/{idd}', ['as'=>'delete_revisi', 'uses'=>'UsulanController@delete_revisi']);
//rekap belanja
Route::get('keuangan/belanja/daftar', array('as'=>'belanja_daftar', 'uses'=> 'BelanjaController@belanja_daftar'));
Route::get('keuangan/belanja/buat', array('as'=>'belanja_buat', 'uses'=> 'BelanjaController@belanja_buat'));
Route::post('keuangan/belanja/simpan', array('as'=>'simpan_belanja', 'uses'=> 'BelanjaController@simpan_belanja'));

//ubah status
Route::patch('keuangan/status/belanja/{id}/subbag', array('as'=>'status_belanja_subbag', 'uses'=> 'BelanjaController@status_belanja_subbag'));
Route::get('keuangan/status/belanja/{id}/bpp', array('as'=>'status_belanja_bpp', 'uses'=> 'BelanjaController@status_belanja_bpp'));
Route::get('keuangan/status/belanja/{id}/ppk', array('as'=>'status_belanja_ppk', 'uses'=> 'BelanjaController@status_belanja_ppk'));

Route::get('keuangan/belanja/daftar/{id}/komentar', array('as'=>'belanja_komentar', 'uses'=> 'BelanjaController@belanja_komentar'));
Route::post('keuangan/belanja/daftar/{id}/komentar', array('as'=>'belanja_komentar_simpan', 'uses'=> 'BelanjaController@belanja_komentar_simpan'));


//SPJ UP
Route::get('keuangan/spj_up/daftar', array('as'=>'spjup_daftar', 'uses'=> 'SpjController@spjup_daftar'));
Route::get('keuangan/spj_up/buat', array('as'=>'spjup_buat', 'uses'=> 'SpjController@spjup_buat'));
Route::post('keuangan/spj_up/daftar', array('as'=>'spjup_simpan', 'uses'=> 'SpjController@spjup_simpan'));
Route::get('keuangan/spj_up/daftar/{id}/edit', array('as'=>'spjup_edit', 'uses'=> 'SpjController@spjup_edit'));
Route::patch('keuangan/spj_up/daftar/{id}', array('as'=>'spjup_update', 'uses'=> 'SpjController@spjup_update'));
Route::delete('keuangan/spj_up/daftar/{id}', ['as'=>'spjup_delete', 'uses'=>'SpjController@spjup_delete']);
Route::get('keuangan/spj_up/daftar/{id}/detail', array('as'=>'spjup_detail', 'uses'=> 'SpjController@spjup_detail'));
Route::post('keuangan/spj_up/daftar/{id}/detail', array('as'=>'spjup_detail_simpan', 'uses'=> 'SpjController@spjup_detail_simpan'));
Route::get('keuangan/spj_up/detail/{id}/edit', array('as'=>'spjup_detail_edit', 'uses'=> 'SpjController@spjup_detail_edit'));
Route::patch('keuangan/spj_up/daftar/{id}/detail', array('as'=>'spjup_detail_update', 'uses'=> 'SpjController@spjup_detail_update'));
Route::delete('keuangan/spj_up/daftar/{id}/detail', ['as'=>'spjup_detail_delete', 'uses'=>'SpjController@spjup_detail_delete']);
Route::get('keuangan/spj_up/daftar/{id}/komentar', array('as'=>'spjup_komentar', 'uses'=> 'SpjController@spjup_komentar'));
Route::post('keuangan/spj_up/daftar/{id}/komentar', array('as'=>'spjup_komentar_simpan', 'uses'=> 'SpjController@spjup_komentar_simpan'));
//SPJ LS dan Daftar Nominatif
Route::get('spj_ls/daftar', array('as'=>'spjls_daftar', 'uses'=> 'SpjController@spjls_daftar'));
Route::get('spj_ls/buat', array('as'=>'spjls_buat', 'uses'=> 'SpjController@spjls_buat'));
Route::post('spj_ls/daftar', array('as'=>'spjls_simpan', 'uses'=> 'SpjController@spjls_simpan'));
Route::get('spj_ls/daftar/{id}/edit', array('as'=>'spjls_edit', 'uses'=> 'SpjController@spjls_edit'));
Route::patch('spj_ls/daftar/{id}', array('as'=>'spjls_update', 'uses'=> 'SpjController@spjls_update'));
Route::delete('spj_ls/daftar/{id}', ['as'=>'spjls_delete', 'uses'=>'SpjController@spjls_delete']);
Route::get('keuangan/spj_ls/daftar/{id}/detail', array('as'=>'spjls_detail', 'uses'=> 'SpjController@spjls_detail'));
Route::post('keuangan/spjls/daftar/{id}/detail', array('as'=>'spjls_detail_simpan', 'uses'=> 'SpjController@spjls_detail_simpan'));
Route::get('keuangan/spj_ls/detail/{id}/edit', array('as'=>'spjls_detail_edit', 'uses'=> 'SpjController@spjls_detail_edit'));
Route::patch('keuangan/spj_ls/daftar/{id}/detail', array('as'=>'spjls_detail_update', 'uses'=> 'SpjController@spjls_detail_update'));
Route::delete('keuangan/spj_ls/daftar/{id}/detail', ['as'=>'spjls_detail_delete', 'uses'=>'SpjController@spjls_detail_delete']);
Route::get('keuangan/spj_ls/daftar/{id}/komentar', array('as'=>'spjls_komentar', 'uses'=> 'SpjController@spjls_komentar'));
Route::post('keuangan/spj_ls/daftar/{id}/komentar', array('as'=>'spjls_komentar_simpan', 'uses'=> 'SpjController@spjls_komentar_simpan'));
Route::get('keuangan/nominatif', array('as'=>'nominatif_menu', 'uses'=> 'SpjController@nominatif_menu'));
Route::post('keuangan/nominatif/daftar', array('as'=>'nominatif_daftar', 'uses'=> 'SpjController@nominatif_daftar'));


/////////////////////////////////////HALAMAN ADMIN PRODI/SUBBAGIAN//////////////////////////////////////////////////////////
//Serapan Dana
Route::get('bagian/serapan/bagian/{id}/daftar', array('as'=>'daftar_serapan_bagian', 'uses'=> 'BagianController@daftar_serapan_bagian'));
//usulan
Route::get('bagian/usulan/{id}/daftar', array('as'=>'daftar_usulan_perbagian', 'uses'=> 'BagianController@daftar_usulan_perbagian'));
Route::post('bagian/usulan/{id}/daftar', array('as'=>'tambahkan_usulan_perbagian', 'uses'=> 'BagianController@tes'));
Route::delete('bagian/usulan/{id}/daftar/{idd}', ['as'=>'delete_usulan_perbagian', 'uses'=>'BagianController@delete_usulan_perbagian']);
//REVISI
Route::get('bagian/revisi/{id}/daftar', array('as'=>'daftar_revisi_perbagian', 'uses'=> 'BagianController@daftar_revisi_perbagian'));
Route::get('bagian/revisi/daftar/{revisi}', array('as'=>'buat_revisi_perbagian', 'uses'=> 'BagianController@daftar_revisi_perbagian'));
//Ubah Status Usulan (Bagian)
Route::get('bagian/usulan/daftar/ubah/{id}', array('as'=>'status_usulan', 'uses'=> 'BagianController@status_usulan'));

//detail usulan bagian
Route::post('bagian/usulan/bagian/{id_bagian}', array('as'=>'tambah_detail','uses'=> 'UsulanController@buat_detail'));
Route::get('bagian/usulan/bagian/{usulan}/buat', array('as'=>'buat_usulan_bagian', 'uses'=> 'UsulanController@buat_usulan_bagian'));
Route::patch('bagian/usulan/bagian/{usulan}/buat', array('as'=>'status_usulan', 'uses'=> 'BagianController@status_usulan'));
Route::post('bagian/usulan/bagian/{id}/nilai', array('as'=>'nilai_detail', 'uses'=> 'UsulanController@nilai_detail'));
Route::get('bagian/usulan/bagian/{id_bagian}/{tahun}/{subkom}/{akun}/buat', array('as'=>'buat_detail_usulan_bagian', 'uses'=> 'UsulanController@buat_detail_usulan_bagian'));
Route::post('bagian/usulan/bagian/{id_bagian}/{tahun}/{subkom}/{akun}/buat', array('as'=>'detail_usulan_bagian_simpan', 'uses'=> 'UsulanController@detail_usulan_bagian_simpan'));

//rekap belanja
Route::get('bagian/belanja/{id}/daftar', array('as'=>'belanja_bagian_daftar', 'uses'=> 'BelanjaController@belanja_bagian_daftar'));
Route::get('bagian/belanja/buat', array('as'=>'belanja_buat', 'uses'=> 'BelanjaController@belanja_buat'));
Route::post('bagian/belanja/buat', array('as'=>'belanja_simpan', 'uses'=> 'BelanjaController@belanja_simpan'));
Route::get('bagian/belanja/edit/{id}', array('as'=>'belanja_edit', 'uses'=> 'BelanjaController@belanja_edit'));
Route::patch('bagian/belanja/edit/{id}', array('as'=>'belanja_update', 'uses'=> 'BelanjaController@belanja_update'));
Route::delete('bagian/belanja/daftar/{id}', array('as'=>'belanja_delete', 'uses'=> 'BelanjaController@belanja_delete'));
Route::get('bagian/belanja/daftar/{id}/komentar', array('as'=>'belanja_bagian_komentar', 'uses'=> 'BelanjaController@belanja_bagian_komentar'));


////////////////////////////////////EXPORT TO EXCEL///////////////////////////////////////////
Route::get('excelrab/{id}', ['as'=>'excelrab', 'uses'=> 'ExcelController@rab']);

Route::get('excelup/{id}', ['as'=>'excelup', 'uses'=> 'ExcelController@up']);

Route::get('excells/{id}', ['as'=>'excells', 'uses'=> 'ExcelController@ls']);

Route::get('excelnominatif/{id}', ['as'=>'excelnominatif', 'uses'=> 'ExcelController@nominatif']);


Route::get('export', ['as'=>'export', 'uses'=> 'ReportController@export']);

Route::get('status/{id}', array('as'=>'status', 'uses'=> 'BelanjaController@status_belanja_ppk'));