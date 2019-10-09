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
//     return view('tampilan.alumni.Alumni');
// });
// Auth::routes();
	Route::get('/','alumniController@index');
	Route::get('tampilan/angkatan/viewang','angkatanController@index');
 	Route::get('tampilan/angkatan/createang','angkatanController@create');
 	Route::post('angkatanModel','angkatanController@store');
 	Route::get('tampilan/alumni/aktivitas','AktivitasController@index');
 	Route::get('tampilan/alumni/tambahdok_alumni','AktivitasController@create');
 	Route::post('tampilan/alumni/tambahdok_alumni','AlumniController@store');



// Route::get('/home', 'HomeController@index')->name('home');
