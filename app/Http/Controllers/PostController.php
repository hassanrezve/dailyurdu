<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
class PostController extends Controller
{
    public function index()
    {
        // dd(Post::latest()->first());
        $posts = Post::latest()->take(10)->get();
        return view('blogs.index', compact('posts'));
    }
    public function show($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();
    dd(Str::slug($post->title));
    return view('blogs.show', compact('post'));
}
}
