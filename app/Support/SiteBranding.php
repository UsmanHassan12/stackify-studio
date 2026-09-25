<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

final class SiteBranding
{
    private const DISK = 'public';

    /**
     * @param  array<string, string|null>  $settings
     */
    public static function siteLogoUrl(?array $settings): string
    {
        return self::customSiteLogoUrl($settings) ?? self::defaultLogoUrl();
    }

    /**
     * Custom uploaded logo only (null if none or not web-reachable).
     *
     * @param  array<string, string|null>  $settings
     */
    public static function customSiteLogoUrl(?array $settings): ?string
    {
        $path = $settings['site_logo_path'] ?? null;

        return self::publicDiskWebUrl(is_string($path) ? $path : null);
    }

    /**
     * Whether a custom uploaded logo is active.
     *
     * @param  array<string, string|null>  $settings
     */
    public static function hasCustomLogo(?array $settings): bool
    {
        return self::customSiteLogoUrl($settings) !== null;
    }

    /**
     * Default brand logo lockup URL.
     */
    public static function defaultLogoUrl(): string
    {
        return asset('img/core-img/stackify_final_lockup.svg');
    }

    /**
     * Default standalone brand mark icon URL.
     */
    public static function defaultMarkUrl(): string
    {
        return asset('img/core-img/stackify_mark.svg');
    }

    /**
     * Custom favicon only (null if none or not web-reachable).
     *
     * @param  array<string, string|null>  $settings
     */
    public static function storedFaviconUrl(?array $settings): ?string
    {
        $path = $settings['favicon_path'] ?? null;

        return self::publicDiskWebUrl(is_string($path) ? $path : null);
    }

    /**
     * @param  array<string, string|null>  $settings
     */
    public static function faviconUrl(?array $settings): string
    {
        return self::storedFaviconUrl($settings) ?? asset('img/core-img/favicon.svg');
    }

    /**
     * @param  array<string, string|null>  $settings
     */
    public static function schemaLogoUrl(?array $settings): string
    {
        return self::siteLogoUrl($settings) ?? self::faviconUrl($settings);
    }

    /**
     * URL for a file on the public disk only if it exists in storage and is
     * reachable via the public/storage symlink (avoids broken images when
     * APP_URL mismatches the browser host or storage:link is missing).
     */
    public static function publicDiskWebUrl(?string $relativePath): ?string
    {
        if (! is_string($relativePath) || $relativePath === '') {
            return null;
        }

        $path = str_replace('\\', '/', ltrim($relativePath, '/'));

        if (! Storage::disk(self::DISK)->exists($path)) {
            return null;
        }

        $publicFile = public_path('storage/'.$path);
        if (! is_file($publicFile)) {
            return null;
        }

        return self::absoluteUrlForPublicStorage($path);
    }

    /**
     * Prefer the active HTTP request host/path so logos work when APP_URL
     * does not match (e.g. 127.0.0.1 vs localhost, or WAMP subfolders).
     */
    private static function absoluteUrlForPublicStorage(string $normalizedPath): string
    {
        $req = request();
        if ($req instanceof Request && $req->getSchemeAndHttpHost()) {
            return $req->getSchemeAndHttpHost().rtrim($req->getBasePath(), '/').'/storage/'.$normalizedPath;
        }

        return asset('storage/'.$normalizedPath);
    }
}
