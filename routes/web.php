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


Route::get('admin', function () {
	return view('tampilan.index');
});

//struktur organisasi ppmb
Route::get('/struktur_ppmb','orgPPMBcontroller@index'); 
Route::get('/struktur_ppmb/create','orgPPMBcontroller@create');
Route::post('/struktur_ppmb/store','orgPPMBcontroller@store');
Route::get('/struktur_ppmb/edit/{id}','orgPPMBcontroller@edit');
Route::post('/struktur_ppmb/update','orgPPMBcontroller@update');
Route::get('/struktur_ppmb/delete/{id}','orgPPMBcontroller@destroy');

//syarat ketentuan 
Route::post('/syarat_ketentuan','SyaratController@index'); 
//Route::get('/syarat_ketentuan/create','orgPPMBcontroller@create');
// Route::get('/syarat_ketentuan/store','orgPPMBcontroller@store');
Route::get('/syarat_ketentuan/edit/{id}','SyaratController@edit');
Route::post('/syarat_ketentuan/update','SyaratController@update');
// Route::get('/syarat_ketentuan/delete','orgPPMBcontroller@destroy');

Route::get('/persyaratan', function () {
	return view('ppmb.syarat_ketentuan.edit_syarat');
});

//jadwal
Route::get('/jadwal_ppmb','JadwalController@index'); 
Route::get('/jadwal_ppmb/create','JadwalController@create');
Route::post('/jadwal_ppmb/store','JadwalController@store');
Route::get('/jadwal_ppmb/edit/{id}','JadwalController@edit');
Route::post('/jadwal_ppmb/update','JadwalController@update');
Route::get('/jadwal_ppmb/delete/{id}','JadwalController@destroy');

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

Route::get('tampilan/angkatan/viewang','angkatanController@index');
Route::get('tampilan/angkatan/createang','angkatanController@create');

Route::get('tampilan/daerah/viewdae','daerahController@index');
Route::get('tampilan/daerah/createdae','daerahController@create');


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

Route::get('alumni/aktivitas','alumniController@aktivitas');
Route::post('alumni/aktivitas/tampil','alumniController@aktivitasTampil');
Route::get('alumni','alumniController@index');
Route::get('tambah/mahasiswa','alumniController@create');
Route::get('mahasiswa','mahasiswaController@index');
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

//===================================USER=================================//
Route::get('/','userController@index');
Route::get('login','userController@login');
Route::post('login/masuk','userController@doLogin');
Route::get('user/mahasiswa','userController@view_mhs');
Route::post('tampil/angkatan','userController@view_dataMhs');
Route::get('tampilUser','userController@tampilUser');
Route::get('tambahUser','userController@tambahUser');
Route::post('tambahUser/store','userController@tambahUser_store');
Route::post('tambah/user','userController@simpanUser');
Route::get('pub_profile','userController@profile');
Route::get('ppmb_profile','userController@ppmb_profile');
Route::get('organisasi_pub','userController@organisasi_pub');
Route::get('detail/org/{x}','userController@detail');
Route::get('pelatihan','userController@pelatihan');
Route::post('pelatihan_data','userController@pelatihan_data');
//================================ADMIN ALUMNI=============================//

Route::get('admin/alumni/{x}','alumni_adminController@index');
Route::post('tambahFoto','alumni_adminController@store');
