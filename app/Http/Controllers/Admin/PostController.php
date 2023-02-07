<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->paginate();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(Request $request)
    {
        // validare
        $data = $request->all();

        // salvare
        $post = new Post;
        $post->user_id      = Auth::id();
        $post->title        = $data['title'];
        $post->city         = $data['city'];
        $post->description  = $data['description'];
        $post->save();

        // TODO: gestire i tags

        // ridirezionare
        return redirect()->route('guest.posts.show', ['post' => $post]);
    }


    public function edit(Post $post)
    {
        if (Auth::id() !== $post->user_id) abort(401);

        return view('admin.posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id) abort(401);

        // validare
        $data = $request->all();

        // aggiornare i dati
        $post->title        = $data['title'];
        $post->city         = $data['city'];
        $post->description  = $data['description'];
        $post->update();

        // TODO: gestire i tags

        // ridirezionare
        return redirect()->route('guest.posts.show', ['post' => $post]);
    }


    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id) abort(401);

        // disassociare tutti i tags associati al post
        $post->tags()->detach();

        // eliminare il post
        $post->delete();

        // ridirezionare
        return redirect()->route('admin.posts.index')->with('success_delete', $post);
    }
}
