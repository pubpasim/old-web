<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\detJadwalModel;
                                                                                                                                                                                                            
class detJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detjadwalppmb=DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_detjadwal.id_daerah')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_detjadwal.id_sekolah')
        // ->select('tb_detjadwal.id_detjadwal','tb_detjadwal.tanggal','tb_detjadwal.waktu','tb_detjadwal.tempat','tb_detjadwal.alamat','tb_jadwal.id_jadwal','tb_jadwal.kegiatan','tb_daerah.id_daerah','tb_daerah.kab_kota')
        ->get();
        return view('ppmb.jadwal.detjadwal.detjadwal_lihat',compact('detjadwalppmb'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kegiatan=DB::table('tb_jadwal')->get();
        $daerah=DB::table('tb_daerah')->get();
        $periode=DB::table('tb_periode')->get();
        $sekolah=DB::table('tb_sekolah')->get();
        $periode=DB::table('tb_periode')->get();
        return view('ppmb.jadwal.detjadwal.detjadwal_tambah',compact('kegiatan','daerah','periode','sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detjadwalppmb=new detJadwalModel();
        $detjadwalppmb->id_detjadwal=$request->detjadwal;
        $detjadwalppmb->id_jadwal=$request->kegiatan;
        $detjadwalppmb->id_periode=$request->periode;
        $detjadwalppmb->id_daerah=$request->daerah;
        $detjadwalppmb->tanggal_awal=$request->tanggal_awal;
        $detjadwalppmb->tanggal_akhir=$request->tanggal_akhir;
        $detjadwalppmb->waktu=$request->waktu;
        $detjadwalppmb->id_sekolah=$request->tempat;
        $detjadwalppmb->alamat=$request->alamat;
        $detjadwalppmb->save();
        return redirect('detjadwal_ppmb');
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
        $kegiatan=DB::table('tb_jadwal')->get();
        $daerah=DB::table('tb_daerah')->get();
        $periode=DB::table('tb_periode')->get();
        $sekolah=DB::table('tb_sekolah')->get();
        $detjadwalppmb= DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_daerah','tb_daerah.id_daerah','=','tb_detjadwal.id_daerah')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->join('tb_sekolah','tb_sekolah.id_sekolah','=','tb_detjadwal.id_sekolah')
        ->where('id_detjadwal',$id)->get();
        return view('ppmb.jadwal.detjadwal.detjadwal_edit',compact('detjadwalppmb','kegiatan','daerah','periode','sekolah'));
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
        
        DB::table('tb_detjadwal')->where('id_detjadwal',$request->id_detjadwal)->update([
            'id_jadwal'=>$request->kegiatan,
            'id_periode'=>$request->periode,
            'id_daerah'=>$request->daerah,
            'tanggal_awal'=>$request->tanggal_awal,
            'tanggal_akhir'=>$request->tanggal_akhir,
            'waktu'=>$request->waktu,
            'id_sekolah'=>$request->tempat,
            'alamat'=>$request->alamat
        ]);
        return redirect('/detjadwal_ppmb');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_detjadwal')->where('id_detjadwal',$id)->delete();
        return redirect('detjadwal_ppmb');
    }
}
