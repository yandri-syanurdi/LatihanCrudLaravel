<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Siswa;
use App\Guru;
use App\Admin;
use App\Pengguna;

class AdminController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $file=\App\Admin::all();
        // // $data_siswa = \App\Siswa::all();
        // return view('admin.view',compact('file'));


         if($request->has('cari')){
            $data=new Admin;
            $batas = auth()->user()->id;
            // $file = DB::table('admin')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate(5);
            $file = DB::table('admin')->where('nama','LIKE','%'.$request->cari.'%')->paginate(5);
            $keluar = $request->entri;
        }
        else if($request->has('cari') && $request->has('entri')){
                $data=new Admin;
                $batas = auth()->user()->id;
                // $file = DB::table('admin')->where('nama','LIKE','%'.$request->cari.'%')->where('user_id', $batas)->paginate($request->entri);
                $file = DB::table('admin')->where('nama','LIKE','%'.$request->cari.'%')->paginate($request->entri);
                $keluar = $request->entri; 
        }
        else if($request->has('entri')){
                $data=new Admin;
                $batas = auth()->user()->id;
                // $file = DB::table('admin')->where('user_id', $batas)->latest()->paginate($request->entri);
                $file = DB::table('admin')->latest()->paginate($request->entri);
                $keluar = $request->entri;
            }
        else {
            $data=new Admin;
            $batas = auth()->user()->id;
            // $file = DB::table('admin')->where('user_id', $batas)->latest()->paginate(5);
            $file = DB::table('admin')->latest()->paginate(5);
            $keluar = $request->entri;
        }
          return view('admin.view',compact('file','keluar'));
    }


    public function indexku(Request $request)
    {
        $file=\App\Admin::all();
        // $data_siswa = \App\Siswa::all();
        return view('admin.view',compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
           
            'profile' => 'mimes:jpeg,png,jpg',
            
        ]);

        // return view('image.create');
        // return $request;
      
        // if($request->file('profile')){
        //     $file=$request->file('profile');
        //     $filename=time().'.'.$file->getClientOriginalExtension();
        //     // $request->profile->move('storage/admin/',$filename);
        //      $request->profile->move('images/',$filename);

        //     $data->profile= $filename;
        // }

            $data=new Admin;

            // $user = new \App\User;
            //Insert ke table Users
            $user = new \App\User;
            // $user->role = 'siswa';
            $user->role =  'admin';
            // $user->name = $siswa->nama_depan;
            $user->name = $request->nama;
            $user->email = $request->email;
            // $user->password = 'rahasia';
            $user->password = bcrypt('rahasia');
            $user->gambar = 'default.png';
            $user->remember_token = str_random(60);
            // $user->remember_token = Str::random(60)
            $user->save();




            // // //insert siswa
            // // $request->request->add(['user_id' => $user->id ]);
            // $siswa = new \App\Siswa;
            // $siswa->nama_depan = $request->nama;
            // $siswa->nama_belakang = $request->nama_belakang;
            // $siswa->role =  'admin';
            // $siswa->jenis_kelamin=$request->jenis_kelamin;
            // $siswa->agama=$request->agama;
            // $siswa->suku=$request->suku;
            // $siswa->alamat=$request->alamat;
            // $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            // // $siswa->avatar = $request->file('profile')->getClientOriginalName();
            // $siswa->save();


            


            // //Insert ke table Siswa
            // $user = new \App\Siswa;
            // // $user->role = 'siswa';
            // $user->role =  'admin';
            // // $user->name = $siswa->nama_depan;
            // $user->name = $request->nama;
            // $user->email = $request->email;
            // // $user->password = 'rahasia';
            // $user->password = bcrypt('rahasia');
            // $user->gambar = 'default.png';
            // $user->remember_token = str_random(60);
            // // $user->remember_token = Str::random(60)
            // $user->save();


            $request->request->add(['user_id' => $user->id ]);
            $data = \App\Admin::create($request->all());
            $data->nama=$request->nama;
            $data->nama_belakang=$request->nama_belakang;
            $data->jenis_kelamin=$request->jenis_kelamin;
            $data->agama=$request->agama;
            $data->telepon=$request->telepon;
            $data->whatsapp=$request->whatsapp;
            $data->instagram=$request->instagram;
            $data->facebook=$request->facebook;
            $data->suku=$request->suku;
            $data->alamat=$request->alamat;
            $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;

         if($request->hasFile('profile')){
            $request->file('profile')->move('images/',$request->file('profile')->getClientOriginalName());
            $data->profile = $request->file('profile')->getClientOriginalName();
            // $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;  
            $data->save();
        }


        //  $request->request->add(['user_id' => $user->id ]);
        //  $siswa = \App\Siswa::create($request->all());
        //  $siswa->avatar = $request->file('profile')->getClientOriginalName();
        //  $siswa->nama_depan = $request->nama;
        //  $siswa->role =  'admin';
        //  $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
        //  $siswa->save();

        //insert siswa
            
            // $siswa = new \App\Siswa;
            // $siswa->user_id = $request->add(['user_id' => $user->id ]);
            // $siswa->nama_depan = $request->nama;
            // $siswa->nama_belakang = $request->nama_belakang;
            // $siswa->role =  'admin';
            // $siswa->jenis_kelamin=$request->jenis_kelamin;
            // $siswa->agama=$request->agama;
            // $siswa->suku=$request->suku;
            // $siswa->alamat=$request->alamat;
            // $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            // $siswa->avatar = $request->file('profile')->getClientOriginalName();
            // $siswa->save();


        
        // $user = new \App\User;
        // $request->request->add(['user_id' => $user->id ]);
        // $data = \App\Admin::create($request->all());
        // $data->nama=$request->nama;
        // $data->nama_belakang=$request->nama_belakang;
        // $data->jenis_kelamin=$request->jenis_kelamin;
        // $data->agama=$request->agama;
        // $data->telepon=$request->telepon;
        // $data->whatsapp=$request->whatsapp;
        // $data->instagram=$request->instagram;
        // $data->facebook=$request->facebook;
        // $data->suku=$request->suku;
        // $data->alamat=$request->alamat;
        // $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
        // $data->save();
        // return redirect()->back();


        //insert siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());
        $siswa->nama_depan = $request->nama;
        $siswa->nama_belakang = $request->nama_belakang;
        $siswa->role =  'admin';
        $siswa->jenis_kelamin=$request->jenis_kelamin;
        $siswa->agama=$request->agama;
        $siswa->suku=$request->suku;
        $siswa->alamat=$request->alamat;
        $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
        $siswa->avatar = $request->file('profile')->getClientOriginalName();
        $siswa->save();


        return redirect('/myadmin')->with('sukses', 'Data berhasil diinput');


        //insert siswa
        // $request->request->add(['user_id' => $user->id ]);
        // $admin = \App\Admin::create($request->all());
        // $admin->nama = $request->nama_depan;
        // $admin->telepon = '089664370576';
        // $admin->whatsapp = '089664370576';
        // $admin->instagram = 'admin_turbo';
        // $admin->facebook = 'admin_turbo';
        // $admin->profile = $request->file('avatar')->getClientOriginalName();
        // $admin->save();

    }


    public function createku(Request $request)
    {
        $this->validate($request, [
           
            'profile' => 'mimes:jpeg,png,jpg',
            
        ]);

        // return view('image.create');
        // return $request;
        $user = new \App\User;

        $data=new Admin;
        if($request->file('profile')){
            $file=$request->file('profile');
            $filename=time().'.'.$file->getClientOriginalExtension();
            // $request->profile->move('storage/admin/',$filename);
             $request->profile->move('images/',$filename);

            $data->profile= $filename;
        }

        $request->request->add(['user_id' => $user->id ]);
        $data = \App\Admin::create($request->all());

        $data->nama=$request->nama;
        $data->telepon=$request->telepon;
        $data->whatsapp=$request->whatsapp;
        $data->instagram=$request->instagram;
        $data->facebook=$request->facebook;
        $data->alamat=$request->alamat;
        $data->save();
        // return redirect()->back();
        return redirect('/myadmin')->with('sukses', 'Data berhasil diinput');


        //insert siswa
        // $request->request->add(['user_id' => $user->id ]);
        // $admin = \App\Admin::create($request->all());
        // $admin->nama = $request->nama_depan;
        // $admin->telepon = '089664370576';
        // $admin->whatsapp = '089664370576';
        // $admin->instagram = 'admin_turbo';
        // $admin->facebook = 'admin_turbo';
        // $admin->profile = $request->file('avatar')->getClientOriginalName();
        // $admin->save();

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
         $data=new Admin;
        if($request->file('profile')){
            $file=$request->file('profile');
            $filename=time().'.'.$file->getClientOriginalExtension();
            // $request->profile->move('storage/admin/',$filename);
               $request->profile->move('images/',$filename);

            $data->profile= $filename;
        }
        $data->nama=$request->nama;
        $data->telepon=$request->telepon;
        $data->whatsapp=$request->whatsapp;
        $data->instagram=$request->instagram;
        $data->facebook=$request->facebook;
        $data->alamat=$request->alamat;
        $data->save();
        // return redirect()->back();
        return redirect('/myadmin')->with('sukses', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Admin::find($id);
        return view('admin.details',compact('data'));
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
        // return response()->download('storage/admin/'.$file);
        return response()->download('images/'.$file);
    }
    public function edit($id)
    {
        $admin = \App\Admin::find($id);
        return view('admin/edit',['admin' => $admin]);
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
        $data = \App\Admin::find($id);
        $data->update($request->all());


        if($request->hasFile('profile')){
            $request->file('profile')->move('images/',$request->file('profile')->getClientOriginalName());
            $data->profile = $request->file('profile')->getClientOriginalName();
            $data->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;  
            $data->save();
        }

        // if($request->file('profile')){
        //     $file=$request->file('profile');
        //     $filename=time().'.'.$file->getClientOriginalExtension();
        //     // $request->profile->move('storage/admin/',$filename);
        //      $request->profile->move('images/',$filename);
        //     $data->profile= $filename;
        //     $data->save();
        // }

         $siswa =  \App\Siswa::where('user_id', $data->user_id)->update([
             'nama_depan'=>$request->nama, 
             'nama_belakang'=>$request->nama_belakang, 
             'jenis_kelamin'=>$request->jenis_kelamin, 
             'agama'=>$request->agama, 
             'alamat'=>$request->alamat, 
             'suku'=>$request->suku,
             'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
             'avatar' => $request->file('profile')->getClientOriginalName()]);

        // $data->save();
        return redirect('/myadmin')->with('sukses', 'Data berhasil diupdate');


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
        $admin = \App\Admin::find($id);

        // $siswa = Siswa::find($id);
        $admin->delete();

        $siswa =  \App\Siswa::where('user_id', $admin->user_id)->delete();
        $user =  \App\User::where('id', $admin->user_id)->delete();

        //$siswa->delete($siswa);
        return redirect('/myadmin')->with('sukses', 'Data berhasil dihapus');

    }
}
