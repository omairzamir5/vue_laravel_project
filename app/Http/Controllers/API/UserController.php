<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SampleUsers;

class UserController extends Controller
{
    public function index()
    {
        return view('posts');
    }

    public function get(Request $request)
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json($post);
    }

    public function delete($id)
    {
        Post::destroy($id);

        return response()->json("ok");
    }
}
