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
    return view('tampilan.index');
});
Auth::routes();

	//Route::get('tampilan/mahasiswa','mahasiswaController@index');

	Route::get('tampilan/mahasiswa','mahasiswaController@index');


	Route::get('tampilan/angkatan/viewang','angkatanController@index');
 	Route::get('tampilan/angkatan/createang','angkatanController@create');
 	Route::post('angkatanModel','angkatanController@store');
 	Route::get('tampilan/angkatan/{a}','angkatanController@edit');
 	Route::post('tampilan/angkatan/{b}','angkatanController@update');
 	Route::get('tampilan/angkatan/hapu/{id}','angkatanController@destroy');


 	Route::get('tampilan/sekolah/viewsek','sekolahController@index');
 	Route::get('tampilan/sekolah/createsek','sekolahController@create');
 	Route::post('sekolahModel','sekolahController@store');
 	Route::get('tampilan/sekolah/{a}','sekolahController@edit');
 	Route::post('tampilan/sekolah/{b}','sekolahController@update');
 	Route::get('tampilan/sekolah/hps/{id}','sekolahController@destroy');


 	Route::get('tampilan/jurusan/viewjur','jurusanController@index');
 	Route::get('tampilan/jurusan/createjur','jurusanController@create');
 	Route::post('jurusanModel','jurusanController@store');
 	Route::post('jurusanModel','jurusanController@store');
 	Route::get('tampilan/jurusan/{a}','jurusanController@edit');
 	Route::post('tampilan/jurusan/{b}','jurusanController@update');
 	Route::get('tampilan/jurusan/del/{id}','jurusanController@destroy');


 	Route::get('tampilan/daerah/viewdae','daerahController@index');
 	Route::get('tampilan/daerah/createdae','daerahController@create');
 	Route::post('daerahModel','daerahController@store');
 	Route::post('daerahModel','daerahController@store');
 	Route::get('tampilan/daerah/{a}','daerahController@edit');
 	Route::post('tampilan/daerah/{b}','daerahController@update');
 	Route::get('tampilan/daerah/delet/{id}','daerahController@destroy');

// Route::get('/home', 'HomeController@index')->name('home');
