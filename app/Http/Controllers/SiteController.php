<?php

namespace App\Http\Controllers;

use App\Mail\NotifPendaftaranSiswa;
use Illuminate\Http\Request;
use App\Post;
use App\Siswa;

class SiteController extends Controller
{
    public function home()
    {
        // return view('sites.home');
        $posts = Post::all();
        return view('sites.home',compact(['posts']));
    }

    public function about()
    {
        return view('sites.about');
    }

    // public function register()
    // {
    //     return view('sites.register');
    // }
    
    
    public function register(Request $request)
    {
        // return view('sites.register');
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
        return view('sites.register',['data_siswa' => $data_siswa]);
    }

    public function postregister(Request $request)
    {
        // dd($request->all());
        // Input pendaftar sebagai user dulu
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gambar = 'uploads/default.png';
        $user->remember_token = str_random(60);
        $user->save();

        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());

        // \Mail::raw('Selamat datang '.$user->name, function ($message) use($user) {
        //     $message->to($user->email, $user->name);
        //     $message->subject('Selamat anda sudah terdaftar di sekolah kami');
        // });

        \Mail::to($user->email)->send(new NotifPendaftaranSiswa);
        
        return redirect('/')->with('sukses','Data pendaftaran berhasil dikirim');
    }

    public function singlepost($slug)
    {
       $post = Post::where('slug','=',$slug)->first();
       return view('sites.singlepost',compact(['post']));
       // dd($post);
    }

}
