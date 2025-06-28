<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\NewsletterSubscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'draft_posts' => Post::where('status', 'draft')->count(),
            'total_categories' => Category::count(),
            'total_users' => User::count(),
            'total_subscribers' => NewsletterSubscriber::count(),
            'recent_posts' => Post::with('categories')->latest()->take(5)->get(),
            'popular_posts' => Post::orderBy('views', 'desc')->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
} 