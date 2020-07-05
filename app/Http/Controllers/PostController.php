<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', '=', '1')->orderBy('created_at','desc')->get();
        return view('front.index', ['posts' => $posts]);
    }

    public function view($slug)
    {
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        return view('front.post', ['post' => $post]);
    }
}
