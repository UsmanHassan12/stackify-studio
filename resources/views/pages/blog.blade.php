@extends('layouts.app')

@section('title', 'Engineering Insights & Blog - Stackify Studio')
@section('description', 'Read the latest technical insights, web development tutorials, and software engineering news from the team at Stackify Studio.')
@section('canonical', route('pages.blog'))

@section('content')
    <section class="ve-page-hero" style="background-image:url({{ asset('img/bg-img/24.jpg') }});">
        <div class="ve-page-hero-overlay"></div>
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Engineering Blog</span>
            <h1>Tech <span>Insights &amp; Tutorials</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="ve-breadcrumb">
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li class="active">Insights</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="ve-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 mb-4">
                    @if(request()->has('search') || request()->has('category'))
                        <div style="margin-bottom: 24px; padding: 15px 20px; background: #f8fafc; border-radius: 10px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 15px; color: #64748b;">
                                <i class="fa fa-filter" style="margin-right:8px; color:#d4a017;"></i>
                                Showing results for: <strong>"{{ request('search') ?? request('category') }}"</strong>
                            </span>
                            <a href="{{ route('pages.blog') }}" style="font-size: 13px; color: #d4a017; font-weight: 700; text-decoration: none;">
                                <i class="fa fa-times-circle"></i> Clear Results
                            </a>
                        </div>
                    @endif

                    <div class="row">
                        @foreach($posts as $index => $post)
                        <div class="col-12 col-md-6 wow fadeInUp mb-4" data-wow-delay="{{ ($index % 2 + 1) * 100 }}ms">
                            <div class="ve-insight-card">
                                <img class="ve-insight-img" src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" loading="lazy" decoding="async">
                                <div class="ve-insight-body">
                                    <span class="ve-insight-cat">{{ $post->category }}</span>
                                    <h5><a href="{{ route('pages.blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                                    <p>{{ Str::limit($post->summary, 100) }}</p>
                                    <div class="ve-insight-meta">
                                        <span><i class="fa fa-calendar"></i> {{ $post->published_at->format('M d') }}</span>
                                        <a href="{{ route('pages.blog.show', $post->slug) }}">Read More <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    {{-- Pagination --}}
                    @if($posts->hasPages())
                    <div class="ve-pagination" style="justify-content: center; margin-top: 40px; margin-bottom: 20px;">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                    @endif
                </div>

                <div class="col-12 col-lg-4">
                    <aside class="ve-sidebar">
                        <div class="ve-sidebar-widget">
                            <h5 class="ve-sidebar-title">Search</h5>
                            <form action="{{ route('pages.blog') }}" method="GET" class="ve-search-box">
                                <input type="text" name="search" placeholder="Search articles..." value="{{ request('search') }}">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
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
                                    <li><a href="{{ route('pages.blog', ['category' => $cat->category]) }}" class="{{ request('category') == $cat->category ? 'active' : '' }}" style="{{ request('category') == $cat->category ? 'color:#d4a017; font-weight:700;' : '' }}">
                                        {{ $cat->category }} <span>{{ $cat->total }}</span>
                                    </a></li>
                                @endforeach
                            </ul>
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
                            <h5 class="ve-sidebar-title">Popular Tags</h5>
                            <div class="ve-tags">
                                <a href="#">React</a><a href="#">Laravel</a><a href="#">Node</a>
                                <a href="#">Vue</a><a href="#">CSS</a><a href="#">Cloud</a>
                                <a href="#">AWS</a><a href="#">Design</a><a href="#">Security</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
