<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class statusSosialController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status_sos=DB::table('tb_statussos')->get();
        return view('status_sosial.index',compact('status_sos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('status_sosial.tambah',compact('status_sos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_statussos')->insert([
            'status'=>$request->status
        ]);
        return redirect('status_sos');
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
        $status_sos=DB::table('tb_statussos')->where('id_statussos',$id)->first();
        return view('status_sosial.edit',compact('status_sos'));
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
        DB::table('tb_statussos')->where('id_statussos',$id)->update([
            'status'=>$request->status
        ]);
        return redirect('status_sos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_statussos')->where('id_statussos',$id)->delete();
        return redirect('status_sos');
    }
}
