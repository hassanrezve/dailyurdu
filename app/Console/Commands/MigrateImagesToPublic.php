<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class MigrateImagesToPublic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:migrate-to-public';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate existing images from storage to public folder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::whereNotNull('image_url')->get();
        $migrated = 0;
        $skipped = 0;

        foreach ($posts as $post) {
            // Skip if already in public folder
            if (strpos($post->image_url, 'uploads/') === 0) {
                $this->line("Skipping: {$post->title} (already in public folder)");
                $skipped++;
                continue;
            }

            // Check if image exists in storage
            if (Storage::disk('public')->exists($post->image_url)) {
                try {
                    // Get the original file
                    $imagePath = Storage::disk('public')->path($post->image_url);
                    
                    // Generate new filename
                    $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
                    $newFileName = time() . '_' . $post->id . '.' . $extension;
                    $newPath = public_path('uploads/posts/' . $newFileName);
                    
                    // Copy to public folder
                    copy($imagePath, $newPath);
                    
                    // Update database
                    $post->update(['image_url' => 'uploads/posts/' . $newFileName]);
                    
                    $this->line("Migrated: {$post->title}");
                    $migrated++;
                } catch (\Exception $e) {
                    $this->error("Failed to migrate: {$post->title} - {$e->getMessage()}");
                }
            } else {
                $this->warn("Image not found in storage: {$post->title}");
                $skipped++;
            }
        }

        $this->info("Migration completed!");
        $this->info("Migrated: {$migrated} images");
        $this->info("Skipped: {$skipped} images");

        return Command::SUCCESS;
    }
}
