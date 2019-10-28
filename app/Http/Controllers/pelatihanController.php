<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class pelatihanController extends Controller
{
     /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihan = DB::table('tb_pelatihan')->get();
        return view('pelatihan.index',compact('pelatihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelatihan = DB::table('tb_pelatihan')->get();
        return view('pelatihan.tambah',compact('pelatihan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_pelatihan')->insert
        ([
            'pelatihan'=>$request->pelatihan
        ]);
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
    public function edit($id_pelatihan)
    {
        $pelatihan = DB::table('tb_pelatihan')->where('id_pelatihan',$id_pelatihan)->get();
        return view('pelatihan.edit',compact('pelatihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelatihan)
    {
        $pelatihan = DB::table('tb_pelatihan')->where('id_pelatihan',$id_pelatihan)->update([
            'pelatihan'=>$request->tb_pelatihan
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelatihan)
    {
        DB::table('tb_pelatihan')->where('id_pelatihan',$id_pelatihan)->delete();
        return redirect('pelatihan.index');
    }}
