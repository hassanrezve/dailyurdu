<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private string $publicHtmlPath = '';
    public function __construct()
    {
        $this->publicHtmlPath=public_path();
    }
    public function index()
    {
        $posts = Post::with('categories')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('id', '!=', 1)->orderBy('name')->get();
        $mediaItems = \App\Models\Media::orderBy('created_at', 'desc')->take(24)->get();
        return view('admin.posts.create', compact('categories', 'mediaItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'media_id' => 'nullable|exists:media,id',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id|not_in:1',
            'status' => 'required|in:draft,published',
            'featured' => 'nullable',
        ], [
            'categories.required' => 'Please select at least one category.',
            'categories.min' => 'Please select at least one category.',
            'categories.*.exists' => 'One or more selected categories are invalid.',
            'categories.*.not_in' => 'Category ID 1 is not allowed.',
        ]);
        $slug = preg_replace('/[^\p{Arabic}\p{L}\p{N}\s-]/u', '', str_replace(' ', '-', $request->title));

        $data = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'status' => $request->status,
            'featured' => $request->has('featured'),
        ];


        if ($request->filled('media_id')) {
            $media = \App\Models\Media::find($request->input('media_id'));
            if ($media) {
                $data['image_url'] = $media->path; // store relative path for compatibility
            }
        }

        if ($data['featured']) {
            $this->unsetAllFeaturedPosts();
        }

        $post = Post::create($data);
        $post->categories()->attach($request->categories);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $categories = Category::where('id', '!=', 1)->orderBy('name')->get();
        $selectedCategories = $post->categories->where('id', '!=', 1)->pluck('id')->toArray();
        $mediaItems = \App\Models\Media::orderBy('created_at', 'desc')->take(24)->get();
        return view('admin.posts.edit', compact('post', 'categories', 'selectedCategories', 'mediaItems'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'media_id' => 'nullable|exists:media,id',
            'categories' => 'required|array|min:1',
            'categories.*' => 'exists:categories,id|not_in:1',
            'status' => 'required|in:draft,published',
            'featured' => 'nullable',
        ], [
            'categories.required' => 'Please select at least one category.',
            'categories.min' => 'Please select at least one category.',
            'categories.*.exists' => 'One or more selected categories are invalid.',
            'categories.*.not_in' => 'Category ID 1 is not allowed.',
        ]);
        $slug = preg_replace('/[^\p{Arabic}\p{L}\p{N}\s-]/u', '', str_replace(' ', '-', $request->title));
          $data = [
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'status' => $request->status,
            'featured' => $request->has('featured'),
        ];

        if ($request->filled('media_id')) {
            $media = \App\Models\Media::find($request->input('media_id'));
            if ($media) {
                $data['image_url'] = $media->path;
            }
        }

        if ($data['featured']) {
            $this->unsetAllFeaturedPosts($post->id);
        }

        $post->update($data);
        $post->categories()->sync($request->categories);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->image_url && str_starts_with($post->image_url, 'uploads/posts/')) {
            $imagePath = $this->publicHtmlPath . '/' . $post->image_url;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully.');
    }

    private function unsetAllFeaturedPosts($excludePostId = null)
    {
        $query = Post::where('featured', true);

        if ($excludePostId) {
            $query->where('id', '!=', $excludePostId);
        }

        $query->update(['featured' => false]);
    }


}
