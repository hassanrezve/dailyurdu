<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class ImportPosts extends Command
{
    protected $signature = 'import:posts';
    protected $description = 'Fetch and store all posts with categories and images';

    public function handle()
    {
        $this->info("Starting post import...");

        // Step 1: Fetch and map all categories
        // $this->info("Fetching categories...");
        // $categoryResponse = Http::get('https://www.dailyurdu.net/wp-json/wp/v2/categories?per_page=100');

        // if ($categoryResponse->failed()) {
        //     $this->error("Failed to fetch categories");
        //     return 1;
        // }

        // $categoriesMap = [];
        // foreach ($categoryResponse->json() as $cat) {
        //     $category = Category::firstOrCreate([
        //         'slug' => $cat['slug']
        //     ], [
        //         'name' => $cat['name']
        //     ]);
        //     $categoriesMap[$cat['id']] = $category->id;
        // }

        // Step 2: Fetch posts page by page
        $page = 1;
        $perPage = 100;
        $done = false;
        $totalImported = 0;

        while (!$done) {
            $this->info("Fetching posts page $page...");

            try {
                $postResponse = Http::retry(3, 5000)
                                ->timeout(60)
                                ->get("https://www.dailyurdu.net/wp-json/wp/v2/posts?per_page=50&page={$page}");
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                $this->error("Failed to fetch page {$page}: " . $e->getMessage());
              
            }
            
            if ($postResponse->status() === 400 || empty($postResponse->json())) {
                $done = true;
                $this->info("No more posts to fetch.");
                break;
            }

            if ($postResponse->failed()) {
                $this->error("Error fetching page $page");
                break;
            }
            
            foreach ($postResponse->json() as $postData) {
                $slug = Str::slug($postData['title']['rendered']);
                if (Post::where('slug', $slug)->exists()) 
                {
                    $this->info("skipping post fount. $slug");
                    continue;}
                $imageUrl = $postData['jetpack_featured_media_url'] ?? null;

                if ($imageUrl) {
                    $imageExtension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
                    $imageName = $slug . '.' . $imageExtension;
                    $uploadDir = public_path('uploads');
                
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0755, true);
                    }
                
                    $localPath = $uploadDir . '/' . $imageName;
                
                    try {
                        $response = Http::withHeaders([
                            'User-Agent' => 'Mozilla/5.0 (compatible; YourAppName/1.0)'
                        ])->get($imageUrl);
                
                        if ($response->ok()) {
                            file_put_contents($localPath, $response->body());
                            $image = 'uploads/' . $imageName;
                        } else {
                            $this->error("Failed to download image: {$imageUrl}");
                            $image = null;
                        }
                    } catch (\Exception $e) {
                        $this->error("Exception downloading image: {$imageUrl} - " . $e->getMessage());
                        $image = null;
                    }
                } else {
                    $image = null;
                }
                
            
                
                // Create post
                $post = Post::create([
                    'title' => $postData['title']['rendered'],
                    'slug' => $slug,
                    'content' => $postData['content']['rendered'],
                    'image_url' => $image
                ]);
                $this->info("Done. creating post $post->title");
                // Attach categories
                $postCategoryIds = collect($postData['categories'])
                    ->map(fn($id) => $categoriesMap[$id] ?? null)
                    ->filter()
                    ->toArray();

                $post->categories()->attach($postCategoryIds);

                $totalImported++;
            }
            

            $page++;
            sleep(1); // be kind to the API
            $this->info("Done. Total posts imported: $totalImported");
        }

        $this->info("Done. Total posts imported: $totalImported");
        return 0;
    }
}
