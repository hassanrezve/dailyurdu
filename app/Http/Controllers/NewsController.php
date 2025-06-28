<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
class NewsController extends Controller
{
    /**
     * Display a specific news article.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        // Load categories to avoid N+1 queries
        $post->load('categories');
        
        // Increment the views count
        $post->increment('views');
        
        return view('news', compact("post"));
    }

    /**
     * Display news articles by category.
     *
     * @param string $category
     * @return \Illuminate\View\View
     */
    public function category(Category $category)
    {
        // Optimize: Load posts with categories in one query
        $posts = $category->posts()
            ->with('categories')
            ->latest()
            ->paginate(10);
            
        return view('category', compact('category', 'posts'));
    }

    /**
     * Search news articles.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Only record terms longer than 2 characters
        if ($query && mb_strlen($query) > 2) {
            $term = \App\Models\SearchTerm::where('term', $query)->first();
            if ($term) {
                $term->increment('count');
            } else {
                \App\Models\SearchTerm::create(['term' => $query, 'count' => 1]);
            }
        }

        // Optimize: Use proper eager loading and optimize search query
        $posts = \App\Models\Post::with('categories')
            ->where(function($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                  ->orWhereHas('categories', function($catQ) use ($query) {
                      $catQ->where('name', 'like', '%' . $query . '%');
                  });
            })
            ->latest()
            ->paginate(10);

        return view('blogs.index', compact('posts', 'query'));
    }
}
