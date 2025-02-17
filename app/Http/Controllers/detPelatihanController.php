<?php

namespace App\Http\Controllers;
use DB;
use App\detPelatihanModel;
use Illuminate\Http\Request;
use App\gambar;
class detPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detpelatihan = DB::table('tb_detpelatihan')
        ->join('tb_angkatan','tb_angkatan.id_angkatan','=','tb_detpelatihan.id_angkatan')
        ->join('tb_pelatihan','tb_pelatihan.id_pelatihan','=','tb_detpelatihan.id_pelatihan')
        ->select('tb_detpelatihan.id_detpelatihan','tb_pelatihan.pelatihan','tb_angkatan.angkatan','tb_detpelatihan.file')
        ->get(); 
        return view('Alumni_admin.det_pelatihan.index',compact('detpelatihan'));

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detpelatihan = DB::table('tb_detpelatihan')->get();
        $angkatan = DB::table('tb_angkatan')->get();
        $pelatihan = DB::table('tb_pelatihan')->get();

        return view('Alumni_admin.det_pelatihan.tambah',compact('detpelatihan','angkatan','pelatihan'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detpelatihan=new detPelatihanModel();
        $detpelatihan->id_detpelatihan=$request->det_pelatihan;
        $detpelatihan->id_angkatan=$request->angkatan;
        $detpelatihan->id_pelatihan=$request->pelatihan;
        //$detpelatihan->file=$request->file;
        // $file = $request->file;
 
        // $nama_file = time()."_".$detpelatihan->getClientOriginalName();
 
        //         // isi dengan nama folder tempat kemana file diupload
        // $tujuan_upload = 'data_file';
        // $detpelatihan->move($tujuan_upload,$nama_file);
 
        // Gambar::create([
        //     'file' => $nama_file]);
        // $file->save();
         $detpelatihan->save();
        return redirect('Alumni_admin/det_pelatihan');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_detpelatihan)
    {
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_detpelatihan)
    {
        $angkatan = DB::table('tb_angkatan')->get();
        $pelatihan = DB::table('tb_pelatihan')->get();
        $det_pelatihan = DB::table('tb_detpelatihan')
        ->join('tb_angkatan','tb_angkatan.id_angkatan','=','tb_detpelatihan.id_angkatan')
        ->join('tb_pelatihan','tb_pelatihan.id_pelatihan','=','tb_pelatihan.id_pelatihan')
        ->select('tb_detpelatihan.id_detpelatihan','tb_angkatan.id_angkatan','tb_pelatihan.id_pelatihan')
        ->where('id_detpelatihan',$id_detpelatihan)->get();
        return view('Alumni_admin.det_pelatihan.edit',compact('det_pelatihan','angkatan','pelatihan'));


        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pelatihan)
    {
        DB::table('tb_detpelatihan')->where('id_detpelatihan',$request->id_detpelatihan)->update([
            'id_angkatan'=>$request->angkatan,
            'id_pelatihan'=>$reques->pelatihan
        ]);
        return redirect('detpelatihan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pelatihan)
    {
        DB::table('tb_detpelatihan')->where('id_detpelatihan',$id_detpelatihan)->delete();
        return redirect('detpelatihan');

    }
}
