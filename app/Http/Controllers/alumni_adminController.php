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
    public function profile(Request $request, $id)
    {
        $pendidikan2=DB::table('tb_detpendidikan')->where('id_mahasiswa',$id)->count();
        $pendidikan=DB::table('tb_detpendidikan')->where('id_mahasiswa',$id)->get();
        $pengalaman2=DB::table('tb_detpengalaman')->where('id_mahasiswa',$id)->count();
        $pengalaman=DB::table('tb_detpengalaman')->where('id_mahasiswa',$id)->get();
        $data = DB::table('tb_mahasiswa')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan', '=', 'tb_angkatan.id_angkatan')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.tanggal_lahir','tb_mahasiswa.tempat_lahir','tb_mahasiswa.jenis_kelamin','tb_mahasiswa.no_telp','tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_angkatan.angkatan','tb_angkatan.nama_angkatan','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status','tb_mahasiswa.file')
        ->where('tb_mahasiswa.id_mahasiswa',$id)->first();
        return view('Alumni_admin.profil',compact('data','pendidikan2','pendidikan','pengalaman','pengalaman2'));
    }
    public function tambahPnd($id)
    {
        $data=DB::table('tb_mahasiswa')->where('id_mahasiswa',$id)->first();
        return view('Alumni_admin.tambahPnd',compact('id','data'));
    }
    public function simpanPnd(Request $request)
    {
        DB::table('tb_detpendidikan')->insert([
            'id_mahasiswa'=>$request->idmhs,'universitas'=>$request->kampus,'tahun_lulus'=>
            $request->lulus,'prodi'=>$request->pddk.' '.$request->jur
        ]);
        return redirect('admin/alumni/profile/'.$request->idmhs);
    }
    public function tambahPeng($id)
    {
        $data=DB::table('tb_mahasiswa')->where('id_mahasiswa',$id)->first();
        return view('Alumni_admin.tambahPeng',compact('id','data'));
    }
    public function simpanPeng(Request $request)
    {
        $id=$request->id;
        $lama=$request->thn1.' s/d '.$request->thn2;
        DB::table('tb_detpengalaman')->insert([
            'id_mahasiswa'=>$request->id,'jabatan'=>$request->jabatan,'lama_kerja'=>$lama,'instansi'=>$request->perusahaan
        ]);
        return redirect('admin/alumni/profile/'.$id);
        //return redirect('lanjut/pengalaman');
    }
    public function editProfil($id)
    {
        $dr=DB::table('tb_daerah')
        ->select('tb_daerah.id_daerah','tb_daerah.kab_kot')->get();
        $skl=DB::table('tb_sekolah')
        ->select('tb_sekolah.id_sekolah','tb_sekolah.sekolah')->get();
        $sts1=DB::table('tb_statusSos')
        ->select('tb_statusSos.id_statusSos','tb_statusSos.status')->get();
        $sts2=DB::table('tb_statusPub')
        ->select('tb_statusPub.id_statusPub','tb_statusPub.status')->get();
        $angkt=DB::table('tb_angkatan')
        ->select('tb_angkatan.id_angkatan','tb_angkatan.angkatan')->orderby('angkatan')->get();
        $orgpub=DB::table('tb_orgpub')
        ->select('tb_orgpub.id_orgpub','tb_orgpub.jabatan_pub')->get();
        $orgppmb=DB::table('tb_orgppmb')
        ->select('tb_orgppmb.id_orgppmb','tb_orgppmb.jabatan')->get();
        $jur=DB::table('tb_jurusan')
        ->select('tb_jurusan.id_jur','tb_jurusan.nama_jur')->get();
        
        $data = DB::table('tb_mahasiswa')
        ->join('tb_angkatan','tb_mahasiswa.id_angkatan','=','tb_angkatan.id_angkatan')
        ->join('tb_daerah', 'tb_mahasiswa.id_daerah', '=', 'tb_daerah.id_daerah')
        ->join('tb_sekolah', 'tb_mahasiswa.id_sekolah', '=', 'tb_sekolah.id_sekolah')
        ->join('tb_orgpub', 'tb_mahasiswa.id_orgpub', '=', 'tb_orgpub.id_orgpub')
        ->join('tb_orgppmb', 'tb_mahasiswa.id_orgppmb', '=', 'tb_orgppmb.id_orgppmb')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->join('tb_statusSos', 'tb_mahasiswa.id_statusSos', '=', 'tb_statusSos.id_statusSos')
        ->join('tb_jurusan', 'tb_mahasiswa.id_jur', '=', 'tb_jurusan.id_jur')
        ->select('tb_mahasiswa.jenis_kelamin','tb_mahasiswa.no_telp','tb_angkatan.angkatan','tb_mahasiswa.id_mahasiswa','tb_mahasiswa.nama','tb_mahasiswa.nim','tb_daerah.kab_kot', 'tb_jurusan.nama_jur', 'tb_sekolah.sekolah','tb_orgpub.jabatan_pub','tb_orgppmb.jabatan','tb_statusPub.status','tb_statusSos.status AS spkw','tb_mahasiswa.file');
        $mahasiswa=$data->where('tb_statusPub.status','PUB Aktif')->get();
        $data=$data->where('tb_mahasiswa.id_mahasiswa',$id)->first();
        return view('Alumni_admin.editProfil',compact('data','dr','skl','sts1','sts2','angkt','orgpub','orgppmb','jur'));
    }
    public function updateProfil(Request $request, $id)
    {
        if ($request->foto!="") {
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = ('imgs/mahasiswa');
            $file->move($tujuan_upload,$nama_file);
            DB::table('tb_mahasiswa')->where('id_mahasiswa',$id)->update([
                'nama'=>$request->Tname,'NIM'=>$request->nim,'id_daerah'=>$request->daerah,'id_angkatan'=>$request->angkatan,'id_sekolah'=>$request->skl,'id_statusSos'=>$request->spkw,'id_orgpub'=>$request->jbPUB,'id_orgppmb'=>$request->jbPPMB,'id_jur'=>$request->jurusan,'jenis_kelamin'=>$request->kelamin,'file'=>$nama_file,'no_telp'=>$request->no_telp
            ]);
        }else{
            DB::table('tb_mahasiswa')->where('id_mahasiswa',$id)->update([
            'nama'=>$request->Tname,'NIM'=>$request->nim,'id_daerah'=>$request->daerah,'id_angkatan'=>$request->angkatan,'id_sekolah'=>$request->skl,'id_statusSos'=>$request->spkw,'id_orgpub'=>$request->jbPUB,'id_orgppmb'=>$request->jbPPMB,'id_jur'=>$request->jurusan, 'jenis_kelamin'=>$request->kelamin,'no_telp'=>$request->no_telp
        ]);
        }
        return redirect('admin/alumni/profile/'.$request->idmhs);
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
