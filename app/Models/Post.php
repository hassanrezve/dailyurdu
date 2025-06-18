<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image_url'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);

            // Ensure uniqueness
            $originalSlug = $post->slug;
            $counter = 1;
            while (static::where('slug', $post->slug)->exists()) {
                $post->slug = $originalSlug . '-' . $counter++;
            }
        });
    }
}
