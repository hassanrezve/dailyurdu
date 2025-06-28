<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'status' => 'required|in:draft,published',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
        ];

        // Handle image upload to public folder
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/posts'), $imageName);
            $data['image_url'] = 'uploads/posts/' . $imageName;
        }

        $post = Post::create($data);
        $post->categories()->attach($request->categories);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        $selectedCategories = $post->categories->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id',
            'status' => 'required|in:draft,published',
        ]);

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
        ];

        // Handle image upload to public folder
        if ($request->hasFile('image_url')) {
            // Delete old image if exists
            if ($post->image_url && file_exists(public_path($post->image_url))) {
                unlink(public_path($post->image_url));
            }
            
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/posts'), $imageName);
            $data['image_url'] = 'uploads/posts/' . $imageName;
        }

        $post->update($data);
        $post->categories()->sync($request->categories);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Delete image from public folder if exists
        if ($post->image_url && file_exists(public_path($post->image_url))) {
            unlink(public_path($post->image_url));
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }
} 