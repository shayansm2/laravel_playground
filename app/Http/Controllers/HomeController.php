<?php

namespace App\Http\Controllers;

use App\Events\HomePageVisited;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        HomePageVisited::dispatch($request->ip(), $request->userAgent());
        $posts = Post::all();
        return view('postIndex', ['posts' => $posts]);
    }

    public function post(Post $post)
    {
        return view('postDetail', ['post' => $post]);
    }
}
