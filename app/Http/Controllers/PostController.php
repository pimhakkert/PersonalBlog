<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {

        //Check if user is logged in to show unpublished posts
        if(Auth::check())
        {
            $posts = Post::all();
        }
        else
        {
            $posts = Post::where('is_published', '=', '1')->orderBy('created_at','desc')->get();
        }

        return view('front.index', ['posts' => $posts]);
    }

    public function view($slug)
    {
        //Check if user is logged in to show unpublished post, otherwise only show published posts
        if(Auth::check())
        {
            $post = Post::where('slug', '=', $slug)->firstOrFail();
        }
        else
        {
            $post = Post::where('slug', '=', $slug)->where('is_published', '=', '1')->firstOrFail();
        }

        return view('front.post', ['post' => $post]);
    }
}
