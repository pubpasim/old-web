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
        return view('tampilan.dokumentasi.tambahDok');
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
        ]);

        return redirect('dokumentasi');
    }
    public function editDok($id)
    {
        $dok = DB::table('tb_dokumentasi')->where('id_dok',$id)->get();
        return view('tampilan.dokumentasi.editDok',compact('dok'));
    }
    public function updateDok(Request $request,$id){
        $file = $request->file('foto');
            
            if($file == ""){
                $nama_file = ""; 
                    DB::table('tb_dokumentasi')->where('id_dok',$id)->update([
                    'keterangan' => $request->keterangan,         
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
