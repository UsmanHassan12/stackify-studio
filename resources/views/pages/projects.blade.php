@extends('layouts.app')

@section('title', 'Our Projects & Case Studies - Stackify Studio')
@section('description', 'Explore Stackify Studio\'s projects — custom web applications, SaaS platforms, and digital products built for innovative startups and enterprises.')
@section('canonical', route('pages.projects'))

@section('content')
<section class="ve-page-hero">
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Showcase</span>
        <h1>Our <span>Work</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li class="active">Projects</li>
            </ol>
        </nav>
    </div>
</section>

<section class="ve-section ve-portfolio-section">
    <div class="container">
        <div class="row">
            {{-- Main Content --}}
            <div class="col-12 col-lg-8">
                @if(request()->has('search') || request()->has('category'))
                <div style="margin-bottom: 30px; padding: 15px 20px; background: #f8fafc; border-radius: 10px; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: space-between;">
                    <span style="font-size: 15px; color: #64748b;">
                        <i class="fa fa-filter" style="margin-right:8px; color:#C1440E;"></i>
                        Showing projects for: <strong>"{{ request('search') ?? request('category') }}"</strong>
                    </span>
                    <a href="{{ route('pages.projects') }}" style="font-size: 13px; color: #C1440E; font-weight: 700; text-decoration: none;">
                        <i class="fa fa-times-circle"></i> Clear Filters
                    </a>
                </div>
                @endif

                <div class="row">
                    @forelse($projects as $index => $project)
                    <div class="col-12 col-md-6 mb-4 wow fadeInUp" data-wow-delay="{{ ($index % 2 + 1) * 100 }}ms">
                        <div class="ve-portfolio-card" style="margin-bottom:0;">
                            <img class="ve-portfolio-img" src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" loading="lazy" decoding="async">
                            <div class="ve-portfolio-overlay">
                                <div class="ve-portfolio-info">
                                    <span class="ve-portfolio-cat">{{ $project->category }}</span>
                                    <h3>{{ $project->title }}</h3>
                                    <p>{{ $project->short_description }}</p>
                                    <a href="{{ route('pages.projects.show', $project) }}" class="ve-btn-white" style="padding: 10px 20px; font-size: 12px;">View Case Study</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center" style="padding: 60px 20px;">
                        <i class="fa fa-folder-open" style="font-size: 40px; color: #e2e8f0; margin-bottom: 20px; display: block;"></i>
                        <h4 style="color: #64748b;">No projects found</h4>
                        <p style="color: #9ca3af;">Try adjusting your search or category filter.</p>
                    </div>
                    @endforelse
                </div>

                {{-- Pagination --}}
                @if($projects->hasPages())
                <div class="ve-pagination" style="justify-content: center; margin-top: 40px; margin-bottom: 20px;">
                    {{ $projects->links('pagination::bootstrap-4') }}
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-12 col-lg-4">
                <aside class="ve-sidebar">
                    {{-- Search --}}
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">Search Portfolio</h5>
                        <form action="{{ route('pages.projects') }}" method="GET" class="ve-search-box">
                            <input type="text" name="search" placeholder="Search keywords..." value="{{ request('search') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    {{-- Categories --}}
                    <div class="ve-sidebar-widget">
                        <h5 class="ve-sidebar-title">Services</h5>
                        <ul class="ve-cat-list">
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('pages.projects', ['category' => $cat->category]) }}" 
                                       style="{{ request('category') == $cat->category ? 'color:#C1440E; font-weight:700;' : '' }}">
                                        {{ $cat->category }} <span>{{ $cat->total }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Quick CTA --}}
                    <div class="ve-sidebar-widget" style="background: var(--dark); border-radius: 12px; padding: 30px; border: none; overflow: hidden; position: relative;">
                        <div style="position: absolute; top: -20px; right: -20px; font-size: 100px; color: rgba(255,255,255,0.03); transform: rotate(15deg);"><i class="fa fa-rocket"></i></div>
                        <h4 style="color: #fff; font-size: 20px; margin-bottom: 15px; position: relative; z-index: 1;">Have a Project in Mind?</h4>
                        <p style="color: rgba(255,255,255,0.7); font-size: 14px; margin-bottom: 25px; position: relative; z-index: 1;">Let's discuss how our engineering team can build your next vision.</p>
                        <a href="{{ route('pages.contact') }}" class="ve-btn-gold" style="width: 100%; justify-content: center; position: relative; z-index: 1;">Get Started →</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
