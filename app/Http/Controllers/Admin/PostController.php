<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private string $publicHtmlPath = '/home/dailyurd/public_html';

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
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
            'featured' => $request->has('featured'),
        ];

        if ($request->hasFile('image_url')) {
            $destinationPath = $this->publicHtmlPath . '/uploads/posts';
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image = $request->file('image_url');
            $nameWithoutExt = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $webpRelativePath = $this->convertToWebP($image, $destinationPath, $nameWithoutExt);

            if ($webpRelativePath) {
                $data['image_url'] = $webpRelativePath;
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
        return view('admin.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'status' => $request->status,
            'featured' => $request->has('featured'),
        ];

        if ($request->hasFile('image_url')) {
            if ($post->image_url && str_starts_with($post->image_url, 'uploads/posts/')) {
                $oldPath = $this->publicHtmlPath . '/' . $post->image_url;
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $destinationPath = $this->publicHtmlPath . '/uploads/posts';
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $image = $request->file('image_url');
            $nameWithoutExt = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $webpRelativePath = $this->convertToWebP($image, $destinationPath, $nameWithoutExt);

            if ($webpRelativePath) {
                $data['image_url'] = $webpRelativePath;
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

    private function convertToWebP($image, $destinationPath, $nameWithoutExt): ?string
    {
        $extension = strtolower($image->getClientOriginalExtension());
        $webpPath = $destinationPath . '/' . $nameWithoutExt . '.webp';

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $img = imagecreatefromjpeg($image->getRealPath());
                break;
            case 'png':
                $img = imagecreatefrompng($image->getRealPath());
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
                break;
            case 'gif':
                $img = imagecreatefromgif($image->getRealPath());
                break;
            default:
                return null;
        }

        imagewebp($img, $webpPath, 80);
        imagedestroy($img);

        return 'uploads/posts/' . $nameWithoutExt . '.webp';
    }
}
