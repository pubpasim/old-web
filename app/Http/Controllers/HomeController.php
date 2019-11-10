<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jum_mh=DB::table('tb_mahasiswa')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->where('tb_statusPub.status','PUB Aktif')->count();
        $jum_alm=DB::table('tb_mahasiswa')
        ->join('tb_statusPub', 'tb_mahasiswa.id_statusPub', '=', 'tb_statusPub.id_statusPub')
        ->where('tb_statusPub.status','Alumni')->count();
        $jum=DB::table('tb_mahasiswa')->count();
        return view('tampilan.index',compact('jum_mh','jum_alm','jum'));
    }
}
