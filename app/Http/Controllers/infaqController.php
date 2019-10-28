<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class infaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
         public function totalInfaq()
    {
        $data1=DB::table('tb_infaq')
        ->select('tahun',\DB::raw('count(*) as total'))
        ->groupBy('tahun');

        // $data2=DB::table('tb_infaq')
        // ->leftJoin('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        // ->leftJoin('tb_statusPub','tb_mahasiswa.id_statusPub','=','tb_statusPub.id_statusPub')
        // ->select('tb_mahasiswa.jenis_kelamin','tb_angkatan.angkatan',\DB::raw('count(*) as total'))
        // ->groupBy('tb_angkatan.angkatan')
        // ->groupBy('tb_mahasiswa.jenis_kelamin');

        return view('User.user_infaq',compact('data1'));  
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
