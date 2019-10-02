<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class orgPUBcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisasi=DB::table('tb_orgpub')->get();
        return view('struktur_organisasi.index',compact('organisasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisasi=DB::table('tb_orgpub')->get();
        return view('struktur_organisasi.tambah',compact('organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_orgpub')->insert
            ([
                'jabatan'=>$request->jabatan
            ]);
        return redirect ('/');
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
    public function edit($id_orgpub)
    {
        $organisasi = DB::table('tb_orgpub')->where('id_orgpub',$id_orgpub)->get();
        return view('struktur_organisasi.edit',compact('organisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_orgpub)
    {
        DB::table('tb_orgpub')->where('id_orgpub',$id_orgpub)->update([
            'jabatan'=>$request->tb_orgpub
        ]);
        return redirect('struktur_organisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_orgpub)
    {
        DB::table('tb_orgpub')->where('id_orgpub',$id_orgpub)->delete();
        return redirect('struktur_organisasi.index');
    }
}
