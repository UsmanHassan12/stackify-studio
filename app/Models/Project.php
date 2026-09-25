<?php

namespace App\Models;

use App\Models\Concerns\HasPublicSlug;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasPublicSlug;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'short_description',
        'full_description',
        'image_path',
        'client_name',
        'live_url',
        'is_active',
    ];
}