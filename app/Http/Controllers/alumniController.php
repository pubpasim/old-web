<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class alumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aktivitas()
    {
        $lempar="";
        $angkatan=DB::table('tb_angkatan')->get();
        $alumniDok = DB::table('tb_alumni_dok')
            ->join('tb_angkatan', 'tb_alumni_dok.id_angkatan', '=', 'tb_angkatan.id_angkatan')
            ->join('tb_mahasiswa', 'tb_alumni_dok.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
            ->select('tb_angkatan.angkatan','tb_mahasiswa.nama','tb_alumni_dok.file','tb_alumni_dok.keterangan')
            ->get();
        return view('tampilan.alumni.aktivitas',compact('alumniDok','angkatan','lempar'));
        
    }
    public function aktivitasTampil(Request $request)
    {
        $lempar=$request->select;
        $angkatan=DB::table('tb_angkatan')->get();
        $alumniDok = DB::table('tb_alumni_dok')
            ->join('tb_angkatan', 'tb_alumni_dok.id_angkatan', '=', 'tb_angkatan.id_angkatan')
            ->join('tb_mahasiswa', 'tb_alumni_dok.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
            ->select('tb_angkatan.angkatan','tb_mahasiswa.nama','tb_alumni_dok.file','tb_alumni_dok.keterangan')->where('tb_alumni_dok.id_angkatan',$lempar)
            ->get();
        return view('tampilan.alumni.aktivitas',compact('alumniDok','angkatan','lempar'));
        
    }
    public function index3(){
        $dr=DB::table('tb_daerah')
        ->select('tb_daerah.id_daerah','tb_daerah.kab_kot')->get();
        $skl=DB::table('tb_sekolah')
        ->select('tb_sekolah.id_sekolah','tb_sekolah.sekolah')->get();
        $sts1=DB::table('tb_statusSos')
        ->select('tb_statusSos.id_statusSos','tb_statusSos.status')->get();
        $angkt=DB::table('tb_angkatan')
        ->select('tb_angkatan.id_angkatan','tb_angkatan.angkatan')->get();
        $orgpub=DB::table('tb_orgpub')
        ->select('tb_orgpub.id_orgpub','tb_orgpub.jabatan_pub')->get();
        $orgppmb=DB::table('tb_orgppmb')
        ->select('tb_orgppmb.id_orgppmb','tb_orgppmb.jabatan')->get();
        $jur=DB::table('tb_jurusan')
        ->select('tb_jurusan.id_jur','tb_jurusan.nama_jur')->get();
        return view('tampilan.alumni.Alumni',compact('dr','skl','sts1','angkt','orgpub','orgppmb','jur'));
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
        DB::table('tb_mahasiswa')->insert([
            'nama'=>$request->Tname,'NIM'=>$request->nim,'id_daerah'=>$request->daerah,'id_angkatan'=>$request->angkatan,'id_sekolah'=>$request->skl,'id_statusSos'=>$request->spkw,'id_orgpub'=>$request->jbPUB,'id_orgppmb'=>$request->jbPPMB,'id_jur'=>$request->jurusan, 'id_statusPub'=>$request->alm
        ]);
        return redirect('lanjut/pengalaman');
    }
    public function store2(Request $request)
    {
        DB::table('tb_detpengalaman')->insert([
            'id_mahasiswa'=>$request->idmhs,'jabatan'=>$request->jabatan,'lama_kerja'=>$request->lama,'instansi'=>$request->perusahaan
        ]);
        $idmax =DB::table('tb_mahasiswa')->max('id_mahasiswa');
        return view('tampilan.alumni.lanjut',compact('idmax'));
        //return redirect('lanjut/pengalaman');
    }
    public function store3(Request $request)
    {
        DB::table('tb_detpendidikan')->insert([
            'id_mahasiswa'=>$request->idmhs2,'universitas'=>$request->kampus,'tahun_lulus'=>
            $request->lulus,'pendidikan'=>$request->pddk
        ]);
        $idmax =DB::table('tb_mahasiswa')->max('id_mahasiswa');
        return view('tampilan.alumni.lanjut',compact('idmax'));
        //return redirect('lanjut/pengalaman');
    }
    public function index2()
    {

        $idmax =DB::table('tb_mahasiswa')->max('id_mahasiswa');
        return view('tampilan.alumni.lanjut',compact('idmax'));
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
