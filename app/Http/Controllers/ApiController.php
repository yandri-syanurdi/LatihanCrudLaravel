<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function editnilai(Request $request, $id)
    {
        // return $request->all();
        
        $siswa = \App\Siswa::find($id);
        $siswa->mapel()->updateExistingPivot($request->pk,['nilai' => $request->value]);
        
        // return redirect('siswa/'.$id.'/profile');
        // return redirect()->back();
        
        //script dibawah ini seharusnya tidak ada
         //return redirect('siswa/'.$id.'/profile')->with('sukses', 'Data nilai berhasil dimasukkan');
        //return back();

        // return response(Mapel::all());
       
        
    }
}
