<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Str;

class CheckImagePaths extends Command
{
    protected $signature = 'images:check';
    protected $description = 'Check current image paths in the database';

    public function handle()
    {
        $this->info('Checking image paths in posts table...');
        
        $posts = Post::select('id', 'title', 'image_url')->get();
        
        if ($posts->isEmpty()) {
            $this->warn('No posts found in the database.');
            return;
        }
        
        $this->table(
            ['ID', 'Title', 'Image URL', 'Type'],
            $posts->map(function ($post) {
                $type = 'No Image';
                if ($post->image_url) {
                    if (str_starts_with($post->image_url, 'uploads/posts/')) {
                        $type = 'New Public Path';
                    } elseif (filter_var($post->image_url, FILTER_VALIDATE_URL)) {
                        $type = 'Full URL';
                    } else {
                        $type = 'Old Path';
                    }
                }
                
                return [
                    $post->id,
                    Str::limit($post->title, 30),
                    $post->image_url ?: 'No image',
                    $type
                ];
            })
        );
        
        $this->info('Image path analysis complete!');
        $this->info('- New Public Path: Images stored in public/uploads/posts/');
        $this->info('- Full URL: External or absolute URLs');
        $this->info('- Old Path: Relative paths (likely in storage)');
    }
} 