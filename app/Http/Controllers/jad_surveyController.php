<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class jad_surveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jad_survey=DB::table('tb_jadwal_survey')
        ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_survey.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_survey.id_daerah')
        ->orderby('tanggal_awal')
        ->get();
        return view('ppmb.jadwal.survey.index',compact('jad_survey'));        
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
        return view('ppmb.jadwal.survey.tambah',compact('periode','daerah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=DB::table('tb_jadwal_survey')
        ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_survey.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_survey.id_daerah')
        ->count();
        
        if ($request->id_periode=="" || $request->id_daerah=="" || $request->tanggal_awal=="" || $request->tanggal_akhir=="" || $request->jumlah_peserta=="") {
            return redirect('jad_survey/create')->with('alert','Maaf, data tidak boleh kosong!');
        }if ($data>0) {
            return redirect('jad_survey/create')->with('alert','Maaf, data sudah ada!');
        }else{
            DB::table('tb_jadwal_survey')->insert([
                'id_jad_survey'=>$request->id_jad_survey,
                'id_periode'=>$request->id_periode,
                'id_daerah'=>$request->id_daerah,
                'tanggal_awal'=>$request->tanggal_awal,
                'tanggal_akhir'=>$request->tanggal_akhir,
                'jumlah_peserta'=>$request->jumlah_peserta

            ]);   
            return redirect('jad_survey');
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
        $daerah=DB::table('tb_daerah')->orderby('kab_kot')->get();
        $jad_survey=DB::table('tb_jadwal_survey')
        ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_survey.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_survey.id_daerah')
        ->where('id_jad_survey',$id) 
        ->get();
        return view('ppmb.jadwal.survey.edit',compact('jad_survey','periode','daerah'));
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
        $periode=DB::table('tb_periode')->get();
        $daerah=DB::table('tb_daerah')->orderby('kab_kot')->get();
        $jad_survey=DB::table('tb_jadwal_survey')
        ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_survey.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_survey.id_daerah')
        ->where('id_jad_survey',$request->id_jad_survey) 
        ->get();
        
        $data=DB::table('tb_jadwal_survey')
        ->join('tb_periode','tb_periode.id_periode','=','tb_jadwal_survey.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_jadwal_survey.id_daerah')
        ->count();
        
        if ($request->id_periode=="" || $request->id_daerah=="" || $request->tanggal_awal=="" || $request->tanggal_akhir=="" || $request->jumlah_peserta=="") {
           return view('ppmb.jadwal.survey.edit',compact('jad_survey','periode','daerah'))->with('alert','Maaf, data tidak boleh kosong!');
        }if ($data>0) {
         return view('ppmb.jadwal.survey.edit',compact('jad_survey','periode','daerah'))->with('alert','Maaf, data sudah ada!');
        }else{
        DB::table('tb_jadwal_survey')->where('id_jad_survey',$request->id_jad_survey)->update([
            'id_periode'=>$request->id_periode,
            'id_daerah'=>$request->id_daerah,
            'tanggal_awal'=>$request->tanggal_awal,
            'tanggal_akhir'=>$request->tanggal_akhir,
            'jumlah_peserta'=>$request->jumlah_peserta
        ]);
        return redirect('/jad_survey');
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_jadwal_survey')->where('id_jad_survey',$id)->delete();
        return redirect('/jad_survey');
    }
}
