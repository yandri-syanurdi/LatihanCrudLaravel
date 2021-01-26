<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
   
    public function insert(Request $request)
    {
        DB::table('artikel')->insert([
            'title'=>$request['title'],
            'detail'=>$request['summernote'],
        ]);
        return back();
    }

    public function artikel()
    {
        // $data=DB::table('artikel')->get();
        // return view('artikel.view', compact('data'));

        $data=\App\Artikel::all();
        return view('artikel.view',compact('data'));
    }

    public function read($id)
    {
        $data=DB::table('artikel')->where('id',$id)->first();
        return view('artikel.read',compact('data'));
    }

    public function delete($id)
    {
        DB::table('artikel')->where('id',$id)->delete();
        return back();
    }

    public function edit($id)
    {
        $data=DB::table('artikel')->where('id',$id)->first();
        return view('artikel.edit',compact('data'));
    }

    public function update(Request $request)
    {
        DB::table('artikel')->where('id',$request['id'])->update([
            'title'=>$request['title'],
            'detail'=>$request['summernote'],
        ]);
        //return back();
        return redirect('/artikel')->with('sukses', 'Data berhasil diupdate');
    }
}
