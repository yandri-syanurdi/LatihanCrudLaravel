<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;

class EventController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Event::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('event.view',compact('file'));

         if($request->has('cari')){
            $data=new Event;
            $batas = auth()->user()->id;
            $file = DB::table('event')->where('acara','LIKE','%'.$request->cari.'%')->where('id_user', $batas)->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Event;
                $batas = auth()->user()->id;
                $file = DB::table('event')->where('acara','LIKE','%'.$request->cari.'%')->where('id_user', $batas)->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Event;
                $batas = auth()->user()->id;
                $file = DB::table('event')->where('id_user', $batas)->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Event;
            $batas = auth()->user()->id;
            $file = DB::table('event')->where('id_user', $batas)->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('event.view',compact('file','keluar'));
    }


    public function indexku(Request $request)
    {
        $file=\App\Event::all();
        // $data_siswa = \App\Siswa::all();
        return view('event.view',compact('file'));
    }


    public function myindex(Request $request)
    {
        // $file=\App\Event::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('event.myview',compact('file'));


         if($request->has('cari')){
            $data=new Event;
            $batas = auth()->user()->id;
            $file = DB::table('event')->where('acara','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Event;
                $batas = auth()->user()->id;
                $file = DB::table('event')->where('acara','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Event;
                $batas = auth()->user()->id;
                $file = DB::table('event')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Event;
            $batas = auth()->user()->id;
            $file = DB::table('event')->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('event.myview',compact('file','keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'brosur' => 'mimes:jpeg,png,jpg',
            
        ]);

        // return view('event.create');
        // return $request;
        $data=new Event;
        if($request->file('brosur')){
            $file=$request->file('brosur');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->brosur->move('storage/event/',$filename);

            $data->brosur= $filename;
        }
        $data->acara=$request->acara;
        $data->tanggal_mulai=$request->yeara.'-'.$request->montha.'-'.$request->daya;
        $data->tanggal_selesai=$request->yearb.'-'.$request->monthb.'-'.$request->dayb;
        $data->lokasi=$request->lokasi;
        $data->kegiatan=$request->kegiatan;
        $data->kontak=$request->kontak;
        $data->id_user = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/event')->with('sukses', 'Event berhasil diinput');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Event;
        if($request->file('brosur')){
            $file=$request->file('brosur');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->brosur->move('storage/event/',$filename);

            $data->brosur= $filename;
        }
        $data->acara=$request->acara;
        $data->tanggal_mulai=$request->yeara.'-'.$request->montha.'-'.$request->daya;
        $data->tanggal_selesai=$request->yearb.'-'.$request->monthb.'-'.$request->dayb;
        $data->lokasi=$request->lokasi;
        $data->kegiatan=$request->kegiatan;
        $data->kontak=$request->kontak;
        $data->id_user = auth()->user()->id;
        $data->save();
        // return redirect()->back();
        return redirect('/event')->with('sukses', 'Event berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Event::find($id);
        return view('event.details',compact('data'));
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
        return response()->download('storage/event/'.$file);
    }
    public function edit($id)
    {
        $event = \App\Event::find($id);
        return view('event/edit',['event' => $event]);
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
        $data = \App\Event::find($id);
        $data->update($request->all());

        if($request->file('brosur')){
            $file=$request->file('brosur');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->brosur->move('storage/event/',$filename);
            $data->brosur= $filename;
            $data->tanggal_mulai=$request->yeara.'-'.$request->montha.'-'.$request->daya;
            $data->tanggal_selesai=$request->yearb.'-'.$request->monthb.'-'.$request->dayb;
            $data->id_user = auth()->user()->id;
            $data->save();
        }
        // $data->save();
        return redirect('/event')->with('sukses', 'Data berhasil diupdate');


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
        $event = \App\Event::find($id);

        // $siswa = Siswa::find($id);
        $event->delete();
        //$siswa->delete($siswa);
        return redirect('/event')->with('sukses', 'Data berhasil dihapus');

    }
}
