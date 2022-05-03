<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts =  Post::all();
        return view('postIndex', ['posts' => $posts]);
    }

    public function post(Post $post) {
        return view('postDetail', ['post' => $post]);
    }
}
