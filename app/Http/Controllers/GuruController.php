<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;


use App\User;
use DB;
use App\Siswa;
use App\Admin;
use App\Pengguna;

class GuruController extends Controller
{
    public function profile($id)
    {
        $guru = Guru::find($id);
        return view('guru.profile', ['guru' => $guru]);
        // return view('guru.profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       
         if($request->has('cari')){
            $data=new Guru;
            $batas = auth()->user()->id;
            // $file = DB::table('guru')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $file = DB::table('guru')->where('nama','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Guru;
                $batas = auth()->user()->id;
                // $file = DB::table('guru')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $file = DB::table('guru')->where('nama','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Guru;
                $batas = auth()->user()->id;
                // $file = DB::table('guru')->where('user_id', $batas)->latest()->paginate($request->entri);
                $file = DB::table('guru')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Guru;
            $batas = auth()->user()->id;
            // $file = DB::table('guru')->where('user_id', $batas)->latest()->paginate(5);
            $file = DB::table('guru')->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('guru.view',compact('file','keluar'));
    }


    public function indexku(Request $request)
    {
        $file=\App\Guru::all();
        // $data_siswa = \App\Siswa::all();
        return view('guru.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'avatar' => 'mimes:jpeg,png,jpg',
            
        ]);

        
            $data=new Guru;
            
            $user = new \App\User;
            $user->role =  'guru';
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt('rahasia');
            $user->gambar = 'default.png';
            $user->remember_token = str_random(60);
            $user->save();


            $request->request->add(['user_id' => $user->id ]);
            $data = \App\Guru::create($request->all());
            $data->nama=$request->nama;
            $data->nama_belakang=$request->nama_belakang;
            $data->jenis_kelamin=$request->jenis_kelamin;
            $data->agama=$request->agama;
            $data->telpon=$request->telpon;
            // $data->whatsapp=$request->whatsapp;
            // $data->instagram=$request->instagram;
            // $data->facebook=$request->facebook;
            $data->suku=$request->suku;
            $data->alamat=$request->alamat;
            $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;

         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $data->avatar = $request->file('avatar')->getClientOriginalName();
            $data->save();
        }

        //insert siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());
        $siswa->nama_depan = $request->nama;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->role =  'guru';
        $siswa->jenis_kelamin=$request->jenis_kelamin;
        $siswa->agama=$request->agama;
        $siswa->suku=$request->suku;
        $siswa->alamat=$request->alamat;
        $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
        $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $siswa->save();
        return redirect('/guru')->with('sukses', 'Data berhasil diinput');
    }


    public function createku(Request $request)
    {
        $this->validate($request, [
           
            'avatar' => 'mimes:jpeg,png,jpg',
            
        ]);

        
            $data=new Guru;
            $user = new \App\User;
            $user->role =  'guru';
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt('rahasia');
            $user->gambar = 'default.png';
            $user->remember_token = str_random(60);
            $user->save();


            $request->request->add(['user_id' => $user->id ]);
            $data = \App\Guru::create($request->all());
            $data->nama=$request->nama;
            $data->nama_belakang=$request->nama_belakang;
            $data->jenis_kelamin=$request->jenis_kelamin;
            $data->agama=$request->agama;
            $data->telpon=$request->telpon;
            // $data->whatsapp=$request->whatsapp;
            // $data->instagram=$request->instagram;
            // $data->facebook=$request->facebook;
            $data->suku=$request->suku;
            $data->alamat=$request->alamat;
            $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;

         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $data->avatar = $request->file('avatar')->getClientOriginalName();
            $data->save();
        }

        //insert siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());
        $siswa->nama_depan = $request->nama;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->role =  'guru';
        $siswa->jenis_kelamin=$request->jenis_kelamin;
        $siswa->agama=$request->agama;
        $siswa->suku=$request->suku;
        $siswa->alamat=$request->alamat;
        $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
        $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $siswa->save();
        return redirect('/guru')->with('sukses', 'Data berhasil diinput');
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
           
            'avatar' => 'mimes:jpeg,png,jpg',
            
        ]);

        
            $data=new Guru;
            $user = new \App\User;
            $user->role =  'guru';
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->password = bcrypt('rahasia');
            $user->gambar = 'default.png';
            $user->remember_token = str_random(60);
            $user->save();


            $request->request->add(['user_id' => $user->id ]);
            $data = \App\Guru::create($request->all());
            $data->nama=$request->nama;
            $data->nama_belakang=$request->nama_belakang;
            $data->jenis_kelamin=$request->jenis_kelamin;
            $data->agama=$request->agama;
            $data->telpon=$request->telpon;
            // $data->whatsapp=$request->whatsapp;
            // $data->instagram=$request->instagram;
            // $data->facebook=$request->facebook;
            $data->suku=$request->suku;
            $data->alamat=$request->alamat;
            $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;

         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $data->avatar = $request->file('avatar')->getClientOriginalName();
            $data->save();
        }

        //insert siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());
        $siswa->nama_depan = $request->nama;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->role =  'guru';
        $siswa->jenis_kelamin=$request->jenis_kelamin;
        $siswa->agama=$request->agama;
        $siswa->suku=$request->suku;
        $siswa->alamat=$request->alamat;
        $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
        $siswa->avatar = $request->file('avatar')->getClientOriginalName();
        $siswa->save();
        return redirect('/guru')->with('sukses', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Guru::find($id);
        return view('guru.details',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($file)
    {
        return response()->download('images/'.$file);
    }
    public function edit($id)
    {
        $guru = \App\Guru::find($id);
        return view('guru/edit',['guru' => $guru]);
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
        $data = \App\Guru::find($id);
        $data->update($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $data->avatar = $request->file('avatar')->getClientOriginalName();
            $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            $data->telpon=$request->telpon;  
            $data->save();
        }

         $siswa =  \App\Siswa::where('user_id', $data->user_id)->update([
             'nama_depan'=>$request->nama, 
             'nama_belakang'=>$request->nama_belakang, 
             'jenis_kelamin'=>$request->jenis_kelamin, 
             'agama'=>$request->agama, 
             'alamat'=>$request->alamat, 
             'suku'=>$request->suku,
             'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
             'avatar' => $request->file('avatar')->getClientOriginalName()]);

        return redirect('/guru')->with('sukses', 'Data berhasil diupdate');

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
        $guru = \App\Guru::find($id);
        $guru->delete();
        $siswa =  \App\Siswa::where('user_id', $guru->user_id)->delete();
        $user =  \App\User::where('id', $guru->user_id)->delete();
        return redirect('/guru')->with('sukses', 'Data berhasil dihapus');
    }

}
