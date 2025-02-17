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
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->select('tb_detjadwal.id_detjadwal','tb_detjadwal.tanggal_awal','tb_detjadwal.tanggal_akhir','tb_detjadwal.waktu','tb_detjadwal.tempat','tb_jadwal.kegiatan')
        ->orderby('tb_periode.id_periode','DESC')
        ->orderby('tb_detjadwal.id_detjadwal','ASC')
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
        $periode=DB::table('tb_periode')->get();
        return view('ppmb.jadwal.detjadwal.detjadwal_tambah',compact('kegiatan','periode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tgl=DB::table('tb_detjadwal')
        ->where('tanggal_awal',$request->tanggal_awal)
        ->where('tanggal_akhir',$request->tanggal_akhir)
        ->where('id_periode',$request->periode)
        ->count();
        if ($tgl>0) {
            return redirect('detjadwal_ppmb/create')->with('alert','Maaf, Data Sudah Ada !');
        }else{
            $detjadwalppmb=new detJadwalModel();
            $detjadwalppmb->id_detjadwal=$request->detjadwal;
            $detjadwalppmb->id_jadwal=$request->kegiatan;
            $detjadwalppmb->id_periode=$request->periode;
            $detjadwalppmb->tanggal_awal=$request->tanggal_awal;
            $detjadwalppmb->tanggal_akhir=$request->tanggal_akhir;
            $detjadwalppmb->waktu=$request->waktu;
            $detjadwalppmb->tempat=$request->alamat;
            $detjadwalppmb->save();
            return redirect('detjadwal_ppmb');
        }
        
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
        $periode=DB::table('tb_periode')->get();
        $detjadwalppmb= DB::table('tb_detjadwal')
        ->join('tb_jadwal','tb_jadwal.id_jadwal','=','tb_detjadwal.id_jadwal')
        ->join('tb_periode','tb_periode.id_periode','=','tb_detjadwal.id_periode')
        ->where('id_detjadwal',$id)->get();
        return view('ppmb.jadwal.detjadwal.detjadwal_edit',compact('detjadwalppmb','kegiatan','periode'));
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
            'tanggal_awal'=>$request->tanggal_awal,
            'tanggal_akhir'=>$request->tanggal_akhir,
            'waktu'=>$request->waktu,
            'tempat'=>$request->alamat
        ]);
        return redirect('detjadwal_ppmb');
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