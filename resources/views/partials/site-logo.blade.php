@php
    $customLogoUrl = \App\Support\SiteBranding::customSiteLogoUrl($settings ?? []);
    $defaultLogoUrl = \App\Support\SiteBranding::defaultLogoUrl();
    $siteLabel = \App\Support\SiteNameLogo::normalized($settings['site_name'] ?? null);
    $isInverted = !empty($inverted);
    $logoSrc = $isInverted 
        ? asset('img/core-img/stackify_final_lockup_white.svg') 
        : ($customLogoUrl ?: $defaultLogoUrl);
@endphp

@if ($customLogoUrl && !$isInverted)
    <span class="ve-logo-custom-wrap">
        <img src="{{ $customLogoUrl }}" alt="{{ e($siteLabel) }}" class="ve-logo-img site-logo-mark-img" width="38" height="38" loading="lazy">
        <span class="ve-logo-text">@include('partials.logo-site-name')</span>
    </span>
@else
    <span class="ve-logo-lockup-wrap {{ $isInverted ? 'is-inverted' : '' }}">
        <img src="{{ $logoSrc }}?v={{ @filemtime(public_path('img/core-img/' . ($isInverted ? 'stackify_final_lockup_white.svg' : 'stackify_final_lockup.svg'))) ?: 1 }}" alt="{{ e($siteLabel) }}" class="ve-logo-lockup-img" height="38" loading="eager">
    </span>
@endif
