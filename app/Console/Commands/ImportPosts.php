<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;

class ImportPosts extends Command
{
    protected $signature = 'import:posts';
    protected $description = 'Fetch and store all posts with categories and images';

    public function handle()
    {
        $this->info("🚀 Starting post import...");

        // Step 1: Fetch and map all categories
        $this->info("📦 Fetching categories...");
        $categoryResponse = Http::get('https://www.dailyurdu.net/wp-json/wp/v2/categories?per_page=100');

        if ($categoryResponse->failed()) {
            $this->error("❌ Failed to fetch categories");
            return 1;
        }

        $categoriesMap = [];
        foreach ($categoryResponse->json() as $cat) {
            $category = Category::firstOrCreate([
                'slug' => urldecode($cat['slug']),
            ], [
                'name' => html_entity_decode($cat['name'], ENT_QUOTES, 'UTF-8'),
            ]);
            $categoriesMap[$cat['id']] = $category->id;
        }

        // Step 2: Get total number of posts and pages
        $this->info("📊 Calculating total posts...");
        $countResponse = Http::get('https://www.dailyurdu.net/wp-json/wp/v2/posts?per_page=1');

        if ($countResponse->failed()) {
            $this->error("❌ Failed to retrieve post count");
            return 1;
        }

        $totalPosts = (int) $countResponse->header('X-WP-Total');
        $perPage = 100;
        $totalPages = (int) ceil($totalPosts / $perPage);

        $this->info("🧮 Total posts: $totalPosts | Pages: $totalPages");

        // Step 3: Loop through pages from oldest to newest
        $totalImported = 0;

        for ($page = 182; $page <= $totalPages; $page++) {
            $this->info("📥 Fetching page $page of $totalPages...");

            try {
                $postResponse = Http::retry(3, 5000)
                    ->timeout(60)
                    ->get("https://www.dailyurdu.net/wp-json/wp/v2/posts?per_page={$perPage}&page={$page}&orderby=date&order=asc");
            } catch (\Exception $e) {
                $this->error("❌ Error fetching page $page: " . $e->getMessage());
                continue;
            }

            if ($postResponse->failed() || empty($postResponse->json())) {
                $this->warn("⚠️ Skipping empty or failed response for page $page");
                continue;
            }

            foreach ($postResponse->json() as $postData) {
                $slug = urldecode($postData['slug']);

                // Skip if already exists
                if (Post::where('slug', $slug)->exists()) {
                    $this->info("🔁 Skipping existing post: $slug");
                    continue;
                }

                // Parse and decode
                $title = html_entity_decode(strip_tags($postData['title']['rendered']), ENT_QUOTES, 'UTF-8');
                $content = html_entity_decode($postData['content']['rendered'], ENT_QUOTES, 'UTF-8');

                // Parse dates
                try {
                    $createdAt = Carbon::parse($postData['date'])->utc();
                    $updatedAt = Carbon::parse($postData['modified'])->utc();
                } catch (\Exception $e) {
                    $this->warn("⚠️ Invalid date for $slug: " . $e->getMessage());
                    $createdAt = Carbon::now();
                    $updatedAt = Carbon::now();
                }

                // Parse image
                $imageUrl = null;
                if (!empty($postData['jetpack_featured_media_url'])) {
                    if (preg_match('/wp-content\/uploads\/(.+)/', $postData['jetpack_featured_media_url'], $matches)) {
                        $imageUrl = 'wp-content/uploads/' . $matches[1];
                    }
                }

                // Create post
                $post = Post::create([
                    'title' => $title,
                    'slug' => $slug,
                    'content' => $content,
                    'image_url' => $imageUrl,
                ]);

                $post->created_at = $createdAt;
                $post->updated_at = $updatedAt;
                $post->save();

                // Attach categories
                if (!empty($postData['categories'])) {
                    $postCategoryIds = collect($postData['categories'])
                        ->map(fn($id) => $categoriesMap[$id] ?? null)
                        ->filter()
                        ->toArray();

                    if (!empty($postCategoryIds)) {
                        $post->categories()->attach($postCategoryIds);
                    }
                }

                $totalImported++;
                $this->info("✅ Imported: {$post->title}");
            }

            sleep(3); // be nice to the API
        }

        $this->info("🎉 Import completed! Total posts imported: $totalImported");
        return 0;
    }
}
