<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactCard extends Model
{
    protected $fillable = [
        'title',
        'line_primary',
        'line_secondary',
        'icon_class',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
