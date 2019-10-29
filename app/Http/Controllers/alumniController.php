<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class alumniController extends Controller
{

    public function index()
    {
        $mahasiswa = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_angkatan', 'tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_angkatan.angkatan','tb_mahasiswa.jenis_kelamin','tb_mahasiswa.tempat_lahir','tb_mahasiswa.tanggal_lahir','tb_mahasiswa.no_telp','tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status')->where('tb_statusPub.status','Alumni')->get();
        return view('tampilan.alumni.index',compact('mahasiswa'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aktivitas()
    {
        $lempar="";
        $angkatan=DB::table('tb_angkatan')->get();
        $alumniDok = DB::table('tb_alumni_dok')
        ->join('tb_angkatan', 'tb_alumni_dok.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_mahasiswa', 'tb_alumni_dok.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->select('tb_angkatan.angkatan','tb_mahasiswa.nama','tb_alumni_dok.file','tb_alumni_dok.keterangan')
        ->get();
        return view('tampilan.alumni.aktivitas',compact('alumniDok','angkatan','lempar'));
        
    }
    public function aktivitasTampil(Request $request)
    {
        $lempar=$request->select;
        $angkatan=DB::table('tb_angkatan')->get();
        $alumniDok = DB::table('tb_alumni_dok')
        ->join('tb_angkatan', 'tb_alumni_dok.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_mahasiswa', 'tb_alumni_dok.id_mahasiswa', '=', 'tb_mahasiswa.id_mahasiswa')
        ->select('tb_angkatan.angkatan','tb_mahasiswa.nama','tb_alumni_dok.file','tb_alumni_dok.keterangan')->where('tb_alumni_dok.id_angkatan',$lempar)
        ->get();
        return view('tampilan.alumni.aktivitas',compact('alumniDok','angkatan','lempar'));
        
    }
    public function index3(){
        $dr=DB::table('tb_daerah')
        ->select('tb_daerah.id_daerah','tb_daerah.kab_kot')->get();
        $skl=DB::table('tb_sekolah')
        ->select('tb_sekolah.id_sekolah','tb_sekolah.sekolah')->get();
        $sts1=DB::table('tb_statusSos')
        ->select('tb_statusSos.id_statusSos','tb_statusSos.status')->get();
        $angkt=DB::table('tb_angkatan')
        ->select('tb_angkatan.id_angkatan','tb_angkatan.angkatan')->get();
        $orgpub=DB::table('tb_orgpub')
        ->select('tb_orgpub.id_orgpub','tb_orgpub.jabatan_pub')->get();
        $orgppmb=DB::table('tb_orgppmb')
        ->select('tb_orgppmb.id_orgppmb','tb_orgppmb.jabatan')->get();
        $jur=DB::table('tb_jurusan')
        ->select('tb_jurusan.id_jur','tb_jurusan.nama_jur')->get();
        return view('tampilan.alumni.Alumni',compact('dr','skl','sts1','angkt','orgpub','orgppmb','jur'));
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
        DB::table('tb_mahasiswa')->insert([
            'nama'=>$request->Tname,'NIM'=>$request->nim,'id_daerah'=>$request->daerah,'id_angkatan'=>$request->angkatan,'id_sekolah'=>$request->skl,'id_statusSos'=>$request->spkw,'id_orgpub'=>$request->jbPUB,'id_orgppmb'=>$request->jbPPMB,'id_jur'=>$request->jurusan, 'id_statusPub'=>$request->alm
        ]);
        return redirect('lanjut/pengalaman');
    }
    
    
    public function index2()
    {

        $idmax =DB::table('tb_mahasiswa')->max('id_mahasiswa');
        return view('tampilan.alumni.lanjut',compact('idmax'));
    }

    
    public function strukturOrgAlumni()
    {
        $struk = DB::table('tb_ikatan_alumni')
        ->join('tb_orgalumni','tb_orgalumni.id_org','tb_ikatan_alumni.id_jabatan')
        ->join('tb_mahasiswa','tb_mahasiswa.id_mahasiswa','tb_ikatan_alumni.id_mahasiswa')
        ->join('tb_angkatan','tb_angkatan.id_angkatan','tb_mahasiswa.id_angkatan')
        ->get();
        return view('ikatanAlumni.struktur',compact('struk'));
    }
    public function tambahStrukAlumni()
    {
        $mhs=DB::table('tb_mahasiswa')
        ->join('tb_angkatan','tb_angkatan.id_angkatan','tb_mahasiswa.id_angkatan')
        ->where('id_statusPub',2)
        ->orderby('angkatan','ASC')
        ->orderby('nama','ASC')        
        ->get();
        $jab=DB::table('tb_orgalumni')->get();
        return view('ikatanAlumni.tambahStruktur',compact('mhs','jab'));
    }
    public function storeStrukAlumni(Request $request)
    {
     DB::table('tb_ikatan_alumni')
     ->insert([
        'id_mahasiswa' => $request->id_mahasiswa,
        'id_jabatan' => $request->jabatan,
        'masa_bakti' => $request->masa_bakti,
    ]);

     return redirect('strukturOrgAlumni');
 }
 
public function tambahInfaq()
{
    $bulan=DB::table('tb_bulan')->get();
    $angkatan=DB::table('tb_angkatan')->orderby('angkatan')->get();
    return view('tampilan.alumni.tambahInfaq',compact('angkatan','bulan'));
}
public function simpanInfaq(Request $request)
{
    $bln=DB::table('tb_bulan')->get();
    $bl=$bln->id_bulan;
    $jm=DB::table('tb_infaq')
    ->where('tahun_infaq',$request->tahun)
    ->where('bulan_infaq',$request->bulan)
    ->count();
    if($jm>0){
        return redirect('tambahInfaq')->with('alert','Data tersebut sudah di inputkan!');
    }else{
        DB::table('tb_infaq')->insert([
            'id_bulan'=>$bl,
            'bulan_infaq'=>$request->bulan,
            'tahun_infaq'=>$request->tahun,
            'total_infaq'=>$request->total
        ]);
        $idmax =DB::table('tb_mahasiswa')->max('id_mahasiswa');
        return redirect('infaq');
    }
}


public function updateStrukAlumni(Request $request,$id){

    DB::table('tb_ikatan_alumni')
    ->where('id_ikatan',$id)
    ->update([
        'id_mahasiswa' => $request->id_mahasiswa,
        'id_jabatan' => $request->jabatan,
        'masa_bakti' => $request->masa_bakti,
    ]);
    return redirect('strukturOrgAlumni');
}


public function infaq_view()
{
    $infaq=DB::table('tb_infaq')->get();
    return view('tampilan.alumni.infaq',compact('infaq'));
}
public function editInfaq($id)
{
    $bulan=DB::table('tb_bulan')->get();
    $infaq=DB::table('tb_infaq')->where('id_infaq',$id)->first();
    return view('tampilan.alumni.editInfaq',compact('infaq','bulan'));
}
public function updateInfaq(Request $request,$id)
{
    DB::table('tb_infaq')->where('id_infaq',$id)->update([
        'bulan_infaq'=>$request->bulan,'tahun_infaq'=>$request->tahun,'total_infaq'=>$request->total
    ]);
    return redirect('infaq');
}
public function hapusInfaq($id)
{
    DB::table('tb_infaq')->where('id_infaq',$id)->delete();
    return redirect('infaq');
}


public function editStrukAlumni($id)
{
    $tamp = DB::table('tb_ikatan_alumni')->where('id_ikatan',$id)->get();
    $mhs=DB::table('tb_mahasiswa')
    ->join('tb_angkatan','tb_angkatan.id_angkatan','tb_mahasiswa.id_angkatan')
    ->where('id_statusPub',2)
    ->orderby('angkatan','ASC')
    ->orderby('nama','ASC') 
    ->get();
    $jab=DB::table('tb_orgalumni')->get();

    return view('ikatanAlumni.editStruktur',compact('tamp','mhs','jab'));
}

public function legalitasAdmin()
{
    $leg =DB::table('tb_legalitas')->get();
    return view('ikatanAlumni.legalitasAdmin',compact('leg'));
}

public function tambahLegalitasAdmin()
{
    return view('ikatanAlumni.tambahLegalitasAdmin');
}
public function storeLegalitasAdmin(Request $request)
{
    $file = $request->file('foto');
    $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'imgs';
    $file->move($tujuan_upload,$nama_file);

    DB::table('tb_legalitas')
    ->insert([
        'foto' => $nama_file,            
        'keterangan' => $request->keterangan,                        
    ]);

    return redirect('legalitasAdmin');
}
public function hapusLegalitasAdmin($id)
{
    DB::table('tb_legalitas')->where('id',$id)->delete();
    return redirect('legalitasAdmin');

}


public function hapusStrukAlumni($id)
{
    DB::table('tb_ikatan_alumni')->where('id_ikatan',$id)->delete();
    return redirect('strukturOrgAlumni');

}


public function kegiatanAlumni()
{
    $dok =DB::table('tb_dok_alumni')
    ->get();
    return view('ikatanAlumni.kegiatanAlumni',compact('dok'));
}


public function tambahDokAlumni()
{
    return view('ikatanAlumni.tambahDokAlumni');
}
public function storeDokAlumni(Request $request)
{
    $file = $request->file('foto');
    $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
    $tujuan_upload = 'imgs';
    $file->move($tujuan_upload,$nama_file);

    DB::table('tb_dok_alumni')
    ->insert([
        'foto' => $nama_file,            
        'keterangan' => $request->keterangan,                        
    ]);

    return redirect('kegiatanAlumni');
}
public function editDokAlumni($id)
{
    $dok = DB::table('tb_dok_alumni')->where('id',$id)->get();
    return view('ikatanAlumni.editDokAlumni',compact('dok'));
}
public function updateDokAlumni(Request $request,$id){
    $file = $request->file('foto');

    if($file == ""){
        $nama_file = ""; 
        DB::table('tb_dok_alumni')->where('id',$id)->update([
            'keterangan' => $request->keterangan,         
        ]);   

    }else{

        $nama_file = time()."_".$file->getClientOriginalName();

                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'imgs';
        $file->move($tujuan_upload,$nama_file);


        DB::table('tb_dok_alumni')->where('id',$id)->update([
            'foto' => $nama_file,
            'keterangan' => $request->keterangan,                      
        ]);   
    }

    return redirect('kegiatanAlumni');
}

public function hapusDokAlumni($id)
{
    DB::table('tb_dok_alumni')->where('id',$id)->delete();
    return redirect('kegiatanAlumni');

}
}
