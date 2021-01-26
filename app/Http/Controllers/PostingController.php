<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Post::all();
        // return view('postingan.view',compact('file'));

        if($request->has('cari')){
            $data=new Post;
            $batas = auth()->user()->id;
            $file = \App\Post::where('title','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Post;
                $batas = auth()->user()->id;
                $file = \App\Post::where('title','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Post;
                $batas = auth()->user()->id;
                $file = \App\Post::where('user_id', $batas)->latest()->paginate($request->entri);
                $keluar = $request->entri;

                // $data=new Post;
                // // $batas = auth()->user()->id;
                // $batas = auth()->user()->id;
                // //$file = DB::table('image')->paginate($request->entri);
                // $file = DB::table('posts')->latest()->paginate($request->entri);
                // $keluar = $request->entri;
            }
        else {
            $data=new Post;
            $batas = auth()->user()->id;
            $file = \App\Post::where('user_id', $batas)->latest()->paginate(5);
            $keluar = $request->entri;

            // $data=new Post;
            // $batas = auth()->user()->id;
            // $file = DB::table('posts')->latest()->paginate(5);
            // $keluar = $request->entri;
        }

          return view('postingan.view',compact('file','keluar'));
    }



    public function myindex(Request $request)
    {
        // $file=\App\Post::all();
        // return view('postingan.view',compact('file'));

        if($request->has('cari')){
            $data=new Post;
            $batas = auth()->user()->id;
            $file = \App\Post::where('title','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Post;
                $batas = auth()->user()->id;
                $file = \App\Post::where('title','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Post;
                $batas = auth()->user()->id;
                // $batas = "";
                $file = \App\Post::latest()->paginate($request->entri);
                $keluar = $request->entri;

                // $data=new Post;
                // // $batas = auth()->user()->id;
                // $batas = auth()->user()->id;
                // //$file = DB::table('image')->paginate($request->entri);
                // $file = DB::table('posts')->latest()->paginate($request->entri);
                // $keluar = $request->entri;
            }
        else {
            $data=new Post;
            $batas = auth()->user()->id;
            // $batas = "";
            $file = \App\Post::latest()->paginate(5);
            $keluar = $request->entri;

            // $data=new Post;
            // $batas = auth()->user()->id;
            // $file = DB::table('posts')->latest()->paginate(5);
            // $keluar = $request->entri;
        }

          return view('postingan.myview',compact('file','keluar'));
    }


     public function indexku(Request $request)
    {
        $file=\App\Post::all();
        return view('postingan.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'thumbnail' => 'mimes:jpeg,png,jpg',
            
        ]);

        $data=new Post;
        if($request->file('thumbnail')){
            $file=$request->file('thumbnail');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->thumbnail->move('storage/photos/2/',$filename);

            $data->thumbnail= $filename;
        }

        $data->title=$request->title;
        $data->content=$request->content;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/postingan')->with('sukses', 'Image berhasil diinput');
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
           
            'thumbnail' => 'mimes:jpeg,png,jpg',
            
        ]);

        $data=new Post;
        if($request->file('thumbnail')){
            $file=$request->file('thumbnail');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->thumbnail->move('storage/photos/2/',$filename);

            $data->thumbnail= $filename;
        }

        $data->title=$request->nama;
        $data->content=$request->content;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/postingan')->with('sukses', 'Image berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Post::find($id);
        return view('postingan.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file)
    {
      
        return response()->download('storage/photos/2/'.$file);
    }
    public function edit($id)
    {
        $postingan = \App\Post::find($id);
        return view('postingan/edit',['postingan' => $postingan]);
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
        $data = \App\Post::find($id);
        $data->update($request->all());

        if($request->file('thumbnail')){
            $file=$request->file('thumbnail');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->thumbnail->move('storage/photos/2/',$filename);
            $data->thumbnail= $filename;
            $data->save();
        }
        // $data->save();
        return redirect('/postingan')->with('sukses', 'Data berhasil diupdate');


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

   
     public function delete($id)
    {
        $postingan = \App\Post::find($id);
        $postingan->delete();
        return redirect('/postingan')->with('sukses', 'Data berhasil dihapus');

    }
}
