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
      'file'  => 'required'
     );

     $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
      return response()->json(['errors' => $error->errors()->all()]);
     }

     $video = $request->file('file');

     $new_name = rand() . '.' . $video->getClientOriginalExtension();
     $video->move(public_path('videos'), $new_name);

     $output = array(
         'success' => 'video uploaded successfully',
         'video' => '<td><iframe src="videos/'.$new_name.'" style="width: 500px; height: 500px;"></iframe></td>'
        );

        return response()->json($output);
    }
}

?>
