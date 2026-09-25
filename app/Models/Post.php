<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'summary',
        'content',
        'image_path',
        'author',
        'read_time',
        'published_at',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
