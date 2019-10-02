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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs=DB::table('tb_mahasiswa')->select('nim','nama')->get();
        $mhs2=DB::table('tb_daerah')->select('kab_kot')->get();
        $mhs3=DB::table('tb_sekolah')->select('sekolah')->get();
        $mhss=DB::table('tb_angkatan')->select('angkatan','nama_angkatan')->get();
        $mhs5=DB::table('tb_jurusan')->select('nama_jur')->get();
        $mhs6=DB::table('tb_orgpub')->select('jabatan')->get();
        $mhs7=DB::table('tb_orgppmb')->select('jabatan')->get();
        $mhs8=DB::table('tb_statuspub')->select('status')->get();
        $mhs9=DB::table('tb_statussos')->select('status')->get();
        return view('tampilan/mahasiswa',compact('mhs','mhs2','mhs3','mhs4','mhs5','mhs6','mhs7','mhs8','mhs9'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
