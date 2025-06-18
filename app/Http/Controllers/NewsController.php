<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a specific news article.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // TODO: Fetch news article from database using $slug
        return view('news', [
            'news' => [
                'title' => 'Sample News Title',
                'content' => 'Sample news content...',
                'category' => 'Politics',
                'published_at' => now(),
            ]
        ]);
    }

    /**
     * Display news articles by category.
     *
     * @param string $category
     * @return \Illuminate\View\View
     */
    public function category($category)
    {
        // TODO: Fetch news articles by category from database
        return view('category', [
            'category' => $category,
            'articles' => []
        ]);
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