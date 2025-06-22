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

    public function getImageAttribute()
    {
        return $this->image_url ? asset($this->image_url): asset('/noimage.png');
    }
    public function url()
    {
        return url("/news/".$this->slug);
    }
    public function getDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
