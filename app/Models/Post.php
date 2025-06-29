<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image_url', 'views', 'status', 'featured'];

    protected $casts = [
        'featured' => 'boolean',
    ];

    // Add default eager loading for categories
    protected $with = ['categories'];

    protected static function booted()
    {
        // Clear news cache when posts are created, updated, or deleted
        static::created(function ($post) {
            static::clearNewsCache();
        });

        static::updated(function ($post) {
            static::clearNewsCache();
        });

        static::deleted(function ($post) {
            static::clearNewsCache();
        });
    }

    private static function clearNewsCache()
    {
        $newsCacheKeys = [
            'recent_articles',
            'global_latest_news',
            'popular_articles',
            'home_featured_post',
            'home_categories'
        ];

        foreach ($newsCacheKeys as $key) {
            Cache::forget($key);
        }
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getImageAttribute()
    {
        if (!$this->image_url) {
            return asset('/noimage.webp');
        }
        
        // For new images stored in public/uploads/posts/
        if (str_starts_with($this->image_url, 'uploads/posts/')) {
            if (file_exists(public_path($this->image_url))) {
                return asset($this->image_url);
            }
        }
        
        // For old images that might be in storage or other locations
        // Try to use the image_url as is (it might be a full URL or relative path)
        if (filter_var($this->image_url, FILTER_VALIDATE_URL)) {
            // If it's a full URL, return as is
            return $this->image_url;
        } else {
            // If it's a relative path, try to serve it
            return asset($this->image_url);
        }
        
        // Fallback to no image
        return asset('/noimage.png');
    }
    
    public function url()
    {
        return url("/news/".$this->slug);
    }
    
    public function getDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    // Add scope for popular posts
    public function scopePopular($query, $limit = 6)
    {
        return $query->orderBy('views', 'desc')->take($limit);
    }

    // Add scope for recent posts
    public function scopeRecent($query, $limit = 6)
    {
        return $query->latest()->take($limit);
    }

    // Add scope for featured posts
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
