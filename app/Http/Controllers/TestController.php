<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){

        // $siswa = \App\Siswa::all();
        // $tugas = 0;
        // $nilai = 10 + $tugas;
        // return view('test', ['siswa' => $siswa]);

        // $siswa = \App\Siswa::find(1);
        $siswa = \App\Siswa::find(20);
        // $siswa = \App\Siswa::take(3)->get();
        // $siswa = \App\Siswa::all();
        return view('test', ['siswa' => $siswa]);


    }
    
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
