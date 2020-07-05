<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function view($slug)
    {
        $temp = new Post();
        $temp->title = 'Test slug';
        $temp->slug = 'test-slug';
        $temp->content = 'asdasdadadadaersgfz';
        return view('front.post', ['post' => $temp]);
    }
}
