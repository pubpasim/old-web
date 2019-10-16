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
     public function index()
    {
        $jadwalppmb=Jadwalmodel::all();
        return view('ppmb.jadwal.lihat_jadwal',compact('jadwalppmb'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppmb.jadwal.tambah_jadwal');
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
        $jadwalppmb->kegiatan=$request->jadwal;
        $jadwalppmb->save();
        return redirect('jadwal_ppmb');
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
        $jadwalppmb= DB::table('tb_jadwal')->where('id_jadwal',$id)->get();
        return view('ppmb.jadwal.edit_jadwal',compact('jadwalppmb'));
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
            'kegiatan'=>$request->jadwal
        ]);
        return redirect('/jadwal_ppmb');
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
