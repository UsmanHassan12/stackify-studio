@extends('layouts.app')

@section('title', 'AI Agents, LLM Integration & Software Services — Stackify Studio')
@section('description', 'Explore Stackify Studio\'s comprehensive AI and software engineering services, including autonomous AI agents, LLM/RAG pipelines, custom AI software, and modern cloud platforms.')
@section('canonical', route('pages.services'))

@section('schema')
@php
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
        ],
    ];

    $faqItems = [];
    if (isset($faqs) && $faqs->isNotEmpty()) {
        foreach ($faqs as $faq) {
            $faqItems[] = [
                '@type' => 'Question',
                'name' => $faq->question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => strip_tags($faq->answer),
                ],
            ];
        }
    }
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@if($faqItems !== [])
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $faqItems], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endif
@endsection

@section('content')
<section class="ve-page-hero">
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">What We Offer</span>
            <h1>Applied AI &amp; <span>Software Engineering</span></h1>
            <nav aria-label="breadcrumb"><ol class="ve-breadcrumb"><li><a href="{{ route('pages.home') }}">Home</a></li><li class="active">Services</li></ol></nav>
        </div>
    </section>

    <section class="ve-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Our Capabilities</span>
                <h2>AI Solutions Built for <span>Real Impact</span></h2>
                <p>From autonomous customer agents to enterprise RAG pipelines, we engineer software that delivers quantifiable ROI.</p>
            </div>
            <div class="ve-services-grid">
                @forelse($services as $index => $service)
                <div class="ve-service-card wow fadeInUp" id="service-{{ $service->id }}" data-wow-delay="{{ (min($index, 5) + 1) * 100 }}ms">
                    <div class="ve-service-icon"><i class="{{ $service->icon_class }}"></i></div>
                    <h4>{{ $service->title }}</h4>
                    <p>{{ $service->summary }}</p>
                    @if($service->link_url)
                    <a href="{{ $service->link_url }}" class="ve-card-link"@if(\Illuminate\Support\Str::startsWith($service->link_url, ['http://', 'https://'])) target="_blank" rel="noopener noreferrer"@endif>Learn more <i class="fa fa-long-arrow-right"></i></a>
                    @else
                    <a href="{{ route('pages.services.show', $service) }}" class="ve-card-link">Learn more <i class="fa fa-long-arrow-right"></i></a>
                    @endif
                </div>
                @empty
                <div class="col-12 text-center" style="grid-column: 1 / -1; padding: 48px 16px; color: #64748b;">
                    <p>No services are published yet. Please check back soon.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="ve-process-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">How It Works</span>
                <h2>Getting Started is <span>Simple</span></h2>
            </div>
            <div class="ve-process-grid">
                <div class="ve-process-step wow fadeInUp" data-wow-delay="100ms"><div class="ve-process-num">01</div><h5>Discovery Call</h5><p>Schedule a free consultation for us to understand your goals, target audience, and business requirements.</p></div>
                <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
                <div class="ve-process-step wow fadeInUp" data-wow-delay="250ms"><div class="ve-process-num">02</div><h5>Technical Assessment</h5><p>We analyze the feasibility, choose the ideal tech stack, and deliver a transparent scope and timeline.</p></div>
                <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
                <div class="ve-process-step wow fadeInUp" data-wow-delay="400ms"><div class="ve-process-num">03</div><h5>Agile Development</h5><p>We build your product in iterative sprints, ensuring you have constant visibility into our progress.</p></div>
                <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
                <div class="ve-process-step wow fadeInUp" data-wow-delay="550ms"><div class="ve-process-num">04</div><h5>Launch & Support</h5><p>We deploy to production flawlessly and provide ongoing maintenance to keep your app running smoothly.</p></div>
            </div>
        </div>
    </section>

    <section class="ve-section ve-faq-section">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-12 col-lg-5 wow fadeInLeft" data-wow-delay="100ms">
                    <span class="ve-section-tag">Common Questions</span>
                    <h2>Frequently Asked <span>Questions</span></h2>
                    <p>Can't find what you're looking for? <a href="{{ route('pages.contact') }}" style="color:var(--ve-accent);">Reach out to us</a> and we'll respond within 24 hours.</p>
                    <a href="{{ route('pages.contact') }}" class="ve-btn-primary mt-30">Contact Our Team</a>
                </div>
                <div class="col-12 col-lg-7 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-faq-list">
                        @forelse($faqs as $faq)
                        <div class="ve-faq-item {{ $loop->first ? 'open' : '' }}" id="faq-{{ $faq->id }}">
                            <div class="ve-faq-q"><span>{{ $faq->question }}</span><i class="fa fa-plus"></i></div>
                            <div class="ve-faq-a">{{ $faq->answer }}</div>
                        </div>
                        @empty
                        <p style="color:#64748b; padding: 12px 0;">No frequently asked questions are published yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ve-cta-banner">
        <div class="container ve-cta-content">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8"><h2>Ready to Build Your Next <span>Big Idea?</span></h2><p>Discuss your project scope with us and discover how we can help execute your digital roadmap.</p></div>
                <div class="col-12 col-lg-4 text-lg-right"><a href="{{ route('pages.contact') }}" class="ve-btn-white">Request a Quote</a></div>
            </div>
        </div>
    </section>
@endsection
