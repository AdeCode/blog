<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->paginate(5);
        return view('user.blog',compact('posts'));
    }
}
