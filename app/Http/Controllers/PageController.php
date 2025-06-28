<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{

    public function index()
    {
        // Get featured post (or latest published post as fallback)
        $feature = Cache::remember('home_featured_post', 300, function () {
            // First try to get a featured post
            $featured = Post::with('categories')
                ->where('status', 'published')
                ->featured()
                ->latest()
                ->first();
                
            // If no featured post, get the latest published post
            if (!$featured) {
                $featured = Post::with('categories')
                    ->where('status', 'published')
                    ->latest()
                    ->first();
            }
            
            return $featured;
        });

        // Get categories with their latest posts
        $categories = Cache::remember('home_categories', 300, function () {
            $ids = [3, 8, 21, 10, 4];
            return Category::whereIn('id', $ids)
                ->with(['posts' => function ($query) {
                    $query->where('status', 'published')
                        ->latest()
                        ->take(4)
                        ->with('categories');
                }])
                ->get();
        });

        return view('home', compact('feature', 'categories'));
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Display the privacy policy page.
     *
     * @return \Illuminate\View\View
     */
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO: Implement contact form submission logic
        // For example, send email, store in database, etc.

        return redirect()->route('contact')
            ->with('success', 'آپ کا پیغام کامیابی سے بھیج دیا گیا ہے۔');
    }

    /**
     * Display the advertising page.
     *
     * @return \Illuminate\View\View
     */
    public function advertise()
    {
        return view('advertise');
    }

    /**
     * Display the careers page.
     *
     * @return \Illuminate\View\View
     */
    public function careers()
    {
        return view('careers');
    }
}
