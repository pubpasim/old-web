<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class statusPubController extends Controller
{
     /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status_pub = DB::table('tb_statuspub')->get();
        return view('status_pub.index',compact('status_pub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status_pub = DB::table('tb_statuspub')->get();
        return view('status_pub.tambah',compact('status_pub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_statuspub')->insert 
        ([ 
            'status'=>$request->status
        ]);
        return redirect('status_pub');
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
    public function edit($id_status)
    {
        $status_pub = DB::table('tb_statuspub')->where('id_statuspub',$id_status)->first();
        return view('status_pub.edit', compact('status_pub'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_status)
    {
        DB::table('tb_statuspub')->where('id_statuspub',$id_status)->update([
            'status'=>$request->status_pub
        ]);
        return redirect('status_pub');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         DB::table('tb_statuspub')->where('id_statuspub',$id)->delete();
          return redirect('status_pub');
    }
}
