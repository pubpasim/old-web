<?php

namespace App\Http\Controllers;
use App\daerahModel;
use App\sekolahModel;
use App\angkatanModel;
use App\orgPUBmodel;
use App\jurusanModel;
use App\orgPPMBmodel;
use App\statusPubmodel;
use App\statusSosialModel;
use App\mahasiswaModel;
use DB;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = DB::table('tb_mahasiswa')
            ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
            ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
            ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
            ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
            ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
            ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
            ->select('tb_mahasiswa.nama','tb_mahasiswa.nim','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status')->where('tb_statusPub.status','PUB Aktif')->get();
        return view('tampilan.mahasiswa.index',compact('mahasiswa'));
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return view('tampilan.mahasiswa.mahasiswa',compact('dr','skl','sts1','angkt','orgpub','orgppmb','jur'));
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
