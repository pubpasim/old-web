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
        ->orderby('tb_periode.id_periode','DESC')
        ->orderby('tb_daerah_sos.id_daerah_sos','desc')
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
        $daerah_sos=DB::table('tb_daerah')->orderby('kab_kot')->get();
        $periode=DB::table('tb_periode')->get();
        $sekolah=DB::table('tb_sekolah')->orderby('sekolah')->get();
        return view('ppmb.jadwal.daerahSos.tambah',compact('daerah_sos','periode','sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $sek=DB::table('tb_daerah_sos')->where('id_sekolah',$request->tempat)->count();
        // $dae=DB::table('tb_daerah_sos')->where('id_daerah',$request->id_daerah)->count();
        // $per=DB::table('tb_daerah_sos')->where('id_periode',$request->id_periode)->count();
        $tempat=$request->tempat;
        $jml_dipilih=count($tempat);
        for($x=0;$x<$jml_dipilih;$x++){
        // if($sek>0 && $dae>0 && $per>0){
        //     return redirect('/daerah_sos_ppmb/create')->with('alert','Data Tersebut Sudah Ada !');
        // }else{
           
            DB::table('tb_daerah_sos')->insert([
                'id_periode'=>$request->id_periode,
                'id_daerah'=>$request->id_daerah,
                'id_sekolah'=>$tempat[$x]
            ]);
        }
            return redirect('daerah_sos_ppmb');    
        //  }
        // }

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
     $sekolah=DB::table('tb_sekolah')->orderby('sekolah')->get();
     $daerah=DB::table('tb_daerah')->orderby('kab_kot')->get();
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

        //  $sek=DB::table('tb_daerah_sos')
        // ->where([
        //     ['id_sekolah',$request->tempat],
        //     ['id_daerah',$request->id_daerah],
        //     ['id_periode',$request->id_periode],
        // ])->count();
        // if($sek>0){
        //     return redirect('daerah_sos_ppmb/edit/'.$id)->with('alert','Data Tersebut Sudah Ada !');
        // }else{

            DB::table('tb_daerah_sos')->where('id_daerah_sos',$id)->update([
                'id_periode'=>$request->id_periode,
                'id_daerah'=>$request->id_daerah,
                'id_sekolah'=>$request->tempat
            ]);
            return redirect('daerah_sos_ppmb');
        // }
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
    public function foto($id)
    {
        $dok_sekolah = DB::table('tb_dok_per_sekolah')->where('fk_daerah_sos',$id)->get();
        return view('ppmb.jadwal.daerahSos.dok_sekolah',compact('dok_sekolah','id'));
    }
    public function create2($id)
    {
        return view('ppmb.jadwal.daerahSos.tambah_dok_sekolah',compact('id'));
    }
    public function store2(Request $request,$id)
    {
       
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = ('imgs/kegiatan');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_dok_per_sekolah')->insert([
            'foto'=>$nama_file,
            'keterangan'=>$request->keterangan,
            'fk_daerah_sos'=>$id,
        ]);

         return redirect('daerah_sos_ppmb/foto/'.$id);
    }
    public function edit2($id)
    {
        $data = DB::table('tb_dok_per_sekolah')->where('id_doks',$id)->first();
        return view('ppmb.jadwal.daerahSos.edit_dok_sekolah',compact('data'));
    }
    public function update2(Request $request, $id)
    {
        $x = DB::table('tb_dok_per_sekolah')->where('id_doks',$id)->first();
        
        if($request->file('foto')==""){
            DB::table('tb_dok_per_sekolah')->where('id_doks',$id)->update([
                'keterangan'=>$request->keterangan,
            ]);
            return redirect('daerah_sos_ppmb/foto/'.$x->fk_daerah_sos);
        }
        else{
            
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = ('imgs/kegiatan');
            $file->move($tujuan_upload,$nama_file);
            DB::table('tb_dok_per_sekolah')->where('id_doks',$id)->update([
                'keterangan'=>$request->keterangan,
                'foto'=>$nama_file,
            ]);
            return redirect('daerah_sos_ppmb/foto/'.$x->fk_daerah_sos);
        }
        
    }
    public function destroy2($id)
    {
        $x = DB::table('tb_dok_per_sekolah')->where('id_doks',$id)->first();
        
        DB::table('tb_dok_per_sekolah')->where('id_doks',$id)->delete();
        return redirect('daerah_sos_ppmb/foto/'.$x->fk_daerah_sos);
    }
    
    
    
    public function foto2($id)
    {
        $dok_tpa = DB::table('tb_jad_tpa')->where('fk_jad_tpa',$id)->get();
        return view('ppmb.jadwal.tpa.dok_jad_tpa',compact('dok_tpa','id'));
    }
    public function create3($id)
    {
        return view('ppmb.jadwal.tpa.tambah_jad_tpa',compact('id'));
    }
    public function store3(Request $request,$id)
    {
       
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = ('imgs/kegiatan');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_jad_tpa')->insert([
            'foto'=>$nama_file,
            'keterangan'=>$request->keterangan,
            'fk_jad_tpa'=>$id,
        ]);

         return redirect('jad_tpa/foto/'.$id);
    }
    public function edit3($id)
    {
        $data = DB::table('tb_jad_tpa')->where('id_jad',$id)->first();
        return view('ppmb.jadwal.tpa.edit_jad_tpa',compact('data'));
    }
    public function update3(Request $request, $id)
    {
        $x = DB::table('tb_jad_tpa')->where('id_jad',$id)->first();
        
        if($request->file('foto')==""){
            DB::table('tb_jad_tpa')->where('id_jad',$id)->update([
                'keterangan'=>$request->keterangan,
            ]);
            return redirect('jad_tpa/foto/'.$x->fk_jad_tpa);
        }
        else{
            
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = ('imgs/kegiatan');
            $file->move($tujuan_upload,$nama_file);
            DB::table('tb_jad_tpa')->where('id_jad',$id)->update([
                'keterangan'=>$request->keterangan,
                'foto'=>$nama_file,
            ]);
            return redirect('jad_tpa/foto/'.$x->fk_jad_tpa);
        }
        
    }
    public function destroy3($id)
    {
        $x = DB::table('tb_jad_tpa')->where('id_jad',$id)->first();
        
        DB::table('tb_jad_tpa')->where('id_jad',$id)->delete();
        return redirect('jad_tpa/foto/'.$x->fk_jad_tpa);
    }
}
