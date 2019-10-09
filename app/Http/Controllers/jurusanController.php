<?php

namespace App\Http\Controllers;
use App\jurusanModel;
use Illuminate\Http\Request;

class jurusanController extends Controller
{
     /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jur=jurusanModel::all();
        return view('tampilan/jurusan/viewjur',compact('jur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tampilan/jurusan/createjur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jur=new jurusanModel();
        $jur->nama_jur=$request->nama_jur;
        $jur->save();
        return redirect('tampilan/jurusan/viewjur');
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
        $jur=jurusanModel::where('id_jur',$id)->get();
        return view('tampilan/jurusan/editjur',compact('jur'));
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
        $jur=jurusanModel::where('id_jur',$id)->update(['nama_jur'=>$request->nama_jur]);
        return redirect('tampilan/jurusan/viewjur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jur=jurusanModel::where('id_jur',$id)->delete();
        return redirect('tampilan/jurusan/viewjur');
    }
}
