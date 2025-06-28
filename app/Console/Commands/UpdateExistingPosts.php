<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class UpdateExistingPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all existing posts to have status=published if status is null';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = Post::whereNull('status')->update(['status' => 'published']);
        $this->info("Updated {$count} posts to status=published.");
        return Command::SUCCESS;
    }
}
