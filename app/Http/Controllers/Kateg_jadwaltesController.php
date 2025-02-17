<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Kateg_jadwaltesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $kategjadwalppmb=DB::table('tb_kategorites')->orderby('id_kategori_tes')->get();
        return view('ppmb.jadwal.lihat_jad_kategori',compact('kategjadwalppmb'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppmb.jadwal.tambah_jad_kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategjadwalppmb=DB::table('tb_kategorites')->insert([
         'id_kategori_tes' => $request->id_kategori_tes,
         'kategori_tes' => $request->kategori_tes
        ]);

        return redirect('kategori_jadwal_ppmb');
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
        $kategjadwalppmb= DB::table('tb_kategorites')->where('id_kategori_tes',$id)->get();
        return view('ppmb.jadwal.edit_jad_kategori',compact('kategjadwalppmb'));
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
        
        DB::table('tb_kategorites')->where('id_kategori_tes',$request->id_kategori_tes)->update([
            'kategori_tes'=>$request->kategori_tes
        ]);
        return redirect('kategori_jadwal_ppmb');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_kategorites')->where('id_kategori_tes',$id)->delete();
        return redirect('kategori_jadwal_ppmb');
    }

}
