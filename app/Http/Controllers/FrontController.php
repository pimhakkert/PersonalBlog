<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    function index()
    {
        $posts = Post::where('is_published', '=', '1')->orderBy('created_at','desc')->get();
        return view('front.index', ['posts' => $posts]);
    }
}
