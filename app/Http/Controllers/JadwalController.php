<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwalmodel;
use DB;


class JadwalController extends Controller
{
    /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     ///kateg jadwal
     

    //jadwal kegiatan tes
     public function index()
    {
       
        $jadwalppmb=DB::table('tb_jadwal')
        ->join('tb_kategorites','tb_kategorites.id_kategori_tes','=','tb_jadwal.id_kategori_tes')
        ->select('tb_jadwal.id_jadwal','tb_jadwal.kegiatan','tb_kategorites.kategori_tes')
        ->get();
        return view('ppmb.jadwal.lihat_jadwal',compact('jadwalppmb'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=DB::table('tb_kategorites')->get();
        return view('ppmb.jadwal.tambah_jadwal',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwalppmb=new Jadwalmodel();
        $jadwalppmb->id_kategori_tes=$request->id_kategori_tes;
        $jadwalppmb->kegiatan=$request->jadwal;
        $jadwalppmb->save();
        return redirect('jadwal_ppmb');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $kategori=DB::table('tb_kategorites')->get();
        $jadwalppmb=DB::table('tb_jadwal')
        ->join('tb_kategorites','tb_kategorites.id_kategori_tes','=','tb_jadwal.id_kategori_tes')
        ->where('id_jadwal',$id)
        ->get();
        return view('ppmb.jadwal.edit_jadwal',compact('jadwalppmb','kategori'));
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
        
        DB::table('tb_jadwal')->where('id_jadwal',$request->id_jadwal)->update([
            'id_kategori_tes'=>$request->id_kategori_tes,
            'kegiatan'=>$request->jadwal
        ]);
        return redirect('jadwal_ppmb');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_jadwal')->where('id_jadwal',$id)->delete();
        return redirect('jadwal_ppmb');
    }
}
