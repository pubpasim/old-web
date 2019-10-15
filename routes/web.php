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
Route::get('/syarat_ketentuan','SyaratController@index'); 
//Route::get('/syarat_ketentuan/create','orgPPMBcontroller@create');
// Route::get('/syarat_ketentuan/store','orgPPMBcontroller@store');
Route::get('/syarat_ketentuan/edit/{id}','SyaratController@edit');
Route::post('/syarat_ketentuan/update','SyaratController@update');
// Route::get('/syarat_ketentuan/delete','orgPPMBcontroller@destroy');

Route::get('/persyaratan', function () {
    return view('ppmb.syarat_ketentuan.tambah_syaratketentuan');
});
 
//jadwal
Route::get('/jadwal_ppmb','JadwalController@index'); 
Route::get('/jadwal_ppmb/create','JadwalController@create');
Route::post('/jadwal_ppmb/store','JadwalController@store');
Route::get('/jadwal_ppmb/edit/{id}','JadwalController@edit');
Route::post('/jadwal_ppmb/update','JadwalController@update');
Route::get('/jadwal_ppmb/delete/{id}','JadwalController@destroy');

Route::get('tampilan/angkatan/viewang','angkatanController@index');
Route::get('tampilan/angkatan/createang','angkatanController@create');
Route::post('angkatanModel','angkatanController@store');
Route::post('lanjut','alumniController@store');

Route::get('struktur_organisasi','orgPUBController@index');
Route::get('struktur_organisasi/tambah/','orgPUBController@create');
Route::post('struktur_organisasi/store/','orgPUBController@store');
Route::get('struktur_organisasi/edit/{x}','orgPUBController@edit');
Route::post('struktur_organisasi/update/{y}','orgPUBController@update');
Route::get('struktur_organisasi/hapus/{z}','orgPUBController@destroy');

Route::get('status_pub','statusPubController@index');
Route::get('status_pub/tambah/','statusPubController@create');
Route::post('status_pub/store/','statusPubController@store');
Route::get('status_pub/edit/{x}','statusPubController@edit');
Route::post('status_pub/update/{y}','statusPubController@update');
Route::get('status_pub/hapus/{z}','statusPubController@destroy'); 	

Route::get('detorg_pub','detOrgPubController@index');
Route::get('detorg_pub/tambah/','detOrgPubController@create');
Route::post('detorg_pub/store/','detOrgPubController@store');
Route::get('detorg_pub/edit/{x}','detOrgPubController@edit');
Route::post('detorg_pub/update/{x}','detOrgPubController@update');
Route::get('detorg_pub/hapus/{x}','detOrgPubController@destroy'); 	

Route::get('Alumni_admin/det_pelatihan','detPelatihanController@index');
Route::get('Alumni_admin/det_pelatihan/tambah/','detPelatihanController@create');
Route::post('Alumni_admin/det_pelatihan/store/','detPelatihanController@store');
Route::get('Alumni_admin/det_pelatihan/edit/{x}','detPelatihanController@edit');
Route::post('Alumni_admin/det_pelatihan/update/{x}','detPelatihanController@update');
Route::get('Alumni_admin/det_pelatihan/hapus/{x}','detPelatihanController@destroy'); 	


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

Route::get('pelatihan','pelatihanController@index');
Route::get('pelatihan/tambah/','pelatihanController@create');
Route::post('pelatihan/store/','pelatihanController@store');
Route::get('pelatihan/edit/{x}','pelatihanController@edit');
Route::post('pelatihan/update/{x}','pelatihanController@update');
Route::get('pelatihan/hapus/{x}','pelatihanController@destroy');

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

Route::get('det_pelatihan/','detPelatihanController@index');

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

//================================ADMIN ALUMNI=============================//

Route::get('admin/alumni/{x}','alumni_adminController@index');
Route::post('tambahFoto','alumni_adminController@store');