<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class ProfilPubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil_pub=DB::table('tb_profil_pub')->get();
        return view('profil_pub.index',compact('profil_pub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profil_pub.tambah');
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request)
    {

    // //     // $this->validate($request[
    // //     //     'jabatan'=>'required'
    // //     // ]);


       if ($request->gambar=="" || $request->profil_pub=="") {
          return redirect('profil_pub/create')->with('alert','Maaf, Data Field tidak boleh kosong!');
      }else{

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('gambar');
                // isi dengan nama folder tempat kemana file diupload
       // Proses Upload File
        $destinationPath = 'imgs/logoProfil';
        $file->move($destinationPath,$file->getClientOriginalName());

        DB::table('tb_profil_pub')->insert([
            'id_profilPub' => $request->id_profilPub,
            'gambar' => $request->gambar,
            'profil_pub' =>$request->profil_pub
        ]);
        return redirect('profil_pub');
    }
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
        $profil_pub=DB::table('tb_profil_pub')->where('id_profilPub',$id)->get();
        return view('profil_pub.edit',compact('profil_pub'));
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

      if ($request->gambar=="" || $request->profil_pub=="") {
          return redirect('profil_pub/edit/'.$request->id_profilPub)->with('alert','Maaf, Data Field tidak boleh kosong!');
      }else{
        $file = $request->file('gambar');

      // Mendapatkan Nama File
         $nama_file = $file->getClientOriginalName();

      // Mendapatkan Extension File
         $extension = $file->getClientOriginalExtension();

      // Mendapatkan Ukuran File
         $ukuran_file = $file->getSize();

      // Proses Upload File
         $destinationPath = 'imgs/logoProfil';
         $file->move($destinationPath,$file->getClientOriginalName());


         DB::table('tb_profil_pub')
         ->where('id_profilPub',$request->id_profilPub)
         ->update([
            'gambar'=>$request->gambar, 
            'profil_pub'=>$request->profil_pub
        ]);

         return redirect('profil_pub');
     }
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_profil_pub')->where('id_profilPub',$id)->delete(); 
        return redirect('profil_pub');
    }
}
