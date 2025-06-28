<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckPostImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:check-images {--format=table : Output format (table, json, csv)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check all post images in database and verify their existence in public folder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Checking post images in database...');
        
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
        $this->info('🔍 Verifying image files...');
        
        $existingImages = [];
        $missingImages = [];
        
        $progressBar = $this->output->createProgressBar($totalPostsWithImages);
        $progressBar->start();
        
        foreach ($postsWithImages as $post) {
            $imagePath = $this->getImagePath($post->image_url);
            $exists = $imagePath && file_exists($imagePath);
            
            $imageInfo = [
                'post_id' => $post->id,
                'title' => $post->title,
                'image_url' => $post->image_url,
                'full_path' => $imagePath,
                'exists' => $exists,
                'created_at' => $post->created_at->format('Y-m-d H:i:s')
            ];
            
            if ($exists) {
                $existingImages[] = $imageInfo;
            } else {
                $missingImages[] = $imageInfo;
            }
            
            $progressBar->advance();
        }
        
        $progressBar->finish();
        $this->newLine(2);
        
        // Display summary
        $this->displaySummary($existingImages, $missingImages);
        
        // Display detailed results based on format option
        $format = $this->option('format');
        
        switch ($format) {
            case 'json':
                $this->displayJsonResults($existingImages, $missingImages);
                break;
            case 'csv':
                $this->displayCsvResults($existingImages, $missingImages);
                break;
            default:
                $this->displayTableResults($existingImages, $missingImages);
                break;
        }
    }
    
    /**
     * Get the full path to the image file
     */
    private function getImagePath($imageUrl)
    {
        // Handle different image URL formats
        if (str_starts_with($imageUrl, 'uploads/posts/')) {
            return public_path($imageUrl);
        }
        
        if (str_starts_with($imageUrl, '/uploads/posts/')) {
            return public_path(ltrim($imageUrl, '/'));
        }
        
        // If it's a full URL, we can't check it locally
        if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
            return null;
        }
        
        // Assume it's a relative path
        return public_path($imageUrl);
    }
    
    /**
     * Display summary statistics
     */
    private function displaySummary($existingImages, $missingImages)
    {
        $totalImages = count($existingImages) + count($missingImages);
        $existingCount = count($existingImages);
        $missingCount = count($missingImages);
        $percentage = $totalImages > 0 ? round(($existingCount / $totalImages) * 100, 2) : 0;
        
        $this->info('📈 SUMMARY:');
        $this->table(
            ['Metric', 'Count', 'Percentage'],
            [
                ['Total Images', $totalImages, '100%'],
                ['✅ Existing Images', $existingCount, $percentage . '%'],
                ['❌ Missing Images', $missingCount, (100 - $percentage) . '%']
            ]
        );
        
        $this->newLine();
    }
    
    /**
     * Display results in table format
     */
    private function displayTableResults($existingImages, $missingImages)
    {
        if (!empty($missingImages)) {
            $this->error('❌ MISSING IMAGES:');
            $this->table(
                ['Post ID', 'Title', 'Image URL', 'Full Path'],
                array_map(function($img) {
                    return [
                        $img['post_id'],
                        Str::limit($img['title'], 30),
                        Str::limit($img['image_url'], 40),
                        Str::limit($img['full_path'] ?? 'N/A', 50)
                    ];
                }, $missingImages)
            );
            $this->newLine();
        }
        
        if (!empty($existingImages)) {
            $this->info('✅ EXISTING IMAGES:');
            $this->table(
                ['Post ID', 'Title', 'Image URL', 'File Size'],
                array_map(function($img) {
                    $fileSize = file_exists($img['full_path']) ? $this->formatFileSize(filesize($img['full_path'])) : 'N/A';
                    return [
                        $img['post_id'],
                        Str::limit($img['title'], 30),
                        Str::limit($img['image_url'], 40),
                        $fileSize
                    ];
                }, array_slice($existingImages, 0, 10)) // Show first 10 existing images
            );
            
            if (count($existingImages) > 10) {
                $this->info('... and ' . (count($existingImages) - 10) . ' more existing images.');
            }
        }
    }
    
    /**
     * Display results in JSON format
     */
    private function displayJsonResults($existingImages, $missingImages)
    {
        $results = [
            'summary' => [
                'total_images' => count($existingImages) + count($missingImages),
                'existing_images' => count($existingImages),
                'missing_images' => count($missingImages),
                'percentage_existing' => count($existingImages) + count($missingImages) > 0 
                    ? round((count($existingImages) / (count($existingImages) + count($missingImages))) * 100, 2) 
                    : 0
            ],
            'missing_images' => $missingImages,
            'existing_images' => array_slice($existingImages, 0, 10) // Limit to first 10
        ];
        
        $this->line(json_encode($results, JSON_PRETTY_PRINT));
    }
    
    /**
     * Display results in CSV format
     */
    private function displayCsvResults($existingImages, $missingImages)
    {
        $this->info('CSV Output:');
        $this->line('Post ID,Title,Image URL,Status,Full Path');
        
        foreach ($missingImages as $img) {
            $this->line(sprintf(
                '%d,"%s","%s","MISSING","%s"',
                $img['post_id'],
                str_replace('"', '""', $img['title']),
                str_replace('"', '""', $img['image_url']),
                str_replace('"', '""', $img['full_path'] ?? 'N/A')
            ));
        }
        
        foreach ($existingImages as $img) {
            $this->line(sprintf(
                '%d,"%s","%s","EXISTS","%s"',
                $img['post_id'],
                str_replace('"', '""', $img['title']),
                str_replace('"', '""', $img['image_url']),
                str_replace('"', '""', $img['full_path'])
            ));
        }
    }
    
    /**
     * Format file size in human readable format
     */
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }
} 