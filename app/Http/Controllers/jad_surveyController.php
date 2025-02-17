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
        ->orderby('tb_periode.id_periode','DESC')
        ->orderby('tb_jadwal_survey.id_jad_survey','DESC')
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
        
        DB::table('tb_jadwal_survey')->where('id_jad_survey',$request->id_jad_survey)->update([
            'id_periode'=>$request->id_periode,
            'id_daerah'=>$request->id_daerah,
            'tanggal_awal'=>$request->tanggal_awal,
            'tanggal_akhir'=>$request->tanggal_akhir,
            'jumlah_peserta'=>$request->jumlah_peserta
        ]);
        return redirect('jad_survey');
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
    
    
    public function foto($id)
    {
        $dok_survey = DB::table('tb_dok_jad_survey')->where('fk_jad_survey',$id)->get();
        return view('ppmb.jadwal.survey.dok_jad_survey',compact('dok_survey','id'));
    }
    public function create2($id)
    {
        return view('ppmb.jadwal.survey.tambah_dok_survey',compact('id'));
    }
    public function store2(Request $request,$id)
    {
       
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = ('imgs/kegiatan_survey');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_dok_jad_survey')->insert([
            'foto'=>$nama_file,
            'keterangan'=>$request->keterangan,
            'fk_jad_survey'=>$id,
        ]);

         return redirect('jad_survey/foto/'.$id);
    }
    public function edit2($id)
    {
        $data = DB::table('tb_dok_jad_survey')->where('id_dok_survey',$id)->first();
        return view('ppmb.jadwal.survey.edit_dok_survey',compact('data'));
    }
    public function update2(Request $request, $id)
    {
        $x = DB::table('tb_dok_jad_survey')->where('id_dok_survey',$id)->first();
        
        if($request->file('foto')==""){
            DB::table('tb_dok_jad_survey')->where('id_dok_survey',$id)->update([
                'keterangan'=>$request->keterangan,
            ]);
            return redirect('jad_survey/foto/'.$x->fk_jad_survey);
        }
        else{
            
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = ('imgs/kegiatan_survey');
            $file->move($tujuan_upload,$nama_file);
            DB::table('tb_dok_jad_survey')->where('id_dok_survey',$id)->update([
                'keterangan'=>$request->keterangan,
                'foto'=>$nama_file,
            ]);
            return redirect('jad_survey/foto/'.$x->fk_jad_survey);
        }
        
    }
    public function destroy2($id)
    {
        $x = DB::table('tb_dok_jad_survey')->where('id_dok_survey',$id)->first();
        
        DB::table('tb_dok_jad_survey')->where('id_dok_survey',$id)->delete();
        return redirect('jad_survey/foto/'.$x->fk_jad_survey);
    }
}
