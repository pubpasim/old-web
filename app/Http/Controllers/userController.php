<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\syaratKetentuanModel;
class userController extends Controller
{
    public function user_down_formulir()
    {
        $formulir = DB::table('tb_formulir')->first()->dokumen;
        // return view('user.user_down_formulir',compact('formulir'));

        return redirect('/file/' . $formulir);
    }
    public function legalitas()
    {
        $dok = DB::table('tb_legalitas')->get();
        return view('user.legalitas',compact('dok'));
    }
    public function index()
    {

         $kegiatan=DB::table('tb_pubdok')->orderby('id_pubdok','DESC')->limit('3')->get();
         $ppmb=DB::table('tb_dokumentasi')->orderby('id_dok','DESC')->limit('10')->get();
         $chat=DB::table('tb_pertanyaan')->get();
         $tampilan=DB::table('tb_tampilan_header')->get();
         $pembina=DB::table('tb_pembina')->first();
        return view('user.index',compact('kegiatan','ppmb','chat','tampilan','pembina'));
    }
    public function hasilSeleksi()
    {
        $tpa="";
        $lempar="";
        $tahun = DB::table('tb_tahunsel')->get();
        $periode = "";
        return view('user.hasilSeleksi',compact('tahun','lempar','tpa','periode'));
    }
    public function tampilSeleksi(Request $request)
    {
        if($request->tahun==0){
            return redirect('user_hasilSeleksi')->with('alert','Pilih Tahun Seleksi Terlebih Dulu');
        }
        $tpa="";
        $lempar = $request->tahun;
        $tahun = DB::table('tb_tahunsel')->get();
        $x = DB::table('tb_tahunsel')->where('id',$request->tahun)->first();
        $periode = $x->tahun;
        return view('user.hasilSeleksi',compact('tahun','lempar','tpa','periode'));
    }

public function user_infaq()
{
    $lempar="";
    $th=getdate();
    $thn=$th['year'];
    $data1=DB::table('tb_infaq')
    ->select('tahun_infaq',\DB::raw('SUM(total_infaq) as total'))
    ->groupBy('tahun_infaq')
    ->get();
    
    return view('user.user_infaq',compact('data1','thn','lempar'));
}

public function infaq_bulan(Request $request)
{
    $thn=$request->select;
    $data1=DB::table('tb_infaq')
    ->select('bulan_infaq','total_infaq as total','id_bulan')
    ->where('tahun_infaq',$request->select)->orderby('id_bulan')->get();
    return view('user.infaq_bulan',compact('data1','thn'));
}

public function user_lulus_tpa($id)
{
    $lulus = DB::table('tb_tpa')->where('id_tpa',$id)->first();
    $tpa = DB::table('tb_lulus_tpa')
    ->select('tb_lulus_tpa.*','tb_sekolah.sekolah','tb_daerah.kab_kot')
    ->join('tb_daerah','tb_daerah.id_daerah','tb_lulus_tpa.daerah')
    ->join('tb_sekolah','tb_sekolah.id_sekolah','tb_lulus_tpa.sekolah')
    ->orderBy('nama','asc')->where('fk_tpa',$id)->get();
    $back = $lulus->id_tahun;
    $daerah = $lulus->daerah;
    $periode = DB::table('tb_tahunsel')->where('id',$back)->first();    
    return view('user.user_lulus_tpa',compact('id','tpa','back','periode','daerah'));
}

public function user_wawancara_akhir($id)
{
    $survei = DB::table('tb_survei')
    ->select('tb_survei.*','tb_lulus_tpa.*','tb_daerah.kab_kot')
    ->join('tb_lulus_tpa','tb_survei.nama_peserta','tb_lulus_tpa.id_lulus')
    ->join('tb_daerah','tb_daerah.id_daerah','tb_lulus_tpa.daerah')
    ->orderBy('tb_lulus_tpa.nama','ASC')
    ->orderBy('tb_lulus_tpa.nama','ASC')
    ->where('id_tahun3',$id)->get();
    $periode = DB::table('tb_tahunsel')->where('id',$id)->first();
    return view('user.user_survei',compact('survei','id','periode'));
}

public function user_tpa($id)
{   
    $tpa = DB::table('tb_tpa')
    ->select('tb_tpa.jml_lulus','tb_tpa.jml_gagal','tb_tpa.id_tpa','tb_sekolah.sekolah','tb_daerah.kab_kot')
    	->join('tb_daerah','tb_daerah.id_daerah','tb_tpa.daerah')
    	->join('tb_sekolah','tb_sekolah.id_sekolah','tb_tpa.sekolah')
        ->orderBy('tb_tpa.id_tpa','DESC')
        ->where('id_tahun',$id)->get();
        
    // $tpa = DB::table('tb_tpa')
    // ->orderBy('tb_tpa.daerah','ASC')
    // ->where('id_tahun',$id)->get();
    $periode = DB::table('tb_tahunsel')->where('id',$id)->first();
    return view('user.user_tpa',compact('tpa','id','periode'));
}
public function user_home($id)
{
    $home = DB::table('tb_home')
    ->select('tb_home.*','tb_lulus_tpa.*','tb_daerah.kab_kot')
    ->join('tb_lulus_tpa','tb_home.nama_peserta','tb_lulus_tpa.id_lulus')
    ->join('tb_daerah','tb_daerah.id_daerah','tb_lulus_tpa.daerah')
    ->orderBy('tb_lulus_tpa.nama','ASC')
    ->where('id_tahun5',$id)->get();  
    $periode = DB::table('tb_tahunsel')->where('id',$id)->first();
    return view('user.user_home',compact('home','id','periode'));
}
public function user_psikotes($id)
{
    $psi = DB::table('tb_psikotest')
    ->select('tb_psikotest.*','tb_lulus_tpa.*','tb_daerah.kab_kot')
    ->join('tb_lulus_tpa','tb_psikotest.nama_peserta','tb_lulus_tpa.id_lulus')
    ->join('tb_daerah','tb_daerah.id_daerah','tb_lulus_tpa.daerah')
    
    ->where('id_tahun2',$id)
    ->orderBy('tb_lulus_tpa.nama','ASC')
    ->get();
    $periode = DB::table('tb_tahunsel')->where('id',$id)->first();
    return view('user.user_psikotes',compact('psi','id','periode'));
}
public function user_final($id)
{
    $final = DB::table('tb_final')
    ->select('tb_final.*','tb_lulus_tpa.nama','tb_daerah.kab_kot')
    ->join('tb_lulus_tpa','tb_final.nama_peserta','tb_lulus_tpa.id_lulus')
    ->join('tb_daerah','tb_daerah.id_daerah','tb_lulus_tpa.daerah')
    ->orderBy('tb_lulus_tpa.nama','ASC')
    ->where('id_tahun4',$id)->get();
    $periode = DB::table('tb_tahunsel')->where('id',$id)->first();

    return view('user.user_final',compact('final','periode'));
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
    ->join('tb_statuspub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statuspub.id_statusPub')
    ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
    ->select('tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statuspub.status')->where('tb_statuspub.status','Alumni')->orderby('tb_angkatan.angkatan')->get();
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
    ->join('tb_statuspub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statuspub.id_statusPub')
    ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
    ->select('tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statuspub.status')
    ->where('tb_statuspub.status','Alumni')
    ->where('tb_angkatan.angkatan',$request->select)
    ->orderby('tb_mahasiswa.nama')
    ->get();
    if ($request->select=="") {
        return redirect('user_alumni');
    }else{     
        return view('user.user_alumni',compact('angkatan','mahasiswa'));
    }
}
    public function login()
    {
        return view('user.login');
    }
    public function doLogin(Request $request)
    {
        $usr = $request->username;
        $pass = $request->password;
        $data = DB::table('tb_user')->where('username',$usr)->first();
        if($data){
          
            Session::put('level',$data->level);
            Session::put('username',$data->username);
            Session::put('password',$data->password);
            $id_mhs=$data->id_mahasiswa;
            if($pass==$data->password){
                if ($data->level=='admin') {
                    Session::put('level',$data->level);                    
                    $count = DB::table('tb_pertanyaan')->count();;
                    Session::put('jumChat',$count);                    
                    return redirect('admin');
                }elseif ($data->level=='alumni') {
                    return redirect('admin/alumni/'.$id_mhs);
                }elseif ($data->level=='admin_pub') {
                    return redirect('admin');
                }elseif ($data->level=='ikatan_alumni') {
                    
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

    }
    public function tampilUser(){
        $user=DB::table('tb_user')
        ->join('tb_mahasiswa', 'tb_user.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->select('tb_user.id_user','tb_mahasiswa.nama','tb_user.username','tb_user.password','tb_user.level')->get();

        return view('tampilan.User.user',compact('user'));
    }
    public function editUser($id){
        $user=DB::table('tb_user')
        ->join('tb_mahasiswa', 'tb_user.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->select('tb_user.id_user','tb_mahasiswa.nama','tb_user.username','tb_user.password','tb_user.level')
        ->where('tb_user.id_user',$id)->first();

        return view('tampilan.User.editUser',compact('user'));
    }
    public function updateUser(Request $request){
        $user=DB::table('tb_user')->where('id_user',$request->id)->update([
            'username'=>$request->usr,'password'=>$request->pass,'level'=>$request->level
        ]);
        return redirect('tampilUser');
    }
    public function hapusUser($id){
        $user=DB::table('tb_user')->where('id_user',$id)->delete();
        return redirect('tampilUser');
    }
    public function tambahUser(){
        $lempar="";
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $mahasiswa=DB::table('tb_mahasiswa')->get();
        return view('tampilan.User.tambah',compact('angkatan','lempar','mahasiswa'));
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
        $mahasiswa=DB::table('tb_mahasiswa')->where('id_angkatan',$request->select)->orderby('nama')->get();
        return view('tampilan.User.tambah',compact('angkatan','mahasiswa','lempar'));
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
        ->join('tb_statuspub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statuspub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statuspub.status')
        ->where('tb_statuspub.status','PUB Aktif')
        ->orderby('tb_angkatan.angkatan')->get();
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
        ->join('tb_statuspub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statuspub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statuspub.status')
        ->where('tb_angkatan.angkatan',$request->select)
        ->where('tb_statuspub.status','PUB Aktif')
        ->orderby('tb_mahasiswa.nama')->get();
        if ($request->select=="") {
            return redirect('user/mahasiswa');
        }else{     
           return view('user.mahasiswa',compact('angkatan','mahasiswa','lempar'));
       }

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

    $profil =DB::table('tb_profil_pub')->get();
    return view('user.profile',compact('profil'));
}
public function syarat_ketentuan()
{
    $syarat=syaratKetentuanModel::all();
    return view('user.syarat_user',compact('syarat'));
}


public function ppmb_profile()
{
    return view('user.profile_ppmb');
}

public function formulir_online()
{
    return redirect("https://docs.google.com/forms/d/e/1FAIpQLSc6EMO76QdACUMGyiD3Z_MtrjUb7n5gI4JXCmN3aaIgd3soMw/viewform");
}

public function video_profil()
{
    return redirect("https://www.youtube.com/watch?v=J2siIHMmwAs");
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
    return view('user.jadwal_ppmb_user',compact('detjadwalppmb','tes','periode'));
}
public function organisasi_ppmb()
{
    $pembina=DB::table('tb_pembina')->first();
    $periode=DB::table('tb_periode')->orderby('periode')->get();
    $lempar="";
        //ketua
    $ketua=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','KETUA PPMB')
    ->get();
    $ketua2=$ketua->count();
    $ketua=$ketua->first();

        //keamanan
    $keamanan=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','KADIV KEAMANAN PPMB')
    ->get();
    $keamanan2=$keamanan->count();
    $keamanan=$keamanan->first();
        //sekretaris
    $sekretaris=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','SEKRETARIS PPMB')
    ->get();
    $sekretaris2=$sekretaris->count();
    $sekretaris=$sekretaris->first();
        //bendahara ex
    $bendahara_ex=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','BENDAHARA I PPMB')
    ->get();
    $bendahara_ex2=$bendahara_ex->count();
    $bendahara_ex=$bendahara_ex->first();        
        //bendahara in
    $bendahara_in=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','BENDAHARA II PPMB')
    ->get();
    $bendahara_in2=$bendahara_in->count();
    $bendahara_in=$bendahara_in->first();
        //kadiv_humas
    $kadiv_humas=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','KADIV HUMAS PPMB')
    ->get();
    $kadiv_humas2=$kadiv_humas->count();
    $kadiv_humas=$kadiv_humas->first();        
        //kadiv_logistik
    $kadiv_logistik=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','KADIV LOGISTIK PPMB')
    ->get();
    $kadiv_logistik2=$kadiv_logistik->count();
    $kadiv_logistik=$kadiv_logistik->first();
        //kadiv_acara
    $kadiv_acara=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','KADIV ACARA PPMB')
    ->get();
    $kadiv_acara2=$kadiv_acara->count();
    $kadiv_acara=$kadiv_acara->first();
        //kadiv_kesejahtraan
    $kadiv_kesejahtraan=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','KADIV KONSUMSI PPMB')
    ->get();
    $kadiv_kesejahtraan2=$kadiv_kesejahtraan->count();
    $kadiv_kesejahtraan=$kadiv_kesejahtraan->first();
        //kadiv_dokumentasi
    $kadiv_dokumentasi=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgppmb.jabatan','KADIV DOKUMENTASI PPMB')
    ->get();      
    $kadiv_dokumentasi2=$kadiv_dokumentasi->count();
    $kadiv_dokumentasi=$kadiv_dokumentasi->first();

    return view('user.struktur_ppmb_user',compact('ketua','sekretaris','bendahara_ex','bendahara_in','keamanan','kadiv_logistik','kadiv_humas','kadiv_acara','kadiv_dokumentasi','kadiv_kesejahtraan','ketua2','sekretaris2','bendahara_ex2','bendahara_in2','keamanan2','kadiv_logistik2','kadiv_humas2','kadiv_acara2','kadiv_dokumentasi2','kadiv_kesejahtraan2','lempar','periode','pembina'));   

}

public function tampil_organisasi_ppmb(request $request)
{
    if($request->select_periode==0){
        $lempar="";
        return redirect('organisasi_ppmb')->with('alert','Pilih Periode Terlebih Dulu');
    }
    
    $pembina=DB::table('tb_pembina')->first();
    $periode=DB::table('tb_periode')->orderby('periode')->get();
    $x=DB::table('tb_periode')->where('id_periode',$request->select_periode)->first();
    $lempar = $x->periode;
        //ketua
    $ketua=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','KETUA PPMB ');
    $ketua2=$ketua->count();
    $ketua=$ketua->first();

        //keamanan
    $keamanan=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','KADIV KEAMANAN PPMB');
    $keamanan2=$keamanan->count();
    $keamanan=$keamanan->first();
        //sekretaris
    $sekretaris=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','SEKRETARIS PPMB');
    $sekretaris2=$sekretaris->count();
    $sekretaris=$sekretaris->first();
        //bendahara ex
    $bendahara_ex=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','BENDAHARA I PPMB');
    $bendahara_ex2=$bendahara_ex->count();
    $bendahara_ex=$bendahara_ex->first();        
        //bendahara in
    $bendahara_in=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','BENDAHARA II PPMB');
    $bendahara_in2=$bendahara_in->count();
    $bendahara_in=$bendahara_in->first();
        //kadiv_humas
    $kadiv_humas=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','KADIV HUMAS PPMB');
    $kadiv_humas2=$kadiv_humas->count();
    $kadiv_humas=$kadiv_humas->first();        
        //kadiv_logistik
    $kadiv_logistik=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','KADIV LOGISTIK PPMB');
    $kadiv_logistik2=$kadiv_logistik->count();
    $kadiv_logistik=$kadiv_logistik->first();
        //kadiv_acara
    $kadiv_acara=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','KADIV ACARA PPMB');
    $kadiv_acara2=$kadiv_acara->count();
    $kadiv_acara=$kadiv_acara->first();
        //kadiv_kesejahtraan
    $kadiv_kesejahtraan=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','KADIV KONSUMSI PPMB');
    $kadiv_kesejahtraan2=$kadiv_kesejahtraan->count();
    $kadiv_kesejahtraan=$kadiv_kesejahtraan->first();
        //kadiv_dokumentasi
    $kadiv_dokumentasi=DB::table('tb_detorg_ppmb')
    ->join('tb_mahasiswa','tb_detorg_ppmb.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgppmb','tb_detorg_ppmb.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_periode','tb_detorg_ppmb.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgppmb.jabatan','tb_mahasiswa.nama')
    ->where('tb_detorg_ppmb.id_periode',$request->select_periode)
    ->where('tb_orgppmb.jabatan','KADIV DOKUMENTASI PPMB');
    $kadiv_dokumentasi2=$kadiv_dokumentasi->count();
    $kadiv_dokumentasi=$kadiv_dokumentasi->first();

    return view('user.struktur_ppmb_user',compact('ketua','sekretaris','bendahara_ex','bendahara_in','keamanan','kadiv_logistik','kadiv_humas','kadiv_acara','kadiv_dokumentasi','kadiv_kesejahtraan','ketua2','sekretaris2','bendahara_ex2','bendahara_in2','keamanan2','kadiv_logistik2','kadiv_humas2','kadiv_acara2','kadiv_dokumentasi2','kadiv_kesejahtraan2','lempar','periode','pembina'));   
}
public function organisasi_pub()
{
    $pembina=DB::table('tb_pembina')->first();
    $periode=DB::table('tb_periode')->orderby('periode')->get();
    $lempar="";

        //ketua
    $ketua=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KETUA PUB');
    $ketua2=$ketua->count();
    $ketua=$ketua->first();

        //keamanan
    $keamanan=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KEAMANAN PUB');
    $keamanan2=$keamanan->count();
    $keamanan=$keamanan->first();
        //sekretaris
    $sekretaris=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','SEKRETARIS PUB');
    $sekretaris2=$sekretaris->count();
    $sekretaris=$sekretaris->first();
        //bendahara ex
    $bendahara_ex=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','BENDAHARA EKSTERNAL');
    $bendahara_ex2=$bendahara_ex->count();
    $bendahara_ex=$bendahara_ex->first();        
        //bendahara in
    $bendahara_in=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','BENDAHARA INTERNAL');
    $bendahara_in2=$bendahara_in->count();
    $bendahara_in=$bendahara_in->first();
        //div Pen
    $div_pnd=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KOOR DIV PENDIDIKAN');
    $div_pnd2=$div_pnd->count();
    $div_pnd=$div_pnd->first();
        //div kero
    $div_ker=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KEROHANIAN');
    $div_ker2=$div_ker->count();
    $div_ker=$div_ker->first();
        //div keas
    $div_kea=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KEASRAMAAN');
    $div_kea2=$div_kea->count();
    $div_kea=$div_kea->first();
        //div kebe
    $div_keb=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KEBERSIHAN');
    $div_keb2=$div_keb->count();
    $div_keb=$div_keb->first();
        //div magang
    $div_mag=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KOOR DIV MAGANG');
    $div_mag2=$div_mag->count();
    $div_mag=$div_mag->first();
        //div kesej
    $div_sej=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KESEJAHTERAAN');
    $div_sej2=$div_sej->count();
    $div_sej=$div_sej->first();
        //div keseh
    $div_kes=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KESEHATAN');
    $div_kes2=$div_kes->count();
    $div_kes=$div_kes->first();

    return view('user.organisasi_pub',compact('ketua','sekretaris','keamanan','bendahara_in','bendahara_ex','div_pnd','div_kea','div_ker','div_keb','div_kes','div_sej','div_mag','ketua2','sekretaris2','keamanan2','bendahara_in2','bendahara_ex2','div_pnd2','div_ker2','div_kes2','div_mag2','div_kea2','div_keb2','div_sej2','periode','lempar','pembina'));    
}

public function tampil_organisasi_pub(Request $request)
{
    if($request->select_periode==0){
        $lempar="";
        return redirect('organisasi_pub')->with('alert','Pilih Periode Terlebih Dulu');
    }
    
    $pembina=DB::table('tb_pembina')->first();
    $periode=DB::table('tb_periode')->orderby('periode')->get();
    $x=DB::table('tb_periode')->where('id_periode',$request->select_periode)->first();
    $lempar = $x->periode;

    $tahun=DB::table('tb_periode')
   ->select('tb_periode.periode')
   ->where('tb_periode.id_periode',$request->select_periode)
   ->first();

        //ketua
    $ketua=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KETUA PUB');
    $ketua2=$ketua->count();
    $ketua=$ketua->first();

        //keamanan
    $keamanan=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KEAMANAN PUB');
    $keamanan2=$keamanan->count();
    $keamanan=$keamanan->first();
        //sekretaris
    $sekretaris=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','SEKRETARIS PUB');
    $sekretaris2=$sekretaris->count();
    $sekretaris=$sekretaris->first();
        //bendahara ex
    $bendahara_ex=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','BENDAHARA EKSTERNAL');
    $bendahara_ex2=$bendahara_ex->count();
    $bendahara_ex=$bendahara_ex->first();        
        //bendahara in
    $bendahara_in=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','BENDAHARA INTERNAL');
    $bendahara_in2=$bendahara_in->count();
    $bendahara_in=$bendahara_in->first();
        //div Pen
    $div_pnd=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KOOR DIV PENDIDIKAN');
    $div_pnd2=$div_pnd->count();
    $div_pnd=$div_pnd->first();
        //div kero
    $div_ker=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KEROHANIAN');
    $div_ker2=$div_ker->count();
    $div_ker=$div_ker->first();
        //div keas
    $div_kea=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KEASRAMAAN');
    $div_kea2=$div_kea->count();
    $div_kea=$div_kea->first();
        //div kebe
    $div_keb=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KEBERSIHAN');
    $div_keb2=$div_keb->count();
    $div_keb=$div_keb->first();
        //div magang
    $div_mag=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KOOR DIV MAGANG');
    $div_mag2=$div_mag->count();
    $div_mag=$div_mag->first();
        //div kesej
    $div_sej=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KESEJAHTERAAN');
    $div_sej2=$div_sej->count();
    $div_sej=$div_sej->first();
        //div keseh
    $div_kes=DB::table('tb_detorg_pub')
    ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgpub','tb_detorg_pub.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_periode','tb_detorg_pub.id_periode', '=', 'tb_periode.id_periode')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgpub.jabatan_pub','tb_mahasiswa.nama')
    ->where('tb_detorg_pub.id_periode',$request->select_periode)
    ->where('tb_orgpub.jabatan_pub','KOOR DIV KESEHATAN');
    $div_kes2=$div_kes->count();
    $div_kes=$div_kes->first();

    return view('user.organisasi_pub',compact('ketua','sekretaris','keamanan','bendahara_in','bendahara_ex','div_pnd','div_kea','div_ker','div_keb','div_kes','div_sej','div_mag','ketua2','sekretaris2','keamanan2','bendahara_in2','bendahara_ex2','div_pnd2','div_ker2','div_kes2','div_mag2','div_kea2','div_keb2','div_sej2','periode','lempar','tahun','pembina'));    
}
public function detail($id)
{
    $mahasiswa = DB::table('tb_mahasiswa')
    ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
    ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
    ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
    ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_statuspub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statuspub.id_statusPub')
    ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
    ->select('tb_statuspub.status','tb_mahasiswa.tempat_lahir','tb_mahasiswa.tanggal_lahir','tb_mahasiswa.no_telp','tb_mahasiswa.nama','tb_mahasiswa.file','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_angkatan.nama_angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_mahasiswa.jenis_kelamin')
    ->where('tb_mahasiswa.id_mahasiswa',$id)->first();
    $pendidikan=DB::table('tb_detpendidikan')->where('id_mahasiswa',$id)->get();
    $pengalaman=DB::table('tb_detpengalaman')->where('id_mahasiswa',$id)->get();
    return view('user.detail',compact('mahasiswa','pendidikan','pengalaman'));
}

public function kegiatanPub()
{
    $keg=DB::table('tb_pubdok')
    ->join('tb_angkatan','tb_pubdok.id_angkatan','=','tb_angkatan.id_angkatan')
    ->select('tb_pubdok.id_pubdok','tb_pubdok.file','tb_pubdok.keterangan','tb_pubdok.tema')
    ->get();
    $angkatan=DB::table('tb_angkatan')->orderby('angkatan')
    ->where('angkatan','>=','16')
    ->get();
    $lempar='';

    return view('user.kegiatanPub',compact('angkatan','keg','lempar'));
}
public function kegiatanPub_filter(Request $request,$id,$div)
{
    $lempar=$request->select;
    $keg=DB::table('tb_pubdok')
    ->join('tb_angkatan','tb_pubdok.id_angkatan','=','tb_angkatan.id_angkatan')
    ->select('tb_pubdok.id_angkatan','tb_pubdok.id_pubdok','tb_pubdok.file','tb_pubdok.keterangan','tb_pubdok.tema')
    ->where('tb_pubdok.id_angkatan',$id)->where('tb_pubdok.tema',$div)->get();
    $pendidikan=$keg->where('tb_pubdok.tema','Divisi Pendidikan')->first();
    $magang=$keg->where('tb_pubdok.tema','Divisi Magang')->first();
    $kesejahteraan=$keg->where('tb_pubdok.tema','Divisi Kesejahteraan')->first();
    $keasramaan=$keg->where('tb_pubdok.tema','Divisi Keasramaan')->first();
    $kerohanian=$keg->where('tb_pubdok.tema','Divisi Kerohanian')->first();
    $kesehatan=$keg->where('tb_pubdok.tema','Divisi Kesehatan')->first();
    $kebersihan=$keg->where('tb_pubdok.tema','Divisi Kebersihan')->first();        
    $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();

    return view('user.tampil_pilihdiv',compact('keg','lempar','pendidikan','magang','kesejahteraan','keasramaan','kerohanian','kesehatan','kebersihan','div'));

}
public function detail_orgppmb($id)
{
    $mahasiswa = DB::table('tb_mahasiswa')
    ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
    ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
    ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
    ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
    ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
    ->join('tb_statuspub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statuspub.id_statusPub')
    ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
    ->select('tb_mahasiswa.tempat_lahir','tb_mahasiswa.tanggal_lahir','tb_mahasiswa.no_telp','tb_mahasiswa.nama','tb_mahasiswa.file','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_angkatan.nama_angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_mahasiswa.jenis_kelamin')
    ->where('tb_mahasiswa.id_mahasiswa',$id)->first();
    return view('user.detail_orgppmb',compact('mahasiswa'));
}

// public function KegIkatanAlumni()
// {
//     $dok =DB::table('tb_dok_alumni')
//     ->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa','tb_dok_alumni.id_mahasiswa')
//     ->join('tb_angkatan','tb_mahasiswa.id_angkatan','tb_angkatan.id_angkatan')
//     ->get();
//     return view('user.kegIkatanAlumni',compact('dok'));
// }

public function materilog()
{
    $logika =DB::table('tb_pel_logika')->get();
    return view('user.materilogika',compact('logika'));
}
public function materibasis()
{
    $basis =DB::table('tb_pel_basis')->get();
    return view('user.materibasis',compact('basis'));    
}
public function materistruktur()
{
    $struktur =DB::table('tb_pel_struktur')->get();
    return view('user.materistruktur',compact('struktur'));
}
public function materihtml()
{
    $html =DB::table('tb_pel_html')->get();
    return view('user.materihtml',compact('html'));
}
public function materifdm()
{
    $materi =DB::table('tb_fundamental')->where('keterangan','Fundamental')->get();
    return view('user.materifund',compact('materi'));    
}
public function materifdmphp()
{
    $php =DB::table('tb_fundamental')->where('keterangan','PHP')->get();
    return view('user.fdmphp',compact('php'));
}
public function materifdmvb()
{
    $vb =DB::table('tb_fundamental')->where('keterangan','VB')->get();
    return view('user.fdmvb',compact('vb'));
}
public function materifdmjava()
{
    $java =DB::table('tb_fundamental')->where('keterangan','Java')->get();
    return view('user.fdmjava',compact('java'));
}
public function materifdmljt()
{
    $materi =DB::table('tb_lanjutan')->where('keterangan','Lanjutan')->get();
    return view('user.materifundljt',compact('materi'));    
}
public function materifdmphpljt()
{
    $php =DB::table('tb_lanjutan')->where('keterangan','PHP')->get();
    return view('user.fdmphpljt',compact('php'));

}
public function materifdmvbljt()
{
    $vb =DB::table('tb_lanjutan')->where('keterangan','VB')->get();
    return view('user.fdmvbljt',compact('vb'));
}
public function materifdmjavaljt()
{
    $java =DB::table('tb_lanjutan')->where('keterangan','Java')->get();
    return view('user.fdmjavaljt',compact('java'));
}
public function pembinaPub()
{
    $pembina =DB::table('tb_pembina')->get();
    return view('user.pembina',compact('pembina'));
}

public function kegiatanPub_pilihdiv(Request $request){
    $kes=DB::table('tb_pubdok')
    ->where('tb_pubdok.id_angkatan',$request->select)
    ->where('tb_pubdok.tema','Divisi Kesehatan');
    $kes2=$kes->count();
    $kes=$kes->first();

    $keb=DB::table('tb_pubdok')
    ->where('tb_pubdok.id_angkatan',$request->select)
    ->where('tb_pubdok.tema','Divisi Kebersihan');
    $keb2=$keb->count();
    $keb=$keb->first();

    $magang=DB::table('tb_pubdok')
    ->where('tb_pubdok.id_angkatan',$request->select)
    ->where('tb_pubdok.tema','Divisi Magang');
    $magang2=$magang->count();
    $magang=$magang->first();

    $pendidikan=DB::table('tb_pubdok')
    ->where('tb_pubdok.id_angkatan',$request->select)
    ->where('tb_pubdok.tema','Divisi Pendidikan');
    $pendidikan2=$pendidikan->count();
    $pendidikan=$pendidikan->first();

    $kerohanian=DB::table('tb_pubdok')
    ->where('tb_pubdok.id_angkatan',$request->select)
    ->where('tb_pubdok.tema','Divisi Kerohanian');
    $kerohanian2=$kerohanian->count();
    $kerohanian=$kerohanian->first();

    $kesejahteraan=DB::table('tb_pubdok')
    ->where('tb_pubdok.id_angkatan',$request->select)
    ->where('tb_pubdok.tema','Divisi Kesejahteraan');
    $kesejahteraan2=$kesejahteraan->count();
    $kesejahteraan=$kesejahteraan->first();

    $keasramaan=DB::table('tb_pubdok')
    ->where('tb_pubdok.id_angkatan',$request->select)
    ->where('tb_pubdok.tema','Divisi Keasramaan');
    $keasramaan2=$keasramaan->count();
    $keasramaan=$keasramaan->first();        
    return view('user.pilihdivisi',compact('kes','kes2','keb','keb2','magang','magang2','pendidikan','pendidikan2','kerohanian','kerohanian2','kesejahteraan','kesejahteraan2','keasramaan','keasramaan2'));
}



public function orgIkatanAlumni(Request $request)
{
        //ketua
    $pembina=DB::table('tb_pembina')->first();
    $ketua=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Ketua');
    $ketua2=$ketua->count();
    $ketua=$ketua->first();

        //keamanan
    $wakil_ketua=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Wakil Ketua');
    $wakil_ketua2=$wakil_ketua->count();
    $wakil_ketua=$wakil_ketua->first();
        //sekretaris
    $sekretaris=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Sekretaris');
    $sekretaris2=$sekretaris->count();
    $sekretaris=$sekretaris->first();

    $wakil_sekretaris=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Wakil Sekretaris');
    $wakil_sekretaris2=$wakil_sekretaris->count();
    $wakil_sekretaris=$wakil_sekretaris->first();

        //bendahara ex
    $bendahara=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Bendahara');
    $bendahara2=$bendahara->count();
    $bendahara=$bendahara->first();        
        //bendahara in
    $wakil_bendahara=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Wakil Bendahara');
    $wakil_bendahara2=$wakil_bendahara->count();
    $wakil_bendahara=$wakil_bendahara->first();
        //div Pen
    $dep_kerjasama=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Departemen Kerja Sama');
    $dep_kerjasama2=$dep_kerjasama->count();
    $dep_kerjasama=$dep_kerjasama->get();

    $bid_humas=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Departemen Kerja Sama');
    $bid_humas2=$bid_humas->count();
    $bid_humas=$bid_humas->get();

        //div kero
    $dep_publikasi=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Departemen Publikasi Informasi');
    $dep_publikasi2=$dep_publikasi->count();
    $dep_publikasi=$dep_publikasi->get();
        //div keas
    $dep_pengembangan=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Departemen Pengembangan Usaha');
    $dep_pengembangan2=$dep_pengembangan->count();
    $dep_pengembangan=$dep_pengembangan->get();
        //div kebe
    $dep_penggalangan=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Departemen Penggalangan Dana');
    $dep_penggalangan2=$dep_penggalangan->count();
    $dep_penggalangan=$dep_penggalangan->get();
        //div magang
    $bidang_penggembangan=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Bidang Pengembangan SDM');
    $bidang_penggembangan2=$bidang_penggembangan->count();
    $bidang_penggembangan=$bidang_penggembangan->get();
        //div kesej
    $koor_angkatan=DB::table('tb_ikatan_alumni')
    ->join('tb_mahasiswa','tb_ikatan_alumni.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
    ->join('tb_orgalumni','tb_ikatan_alumni.id_jabatan', '=', 'tb_orgalumni.id_org')
    ->select('tb_mahasiswa.id_mahasiswa','tb_orgalumni.jabatan','tb_mahasiswa.nama')
    ->where('tb_orgalumni.jabatan','Bidang Pengembangan SDM');
    $koor_angkatan2=$koor_angkatan->count();
    $koor_angkatan=$koor_angkatan->first();




    return view('user.orgIkatanAlumni',compact('ketua','wakil_ketua','sekretaris','wakil_sekretaris','bendahara','wakil_bendahara','dep_kerjasama','dep_publikasi','dep_pengembangan','bid_humas','dep_penggalangan','bidang_penggembangan','koor_angkatan','ketua2','wakil_ketua2','sekretaris2','wakil_sekretaris2','bendahara2','wakil_bendahara2','dep_kerjasama2','dep_publikasi2','dep_pengembangan2','dep_penggalangan2','bidang_penggembangan2','koor_angkatan2','bid_humas2','pembina'));    
}

public function totalAlumni()
{
    $data1=DB::table('tb_mahasiswa')
    ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
    ->leftJoin('tb_statuspub','tb_mahasiswa.id_statusPub','=','tb_statuspub.id_statusPub')
    ->select('tb_mahasiswa.jenis_kelamin','tb_angkatan.angkatan',\DB::raw('count(*) as total'))
    ->groupBy('tb_angkatan.angkatan')
    ->groupBy('tb_mahasiswa.jenis_kelamin');

    $data2=DB::table('tb_mahasiswa')
    ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
    ->leftJoin('tb_statuspub','tb_mahasiswa.id_statusPub','=','tb_statuspub.id_statusPub')
    ->select('tb_mahasiswa.jenis_kelamin','tb_angkatan.angkatan',\DB::raw('count(*) as total'))
    ->groupBy('tb_angkatan.angkatan')
    ->groupBy('tb_mahasiswa.jenis_kelamin');

    $totalL=DB::table('tb_mahasiswa')
    ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
    ->leftJoin('tb_statuspub','tb_mahasiswa.id_statusPub','=','tb_statuspub.id_statusPub')
    ->select('tb_mahasiswa.jenis_kelamin',\DB::raw('count(*) as total'))
    ->groupBy('tb_mahasiswa.jenis_kelamin')->where('tb_mahasiswa.jenis_kelamin','Laki-laki')
    ->where('tb_statuspub.status','Alumni')->get();

    $totalP=DB::table('tb_mahasiswa')
    ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
    ->leftJoin('tb_statuspub','tb_mahasiswa.id_statusPub','=','tb_statuspub.id_statusPub')
    ->select('tb_mahasiswa.jenis_kelamin',\DB::raw('count(*) as total'))
    ->groupBy('tb_mahasiswa.jenis_kelamin')->where('tb_mahasiswa.jenis_kelamin','Perempuan')
    ->where('tb_statuspub.status','Alumni')->get();

    $total=DB::table('tb_mahasiswa')
    ->leftJoin('tb_statuspub','tb_mahasiswa.id_statusPub','=','tb_statuspub.id_statusPub')
    ->select(\DB::raw('count(*) as total'))
    ->where('tb_statuspub.status','Alumni')->get();

    $lk=$data1->where('tb_mahasiswa.jenis_kelamin','Laki-laki')
    ->where('tb_statuspub.status','Alumni')->get();
    $pr=$data2->where('tb_mahasiswa.jenis_kelamin','Perempuan')
    ->where('tb_statuspub.status','Alumni')->get();

    return view('user.totalAlumni',compact('lk','pr','totalL','totalP','total'));
}

public function storePertanyaan(Request $request)
{
    date_default_timezone_set('Asia/Jakarta');
    DB::table('tb_pertanyaan')->insert([
        'nama'=> $request->nama,
        'sekolah'=> $request->sekolah,
        'daerah'=> $request->daerah,
        'pertanyaan'=> $request->pertanyaan,
        'no_hp'=> $request->no_hp,
        'tanggal_waktu'=> date('Y-m-d H:i:s'),
        'jawaban'=>"",
    ]);
    return back();
}
public function pertanyaan(Request $request)
{       
    $chat = DB::table('tb_pertanyaan')->get();
    return view ('tampilan.chat.chat',compact('chat'));
}
public function jawabPertanyaan(Request $request,$id)
{       
    return view ('tampilan.chat.jawabChat',compact('id'));
}
public function storeJawab(Request $request,$id)
{
    if($request->jawaban==""){
        DB::table('tb_pertanyaan')->where('id',$id)->update([            
            'jawaban'=>"",
        ]);    
    }
    else{
        DB::table('tb_pertanyaan')->where('id',$id)->update([            
            'jawaban'=>$request->jawaban,
        ]);    
    }

    return redirect('pertanyaan');
}
public function hapusPertanyaan($id){
    DB::table('tb_pertanyaan')->where('id',$id)->delete();
    return redirect('pertanyaan');
}
public function jadwal_keseluruhan_ppmb()
    {
        $tahun=DB::table('tb_periode')->orderby('periode','DESC')->first();
        $periode=DB::table('tb_periode')->orderby('periode') ->get();
        $lempar="";

        $jad_sos=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Sosialisasi Ke Daerah-Daerah')
        ->where('tb_periode.periode',$tahun->periode);
        $jad_sos2=$jad_sos->count();
        $jad_sos=$jad_sos->first();

        $jad_tpa=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Tes Ke Daerah-daerah')
        ->where('tb_periode.periode',$tahun->periode);
        $jad_tpa2=$jad_tpa->count();
        $jad_tpa=$jad_tpa->first();


        $jad_psikotes=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Pelaksanaan Psikotes')
        ->where('tb_periode.periode',$tahun->periode);

        $jad_psikotes2=$jad_psikotes->count();
        $jad_psikotes=$jad_psikotes->first();


        $jad_pengumu_psiko=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Pengumuman Psikotes')
        ->where('tb_periode.periode',$tahun->periode);

        $jad_pengumu_psiko2=$jad_pengumu_psiko->count();
        $jad_pengumu_psiko=$jad_pengumu_psiko->first();

        $jad_survey=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Pelaksanaan Home Visit')
        ->where('tb_periode.periode',$tahun->periode);
        $jad_survey2=$jad_survey->count();
        $jad_survey=$jad_survey->first();

        $jad_wawancara_akhir=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Pelaksanaan Wawancara Akhir')
        ->where('tb_periode.periode',$tahun->periode);
        $jad_wawancara_akhir2=$jad_wawancara_akhir->count();
        $jad_wawancara_akhir=$jad_wawancara_akhir->first();

        $jad_pengu_wawancara_akhir=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Pengumuman Wawancara Akhir')
        ->where('tb_periode.periode',$tahun->periode);

        $jad_pengu_wawancara_akhir2=$jad_pengu_wawancara_akhir->count();
        $jad_pengu_wawancara_akhir=$jad_pengu_wawancara_akhir->first();

        $jad_pelak_mou=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
        ->where('tb_jadwal.kegiatan','Pelaksanaan Penandatanganan Draf MOU')
        ->where('tb_periode.periode',$tahun->periode);

        $jad_pelak_mou2=$jad_pelak_mou->count();
        $jad_pelak_mou=$jad_pelak_mou->first();

        return view('user.jadwal_keseluruhan_ppmb',compact('jad_sos','jad_sos2','jad_tpa','jad_tpa2','jad_psikotes','jad_psikotes2','jad_survey','jad_survey2','jad_wawancara_akhir','jad_wawancara_akhir2','periode','lempar','jad_pengumu_psiko','jad_pengu_wawancara_akhir','jad_pelak_mou','jad_pengumu_psiko2','jad_pengu_wawancara_akhir2','jad_pelak_mou2','tahun'));
    }
    
    public function KegIkatanAlumni()
    {
        
        $lempar="";
        $tahun = DB::table('tb_periode_ika')->get();
        $periode = "";
        $dok =DB::table('tb_dok_alumni')->where('periode',$periode)->get();
        return view('user.kegIkatanAlumni',compact('tahun','lempar','periode','dok'));
        
    
    }
    public function user_dok_ika(Request $request)
    {
        if($request->tahun==0){
            return redirect('keg_ikatan_alumni')->with('alert','Pilih Periode Terlebih Dulu');
        }
        $lempar = $request->tahun;
        $tahun = DB::table('tb_periode_ika')->get();
        
        $x = DB::table('tb_periode_ika')->where('id',$request->tahun)->first();
        $periode = $x->periode;
        $dok =DB::table('tb_dok_alumni')->where('periode',$request->tahun)->get();
        return view('user.kegIkatanAlumni',compact('tahun','lempar','periode','dok'));
    }
 
    public function user_dok_ppmb()
    {  
        $tpa="";
        $lempar="";
        $tahun = DB::table('tb_tahunsel')->get();
        $periode = "";
        return view('user.user_dok_ppmb',compact('tahun','lempar','tpa','periode'));

    }
    public function user_hasil_dok_ppmb(Request $request)
    {
        if($request->tahun==0){
            return redirect('user_dok_ppmb')->with('alert','Pilih Periode Terlebih Dulu');
        }
        $tpa="";
        $lempar = $request->tahun;
        $tahun = DB::table('tb_tahunsel')->get();
        $x = DB::table('tb_tahunsel')->where('id',$request->tahun)->first();
        $periode = $x->tahun;
        return view('user.user_dok_ppmb',compact('tahun','lempar','tpa','periode'));
    }

    public function user_dok_sosialisasi($id)
    {          
        $dok = DB::table('tb_dokumentasi')
        ->where([
            ['kategori','Sosialisasi'],
            ['id_tahun',$id],
        ])->get();

        $x = DB::table('tb_tahunsel')->where('id',$id)->first();
        $periode = $x->tahun;
        return view('user.user_dok_sosialisasi',compact('dok','periode'));
    }
    public function user_dok_tpa($id)
    {          
        $dok = DB::table('tb_dokumentasi')
        ->where([
            ['kategori','TPA'],
            ['id_tahun',$id],
        ])->get();

        $x = DB::table('tb_tahunsel')->where('id',$id)->first();
        $periode = $x->tahun;
        return view('user.user_dok_tpa',compact('dok','periode'));
    }
    public function user_dok_psikotest($id)
    {          

        $dok = DB::table('tb_dokumentasi')
        ->where([
            ['kategori','Psikotest'],
            ['id_tahun',$id],
        ])->get();

        $x = DB::table('tb_tahunsel')->where('id',$id)->first();
        $periode = $x->tahun;
        return view('user.user_dok_psikotest',compact('dok','periode'));
    }
    public function user_dok_home_visit($id)
    {          
        
        $dok = DB::table('tb_dokumentasi')
        ->where([
            ['kategori','Home Visit'],
            ['id_tahun',$id],
        ])->get();

        $x = DB::table('tb_tahunsel')->where('id',$id)->first();
        $periode = $x->tahun;
        return view('user.user_dok_survei',compact('dok','periode'));
    }
    public function user_dok_wawancara_akhir($id)
    {          
        
        $dok = DB::table('tb_dokumentasi')
        ->where([
            ['kategori','Wawancara Akhir'],
            ['id_tahun',$id],
        ])->get();

        $x = DB::table('tb_tahunsel')->where('id',$id)->first();
        $periode = $x->tahun;
        return view('user.user_dok_wawancara_akhir',compact('dok','periode'));
    }
    public function user_dok_mou($id)
    {          
        
        $dok = DB::table('tb_dokumentasi')
        ->where([
            ['kategori','MOU'],
            ['id_tahun',$id],
        ])->get();

        $x = DB::table('tb_tahunsel')->where('id',$id)->first();
        $periode = $x->tahun;
        return view('user.user_dok_mou',compact('dok','periode'));
    }
public function detailjadwal_keseluruhan_ppmb(request $request)
{
    $periode=DB::table('tb_periode')->orderby('periode')->get();
    $lempar=$request->select_periode;
    $tahun=DB::table('tb_periode')
    ->select('tb_periode.periode')
    ->where('tb_periode.id_periode',$request->select_periode)
    ->first();

    $jad_sos=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Sosialisasi Ke Daerah-Daerah')
    ->get();
    $jad_sos2=$jad_sos->count();
    $jad_sos=$jad_sos->first();

    $jad_tpa=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Tes ke Daerah-daerah')
    ->get();
    $jad_tpa2=$jad_tpa->count();
    $jad_tpa=$jad_tpa->first();

    $jad_psikotes=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Pelaksanaan Psikotes')
    ->get();
    $jad_psikotes2=$jad_psikotes->count();
    $jad_psikotes=$jad_psikotes->first();

    $jad_pengumu_psiko=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Pengumuman Psikotes')
    ->get();

    $jad_pengumu_psiko2=$jad_pengumu_psiko->count();
    $jad_pengumu_psiko=$jad_pengumu_psiko->first();

    $jad_survey=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Pelaksanaan Home Visit')
    ->get();
    $jad_survey2=$jad_survey->count();
    $jad_survey=$jad_survey->first();

    $jad_wawancara_akhir=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Pelaksanaan Wawancara Akhir')
    ->get();

    $jad_wawancara_akhir2=$jad_wawancara_akhir->count();
    $jad_wawancara_akhir=$jad_wawancara_akhir->first();

    $jad_pengu_wawancara_akhir=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Pengumuman Wawancara Akhir')
    ->get();

    $jad_pengu_wawancara_akhir2=$jad_pengu_wawancara_akhir->count();
    $jad_pengu_wawancara_akhir=$jad_pengu_wawancara_akhir->first();

    $jad_pelak_mou=DB::table('tb_detjadwal')
    ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
    ->select('tb_jadwal.kegiatan','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir')
    ->where('tb_detjadwal.id_periode',$request->select_periode)
    ->where('tb_jadwal.kegiatan','Pelaksanaan Penandatanganan Draf MOU')
    ->get();

    $jad_pelak_mou2=$jad_pelak_mou->count();
    $jad_pelak_mou=$jad_pelak_mou->first();

    return view('user.jadwal_keseluruhan_ppmb',compact('jad_sos','jad_sos2','jad_tpa','jad_tpa2','jad_psikotes','jad_psikotes2','jad_survey','jad_survey2','jad_wawancara_akhir','jad_wawancara_akhir2','periode','lempar','jad_pengumu_psiko','jad_pengu_wawancara_akhir','jad_pelak_mou','jad_pengu_wawancara_akhir2','jad_pelak_mou2','jad_pengumu_psiko2','tahun'));

    }
public function jadwal_survey($periode)
{
 $tahun=DB::table('tb_periode')
 ->select('tb_periode.periode')
 ->where('tb_periode.id_periode',$periode)
 ->first();

 $jad_survey=DB::table('tb_jadwal_survey')
 ->select('tb_jadwal_survey.*','tb_periode.*','tb_daerah.*','tb_jadwal_survey.id_jad_survey as id')
 ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_survey.id_periode')
 ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_survey.id_daerah')
 ->where('tb_jadwal_survey.id_periode',$periode)
 ->get();
 return view('user.jadwal_survey_user',compact('jad_survey','tahun'));  
} 
public function lihat_foto3($id)
{
    $dok_survey = DB::table('tb_dok_jad_survey')->where('fk_jad_survey',$id)->get();
    
    $kata=DB::table('tb_dok_jad_survey')
    ->join('tb_jadwal_survey','tb_jadwal_survey.id_jad_survey','=','tb_dok_jad_survey.fk_jad_survey')
    ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_survey.id_periode')
    ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_survey.id_daerah')
    ->where('fk_jad_survey',$id)->first();
    return view('user.lihat_dok3',compact('dok_survey','kata'));     
}
public function jadwal_wankhir($periode)
{

   $tahun=DB::table('tb_periode')
   ->select('tb_periode.periode')
   ->where('tb_periode.id_periode',$periode)
   ->first();

   $jad_wawancara_akhir=DB::table('tb_peserta_wawancara_akhir')
   ->select('tb_peserta_wawancara_akhir.*','tb_periode.*','tb_daerah.*','tb_sekolah.*','tb_peserta_wawancara_akhir.id_pesera_wawancara_akhir as id')
   ->join('tb_periode','tb_periode.id_periode','=','tb_peserta_wawancara_akhir.id_periode')
   ->join('tb_daerah','tb_daerah.id_daerah','=','tb_peserta_wawancara_akhir.id_daerah')
   ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_peserta_wawancara_akhir.id_sekolah')
   ->orderBy('tb_peserta_wawancara_akhir.peserta','ASC')
   ->orderBy('tb_peserta_wawancara_akhir.hari','ASC')
   ->where('tb_peserta_wawancara_akhir.id_periode',$periode)
   ->get();
   return view('user.peserta_wawancara_akhir',compact('jad_wawancara_akhir','tahun'));        

}

public function lihat_foto4($id)
{
    $x = DB::table('tb_peserta_wawancara_akhir')->where('id_pesera_wawancara_akhir',$id)->first();
    
    $dok_wawancara = DB::table('tb_dok_wawancara_akhir')
    ->where([
        ['tb_dok_wawancara_akhir.hari',$x->hari],
        ['tb_dok_wawancara_akhir.fk_periode',$x->id_periode],
    ])->get();
    
    $kata=DB::table('tb_dok_wawancara_akhir')
   ->join('tb_peserta_wawancara_akhir','tb_peserta_wawancara_akhir.hari','=','tb_dok_wawancara_akhir.hari')
   ->join('tb_periode','tb_periode.id_periode','=','tb_peserta_wawancara_akhir.id_periode')
   ->join('tb_daerah','tb_daerah.id_daerah','=','tb_peserta_wawancara_akhir.id_daerah')
   ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_peserta_wawancara_akhir.id_sekolah')
    ->where('tb_dok_wawancara_akhir.hari',$x->hari)->first();
    
    return view('user.lihat_dok4',compact('dok_wawancara','kata'));     
}
public function daerah_sos($periode)
{

    $tahun=DB::table('tb_periode')
    ->select('tb_periode.periode')
    ->where('tb_periode.id_periode',$periode)
    ->first();

    $daerah_sos=DB::table('tb_daerah_sos')
    ->join('tb_daerah','tb_daerah_sos.id_daerah','=','tb_daerah.id_daerah')
    ->join('tb_periode','tb_daerah_sos.id_periode','=','tb_periode.id_periode')
    ->select('tb_daerah.kab_kot','tb_daerah.id_daerah')->groupby('tb_daerah.kab_kot')
    ->where('tb_daerah_sos.id_periode',$periode)
    ->get();

    return view('user.daerah_sos_user',compact('daerah_sos','tahun','periode'));        
}
public function sekolah_sos($id,$periode)
{
   $tahun=DB::table('tb_periode')
   ->select('tb_periode.periode')
   ->where('tb_periode.id_periode',$periode)
   ->first();
   $sekolah_sos=DB::table('tb_daerah_sos')
   ->select('tb_daerah_sos.id_daerah_sos as id','tb_sekolah.sekolah')
   ->join('tb_daerah','tb_daerah_sos.id_daerah','=','tb_daerah.id_daerah')
   ->join('tb_periode','tb_daerah_sos.id_periode','=','tb_periode.id_periode')
   ->join('tb_sekolah','tb_daerah_sos.id_sekolah','=','tb_sekolah.id_sekolah')
   ->groupby('tb_sekolah.sekolah')
   ->where([
       ['tb_daerah.id_daerah',$id],
        ['tb_periode.id_periode',$periode]
    ])->get();
   return view('user.sosialisasi_kesekolah',compact('sekolah_sos','tahun','periode'));        
}

public function lihat_foto($id)
{
   $dok_sekolah = DB::table('tb_dok_per_sekolah')->where('fk_daerah_sos',$id)->get();
   
   $kata = DB::table('tb_dok_per_sekolah')
   ->select('tb_periode.periode','tb_sekolah.sekolah')
   ->join('tb_daerah_sos','tb_daerah_sos.id_daerah_sos','=','tb_dok_per_sekolah.fk_daerah_sos')
   ->join('tb_periode','tb_daerah_sos.id_periode','=','tb_periode.id_periode')
   ->join('tb_sekolah','tb_daerah_sos.id_sekolah','=','tb_sekolah.id_sekolah')
   ->where('fk_daerah_sos',$id)->first();
    return view('user.lihat_dok',compact('dok_sekolah','kata'));     
}
public function jadwal_tpa($periode)
{
    $tahun=DB::table('tb_periode')
    ->select('tb_periode.periode')
    ->where('tb_periode.id_periode',$periode)
    ->first();

    $jad_tpa=DB::table('tb_jadwal_tpa')
    ->select('tb_jadwal_tpa.id_jad_tpa as id','tb_sekolah.sekolah','tb_daerah.kab_kot','tb_jadwal_tpa.waktu','tb_jadwal_tpa.tanggal')
    ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_tpa.id_periode')
    ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_tpa.id_daerah')
    ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_jadwal_tpa.id_sekolah')
    ->orderby('tb_jadwal_tpa.tanggal','ASC')
    ->where('tb_jadwal_tpa.id_periode',$periode)
    ->get();
    return view('user.jadwal_tpa_user',compact('jad_tpa','tahun'));        
}

public function lihat_foto2($id)
{
    $dok_tpa = DB::table('tb_jad_tpa')->where('fk_jad_tpa',$id)->get();
    
    $kata=DB::table('tb_jad_tpa')
    ->select('tb_periode.periode','tb_sekolah.sekolah')
    ->join('tb_jadwal_tpa','tb_jadwal_tpa.id_jad_tpa','=','tb_jad_tpa.fk_jad_tpa')
    ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_tpa.id_periode')
    ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_tpa.id_daerah')
    ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_jadwal_tpa.id_sekolah')
    ->where('fk_jad_tpa',$id)->first();
    return view('user.lihat_dok2',compact('dok_tpa','kata'));     
}

public function tampilan_header()
{
    $tampilan=DB::table('tb_tampilan_header')->get();
    return view('tampilan.tampilan_header.tampilan',compact('tampilan'));        
}
public function tampilan_header_tambah()
{    
    return view('tampilan.tampilan_header.tampilanStore');
}
public function tampilan_header_store(request $request)
{
    $file = $request->file('poto');
    $nama_file = time()."_".$file->getClientOriginalName();
     
    // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'imgs/gambar';
    $file->move($tujuan_upload,$nama_file);

    DB::table('tb_tampilan_header')
    ->insert([
        'caption1' => $request->caption1,
        'caption2' => $request->caption2,
        'poto' => $nama_file,                       
    ]);

    return redirect('tampilan_header');
}
public function tampilan_header_edit($id)
    {
        $tampilan=DB::table('tb_tampilan_header')->where('id',$id)->first();
        return view('tampilan.tampilan_header.tampilanEdit',compact('tampilan'));        
    }
    public function tampilan_header_update(Request $request, $id)
    {        
        $file = $request->file('poto');

        if($file==""){                        
            DB::table('tb_tampilan_header')->where('id',$id)
            ->update([
                'caption1' => $request->caption1,
                'caption2' => $request->caption2,                
            ]);
            return redirect('tampilan_header');
        }
        else{ 

            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = ('imgs/gambar');
            $file->move($tujuan_upload,$nama_file);

            DB::table('tb_tampilan_header')->where('id',$id)
            ->update([
                'caption1' => $request->caption1,
                'caption2' => $request->caption2,
                'poto' => $nama_file,                       
            ]);
            return redirect('tampilan_header');
        }          
                       
    }
    public function tampilan_header_hapus($id)
    {
        DB::table('tb_tampilan_header')->where('id',$id)->delete();
        return redirect('tampilan_header')->with('alert','data berhasil dihapus');
    }


public function pembina()
{
    $pembina=DB::table('tb_pembina')->get();
    return view('tampilan.pembina.pembina',compact('pembina'));        
}
public function pembina_tambah()
{    
    return view('tampilan.pembina.pembinaStore');
}
public function pembina_store(request $request)
{
    $file = $request->file('poto');
    $nama_file = time()."_".$file->getClientOriginalName();
     
    // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'imgs';
    $file->move($tujuan_upload,$nama_file);

    DB::table('tb_pembina')
    ->insert([
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'poto' => $nama_file,                       
        'pesan' => $request->pesan,
    ]);

    return redirect('pembina');
}
public function pembina_edit($id)
{
    $data=DB::table('tb_pembina')->where('id',$id)->first();
    return view('tampilan.pembina.pembinaEdit',compact('data'));        
}
public function pembina_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_pembina')->where('id',$id)
        ->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'pesan' => $request->pesan,            
        ]);
        return redirect('pembina');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_pembina')->where('id',$id)
        ->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'poto' => $nama_file,                       
            'pesan' => $request->pesan,                       
        ]);
        return redirect('pembina');
    }          
                   
}
public function pembina_hapus($id)
{
    DB::table('tb_pembina')->where('id',$id)->delete();
    return redirect('pembina')->with('alert','data berhasil dihapus');
}


public function profil_pub()
{
    $profil=DB::table('tb_profil_pub')->get();
    return view('tampilan.profil_pub.profil_pub',compact('profil'));        
}

public function profil_pub_edit($id)
{
    $data=DB::table('tb_profil_pub')->where('id',$id)->first();
    return view('tampilan.profil_pub.profil_pub_edit',compact('data'));        
}
public function profil_pub_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_profil_pub')->where('id',$id)
        ->update([            
            'pesan' => $request->pesan,            
        ]);
        return redirect('profil_pub');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_profil_pub')->where('id',$id)
        ->update([            
            'poto' => $nama_file,                       
            'pesan' => $request->pesan,                       
        ]);
        return redirect('profil_pub');
    }          
                   
}

public function pel_logika()
{
    $logika=DB::table('tb_pel_logika')->get();
    return view('tampilan.pel_logika.pel_logika',compact('logika'));        
}

public function pel_logika_edit($id)
{
    $data=DB::table('tb_pel_logika')->where('id',$id)->first();
    return view('tampilan.pel_logika.pel_logika_edit',compact('data'));        
}
public function pel_logika_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_pel_logika')->where('id',$id)
        ->update([            
            'text' => $request->text,            
        ]);
        return redirect('pel_logika');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_pel_logika')->where('id',$id)
        ->update([            
            'poto' => $nama_file,                       
            'text' => $request->text,                       
        ]);
        return redirect('pel_logika');
    }          
                   
}
public function pel_basis()
{
    $basis=DB::table('tb_pel_basis')->get();
    return view('tampilan.pel_basis.pel_basis',compact('basis'));        
}

public function pel_basis_edit($id)
{
    $data=DB::table('tb_pel_basis')->where('id',$id)->first();
    return view('tampilan.pel_basis.pel_basis_edit',compact('data'));        
}
public function pel_basis_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_pel_basis')->where('id',$id)
        ->update([            
            'text' => $request->text,            
        ]);
        return redirect('pel_basis');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_pel_basis')->where('id',$id)
        ->update([            
            'poto' => $nama_file,                       
            'text' => $request->text,                       
        ]);
        return redirect('pel_basis');
    }          
                   
}

public function pel_struktur()
{
    $struktur=DB::table('tb_pel_struktur')->get();
    return view('tampilan.pel_struktur.pel_struktur',compact('struktur'));        
}

public function pel_struktur_edit($id)
{
    $data=DB::table('tb_pel_struktur')->where('id',$id)->first();
    return view('tampilan.pel_struktur.pel_struktur_edit',compact('data'));        
}
public function pel_struktur_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_pel_struktur')->where('id',$id)
        ->update([            
            'text' => $request->text,            
        ]);
        return redirect('pel_struktur');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_pel_struktur')->where('id',$id)
        ->update([            
            'poto' => $nama_file,                       
            'text' => $request->text,                       
        ]);
        return redirect('pel_struktur');
    }          
                   
}

public function pel_html()
{
    $html=DB::table('tb_pel_html')->get();
    return view('tampilan.pel_html.pel_html',compact('html'));        
}

public function pel_html_edit($id)
{
    $data=DB::table('tb_pel_html')->where('id',$id)->first();
    return view('tampilan.pel_html.pel_html_edit',compact('data'));        
}
public function pel_html_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_pel_html')->where('id',$id)
        ->update([            
            'text' => $request->text,            
        ]);
        return redirect('pel_html');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_pel_html')->where('id',$id)
        ->update([            
            'poto' => $nama_file,                       
            'text' => $request->text,                       
        ]);
        return redirect('pel_html');
    }          
                   
}

public function pel_fundamental()
{    
    $fundamental=DB::table('tb_fundamental')->get();
    return view('tampilan.pel_fundamental.pel_fundamental',compact('fundamental'));
}
public function pel_fundamental_edit($id)
{
    $data=DB::table('tb_fundamental')->where('id',$id)->first();
    return view('tampilan.pel_fundamental.pel_fundamental_edit',compact('data'));        
}
public function pel_fundamental_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_fundamental')->where('id',$id)
        ->update([            
            'text' => $request->text,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('pel_fundamental');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_fundamental')->where('id',$id)
        ->update([            
            'poto' => $nama_file,                       
            'text' => $request->text,     
            'keterangan' => $request->keterangan,                  
        ]);
        return redirect('pel_fundamental');
    }          
                   
}
public function pel_lanjutan()
{    
    $lanjutan=DB::table('tb_lanjutan')->get();
    return view('tampilan.pel_lanjutan.pel_lanjutan',compact('lanjutan'));
}
public function pel_lanjutan_edit($id)
{
    $data=DB::table('tb_lanjutan')->where('id',$id)->first();
    return view('tampilan.pel_lanjutan.pel_lanjutan_edit',compact('data'));        
}
public function pel_lanjutan_update(Request $request, $id)
{        
    $file = $request->file('poto');
    

    if($file==""){                        
        DB::table('tb_lanjutan')->where('id',$id)
        ->update([            
            'text' => $request->text,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('pel_lanjutan');
    }
    else{ 

        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_lanjutan')->where('id',$id)
        ->update([            
            'poto' => $nama_file,                       
            'text' => $request->text,     
            'keterangan' => $request->keterangan,                  
        ]);
        return redirect('pel_lanjutan');
    }          
                   
}
}