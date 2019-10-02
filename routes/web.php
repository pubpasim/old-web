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

// Route::get('/', function () {
//     return view('tampilan.index');
// });
// Auth::routes();
// 	Route::get('alumni','alumniController@index');
// 	Route::get('tampilan/angkatan/viewang','angkatanController@index');
//  	Route::get('tampilan/angkatan/createang','angkatanController@create');
//  	Route::post('angkatanModel','angkatanController@store');
//  	Route::post('lanjut','alumniController@store');

//  	Route::get('struktur_organisasi/index/','orgPUBController@index');
//  	Route::get('struktur_organisasi/tambah/','orgPUBController@create');
//  	Route::post('struktur_organisasi/store/','orgPUBController@store');
//  	Route::get('struktur_organisasi/edit/{x}','orgPUBController@edit');
//  	Route::post('struktur_organisasi/update/{y}','orgPUBController@update');
//  	Route::get('struktur_organisasi/hapus/{z}','orgPUBController@destroy');

// 	Route::get('status_pub/index/','statusPubController@index');
//  	Route::get('status_pub/tambah/','statusPubController@create');
//  	Route::post('status_pub/store/','statusPubController@store');
//  	Route::get('status_pub/edit/{x}','statusPubController@edit');
//  	Route::post('status_pub/update/{y}','statusPubController@update');
//  	Route::get('status_pub/hapus/{z}','statusPubController@destroy'); 	

//  	Route::get('pelatihan/index/','pelatihanController@index');
//  	Route::get('pelatihan/tambah/','pelatihanController@create');
//  	Route::post('pelatihan/store/','pelatihanController@store');
//  	Route::get('pelatihan/edit/{x}','pelatihanController@edit');
//  	Route::post('pelatihan/update/{y}','pelatihanController@update');
//  	Route::get('pelatihan/hapus/{z}','pelatihanController@destroy');

//  	Route::get('/pub_dok/upload', 'pubDokController@upload');
// 	Route::post('/pub_dok/proses', 'pubDokController@proses_upload');

// 	Route::post('/', 'UploadImageController@upload')->name('pub_dok.image');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::post('/', 'UploadImageController@upload')->name('pub_dok.image');