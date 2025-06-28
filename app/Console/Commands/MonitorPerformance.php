<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Category;
use App\Models\SearchTerm;

class MonitorPerformance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:monitor-performance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Monitor application performance and cache status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('=== Performance Monitor ===');

        // Check cache status
        $this->checkCacheStatus();

        // Check database performance
        $this->checkDatabasePerformance();

        // Check query counts
        $this->checkQueryCounts();

        return Command::SUCCESS;
    }

    private function checkCacheStatus()
    {
        $this->info("\n📊 Cache Status:");
        
        $cacheKeys = [
            'popular_searches' => 'Popular Searches',
            'all_categories' => 'All Categories',
            'footer_categories' => 'Footer Categories',
            'recent_articles' => 'Recent Articles',
            'global_latest_news' => 'Latest News',
            'popular_articles' => 'Popular Articles'
        ];

        foreach ($cacheKeys as $key => $label) {
            $status = Cache::has($key) ? '✅ Cached' : '❌ Not Cached';
            $this->line("  {$label}: {$status}");
        }
    }

    private function checkDatabasePerformance()
    {
        $this->info("\n🗄️ Database Performance:");

        // Check table sizes
        $postCount = Post::count();
        $categoryCount = Category::count();
        $searchTermCount = SearchTerm::count();

        $this->line("  Posts: {$postCount}");
        $this->line("  Categories: {$categoryCount}");
        $this->line("  Search Terms: {$searchTermCount}");

        // Check if indexes exist (basic check)
        $this->info("\n📈 Index Status:");
        try {
            $postsWithViews = Post::where('views', '>', 0)->count();
            $this->line("  Posts with views: {$postsWithViews}");
        } catch (\Exception $e) {
            $this->line("  ⚠️ Views index may not exist");
        }
    }

    private function checkQueryCounts()
    {
        $this->info("\n🔍 Query Performance Test:");

        // Enable query logging
        DB::enableQueryLog();

        // Simulate typical page load queries
        $feature = Post::with('categories')->latest()->first();
        $categories = Category::whereIn('id', [3, 8, 21, 10, 4])
            ->with(['posts' => function ($query) {
                $query->latest()->take(4)->with('categories');
            }])
            ->get();

        $queryCount = count(DB::getQueryLog());
        $this->line("  Queries executed: {$queryCount}");

        if ($queryCount <= 5) {
            $this->line("  ✅ Good performance (≤5 queries)");
        } elseif ($queryCount <= 10) {
            $this->line("  ⚠️ Moderate performance (6-10 queries)");
        } else {
            $this->line("  ❌ Poor performance (>10 queries)");
        }

        // Disable query logging
        DB::disableQueryLog();
    }
}
