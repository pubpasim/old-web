<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class jad_tpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
       
        $jad_tpa=DB::table('tb_jadwal_tpa')
        ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_tpa.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_tpa.id_daerah')
        ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_jadwal_tpa.id_sekolah')
        ->orderby('tb_periode.id_periode','DESC')
        ->orderby('tb_jadwal_tpa.tanggal','ASC')
        ->get();
        return view('ppmb.jadwal.tpa.lihat',compact('jad_tpa'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode=DB::table('tb_periode')->get();
        $daerah=DB::table('tb_daerah')->orderby('kab_kot')->get();
        $sekolah=DB::table('tb_sekolah')->orderby('sekolah')->get();
        return view('ppmb.jadwal.tpa.tambah',compact('periode','daerah','sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_jadwal_tpa')->insert([
            'id_jad_tpa'=>$request->id_jad_tpa,
            'id_periode'=>$request->id_periode,
            'id_daerah'=>$request->id_daerah,
            'tanggal'=>$request->tanggal,
            'waktu'=>$request->waktu,
            'id_sekolah'=>$request->id_sekolah
   
        ]);   
        return redirect('jad_tpa');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
  
        $periode=DB::table('tb_periode')->get();
        $daerah=DB::table('tb_daerah')->orderby('kab_kot')->get();
        $sekolah=DB::table('tb_sekolah')->orderby('sekolah')->get();
        $jad_tpa=DB::table('tb_jadwal_tpa')
        ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_tpa.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_tpa.id_daerah')
        ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_jadwal_tpa.id_sekolah')
        ->where('id_jad_tpa',$id) 
        ->get();
         return view('ppmb.jadwal.tpa.edit',compact('jad_tpa','periode','daerah','sekolah'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // $this->validate($request[
        //     'jabatan' => 'required'
// ]);
        
        DB::table('tb_jadwal_tpa')->where('id_jad_tpa',$request->id_jad_tpa)->update([
            'id_periode'=>$request->id_periode,
            'id_daerah'=>$request->id_daerah,
            'tanggal'=>$request->tanggal,
            'waktu'=>$request->waktu,
            'id_sekolah'=>$request->id_sekolah
        ]);
        return redirect('jad_tpa');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_jadwal_tpa')->where('id_jad_tpa',$id)->delete();
        return redirect('jad_tpa');
    }
}
