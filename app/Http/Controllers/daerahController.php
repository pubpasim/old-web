<?php

namespace App\Http\Controllers;
use App\daerahModel;
use Illuminate\Http\Request;

class daerahController extends Controller
{
     /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dae=daerahModel::all();
        return view('tampilan/daerah/viewdae',compact('dae'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan/daerah/createdae');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dae=new daerahModel();
        $dae->kab_kot=$request->kab_kot;
        $dae->save();
        return redirect('tampilan/daerah/viewdae');
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
        $dae=daerahModel::where('id_daerah',$id)->get();
        return view('tampilan/daerah/editdae',compact('dae'));
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
         $dae=daerahModel::where('id_daerah',$id)->update(['kab_kot'=>$request->kab_kot]);
        return redirect('tampilan/daerah/viewdae');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sek=sekolahModel::where('id_daerah',$id)->delete();
        return redirect('tampilan/daerah/viewdae');
    }
}
