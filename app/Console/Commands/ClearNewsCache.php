<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearNewsCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-news-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear only news-related cache keys when new content is posted';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing news-related cache...');

        // Only clear cache keys that contain fresh content
        $newsCacheKeys = [
            'recent_articles',
            'global_latest_news',
            'popular_articles'
        ];

        foreach ($newsCacheKeys as $key) {
            if (Cache::has($key)) {
                Cache::forget($key);
                $this->line("✓ Cleared: {$key}");
            } else {
                $this->line("- Skipped: {$key} (not found)");
            }
        }

        $this->info('News cache cleared successfully!');
        $this->info('Static data (categories, searches) remains cached for performance.');

        return Command::SUCCESS;
    }
}
