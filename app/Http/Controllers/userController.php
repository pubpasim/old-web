<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\syaratKetentuanModel;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $kegiatan=DB::table('tb_pubdok')->orderby('id_pubdok','DESC')->limit('3')->get();
       $ppmb=DB::table('tb_dokumentasi')->orderby('id_dok','DESC')->limit('10')->get();
        return view('user.index',compact('kegiatan','ppmb'));
    }
    public function hasilSeleksi()
    {
        $tpa="";
        $lempar="";
        $tahun = DB::table('tb_tahunSel')->get();
        return view('user.hasilSeleksi',compact('tahun','lempar','tpa'));
    }
    public function tampilSeleksi(Request $request)
    {
        $tpa="";
        $lempar = $request->tahun;
        $tahun = DB::table('tb_tahunSel')->get();
        return view('user.hasilSeleksi',compact('tahun','lempar','tpa'));
    }
    public function user_tpa($id)
    {   
        $tpa = DB::table('tb_tpa')->where('id_tahun',$id)->get();
        return view('user.user_tpa',compact('tpa','id'));
    }
    public function user_survei($id)
    {
        $survei = DB::table('tb_survei')->where('id_tahun3',$id)->get();
        return view('user.user_survei',compact('survei','id'));
    }
    public function user_psikotes($id)
    {
        $psi = DB::table('tb_psikotest')->where('id_tahun2',$id)->get();
        return view('user.user_psikotes',compact('psi','id'));
    }
    public function user_final($id)
    {
        $final = DB::table('tb_final')->where('id_tahun4',$id)->get();

        return view('user.user_final',compact('final'));
    }
    public function user_infaq()
    {
        $infaq=DB::table('tb_infaq')
        ->join('tb_angkatan','tb_infaq.id_angkatan','=','tb_angkatan.id_angkatan')
        ->select('tb_infaq.id_infaq','tb_infaq.periode','tb_infaq.total_infaq','tb_angkatan.angkatan')
        ->get();
        return view('user.user_infaq',compact('infaq'));
    }
    public function user_alumni()
    {
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $mahasiswa = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status')->where('tb_statusPub.status','Alumni')->orderby('tb_angkatan.angkatan')->get();
        return view('user.user_alumni',compact('angkatan','mahasiswa'));
    }
    public function user_alumniView(request $request)
    {
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $mahasiswa = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status')
        ->where('tb_statusPub.status','Alumni')
        ->where('tb_angkatan.angkatan',$request->select)->get();
        return view('user.user_alumni',compact('angkatan','mahasiswa'));
    }
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doLogin(Request $request)
    {
        $usr = $request->username;
        $pass = $request->password;

        //echo $pass;die;
        $data = DB::table('tb_user')->where('username',$usr)->first();
        $id_mhs=$data->id_mahasiswa;
        if($data){
            if($pass==$data->password){
                if ($data->level=='admin') {
                    return redirect('admin');
                }elseif ($data->level=='alumni') {
                    return redirect('admin/alumni/'.$id_mhs);
                }elseif ($data->level=='admin_pub') {
                    return redirect('admin');
                }elseif ($data->level=='admin_pub') {
                    return redirect('admin');
                }elseif ($data->level=='admin_ppmb') {
                    return redirect('admin');
                }                
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah!');
        }

    }public function tampilUser(){
        $user=DB::table('tb_user')
        ->join('tb_mahasiswa', 'tb_user.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->select('tb_mahasiswa.nama','tb_user.username','tb_user.password','tb_user.level')->get();

        return view('tampilan.user.user',compact('user'));
    }
    public function tambahUser(){
        $lempar="";
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $mahasiswa=DB::table('tb_mahasiswa')->get();
        return view('tampilan.user.tambah',compact('angkatan','lempar','mahasiswa'));
    }
    public function simpanUser(Request $request){
        $user=DB::table('tb_user')->insert([
            'id_mahasiswa'=>$request->nama,'username'=>$request->usr,'password'=>$request->pass,'level'=>$request->level
        ]);
        return redirect('tampilUser');
    }
    public function tambahUser_store(Request $request){
        $lempar=$request->select;
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $mahasiswa=DB::table('tb_mahasiswa')->where('id_angkatan',$request->select)->get();
        return view('tampilan.user.tambah',compact('angkatan','mahasiswa','lempar'));
    }
    public function view_mhs(){
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $lempar="data";
        $mahasiswa = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status')->get();
        return view('user.mahasiswa',compact('angkatan','mahasiswa','lempar'));
    }
    public function view_dataMhs(Request $request){
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $lempar=$request->select;
        $mahasiswa = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status')->where('tb_angkatan.angkatan',$request->select)->get();
        return view('user.mahasiswa',compact('angkatan','mahasiswa','lempar'));
    }

    public function pelatihan(){
        $angkatan=DB::table('tb_angkatan')
        ->where('angkatan','>=','16')
        ->orderby('angkatan')->get();
        $pelatihan1=DB::table('tb_detpelatihan')
        ->join('tb_angkatan','tb_detpelatihan.id_angkatan','=','tb_angkatan.id_angkatan')
        ->join('tb_pelatihan','tb_detpelatihan.id_pelatihan','=','tb_pelatihan.id_pelatihan')
        ->select('tb_pelatihan.pelatihan')->get();
        $lempar="";
        return view('user.pelatihan',compact('angkatan','lempar','pelatihan1'));
    }
    public function pelatihan_data(Request $request){
        $angkatan=DB::table('tb_angkatan')
        ->where('angkatan','>=','16')
        ->orderby('angkatan')->get();
        $pelatihan1=DB::table('tb_detpelatihan')
        ->join('tb_pelatihan','tb_detpelatihan.id_pelatihan','=','tb_pelatihan.id_pelatihan')
        ->select('tb_pelatihan.pelatihan')->where('tb_detpelatihan.id_angkatan',$request->select)->get();
        $lempar=$request->select;
        return view('user.pelatihan',compact('angkatan','lempar','pelatihan1'));
    }

    public function profile()
    {
        return view('user.profile');
    }
     public function syarat_ketentuan()
    {
        $syarat=syaratKetentuanModel::all();
        return view('User.syarat_user',compact('syarat'));
    }


    public function ppmb_profile()
    {
        return view('user.profile_ppmb');
    }
     public function jadwal_ppmb()
    {
        $tes=DB::table('tb_jadwal')->get();
        $periode=DB::table('tb_periode')->get();
        $detjadwalppmb=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_detjadwal.id_daerah')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_detjadwal.id_sekolah')
        ->get();
        return view('User.jadwal_ppmb_user',compact('detjadwalppmb','tes','periode'));
    }
    public function organisasi_ppmb(Request $request)
    {
        //ketua
        $ketua=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan','KETUA PPMB');
        $ketua2=$ketua->count();
        $ketua=$ketua->first();

        //keamanan
        $keamanan=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan','KEAMANAN PPMB');
        $keamanan2=$keamanan->count();
        $keamanan=$keamanan->first();
        //sekretaris
        $sekretaris=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan','SEKRETARIS PPMB');
        $sekretaris2=$sekretaris->count();
        $sekretaris=$sekretaris->first();
        //kadiv_humas
        $kadiv_humas=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan','KOOR DIV HUMAS PPMB');
        $kadiv_humas2=$kadiv_humas->count();
        $kadiv_humas=$kadiv_humas->first();        
        //kadiv_logistik
        $kadiv_logistik=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan',' KOOR DIVISI LOGISTIK PPMB');
        $kadiv_logistik2=$kadiv_logistik->count();
        $kadiv_logistik=$kadiv_logistik->first();
        //kadiv_acara
        $kadiv_acara=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan','KOOR DIV ACARA PPMB');
        $kadiv_acara2=$kadiv_acara->count();
        $kadiv_acara=$kadiv_acara->first();
        //kadiv_kesejahtraan
        $kadiv_kesejahtraan=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan','KOOR DIV KESEJAHTERAAN PPMB');
        $kadiv_kesejahtraan2=$kadiv_kesejahtraan->count();
        $kadiv_kesejahtraan=$kadiv_kesejahtraan->first();
        //kadiv_dokumentasi
        $kadiv_dokumentasi=DB::table('tb_detorg_ppmb')
        ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
        ->where('tb_orgppmb.jabatan','KOOR DIV DOKUMENTASI PPMB');
        $kadiv_dokumentasi2=$kadiv_dokumentasi->count();
        $kadiv_dokumentasi=$kadiv_dokumentasi->first();
        
      
        
        return view('User.struktur_ppmb_user',compact('ketua','sekretaris','keamanan','kadiv_logistik','kadiv_humas','kadiv_acara','kadiv_dokumentasi','kadiv_kesejahtraan','ketua2','sekretaris2','keamanan2','kadiv_logistik2','kadiv_humas2','kadiv_acara2','kadiv_dokumentasi2','kadiv_kesejahtraan2'));    
    }
    public function organisasi_pub(Request $request)
    {
        //ketua
        $ketua=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KETUA PUB');
        $ketua2=$ketua->count();
        $ketua=$ketua->first();

        //keamanan
        $keamanan=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KEAMANAN PUB');
        $keamanan2=$keamanan->count();
        $keamanan=$keamanan->first();
        //sekretaris
        $sekretaris=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','SEKRETARIS PUB');
        $sekretaris2=$sekretaris->count();
        $sekretaris=$sekretaris->first();
        //bendahara ex
        $bendahara_ex=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','BENDAHARA EKSTERNAL');
        $bendahara_ex2=$bendahara_ex->count();
        $bendahara_ex=$bendahara_ex->first();        
        //bendahara in
        $bendahara_in=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','BENDAHARA INTERNAL');
        $bendahara_in2=$bendahara_in->count();
        $bendahara_in=$bendahara_in->first();
        //div Pen
        $div_pnd=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KOOR DIV PENDIDIKAN');
        $div_pnd2=$div_pnd->count();
        $div_pnd=$div_pnd->first();
        //div kero
        $div_ker=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KOOR DIV KEROHANIAN');
        $div_ker2=$div_ker->count();
        $div_ker=$div_ker->first();
        //div keas
        $div_kea=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KOOR DIV KEASRAMAAN');
        $div_kea2=$div_kea->count();
        $div_kea=$div_kea->first();
        //div kebe
        $div_keb=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KOOR DIV KEBERSIHAN');
        $div_keb2=$div_keb->count();
        $div_keb=$div_keb->first();
        //div magang
        $div_mag=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KOOR DIV MAGANG');
        $div_mag2=$div_mag->count();
        $div_mag=$div_mag->first();
        //div kesej
        $div_sej=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KOOR DIV KESEJAHTERAAN');
        $div_sej2=$div_sej->count();
        $div_sej=$div_sej->first();
        //div keseh
        $div_kes=DB::table('tb_detorg_pub')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
        ->where('tb_orgpub.jabatan_pub','KOOR DIV KESEHATAN');
        $div_kes2=$div_kes->count();
        $div_kes=$div_kes->first();
        
        return view('user.organisasi_pub',compact('ketua','sekretaris','keamanan','bendahara_in','bendahara_ex','div_pnd','div_kea','div_ker','div_keb','div_kes','div_sej','div_mag','ketua2','sekretaris2','keamanan2','bendahara_in2','bendahara_ex2','div_pnd2','div_ker2','div_kes2','div_mag2','div_kea2','div_keb2','div_sej2'));    
    }
    public function detail($id)
    {
        $mahasiswa = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_statusPub.status','tb_mahasiswa.tempat_lahir','tb_mahasiswa.tanggal_lahir','tb_mahasiswa.no_telp','tb_mahasiswa.nama','tb_mahasiswa.file','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_angkatan.nama_angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_mahasiswa.jenis_kelamin')
        ->where('tb_mahasiswa.id_mahasiswa',$id)->first();
        $pendidikan=DB::table('tb_detpendidikan')->where('id_mahasiswa',$id)->get();
        $pengalaman=DB::table('tb_detpengalaman')->where('id_mahasiswa',$id)->get();
        return view('user.detail',compact('mahasiswa','pendidikan','pengalaman'));
    }
    public function kegiatanPub()
    {
        $keg=DB::table('tb_pubdok')->get();
        return view('user.kegiatanPub',compact('keg'));
    }
    public function OrgIkatanAlumni()
    {
        $struk = DB::table('tb_ikatan_alumni')
        ->join('tb_orgpub','tb_orgpub.id_orgpub','tb_ikatan_alumni.id_jabatan')
        ->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa','tb_ikatan_alumni.id_mahasiswa')
        ->join('tb_angkatan','tb_angkatan.id_angkatan','tb_mahasiswa.id_angkatan')
        ->get();
        return view('User.orgIkatanAlumni',compact('struk'));
    }
    public function KegIkatanAlumni()
    {
        $dok =DB::table('tb_dok_alumni')
        ->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa','tb_dok_alumni.id_mahasiswa')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan','tb_angkatan.id_angkatan')
        ->get();
        return view('User.kegIkatanAlumni',compact('dok'));
    }
    public function totalAlumni()
    {
        $data1=DB::table('tb_mahasiswa')
        ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        ->leftJoin('tb_statusPub','tb_mahasiswa.id_statusPub','=','tb_statusPub.id_statusPub')
        ->select('tb_mahasiswa.jenis_kelamin','tb_angkatan.angkatan',\DB::raw('count(*) as total'))
        ->groupBy('tb_angkatan.angkatan')
        ->groupBy('tb_mahasiswa.jenis_kelamin');

        $data2=DB::table('tb_mahasiswa')
        ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        ->leftJoin('tb_statusPub','tb_mahasiswa.id_statusPub','=','tb_statusPub.id_statusPub')
        ->select('tb_mahasiswa.jenis_kelamin','tb_angkatan.angkatan',\DB::raw('count(*) as total'))
        ->groupBy('tb_angkatan.angkatan')
        ->groupBy('tb_mahasiswa.jenis_kelamin');

        $totalL=DB::table('tb_mahasiswa')
        ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        ->leftJoin('tb_statusPub','tb_mahasiswa.id_statusPub','=','tb_statusPub.id_statusPub')
        ->select('tb_mahasiswa.jenis_kelamin',\DB::raw('count(*) as total'))
        ->groupBy('tb_mahasiswa.jenis_kelamin')->where('tb_mahasiswa.jenis_kelamin','Laki-laki')
        ->where('tb_statusPub.status','Alumni')->get();

        $totalP=DB::table('tb_mahasiswa')
        ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        ->leftJoin('tb_statusPub','tb_mahasiswa.id_statusPub','=','tb_statusPub.id_statusPub')
        ->select('tb_mahasiswa.jenis_kelamin',\DB::raw('count(*) as total'))
        ->groupBy('tb_mahasiswa.jenis_kelamin')->where('tb_mahasiswa.jenis_kelamin','Perempuan')
        ->where('tb_statusPub.status','Alumni')->get();

        $total=DB::table('tb_mahasiswa')
        ->leftJoin('tb_statusPub','tb_mahasiswa.id_statusPub','=','tb_statusPub.id_statusPub')
        ->select(\DB::raw('count(*) as total'))
        ->where('tb_statusPub.status','Alumni')->get();

        $lk=$data1->where('tb_mahasiswa.jenis_kelamin','Laki-laki')
        ->where('tb_statusPub.status','Alumni')->get();
        $pr=$data2->where('tb_mahasiswa.jenis_kelamin','Perempuan')
        ->where('tb_statusPub.status','Alumni')->get();
        
        return view('User.totalAlumni',compact('lk','pr','totalL','totalP','total'));
    }
}
