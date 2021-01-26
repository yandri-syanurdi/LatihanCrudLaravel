<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use DB;

class BeritaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Berita::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('berita.view',compact('file'));


        if($request->has('cari')){
            $data=new Berita;
            $batas = auth()->user()->id;
            // $file = DB::table('berita')->where('judul','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $file = DB::table('berita')->where('judul','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Berita;
                $batas = auth()->user()->id;
                // $file = DB::table('berita')->where('judul','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $file = DB::table('berita')->where('judul','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Berita;
                $batas = auth()->user()->id;
                // $file = DB::table('berita')->where('user_id', $batas)->latest()->paginate($request->entri);
                $file = DB::table('berita')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Berita;
            $batas = auth()->user()->id;
            // $file = DB::table('berita')->where('user_id', $batas)->latest()->paginate(5);
            $file = DB::table('berita')->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('berita.view',compact('file','keluar'));
    }


     public function indexku(Request $request)
    {
        $file=\App\Berita::all();
        // $data_siswa = \App\Siswa::all();
        return view('berita.view',compact('file'));
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
        $data=new Berita;
        if($request->file('video')){
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('storage/berita/',$filename);

            $data->video= $filename;
        }
        $data->judul=$request->judul;
        $data->tanggal=$request->year.'-'.$request->month.'-'.$request->day;
        $data->tempat=$request->tempat;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/berita')->with('sukses', 'Data Berita berhasil diinput');
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
        $data=new Berita;
        if($request->file('video')){
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('storage/berita/',$filename);

            $data->video= $filename;
        }
        $data->judul=$request->judul;
        $data->tanggal=$request->year.'-'.$request->month.'-'.$request->day;
        $data->tempat=$request->tempat;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/berita')->with('sukses', 'Data Berita berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Berita::find($id);
        return view('berita.details',compact('data'));
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
        return response()->download('storage/berita/'.$file);
    }
    public function edit($id)
    {
        $berita = \App\Berita::find($id);
        return view('berita/edit',['berita' => $berita]);
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
        $data = \App\Berita::find($id);
        $data->update($request->all());

        if($request->file('video')){
            $file=$request->file('video');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video->move('storage/berita/',$filename);
            $data->video= $filename;
            $data->tanggal=$request->year.'-'.$request->month.'-'.$request->day;
            $data->user_id = auth()->user()->id;
            $data->save();
        }
        // $data->save();
        return redirect('/berita')->with('sukses', 'Data berhasil diupdate');


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
        $berita = \App\Berita::find($id);

        // $siswa = Siswa::find($id);
        $berita->delete();
        //$siswa->delete($siswa);
        return redirect('/berita')->with('sukses', 'Data berhasil dihapus');

    }
}
