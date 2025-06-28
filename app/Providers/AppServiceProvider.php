<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Carbon::setLocale('ur');
        Paginator::defaultView('vendor.pagination.paginator');

        view()->composer('*', function ($view) {
            $popularSearches = \App\Models\SearchTerm::orderBy('count', 'desc')->take(6)->pluck('term');
            $view->with('popularSearches', $popularSearches);
            $allCategories = \App\Models\Category::orderBy('name')->get();
            $view->with('allCategories', $allCategories);
            $footerCategories = \App\Models\Category::where('id', '!=', 1)->inRandomOrder()->take(4)->get();
            $view->with('footerCategories', $footerCategories);

            // Global recent articles (for sidebar)
            $recentArticles = \App\Models\Post::latest()->take(6)->get();
            $view->with('recentArticles', $recentArticles);

            // Global latest news (for sidebar)
            $globalLatestNews = \App\Models\Post::latest()->take(6)->get();
            $view->with('globalLatestNews', $globalLatestNews);

            // Global weather (static for now)
            $globalWeather = [
                ['name' => 'کراچی', 'temp' => '32°C'],
                ['name' => 'لاہور', 'temp' => '28°C'],
            ];
            $view->with('globalWeather', $globalWeather);

            // Global popular articles (most viewed)
            $popularArticles = \App\Models\Post::orderBy('views', 'desc')->take(6)->get();
            $view->with('popularArticles', $popularArticles);

            
        });
    }
}
