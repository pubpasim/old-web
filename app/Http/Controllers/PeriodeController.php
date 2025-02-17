<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PeriodeController extends Controller
{
    
    public function index()
    {
        $periode=DB::table('tb_periode')->get();
        return view('periode.index',compact('periode'));        
    }

    public function create()
    {
        return view('periode.tambah');
    }

    public function store(Request $request)
    {
        DB::table('tb_periode')->insert([
        'id_periode'=> $request->id_periode,
        'periode'=> $request->periode
        ]);
        return redirect('periode');
    }

    public function show($id)
    {
        //
    }

   public function edit($id)
    {
        $periode= DB::table('tb_periode')->where('id_periode',$id)->get();
        return view('periode.edit',compact('periode'));
    }

    public function update(Request $request)
    {

        // $this->validate($request[
        //     'jabatan' => 'required'
// ]);
        
        DB::table('tb_periode')->where('id_periode',$request->id_periode)->update([
            'periode'=>$request->periode
        ]);
        return redirect('periode');
    }

    public function destroy($id)
    {
        DB::table('tb_periode')->where('id_periode',$id)->delete();
        return redirect('periode');
    }


    public function indexIka()
    {
        $ika=DB::table('tb_periode_ika')->get();
        return view('ikatanAlumni.periodeIka',compact('ika'));        
    }

    public function createIka()
    {
        return view('ikatanAlumni.tambahIka');
    }

    public function storeIka(Request $request)
    {
        DB::table('tb_periode_ika')->insert([
        'periode'=> $request->periode
        ]);
        return redirect('periodeIka');
    }

   public function editIka($id)
    {
        $periode= DB::table('tb_periode_ika')->where('id',$id)->get();
        return view('ikatanAlumni.editIka',compact('periode','id'));
    }

    public function updateIka(Request $request,$id)
    {
        DB::table('tb_periode_ika')->where('id',$id)->update([
            'periode'=>$request->periode
        ]);
        return redirect('periodeIka');
    }

    public function destroyIka($id)
    {
        DB::table('tb_periode_ika')->where('id',$id)->delete();
        return redirect('periodeIka');
    }
}
