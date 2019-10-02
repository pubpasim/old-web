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
	Route::get('alumni','alumniController@index');
	Route::get('mahasiswa','mahasiswaController@index');
	Route::get('tampilan/angkatan/viewang','angkatanController@index');
 	Route::get('tampilan/angkatan/createang','angkatanController@create');
 	Route::post('angkatanModel','angkatanController@store');
 	Route::post('lanjut','alumniController@store');
 	Route::get('lanjut/pengalaman','alumniController@index2');
 	Route::get('tambahAlumni','alumniController@index3');
 	Route::post('tambah/pengalaman','alumniController@store2');
 	Route::post('tambah/pendidikan','alumniController@store3');


// Route::get('/home', 'HomeController@index')->name('home');
