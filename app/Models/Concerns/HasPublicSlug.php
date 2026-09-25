<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasPublicSlug
{
    public static function bootHasPublicSlug(): void
    {
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = static::nextUniqueSlug($model->title);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('title')) {
                $model->slug = static::nextUniqueSlug($model->title, $model->getKey());
            }
        });
    }

    public static function nextUniqueSlug(string $title, mixed $ignoreId = null): string
    {
        $base = Str::slug($title);
        if ($base === '') {
            $base = 'item';
        }

        $slug = $base;
        $n = 2;
        while (static::query()
            ->when($ignoreId !== null, fn ($q) => $q->where('id', '!=', $ignoreId))
            ->where('slug', $slug)
            ->exists()) {
            $slug = $base.'-'.$n;
            $n++;
        }

        return $slug;
    }
}
