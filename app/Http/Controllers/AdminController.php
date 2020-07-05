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
        $preSlug = $request->title;
        $postSlug = Str::slug($preSlug, '-');

        //Check if slug already exists and make new slug name if so
        $testPost = Post::where('slug', '=', $postSlug)->first();
        if($testPost !== null)
        {
            //There is a duplicate slug in the system

            //Tell original post there has been a duplicate slug, so next time an even greater number gets added to the new slug
            $testPost->slug_duplicate_count = $testPost->slug_duplicate_count + 1;

            //Make new slug
            $postSlug .= '-'.$testPost->slug_duplicate_count;

            $testPost->save();
        }

        $post = new Post();

        $post->title = $request->title;
        $post->slug = $postSlug;
        $post->read_minutes = $request->minutes;
        $post->content = $request->postcontent;
        $post->slug_duplicate_count = 0;

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
