<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use DB;

class DocumentController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Document::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('document.view',compact('file'));

        if($request->has('cari')){
            $data=new Document;
            $batas = auth()->user()->id;
            $file = DB::table('document')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Document;
                $batas = auth()->user()->id;
                $file = DB::table('document')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Document;
                $batas = auth()->user()->id;
                $file = DB::table('document')->where('user_id', $batas)->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Document;
            $batas = auth()->user()->id;
            $file = DB::table('document')->where('user_id', $batas)->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('document.view',compact('file','keluar'));
    }


     public function myindex(Request $request)
    {
        // $file=\App\Document::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('document.view',compact('file'));

        if($request->has('cari')){
            $data=new Document;
            $batas = auth()->user()->id;
            $file = DB::table('document')->where('nama','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Document;
                $batas = auth()->user()->id;
                $file = DB::table('document')->where('nama','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Document;
                $batas = auth()->user()->id;
                $file = DB::table('document')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Document;
            $batas = auth()->user()->id;
            $file = DB::table('document')->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('document.myview',compact('file','keluar'));
    }


     public function indexku(Request $request)
    {
        $file=\App\Document::all();
        // $data_siswa = \App\Siswa::all();
        return view('document.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'document' => 'mimes:pdf,docx,ppt,pptx,doc,xlsx',
            
        ]);

        // return view('document.create');
        // return $request;
        $data=new Document;
        if($request->file('document')){
            $file=$request->file('document');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->document->move('storage/document/',$filename);

            $data->document= $filename;
        }
        $data->nama=$request->nama;
        $data->kategori=$request->kategori;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/document')->with('sukses', 'Document berhasil diinput');
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
        $data=new Document;
        if($request->file('document')){
            $file=$request->file('document');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->document->move('storage/document/',$filename);

            $data->document= $filename;
        }
        $data->nama=$request->nama;
        $data->kategori=$request->kategori;
        $data->deskripsi=$request->deskripsi;
        $data->user_id = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/document')->with('sukses', 'Document berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Document::find($id);
        return view('document.details',compact('data'));
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
        return response()->download('storage/document/'.$file);
    }
    public function edit($id)
    {
        $document = \App\Document::find($id);
        return view('document/edit',['document' => $document]);
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
        $data = \App\Document::find($id);
        $data->update($request->all());

        if($request->file('document')){
            $file=$request->file('document');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->document->move('storage/document/',$filename);
            $data->document= $filename;
            $data->user_id = auth()->user()->id;
            $data->save();
        }
        // $data->save();
        return redirect('/document')->with('sukses', 'Data berhasil diupdate');


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
        $document = \App\Document::find($id);

        // $siswa = Siswa::find($id);
        $document->delete();
        //$siswa->delete($siswa);
        return redirect('/document')->with('sukses', 'Data berhasil dihapus');

    }
}
