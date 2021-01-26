<?php

 

namespace App\Http\Controllers;

 

use Illuminate\Http\Request;

 

class FileController extends Controller

{

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUpload()

    {

    	return view('fileUpload');

    }

 

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function fileUploadPost(Request $request)

    {

        $request->validate([

            'file' => 'required',

		]);

 

        $fileName = time().'.'.request()->file->getClientOriginalExtension();

 

        request()->file->move(public_path('files'), $fileName);

 

        return response()->json(['success'=>'You have successfully upload file.']);

    }

}