<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
USE App\orgPUBmodel;

class orgPUBcontroller extends Controller
{
    public function index()
    {
        $organisasi=DB::table('tb_orgpub')->get();
        return view('struktur_organisasi.index',compact('organisasi'));
    }
   public function create()
    {
        $organisasi=DB::table('tb_orgpub')->get();
        return view('struktur_organisasi.tambah',compact('organisasi'));
    }

    public function store(Request $request)
    {
        DB::table('tb_orgpub')->insert
            ([
                'jabatan_pub'=>$request->jabatan
            ]);
        return redirect ('struktur_organisasi/index');
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
        $organisasi=DB::table('tb_orgpub')->where('id_orgpub',$id)->get();
        return view('struktur_organisasi/edit',compact('organisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $organisasi=DB::table('tb_orgpub')->where('id_orgpub',$id)->update(['jabatan_pub'=>$request->jabatan_pub]);
        return redirect('struktur_organisasi/index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organisasi=DB::table('tb_orgpub')->where('id_orgpub',$id)->delete();
        return redirect('struktur_organisasi/index');
    }


    public function index2()
    {
        $organisasi=DB::table('tb_orgalumni')->get();
        return view('struktur_organisasi.index2',compact('organisasi'));
    }
   public function create2()
    {
        $organisasi=DB::table('tb_orgalumni')->get();
        return view('struktur_organisasi.tambah2',compact('organisasi'));
    }

    public function store2(Request $request)
    {
        DB::table('tb_orgalumni')->insert
            ([
                'jabatan'=>$request->jabatan
            ]);
        return redirect ('struktur_organisasi2/index');
    }

    public function edit2($id_org)
    {
        $organisasi = DB::table('tb_orgalumni')->where('id_org',$id_org)->get();
        return view('struktur_organisasi.edit2',compact('organisasi','id_org'));
    }
    public function update2(Request $request, $id_org)
    {
        DB::table('tb_orgalumni')->where('id_org',$id_org)->update([
            'jabatan'=>$request->jabatan
        ]);
        return redirect ('struktur_organisasi2/index');
    }

    public function destroy2($id_org)
    {
        DB::table('tb_orgalumni')->where('id_org',$id_org)->delete();
        return redirect ('struktur_organisasi2/index');
    }
}
