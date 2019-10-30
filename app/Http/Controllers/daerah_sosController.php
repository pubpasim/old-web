<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class daerah_sosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   //jadwal kegiatan tes
    public function index()
    {

        $daerah_sos=DB::table('tb_daerah_sos')
        ->join('tb_daerah','tb_daerah_sos.id_daerah','=','tb_daerah.id_daerah')
        ->join('tb_periode','tb_daerah_sos.id_periode','=','tb_periode.id_periode')
        ->join('tb_sekolah','tb_daerah_sos.id_sekolah','=','tb_sekolah.id_sekolah')
        ->get();
        return view('ppmb.jadwal.daerahSos.lihat',compact('daerah_sos'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $daerah_sos=DB::table('tb_daerah')->get();
        $periode=DB::table('tb_periode')->get();
        $sekolah=DB::table('tb_sekolah')->get();
        return view('ppmb.jadwal.daerahSos.tambah',compact('daerah_sos','periode','sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $r                                                 equest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sek=DB::table('tb_daerah_sos')->where('id_sekolah',$request->tempat)->count();
        $dae=DB::table('tb_daerah_sos')->where('id_daerah',$request->id_daerah)->count();
        $per=DB::table('tb_daerah_sos')->where('id_periode',$request->id_periode)->count();
        if($sek>0 && $dae>0 && $per>0){
            return redirect('/daerah_sos_ppmb/create')->with('alert','Data Tersebut Sudah Ada !');
        }else{
            DB::table('tb_daerah_sos')->insert([
                'id_periode'=>$request->id_periode,
                'id_daerah'=>$request->id_daerah,
                'id_sekolah'=>$request->tempat

            ]);
            return redirect('daerah_sos_ppmb');    
        }

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
     $sekolah=DB::table('tb_sekolah')->get();
     $daerah=DB::table('tb_daerah')->get();
     $daerah_sos=DB::table('tb_daerah_sos')
     ->join('tb_daerah','tb_daerah_sos.id_daerah','=','tb_daerah.id_daerah')
     ->join('tb_periode','tb_daerah_sos.id_periode','=','tb_periode.id_periode')
     ->join('tb_sekolah','tb_daerah_sos.id_sekolah','=','tb_sekolah.id_sekolah')
     ->select('tb_daerah_sos.id_daerah_sos','tb_daerah.kab_kot','tb_sekolah.sekolah','tb_periode.periode')
     ->where('id_daerah_sos',$id)
     ->first();
     return view('ppmb.jadwal.daerahSos.edit',compact('daerah_sos','daerah','periode','sekolah'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // $this->validate($request[
        //     'jabatan' => 'required'
// ]);

        DB::table('tb_daerah_sos')->where('id_daerah_sos',$id)->update([
            'id_periode'=>$request->id_periode,
            'id_daerah'=>$request->id_daerah,
            'id_sekolah'=>$request->tempat
        ]);
        return redirect('/daerah_sos_ppmb');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_daerah_sos')->where('id_daerah_sos',$id)->delete();
        return redirect('daerah_sos_ppmb');
    }
}
