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

Auth::routes();

// Route::get('/home', 'HomeController@index');

// Route::get('/', 'ChatsController@index');
Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
// Route::get('/','ChatsController@tes');

//====================================================
//=======================USER====================
//====================================================


Route::get('/','UserController@dashboard');
Route::get('/users/profile/{id}','UserController@profile');
Route::post('/users/profile/{id}','UserController@update');
Route::post('/users/profile/{id}/password','UserController@updatePassword');

//====================================================
//=======================PENDAFTARAN==================
//====================================================


//Rekam Medis
Route::get('pendaftaran-pasien','PendaftaranController@form');
Route::post('pendaftaran-pasien','PendaftaranController@tambah');
//ajax onchange wilayah
Route::get('pendaftaran-pasien/kota/{id}','PendaftaranController@formAjaxKota');
Route::get('pendaftaran-pasien/kecamatan/{id}','PendaftaranController@formAjaxKecamatan');
Route::get('pendaftaran-pasien/kelurahan/{id}','PendaftaranController@formAjaxKelurahan');

Route::get('rawat-jalan','PendaftaranController@rawatJalan');
Route::get('rawat-jalan/input/{id}','PendaftaranController@rawatJalanInput');
Route::post('rawat-jalan','PendaftaranController@saveRawatJalan');
//ajax keyup
Route::get('rawat-jalan/norm/{id}','PendaftaranController@formAjaxCari');

Route::get('rawat-inap','PendaftaranController@rawatInap');
Route::get('rawat-inap/input/{id}','PendaftaranController@rawatInapInput');
Route::post('rawat-inap','PendaftaranController@rawatInapSimpan');
//ajax onchange ruangan
Route::get('rawat-inap/kelas/{id}','PendaftaranController@formAjaxKelas');
Route::get('rawat-inap/kamar/{id}','PendaftaranController@formAjaxKamar');


Route::get('igd','PendaftaranController@igd');
Route::get('igd/input/{id}','PendaftaranController@igdInput');
Route::post('igd','PendaftaranController@igdSimpan');
Route::get('cari-pasien','PendaftaranController@viewCariPasien');


//====================================================
//=======================PELAYANAN====================
//====================================================
Route::get('/lrj','PelayananController@indexLrj');
Route::get('/lrj/form','PelayananController@lrj');
Route::get('/lrj/form/edit/{id}','PelayananController@lrjUbah');
Route::post('/lrj/form/edit/{id}','PelayananController@lrjUbahSimpan');
Route::post('/lrj','PelayananController@lrjSimpan');
//ajax
Route::get('lrj/norm/{id}','PelayananController@AjaxCariRawatJalan');

Route::get('/rmk','PelayananController@rmk');
Route::post('/rmk','PelayananController@rmkSimpan');
//ajax
Route::get('/rmk/norm/{id}','PelayananController@AjaxCariRawatInap');

Route::get('/pelayanan-igd','PelayananController@lgd');
Route::post('/pelayanan-igd','PelayananController@lgdSimpan');
//ajax
Route::get('/pelayanan-igd/norm/{id}','PelayananController@AjaxCarilgd');


//====================================================
//=======================PELAPORAN====================
//====================================================

Route::get('laporan/register','PelaporanController@getFormRegister');
Route::post('laporan/register','PelaporanController@getFormLihatRegister');

Route::get('laporan/eksternal','PelaporanController@getFormEksternal');
Route::post('laporan/eksternal','PelaporanController@getFormLihatEksternal');
Route::get('pelaporan/kodeicd','IcdController@form');
Route::post('pelaporan/kodeicd/simpan','IcdController@simpan');
Route::post('pelaporan/kodeicd/ubah','IcdController@ubah');
Route::delete('pelaporan/kodeicd/{id}','IcdController@hapus');
Route::get('tes','PelaporanController@tes');

Route::get('chat',function(){
	return view('chat');
});

