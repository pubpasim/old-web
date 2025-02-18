<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orgPPMBcontroller;
use App\Http\Controllers\detOrgPpmbController;
use App\Http\Controllers\detail_pelatihan;
use App\Http\Controllers\SyaratController;
use App\Http\Controllers\Kateg_jadwaltesController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\detJadwalController;
use App\Http\Controllers\daerah_sosController;
use App\Http\Controllers\userController;
use App\Http\Controllers\jad_tpaController;
use App\Http\Controllers\jad_surveyController;
use App\Http\Controllers\peserta_wawancara_akhirController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\sekolahController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\daerahController;
use App\Http\Controllers\angkatanController;
use App\Http\Controllers\orgPubController;
use App\Http\Controllers\statusPubController;
use App\Http\Controllers\statusSosialController;
use App\Http\Controllers\detOrgPubController;
use App\Http\Controllers\detPelatihanController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\alumniController;
use App\Http\Controllers\pelatihanController;
use App\Http\Controllers\pubDokController;
use App\Http\Controllers\hasilController;
use App\Http\Controllers\dokumentasiPubController;
use App\Http\Controllers\ppmbDokController;
use App\Http\Controllers\alumni_adminController;


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
Route::get('struktur_ppmb', [orgPPMBcontroller::class, 'index']);
Route::get('struktur_ppmb/create', [orgPPMBcontroller::class, 'create']);
Route::post('struktur_ppmb/store', [orgPPMBcontroller::class, 'store']);
Route::get('struktur_ppmb/edit/{id}', [orgPPMBcontroller::class, 'edit']);
Route::post('struktur_ppmb/update', [orgPPMBcontroller::class, 'update']);
Route::get('struktur_ppmb/delete/{id}', [orgPPMBcontroller::class, 'destroy']);


//detorg
Route::get('det_struktur_ppmb', [detOrgPpmbController::class, 'index']);
Route::get('det_struktur_ppmb/create', [detOrgPpmbController::class, 'create']);
Route::post('det_struktur_ppmb/store', [detOrgPpmbController::class, 'store']);
Route::get('det_struktur_ppmb/edit/{id}', [detOrgPpmbController::class, 'edit']);
Route::post('det_struktur_ppmb/update', [detOrgPpmbController::class, 'update']);
Route::get('det_struktur_ppmb/delete/{id}', [detOrgPpmbController::class, 'destroy']);
//struktur for user

//detpelatihan
Route::get('alumni_admin/pelatihan', [detail_pelatihan::class, 'index']);

//syarat ketentuan
Route::get('syarat_ketentuan', [SyaratController::class, 'index']);
Route::get('syarat_ketentuan/create', [SyaratController::class, 'create']);
Route::post('syarat_ketentuan/store', [SyaratController::class, 'store']);
Route::get('syarat_ketentuan/edit/{id}', [SyaratController::class, 'edit']);
Route::post('syarat_ketentuan/update', [SyaratController::class, 'update']);
Route::get('syarat_ketentuan/delete/{id}', [SyaratController::class, 'destroy']);


//kategori jadwal tes
Route::get('kategori_jadwal_ppmb', [Kateg_jadwaltesController::class, 'index']);
Route::get('kategori_jadwal_ppmb/create', [Kateg_jadwaltesController::class, 'create']);
Route::post('kategori_jadwal_ppmb/store', [Kateg_jadwaltesController::class, 'store']);
Route::get('kategori_jadwal_ppmb/edit/{id}', [Kateg_jadwaltesController::class, 'edit']);
Route::post('kategori_jadwal_ppmb/update', [Kateg_jadwaltesController::class, 'update']);
Route::get('kategori_jadwal_ppmb/delete/{id}', [Kateg_jadwaltesController::class, 'destroy']);

//jadwal
Route::get('jadwal_ppmb', [JadwalController::class, 'index']);
Route::get('jadwal_ppmb/create', [JadwalController::class, 'create']);
Route::post('jadwal_ppmb/store', [JadwalController::class, 'store']);
Route::get('jadwal_ppmb/edit/{id}', [JadwalController::class, 'edit']);
Route::post('jadwal_ppmb/update', [JadwalController::class, 'update']);
Route::get('jadwal_ppmb/delete/{id}', [JadwalController::class, 'destroy']);

// det jadwal
Route::get('detjadwal_ppmb', [detJadwalController::class, 'index']);
Route::get('detjadwal_ppmb/create', [detJadwalController::class, 'create']);
Route::post('detjadwal_ppmb/store', [detJadwalController::class, 'store']);
Route::get('detjadwal_ppmb/edit/{id}', [detJadwalController::class, 'edit']);
Route::post('detjadwal_ppmb/update', [detJadwalController::class, 'update']);
Route::get('detjadwal_ppmb/delete/{id}', [detJadwalController::class, 'destroy']);

//daerah sos
Route::get('daerah_sos_ppmb', [daerah_sosController::class, 'index']);
Route::get('daerah_sos_ppmb/create', [daerah_sosController::class, 'create']);
Route::post('daerah_sos_ppmb/store', [daerah_sosController::class, 'store']);
Route::get('daerah_sos_ppmb/edit/{id}', [daerah_sosController::class, 'edit']);
Route::post('daerah_sos_ppmb/update/{x}', [daerah_sosController::class, 'update']);
Route::get('daerah_sos_ppmb/delete/{id}', [daerah_sosController::class, 'destroy']);
Route::get('daerah_sos_ppmb/foto/{id}', [daerah_sosController::class, 'foto']);
Route::get('dok_sekolah/create/{id}', [daerah_sosController::class, 'create2']);
Route::post('dok_sekolah/store/{id}', [daerah_sosController::class, 'store2']);
Route::get('dok_sekolah/edit/{id}', [daerah_sosController::class, 'edit2']);
Route::post('dok_sekolah/update/{x}', [daerah_sosController::class, 'update2']);
Route::get('dok_sekolah/delete/{id}', [daerah_sosController::class, 'destroy2']);
Route::get('dok_sekolah/lihat/{id}', [userController::class, 'lihat_foto']);

Route::get('jad_tpa/foto/{id}', [daerah_sosController::class, 'foto2']);
Route::get('dok_jad_tpa/create/{id}', [daerah_sosController::class, 'create3']);
Route::post('dok_jad_tpa/store/{id}', [daerah_sosController::class, 'store3']);
Route::get('dok_jad_tpa/edit/{id}', [daerah_sosController::class, 'edit3']);
Route::post('dok_jad_tpa/update/{x}', [daerah_sosController::class, 'update3']);
Route::get('dok_jad_tpa/delete/{id}', [daerah_sosController::class, 'destroy3']);
Route::get('dok_jad_tpa/lihat/{id}', [userController::class, 'lihat_foto2']);

//jadwal_tpa
Route::get('jad_tpa', [jad_tpaController::class, 'index']);
Route::get('jad_tpa/create', [jad_tpaController::class, 'create']);
Route::post('jad_tpa/store', [jad_tpaController::class, 'store']);
Route::get('jad_tpa/edit/{id}', [jad_tpaController::class, 'edit']);
Route::post('jad_tpa/update', [jad_tpaController::class, 'update']);
Route::get('jad_tpa/delete/{id}', [jad_tpaController::class, 'destroy']);

//Survey
Route::get('jad_survey', [jad_surveyController::class, 'index']);
Route::get('jad_survey/create', [jad_surveyController::class, 'create']);
Route::post('jad_survey/store', [jad_surveyController::class, 'store']);
Route::get('jad_survey/edit/{id}', [jad_surveyController::class, 'edit']);
Route::post('jad_survey/update', [jad_surveyController::class, 'update']);
Route::get('jad_survey/delete/{id}', [jad_surveyController::class, 'destroy']);

Route::get('jad_survey/foto/{id}', [jad_surveyController::class, 'foto']);
Route::get('dok_jad_survey/create/{id}', [jad_surveyController::class, 'create2']);
Route::post('dok_jad_survey/store/{id}', [jad_surveyController::class, 'store2']);
Route::get('dok_jad_survey/edit/{id}', [jad_surveyController::class, 'edit2']);
Route::post('dok_jad_survey/update/{x}', [jad_surveyController::class, 'update2']);
Route::get('dok_jad_survey/delete/{id}', [jad_surveyController::class, 'destroy2']);
Route::get('dok_jad_survey/lihat/{id}', [userController::class, 'lihat_foto3']);


//peserta wawancara
Route::get('jad_wawancara_akhir', [peserta_wawancara_akhirController::class, 'index']);
Route::get('jad_wawancara_akhir/create', [peserta_wawancara_akhirController::class, 'create']);
Route::post('jad_wawancara_akhir/store', [peserta_wawancara_akhirController::class, 'store']);
Route::get('jad_wawancara_akhir/edit/{id}', [peserta_wawancara_akhirController::class, 'edit']);
Route::post('jad_wawancara_akhir/update', [peserta_wawancara_akhirController::class, 'update']);
Route::get('jad_wawancara_akhir/delete/{id}', [peserta_wawancara_akhirController::class, 'destroy']);

Route::get('jad_wawancara_akhir/foto', [peserta_wawancara_akhirController::class, 'foto']);
Route::get('dok_jad_wawancara_akhir/create', [peserta_wawancara_akhirController::class, 'create2']);
Route::post('dok_jad_wawancara_akhir/store', [peserta_wawancara_akhirController::class, 'store2']);
Route::get('dok_jad_wawancara_akhir/edit/{id}', [peserta_wawancara_akhirController::class, 'edit2']);
Route::post('dok_jad_wawancara_akhir/update/{x}', [peserta_wawancara_akhirController::class, 'update2']);
Route::get('dok_jad_wawancara_akhir/delete/{id}', [peserta_wawancara_akhirController::class, 'destroy2']);
Route::get('dok_jad_wawancara_akhir/lihat/{id}', [userController::class, 'lihat_foto4']);

//periode
Route::get('periode', [PeriodeController::class, 'index']);
Route::get('periode/create', [PeriodeController::class, 'create']);
Route::post('periode/store', [PeriodeController::class, 'store']);
Route::get('periode/edit/{id}', [PeriodeController::class, 'edit']);
Route::post('periode/update', [PeriodeController::class, 'update']);
Route::get('periode/delete/{id}', [PeriodeController::class, 'destroy']);

Route::get('periodeIka', [PeriodeController::class, 'indexIka']);
Route::get('periode/createIka', [PeriodeController::class, 'createIka']);
Route::post('periode/storeIka', [PeriodeController::class, 'storeIka']);
Route::get('periode/editIka/{id}', [PeriodeController::class, 'editIka']);
Route::post('periode/updateIka/{x}', [PeriodeController::class, 'updateIka']);
Route::get('periode/deleteIka/{id}', [PeriodeController::class, 'destroyIka']);

Route::get('tampilan/sekolah/viewsek', [sekolahController::class, 'index']);
Route::get('tampilan/sekolah/createsek', [sekolahController::class, 'create']);
Route::post('sekolahModel', [sekolahController::class, 'store']);
Route::get('tampilan/sekolah/{a}', [sekolahController::class, 'edit']);
Route::post('tampilan/sekolah/{b}', [sekolahController::class, 'update']);
Route::get('tampilan/sekolah/hps/{id}', [sekolahController::class, 'destroy']);

Route::get('tampilan/jurusan/viewjur', [jurusanController::class, 'index']);
Route::get('tampilan/jurusan/createjur', [jurusanController::class, 'create']);
Route::post('jurusanModel', [jurusanController::class, 'store']);
Route::post('jurusanModel', [jurusanController::class, 'store']);
Route::get('tampilan/jurusan/{a}', [jurusanController::class, 'edit']);
Route::post('tampilan/jurusan/{b}', [jurusanController::class, 'update']);
Route::get('tampilan/jurusan/del/{id}', [jurusanController::class, 'destroy']);
Route::get('tampilan/daerah/viewdae', [daerahController::class, 'index']);

Route::get('tampilan/daerah/createdae', [daerahController::class, 'create']);
Route::post('daerahModel', [daerahController::class, 'store']);
Route::get('tampilan/daerah/{a}', [daerahController::class, 'edit']);
Route::post('tampilan/daerah/{b}', [daerahController::class, 'update']);
Route::get('tampilan/daerah/delet/{id}', [daerahController::class, 'destroy']);

Route::get('tampilan/angkatan/viewang', [angkatanController::class, 'index']);
Route::get('tampilan/angkatan/createang', [angkatanController::class, 'create']);
Route::get('tampilan/angkatan/hapus/{x}', [angkatanController::class, 'destroy']);
Route::get('tampilan/angkatan/{x}', [angkatanController::class, 'edit']);
Route::post('tampilan/angkatan/{x}', [angkatanController::class, 'update']);

Route::get('tampilan/daerah/viewdae', [daerahController::class, 'index']);
Route::get('tampilan/daerah/createdae', [daerahController::class, 'create']);


Route::get('struktur_organisasi/index', [orgPubController::class, 'index']);
Route::get('struktur_organisasi/tambah', [orgPubController::class, 'create']);
Route::post('struktur_organisasi/store', [orgPubController::class, 'store']);
Route::get('struktur_organisasi/edit/{x}', [orgPubController::class, 'edit']);
Route::post('struktur_organisasi/update/{y}', [orgPubController::class, 'update']);
Route::get('struktur_organisasi/hapus/{z}', [orgPubController::class, 'destroy']);

Route::get('struktur_organisasi2/index', [orgPubController::class, 'index2']);
Route::get('struktur_organisasi2/tambah', [orgPubController::class, 'create2']);
Route::post('struktur_organisasi2/store', [orgPubController::class, 'store2']);
Route::get('struktur_organisasi2/edit/{x}', [orgPubController::class, 'edit2']);
Route::post('struktur_organisasi2/update/{y}', [orgPubController::class, 'update2']);
Route::get('struktur_organisasi2/hapus/{z}', [orgPubController::class, 'destroy2']);



Route::get('status_pub', [statusPubController::class, 'index']);
Route::get('status_pub/tambah', [statusPubController::class, 'create']);
Route::post('status_pub/store', [statusPubController::class, 'store']);
Route::get('status_pub/edit/{x}', [statusPubController::class, 'edit']);
Route::post('status_pub/update/{y}', [statusPubController::class, 'update']);
Route::get('status_pub/hapus/{z}', [statusPubController::class, 'destroy']);

Route::get('status_sos', [statusSosialController::class, 'index']);
Route::get('status_sos/tambah', [statusSosialController::class, 'create']);
Route::post('status_sos/store', [statusSosialController::class, 'store']);
Route::get('status_sos/edit/{x}', [statusSosialController::class, 'edit']);
Route::post('status_sos/update/{x}', [statusSosialController::class, 'update']);
Route::get('status_sos/hapus/{x}', [statusSosialController::class, 'destroy']);



Route::get('detorg_pub', [detOrgPubController::class, 'index']);
Route::get('detorg_pub/tambah', [detOrgPubController::class, 'create']);
Route::post('detorg_pub/store', [detOrgPubController::class, 'store']);
Route::get('detorg_pub/edit/{x}', [detOrgPubController::class, 'edit']);
Route::post('detorg_pub/update/{x}', [detOrgPubController::class, 'update']);
Route::get('detorg_pub/hapus/{x}', [detOrgPubController::class, 'destroy']);

Route::get('alumni_admin/det_pelatihan', [detPelatihanController::class, 'index']);
Route::get('alumni_admin/det_pelatihan/tambah', [detPelatihanController::class, 'create']);
Route::post('alumni_admin/det_pelatihan/store', [detPelatihanController::class, 'store']);
Route::get('alumni_admin/det_pelatihan/edit/{x}', [detPelatihanController::class, 'edit']);
Route::post('alumni_admin/det_pelatihan/update/{x}', [detPelatihanController::class, 'update']);
Route::get('alumni_admin/det_pelatihan/hapus/{x}', [detPelatihanController::class, 'destroy']);


Route::get('alumni/aktivitas', [alumniController::class, 'aktivitas']);
Route::post('alumni/aktivitas/tampil', [alumniController::class, 'aktivitasTampil']);

Route::get('alumni', [alumniController::class, 'index']);
Route::get('tambah/mahasiswa', [alumniController::class, 'create']);
Route::get('mahasiswa', [mahasiswaController::class, 'index']);
Route::get('tambah/mahasiswa', [mahasiswaController::class, 'create']);
Route::post('simpan/mahasiswa', [mahasiswaController::class, 'store']);
Route::get('mahasiswaEdit/{id}', [mahasiswaController::class, 'edit']);
Route::post('mahasiswaEdit/{x}', [mahasiswaController::class, 'update']);
Route::get('mahasiswaHapus/{y}', [mahasiswaController::class, 'destroy']);
Route::get('alumniEdit/{id}', [mahasiswaController::class, 'editAlumni']);

Route::post('angkatanModel', [angkatanController::class, 'store']);

Route::post('lanjut', [alumniController::class, 'store']);
Route::get('lanjut/pengalaman', [alumniController::class, 'index2']);
Route::get('tambahAlumni', [alumniController::class, 'index3']);

Route::post('tambah/pendidikan', [alumniController::class, 'store3']);
Route::get('infaq', [alumniController::class, 'infaq_view']);
Route::get('tambahInfaq', [alumniController::class, 'tambahInfaq']);
Route::post('tambahInfaq', [alumniController::class, 'simpanInfaq']);
Route::get('editInfaq/{id}', [alumniController::class, 'editInfaq']);
Route::post('editInfaq/{id}', [alumniController::class, 'updateInfaq']);
Route::get('hapusInfaq/{id}', [alumniController::class, 'hapusInfaq']);


Route::get('strukturOrgAlumni', [alumniController::class, 'strukturOrgAlumni']);
Route::get('tambahStrukAlumni', [alumniController::class, 'tambahStrukAlumni']);;
Route::post('storeStrukAlumni', [alumniController::class, 'storeStrukAlumni']);;
Route::get('hapusStrukAlumni/{x}', [alumniController::class, 'hapusStrukAlumni']);;
Route::get('editStrukAlumni/{x}', [alumniController::class, 'editStrukAlumni']);;
Route::post('updateStrukAlumni/{x}', [alumniController::class, 'updateStrukAlumni']);;


Route::get('legalitasAdmin', [alumniController::class, 'legalitasAdmin']);
Route::get('tambahLegalitasAdmin', [alumniController::class, 'tambahLegalitasAdmin']);;
Route::post('storeLegalitasAdmin', [alumniController::class, 'storeLegalitasAdmin']);;
Route::get('hapusLegalitasAdmin/{x}', [alumniController::class, 'hapusLegalitasAdmin']);;

Route::get('kegiatanAlumni', [alumniController::class, 'kegiatanAlumni']);
Route::get('tambahDokAlumni', [alumniController::class, 'tambahDokAlumni']);;
Route::post('storeDokAlumni', [alumniController::class, 'storeDokAlumni']);;
Route::get('hapusDokAlumni/{x}', [alumniController::class, 'hapusDokAlumni']);;
Route::get('editDokAlumni/{x}', [alumniController::class, 'editDokAlumni']);;
Route::post('updateDokAlumni/{x}', [alumniController::class, 'updateDokAlumni']);;

Route::get('pelatihan/index', [pelatihanController::class, 'index']);

Route::get('pelatihan/tambah', [pelatihanController::class, 'create']);
Route::post('pelatihan/store', [pelatihanController::class, 'store']);
Route::get('pelatihan/edit/{x}', [pelatihanController::class, 'edit']);
Route::post('pelatihan/update/{x}', [pelatihanController::class, 'update']);
Route::get('pelatihan/hapus/{x}', [pelatihanController::class, 'destroy']);


Route::get('pub_dok/upload', [pubDokController::class, 'upload']);;
Route::post('pub_dok/proses', [pubDokController::class, 'proses_upload']);;
Route::get('tambahTahun', [hasilController::class, 'tambahTahun']);;


Route::get('dokumentasiPub', [dokumentasiPubController::class, 'index']);
Route::get('tambah_pubdok', [dokumentasiPubController::class, 'create']);
Route::post('simpan/kegiatan', [dokumentasiPubController::class, 'store']);
Route::get('edit/kegiatan/{x}', [dokumentasiPubController::class, 'edit']);
Route::post('edit/kegiatan/{x}', [dokumentasiPubController::class, 'update']);
Route::get('hapus/kegiatan/{x}', [dokumentasiPubController::class, 'destroy']);

// Route::get('pub_dok/upload', [dokumentasiPubController::class, 'upload']);;
// Route::post('pub_dok/proses', [dokumentasiPubController::class, 'proses_upload']);;
// Route::get('tambahTahun', [ppmbDokController::class, 'tambahTahun']);;
Route::get('lulusTPA/{x}', [hasilController::class, 'lulusTPA']);;
Route::get('tambahLulusTPA/{x}', [hasilController::class, 'tambahLulusTPA']);;
Route::post('storeLulusTPA/{x}', [hasilController::class, 'storeLulusTPA']);;
Route::get('editLulusTPA/{x}', [hasilController::class, 'editLulusTPA']);;
Route::post('updateLulusTPA/{x}', [hasilController::class, 'updateLulusTPA']);;
Route::get('hapusLulusTPA/{x}', [hasilController::class, 'hapusLulusTPA']);;

Route::get('uploadFormulir', [hasilController::class, 'uploadFormulir']);;
Route::get('tambahFormulir', [hasilController::class, 'tambahFormulir']);;
Route::post('storeFormulir', [hasilController::class, 'storeFormulir']);;
Route::get('hapusFormulir/{x}', [hasilController::class, 'hapusFormulir']);;

Route::get('tambahTPA/{x}', [hasilController::class, 'tambahTPA']);;
Route::post('storeTPA/{x}', [hasilController::class, 'storeTPA']);;
Route::post('storeTahun', [hasilController::class, 'storeTahun']);;
Route::get('hasilSeleksi', [hasilController::class, 'hasil']);;
Route::post('hasil2', [hasilController::class, 'hasil2']);;
Route::get('dataTPA/{x}', [hasilController::class, 'dataTPA']);;
Route::get('editTPA/{x}', [hasilController::class, 'editTPA']);;
Route::post('updateTPA/{x}', [hasilController::class, 'updateTPA']);;
Route::get('hapusTPA/{x}', [hasilController::class, 'hapusTPA']);;

Route::get('dataPsikotes/{x}', [hasilController::class, 'dataPsikotes']);;
Route::get('tambahPsi/{x}', [hasilController::class, 'tambahPsi']);;
Route::post('storePsikotes/{x}', [hasilController::class, 'storePsikotes']);;
Route::get('hapusPsi/{x}', [hasilController::class, 'hapusPsi']);;
Route::get('editPsi/{x}', [hasilController::class, 'editPsi']);;
Route::post('updatePsi/{x}', [hasilController::class, 'updatePsi']);;

Route::get('det_pelatihan', [detPelatihanController::class, 'index']);

Route::get('dataWawancaraAkhir/{x}', [hasilController::class, 'dataWawancaraAkhir']);;
Route::get('tambahWawancaraAkhir/{x}', [hasilController::class, 'tambahWawancaraAkhir']);;
Route::post('storeWawancaraAkhir/{x}', [hasilController::class, 'storeWawancaraAkhir']);;
Route::get('hapusWawancaraAkhir/{x}', [hasilController::class, 'hapusWawancaraAkhir']);;
Route::get('editWawancaraAkhir/{x}', [hasilController::class, 'editWawancaraAkhir']);;
Route::post('updateWawancaraAkhir/{x}', [hasilController::class, 'updateWawancaraAkhir']);;

Route::get('dataFinal/{x}', [hasilController::class, 'dataFinal']);;
Route::get('tambahFinal/{x}', [hasilController::class, 'tambahFinal']);;
Route::post('storeFinal/{x}', [hasilController::class, 'storeFinal']);;
Route::get('hapusFinal/{x}', [hasilController::class, 'hapusFinal']);;
Route::get('editFinal/{x}', [hasilController::class, 'editFinal']);;
Route::post('updateFinal/{x}', [hasilController::class, 'updateFinal']);;

Route::get('dokumentasi', [ppmbDokController::class, 'dokumentasi']);;
Route::get('tambahDok', [ppmbDokController::class, 'tambahDok']);;
Route::post('storeDok', [ppmbDokController::class, 'storeDok']);;
Route::get('hapusDok/{x}', [ppmbDokController::class, 'hapusDok']);;
Route::get('editDok/{x}', [ppmbDokController::class, 'editDok']);;
Route::post('updateDok/{x}', [ppmbDokController::class, 'updateDok']);;

Route::get('dataHome/{x}', [hasilController::class, 'dataHome']);;
Route::get('tambahHome/{x}', [hasilController::class, 'tambahHome']);;
Route::post('storeHome/{x}', [hasilController::class, 'storeHome']);;
Route::get('hapusHome/{x}', [hasilController::class, 'hapusHome']);;
Route::get('editHome/{x}', [hasilController::class, 'editHome']);;
Route::post('updateHome/{x}', [hasilController::class, 'updateHome']);;


//===================================USER=================================//
Route::get('/', [userController::class, 'index']);

//==============================LOGIN=====================================//

Route::get('login', [userController::class, 'login']);
Route::post('login/masuk', [userController::class, 'doLogin']);

//===================================USER=================================//
Route::get('tampilUser', [userController::class, 'tampilUser']);
Route::get('tambahUser', [userController::class, 'tambahUser']);
Route::post('tambahUser/store', [userController::class, 'tambahUser_store']);
Route::post('tambah/user', [userController::class, 'simpanUser']);
Route::get('editUser/{x}', [userController::class, 'editUser']);
Route::post('editUser', [userController::class, 'updateUser']);
Route::get('hapusUser/{x}', [userController::class, 'hapusUser']);


Route::get('/',function () {
	if (Session::get('level')) {
		Session::forget('level');
		return redirect('/');
	}else{
		return redirect('/');
	}
});
Route::get('/', [userController::class, 'index']);
Route::get('user/mahasiswa', [userController::class, 'view_mhs']);
Route::post('user/mahasiswa', [userController::class, 'view_dataMhs']);

Route::get('pub_profile', [userController::class, 'profile']);
Route::get('ppmb_profile', [userController::class, 'ppmb_profile']);
Route::get('jadwal_ppmb_user', [userController::class, 'jadwal_keseluruhan_ppmb']);
Route::post('detailjadwal_ppmb_user', [userController::class, 'detailjadwal_keseluruhan_ppmb']);
Route::get('sosialisasi_kesekolah/{x}/{y}', [userController::class, 'sekolah_sos']);
Route::get('daerah_sos_ppmb_user/{x}', [userController::class, 'daerah_sos']);
Route::get('jadwal_tpa_user/{x}', [userController::class, 'jadwal_tpa']);
Route::get('jadwal_survey_user/{x}', [userController::class, 'jadwal_survey']);
Route::get('jadwal_wawancara_akhir_user/{x}', [userController::class, 'jadwal_wankhir']);
Route::get('syarat_user', [userController::class, 'syarat_ketentuan']);
Route::get('organisasi_ppmb', [userController::class, 'organisasi_ppmb']);
Route::post('tampil_organisasi_ppmb', [userController::class, 'tampil_organisasi_ppmb']);
Route::get('organisasi_pub', [userController::class, 'organisasi_pub']);
Route::post('tampil_organisasi_pub', [userController::class, 'tampil_organisasi_pub']);
Route::get('detail/org/{x}', [userController::class, 'detail']);
Route::get('detail/orgppmb/{x}', [userController::class, 'detail_orgppmb']);
Route::get('pelatihan', [userController::class, 'pelatihan']);
Route::get('pelatihan_data', [userController::class, 'pelatihan_data']);
Route::get('zonasi_covid19_daerah_tpa', [userController::class, 'zonasi_covid19_daerah_tpa']);

Route::get('pub_dok', [userController::class, 'kegiatanPub']);
Route::get('pub_dok/kegiatan', [dokumentasiPubController::class, 'index']);

Route::get('kegiatanPub', [userController::class, 'kegiatanPub']);
Route::get('user_hasilSeleksi', [userController::class, 'hasilSeleksi']);
Route::post('user_hasilSeleksi', [userController::class, 'tampilSeleksi']);
Route::get('user_tpa/{x}', [userController::class, 'user_tpa']);
Route::get('user_wawancara_akhir/{x}', [userController::class, 'user_wawancara_akhir']);
Route::get('user_psikotes/{x}', [userController::class, 'user_psikotes']);
Route::get('user_final/{x}', [userController::class, 'user_final']);

Route::get('user_home/{x}', [userController::class, 'user_home']);

Route::get('org_ikatan_alumni', [userController::class, 'OrgIkatanAlumni']);;
Route::get('keg_ikatan_alumni', [userController::class, 'KegIkatanAlumni']);;
Route::post('user_dok_ika', [userController::class, 'user_dok_ika']);;
Route::get('user_infaq', [userController::class, 'user_infaq']);;
Route::get('user_alumni', [userController::class, 'user_alumni']);;
Route::post('user_alumni', [userController::class, 'user_alumniView']);;
Route::post('infaq_bulan', [userController::class, 'infaq_bulan']);;

Route::get('user_lulus_tpa/{x}', [userController::class, 'user_lulus_tpa']);
Route::get('user_dok_ppmb', [userController::class, 'user_dok_ppmb']);
Route::get('download_formulir', [userController::class, 'user_down_formulir']);
Route::get('/formulir', function () {
    return redirect('https://forms.gle/DuQR9pArTG8ZYLPY7');
});
Route::get('/profile_video', function () {
    return redirect('https://youtu.be/BGh-seYCtdo');
});
Route::get('legalitas', [userController::class, 'legalitas']);

Route::get('formulir_online', [userController::class, 'formulir_online']);
// Route::get('formulir', [userController::class, 'formulir']);
Route::get('video_profil', [userController::class, 'video_profil']);

Route::post('user_hasil_dok_ppmb', [userController::class, 'user_hasil_dok_ppmb']);

Route::get('user_dok_sosialisasi/{x}', [userController::class, 'user_dok_sosialisasi']);
Route::get('user_dok_tpa/{x}', [userController::class, 'user_dok_tpa']);
Route::get('user_dok_psikotest/{x}', [userController::class, 'user_dok_psikotest']);
Route::get('user_dok_home_visit/{x}', [userController::class, 'user_dok_home_visit']);
Route::get('user_dok_wawancara_akhir/{x}', [userController::class, 'user_dok_wawancara_akhir']);
Route::get('user_dok_mou/{x}', [userController::class, 'user_dok_mou']);
//================================ADMIN ALUMNI=============================//

Route::get('admin/alumni/{x}', [alumni_adminController::class, 'index']);


Route::post('alumni_admin/index/{x}', [alumni_adminController::class, 'index']);
Route::get('materilogika', [userController::class, 'materilog']);;
Route::get('materibasis', [userController::class, 'materibasis']);;
Route::get('materistruktur', [userController::class, 'materistruktur']);;
Route::get('materihtml', [userController::class, 'materihtml']);;
Route::get('materifund', [userController::class, 'materifdm']);;
Route::get('fdmphp', [userController::class, 'materifdmphp']);;
Route::get('fdmvb', [userController::class, 'materifdmvb']);;
Route::get('fdmjava', [userController::class, 'materifdmjava']);;
Route::get('materifundljt', [userController::class, 'materifdmljt']);;
Route::get('fdmljtphp', [userController::class, 'materifdmphpljt']);;
Route::get('fdmljtvb', [userController::class, 'materifdmvbljt']);;
Route::get('fdmljtjava', [userController::class, 'materifdmjavaljt']);;
Route::get('totalAlumni', [userController::class, 'totalAlumni']);;

Route::get('kegiatanPub', [userController::class, 'kegiatanPub']);
Route::post('kegiatanPub/pilihdiv', [userController::class, 'kegiatanPub_pilihdiv']);
Route::get('kegiatanPub/filter/{x}/{y}', [userController::class, 'kegiatanPub_filter']);
Route::get('pembinaPub', [userController::class, 'pembinaPub']);;


Route::post('storePertanyaan', [userController::class, 'storePertanyaan']);;
Route::get('pertanyaan', [userController::class, 'pertanyaan']);;
Route::get('jawabPertanyaan/{x}', [userController::class, 'jawabPertanyaan']);;
Route::post('storeJawab/{x}', [userController::class, 'storeJawab']);;
Route::get('hapusPertanyaan/{x}', [userController::class, 'hapusPertanyaan']);;

Route::get('tampilan_header', [userController::class, 'tampilan_header']);;
Route::get('tampilan_header/tambah', [userController::class, 'tampilan_header_tambah']);;
Route::post('tampilan_header/store', [userController::class, 'tampilan_header_store']);;
Route::get('tampilan_header/edit/{x}', [userController::class, 'tampilan_header_edit']);;
Route::post('tampilan_header/update/{x}', [userController::class, 'tampilan_header_update']);;
Route::get('tampilan_header/hapus/{x}', [userController::class, 'tampilan_header_hapus']);;

Route::get('pembina', [userController::class, 'pembina']);;
Route::get('pembina/tambah', [userController::class, 'pembina_tambah']);;
Route::post('pembina/store', [userController::class, 'pembina_store']);;
Route::get('pembina/edit/{x}', [userController::class, 'pembina_edit']);;
Route::post('pembina/update/{x}', [userController::class, 'pembina_update']);;
Route::get('pembina/hapus/{x}', [userController::class, 'pembina_hapus']);;


Route::get('profil_pub', [userController::class, 'profil_pub']);;
Route::get('profil_pub/edit/{x}', [userController::class, 'profil_pub_edit']);;
Route::post('profil_pub/update/{x}', [userController::class, 'profil_pub_update']);;

Route::get('pel_logika', [userController::class, 'pel_logika']);;
Route::get('pel_logika/edit/{x}', [userController::class, 'pel_logika_edit']);;
Route::post('pel_logika/update/{x}', [userController::class, 'pel_logika_update']);;

Route::get('pel_basis', [userController::class, 'pel_basis']);;
Route::get('pel_basis/edit/{x}', [userController::class, 'pel_basis_edit']);;
Route::post('pel_basis/update/{x}', [userController::class, 'pel_basis_update']);;

Route::get('pel_struktur', [userController::class, 'pel_struktur']);;
Route::get('pel_struktur/edit/{x}', [userController::class, 'pel_struktur_edit']);;
Route::post('pel_struktur/update/{x}', [userController::class, 'pel_struktur_update']);;

Route::get('pel_html', [userController::class, 'pel_html']);;
Route::get('pel_html/edit/{x}', [userController::class, 'pel_html_edit']);;
Route::post('pel_html/update/{x}', [userController::class, 'pel_html_update']);;

Route::get('pel_fundamental', [userController::class, 'pel_fundamental']);;
Route::get('pel_fundamental/edit/{x}', [userController::class, 'pel_fundamental_edit']);;
Route::post('pel_fundamental/update/{x}', [userController::class, 'pel_fundamental_update']);;

Route::get('pel_lanjutan', [userController::class, 'pel_lanjutan']);;
Route::get('pel_lanjutan/edit/{x}', [userController::class, 'pel_lanjutan_edit']);;
Route::post('pel_lanjutan/update/{x}', [userController::class, 'pel_lanjutan_update']);;

//================================ADMIN ALUMNI=============================//

Route::post('akunEdit/{x}', [alumni_adminController::class, 'akunEdit']);
Route::get('admin/alumni/akun/{x}', [alumni_adminController::class, 'akun']);
Route::get('admin/alumni/{x}', [alumni_adminController::class, 'index']);
Route::get('admin/alumni/profile/{x}', [alumni_adminController::class, 'profile']);
Route::get('admin/alumni/aktivitas/{x}', [alumni_adminController::class, 'aktivitas']);
Route::get('editProfil/{x}', [alumni_adminController::class, 'editProfil']);
Route::post('simpanProfil/edit/{x}', [alumni_adminController::class, 'updateProfil']);
Route::post('tambahFoto', [alumni_adminController::class, 'store']);
Route::get('tambahPend/{x}', [alumni_adminController::class, 'tambahPnd']);
Route::post('simpanPend', [alumni_adminController::class, 'simpanPnd']);
Route::get('editPendidikan/{x}/{y}', [alumni_adminController::class, 'editPendidikan']);
Route::post('editPendidikan', [alumni_adminController::class, 'updatePendidikan']);

Route::get('tambahPeng/{x}', [alumni_adminController::class, 'tambahPeng']);
Route::post('tambah/pengalaman', [alumni_adminController::class, 'simpanPeng']);
Route::get('editPengalaman/{x}/{y}', [alumni_adminController::class, 'editPengalaman']);
Route::post('updatePengalaman', [alumni_adminController::class, 'updatePengalaman']);

Route::get('admin/aktivitas/{x}', [alumni_adminController::class, 'aktivitas']);
Route::post('tambahFoto/aktivitas', [alumni_adminController::class, 'storeAktivitas']);
Route::get('edit/aktivitas/{x}/{y}', [alumni_adminController::class, 'editAktivitas']);
Route::post('simpan/aktivitasEdit', [alumni_adminController::class, 'updateAktivitas']);
Route::get('hapusAktivitas/{x}/{y}', [alumni_adminController::class, 'hapusAktivitas']);
