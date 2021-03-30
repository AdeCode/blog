<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Post;

class PostController extends Controller
{
    public function index()
    {
        Post::all();
        return view('user.post');
    }

    public function post(Post $post)
    {
        //return $slug;
        return view('user.post', compact('post'));
    }
}
