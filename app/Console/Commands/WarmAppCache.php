<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\Category;
use App\Models\SearchTerm;

class WarmAppCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:warm-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warm up application cache by pre-populating frequently accessed data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Warming up application cache...');

        // Cache popular searches
        $this->line('Caching popular searches...');
        $popularSearches = SearchTerm::orderBy('count', 'desc')->take(6)->pluck('term');
        Cache::put('popular_searches', $popularSearches, 5 * 60);
        $this->info("✓ Cached {$popularSearches->count()} popular searches");

        // Cache all categories
        $this->line('Caching all categories...');
        $allCategories = Category::orderBy('name')->get();
        Cache::put('all_categories', $allCategories, 5 * 60);
        $this->info("✓ Cached {$allCategories->count()} categories");

        // Cache footer categories
        $this->line('Caching footer categories...');
        $footerCategories = Category::where('id', '!=', 1)->inRandomOrder()->take(4)->get();
        Cache::put('footer_categories', $footerCategories, 5 * 60);
        $this->info("✓ Cached {$footerCategories->count()} footer categories");

        // Cache recent articles
        $this->line('Caching recent articles...');
        $recentArticles = Post::recent(6)->get();
        Cache::put('recent_articles', $recentArticles, 2 * 60);
        $this->info("✓ Cached {$recentArticles->count()} recent articles");

        // Cache latest news
        $this->line('Caching latest news...');
        $globalLatestNews = Post::recent(6)->get();
        Cache::put('global_latest_news', $globalLatestNews, 2 * 60);
        $this->info("✓ Cached {$globalLatestNews->count()} latest news");

        // Cache popular articles
        $this->line('Caching popular articles...');
        $popularArticles = Post::popular(6)->get();
        Cache::put('popular_articles', $popularArticles, 5 * 60);
        $this->info("✓ Cached {$popularArticles->count()} popular articles");

        $this->info('Application cache warmed up successfully!');

        return Command::SUCCESS;
    }
}
