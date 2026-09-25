@extends('layouts.app')

@section('title', $post->title . ' - Stackify Studio')
@section('description', $post->summary)
@section('canonical', route('pages.blog.show', $post->slug))
@section('og_image', asset($post->image_path))
@section('og_type', 'article')

@section('schema')
@php
    $blogPostingSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'mainEntityOfPage' => [
            '@type' => 'WebPage',
            '@id' => route('pages.blog.show', $post->slug),
        ],
        'headline' => $post->title,
        'description' => $post->summary,
        'image' => $post->image_path ? asset($post->image_path) : null,
        'author' => [
            '@type' => 'Person',
            'name' => $post->author ?: 'Stackify Engineering Team',
        ],
        'publisher' => [
            '@type' => 'ProfessionalService',
            'name' => $settings['site_name'] ?? 'Stackify Studio',
            'logo' => [
                '@type' => 'ImageObject',
                'url' => \App\Support\SiteBranding::schemaLogoUrl($settings ?? []),
            ],
        ],
        'datePublished' => $post->published_at?->toIso8601String(),
        'dateModified' => $post->updated_at?->toIso8601String() ?? $post->published_at?->toIso8601String(),
    ];
    $blogPostingSchema = array_filter($blogPostingSchema, fn ($v) => $v !== null && $v !== '');

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
                'name' => 'Insights',
                'item' => route('pages.blog'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $post->title,
                'item' => route('pages.blog.show', $post->slug),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($blogPostingSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
    <section class="ve-page-hero ve-page-hero-sm">
        <div class="container ve-page-hero-content">
            <span class="ve-insight-cat" style="margin-bottom:16px;">{{ $post->category }}</span>
            <h1>{{ $post->title }}</h1>
            <div class="ve-post-meta-hero">
                <span><i class="fa fa-calendar"></i> {{ $post->published_at->format('F d, Y') }}</span>
                <span><i class="fa fa-user"></i> {{ $post->author }}</span>
                <span><i class="fa fa-clock"></i> {{ $post->read_time }}</span>
            </div>
        </div>
    </section>

    <section class="ve-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <article class="ve-article">
                        <img class="ve-article-featured" src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" loading="lazy" decoding="async">
                        <div class="ve-article-body">
                            <p class="ve-article-lead">{{ $post->summary }}</p>
                            
                            <div class="ve-post-main-content">
                                @if($post->content && preg_match('/<[a-z][\s\S]*>/i', $post->content))
                                    {!! $post->content !!}
                                @else
                                    {!! nl2br(e($post->content)) !!}
                                @endif
                            </div>

                            <div class="ve-article-share" style="margin-top:40px; padding-top:20px; border-top:1px solid #eee;">
                                <strong>Share:</strong>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer" title="Share on Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" rel="noopener noreferrer" title="Share on Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer" title="Share on LinkedIn"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </article>
                </div>
                
                <div class="col-12 col-lg-4">
                    <aside class="ve-sidebar">
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Search</h5>
                            <form action="{{ route('pages.blog') }}" method="GET" class="ve-search-box">
                                <input type="text" name="search" placeholder="Search articles...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Recent Posts</h5>
                            @foreach($recent_posts as $rp)
                            <div class="ve-recent-post">
                                <img class="ve-rp-img" src="{{ asset($rp->image_path) }}" alt="{{ $rp->title }}" loading="lazy" decoding="async">
                                <div>
                                    <a href="{{ route('pages.blog.show', $rp->slug) }}">{{ $rp->title }}</a>
                                    <span><i class="fa fa-calendar"></i> {{ $rp->published_at->format('M d') }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Categories</h5>
                            <ul class="ve-cat-list">
                                @php
                                    $categories = \App\Models\Post::select('category', \DB::raw('count(*) as total'))
                                        ->groupBy('category')
                                        ->get();
                                @endphp
                                @foreach($categories as $cat)
                                    <li><a href="{{ route('pages.blog', ['category' => $cat->category]) }}">{{ $cat->category }} <span>{{ $cat->total }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
