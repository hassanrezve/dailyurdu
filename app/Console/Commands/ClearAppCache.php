<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearAppCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-cache {--all : Clear all application cache}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear application-specific cache keys';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cacheKeys = [
            'popular_searches',
            'all_categories',
            'footer_categories',
            'recent_articles',
            'global_latest_news',
            'popular_articles'
        ];

        if ($this->option('all')) {
            $this->info('Clearing all application cache...');
            Cache::flush();
            $this->info('All cache cleared successfully!');
        } else {
            $this->info('Clearing application-specific cache keys...');
            
            foreach ($cacheKeys as $key) {
                if (Cache::has($key)) {
                    Cache::forget($key);
                    $this->line("✓ Cleared: {$key}");
                } else {
                    $this->line("- Skipped: {$key} (not found)");
                }
            }
            
            $this->info('Application cache cleared successfully!');
        }

        return Command::SUCCESS;
    }
}
