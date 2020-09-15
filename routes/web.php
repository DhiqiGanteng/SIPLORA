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
Route::get('/', 'homeController@index');
Route::post('/lapor','laporanController@store');
Route::get('/buatLaporan', 'laporanController@index');

Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'laporanController@selectAjax']);


Route::get('/lacakLaporan','laporanController@lacakLaporan');
Route::match(['get', 'post'],'/lacakLaporan/lacakLaporan_kode','laporanController@lacakLaporanKode');
Route::match(['get', 'post'],'/lacakLaporan/lacakLaporan_nama','laporanController@lacakLaporanNama');

Route::match(['get','post'],'/berandaBNPB','pemerintahController@BNPB');
Route::get('/berandaBNPB/rekapitulasiBNPB','pemerintahController@rekapitulasiBNPB');
Route::get('/berandaBNPB/verifikasi','pemerintahController@verifikasiBNPB');
Route::patch('/berandaBNPB/verifikasi/diterima/{id}','pemerintahController@verifikasi');
Route::patch('/berandaBNPB/verifikasi/ditolak/{id}','pemerintahController@tolakVerifikasi');
Route::get('/berandaBNPB/manajement','pemerintahController@manajementBNPB');
Route::patch('/berandaBNPB/manajement/diterima/{id}','pemerintahController@manajement');
Route::patch('/berandaBNPB/manajement/ditolak/{id}','pemerintahController@tolakManajement');

Route::get('/berandaBDPB','pemerintahController@BDPB');
Route::get('/berandaBDPB/rekapitulasiBDPB','pemerintahController@rekapitulasiBDPB');
Route::get('/berandaBDPB/instruksiBDPB','pemerintahController@instruksiBDPB');
Route::patch('/berandaBDPB/instruksiBDPB/diterima/{id}','pemerintahController@instruksi');
Route::patch('/berandaBDPB/instruksiBDPB/ditolak/{id}','pemerintahController@tolakInstruksi');
Route::get('/berandaBDPB/validasiBDPB','pemerintahController@validasiBDPB');
Route::patch('/berandaBDPB/validasiBDPB/diterima/{id}','pemerintahController@validasi');
Route::patch('/berandaBDPB/validasiBDPB/ditolak/{id}','pemerintahController@tolakValidasi');
Route::get('/berandaBDPB/adminBDPB','pemerintahController@admin');

Route::get('/berandaDinas','pemerintahController@dinas');
Route::get('/berandaDinas/rekapitulasiDinas','pemerintahController@rekapitulasiDinas');
Route::get('/konfirmasiDinas','pemerintahController@konfirmasidinas');
Route::patch('/konfirmasiDinas/Terlaksana/{id}','pemerintahController@terlaksana');

Route::get('/home', 'pemerintahController@index');
Route::get('/login', 'pemerintahController@login');
Route::post('/loginPost', 'pemerintahController@loginPost');
Route::get('/register', 'daftarController@register');
Route::post('/registerPost', 'daftarController@registerPost');
Route::get('/logout', 'pemerintahController@logout');;

Route::get('/coba', 'coba@index');
Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'coba@selectAjax']);
