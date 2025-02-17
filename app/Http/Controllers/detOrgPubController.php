<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class detOrgPubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detorg_pub = DB::table('tb_detorg_pub')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub','=','tb_orgpub.id_orgpub')
        ->join('tb_angkatan','tb_detorg_pub.id_angkatan','=','tb_angkatan.id_angkatan')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa','=','tb_mahasiswa.id_mahasiswa')
        ->join('tb_periode','tb_detorg_pub.id_periode','=','tb_periode.id_periode')
        ->select('tb_detorg_pub.id_detorg_pub','tb_periode.periode','tb_orgpub.jabatan_pub','tb_angkatan.angkatan','tb_mahasiswa.nama')->get();

        return view('detorg_pub.index',compact('detorg_pub'));

    }

    /**
     * Show the form for creatingsss a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $angkatan=DB::table('tb_angkatan')->where('angkatan','>=','16')->get();
        $periode=DB::table('tb_periode')->orderby('periode')->get();
        $mhs=DB::table('tb_mahasiswa')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        ->select('tb_mahasiswa.id_mahasiswa','tb_angkatan.angkatan','tb_angkatan.id_angkatan','tb_mahasiswa.nama')
        ->where('tb_angkatan.angkatan','>=','16')->orderby('nama')->get();
        $jabatan=DB::table('tb_orgpub')->get();
        
        return view('detorg_pub.tambah',compact('mhs','jabatan','angkatan','periode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = DB::table('tb_detorg_pub')
        ->join('tb_orgpub','tb_detorg_pub.id_orgpub','=','tb_orgpub.id_orgpub')
        ->join('tb_angkatan','tb_detorg_pub.id_angkatan','=','tb_angkatan.id_angkatan')
        ->join('tb_mahasiswa','tb_detorg_pub.id_mahasiswa','=','tb_mahasiswa.id_mahasiswa')
        ->join('tb_periode','tb_detorg_pub.id_periode','=','tb_periode.id_periode')
        ->where('periode',$request->periode)
        ->count();

        if ($request->periode=="" || $request->jabatan=="" || $request->angkatan=="" || $request->mahasiswa=="") {
            return redirect('detorg_pub/tambah')->with('alert','Maaf, Data tidak boleh kosong!');
        }if ($data>0) {
            return redirect('detorg_pub/tambah')->with('alert','Maaf, Data sudah ada!');
        }else{

        DB::table('tb_detorg_pub')->insert([
                'id_periode'=>$request->periode,
                'id_orgpub'=>$request->jabatan,
                'id_angkatan'=>$request->angkatan,
                'id_mahasiswa'=>$request->mahasiswa
            ]);
            return redirect ('detorg_pub');
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
    public function edit($id_detorg_pub)
    {
        $angkatan=DB::table('tb_angkatan')->where('angkatan','>=','16')->get();
        $periode=DB::table('tb_periode')->orderby('periode')->get();
        $mhs=DB::table('tb_mahasiswa')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        ->select('tb_mahasiswa.id_mahasiswa','tb_angkatan.angkatan','tb_angkatan.id_angkatan','tb_mahasiswa.nama')
        ->where('tb_angkatan.angkatan','>=','16')->orderby('nama')->get();
        $jabatan=DB::table('tb_orgpub')->get();

        $detail = DB::table('tb_detorg_pub')->where('id_detorg_pub',$id_detorg_pub)->first();
        return view('detorg_pub.edit',compact('detail','angkatan','jabatan','mhs','periode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_detorg_pub)
    {
         DB::table('tb_detorg_pub')->where('id_detorg_pub',$id_detorg_pub)->update([
            'id_orgpub'=>$request->jabatan,'id_periode'=>$request->periode,'id_mahasiswa'=>$request->mahasiswa,'id_angkatan'=>$request->angkatan
        ]);
        return redirect('detorg_pub');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_detorg_pub')->where('id_detorg_pub',$id)->delete();
        return redirect('detorg_pub');
    }
}