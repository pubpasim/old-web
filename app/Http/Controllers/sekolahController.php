<?php

namespace App\Http\Controllers;
use App\sekolahModel;
use Illuminate\Http\Request;

class sekolahController extends Controller
{
     /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sek=sekolahModel::all();
        return view('tampilan/sekolah/viewsek',compact('sek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return view('tampilan/sekolah/createsek');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sek=new sekolahModel();
        $sek->sekolah=$request->sekolah;
        $sek->save();
        return redirect('tampilan/sekolah/viewsek');
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
        $sek=sekolahModel::where('id_sekolah',$id)->get();
        return view('tampilan/sekolah/editsek',compact('sek'));
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
        $sek=sekolahModel::where('id_sekolah',$id)->update(['sekolah'=>$request->sekolah]);
        return redirect('tampilan/sekolah/viewsek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sek=sekolahModel::where('id_sekolah',$id)->delete();
        return redirect('tampilan/sekolah/viewsek');
    }
}
