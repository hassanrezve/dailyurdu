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
        // TODO: Fetch news article from database using $slug
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
        $posts = $category->posts()->latest()->paginate(10);
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

        // TODO: Implement search functionality
        return view('search', [
            'query' => $query,
            'results' => []
        ]);
    }
}
