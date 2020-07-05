<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.index', ['posts' => $posts]);
    }

    function new()
    {
        return view('admin.new');
    }

    function storeNew(Request $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->read_minutes = $request->minutes;
        $post->content = $request->postcontent;

        $isPublished = $request->ispublish;
        if($isPublished === 'on')
        {
            $post->is_published = true;
        }
        else
        {
            $post->is_published = false;
        }

        $post->save();

        return redirect()->route('admin.home');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
