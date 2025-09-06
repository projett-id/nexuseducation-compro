<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
