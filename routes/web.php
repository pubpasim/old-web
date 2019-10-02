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


Route::get('tambahTahun', 'hasilController@tambahTahun');
Route::get('tambahTPA/{x}', 'hasilController@tambahTPA');
Route::post('storeTPA/{x}', 'hasilController@storeTPA');
Route::post('storeTahun', 'hasilController@storeTahun');
Route::get('hasilSeleksi', 'hasilController@hasil');
Route::post('hasil2', 'hasilController@hasil2');
Route::get('dataTPA/{x}', 'hasilController@dataTPA');
Route::get('editTPA/{x}', 'hasilController@editTPA');
Route::post('updateTPA/{x}', 'hasilController@updateTPA');
Route::get('hapusTPA/{x}', 'hasilController@hapusTPA');

Route::get('dataPsikotes/{x}', 'hasilController@dataPsikotes');
Route::get('tambahPsi/{x}', 'hasilController@tambahPsi');
Route::post('storePsikotes/{x}', 'hasilController@storePsikotes');
Route::get('hapusPsi/{x}', 'hasilController@hapusPsi');
Route::get('editPsi/{x}', 'hasilController@editPsi');
Route::post('updatePsi/{x}', 'hasilController@updatePsi');\

Route::get('dataSurvei/{x}', 'hasilController@dataSurvei');
Route::get('tambahSurvei/{x}', 'hasilController@tambahSurvei');
Route::post('storeSurvei/{x}', 'hasilController@storeSurvei');
Route::get('hapusSurvei/{x}', 'hasilController@hapusSurvei');
Route::get('editSurvei/{x}', 'hasilController@editSurvei');
Route::post('updateSurvei/{x}', 'hasilController@updateSurvei');

Route::get('dataFinal/{x}', 'hasilController@dataFinal');
Route::get('tambahFinal/{x}', 'hasilController@tambahFinal');
Route::post('storeFinal/{x}', 'hasilController@storeFinal');
Route::get('hapusFinal/{x}', 'hasilController@hapusFinal');
Route::get('editFinal/{x}', 'hasilController@editFinal');
Route::post('updateFinal/{x}', 'hasilController@updateFinal');



 	Route::get('tampilan/daerah/viewdae','daerahController@index');
 	Route::get('tampilan/daerah/createdae','daerahController@create');
 	Route::post('daerahModel','daerahController@store');
 	Route::post('daerahModel','daerahController@store');
 	Route::get('tampilan/daerah/{a}','daerahController@edit');
 	Route::post('tampilan/daerah/{b}','daerahController@update');
 	Route::get('tampilan/daerah/delet/{id}','daerahController@destroy');

Route::get('dokumentasi', 'ppmbDokController@dokumentasi');