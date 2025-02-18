<?php

namespace App\Http\Controllers;

use App\Models\angkatanModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
class angkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ang=DB::table('tb_angkatan')->orderBy('angkatan','ASC')->get();
        return view('tampilan.angkatan.viewang',compact('ang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan.angkatan.createang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ang=new angkatanModel();
        $ang->nama_angkatan=$request->nama_angkatan;
        $ang->angkatan=$request->angkatan;
        $ang->save();
        return redirect('tampilan/angkatan/viewang');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ang=angkatanModel::where('id_angkatan',$id)->get();
        return view('tampilan.angkatan.editang',compact('ang'));
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
        $ang=angkatanModel::where('id_angkatan',$id)->update(['nama_angkatan'=>$request->nama_angkatan]);
        $ang=angkatanModel::where('id_angkatan',$id)->update(['angkatan'=>$request->angkatan]);
        return redirect('tampilan/angkatan/viewang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mh=DB::table('tb_mahasiswa')->where('id_angkatan',$id)->count();
        $ppmb=DB::table('tb_detorg_ppmb')->where('id_angkatan',$id)->count();
        $pub=DB::table('tb_detorg_pub')->where('id_angkatan',$id)->count();
        $pub_dok=DB::table('tb_pubdok')->where('id_angkatan',$id)->count();
        $ppmb_dok=DB::table('tb_ppmb_dok')->where('id_angkatan',$id)->count();
        if($mh>0 || $ppmb>0 || $pub>0 || $pub_dok>0 || $ppmb_dok>0){
            return redirect('tampilan/angkatan/viewang')->with('alert','Data sedang digunakan di tabel lain!');
        }else{
            $ang=angkatanModel::where('id_angkatan',$id)->delete();
            return redirect('tampilan/angkatan/viewang');
        }
        
    }
}
