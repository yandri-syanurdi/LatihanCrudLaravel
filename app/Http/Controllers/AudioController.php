<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audio;
use DB;

class AudioController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $file=\App\Audio::all();
        // $data_siswa = \App\Siswa::all();
        return view('audio.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            //'audio' => 'mimes:MP3',
            // 'image' => 'mimes:jpeg,png,jpg',
            
        ]);

        // return view('audio.create');
        // return $request;
        $data=new Audio;
        if($request->file('audio')){
            $file=$request->file('audio');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->audio->move('storage/audio/',$filename);

            $data->audio= $filename;
        }
        $data->nama=$request->nama;
        $data->kategori=$request->kategori;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/audio')->with('sukses', 'Audio berhasil diinput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $data=new Audio;
        if($request->file('audio')){
            $file=$request->file('audio');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->audio->move('storage/audio/',$filename);

            $data->audio= $filename;
        }
        $data->nama=$request->nama;
        $data->kategori=$request->kategori;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/audio')->with('sukses', 'Audio berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Audio::find($id);
        return view('audio.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file)
    {
        // return response;
        return response()->download('storage/audio/'.$file);
    }
    public function edit($id)
    {
        $audio = \App\Audio::find($id);
        return view('audio/edit',['audio' => $audio]);
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
        $data = \App\Audio::find($id);
        $data->update($request->all());

        if($request->file('audio')){
            $file=$request->file('audio');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->audio->move('storage/audio/',$filename);
            $data->audio= $filename;
            $data->user_id = auth()->user()->id;
            $data->save();
        }
        // $data->save();
        return redirect('/audio')->with('sukses', 'Data berhasil diupdate');


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

    // public function delete($id)
    // public function delete(Siswa $siswa)
    //public function delete(Siswa $siswa)
     public function delete($id)
    {
        $audio = \App\Audio::find($id);

        // $siswa = Siswa::find($id);
        $audio->delete();
        //$siswa->delete($siswa);
        return redirect('/audio')->with('sukses', 'Data berhasil dihapus');

    }
}
