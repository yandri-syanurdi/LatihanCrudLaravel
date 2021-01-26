<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamus;
use DB;

class KamusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Kamus::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('kamus.view',compact('file'));

        if($request->has('cari')){
            $data=new Kamus;
            $batas = auth()->user()->id;
            // $file = DB::table('kamus')->where('b_indonesia','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $file = DB::table('kamus')->where('b_indonesia','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Kamus;
                $batas = auth()->user()->id;
                // $file = DB::table('kamus')->where('b_indonesia','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $file = DB::table('kamus')->where('b_indonesia','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Kamus;
                $batas = auth()->user()->id;
                // $file = DB::table('kamus')->where('user_id', $batas)->latest()->paginate($request->entri);
                $file = DB::table('kamus')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Kamus;
            $batas = auth()->user()->id;
            // $file = DB::table('kamus')->where('user_id', $batas)->latest()->paginate(5);
            $file = DB::table('kamus')->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('kamus.view',compact('file','keluar'));

    }

    public function indexku(Request $request)
    {
        $file=\App\Kamus::all();
        // $data_siswa = \App\Siswa::all();
        return view('kamus.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'video_isyarat' => 'mimes:mp4,3gp,avi,mkv',
            
        ]);

        // return view('video.create');
        // return $request;
        $data=new Kamus;
        if($request->file('video_isyarat')){
            $file=$request->file('video_isyarat');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video_isyarat->move('storage/kamus/',$filename);

            $data->video_isyarat= $filename;
        }
        $data->b_indonesia=$request->b_indonesia;
        $data->b_inggris=$request->b_inggris;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/kamus')->with('sukses', 'Video Kamus berhasil diinput');
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
        $data=new Kamus;
        if($request->file('video_isyarat')){
            $file=$request->file('video_isyarat');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video_isyarat->move('storage/kamus/',$filename);

            $data->video_isyarat= $filename;
        }
        $data->b_indonesia=$request->b_indonesia;
        $data->b_inggris=$request->b_inggris;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/kamus')->with('sukses', 'Video Kamus berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Kamus::find($id);
        return view('kamus.details',compact('data'));
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
        return response()->download('storage/kamus/'.$file);
    }
    public function edit($id)
    {
        $kamus = \App\Kamus::find($id);
        return view('kamus/edit',['kamus' => $kamus]);
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
        $data = \App\Kamus::find($id);
        $data->update($request->all());

        if($request->file('video_isyarat')){
            $file=$request->file('video_isyarat');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->video_isyarat->move('storage/kamus/',$filename);
            $data->video_isyarat= $filename;
            $data->user_id = auth()->user()->id;
            $data->save();
        }
        // $data->save();
        return redirect('/kamus')->with('sukses', 'Data berhasil diupdate');


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
        $kamus = \App\Kamus::find($id);

        // $siswa = Siswa::find($id);
        $kamus->delete();
        //$siswa->delete($siswa);
        return redirect('/kamus')->with('sukses', 'Data berhasil dihapus');

    }
}
