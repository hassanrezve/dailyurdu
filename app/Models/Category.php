<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function url()
    {
        return url("/category/".$this->slug);
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post');
    }

}
