<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // $users = User::all();
        // return view('posts.index',['posts' => $posts]);
        return view('posts.index',compact(['posts']));
        // return view('posts.index',compact(['posts','users','']));
    }

    public function add()
    {
        return view('posts.add');
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            // 'user_id' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'thumbnail' => $request->thumbnail,
        ]);

        return redirect()->route('posts.index')->with('sukses', 'Post berhasil di submit.');
    }
}
