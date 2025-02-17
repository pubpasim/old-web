<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class peserta_wawancara_akhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jad_wawancara_akhir=DB::table('tb_peserta_wawancara_akhir')
        ->join('tb_periode','tb_periode.id_periode','=','tb_peserta_wawancara_akhir.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_peserta_wawancara_akhir.id_daerah')
        ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_peserta_wawancara_akhir.id_sekolah')
        ->orderby('tb_periode.periode','DESC')
        ->orderby('tb_peserta_wawancara_akhir.hari','ASC')
        ->orderby('tb_peserta_wawancara_akhir.id_pesera_wawancara_akhir','DESC')
        ->get();
        return view('ppmb.jadwal.wawancara_akhir.lihat',compact('jad_wawancara_akhir'));        
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
        return view('ppmb.jadwal.wawancara_akhir.tambah',compact('periode','daerah','sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data=DB::table('tb_peserta_wawancara_akhir')
        // ->where([
        //     ['id_periode',$request->id_periode],
        //     ['id_daerah',$request->id_daerah],
        //     ['id_sekolah',$request->id_sekolah],
        // ])->count();

        // if ($data>0) {
        //     return redirect('jad_wawancara_akhir/create')->with('alert','Maaf, data sudah ada!');
        // }else{

            DB::table('tb_peserta_wawancara_akhir')->insert([
                'id_pesera_wawancara_akhir'=>$request->id_pesera_wawancara_akhir,
                'peserta'=>$request->peserta,
                'id_periode'=>$request->id_periode,
                'id_daerah'=>$request->id_daerah,
                'id_sekolah'=>$request->id_sekolah,
                'hari'=>$request->waktu,
                'tanggal'=>$request->tanggal
            ]);   
            return redirect('jad_wawancara_akhir');
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
        $daerah=DB::table('tb_daerah')->get();
        $sekolah=DB::table('tb_sekolah')->get();
        $jad_wawancara_akhir=DB::table('tb_peserta_wawancara_akhir')
        ->join('tb_periode','tb_periode.id_periode','=','tb_peserta_wawancara_akhir.id_periode')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_peserta_wawancara_akhir.id_daerah')
        ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_peserta_wawancara_akhir.id_sekolah')
        ->where('id_pesera_wawancara_akhir',$id) 
        ->get();
        return view('ppmb.jadwal.wawancara_akhir.edit',compact('jad_wawancara_akhir','periode','daerah','sekolah'));

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

//         // $this->validate($request[
//         //     'jabatan' => 'required'
//         $periode=DB::table('tb_periode')->get();
//         $daerah=DB::table('tb_daerah')->get();
//         $sekolah=DB::table('tb_sekolah')->get();
//         $jad_wawancara_akhir=DB::table('tb_peserta_wawancara_akhir')
//         ->join('tb_periode','tb_periode.id_periode','=','tb_peserta_wawancara_akhir.id_periode')
//         ->join('tb_daerah','tb_daerah.id_daerah','=','tb_peserta_wawancara_akhir.id_daerah')
//         ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_peserta_wawancara_akhir.id_sekolah')
//         ->where('id_pesera_wawancara_akhir',$id) 
//         ->get();
// // ]);
//          $data=DB::table('tb_peserta_wawancara_akhir')
//         ->join('tb_periode','tb_periode.id_periode','=','tb_peserta_wawancara_akhir.id_periode')
//         ->join('tb_daerah','tb_daerah.id_daerah','=','tb_peserta_wawancara_akhir.id_daerah')
//         ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_peserta_wawancara_akhir.id_sekolah')
//         ->count();

//         if ($request->id_periode=="" || $request->id_daerah=="" || $request->tanggal || $request->waktu=="" || $request->id_sekolah=="" || $request->peserta=="") {
//             return view('ppmb.jadwal.wawancara_akhir.edit',compact('jad_wawancara_akhir','periode','daerah','sekolah'))->with('alert','Maaf, data tidak boleh kosong!');
//         }if ($data>0) {
//             return view('ppmb.jadwal.wawancara_akhir.edit',compact('jad_wawancara_akhir','periode','daerah','sekolah'))->with('alert','Maaf, data sudah ada!');
//         }else{
        // $data=DB::table('tb_peserta_wawancara_akhir')
        // ->where([
        //     ['id_periode',$request->id_periode],
        //     ['id_daerah',$request->id_daerah],
        //     ['id_sekolah',$request->id_sekolah],
        //     ['id_pesera_wawancara_akhir',$request->id_jad_wawancara_akhir],
        // ])->count();

        // if ($data>1) {
        //     return redirect('jad_wawancara_akhir/edit/'.$request->id_jad_wawancara_akhir)->with('alert','Maaf, data sudah ada!');
        // }else{
        

            DB::table('tb_peserta_wawancara_akhir')->where('id_pesera_wawancara_akhir',$request->id_jad_wawancara_akhir)->update([
                'id_periode'=>$request->id_periode,
                'peserta'=>$request->peserta,
                'id_daerah'=>$request->id_daerah,
                'id_sekolah'=>$request->id_sekolah,
                'hari'=>$request->waktu,
                'tanggal'=>$request->tanggal
            ]);
            return redirect('jad_wawancara_akhir');
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
        DB::table('tb_peserta_wawancara_akhir')->where('id_pesera_wawancara_akhir',$id)->delete();
        return redirect('jad_wawancara_akhir');
    }
    
    
    public function foto()
    {
        $dok_wawancara = DB::table('tb_dok_wawancara_akhir')
        ->join('tb_periode','tb_periode.id_periode','tb_dok_wawancara_akhir.fk_periode')
        ->orderBy('tb_periode.periode','DESC')
        ->orderBy('tb_dok_wawancara_akhir.hari','ASC')
        ->orderBy('tb_dok_wawancara_akhir.id','DESC')
        ->get();
        return view('ppmb.jadwal.wawancara_akhir.dok_wawancara_akhir',compact('dok_wawancara'));
    }
    public function create2()
    {
        $periode = DB::table('tb_periode')->get();
        return view('ppmb.jadwal.wawancara_akhir.tambah_dok_wawancara_akhir',compact('periode'));
    }
    public function store2(Request $request)
    {
       
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = ('imgs/kegiatan_wawancara');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_dok_wawancara_akhir')->insert([
            'foto'=>$nama_file,
            'keterangan'=>$request->keterangan,
            'hari'=>$request->hari,
            'fk_periode'=>$request->periode,
        ]);

         return redirect('jad_wawancara_akhir/foto');
    }
    public function edit2($id)
    {
        $periode = DB::table('tb_periode')->get();
        $data = DB::table('tb_dok_wawancara_akhir')->where('id',$id)->first();
        return view('ppmb.jadwal.wawancara_akhir.edit_dok_wawancara_akhir',compact('data','periode'));
    }
    public function update2(Request $request,$id)
    {

        if($request->file('foto')==""){
            DB::table('tb_dok_wawancara_akhir')->where('id',$id)->update([
                'keterangan'=>$request->keterangan,
                'hari'=>$request->hari,
                'fk_periode'=>$request->periode,
            ]);
            return redirect('jad_wawancara_akhir/foto');
        }
        else{
            
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = ('imgs/kegiatan_wawancara');
            $file->move($tujuan_upload,$nama_file);
            DB::table('tb_dok_wawancara_akhir')->where('id',$id)->update([
                'keterangan'=>$request->keterangan,
                'hari'=>$request->hari,
                'foto'=>$nama_file,
                'fk_periode'=>$request->periode,
            ]);
            return redirect('jad_wawancara_akhir/foto');
        }
        
    }
    public function destroy2($id)
    {

        DB::table('tb_dok_wawancara_akhir')->where('id',$id)->delete();
        return redirect('jad_wawancara_akhir/foto');
    }
}
