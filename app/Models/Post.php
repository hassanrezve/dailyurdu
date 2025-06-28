<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image_url', 'views'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function getImageAttribute()
{
    $imagePath = public_path($this->image_url);
    if ($this->image_url && file_exists($imagePath)) {
        return asset($this->image_url);
    }
    return asset('/noimage.png');
}
    public function url()
    {
        return url("/news/".$this->slug);
    }
    public function getDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
