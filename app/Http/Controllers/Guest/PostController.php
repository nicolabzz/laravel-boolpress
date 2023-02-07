<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return view('guest.posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('guest.posts.show', compact('post'));
    }
}
