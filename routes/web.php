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
//Route::get('alumni','alumniController@index');
Route::get('tampilan/angkatan/viewang','angkatanController@index');
Route::get('tampilan/angkatan/createang','angkatanController@create');
Route::post('angkatanModel','angkatanController@store');
Route::post('lanjut','alumniController@store');

Route::get('struktur_organisasi/index/','orgPUBController@index');
Route::get('struktur_organisasi/tambah/','orgPUBController@create');
Route::post('struktur_organisasi/store/','orgPUBController@store');
Route::get('struktur_organisasi/edit/{x}','orgPUBController@edit');
Route::post('struktur_organisasi/update/{y}','orgPUBController@update');
Route::get('struktur_organisasi/hapus/{z}','orgPUBController@destroy');

Route::get('status_pub/index/','statusPubController@index');
Route::get('status_pub/tambah/','statusPubController@create');
Route::post('status_pub/store/','statusPubController@store');
Route::get('status_pub/edit/{x}','statusPubController@edit');
Route::post('status_pub/update/{y}','statusPubController@update');
Route::get('status_pub/hapus/{z}','statusPubController@destroy'); 	

Route::get('alumni','alumniController@index');
Route::get('tambah/mahasiswa','alumniController@create');
Route::get('mahasiswa','mahasiswaController@index');
Route::get('tampilan/angkatan/viewang','angkatanController@index');
Route::get('tampilan/angkatan/createang','angkatanController@create');
Route::post('angkatanModel','angkatanController@store');
Route::post('lanjut','alumniController@store');
Route::get('lanjut/pengalaman','alumniController@index2');
Route::get('tambahAlumni','alumniController@index3');
Route::post('tambah/pengalaman','alumniController@store2');
Route::post('tambah/pendidikan','alumniController@store3');

Route::get('pelatihan/index/','pelatihanController@index');
Route::get('pelatihan/tambah/','pelatihanController@create');
Route::post('pelatihan/store/','pelatihanController@store');
Route::get('pelatihan/edit/{x}','pelatihanController@edit');
Route::post('pelatihan/update/{y}','pelatihanController@update');
Route::get('pelatihan/hapus/{z}','pelatihanController@destroy');

Route::get('/pub_dok/upload', 'pubDokController@upload');
Route::post('/pub_dok/proses', 'pubDokController@proses_upload');
Route::get('tambahTahun', 'ppmbDokController@tambahTahun');
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
Route::post('updatePsi/{x}', 'hasilController@updatePsi');

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

Route::get('dokumentasi', 'ppmbDokController@dokumentasi');
Route::get('tambahDok', 'ppmbDokController@tambahDok');
Route::post('storeDok', 'ppmbDokController@storeDok');
Route::get('hapusDok/{x}', 'ppmbDokController@hapusDok');
Route::get('editDok/{x}', 'ppmbDokController@editDok');
Route::post('updateDok/{x}', 'ppmbDokController@updateDok');

//===================================USER=========================//
Route::get('user','userController@index');