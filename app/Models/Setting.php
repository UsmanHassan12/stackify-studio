<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    public static function put(string $key, ?string $value): void
    {
        static::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    public static function defaults(): array
    {
        return [
            'site_name' => 'Stackify Studio',
            'footer_tagline' => 'Engineering high-impact AI agents, LLM integrations, and modern intelligent software platforms.',
            'footer_address' => 'Islamabad, Pakistan',
            'footer_phone' => '+92 312 7535263',
            'footer_email' => 'info@stackifystudio.com',
            'whatsapp_number' => '+923127535263',
            'footer_hours' => 'Mon–Fri, 9am – 6pm PKT',
            'copyright_owner' => 'Stackify Studio',
            'default_meta_description' => 'Stackify Studio is a premier AI development & software engineering agency specializing in custom AI agents, LLM integrations, and modern platforms.',
            'public_site_label' => 'stackifystudio.com',
        ];
    }

    /**
     * @return array<string, string|null>
     */
    public static function allKeyed(): array
    {
        $db = static::query()->pluck('value', 'key')->all();
        $defaults = self::defaults();

        $legacy = [
            'footer_address' => ['San Francisco', 'Harbor View'],
            'footer_email'   => ['hello@stackifystudio.com'],
            'footer_phone'   => ['800 555', '+1 800'],
        ];

        foreach ($legacy as $key => $patterns) {
            if (isset($db[$key])) {
                foreach ($patterns as $pattern) {
                    if (str_contains($db[$key], $pattern)) {
                        $db[$key] = $defaults[$key];
                        static::query()->where('key', $key)->update(['value' => $defaults[$key]]);
                        break;
                    }
                }
            }
        }

        return array_merge($defaults, array_filter($db, fn ($v) => $v !== null && $v !== ''));
    }

    public static function getValue(string $key, ?string $default = null): ?string
    {
        $row = static::query()->where('key', $key)->value('value');

        return $row !== null && $row !== '' ? $row : (self::defaults()[$key] ?? $default);
    }
}
