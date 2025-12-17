<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProfilPembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $profil_pembina=DB::table('tb_profil_pembina')->get();
        return view('profil_pembina.index',compact('profil_pembina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profil_pembina.tambah');
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


      if ($request->gambar=="" || $request->profil_pembina=="") {
          return redirect('profil_pembina/create')->with('alert','Maaf, Data Field tidak boleh kosong!');
      }else{
        DB::table('tb_profil_pembina')->insert([
            'id_profilpembina' => $request->id_profilpembina,
            'foto_pembina' => $request->gambar,
            'profil_pembina' =>$request->profil_pembina
        ]);
        return redirect('profil_pembina');
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
        $profil_pembina=DB::table('tb_profil_pembina')->where('id_profilpembina',$id)->get();
        return view('profil_pembina.edit',compact('profil_pembina'));
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

        if ($request->gambar=="" || $request->profil_pembina=="") {
          return redirect('profil_pembina/edit/'.$request->id_profilpembina)->with('alert','Maaf, Data Field tidak boleh kosong!');
        }else{
            DB::table('tb_profil_pembina')
            ->where('id_profilpembina',$request->id_profilpembina)
            ->update([
                'foto_pembina'=>$request->gambar, 
                'profil_pembina'=>$request->profil_pembina
            ]);

        return redirect('profil_pembina');
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
        DB::table('tb_profil_pembina')->where('id_profilpembina',$id)->delete(); 
        return redirect('profil_pembina');
    }
}
