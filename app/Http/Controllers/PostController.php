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
            $isAuthenticated = true;
        }
        else
        {
            $posts = Post::where('is_published', '=', '1')->orderBy('created_at','desc')->get();
            $isAuthenticated = false;
        }

        return view('front.index', ['posts' => $posts, 'isAuthenticated' => $isAuthenticated]);
    }

    public function view($slug)
    {
        //Check if user is logged in to show unpublished post, otherwise only show published posts
        if(Auth::check())
        {
            $post = Post::where('slug', '=', $slug)->firstOrFail();
            $isAuthenticated = true;
        }
        else
        {
            $post = Post::where('slug', '=', $slug)->where('is_published', '=', '1')->firstOrFail();
            $isAuthenticated = false;
        }

        return view('front.post', ['post' => $post, 'isAuthenticated' => $isAuthenticated]);
    }
}
