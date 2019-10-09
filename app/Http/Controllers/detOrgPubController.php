<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class detOrgPubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detorg_pub = DB::table('tb_detorg_pub')->get();
        return view('detorg_pub.index',compact('detorg_pub'));

    }

    /**
     * Show the form for creatingsss a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detorg_pub = DB::table('tb_detorg_pub')->get();
        return view('detorg_pub.tambah',compact('detorg_pub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_detorg_pub')->insert
            ([
                'id_orgpub'=>$request->jabatan,
                'id_angkatan'=>$request->angkatan,
                'id_mahasiswa'=>$request->id_mahasiswa
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
