<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Category;
use Illuminate\Http\Request;
use App\Models\User\Post;
use App\Models\User\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
        return view('user.blog',compact('posts'));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts();
        return view('user.blog',compact('posts'));

    }

    public function category(Category $category)
    {
        //$category = Category::where('slug',$slug)->get();
        $posts = $category->posts();    
        return view('user.blog',compact('posts'));

    }
}
