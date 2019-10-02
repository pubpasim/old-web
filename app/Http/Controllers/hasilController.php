<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class hasilController extends Controller
{
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
     public function storeTPA(Request $request,$id)
    {

    	$jml_gagal = $request->jml_peserta - $request->jml_lulus;
        DB::table('tb_tpa')->where('id_tahun',$id)->insert([
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
    	$psi = DB::table('tb_psikotest')->where('id_tahun2',$id)->get();

    	$lus = DB::table('tb_psikotest')->where('jenis','LULUS')->count();
    	$dir = DB::table('tb_psikotest')->count();
        return view('tampilan.psikotes.psikotes',compact('psi','id','lus','dir'));
    }
    public function tambahPsi($id)
    {
    	return view('tampilan.psikotes.tambahPsi',compact('id'));
    }
    public function storePsikotes(Request $request,$id)
    {

        DB::table('tb_psikotest')->where('id_tahun',$id)->insert([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,
            'jenis' => $request->jenis,
            'id_tahun2' => $id,
        ]);
        return redirect('dataPsikotes/'.$id);
    }

    public function hapusPsi($id)
    {
    	DB::table('tb_psikotest')->where('id_psi',$id)->delete();
        return redirect('dataPsikotes/'.$id);
    }

    public function editPsi($idx)
    {
    	$x = DB::table('tb_psikotest')->where('id_psi',$idx)->first();
    	$id = $x->id_tahun2;
    	$psi = DB::table('tb_psikotest')->where('id_psi',$idx)->get();
        return view('tampilan.psikotes.editPsi',compact('psi','id'));
    }
    public function updatePsi(Request $request,$id)
    {

        DB::table('tb_psikotest')->where('id_psi',$request->id_psi)->update([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,
            'jenis' => $request->jenis,
        ]);
        return redirect('dataPsikotes/'.$id);
    }

    public function dataSurvei($id)
    {
    	$survei = DB::table('tb_survei')->where('id_tahun3',$id)->get();

    	$lus = DB::table('tb_survei')->where('status','LULUS')->count();
    	$dir = DB::table('tb_survei')->count();
        return view('tampilan.survei.survei',compact('survei','id','lus','dir'));
    }
    public function tambahSurvei($id)
    {
    	return view('tampilan.survei.tambahSurvei',compact('id'));
    }
    public function storeSurvei(Request $request,$id)
    {

        DB::table('tb_survei')->where('id_tahun3',$id)->insert([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,
            'status' => $request->jenis,
            'id_tahun3' => $id,
        ]);
        return redirect('dataSurvei/'.$id);
    }

    public function hapusSurvei($id)
    {
    	DB::table('tb_survei')->where('id_survei',$id)->delete();
        return redirect('dataSurvei/'.$id);
    }

    public function editSurvei($idx)
    {
    	$x = DB::table('tb_survei')->where('id_survei',$idx)->first();
    	$id = $x->id_tahun3;
    	$survei = DB::table('tb_survei')->where('id_survei',$idx)->get();
        return view('tampilan.survei.editSurvei',compact('survei','id'));
    }
    public function updateSurvei(Request $request,$id)
    {

        DB::table('tb_survei')->where('id_survei',$request->id_survei)->update([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,
            'status' => $request->jenis,
        ]);
        return redirect('dataSurvei/'.$id);
    }
    
    public function dataFinal($id)
    {
    	$final = DB::table('tb_final')->where('id_tahun4',$id)->get();

    	$lus = DB::table('tb_final')->where('status','LULUS')->count();
    	$dir = DB::table('tb_final')->count();
        return view('tampilan.final.final',compact('final','id','lus','dir'));
    }
    public function tambahFinal($id)
    {
    	return view('tampilan.final.tambahFinal',compact('id'));
    }
    public function storeFinal(Request $request,$id)
    {

        DB::table('tb_final')->where('id_tahun4',$id)->insert([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,
            'status' => $request->jenis,
            'id_tahun4' => $id,
        ]);
        return redirect('dataFinal/'.$id);
    }

    public function hapusFinal($id)
    {
    	DB::table('tb_final')->where('id_final',$id)->delete();
        return redirect('dataFinal/'.$id);
    }

    public function editFinal($idx)
    {
    	$x = DB::table('tb_final')->where('id_final',$idx)->first();
    	$id = $x->id_tahun4;
    	$final = DB::table('tb_final')->where('id_final',$idx)->get();
        return view('tampilan.final.editFinal',compact('final','id'));
    }
    public function updateFinal(Request $request,$id)
    {

        DB::table('tb_final')->where('id_final',$request->id_final)->update([
            'nama_peserta' => $request->nama_peserta,
            'jk' => $request->jk,
            'jurusan' => $request->jurusan,
            'asal_sekolah' => $request->asal_sekolah,
            'asal_daerah' => $request->asal_daerah,
            'no_hp' => $request->no_hp,
            'status' => $request->jenis,
        ]);
        return redirect('dataFinal/'.$id);
    }

}
