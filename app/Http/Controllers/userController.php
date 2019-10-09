<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
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
        $lempar="";
        $mahasiswa = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status')->get();
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
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
