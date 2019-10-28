<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokalumni=DB::table('tb_alumni_dok')
        ->select('tb_alumni_dok.foto_alumni','tb_alumni_dok.keterangan')
        ->get();
        return view('tampilan.alumni.aktivitas',compact('dokalumni'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokalumni=DB::table('tb_alumni_dok')
        ->select('tb_alumni_dok.foto_alumni','tb_alumni_dok.keterangan')
        ->get();
        return view('tampilan.alumni.tambahdok_alumni',compact('dokalumni'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namafoto=$_FILES['foto_alumni'];
        DB::table('tb_alumni_dok')->insert(['foto_alumni'=>$namafoto,'keterangan'=>$request->keterangan]);
        move_uploaded_file($lokasi,"alumni/images/NOVEL/".$namafoto);
        return redirect('/');
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
