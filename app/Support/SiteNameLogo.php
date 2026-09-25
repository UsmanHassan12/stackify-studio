<?php

namespace App\Support;

final class SiteNameLogo
{
    public static function normalized(?string $siteName): string
    {
        $full = trim((string) ($siteName ?? ''));

        return $full !== '' ? $full : 'Stackify Studio';
    }

    /**
     * @return list<string>
     */
    public static function parts(?string $siteName): array
    {
        $full = self::normalized($siteName);
        $parts = preg_split('/\s+/', $full, 2, PREG_SPLIT_NO_EMPTY) ?: [];
        if (count($parts) < 2) {
            $parts = preg_split('/(?<=[a-z])(?=[A-Z])/', $full, 2, PREG_SPLIT_NO_EMPTY) ?: [];
        }

        return $parts !== [] ? array_values($parts) : [self::normalized($siteName)];
    }

    public static function displayHtml(?string $siteName): string
    {
        $parts = self::parts($siteName);

        if (count($parts) >= 2) {
            return e($parts[0]) . '<strong>' . e($parts[1]) . '</strong>';
        }

        return e($parts[0] ?? self::normalized($siteName));
    }

    /** Two-letter mark: first letter of each segment, upper then lower (e.g. "Ss"). */
    public static function monogram(?string $siteName): string
    {
        $parts = self::parts($siteName);

        if (count($parts) >= 2) {
            $a = mb_substr($parts[0], 0, 1);
            $b = mb_substr($parts[1], 0, 1);

            return mb_strtoupper($a) . mb_strtolower($b);
        }

        $one = $parts[0] ?? '';
        if (mb_strlen($one) >= 2) {
            return mb_strtoupper(mb_substr($one, 0, 1)) . mb_strtolower(mb_substr($one, 1, 1));
        }

        if ($one !== '') {
            $c = mb_substr($one, 0, 1);

            return mb_strtoupper($c) . mb_strtolower($c);
        }

        return 'Ss';
    }
}
