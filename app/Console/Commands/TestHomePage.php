<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\Category;

class TestHomePage extends Command
{
    protected $signature = 'home:test';
    protected $description = 'Test home page functionality';

    public function handle()
    {
        $this->info('Testing home page functionality...');
        
        // Check featured post
        $feature = Post::with('categories')
            ->where('status', 'published')
            ->latest()
            ->first();
            
        if ($feature) {
            $this->info('✅ Featured post found:');
            $this->line("   Title: {$feature->title}");
            $this->line("   Image: {$feature->image_url}");
            $this->line("   Status: {$feature->status}");
            $this->line("   Categories: " . $feature->categories->pluck('name')->implode(', '));
        } else {
            $this->warn('⚠️  No published posts found for featured section');
        }
        
        // Check categories
        $ids = [3, 8, 21, 10, 4];
        $categories = Category::whereIn('id', $ids)
            ->with(['posts' => function ($query) {
                $query->where('status', 'published')
                    ->latest()
                    ->take(4);
            }])
            ->get();
            
        $this->info("\n📊 Categories with posts:");
        foreach ($categories as $category) {
            $postCount = $category->posts->count();
            $this->line("   {$category->name}: {$postCount} posts");
        }
        
        // Check image paths
        $this->info("\n🖼️  Image path analysis:");
        $posts = Post::where('status', 'published')->take(5)->get();
        foreach ($posts as $post) {
            $imageType = 'No Image';
            if ($post->image_url) {
                if (str_starts_with($post->image_url, 'uploads/posts/')) {
                    $imageType = 'New Public Path';
                } elseif (filter_var($post->image_url, FILTER_VALIDATE_URL)) {
                    $imageType = 'Full URL';
                } else {
                    $imageType = 'Old Path';
                }
            }
            $this->line("   {$post->title}: {$imageType}");
        }
        
        $this->info("\n✅ Home page test completed!");
    }
} 