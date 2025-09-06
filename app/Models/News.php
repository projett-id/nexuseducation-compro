<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','title', 'slug', 'content', 'excerpt',
        'thumbnail', 'status', 'published_at', 'author_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tag');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
