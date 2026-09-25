@extends('layouts.app')

@section('title', $project->title . ' - Case Study | Stackify Studio')
@section('description', $project->short_description)
@section('canonical', route('pages.projects.show', $project))
@section('og_image', asset($project->image_path))
@section('og_type', 'article')

@section('schema')
@php
    $projectArticleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Article',
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => route('pages.projects.show', $project),
        ],
        'headline' => $project->title,
        'description' => \Illuminate\Support\Str::limit(strip_tags($project->short_description), 500),
        'image' => $project->image_path ? asset($project->image_path) : null,
        'author' => [
            '@type' => 'ProfessionalService',
            'name' => $settings['site_name'] ?? 'Stackify Studio',
        ],
        'publisher' => [
            '@type' => 'ProfessionalService',
            'name' => $settings['site_name'] ?? 'Stackify Studio',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => \App\Support\SiteBranding::schemaLogoUrl($settings ?? []),
            ],
        ],
        'datePublished' => $project->created_at?->toIso8601String(),
        'dateModified' => $project->updated_at?->toIso8601String() ?? $project->created_at?->toIso8601String(),
    ];
    $projectArticleSchema = array_filter($projectArticleSchema, fn ($v) => $v !== null && $v !== '');

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
                'name' => 'Projects',
                'item' => route('pages.projects'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $project->title,
                'item' => route('pages.projects.show', $project),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($projectArticleSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
{{-- ===== HERO ===== --}}
<section class="ve-case-hero">
    <div class="container ve-case-hero-content">
        <span class="ve-portfolio-cat">{{ $project->category }}</span>
        <h1>{{ $project->title }}</h1>
        <p>{{ $project->short_description }}</p>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li><a href="{{ route('pages.projects') }}">Projects</a></li>
                <li class="active">{{ $project->title }}</li>
            </ol>
        </nav>
    </div>
</section>

{{-- ===== META BAR ===== --}}
<section class="ve-case-meta-bar">
    <div class="container">
        <div class="ve-case-meta-inner">
            <div class="ve-case-meta-item">
                <span class="ve-case-meta-label">Client</span>
                <span class="ve-case-meta-val">{{ $project->client_name ?? 'Confidential' }}</span>
            </div>
            <div class="ve-case-meta-item">
                <span class="ve-case-meta-label">Industry</span>
                <span class="ve-case-meta-val">{{ $project->category }}</span>
            </div>
            <div class="ve-case-meta-item">
                <span class="ve-case-meta-label">Delivered by</span>
                <span class="ve-case-meta-val">Stackify Studio</span>
            </div>
            @if($project->live_url)
            <div class="ve-case-meta-item">
                <a href="{{ $project->live_url }}" target="_blank" rel="noopener" class="ve-btn-primary" style="padding:10px 26px;">Visit Live Site &rarr;</a>
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ===== CASE STUDY BODY ===== --}}
<section class="ve-section ve-case-body">
    <div class="container">
        <div class="row">
            {{-- Main Case Study Content --}}
            <div class="col-12 col-lg-8">
                <div class="ve-article" style="padding:0; border-radius:15px; overflow:hidden;">
                    {{-- Featured Image --}}
                    <div style="height: 450px; overflow: hidden;">
                        <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" loading="lazy" decoding="async" style="width:100%; height:100%; object-fit:cover;">
                    </div>

                    <div class="ve-article-body">
                        {{-- Lead Introduction --}}
                        <p class="ve-article-lead">
                            {{ $project->short_description }}
                        </p>

                        {{-- Main Story --}}
                        <div class="ve-project-story ve-post-main-content">
                            @if($project->full_description)
                                @if(preg_match('/<[a-z][\s\S]*>/i', $project->full_description))
                                    {!! $project->full_description !!}
                                @else
                                    @foreach(explode("\n\n", $project->full_description) as $para)
                                        @php
                                            $para = trim($para);
                                            // Handle Headings
                                            if (str_starts_with($para, '###')) {
                                                echo '<h4>'.e(ltrim($para, '# ')).'</h4>';
                                                continue;
                                            }
                                            if (str_starts_with($para, '##')) {
                                                echo '<h3>'.e(ltrim($para, '# ')).'</h3>';
                                                continue;
                                            }

                                            // Handle Lists
                                            if (str_starts_with($para, '-')) {
                                                echo '<ul style="margin:20px 0; padding-left:25px; list-style:disc;">';
                                                foreach(explode("\n", $para) as $line) {
                                                    $line = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', ltrim(trim($line), '- '));
                                                    echo '<li style="margin-bottom:10px; color:var(--ve-text);">'.$line.'</li>';
                                                }
                                                echo '</ul>';
                                                continue;
                                            }

                                            // Handle Numbered Lists
                                            if (preg_match('/^\d\./', $para)) {
                                                echo '<ol style="margin:20px 0; padding-left:25px;">';
                                                foreach(explode("\n", $para) as $line) {
                                                    $line = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', preg_replace('/^\d\.\s+/', '', trim($line)));
                                                    echo '<li style="margin-bottom:10px; color:var(--ve-text);">'.$line.'</li>';
                                                }
                                                echo '</ol>';
                                                continue;
                                            }

                                            // Regular Paragraph with bold support
                                            $para = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $para);
                                            echo '<p>'.$para.'</p>';
                                        @endphp
                                    @endforeach
                                @endif
                            @else
                                <p>{{ $project->short_description }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-12 col-lg-4">
                <aside class="ve-sidebar">
                    {{-- Search --}}
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">Find Projects</h5>
                        <form action="{{ route('pages.projects') }}" method="GET" class="ve-search-box">
                            <input type="text" name="search" placeholder="Search keywords...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    {{-- Categories --}}
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">Industries</h5>
                        <ul class="ve-cat-list">
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('pages.projects', ['category' => $cat->category]) }}" 
                                       style="{{ $project->category == $cat->category ? 'color:#d4a017; font-weight:700;' : '' }}">
                                        {{ $cat->category }} <span>{{ $cat->total }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- CTA --}}
                    <div class="ve-sidebar-widget" style="background: var(--dark); border-radius: 12px; padding: 30px; border: none; overflow: hidden; position: relative;">
                        <div style="position: absolute; top: -20px; right: -20px; font-size: 100px; color: rgba(255,255,255,0.03); transform: rotate(15deg);"><i class="fa fa-rocket"></i></div>
                        <h4 style="color: #fff; font-size: 19px; margin-bottom: 12px; position: relative; z-index: 1;">Ready to Scale?</h4>
                        <p style="color: rgba(255,255,255,0.7); font-size: 13px; margin-bottom: 25px; position: relative; z-index: 1;">Our engineering team is ready to build your next high-performance application.</p>
                        <a href="{{ route('pages.contact') }}" class="ve-btn-gold" style="width: 100%; justify-content: center; position: relative; z-index: 1;">Contact Sales →</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

{{-- ===== MORE PROJECTS ===== --}}
@if($others->count())
<section class="ve-section ve-case-more" style="background:#f9fbff;">
    <div class="container">
        <div class="row mb-40">
            <div class="col-12 text-center">
                <div class="ve-section-header">
                    <h2>More <span>Case Studies</span></h2>
                    <p>Explore other projects engineered by the Stackify Studio team.</p>
                </div>
            </div>
        </div>
        <div class="ve-portfolio-grid" style="grid-template-columns: repeat(3, 1fr);">
            @foreach($others as $other)
            <div class="ve-portfolio-card">
                <img class="ve-portfolio-img" src="{{ asset($other->image_path) }}" alt="{{ $other->title }}" loading="lazy" decoding="async">
                <div class="ve-portfolio-overlay">
                    <div class="ve-portfolio-info">
                        <span class="ve-portfolio-cat">{{ $other->category }}</span>
                        <h3>{{ $other->title }}</h3>
                        <a href="{{ route('pages.projects.show', $other) }}" class="ve-btn-white" style="padding:10px 24px;font-size:13px;">View Case Study</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center" style="margin-top:50px;">
            <a href="{{ route('pages.projects') }}" class="ve-btn-primary">View All Projects</a>
        </div>
    </div>
</section>
@endif
@endsection
