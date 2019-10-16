<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode=DB::table('tb_periode')->get();
        return view('periode.index',compact('periode'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periode.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tb_periode')->insert([
        'id_periode'=> $request->id_periode,
        'periode'=> $request->periode
        ]);
        return redirect('periode');
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
        $periode= DB::table('tb_periode')->where('id_periode',$id)->get();
        return view('periode.edit',compact('periode'));
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
        
        DB::table('tb_periode')->where('id_periode',$request->id_periode)->update([
            'periode'=>$request->periode
        ]);
        return redirect('/periode');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_periode')->where('id_periode',$id)->delete();
        return redirect('periode');
    }
}
