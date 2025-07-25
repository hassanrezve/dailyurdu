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
        $defaultImage = asset('/noimage.webp');

        if (!$this->image_url) {
            return $defaultImage;
        }

        $imagePath = '/home/dailyurd/public_html/' . $this->image_url;

        if (!file_exists($imagePath)) {
            return $defaultImage;
        }

        return asset($this->image_url);
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
