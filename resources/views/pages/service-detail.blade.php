@extends('layouts.app')

@section('title', $service->title . ' - Services | Stackify Studio')
@section('description', \Illuminate\Support\Str::limit(strip_tags($service->summary), 160))
@section('canonical', route('pages.services.show', $service))
@section('og_image', asset('img/bg-img/20.jpg'))

@section('schema')
@php
    $serviceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service->title,
        'serviceType' => 'AI Engineering & Software Development',
        'provider' => [
            '@type' => 'ProfessionalService',
            'name' => $settings['site_name'] ?? 'Stackify Studio',
            'url' => route('pages.home'),
        ],
        'description' => strip_tags($service->summary),
        'url' => route('pages.services.show', $service),
    ];
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => route('pages.home'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Services',
                'item' => route('pages.services'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $service->title,
                'item' => route('pages.services.show', $service),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
<section class="ve-page-hero ve-page-hero-sm">
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Service</span>
        <h1>{{ $service->title }}</h1>
        <p style="max-width:640px;color:var(--ve-text-muted);font-size:17px;line-height:1.6;margin-top:12px;">{{ $service->summary }}</p>
        <nav aria-label="breadcrumb" style="margin-top:20px;">
            <ol class="ve-breadcrumb">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li><a href="{{ route('pages.services') }}">Services</a></li>
                <li class="active">{{ $service->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="ve-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <article class="ve-article">
                    <div class="ve-article-body">
                        <p class="ve-article-lead">{{ $service->summary }}</p>
                        @if($service->body)
                            <div class="ve-post-main-content ve-service-detail-body">
                                {!! $service->body !!}
                            </div>
                        @else
                        @php
                            $isSeoService = \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($service->slug . ' ' . $service->title), 'seo');
                            $isAiService = \Illuminate\Support\Str::contains(\Illuminate\Support\Str::lower($service->slug . ' ' . $service->title), ['ai', 'llm', 'agent', 'rag']);
                        @endphp

                        @if($isSeoService)
                            <div style="margin-top:30px; padding:24px; background:var(--ve-surface); border:1px solid var(--ve-accent-border); border-left:4px solid var(--ve-accent); border-radius:12px;">
                                <div style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:16px;">
                                    <div>
                                        <h4 style="margin-bottom:4px; font-size:18px;">Looking for a complete SEO &amp; GEO diagnostic?</h4>
                                        <p style="margin:0; font-size:14px; color:var(--ve-text-muted);">Get a comprehensive 5-pillar audit covering on-page, off-page, technical, local, and semantic AI search.</p>
                                    </div>
                                    <a href="{{ route('pages.seo-consultation') }}" class="ve-btn-primary" style="white-space:nowrap;">Book your SEO consultation &rarr;</a>
                                </div>
                            </div>
                        @elseif($isAiService)
                            <div style="margin-top:30px; padding:24px; background:var(--ve-surface); border:1px solid var(--ve-accent-border); border-left:4px solid var(--ve-accent); border-radius:12px;">
                                <div style="display:flex; flex-wrap:wrap; justify-content:space-between; align-items:center; gap:16px;">
                                    <div>
                                        <h4 style="margin-bottom:4px; font-size:18px;">Explore feasibility with a Free AI Audit</h4>
                                        <p style="margin:0; font-size:14px; color:var(--ve-text-muted);">Get an actionable 48-hour architecture and ROI roadmap from our senior AI engineers.</p>
                                    </div>
                                    <a href="{{ route('pages.ai-audit') }}" class="ve-btn-primary" style="white-space:nowrap;">Book Free AI Audit &rarr;</a>
                                </div>
                            </div>
                        @endif

                        <div style="margin-top:36px;padding-top:24px;border-top:1px solid var(--ve-border);display:flex;flex-wrap:wrap;gap:14px;align-items:center;">
                            @if($isSeoService)
                                <a href="{{ route('pages.seo-consultation') }}" class="ve-btn-primary">Book your SEO consultation</a>
                            @elseif($isAiService)
                                <a href="{{ route('pages.ai-audit') }}" class="ve-btn-primary">Book Free AI Audit</a>
                            @else
                                <a href="{{ route('pages.contact') }}" class="ve-btn-primary">Request a quote</a>
                            @endif
                            <a href="{{ route('pages.contact') }}" class="ve-btn-ghost" style="border:1px solid var(--ve-border);color:var(--ve-dark);">Contact Team</a>
                            <a href="{{ route('pages.services') }}" class="ve-btn-ghost" style="border:1px solid var(--ve-border);color:var(--ve-dark);">All services</a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-12 col-lg-4">
                <aside class="ve-sidebar">
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">More services</h5>
                        @forelse($others as $other)
                        <div class="ve-recent-post" style="margin-bottom:14px;">
                            <div class="ve-service-detail-sidebar-icon"><i class="{{ $other->icon_class }}"></i></div>
                            <div>
                                <a href="{{ $other->link_url ?: route('pages.services.show', $other) }}">{{ $other->title }}</a>
                                <span style="display:block;font-size:12px;color:#94a3b8;line-height:1.4;margin-top:4px;">{{ \Illuminate\Support\Str::limit($other->summary, 72) }}</span>
                            </div>
                        </div>
                        @empty
                        <p style="font-size:14px;color:#94a3b8;margin:0;">No other services to show.</p>
                        @endforelse
                    </div>
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">Have a question?</h5>
                        <p style="font-size:14px;color:var(--ve-text);line-height:1.7;margin-bottom:16px;">See answers on our services page or reach out directly.</p>
                        <a href="{{ route('pages.services') }}" class="ve-btn-primary" style="display:inline-block;padding:10px 20px;font-size:13px;">View FAQs</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
