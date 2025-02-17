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



// Route::get('home', 'HomeController@index')->name('home');
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


Route::get('admin', function () {

	if (!Session::get('level')) {
		return redirect('login')->with('alert','Silakan login terlebih dahulu');
	}else{
		$admin=DB::table('tb_user')->where('level','admin')->count();
		$mhs=DB::table('tb_mahasiswa')->where('id_statusPub',1)->count();
		$alumni=DB::table('tb_mahasiswa')->where('id_statusPub',2)->count();
		$tampilan=DB::table('tb_tampilan_header')->get();
        
		return view('tampilan.index',compact('admin','mhs','alumni','tampilan'));
	}
});

//struktur organisasi ppmb
Route::get('struktur_ppmb','orgPPMBcontroller@index'); 
Route::get('struktur_ppmb/create','orgPPMBcontroller@create');
Route::post('struktur_ppmb/store','orgPPMBcontroller@store');
Route::get('struktur_ppmb/edit/{id}','orgPPMBcontroller@edit');
Route::post('struktur_ppmb/update','orgPPMBcontroller@update');
Route::get('struktur_ppmb/delete/{id}','orgPPMBcontroller@destroy');


//detorg 
Route::get('det_struktur_ppmb','detOrgPpmbController@index'); 
Route::get('det_struktur_ppmb/create','detOrgPpmbController@create');
Route::post('det_struktur_ppmb/store','detOrgPpmbController@store');
Route::get('det_struktur_ppmb/edit/{id}','detOrgPpmbController@edit');
Route::post('det_struktur_ppmb/update','detOrgPpmbController@update');
Route::get('det_struktur_ppmb/delete/{id}','detOrgPpmbController@destroy');
//struktur for user

//detpelatihan
Route::get('Alumni_admin/pelatihan','detail_pelatihan@index');

//syarat ketentuan 
Route::get('syarat_ketentuan','SyaratController@index'); 
Route::get('syarat_ketentuan/create','SyaratController@create'); 
Route::post('syarat_ketentuan/store','SyaratController@store'); 
Route::get('syarat_ketentuan/edit/{id}','SyaratController@edit');
Route::post('syarat_ketentuan/update','SyaratController@update');
Route::get('syarat_ketentuan/delete/{id}','SyaratController@destroy'); 


//kategori jadwal tes
Route::get('kategori_jadwal_ppmb','Kateg_jadwaltesController@index'); 
Route::get('kategori_jadwal_ppmb/create','Kateg_jadwaltesController@create');
Route::post('kategori_jadwal_ppmb/store','Kateg_jadwaltesController@store');
Route::get('kategori_jadwal_ppmb/edit/{id}','Kateg_jadwaltesController@edit');
Route::post('kategori_jadwal_ppmb/update','Kateg_jadwaltesController@update');
Route::get('kategori_jadwal_ppmb/delete/{id}','Kateg_jadwaltesController@destroy');

//jadwal
Route::get('jadwal_ppmb','JadwalController@index'); 
Route::get('jadwal_ppmb/create','JadwalController@create');
Route::post('jadwal_ppmb/store','JadwalController@store');
Route::get('jadwal_ppmb/edit/{id}','JadwalController@edit');
Route::post('jadwal_ppmb/update','JadwalController@update');
Route::get('jadwal_ppmb/delete/{id}','JadwalController@destroy');

// det jadwal
Route::get('detjadwal_ppmb','detJadwalController@index'); 
Route::get('detjadwal_ppmb/create','detJadwalController@create');
Route::post('detjadwal_ppmb/store','detJadwalController@store');
Route::get('detjadwal_ppmb/edit/{id}','detJadwalController@edit');
Route::post('detjadwal_ppmb/update','detJadwalController@update');
Route::get('detjadwal_ppmb/delete/{id}','detJadwalController@destroy');

//daerah sos
Route::get('daerah_sos_ppmb','daerah_sosController@index'); 
Route::get('daerah_sos_ppmb/create','daerah_sosController@create');
Route::post('daerah_sos_ppmb/store','daerah_sosController@store');
Route::get('daerah_sos_ppmb/edit/{id}','daerah_sosController@edit');
Route::post('daerah_sos_ppmb/update/{x}','daerah_sosController@update');
Route::get('daerah_sos_ppmb/delete/{id}','daerah_sosController@destroy');
Route::get('daerah_sos_ppmb/foto/{id}','daerah_sosController@foto');
Route::get('dok_sekolah/create/{id}','daerah_sosController@create2');
Route::post('dok_sekolah/store/{id}','daerah_sosController@store2');
Route::get('dok_sekolah/edit/{id}','daerah_sosController@edit2');
Route::post('dok_sekolah/update/{x}','daerah_sosController@update2');
Route::get('dok_sekolah/delete/{id}','daerah_sosController@destroy2');
Route::get('dok_sekolah/lihat/{id}','userController@lihat_foto');

Route::get('jad_tpa/foto/{id}','daerah_sosController@foto2');
Route::get('dok_jad_tpa/create/{id}','daerah_sosController@create3');
Route::post('dok_jad_tpa/store/{id}','daerah_sosController@store3');
Route::get('dok_jad_tpa/edit/{id}','daerah_sosController@edit3');
Route::post('dok_jad_tpa/update/{x}','daerah_sosController@update3');
Route::get('dok_jad_tpa/delete/{id}','daerah_sosController@destroy3');
Route::get('dok_jad_tpa/lihat/{id}','userController@lihat_foto2');

//jadwal_tpa
Route::get('jad_tpa','jad_tpaController@index'); 
Route::get('jad_tpa/create','jad_tpaController@create');
Route::post('jad_tpa/store','jad_tpaController@store');
Route::get('jad_tpa/edit/{id}','jad_tpaController@edit');
Route::post('jad_tpa/update','jad_tpaController@update');
Route::get('jad_tpa/delete/{id}','jad_tpaController@destroy');

//Survey
Route::get('jad_survey','jad_surveyController@index'); 
Route::get('jad_survey/create','jad_surveyController@create');
Route::post('jad_survey/store','jad_surveyController@store');
Route::get('jad_survey/edit/{id}','jad_surveyController@edit');
Route::post('jad_survey/update','jad_surveyController@update');
Route::get('jad_survey/delete/{id}','jad_surveyController@destroy');

Route::get('jad_survey/foto/{id}','jad_surveyController@foto');
Route::get('dok_jad_survey/create/{id}','jad_surveyController@create2');
Route::post('dok_jad_survey/store/{id}','jad_surveyController@store2');
Route::get('dok_jad_survey/edit/{id}','jad_surveyController@edit2');
Route::post('dok_jad_survey/update/{x}','jad_surveyController@update2');
Route::get('dok_jad_survey/delete/{id}','jad_surveyController@destroy2');
Route::get('dok_jad_survey/lihat/{id}','userController@lihat_foto3');


//peserta wawancara
Route::get('jad_wawancara_akhir','peserta_wawancara_akhirController@index'); 
Route::get('jad_wawancara_akhir/create','peserta_wawancara_akhirController@create');
Route::post('jad_wawancara_akhir/store','peserta_wawancara_akhirController@store');
Route::get('jad_wawancara_akhir/edit/{id}','peserta_wawancara_akhirController@edit');
Route::post('jad_wawancara_akhir/update','peserta_wawancara_akhirController@update');
Route::get('jad_wawancara_akhir/delete/{id}','peserta_wawancara_akhirController@destroy');

Route::get('jad_wawancara_akhir/foto','peserta_wawancara_akhirController@foto');
Route::get('dok_jad_wawancara_akhir/create','peserta_wawancara_akhirController@create2');
Route::post('dok_jad_wawancara_akhir/store','peserta_wawancara_akhirController@store2');
Route::get('dok_jad_wawancara_akhir/edit/{id}','peserta_wawancara_akhirController@edit2');
Route::post('dok_jad_wawancara_akhir/update/{x}','peserta_wawancara_akhirController@update2');
Route::get('dok_jad_wawancara_akhir/delete/{id}','peserta_wawancara_akhirController@destroy2');
Route::get('dok_jad_wawancara_akhir/lihat/{id}','userController@lihat_foto4');

//periode
Route::get('periode','PeriodeController@index'); 
Route::get('periode/create','PeriodeController@create');
Route::post('periode/store','PeriodeController@store');
Route::get('periode/edit/{id}','PeriodeController@edit');
Route::post('periode/update','PeriodeController@update');
Route::get('periode/delete/{id}','PeriodeController@destroy');

Route::get('periodeIka','PeriodeController@indexIka'); 
Route::get('periode/createIka','PeriodeController@createIka');
Route::post('periode/storeIka','PeriodeController@storeIka');
Route::get('periode/editIka/{id}','PeriodeController@editIka');
Route::post('periode/updateIka/{x}','PeriodeController@updateIka');
Route::get('periode/deleteIka/{id}','PeriodeController@destroyIka');

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
Route::get('tampilan/daerah/{a}','daerahController@edit');
Route::post('tampilan/daerah/{b}','daerahController@update');
Route::get('tampilan/daerah/delet/{id}','daerahController@destroy');

Route::get('tampilan/angkatan/viewang','angkatanController@index');
Route::get('tampilan/angkatan/createang','angkatanController@create');
Route::get('tampilan/angkatan/hapus/{x}','angkatanController@destroy');
Route::get('tampilan/angkatan/{x}','angkatanController@edit');
Route::post('tampilan/angkatan/{x}','angkatanController@update');

Route::get('tampilan/daerah/viewdae','daerahController@index');
Route::get('tampilan/daerah/createdae','daerahController@create');


Route::get('struktur_organisasi/index','orgPubController@index');
Route::get('struktur_organisasi/tambah','orgPubController@create');
Route::post('struktur_organisasi/store','orgPubController@store');
Route::get('struktur_organisasi/edit/{x}','orgPubController@edit');
Route::post('struktur_organisasi/update/{y}','orgPubController@update');
Route::get('struktur_organisasi/hapus/{z}','orgPubController@destroy');

Route::get('struktur_organisasi2/index','orgPubController@index2');
Route::get('struktur_organisasi2/tambah','orgPubController@create2');
Route::post('struktur_organisasi2/store','orgPubController@store2');
Route::get('struktur_organisasi2/edit/{x}','orgPubController@edit2');
Route::post('struktur_organisasi2/update/{y}','orgPubController@update2');
Route::get('struktur_organisasi2/hapus/{z}','orgPubController@destroy2');



Route::get('status_pub','statusPubController@index');
Route::get('status_pub/tambah','statusPubController@create');
Route::post('status_pub/store','statusPubController@store');
Route::get('status_pub/edit/{x}','statusPubController@edit');
Route::post('status_pub/update/{y}','statusPubController@update');
Route::get('status_pub/hapus/{z}','statusPubController@destroy'); 	

Route::get('status_sos','statusSosialController@index');
Route::get('status_sos/tambah','statusSosialController@create');
Route::post('status_sos/store','statusSosialController@store');
Route::get('status_sos/edit/{x}','statusSosialController@edit');
Route::post('status_sos/update/{x}','statusSosialController@update');
Route::get('status_sos/hapus/{x}','statusSosialController@destroy'); 



Route::get('detorg_pub','detOrgPubController@index');
Route::get('detorg_pub/tambah','detOrgPubController@create');
Route::post('detorg_pub/store','detOrgPubController@store');
Route::get('detorg_pub/edit/{x}','detOrgPubController@edit');
Route::post('detorg_pub/update/{x}','detOrgPubController@update');
Route::get('detorg_pub/hapus/{x}','detOrgPubController@destroy'); 	

Route::get('Alumni_admin/det_pelatihan','detPelatihanController@index');
Route::get('Alumni_admin/det_pelatihan/tambah','detPelatihanController@create');
Route::post('Alumni_admin/det_pelatihan/store','detPelatihanController@store');
Route::get('Alumni_admin/det_pelatihan/edit/{x}','detPelatihanController@edit');
Route::post('Alumni_admin/det_pelatihan/update/{x}','detPelatihanController@update');
Route::get('Alumni_admin/det_pelatihan/hapus/{x}','detPelatihanController@destroy'); 	


Route::get('alumni/aktivitas','alumniController@aktivitas');
Route::post('alumni/aktivitas/tampil','alumniController@aktivitasTampil');

Route::get('alumni','alumniController@index');
Route::get('tambah/mahasiswa','alumniController@create');
Route::get('mahasiswa','mahasiswaController@index');
Route::get('tambah/mahasiswa','mahasiswaController@create');
Route::post('simpan/mahasiswa','mahasiswaController@store');
Route::get('mahasiswaEdit/{id}','mahasiswaController@edit');
Route::post('mahasiswaEdit/{x}','mahasiswaController@update');
Route::get('mahasiswaHapus/{y}','mahasiswaController@destroy');
Route::get('alumniEdit/{id}','mahasiswaController@editAlumni');

Route::post('angkatanModel','angkatanController@store');

Route::post('lanjut','alumniController@store');
Route::get('lanjut/pengalaman','alumniController@index2');
Route::get('tambahAlumni','alumniController@index3');

Route::post('tambah/pendidikan','alumniController@store3');
Route::get('infaq','alumniController@infaq_view');
Route::get('tambahInfaq','alumniController@tambahInfaq');
Route::post('tambahInfaq','alumniController@simpanInfaq');
Route::get('editInfaq/{id}','alumniController@editInfaq');
Route::post('editInfaq/{id}','alumniController@updateInfaq');
Route::get('hapusInfaq/{id}','alumniController@hapusInfaq');


Route::get('strukturOrgAlumni','alumniController@strukturOrgAlumni');
Route::get('tambahStrukAlumni', 'alumniController@tambahStrukAlumni');
Route::post('storeStrukAlumni', 'alumniController@storeStrukAlumni');
Route::get('hapusStrukAlumni/{x}', 'alumniController@hapusStrukAlumni');
Route::get('editStrukAlumni/{x}', 'alumniController@editStrukAlumni');
Route::post('updateStrukAlumni/{x}', 'alumniController@updateStrukAlumni');


Route::get('legalitasAdmin','alumniController@legalitasAdmin');
Route::get('tambahLegalitasAdmin', 'alumniController@tambahLegalitasAdmin');
Route::post('storeLegalitasAdmin', 'alumniController@storeLegalitasAdmin');
Route::get('hapusLegalitasAdmin/{x}', 'alumniController@hapusLegalitasAdmin');

Route::get('kegiatanAlumni','alumniController@kegiatanAlumni');
Route::get('tambahDokAlumni', 'alumniController@tambahDokAlumni');
Route::post('storeDokAlumni', 'alumniController@storeDokAlumni');
Route::get('hapusDokAlumni/{x}', 'alumniController@hapusDokAlumni');
Route::get('editDokAlumni/{x}', 'alumniController@editDokAlumni');
Route::post('updateDokAlumni/{x}', 'alumniController@updateDokAlumni');

Route::get('pelatihan/index','pelatihanController@index');

Route::get('pelatihan/tambah','pelatihanController@create');
Route::post('pelatihan/store','pelatihanController@store');
Route::get('pelatihan/edit/{x}','pelatihanController@edit');
Route::post('pelatihan/update/{x}','pelatihanController@update');
Route::get('pelatihan/hapus/{x}','pelatihanController@destroy');


Route::get('pub_dok/upload', 'pubDokController@upload');
Route::post('pub_dok/proses', 'pubDokController@proses_upload');
Route::get('tambahTahun', 'hasilController@tambahTahun');


Route::get('dokumentasiPub','dokumentasiPubController@index');
Route::get('tambah_pubdok','dokumentasiPubController@create');
Route::post('simpan/kegiatan','dokumentasiPubController@store');
Route::get('edit/kegiatan/{x}','dokumentasiPubController@edit');
Route::post('edit/kegiatan/{x}','dokumentasiPubController@update');
Route::get('hapus/kegiatan/{x}','dokumentasiPubController@destroy');

// Route::get('pub_dok/upload', 'dokumentasiPubController@upload');
// Route::post('pub_dok/proses', 'dokumentasiPubController@proses_upload');
// Route::get('tambahTahun', 'ppmbDokController@tambahTahun');
Route::get('lulusTPA/{x}', 'hasilController@lulusTPA');
Route::get('tambahLulusTPA/{x}', 'hasilController@tambahLulusTPA');
Route::post('storeLulusTPA/{x}', 'hasilController@storeLulusTPA');
Route::get('editLulusTPA/{x}', 'hasilController@editLulusTPA');
Route::post('updateLulusTPA/{x}', 'hasilController@updateLulusTPA');
Route::get('hapusLulusTPA/{x}', 'hasilController@hapusLulusTPA');

Route::get('uploadFormulir', 'hasilController@uploadFormulir');
Route::get('tambahFormulir', 'hasilController@tambahFormulir');
Route::post('storeFormulir', 'hasilController@storeFormulir');
Route::get('hapusFormulir/{x}', 'hasilController@hapusFormulir');

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

Route::get('det_pelatihan','detPelatihanController@index');

Route::get('dataWawancaraAkhir/{x}', 'hasilController@dataWawancaraAkhir');
Route::get('tambahWawancaraAkhir/{x}', 'hasilController@tambahWawancaraAkhir');
Route::post('storeWawancaraAkhir/{x}', 'hasilController@storeWawancaraAkhir');
Route::get('hapusWawancaraAkhir/{x}', 'hasilController@hapusWawancaraAkhir');
Route::get('editWawancaraAkhir/{x}', 'hasilController@editWawancaraAkhir');
Route::post('updateWawancaraAkhir/{x}', 'hasilController@updateWawancaraAkhir');

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

Route::get('dataHome/{x}', 'hasilController@dataHome');
Route::get('tambahHome/{x}', 'hasilController@tambahHome');
Route::post('storeHome/{x}', 'hasilController@storeHome');
Route::get('hapusHome/{x}', 'hasilController@hapusHome');
Route::get('editHome/{x}', 'hasilController@editHome');
Route::post('updateHome/{x}', 'hasilController@updateHome');


//===================================USER=================================//
Route::get('/','userController@index');

//==============================LOGIN=====================================//

Route::get('login','userController@login');
Route::post('login/masuk','userController@doLogin');

//===================================USER=================================//
Route::get('tampilUser','userController@tampilUser');
Route::get('tambahUser','userController@tambahUser');
Route::post('tambahUser/store','userController@tambahUser_store');
Route::post('tambah/user','userController@simpanUser');
Route::get('editUser/{x}','userController@editUser');
Route::post('editUser','userController@updateUser');
Route::get('hapusUser/{x}','userController@hapusUser');


Route::get('/',function () {
	if (Session::get('level')) {
		Session::forget('level');
		return redirect('/');
	}else{	
		return redirect('/');
	}
});
Route::get('/','userController@index');
Route::get('user/mahasiswa','userController@view_mhs');
Route::post('user/mahasiswa','userController@view_dataMhs');

Route::get('pub_profile','userController@profile');
Route::get('ppmb_profile','userController@ppmb_profile');
Route::get('jadwal_ppmb_user','userController@jadwal_keseluruhan_ppmb');
Route::post('detailjadwal_ppmb_user','userController@detailjadwal_keseluruhan_ppmb');
Route::get('sosialisasi_kesekolah/{x}/{y}','userController@sekolah_sos');
Route::get('daerah_sos_ppmb_user/{x}','userController@daerah_sos');
Route::get('jadwal_tpa_user/{x}','userController@jadwal_tpa');
Route::get('jadwal_survey_user/{x}','userController@jadwal_survey');
Route::get('jadwal_wawancara_akhir_user/{x}','userController@jadwal_wankhir');
Route::get('syarat_user','userController@syarat_ketentuan');
Route::get('organisasi_ppmb','userController@organisasi_ppmb');
Route::post('tampil_organisasi_ppmb','userController@tampil_organisasi_ppmb');
Route::get('organisasi_pub','userController@organisasi_pub');
Route::post('tampil_organisasi_pub','userController@tampil_organisasi_pub');
Route::get('detail/org/{x}','userController@detail');
Route::get('detail/orgppmb/{x}','userController@detail_orgppmb');
Route::get('pelatihan','userController@pelatihan');
Route::get('pelatihan_data','userController@pelatihan_data');
Route::get('zonasi_covid19_daerah_tpa','userController@zonasi_covid19_daerah_tpa');

Route::get('pub_dok','userController@kegiatanPub');
Route::get('pub_dok/kegiatan','dokumentasiPubController@index');

Route::get('kegiatanPub','userController@kegiatanPub');
Route::get('user_hasilSeleksi','userController@hasilSeleksi');
Route::post('user_hasilSeleksi','userController@tampilSeleksi');
Route::get('user_tpa/{x}','userController@user_tpa');
Route::get('user_wawancara_akhir/{x}','userController@user_wawancara_akhir');
Route::get('user_psikotes/{x}','userController@user_psikotes');
Route::get('user_final/{x}','userController@user_final');

Route::get('user_home/{x}','userController@user_home');

Route::get('org_ikatan_alumni', 'userController@OrgIkatanAlumni');
Route::get('keg_ikatan_alumni', 'userController@KegIkatanAlumni');
Route::post('user_dok_ika', 'userController@user_dok_ika');
Route::get('user_infaq', 'userController@user_infaq');
Route::get('user_alumni', 'userController@user_alumni');
Route::post('user_alumni', 'userController@user_alumniView');
Route::post('infaq_bulan', 'userController@infaq_bulan');

Route::get('user_lulus_tpa/{x}','userController@user_lulus_tpa');
Route::get('user_dok_ppmb','userController@user_dok_ppmb');
Route::get('download_formulir','userController@user_down_formulir');
Route::get('/formulir', function () {
    return redirect('https://forms.gle/DuQR9pArTG8ZYLPY7');
});
Route::get('/profile_video', function () {
    return redirect('https://youtu.be/BGh-seYCtdo');
});
Route::get('legalitas','userController@legalitas');

Route::get('formulir_online','userController@formulir_online');
// Route::get('formulir','userController@formulir');
Route::get('video_profil','userController@video_profil');

Route::post('user_hasil_dok_ppmb','userController@user_hasil_dok_ppmb');

Route::get('user_dok_sosialisasi/{x}','userController@user_dok_sosialisasi');
Route::get('user_dok_tpa/{x}','userController@user_dok_tpa');
Route::get('user_dok_psikotest/{x}','userController@user_dok_psikotest');
Route::get('user_dok_home_visit/{x}','userController@user_dok_home_visit');
Route::get('user_dok_wawancara_akhir/{x}','userController@user_dok_wawancara_akhir');
Route::get('user_dok_mou/{x}','userController@user_dok_mou');
//================================ADMIN ALUMNI=============================//
 
Route::get('admin/alumni/{x}','alumni_adminController@index');


Route::post('Alumni_admin/index/{x}','alumni_adminController@index');
Route::get('materilogika', 'userController@materilog');
Route::get('materibasis', 'userController@materibasis');
Route::get('materistruktur', 'userController@materistruktur');
Route::get('materihtml', 'userController@materihtml');
Route::get('materifund', 'userController@materifdm');
Route::get('fdmphp', 'userController@materifdmphp');
Route::get('fdmvb', 'userController@materifdmvb');
Route::get('fdmjava', 'userController@materifdmjava');
Route::get('materifundljt', 'userController@materifdmljt');
Route::get('fdmljtphp', 'userController@materifdmphpljt');
Route::get('fdmljtvb', 'userController@materifdmvbljt');
Route::get('fdmljtjava', 'userController@materifdmjavaljt');
Route::get('totalAlumni', 'userController@totalAlumni');

Route::get('kegiatanPub','userController@kegiatanPub');
Route::post('kegiatanPub/pilihdiv','userController@kegiatanPub_pilihdiv');
Route::get('kegiatanPub/filter/{x}/{y}','userController@kegiatanPub_filter');
Route::get('pembinaPub', 'userController@pembinaPub');


Route::post('storePertanyaan', 'userController@storePertanyaan');
Route::get('pertanyaan', 'userController@pertanyaan');
Route::get('jawabPertanyaan/{x}', 'userController@jawabPertanyaan');
Route::post('storeJawab/{x}', 'userController@storeJawab');
Route::get('hapusPertanyaan/{x}', 'userController@hapusPertanyaan');

Route::get('tampilan_header', 'userController@tampilan_header');
Route::get('tampilan_header/tambah', 'userController@tampilan_header_tambah');
Route::post('tampilan_header/store', 'userController@tampilan_header_store');
Route::get('tampilan_header/edit/{x}', 'userController@tampilan_header_edit');
Route::post('tampilan_header/update/{x}', 'userController@tampilan_header_update');
Route::get('tampilan_header/hapus/{x}', 'userController@tampilan_header_hapus');

Route::get('pembina', 'userController@pembina');
Route::get('pembina/tambah', 'userController@pembina_tambah');
Route::post('pembina/store', 'userController@pembina_store');
Route::get('pembina/edit/{x}', 'userController@pembina_edit');
Route::post('pembina/update/{x}', 'userController@pembina_update');
Route::get('pembina/hapus/{x}', 'userController@pembina_hapus');


Route::get('profil_pub', 'userController@profil_pub');
Route::get('profil_pub/edit/{x}', 'userController@profil_pub_edit');
Route::post('profil_pub/update/{x}', 'userController@profil_pub_update');

Route::get('pel_logika', 'userController@pel_logika');
Route::get('pel_logika/edit/{x}', 'userController@pel_logika_edit');
Route::post('pel_logika/update/{x}', 'userController@pel_logika_update');

Route::get('pel_basis', 'userController@pel_basis');
Route::get('pel_basis/edit/{x}', 'userController@pel_basis_edit');
Route::post('pel_basis/update/{x}', 'userController@pel_basis_update');

Route::get('pel_struktur', 'userController@pel_struktur');
Route::get('pel_struktur/edit/{x}', 'userController@pel_struktur_edit');
Route::post('pel_struktur/update/{x}', 'userController@pel_struktur_update');

Route::get('pel_html', 'userController@pel_html');
Route::get('pel_html/edit/{x}', 'userController@pel_html_edit');
Route::post('pel_html/update/{x}', 'userController@pel_html_update');

Route::get('pel_fundamental', 'userController@pel_fundamental');
Route::get('pel_fundamental/edit/{x}', 'userController@pel_fundamental_edit');
Route::post('pel_fundamental/update/{x}', 'userController@pel_fundamental_update');

Route::get('pel_lanjutan', 'userController@pel_lanjutan');
Route::get('pel_lanjutan/edit/{x}', 'userController@pel_lanjutan_edit');
Route::post('pel_lanjutan/update/{x}', 'userController@pel_lanjutan_update');

//================================ADMIN ALUMNI=============================//

Route::post('akunEdit/{x}','alumni_adminController@akunEdit');
Route::get('admin/alumni/akun/{x}','alumni_adminController@akun');
Route::get('admin/alumni/{x}','alumni_adminController@index');
Route::get('admin/alumni/profile/{x}','alumni_adminController@profile');
Route::get('admin/alumni/aktivitas/{x}','alumni_adminController@aktivitas');
Route::get('editProfil/{x}','alumni_adminController@editProfil');
Route::post('simpanProfil/edit/{x}','alumni_adminController@updateProfil');
Route::post('tambahFoto','alumni_adminController@store');
Route::get('tambahPend/{x}','alumni_adminController@tambahPnd');
Route::post('simpanPend','alumni_adminController@simpanPnd');
Route::get('editPendidikan/{x}/{y}','alumni_adminController@editPendidikan');
Route::post('editPendidikan','alumni_adminController@updatePendidikan');

Route::get('tambahPeng/{x}','alumni_adminController@tambahPeng');
Route::post('tambah/pengalaman','alumni_adminController@simpanPeng');
Route::get('editPengalaman/{x}/{y}','alumni_adminController@editPengalaman');
Route::post('updatePengalaman','alumni_adminController@updatePengalaman');

Route::get('admin/aktivitas/{x}','alumni_adminController@aktivitas');
Route::post('tambahFoto/aktivitas','alumni_adminController@storeAktivitas');
Route::get('edit/aktivitas/{x}/{y}','alumni_adminController@editAktivitas');
Route::post('simpan/aktivitasEdit','alumni_adminController@updateAktivitas');
Route::get('hapusAktivitas/{x}/{y}','alumni_adminController@hapusAktivitas');