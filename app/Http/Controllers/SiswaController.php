<?php

namespace App\Http\Controllers;

use App\User;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Siswa;
use App\Guru;
use App\Admin;
use App\Pengguna;
use DB;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // public function  index() 
    public function  index(Request $request) 
    {
        // return  'Ini List Siswa';
        // dd($request->all());
        if($request->has('cari')){
            // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
            $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);
        }
        else {
            // $data_siswa = \App\Siswa::all();
            // $data_siswa = \App\Siswa::paginate(20);
            $data_siswa = \App\Siswa::all();
        }
        // $data_siswa = \App\Siswa::all();
        return view('siswa.index',['data_siswa' => $data_siswa]);

    }


    public function  indexku(Request $request) 
    {
        // return  'Ini List Siswa';
        // dd($request->all());
        $batas = 'siswa';
        if($request->has('cari')){
            // $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
            $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->paginate(20);
        }
        else {
            // $data_siswa = \App\Siswa::all();
            // $data_siswa = \App\Siswa::paginate(20);
            // $data_siswa = \App\Siswa::all();
            //  $data_siswa = \App\Siswa::all();
            // $data_siswa = \App\Siswa::where('role', $batas);
            //   $data_siswa = DB::table('siswa')->where('role', $batas)->latest()->paginate(5);
            //  $data_siswa = \App\Siswa::where('role','LIKE','%'.'siswa'.'%')->paginate(20);
            $data_siswa = \App\Siswa::all();
        }
        // $data_siswa = \App\Siswa::all();
        return view('siswa.indexkuh',['data_siswa' => $data_siswa]);

    }

    public function create(Request $request)
    {
        //validasi create data, apabila data yang diinput tidak sesuai dengan yang diminta maka akan ada pesan error

        // dd($request->all());
        $this->validate($request, [
            // 'nama_depan' => 'min:5'
            'nama_depan' => 'required|min:5',
            'nama_belakang' => 'required',
            // 'email' => 'required|email|unique:siswa',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'role' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpeg,png,jpg',
            
        ]);
       
        // untuk tabel mata pelajaran memakai relasi many to many
        // disini ada tiga tabel, dimana tabel ketiga sebagai penghubung antara tabel pertama dengan kedua
        // misalnya tabel siswa_mapel sebagai penghubung antara tabel siswa dengan tabel mapel
        // alasana kenapa memakai relasi many to many adalah karena saty siswa dapat mengakses banyak mata pelajaran
        // dan juga satu mata pelajaran dapat diakses dengan banyak siswa
        // kalau many to many harus dibuat satu tabel tambahan yang menampung dua id dari masing-masing tabel lain yang kita sebut namanya dengan pivot table

        //dibuatkan relasi one to one, satu user memiliki satu siswa
        //selain insert ke tabel siswa juga diinsert ke tabel user
        //jadi dengan menginput siswa baru di tabel siswa sekaligus menambah akun yang bisa dipakai untuk login
        
        //Insert ke table Users
        $user = new \App\User;
        // $user->role = 'siswa';
         $user->role =  $request->role;
        // $user->name = $siswa->nama_depan;
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        // $user->password = 'rahasia';
        $user->password = bcrypt('rahasia');
        $user->gambar = 'default.png';
        $user->remember_token = str_random(60);
        // $user->remember_token = Str::random(60)
        $user->save();

         //Insert ke table Siswa
         $request->request->add(['user_id' => $user->id ]);
         $siswa = \App\Siswa::create($request->all());
        
         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            $siswa->save();
        }

        if($request->role == 'admin')
        {
            $request->request->add(['user_id' => $user->id ]);
            // $request->request->add(['user_id' => $user->id ]);
            $admin = \App\Admin::create($request->all());
            $admin->nama = $request->nama_depan;
            $admin->telepon = '089664370576';
            $admin->whatsapp = '089664370576';
            $admin->instagram = 'admin_turbo';
            $admin->facebook = 'admin_turbo';
            $admin->profile = $request->file('avatar')->getClientOriginalName();
            $admin->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            // if($request->hasFile('avatar')){
            //     $request->file('avatar')->move('storage/admin/',$request->file('avatar')->getClientOriginalName());
            //     $admin->profile = $request->file('avatar')->getClientOriginalName();
            //     // $admin->save();
            // }
            $admin->save();
            //  $user = new \App\Admin;
        
            // if($request->hasFile('avatar')){
            //     $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            //     $admin->profile = $request->file('avatar')->getClientOriginalName();
            //     $admin->nama = $request->nama_depan;
            //     $admin->save();
            // }
        }
        else  if($request->role == 'guru')
        {
            $request->request->add(['user_id' => $user->id ]);
            // $request->request->add(['user_id' => $user->id ]);
            $guru = \App\Guru::create($request->all());
            $guru->nama = $request->nama_depan;
            $guru->nama_belakang = $request->nama_belakang;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->agama = $request->agama;
            $guru->telpon = '089664370576';
            // $guru->whatsapp = '089664370576';
            // $guru->instagram = 'guru_turbo';
            // $guru->facebook = 'guru_turbo';
            $guru->alamat = $request->alamat;
            $guru->suku = $request->suku;
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
           
            $guru->save();
           
        }
        else
        {
            $request->request->add(['user_id' => $user->id ]);
            $pengguna = \App\Pengguna::create($request->all());
            $pengguna->avatar = $request->file('avatar')->getClientOriginalName();
            $pengguna->save();
            // if($request->hasFile('avatar')){
            //     $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            //     $pengguna->avatar = $request->file('avatar')->getClientOriginalName();
            //     $pengguna->save();
            // }
        }

        // return 'Form disubmit';
        // return $request->all();
        // return redirect('/siswa');

        // return redirect('/siswa')->with('sukses', 'Data berhasil diinput');
        return redirect('/all')->with('sukses', 'Data berhasil diinput');
    }
    
    
    
    
    public function creater(Request $request)
    {

        $this->validate($request, [
            'nama_depan' => 'required|min:5',
            // 'nama_belakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            // 'role' => 'required',
            // 'agama' => 'required',
            // 'avatar' => 'mimes:jpeg,png,jpg',
            
        ]);
       
        $user = new \App\User;
        // $user->role =  $request->role;
        $user->role =  "siswa";
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->gambar = 'default.png';
        $user->remember_token = str_random(60);
        $user->save();

         $request->request->add(['user_id' => $user->id ]);
         $siswa = \App\Siswa::create($request->all());
        
        //  if($request->hasFile('avatar')){
        //     $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = 'default.png';
            $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            $siswa->nama_belakang ="";
            $siswa->agama = "";
            $siswa->suku = "";
            $siswa->alamat = "";
            $siswa->role ="siswa";
            
            $siswa->save();
        
        // return redirect('/regsiter')->with('sukses', 'Data berhasil diinput');
        return redirect()->back()->with('sukses', 'Data berhasil diinput');
    }


    public function createku(Request $request)
    {
        //validasi create data, apabila data yang diinput tidak sesuai dengan yang diminta maka akan ada pesan error

        // dd($request->all());
        $this->validate($request, [
            // 'nama_depan' => 'min:5'
            // 'nama_depan' => 'required|min:5',
            // 'nama_belakang' => 'required',
            // // 'email' => 'required|email|unique:siswa',
            // 'email' => 'required|email|unique:users',
            // 'jenis_kelamin' => 'required',
            // // 'role' => 'required',
            // 'agama' => 'required',
            // 'avatar' => 'mimes:jpeg,png,jpg',
            
        ]);
       
        // untuk tabel mata pelajaran memakai relasi many to many
        // disini ada tiga tabel, dimana tabel ketiga sebagai penghubung antara tabel pertama dengan kedua
        // misalnya tabel siswa_mapel sebagai penghubung antara tabel siswa dengan tabel mapel
        // alasana kenapa memakai relasi many to many adalah karena saty siswa dapat mengakses banyak mata pelajaran
        // dan juga satu mata pelajaran dapat diakses dengan banyak siswa
        // kalau many to many harus dibuat satu tabel tambahan yang menampung dua id dari masing-masing tabel lain yang kita sebut namanya dengan pivot table

        //dibuatkan relasi one to one, satu user memiliki satu siswa
        //selain insert ke tabel siswa juga diinsert ke tabel user
        //jadi dengan menginput siswa baru di tabel siswa sekaligus menambah akun yang bisa dipakai untuk login
        
        //Insert ke table Users
        $user = new \App\User;
        // $user->role = 'siswa';
        // $user->role =  $request->role;
        $user->role = 'siswa';
        // $user->name = $siswa->nama_depan;
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        // $user->password = 'rahasia';
        $user->password = bcrypt('rahasia');
        $user->gambar = 'default.png';
        $user->remember_token = str_random(60);
        // $user->remember_token = Str::random(60)
        $user->save();

         //Insert ke table Siswa
         $request->request->add(['user_id' => $user->id ]);
        //  $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
        
        
         $siswa = \App\Siswa::create($request->all());
        
         if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->role = 'siswa';
            $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            $siswa->save();
        }

       // Insert ke table Pengguna
         $request->request->add(['user_id' => $user->id ]);
         $pengguna = \App\Pengguna::create($request->all());
         $pengguna->avatar = $request->file('avatar')->getClientOriginalName();
         $pengguna->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
         $pengguna->save();

        return redirect('/siswa')->with('sukses', 'Data berhasil diinput');
    }



    // public function edit($id)
    public function edit(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);

        // $siswa = Siswa::find($id);
        return view('siswa/edit',['siswa' => $siswa]);
        // return view('siswa/edit');
        // dd($siswa);
    }

    public function editku(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);

        // $siswa = Siswa::find($id);
        return view('siswa/myedit',['siswa' => $siswa]);
        // return view('siswa/edit');
        // dd($siswa);
    }
    
     public function myedit(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);

        // $siswa = Siswa::find($id);
        return view('siswa/editall',['siswa' => $siswa]);
        // return view('siswa/edit');
        // dd($siswa);
    }


    // public function update(Request $request,$id)
    public function update(Request $request,Siswa $siswa)
    {
        //dd($request->all());
        // $siswa = \App\Siswa::find($id);

        //$siswa = Siswa::find($id);

        $yandri_tampan = 'default.png';
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            //  $data->tanggal_mulai=$request->yeara.'-'.$request->montha.'-'.$request->daya;
            $yandri_tampan = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        else{
            $yandri_tampan = 'default.png';
        }

        if($siswa->role ==  'admin')
        {
            $admin =  \App\Admin::where('user_id', $siswa->user_id)->update([
                'nama'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang,
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,


                // 'telepon' => '089664370576',
                // 'whatsapp' => '089664370576',
                // 'instagram' => 'admin_turbo',
                // 'facebook' => 'admin_turbo',


                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'profile' => $request->file('avatar')->getClientOriginalName()]);
                'profile' => $yandri_tampan]);
            //$pengguna =  \App\Pengguna::where('user_id', $siswa->user_id)->update(['nama_depan'=>$request->nama_depan, 'avatar' => $request->file('avatar')->getClientOriginalName()]);
       } else if($siswa->role ==  'siswa')
        {
            $pengguna =  \App\Pengguna::where('user_id', $siswa->user_id)->update([
                'nama_depan'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang, 
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,
                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'avatar' => $request->file('avatar')->getClientOriginalName()]);
                'avatar' => $yandri_tampan]);
                
        } else if($siswa->role ==  'guru')
        {
              $guru =  \App\Guru::where('user_id', $siswa->user_id)->update([
                'nama'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang,
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,


                // 'telepon' => '089664370576',
                // 'whatsapp' => '089664370576',
                // 'instagram' => 'admin_turbo',
                // 'facebook' => 'admin_turbo',


                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'avatar' => $request->file('avatar')->getClientOriginalName()]);
                'avatar' => $yandri_tampan]);
        }
        // $admin->save();

        // if($siswa->role ==  'admin')
        // {
        //     // $admin = \App\Admin::find($siswa->user_id);
        //     $admin =  \App\Admin::where('user_id','LIKE','%'.$siswa->user_id.'%');
        //     // $admin =  \App\Admin::find('user_id', $siswa->user_id);
        //     // $admin->nama=$request->nama_depan;
        //     // $request->request->add(['user_id' => $user->id ]);
        //     // $admin->user_id = $siswa->user_id;
        //     $admin->nama = $request->nama_depan;
        //     $admin->telepon = '089664370576';
        //     $admin->whatsapp = '089664370576';
        //     $admin->instagram = 'admin_turbo';
        //     $admin->facebook = 'admin_turbo';
        //     $admin->profile = $request->file('avatar')->getClientOriginalName();

        //     $admin->update($request->all());
        //     $admin->save();
        // }


        // return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
    }



     public function myupdate(Request $request,Siswa $siswa)
    {
        //dd($request->all());
        // $siswa = \App\Siswa::find($id);

        //$siswa = Siswa::find($id);
        //  $yandri_tampan;
        $yandri_tampan = 'default.png';

        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            //  $data->tanggal_mulai=$request->yeara.'-'.$request->montha.'-'.$request->daya;
            $siswa->save();
            $yandri_tampan = $request->file('avatar')->getClientOriginalName();
        }
        else {
            // $siswa->save();
             $yandri_tampan = 'default.png';
        }

        if($siswa->role ==  'admin')
        {
            $admin =  \App\Admin::where('user_id', $siswa->user_id)->update([
                'nama'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang,
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,


                // 'telepon' => '089664370576',
                // 'whatsapp' => '089664370576',
                // 'instagram' => 'admin_turbo',
                // 'facebook' => 'admin_turbo',


                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'profile' => $request->file('avatar')->getClientOriginalName()]);
                 'profile' => $yandri_tampan]);
            //$pengguna =  \App\Pengguna::where('user_id', $siswa->user_id)->update(['nama_depan'=>$request->nama_depan, 'avatar' => $request->file('avatar')->getClientOriginalName()]);
       } else if($siswa->role ==  'siswa')
        {
            $pengguna =  \App\Pengguna::where('user_id', $siswa->user_id)->update([
                'nama_depan'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang, 
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,
                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'avatar' => $request->file('avatar')->getClientOriginalName()]);
                'avatar' => $yandri_tampan]);
        } else if($siswa->role ==  'guru')
        {
              $guru =  \App\Guru::where('user_id', $siswa->user_id)->update([
                'nama'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang,
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,


                // 'telepon' => '089664370576',
                // 'whatsapp' => '089664370576',
                // 'instagram' => 'admin_turbo',
                // 'facebook' => 'admin_turbo',


                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'avatar' => $request->file('avatar')->getClientOriginalName()]);
                'avatar' => $yandri_tampan]);

            }
        // $admin->save();

        // if($siswa->role ==  'admin')
        // {
        //     // $admin = \App\Admin::find($siswa->user_id);
        //     $admin =  \App\Admin::where('user_id','LIKE','%'.$siswa->user_id.'%');
        //     // $admin =  \App\Admin::find('user_id', $siswa->user_id);
        //     // $admin->nama=$request->nama_depan;
        //     // $request->request->add(['user_id' => $user->id ]);
        //     // $admin->user_id = $siswa->user_id;
        //     $admin->nama = $request->nama_depan;
        //     $admin->telepon = '089664370576';
        //     $admin->whatsapp = '089664370576';
        //     $admin->instagram = 'admin_turbo';
        //     $admin->facebook = 'admin_turbo';
        //     $admin->profile = $request->file('avatar')->getClientOriginalName();

        //     $admin->update($request->all());
        //     $admin->save();
        // }


        // return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
        return redirect('/all')->with('sukses', 'Data berhasil diupdate');
    }




     public function updateku(Request $request,Siswa $siswa)
    {

        $user = \App\User::find($siswa->user_id);
        //$data = \App\Video::find($id);
        //$data->update($request->all());

        //$user->email=$request->email;

        // $user->password=$request->password;
        // $user->password = bcrypt('$request->password');

        //$user->password = bcrypt('rahasia');

        // $user->password = bcrypt('rahasia');
        // $user->update($request->all());
        $user->update([
                'email'=>$request->email, 
                'password'=>bcrypt($request->password),
        ]);

        $yandri_tampan = 'default.png';

        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->tgl_lahir=$request->year.'-'.$request->month.'-'.$request->day;
            $yandri_tampan = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        else {
             $yandri_tampan = 'default.png';
        }

        if($siswa->role ==  'admin')
        {
            $admin =  \App\Admin::where('user_id', $siswa->user_id)->update([
                'nama'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang,
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,
                // 'telepon' => '089664370576',
                // 'whatsapp' => '089664370576',
                // 'instagram' => 'admin_turbo',
                // 'facebook' => 'admin_turbo',
                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                'profile' => $request->file('avatar')->getClientOriginalName()]);
        } else if($siswa->role ==  'siswa')
        {
            $pengguna =  \App\Pengguna::where('user_id', $siswa->user_id)->update([
                'nama_depan'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang, 
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,
                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'avatar' => $request->file('avatar')->getClientOriginalName()]);
                'avatar' => $yandri_tampan]);
        } else if($siswa->role ==  'guru')
        {
                $guru =  \App\Guru::where('user_id', $siswa->user_id)->update([
                'nama'=>$request->nama_depan, 
                'nama_belakang'=>$request->nama_belakang,
                'jenis_kelamin'=>$request->jenis_kelamin, 
                'agama'=>$request->agama,
                // 'telepon' => '089664370576',
                // 'whatsapp' => '089664370576',
                // 'instagram' => 'admin_turbo',
                // 'facebook' => 'admin_turbo',
                'alamat'=>$request->alamat,
                'suku'=>$request->suku,
                'tgl_lahir'=>$request->year.'-'.$request->month.'-'.$request->day,
                // 'avatar' => $request->file('avatar')->getClientOriginalName()]);
                'avatar' => $yandri_tampan]);
        }
        
        // return redirect('/all')->with('sukses', 'Data berhasil diupdate');
        return redirect()->back()->with('sukses', 'Data berhasil diupdate');
    }


    // public function delete($id)
    // public function delete(Siswa $siswa)
    public function delete(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);

        // $siswa = Siswa::find($id);
        //$siswa->delete();
        $siswa->delete($siswa);
        $user =  \App\User::where('id', $siswa->user_id)->delete();
        if($siswa->role == 'admin')
        {
            // $admin = \App\Siswa::delete('user_id', $siswa->user_id);
            //$admin->delete('user_id', $siswa->user_id);
             $admin =  \App\Admin::where('user_id', $siswa->user_id)->delete();
        }
         if($siswa->role == 'siswa')
        {
            // $admin = \App\Siswa::delete('user_id', $siswa->user_id);
            //$admin->delete('user_id', $siswa->user_id);
             $pengguna =  \App\Pengguna::where('user_id', $siswa->user_id)->delete();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');


       


    }


    public function deletesaya(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);

        // $siswa = Siswa::find($id);
        //$siswa->delete();
        $siswa->delete($siswa);
        $user =  \App\User::where('id', $siswa->user_id)->delete();
        if($siswa->role == 'admin')
        {
            // $admin = \App\Siswa::delete('user_id', $siswa->user_id);
            //$admin->delete('user_id', $siswa->user_id);
             $admin =  \App\Admin::where('user_id', $siswa->user_id)->delete();
        }
         if($siswa->role == 'siswa')
        {
            // $admin = \App\Siswa::delete('user_id', $siswa->user_id);
            //$admin->delete('user_id', $siswa->user_id);
             $pengguna =  \App\Pengguna::where('user_id', $siswa->user_id)->delete();
        }
        return redirect('/all')->with('sukses', 'Data berhasil dihapus');


       


    }


    


    public function deleteku($siswa)
    {
        $siswa = \App\Siswa::find($siswa);
        // $siswa = Siswa::find($id);
        $siswa->delete();
        //$siswa->delete($siswa);
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    
    // public function profile($id)
    // public function profile(\App\Siswa $siswa)
    public function profile(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();

        // Menyiapkan data untuk chart
        $categories = [];
        $data = [];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                // $data[] = $siswa->mapel; //menjadi collection
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai; //menjadi Query Builder
            }
        }

        // dd($data);

        // dd($categories);
        // dd(json_encode($categories));

        //dd($mapel);
        // dd($matapelajaran);
        //sebelumnya variabel mapel diganti jadi variabel matapelajaran agar tidak sama dengan variabel sebelumnya
        return view('siswa.profile',['siswa' => $siswa, 'matapelajaran' => $matapelajaran,'categories' => $categories,'data' => $data]);
    }


     public function myprofile(Siswa $siswa)
    {
        // $siswa = \App\Siswa::find($id);
        $matapelajaran = \App\Mapel::all();

        // Menyiapkan data untuk chart
        $categories = [];
        $data = [];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                // $data[] = $siswa->mapel; //menjadi collection
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai; //menjadi Query Builder
            }
        }

        // dd($data);

        // dd($categories);
        // dd(json_encode($categories));

        //dd($mapel);
        // dd($matapelajaran);
        //sebelumnya variabel mapel diganti jadi variabel matapelajaran agar tidak sama dengan variabel sebelumnya
        return view('siswa.details',['siswa' => $siswa, 'matapelajaran' => $matapelajaran,'categories' => $categories,'data' => $data]);
    }

    // public function addnilai(Request $request,$idsiswa)
    public function addnilai(Request $request,Siswa $siswa)
    {
        //cek data dari form addnilai pada profile.blade.php
        //menggunakan dd (Dump and Die)
        //dd($request->all()); 

        //relasi antar siswa dengan mapel

        // $siswa = \App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            //return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data mata pelajaran sudah ada.');
            return redirect()->back()->with('error','Data mata pelajaran sudah ada.');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);

        //return redirect('siswa/'.$idsiswa.'/profile')->with('sukses', 'Data nilai berhasil dimasukkan');
        return redirect()->back()->with('sukses', 'Data nilai berhasil dimasukkan');
    }

    // public function deletenilai($idsiswa,$idmapel)
    public function deletenilai(Siswa $siswa,$idmapel)
    {
        // $siswa = \App\Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses','Data nilai berhasil dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        // $pdf = PDF::loadView('pdf.invoice', $data);
       // $pdf = PDF::loadHTML('<h1>DATA SISWA</h1>');
        // return $pdf->download('invoice.pdf');
       // return $pdf->download('siswa.pdf');

        $siswa = \App\Siswa::all();
        // $pdf = PDF::loadHTML('<h1>DATA SISWA</h1>');
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }

    public function getdatasiswa()
    {
        //$batas = 'siswa';
        //$siswa = Siswa::select('siswa.*')->where('role', $batas); //diisi dengan nama table

         $siswa = Siswa::select('siswa.*');

        return \DataTables::eloquent($siswa)
        ->addColumn('nama_lengkap',function($s){
            return $s->nama_depan.' '.$s->nama_belakang;
        })
        ->addColumn('rata2_nilai',function($s){
            return $s->rataRataNilai();
        })
        ->addColumn('gambarku',function($s){
            // return $s->getAvatar();
            //http://localhost/laravel-crud/"public/images/default.jpg
            return '<img src="'.$s->getAvatar().'" class="img-circle" height="45px;" width="50px;">';
             // return '<img src="{{$s->getAvatar()}}" class="img-circle" height="45px;" width="50px;">';
            // return '<img src="http://localhost/laravel-crud/public/images/default.jpg" class="img-circle" height="45px;" width="50px;">';
        })
        ->addColumn('aksi',function($s){
            // return $s->id;
            return '
            <a href="/laravel-crud/public/all/'.$s->id.'/profile/" class="btn btn-sm btn-primary btn-sm">Show</a>
            <a href="/laravel-crud/public/all/'.$s->id.'/edit/" class="btn btn-sm btn-warning">Edit</a> 
            <a  class="btn btn-danger btn-sm delete" siswa-id="'.$s->id.'">Delete</a>
            ';
        })
        
        ->rawColumns(['nama_lengkap','rata2_nilai','aksi','gambarku'])
        ->toJson();
    }



    public function getdatasiswaku()
    {
        $batas = 'siswa';
        $siswa = Siswa::select('siswa.*')->where('role', $batas); //diisi dengan nama table

        //  $siswa = Siswa::select('siswa.*');

        return \DataTables::eloquent($siswa)
        ->addColumn('nama_lengkap',function($s){
            return $s->nama_depan.' '.$s->nama_belakang;
        })
        ->addColumn('rata2_nilai',function($s){
            return $s->rataRataNilai();
        })
        ->addColumn('gambarku',function($s){
            // return $s->getAvatar();
            //http://localhost/laravel-crud/"public/images/default.jpg
            return '<img src="'.$s->getAvatar().'" class="img-circle" height="45px;" width="50px;">';
             // return '<img src="{{$s->getAvatar()}}" class="img-circle" height="45px;" width="50px;">';
            // return '<img src="http://localhost/laravel-crud/public/images/default.jpg" class="img-circle" height="45px;" width="50px;">';
        })
        ->addColumn('aksi',function($s){
            // return $s->id;
            return '
            <a href="/laravel-crud/public/siswa/'.$s->id.'/profile/" class="btn btn-sm btn-primary btn-sm">Show</a>
            <a href="/laravel-crud/public/siswa/'.$s->id.'/edit/" class="btn btn-sm btn-warning">Edit</a> 
              <a  class="btn btn-danger btn-sm delete" siswa-id="'.$s->id.'">Delete</a>
            ';
        })
        
        ->rawColumns(['nama_lengkap','rata2_nilai','aksi','gambarku'])
        ->toJson();
    }


    public function profilsaya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilsaya',compact(['siswa']));
    }

     public function profilku()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilku',compact(['siswa']));
    }

    public function importexcel(Request $request)
    {
        Excel::import(new \App\Imports\SiswaImport,$request->file('data_siswa'));
        // dd($request->all());
        return redirect('/siswa')->with('sukses', 'Data Excel berhasil diinput');
    }

}


//  <a href="/laravel-crud/public/siswa/'.$s->id.'/delete/" class="btn btn-danger btn-sm delete" siswa-id="'.$s->id.'">Delete</a>
//  <a href="/laravel-crud/public/siswa/'.$s->id.'/delete/" class="btn btn-danger btn-sm delete" siswa-id="'.$s->id.'">Delete</a>