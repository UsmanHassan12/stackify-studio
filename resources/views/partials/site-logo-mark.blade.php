@php
    $customLogoUrl = \App\Support\SiteBranding::customSiteLogoUrl($settings ?? []);
    $siteLabel = \App\Support\SiteNameLogo::normalized($settings['site_name'] ?? null);
@endphp
@if ($customLogoUrl)
    <img src="{{ $customLogoUrl }}" alt="{{ e($siteLabel) }}" class="ve-logo-img site-logo-mark-img" width="38" height="38" loading="lazy">
@else
    <span class="ve-logo-icon ve-logo-pinwheel" title="{{ e($siteLabel) }}">
        <svg width="22" height="22" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <g transform="translate(32,32)">
                <rect x="0" y="-4.5" width="28" height="9" rx="4.5" fill="currentColor"/>
                <rect x="0" y="-4.5" width="28" height="9" rx="4.5" fill="currentColor" transform="rotate(120)"/>
                <rect x="0" y="-4.5" width="28" height="9" rx="4.5" fill="currentColor" transform="rotate(240)"/>
            </g>
        </svg>
    </span>
@endif
