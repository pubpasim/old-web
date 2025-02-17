<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ppmbDokController extends Controller
{
    public function dokumentasi()
    {
        $dok = DB::table('tb_dokumentasi')->get();
        return view('tampilan.dokumentasi.dokumentasi',compact('dok'));
    }
    public function tambahDok()
    {
        $tahun = DB::table('tb_tahunsel')->get();
        return view('tampilan.dokumentasi.tambahDok',compact('tahun'));
    }
    public function storeDok(Request $request)
    {
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
         
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'imgs';
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_dokumentasi')
        ->insert([
            'foto' => $nama_file,            
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'id_tahun' => $request->id_tahun,
        ]);

        return redirect('dokumentasi');
    }
    public function editDok($id)
    {
        $tahun = DB::table('tb_tahunsel')->get();
        $dok = DB::table('tb_dokumentasi')->where('id_dok',$id)->get();
        return view('tampilan.dokumentasi.editDok',compact('dok','tahun'));
    }
    public function updateDok(Request $request,$id){
        $file = $request->file('foto');
            
            if($file == ""){
                $nama_file = ""; 
                    DB::table('tb_dokumentasi')->where('id_dok',$id)->update([
                    'keterangan' => $request->keterangan,
                    'kategori' => $request->kategori,
                    'id_tahun' => $request->id_tahun,         
                ]);   
            }
            else{

                $nama_file = time()."_".$file->getClientOriginalName();
         
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'imgs';
                $file->move($tujuan_upload,$nama_file);


                DB::table('tb_dokumentasi')->where('id_dok',$id)->update([
                    'foto' => $nama_file,
                    'keterangan' => $request->keterangan,
                    'kategori' => $request->kategori,
                    'id_tahun' => $request->id_tahun,         
                ]);   
            }

            return redirect('dokumentasi');
    }

    public function hapusDok($id)
    {
            DB::table('tb_dokumentasi')->where('id_dok',$id)->delete();
            return redirect('dokumentasi');
        
    }

}
