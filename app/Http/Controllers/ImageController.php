<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Image::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('image.view',compact('file'));

         if($request->has('cari')){
            $data=new Image;
            $batas = auth()->user()->id;
            $file = DB::table('image')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Image;
                $batas = auth()->user()->id;
                $file = DB::table('image')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Image;
                $batas = auth()->user()->id;
                $file = DB::table('image')->where('user_id', $batas)->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Image;
            $batas = auth()->user()->id;
            $file = DB::table('image')->where('user_id', $batas)->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('image.view',compact('file','keluar'));
    }


     public function indexku(Request $request)
    {
        $file=\App\Image::all();
        // $data_siswa = \App\Siswa::all();
        return view('image.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'image' => 'mimes:jpeg,png,jpg',
            
        ]);

        // return view('image.create');
        // return $request;
        $data=new Image;
        if($request->file('image')){
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/image/',$filename);

            $data->image= $filename;
        }

        // if($request->file('image') && $request->file('video')){
        //     $filea=$request->file('image');
        //     $fileb=$request->file('video');
        //     $filenamea=time().'.'.$filea->getClientOriginalExtension();
        //     $filenameb=time().'.'.$fileb->getClientOriginalExtension();
        //     $request->image->move('storage/image/',$filenamea);
        //     $request->video->move('storage/video/',$filenameb);

        //     $data->image= $filenamea;
        //     $data->video= $filenameb;
        // }



        $data->nama=$request->nama;
        $data->kategori=$request->kategori;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/image')->with('sukses', 'Image berhasil diinput');
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
        $data=new Image;
        if($request->file('image')){
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/image/',$filename);

            $data->image= $filename;
        }
        $data->nama=$request->nama;
        $data->kategori=$request->kategori;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/image')->with('sukses', 'Image berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Image::find($id);
        return view('image.details',compact('data'));
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
        return response()->download('storage/image/'.$file);
    }
    public function edit($id)
    {
        $image = \App\Image::find($id);
        return view('image/edit',['image' => $image]);
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
        $data = \App\Image::find($id);
        $data->update($request->all());

        if($request->file('image')){
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->image->move('storage/image/',$filename);
            $data->image= $filename;
            $data->user_id = auth()->user()->id;
            $data->save();
        }
        // $data->save();
        return redirect('/image')->with('sukses', 'Data berhasil diupdate');


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
        $image = \App\Image::find($id);

        // $siswa = Siswa::find($id);
        $image->delete();
        //$siswa->delete($siswa);
        return redirect('/image')->with('sukses', 'Data berhasil dihapus');

    }
}
