<?php

namespace App\Http\Controllers;

use App\Events\HomePageVisited;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Utils;

    public $class, $previousURL;

    public function __construct(Request $request)
    {
        if ($request->query->get('debug') === 'true') {
            $this->class = class_basename($this);
            $this->previousURL = url()->previous();
        };
    }

    public function index()
    {
        $user = $this->getUser();
        $limit = $this->getLimit();
        return view('index', compact('user', 'limit'));
    }

    public function indexAction(Request $request)
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
