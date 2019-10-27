<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\dokumentasiModel;
class dokumentasiPubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
     $kegiatan=DB::table('tb_pubdok')
        ->join('tb_angkatan','tb_pubdok.id_angkatan','=','tb_angkatan.id_angkatan')
        ->select('tb_pubdok.id_pubdok','tb_angkatan.angkatan','tb_pubdok.file','tb_pubdok.keterangan','tb_pubdok.tema')
        ->get();
    $lempar='hai';
        return view('pub_dok.kegiatan',compact('kegiatan','angkatan','lempar'));
        
    
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
        $kegiatan=DB::table('tb_pubdok');
        $lempar='hai';

        return view('pub_dok.image',compact('angkatan','kegiatan','lempar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $this->validate($request, [
            // check validtion for image or file
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      ]);
    

        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = ('imgs/kegiatan');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_pubdok')->insert([
            'file'=>$nama_file,'keterangan'=>$request->ket,'tema'=>$request->kegiatan,'id_angkatan'=>$request->select
        ]);

         return redirect('dokumentasiPub')->with('success','portfolio Has been You uploaded successfully.')
        ->with('image',$nama_file);
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
        $dokumen=DB::table('tb_pubdok')->where('id_pubdok',$id)->first();
        return view('pub_dok.editKegiatan',compact('dokumen'));
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
        $this->validate($request, [
            // check validtion for image or file
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      ]);
         
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = ('imgs/kegiatan');
        $file->move($tujuan_upload,$nama_file);
        DB::table('tb_pubdok')->where('id_pubdok',$id)->update([
            'file'=>$nama_file,'keterangan'=>$request->ket,'tema'=>$request->kegiatan
        ]);
        return redirect('dokumentasiPub')->with('success','portfolio Has been You uploaded successfully.')
        ->with('image',$nama_file);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_pubdok')->where('id_pubdok',$id)->delete();
        return redirect('dokumentasiPub')->with('alert','data berhasil dihapus');
    }
}
