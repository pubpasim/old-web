<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class alumni_adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $foto=DB::table('tb_alumni_dok')->orderby('id_alumnidok','DESC')->get();
        $data=DB::table('tb_mahasiswa')->where('id_mahasiswa',$id)->first();
        return view('Alumni_admin.index',compact('data','foto'));
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
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
         
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = ('imgs');
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_alumni_dok')
        ->insert([
            'file' => $nama_file,            
            'keterangan' => $request->contact_message,   
            'id_angkatan'=> $request->id_ang,
            'id_mahasiswa'=> $request->id_mhs         
        ]);

        return redirect('admin/alumni/'.$request->id_mhs);
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
