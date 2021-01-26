<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alquran;
use DB;

class AlquranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Alquran::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('alquran.view',compact('file'));

        if($request->has('cari')){
            $data=new Alquran;
            $batas = auth()->user()->id;
            // $file = DB::table('daftar_ayat')->where('penggalan_ayat','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $file = DB::table('daftar_ayat')->where('penggalan_ayat','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Alquran;
                $batas = auth()->user()->id;
                // $file = DB::table('daftar_ayat')->where('penggalan_ayat','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $file = DB::table('daftar_ayat')->where('penggalan_ayat','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Alquran;
                $batas = auth()->user()->id;
                // $file = DB::table('daftar_ayat')->where('user_id', $batas)->latest()->paginate($request->entri);
                $file = DB::table('daftar_ayat')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Alquran;
            $batas = auth()->user()->id;
            // $file = DB::table('daftar_ayat')->where('user_id', $batas)->latest()->paginate(5);
            $file = DB::table('daftar_ayat')->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('alquran.view',compact('file','keluar'));
    }


    public function indexku(Request $request)
    {
        $file=\App\Alquran::all();
        // $data_siswa = \App\Siswa::all();
        return view('alquran.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'gambar_ayat' => 'mimes:jpeg,png,jpg',
            'video_terjemahan' => 'mimes:mp4,3gp,avi,mkv',
            
        ]);

        // return view('image.create');
        // return $request;
        $data=new Alquran;

        // if($request->file('image')){
        //     $file=$request->file('image');
        //     $filename=time().'.'.$file->getClientOriginalExtension();
        //     $request->image->move('storage/image/',$filename);

        //     $data->image= $filename;
        // }

        if($request->file('gambar_ayat') && $request->file('video_terjemahan')){
            $filea=$request->file('gambar_ayat');
            $fileb=$request->file('video_terjemahan');
            $filenamea=time().'.'.$filea->getClientOriginalExtension();
            $filenameb=time().'.'.$fileb->getClientOriginalExtension();
            $request->gambar_ayat->move('storage/alquran/image/',$filenamea);
            $request->video_terjemahan->move('storage/alquran/video/',$filenameb);

            $data->gambar_ayat= $filenamea;
            $data->video_terjemahan= $filenameb;
        }



        $data->penggalan_ayat=$request->penggalan_ayat;
        $data->terjemahan=$request->terjemahan;
        $data->urutan_penggalan=$request->urutan_penggalan;
        $data->urutan_ayat=$request->urutan_ayat;
        $data->nama_surat=$request->nama_surat;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/alquran')->with('sukses', 'Data berhasil diinput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           
            'gambar_ayat' => 'mimes:jpeg,png,jpg',
            'video_terjemahan' => 'mimes:mp4,3gp,avi,mkv',
            
        ]);

         $data=new Alquran;
        // return $request;
         if($request->file('gambar_ayat') && $request->file('video_terjemahan')){
            $filea=$request->file('gambar_ayat');
            $fileb=$request->file('video_terjemahan');
            $filenamea=time().'.'.$filea->getClientOriginalExtension();
            $filenameb=time().'.'.$fileb->getClientOriginalExtension();
            $request->gambar_ayat->move('storage/alquran/image/',$filenamea);
            $request->video_terjemahan->move('storage/alquran/video/',$filenameb);

            $data->gambar_ayat= $filenamea;
            $data->video_terjemahan= $filenameb;
        }



        $data->penggalan_ayat=$request->penggalan_ayat;
        $data->terjemahan=$request->terjemahan;
        $data->urutan_penggalan=$request->urutan_penggalan;
        $data->urutan_ayat=$request->urutan_ayat;
        $data->nama_surat=$request->nama_surat;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/alquran')->with('sukses', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Alquran::find($id);
        return view('alquran.details',compact('data'));
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
        return response()->download('storage/alquran/video/'.$file);
    }
    public function edit($id)
    {
        $alquran = \App\Alquran::find($id);
        return view('alquran/edit',['alquran' => $alquran]);
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
        $data = \App\Alquran::find($id);
        $data->update($request->all());

         if($request->file('gambar_ayat') && $request->file('video_terjemahan')){
            $filea=$request->file('gambar_ayat');
            $fileb=$request->file('video_terjemahan');
            $filenamea=time().'.'.$filea->getClientOriginalExtension();
            $filenameb=time().'.'.$fileb->getClientOriginalExtension();
            $request->gambar_ayat->move('storage/alquran/image/',$filenamea);
            $request->video_terjemahan->move('storage/alquran/video/',$filenameb);
            $data->gambar_ayat= $filenamea;
            $data->video_terjemahan= $filenameb;
            $data->user_id = auth()->user()->id;
            $data->save();
        }


        
        // $data->save();
        return redirect('/alquran')->with('sukses', 'Data berhasil diupdate');


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
        $alquran = \App\Alquran::find($id);

        // $siswa = Siswa::find($id);
        $alquran->delete();
        //$siswa->delete($siswa);
        return redirect('/alquran')->with('sukses', 'Data berhasil dihapus');

    }
}
