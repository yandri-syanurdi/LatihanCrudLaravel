<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

class FileUploadController extends Controller
{
    function index()
    {
     return view('file_upload');
    }

    function upload(Request $request)
    {
     $rules = array(
      'file'  => 'required|image|max:2048'
     );

     $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
      return response()->json(['errors' => $error->errors()->all()]);
     }

     $image = $request->file('file');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();
     $image->move(public_path('images'), $new_name);

     $output = array(
         'success' => 'Image uploaded successfully',
         'image'  => '<img src="images/'.$new_name.'" class="img-thumbnail" />'
        );

        return response()->json($output);
    }
}

?>