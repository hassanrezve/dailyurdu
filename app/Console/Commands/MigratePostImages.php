<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MigratePostImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:migrate-images {--dry-run : Show what would be done without actually doing it} {--force : Force migration even if destination exists}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find existing post images and move them to new posts folder structure, updating database paths';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dryRun = $this->option('dry-run');
        $force = $this->option('force');
        
        if ($dryRun) {
            $this->warn('🔍 DRY RUN MODE - No files will be moved or database updated');
        }
        
        $this->info('🔍 Finding existing post images...');
        
        // Get all posts with images
        $postsWithImages = Post::whereNotNull('image_url')
            ->where('image_url', '!=', '')
            ->get(['id', 'title', 'image_url', 'created_at']);
        
        $totalPostsWithImages = $postsWithImages->count();
        $this->info("📊 Total posts with images in database: {$totalPostsWithImages}");
        
        if ($totalPostsWithImages === 0) {
            $this->warn('⚠️  No posts with images found in database.');
            return;
        }
        
        $this->newLine();
        $this->info('🔍 Analyzing image locations...');
        
        $migratableImages = [];
        $alreadyInNewLocation = [];
        $missingImages = [];
        $externalUrls = [];
        
        $progressBar = $this->output->createProgressBar($totalPostsWithImages);
        $progressBar->start();
        
        foreach ($postsWithImages as $post) {
            $currentPath = $this->getCurrentImagePath($post->image_url);
            $newPath = $this->getNewImagePath($post);
            
            $imageInfo = [
                'post_id' => $post->id,
                'title' => $post->title,
                'current_url' => $post->image_url,
                'current_path' => $currentPath,
                'new_path' => $newPath,
                'new_url' => 'uploads/posts/' . basename($newPath),
                'created_at' => $post->created_at->format('Y-m-d H:i:s')
            ];
            
            // Check if it's already in the new location
            if (str_starts_with($post->image_url, 'uploads/posts/')) {
                $alreadyInNewLocation[] = $imageInfo;
            }
            // Check if it's an external URL
            elseif (filter_var($post->image_url, FILTER_VALIDATE_URL)) {
                $externalUrls[] = $imageInfo;
            }
            // Check if current file exists
            elseif ($currentPath && file_exists($currentPath)) {
                $migratableImages[] = $imageInfo;
            }
            // File is missing
            else {
                $missingImages[] = $imageInfo;
            }
            
            $progressBar->advance();
        }
        
        $progressBar->finish();
        $this->newLine(2);
        
        // Display analysis results
        $this->displayAnalysis($migratableImages, $alreadyInNewLocation, $missingImages, $externalUrls);
        
        if (empty($migratableImages)) {
            $this->warn('⚠️  No images found that need migration.');
            return;
        }
        
        if (!$dryRun) {
            $this->newLine();
            if (!$this->confirm('Do you want to proceed with migrating ' . count($migratableImages) . ' images?')) {
                $this->info('Migration cancelled.');
                return;
            }
        }
        
        // Perform migration
        $this->performMigration($migratableImages, $dryRun, $force);
    }
    
    /**
     * Get the current full path of the image
     */
    private function getCurrentImagePath($imageUrl)
    {
        // Handle different image URL formats
        if (str_starts_with($imageUrl, 'uploads/posts/')) {
            return public_path($imageUrl);
        }
        
        if (str_starts_with($imageUrl, '/uploads/posts/')) {
            return public_path(ltrim($imageUrl, '/'));
        }
        
        if (str_starts_with($imageUrl, '/')) {
            return public_path(ltrim($imageUrl, '/'));
        }
        
        // If it's a full URL, we can't access it locally
        if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            return null;
        }
        
        // Try different possible locations
        $possiblePaths = [
            public_path($imageUrl),
            public_path('storage/' . $imageUrl),
            storage_path('app/public/' . $imageUrl),
            storage_path('app/' . $imageUrl)
        ];
        
        foreach ($possiblePaths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }
        
        return null;
    }
    
    /**
     * Generate new image path for the post
     */
    private function getNewImagePath($post)
    {
        $extension = pathinfo($post->image_url, PATHINFO_EXTENSION);
        if (empty($extension)) {
            $extension = 'jpg'; // Default extension
        }
        
        $filename = time() . '_' . Str::slug($post->title) . '.' . $extension;
        return public_path('uploads/posts/' . $filename);
    }
    
    /**
     * Display analysis results
     */
    private function displayAnalysis($migratableImages, $alreadyInNewLocation, $missingImages, $externalUrls)
    {
        $this->info('📈 ANALYSIS RESULTS:');
        $this->table(
            ['Category', 'Count', 'Description'],
            [
                ['🔄 Migratable', count($migratableImages), 'Images that can be moved to new location'],
                ['✅ Already New', count($alreadyInNewLocation), 'Images already in uploads/posts/'],
                ['❌ Missing', count($missingImages), 'Images that cannot be found'],
                ['🌐 External URLs', count($externalUrls), 'External image URLs (cannot migrate)']
            ]
        );
        
        $this->newLine();
        
        if (!empty($migratableImages)) {
            $this->info('🔄 MIGRATABLE IMAGES (first 5):');
            $this->table(
                ['Post ID', 'Title', 'Current Path', 'New Path'],
                array_map(function($img) {
                    return [
                        $img['post_id'],
                        Str::limit($img['title'], 30),
                        Str::limit($img['current_path'], 50),
                        Str::limit($img['new_path'], 50)
                    ];
                }, array_slice($migratableImages, 0, 5))
            );
            
            if (count($migratableImages) > 5) {
                $this->info('... and ' . (count($migratableImages) - 5) . ' more images.');
            }
        }
    }
    
    /**
     * Perform the actual migration
     */
    private function performMigration($migratableImages, $dryRun, $force)
    {
        $this->newLine();
        $this->info('🚀 Starting migration...');
        
        $successCount = 0;
        $errorCount = 0;
        $skippedCount = 0;
        
        // Ensure uploads/posts directory exists
        $uploadsDir = public_path('uploads/posts');
        if (!$dryRun && !file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
            $this->info("📁 Created directory: {$uploadsDir}");
        }
        
        $progressBar = $this->output->createProgressBar(count($migratableImages));
        $progressBar->start();
        
        foreach ($migratableImages as $image) {
            try {
                // Check if destination already exists
                if (file_exists($image['new_path']) && !$force) {
                    $skippedCount++;
                    $progressBar->advance();
                    continue;
                }
                
                if (!$dryRun) {
                    // Copy the file
                    if (copy($image['current_path'], $image['new_path'])) {
                        // Update database
                        Post::where('id', $image['post_id'])->update([
                            'image_url' => $image['new_url']
                        ]);
                        $successCount++;
                    } else {
                        $errorCount++;
                    }
                } else {
                    $successCount++; // Count as success in dry run
                }
                
            } catch (\Exception $e) {
                $errorCount++;
                if (!$dryRun) {
                    $this->error("Error migrating image for post {$image['post_id']}: " . $e->getMessage());
                }
            }
            
            $progressBar->advance();
        }
        
        $progressBar->finish();
        $this->newLine(2);
        
        // Display results
        $this->displayMigrationResults($successCount, $errorCount, $skippedCount, $dryRun);
    }
    
    /**
     * Display migration results
     */
    private function displayMigrationResults($successCount, $errorCount, $skippedCount, $dryRun)
    {
        $this->info('📊 MIGRATION RESULTS:');
        
        if ($dryRun) {
            $this->table(
                ['Metric', 'Count', 'Description'],
                [
                    ['✅ Would Migrate', $successCount, 'Images that would be moved'],
                    ['❌ Would Fail', $errorCount, 'Images that would fail'],
                    ['⏭️ Would Skip', $skippedCount, 'Images that would be skipped (already exist)']
                ]
            );
            $this->warn('This was a dry run. No files were actually moved or database updated.');
        } else {
            $this->table(
                ['Metric', 'Count', 'Description'],
                [
                    ['✅ Successfully Migrated', $successCount, 'Images moved and database updated'],
                    ['❌ Failed', $errorCount, 'Images that failed to migrate'],
                    ['⏭️ Skipped', $skippedCount, 'Images skipped (already existed)']
                ]
            );
            
            if ($successCount > 0) {
                $this->info("🎉 Successfully migrated {$successCount} images to uploads/posts/");
            }
            
            if ($errorCount > 0) {
                $this->error("⚠️ {$errorCount} images failed to migrate. Check the logs above.");
            }
        }
    }
} 