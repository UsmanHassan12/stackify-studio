<?php

namespace App\Models;

use App\Models\Concerns\HasPublicSlug;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasPublicSlug;

    protected $fillable = [
        'title',
        'slug',
        'icon_class',
        'summary',
        'body',
        'link_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
