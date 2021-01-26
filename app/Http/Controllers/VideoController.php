<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Video::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('video.view',compact('file'));
        if($request->has('cari')){
            $data=new Video;
            $batas = auth()->user()->id;
            $file = DB::table('video')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);
                $data=new Video;
                $batas = auth()->user()->id;
                // $batas = auth()->user()->id;
                //$file = DB::table('image')->paginate($request->entri);
                $file = DB::table('video')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $keluar = $request->entri;
            
        }
        else if($request->has('entri')){
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);

                $data=new Video;
                // $batas = auth()->user()->id;
                $batas = auth()->user()->id;
                //$file = DB::table('image')->paginate($request->entri);
                $file = DB::table('video')->where('user_id', $batas)->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Video;
            $batas = auth()->user()->id;
            $file = DB::table('video')->where('user_id', $batas)->latest()->paginate(5);
            $keluar = $request->entri;
        }
        // return view('video.view',compact('file'));
          return view('video.view',compact('file','keluar'));
    }



    public function myindex(Request $request)
    {
        // $file=\App\Video::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('video.view',compact('file'));
        if($request->has('cari')){
            $data=new Video;
            $batas = auth()->user()->id;
            $file = DB::table('video')->where('nama','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);
                $data=new Video;
                $batas = auth()->user()->id;
                // $batas = auth()->user()->id;
                //$file = DB::table('image')->paginate($request->entri);
                $file = DB::table('video')->where('nama','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri;
            
        }
        else if($request->has('entri')){
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
                // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);

                $data=new Video;
                // $batas = auth()->user()->id;
                $batas = auth()->user()->id;
                //$file = DB::table('image')->paginate($request->entri);
                $file = DB::table('video')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Video;
            $batas = auth()->user()->id;
            $file = DB::table('video')->latest()->paginate(5);
            $keluar = $request->entri;
        }
        // return view('video.view',compact('file'));
          return view('video.myview',compact('file','keluar'));
    }


     public function indexku(Request $request)
    {
        $file=\App\Video::all();
        // $data_siswa = \App\Siswa::all();
        return view('video.view',compact('file'));
    }

        public function indexme(Request $request)
    {

        if($request->has('cari')){
            // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
            // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);

            $data=new Video;
            $batas = auth()->user()->id;
            // $file = DB::table('video')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $file = DB::table('video')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
        }
        else {

            // $data_siswa = \App\Siswa::all();
            // $data_siswa = \App\Siswa::paginate(20);
            //$data_siswa = \App\Siswa::all();
            $data=new Video;
            $batas = auth()->user()->id;
            // $file = DB::table('video')->where('user_id', $batas)->get();
            // $file = DB::table('video')->where('user_id', $batas)->latest()->paginate(5);
            $file = DB::table('video')->where('user_id', $batas)->latest()->paginate(5);
        }
        // return view('siswa.index',['data_siswa' => $data_siswa]);
        return view('video.view',compact('file'));


        // $data=new Video;
        // $batas = auth()->user()->id;
        // $file = DB::table('video')->where('user_id', $batas)->get();
        // return view('video.viewku',compact('file'));

    //     $data=new Video;
    //     $batas = auth()->user()->id;
    //     //$file=\App\Video::all();
    //     // $file = DB::table('video')->where('nama', 'tes')->get();
    //     $file = DB::table('video')->where('user_id', $batas)->get();
    //    // $fileku=\App\Video::all();
    //     //$file = \App\Video::find($request->nama="tes");
    //     // $data_siswa = \App\Siswa::all();

    //     //perubahan disini
    //     // return view('video.view',compact('file'));
    //     return view('video.viewku',compact('file'));
    //     //https://laravel.com/docs/4.2/queries
    //     //https://laravel.com/docs/4.2/queries
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'video' => 'mimes:mp4,3gp,avi,mkv',
            
        ]);

        // return view('video.create');
        // return $request;
        $data=new Video;
        if($request->file('video')){
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('storage/video/',$filename);

            $data->video= $filename;
        }
        $data->nama=$request->nama;
        $data->nama_tingkat=$request->nama_tingkat;
        $data->nama_mapel=$request->nama_mapel;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/video')->with('sukses', 'Video berhasil diinput');
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
        $data=new Video;
        if($request->file('video')){
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('storage/video/',$filename);

            $data->video= $filename;
        }
        $data->nama=$request->nama;
        $data->nama_tingkat=$request->nama_tingkat;
        $data->nama_mapel=$request->nama_mapel;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/video')->with('sukses', 'Video berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Video::find($id);
        return view('video.details',compact('data'));
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
        return response()->download('storage/video/'.$file);
    }
    public function edit($id)
    {
        $video = \App\Video::find($id);
        return view('video/edit',['video' => $video]);
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
        $data = \App\Video::find($id);
        $data->update($request->all());

        if($request->file('video')){
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('storage/video/',$filename);
            $data->user_id = auth()->user()->id;
            $data->video= $filename;
            $data->save();
        }
        // $data->save();
        return redirect('/video')->with('sukses', 'Data berhasil diupdate');


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
        $video = \App\Video::find($id);

        // $siswa = Siswa::find($id);
        $video->delete();
        //$siswa->delete($siswa);
        return redirect('/video')->with('sukses', 'Data berhasil dihapus');

    }
}
