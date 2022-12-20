<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        

        return view('posts.index',[
            'posts' => $posts
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post'=> $post
        ]);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'body' => 'required'
        ]);

        $req->user()->posts()->create($req->only('body'));

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        $post->delete();

        return back();
    }
}