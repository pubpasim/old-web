<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class hasilController extends Controller
{
    public function uploadFormulir()
    {
        $formulir = DB::table('tb_formulir')->get();
        return view('tampilan.dokumen.uploadFormulir',compact('formulir'));
    }
    public function tambahFormulir()
    {
        return view('tampilan.dokumen.tambahFormulir');
    }
    public function storeFormulir(Request $request)
    {
        $file = $request->file('dokumen');
        $nama_file = time()."_".$file->getClientOriginalName();
         
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'file';
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_formulir')
        ->insert([
            'dokumen' => $nama_file,            
            'keterangan' => $request->keterangan,                       
        ]);

        return redirect('uploadFormulir');
    }
    public function hapusFormulir($id)
    {
        
        DB::table('tb_formulir')->where('id',$id)->delete();
        return redirect('uploadFormulir');
    }


    public function tambahTahun()
    {
        return view('tampilan.hasilSeleksi.tambahTahun');
    }
    public function storeTahun(Request $request)
    {
        DB::table('tb_tahunsel')->insert([
            'id' => $request->id,
            'tahun' => $request->tahun,
        ]);
        return redirect('hasilSeleksi');
    }

    public function hasil()
    {
    	$tpa="";
    	$lempar="";
    	$tahun = DB::table('tb_tahunSel')->get();
        return view('tampilan.hasilSeleksi.tahun_seleksi',compact('tahun','lempar','tpa'));
    }
    public function hasil2(Request $request)
    {
    	$tpa="";
 		$lempar = $request->tahun;
    	$tahun = DB::table('tb_tahunSel')->get();
        return view('tampilan.hasilSeleksi.tahun_seleksi',compact('tahun','lempar','tpa'));
    }
    public function dataTPA($id)
    {	
    	$tpa = DB::table('tb_tpa')->where('id_tahun',$id)->get();
        return view('tampilan.tpa.tpa',compact('tpa','id'));
    }
    public function tambahTPA($id)
    {

        return view('tampilan.tpa.tambahTPA',compact('id'));
    }
    public function lulusTPA($id)
    {
        $lulus = DB::table('tb_tpa')->where('id_tpa',$id)->first();
        $tpa = DB::table('tb_lulus_tpa')->where('fk_tpa',$id)->get();
        $back = $lulus->id_tahun;
        return view('tampilan.tpa.lulusTPA',compact('id','tpa','back'));
    }
    public function tambahLulusTPA($id)
    {
        return view('tampilan.tpa.tambahLulusTPA',compact('id'));
    }
    public function storeLulusTPA(Request $request,$id)
    {

        $x = DB::table('tb_tpa')->where('id_tpa',$id)->first();
        DB::table('tb_lulus_tpa')->insert([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'daerah' => $request->daerah,
            'sekolah' => $request->sekolah,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'fk_tpa' => $id,
            
        ]);
        return redirect('lulusTPA/'.$id);
    }

    public function editLulusTPA($id)
    {
        $tpa = DB::table('tb_lulus_tpa')->where('id_lulus',$id)->get();
        return view('tampilan.tpa.editLulusTPA',compact('id','tpa'));
    }

    public function updateLulusTPA(Request $request,$id)
    {

        $x = DB::table('tb_lulus_tpa')->where('id_lulus',$id)->first();

        DB::table('tb_lulus_tpa')->where('id_lulus',$id)->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'daerah' => $request->daerah,
            'sekolah' => $request->sekolah,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'fk_tpa' => $x->fk_tpa,
            
        ]);
        
        return redirect('lulusTPA/'.$x->fk_tpa);
    }
    public function hapusLulusTPA($id)
    {
        $x = DB::table('tb_lulus_tpa')->where('id_lulus',$id)->first();
        DB::table('tb_lulus_tpa')->where('id_lulus',$id)->delete();
        return redirect('lulusTPA/'.$x->fk_tpa);
    }

     public function storeTPA(Request $request,$id)
    {

    	$jml_gagal = $request->jml_peserta - $request->jml_lulus;
        DB::table('tb_tpa')->where('id_tahun',$id)->insert([
            'daerah' => $request->daerah,
            'sekolah' => $request->sekolah,
            'jml_peserta' => $request->jml_peserta,
            'jml_lulus' => $request->jml_lulus,
            'jml_gagal' => $jml_gagal,
            'id_tahun' => $id,
        ]);
        return redirect('dataTPA/'.$id);
    }
    public function editTPA($idx)
    {
    	$x = DB::table('tb_tpa')->where('id_tpa',$idx)->first();
    	$id = $x->id_tahun;
    	$tpa = DB::table('tb_tpa')->where('id_tpa',$idx)->get();
        return view('tampilan.tpa.editTPA',compact('tpa','id'));
    }
    public function updateTPA(Request $request,$id)
    {
    	$jml_gagal = $request->jml_peserta - $request->jml_lulus;
        DB::table('tb_tpa')->where('id_tpa',$request->id_tpa)->update([
            'daerah' => $request->daerah,
            'sekolah' => $request->sekolah,
            'jml_peserta' => $request->jml_peserta,
            'jml_lulus' => $request->jml_lulus,
            'jml_gagal' => $jml_gagal,
        ]);
        return redirect('dataTPA/'.$id);
    }
    public function hapusTPA($id)
    {
    	DB::table('tb_tpa')->where('id_tpa',$id)->delete();
        return redirect('dataTPA/'.$id);
    }








    public function dataPsikotes($id)
    {
    	$psi = DB::table('tb_psikotest')
        ->select('tb_psikotest.*','tb_lulus_tpa.nama')
        ->join('tb_lulus_tpa','tb_psikotest.nama_peserta','tb_lulus_tpa.id_lulus')
        ->where('id_tahun2',$id)
        ->orderBy('tb_lulus_tpa.nama','ASC')
        ->get();
        return view('tampilan.psikotes.psikotes',compact('psi','id'));
    }
    public function tambahPsi($id)
    {

        $nama = DB::table('tb_lulus_tpa')
        ->select('tb_lulus_tpa.id_lulus','tb_lulus_tpa.sekolah','tb_lulus_tpa.nama')
        ->join('tb_tpa','tb_lulus_tpa.fk_tpa','tb_tpa.id_tpa')
        ->where('tb_tpa.id_tahun',$id)
        ->orderBy('tb_lulus_tpa.nama','ASC')
        ->get();


    	return view('tampilan.psikotes.tambahPsi',compact('nama','id'));
    }
    public function storePsikotes(Request $request,$id)
    {

        $x = DB::table('tb_psikotest')->where('nama_peserta',$request->nama_peserta)->count();
        if($x > 0){
            return redirect('dataPsikotes/'.$id)->with('alert','Data Sudah Di Inputkan');
        }
        $data = DB::table('tb_lulus_tpa')->where('id_lulus',$request->nama_peserta)->first();

        DB::table('tb_psikotest')->where('id_tahun',$id)->insert([
            'nama_peserta' => $request->nama_peserta,
            'jurusan' => $request->jurusan,

            'jk' => $data->jk,
            'tanggal' => $data->tanggal,
            'tempat' => $data->tempat,            
            'asal_sekolah' => $data->sekolah,
            'asal_daerah' => $data->daerah,
            'no_hp' => $data->no_hp,            
            'id_tahun2' => $id,
        ]);
        return redirect('dataPsikotes/'.$id);
    }

    public function hapusPsi($id)
    {
        $x = DB::table('tb_psikotest')->where('id_psi',$id)->first();
    	DB::table('tb_psikotest')->where('id_psi',$id)->delete();
        return redirect('dataPsikotes/'.$x->id_tahun2);
    }

    public function editPsi($idx)
    {

    	$x = DB::table('tb_psikotest')->where('id_psi',$idx)->first();
    	$id = $x->id_tahun2;        
    	$psi = DB::table('tb_psikotest')
        ->where('id_psi',$idx)->get();

        $nama = DB::table('tb_lulus_tpa')
        ->join('tb_psikotest','tb_lulus_tpa.id_lulus','tb_psikotest.nama_peserta')
        ->where('tb_psikotest.id_tahun2',$id)
        ->orderBy('tb_lulus_tpa.nama','ASC')
        ->get();

        return view('tampilan.psikotes.editPsi',compact('psi','id','nama'));
    }
    public function updatePsi(Request $request,$id)
    {
        DB::table('tb_psikotest')->where('id_psi',$request->id_psi)->update([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,            
        ]);
        return redirect('dataPsikotes/'.$id);
    }





    public function dataWawancaraAkhir($id)
    {
    	$survei = DB::table('tb_survei')
        ->select('tb_survei.*','tb_lulus_tpa.nama')
        ->join('tb_lulus_tpa','tb_survei.nama_peserta','tb_lulus_tpa.id_lulus')
        ->where('id_tahun3',$id)->get();    	
        return view('tampilan.survei.survei',compact('survei','id'));
    }
    public function tambahWawancaraAkhir($id)
    {
        $nama = DB::table('tb_lulus_tpa')
        ->select('tb_lulus_tpa.id_lulus','tb_lulus_tpa.sekolah','tb_lulus_tpa.nama')
        ->join('tb_tpa','tb_lulus_tpa.fk_tpa','tb_tpa.id_tpa')
        ->join('tb_psikotest','tb_lulus_tpa.id_lulus','tb_psikotest.nama_peserta')
        ->where('tb_tpa.id_tahun',$id)
        ->orderBy('tb_lulus_tpa.nama','ASC')
        ->get();
           
    	return view('tampilan.survei.tambahSurvei',compact('id','nama'));
    }
    public function storeWawancaraAkhir(Request $request,$id)
    {
        $x = DB::table('tb_survei')->where('nama_peserta',$request->nama_peserta)->count();
        if($x > 0){
            return redirect('dataWawancaraAkhir/'.$id)->with('alert','Data Sudah Di Inputkan');
        }
        $data = DB::table('tb_psikotest')->where('nama_peserta',$request->nama_peserta)->first();

        DB::table('tb_survei')->where('id_tahun3',$id)->insert([
            'nama_peserta' => $request->nama_peserta,
            
            'jk' => $data->jk,
            'tanggal' => $data->tanggal,
            'tempat' => $data->tempat,
            'jurusan' => $data->jurusan,
            'asal_sekolah' => $data->asal_sekolah,
            'asal_daerah' => $data->asal_daerah,
            'no_hp' => $data->no_hp,            
            'id_tahun3' => $id,
        ]);
        return redirect('dataWawancaraAkhir/'.$id);
    }

    public function hapusWawancaraAkhir($id)
    {
        $x = DB::table('tb_survei')->where('id_survei',$id)->first();
    	DB::table('tb_survei')->where('id_survei',$id)->delete();
        return redirect('dataWawancaraAkhir/'.$x->id_tahun3);
    }

    public function editWawancaraAkhir($idx)
    {
    	$x = DB::table('tb_survei')->where('id_survei',$idx)->first();
    	$id = $x->id_tahun3;
    	$survei = DB::table('tb_survei')->where('id_survei',$idx)->get();

        $nama = DB::table('tb_lulus_tpa')
        ->join('tb_survei','tb_lulus_tpa.id_lulus','tb_survei.nama_peserta')
        ->where('tb_survei.id_tahun3',$id)
        ->orderBy('tb_lulus_tpa.nama','ASC')
        ->get();       

        return view('tampilan.survei.editSurvei',compact('survei','id','nama'));
    }
    public function updateWawancaraAkhir(Request $request,$id)
    {

        DB::table('tb_survei')->where('id_survei',$request->id_survei)->update([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,            
        ]);
        return redirect('dataWawancaraAkhir/'.$id);
    }











    
    public function dataFinal($id)
    {   

    	$final = DB::table('tb_final')
        ->select('tb_final.*','tb_lulus_tpa.nama')
        ->join('tb_lulus_tpa','tb_final.nama_peserta','tb_lulus_tpa.id_lulus')
        ->where('id_tahun4',$id)->get();  
        return view('tampilan.final.final',compact('final','id'));
    }
    public function tambahFinal($id)
    {
        $nama = DB::table('tb_lulus_tpa')
        ->select('tb_lulus_tpa.id_lulus','tb_lulus_tpa.sekolah','tb_lulus_tpa.nama')
        ->join('tb_tpa','tb_lulus_tpa.fk_tpa','tb_tpa.id_tpa')
        ->join('tb_survei','tb_lulus_tpa.id_lulus','tb_survei.nama_peserta')
        ->where('tb_tpa.id_tahun',$id)
        ->orderBy('tb_lulus_tpa.nama','ASC')
        ->get();
       
    	return view('tampilan.final.tambahFinal',compact('id','nama'));
    }
    public function storeFinal(Request $request,$id)
    {
        $x = DB::table('tb_final')->where('nama_peserta',$request->nama_peserta)->count();
        if($x > 0){
            return redirect('dataFinal/'.$id)->with('alert','Data Sudah Di Inputkan');
        }
        
        $data = DB::table('tb_survei')->where('nama_peserta',$request->nama_peserta)->first();

        DB::table('tb_final')->where('id_tahun4',$id)->insert([
            'nama_peserta' => $request->nama_peserta,

            'jk' => $data->jk,
            'tanggal' => $data->tanggal,
            'tempat' => $data->tempat,
            'jurusan' => $data->jurusan,
            'asal_sekolah' => $data->asal_sekolah,
            'asal_daerah' => $data->asal_daerah,
            'no_hp' => $data->no_hp,            
            'id_tahun4' => $id,
        ]);

        return redirect('dataFinal/'.$id);
    }

    public function hapusFinal($id)
    {        

        $x = DB::table('tb_final')->where('id_final',$id)->first();       
    	DB::table('tb_final')->where('id_final',$id)->delete();
        return redirect('dataFinal/'.$x->id_tahun4);
    }

    public function editFinal($idx)
    {
    	$x = DB::table('tb_final')->where('id_final',$idx)->first();
    	$id = $x->id_tahun4;
    	$final = DB::table('tb_final')->where('id_final',$idx)->get();        


        $nama = DB::table('tb_lulus_tpa')
        ->join('tb_final','tb_lulus_tpa.id_lulus','tb_final.nama_peserta')
        ->where('tb_final.id_tahun4',$id)
        ->orderBy('tb_lulus_tpa.nama','ASC')
        ->get();
        return view('tampilan.final.editFinal',compact('final','id','nama'));
    }
    public function updateFinal(Request $request,$id)
    {

        DB::table('tb_final')->where('id_final',$request->id_final)->update([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,            
        ]);
        return redirect('dataFinal/'.$id);
    }

}
