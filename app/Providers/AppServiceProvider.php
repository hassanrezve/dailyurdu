<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\Category;
use App\Models\SearchTerm;
use Illuminate\Support\Facades\File;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */


    public function register()
    {

    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('ur');
        Paginator::defaultView('vendor.pagination.paginator');

        view()->composer('*', function ($view) {
            // Cache frequently accessed data with shorter TTLs for daily news site
            $cacheDuration = 5 * 60; // 5 minutes for static data

            // Get popular searches with caching
            $popularSearches = Cache::remember('popular_searches', $cacheDuration, function () {
                return SearchTerm::orderBy('count', 'desc')->take(6)->pluck('term');
            });
            $view->with('popularSearches', $popularSearches);

            // Get all categories with caching
            $allCategories = Cache::remember('all_categories', $cacheDuration, function () {
                return Category::orderBy('name')->get();
            });
            $view->with('allCategories', $allCategories);

            // Get footer categories with caching
            $footerCategories = Cache::remember('footer_categories', $cacheDuration, function () {
                return Category::where('id', '!=', 1)->inRandomOrder()->take(4)->get();
            });
            $view->with('footerCategories', $footerCategories);

            // Get recent articles with very short caching (2 minutes) for fresh content
            $recentArticles = Cache::remember('recent_articles', 2 * 60, function () {
                return Post::recent(6)->get();
            });
            $view->with('recentArticles', $recentArticles);

            // Get latest news with very short caching (2 minutes) for fresh content
            $globalLatestNews = Cache::remember('global_latest_news', 2 * 60, function () {
                return Post::recent(6)->get();
            });
            $view->with('globalLatestNews', $globalLatestNews);

            // Global weather (static for now)
            $globalWeather = [
                ['name' => 'کراچی', 'temp' => '32°C'],
                ['name' => 'لاہور', 'temp' => '28°C'],
            ];
            $view->with('globalWeather', $globalWeather);

            // Get popular articles with moderate caching (5 minutes)
            $popularArticles = Cache::remember('popular_articles', 5 * 60, function () {
                return Post::popular(6)->get();
            });
            $view->with('popularArticles', $popularArticles);
        });
    }
}
