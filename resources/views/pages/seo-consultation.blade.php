@extends('layouts.app')

@section('title', 'Book Your SEO Consultation & Comprehensive Audit — Stackify Studio')
@section('description', 'Book your SEO consultation with Stackify Studio. A full audit across on-page, off-page, technical, local, and semantic SEO — plus a content plan built to earn topical authority and AI citation.')
@section('canonical', route('pages.seo-consultation'))

@section('schema')
@php
    $seoServiceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'SEO & Generative Engine Optimization (GEO) Consultation',
        'serviceType' => 'Technical Search & AI Answer Engine Optimization',
        'provider' => [
            '@type' => 'ProfessionalService',
            'name' => $settings['site_name'] ?? 'Stackify Studio',
            'url' => route('pages.home'),
        ],
        'description' => 'A comprehensive 5-pillar SEO and GEO audit covering on-page, off-page, technical, local, and semantic entity architecture for Google and AI answer engines.',
        'url' => route('pages.seo-consultation'),
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
                'name' => 'SEO Consultation',
                'item' => route('pages.seo-consultation'),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($seoServiceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
<!-- Hero Section -->
<section class="ve-page-hero ve-seo-hero">
    <div class="container ve-page-hero-content text-center" style="max-width: 860px; margin: 0 auto;">
        <span class="ve-section-tag"><i class="fa fa-search"></i> Comprehensive Search &amp; GEO Consultation</span>
        <h1>Book Your <span>SEO Consultation</span></h1>
        <p style="font-size: 1.15rem; line-height: 1.6; color: var(--ve-text-muted); margin-top: 15px;">
            A full audit across on-page, off-page, technical, local, and semantic SEO — plus a content plan built to earn topical authority and generative engine visibility.
        </p>
        <nav aria-label="breadcrumb" style="margin-top: 20px;">
            <ol class="ve-breadcrumb justify-content-center">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li><a href="{{ route('pages.services') }}">Services</a></li>
                <li class="active">SEO Consultation</li>
            </ol>
        </nav>
    </div>
</section>

<!-- 5 Pillar Service Breakdown Section -->
<section class="ve-section" style="padding-top: 60px; padding-bottom: 40px;">
    <div class="container">
        <div class="ve-section-header text-center" style="max-width: 760px; margin: 0 auto 50px;">
            <span class="ve-section-tag">What We Audit &amp; Deliver</span>
            <h2>Complete 5-Pillar <span>SEO &amp; GEO Framework</span></h2>
            <p>Every consultation delivers a diagnostic breakdown of your search health, algorithmic risks, and a prioritized blueprint to capture rankings and AI citations.</p>
        </div>

        <div class="row">
            <!-- 1. On-Page SEO -->
            <div class="col-12 col-lg-4 col-md-6 mb-30">
                <div class="ve-service-card h-100 wow fadeInUp" data-wow-delay="100ms" style="display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div class="ve-service-icon"><i class="fa fa-file-text-o"></i></div>
                        <h4>1. On-Page SEO</h4>
                        <p style="font-size:14px; margin-bottom:16px;">We optimize every individual URL to clearly signal its purpose, relevance, and intent to search crawlers.</p>
                        <ul style="list-style:none; padding:0; margin:0; font-size:13.5px; color:var(--ve-text-muted);">
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Page Hierarchy:</strong> Logical H1-H6 semantic structure</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Metadata &amp; OpenGraph:</strong> High-CTR title tags and descriptions</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Internal Link Graph:</strong> Strategic equity flow across money pages</span>
                            </li>
                            <li style="display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Content Optimization:</strong> Keyword intent &amp; searcher satisfaction</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 2. Off-Page SEO -->
            <div class="col-12 col-lg-4 col-md-6 mb-30">
                <div class="ve-service-card h-100 wow fadeInUp" data-wow-delay="200ms" style="display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div class="ve-service-icon"><i class="fa fa-link"></i></div>
                        <h4>2. Off-Page SEO</h4>
                        <p style="font-size:14px; margin-bottom:16px;">Build authentic brand signals and domain authority that compound your organic search resilience.</p>
                        <ul style="list-style:none; padding:0; margin:0; font-size:13.5px; color:var(--ve-text-muted);">
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Backlink Audit:</strong> Toxic link cleanup &amp; high-tier link profile</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Digital PR Strategy:</strong> High-trust editorial placements &amp; podcasts</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Brand Mentions:</strong> Entity authority building across media</span>
                            </li>
                            <li style="display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Competitor Gap:</strong> Steal high-value link sources in your niche</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 3. Technical SEO -->
            <div class="col-12 col-lg-4 col-md-6 mb-30">
                <div class="ve-service-card h-100 wow fadeInUp" data-wow-delay="300ms" style="display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div class="ve-service-icon"><i class="fa fa-cogs"></i></div>
                        <h4>3. Technical SEO</h4>
                        <p style="font-size:14px; margin-bottom:16px;">Engineered by software developers for flawless crawlability, indexation, and sub-second load times.</p>
                        <ul style="list-style:none; padding:0; margin:0; font-size:13.5px; color:var(--ve-text-muted);">
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Core Web Vitals:</strong> Passing LCP, INP, and CLS scores</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Crawl &amp; Indexation:</strong> Robots.txt, sitemaps &amp; canonical hygiene</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Structured Data:</strong> Rich JSON-LD schema for search snippets</span>
                            </li>
                            <li style="display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>JavaScript Rendering:</strong> Server-side rendering &amp; hydration check</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 4. Local SEO -->
            <div class="col-12 col-lg-6 mb-30">
                <div class="ve-service-card h-100 wow fadeInUp" data-wow-delay="400ms" style="display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div class="ve-service-icon"><i class="fa fa-map-marker"></i></div>
                        <h4>4. Local &amp; Regional SEO</h4>
                        <p style="font-size:14px; margin-bottom:16px;">Targeted regional dominance for service-area businesses, branch offices, and location-focused enterprise clients.</p>
                        <ul style="list-style:none; padding:0; margin:0; font-size:13.5px; color:var(--ve-text-muted);">
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Google Business Profile (GBP):</strong> Verification, category mapping &amp; optimization</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>NAP Consistency:</strong> Clean citation audit across major regional directories</span>
                            </li>
                            <li style="display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Geo Landing Pages:</strong> Scalable, non-duplicate location architecture for multi-region scale</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- 5. Semantic SEO & GEO -->
            <div class="col-12 col-lg-6 mb-30">
                <div class="ve-service-card h-100 wow fadeInUp" data-wow-delay="500ms" style="border: 2px solid var(--ve-accent); display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:12px;">
                            <div class="ve-service-icon" style="margin-bottom:0;"><i class="fa fa-cube"></i></div>
                            <span style="font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:1px; background:var(--ve-accent-subtle); color:var(--ve-accent); padding:4px 10px; border-radius:20px;">AI &amp; GEO Native</span>
                        </div>
                        <h4>5. Semantic SEO, Content &amp; GEO</h4>
                        <p style="font-size:14px; margin-bottom:16px;">Built for the era of AI search. We structure topic clusters and entities so that ChatGPT, Perplexity, and Google AI Overviews cite you first.</p>
                        <ul style="list-style:none; padding:0; margin:0; font-size:13.5px; color:var(--ve-text-muted);">
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Topic Clusters &amp; Pillar Content:</strong> Full topical authority mapping in your industry</span>
                            </li>
                            <li style="margin-bottom:8px; display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Entity-Based Architecture:</strong> Alignment with Google Knowledge Graph and LLM vector embeddings</span>
                            </li>
                            <li style="display:flex; align-items:flex-start; gap:8px;">
                                <i class="fa fa-check-circle" style="color:var(--ve-accent); margin-top:3px;"></i>
                                <span><strong>Generative Engine Optimization (GEO):</strong> Structured answers formatted for AI citation capture</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Intake Form Section -->
<section class="ve-section ve-audit-form-section" style="background: var(--ve-surface); border-top: 1px solid var(--ve-border); border-bottom: 1px solid var(--ve-border); padding-top: 70px; padding-bottom: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="ve-contact-form-wrap ve-audit-form-wrap wow fadeInUp" data-wow-delay="150ms" style="background: var(--ve-bg); border: 1px solid var(--ve-border); box-shadow: var(--ve-shadow);">
                    <div class="text-center mb-40">
                        <span class="ve-section-tag">Direct Strategist Intake</span>
                        <h2>Book Your <span>SEO Consultation</span></h2>
                        <p style="color: var(--ve-text-muted); max-width: 580px; margin: 10px auto 0;">
                            Submit your details below. Our senior search &amp; GEO engineers will analyze your site and prepare an actionable diagnostic review before our consultation call.
                        </p>
                    </div>

                    <form class="ve-contact-form" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service" value="SEO & GEO Consultation">

                        <div class="ve-form-row">
                            <div class="ve-form-group">
                                <label for="seo_name">Full Name <span style="color:var(--ve-accent);">*</span></label>
                                <input type="text" id="seo_name" name="name" placeholder="e.g. Sarah Jenkins" required value="{{ old('name') }}">
                            </div>
                            <div class="ve-form-group">
                                <label for="seo_email">Business Email <span style="color:var(--ve-accent);">*</span></label>
                                <input type="email" id="seo_email" name="email" placeholder="sarah@yourcompany.com" required value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="ve-form-row">
                            <div class="ve-form-group">
                                <label for="seo_website">Current Website URL <span style="color:var(--ve-accent);">*</span></label>
                                <input type="url" id="seo_website" name="website" placeholder="https://yourwebsite.com" required value="{{ old('website') }}">
                            </div>
                            <div class="ve-form-group">
                                <label for="seo_phone">Phone / WhatsApp (Optional)</label>
                                <input type="tel" id="seo_phone" name="phone" placeholder="+1 (555) 000-0000" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="ve-form-group">
                            <label for="seo_challenge">What's your biggest SEO challenge right now? <span style="color:var(--ve-accent);">*</span></label>
                            <textarea id="seo_challenge" name="message" rows="5" placeholder="e.g. Our organic traffic dropped after recent algorithm updates, we are struggling to rank for competitive SaaS keywords, or we want to optimize for Perplexity and AI Overviews..." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="text-center mt-30">
                            <button type="submit" class="ve-btn-primary" style="padding: 16px 36px; font-size: 16px; font-weight: 700; width: 100%; max-width: 380px;">
                                Book SEO Consultation &rarr;
                            </button>
                            <p style="font-size: 13px; color: var(--ve-text-muted); margin-top: 14px;">
                                <i class="fa fa-lock"></i> 100% confidential &middot; Detailed audit preview delivered prior to call
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Happens During Consultation Section -->
<section class="ve-section ve-audit-steps-section" style="padding-top: 70px; padding-bottom: 70px;">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">The Consultation Process</span>
            <h2>What to Expect from Your <span>Session</span></h2>
            <p>We don't do generic sales presentations. You receive clear, actionable engineering feedback.</p>
        </div>
        <div class="ve-process-grid">
            <div class="ve-process-step wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-process-num">01</div>
                <h5>Pre-Call Crawl &amp; Index Audit</h5>
                <p>We run deep diagnostic crawls evaluating server response, Core Web Vitals, Schema, and technical indexation blockers.</p>
            </div>
            <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
            <div class="ve-process-step wow fadeInUp" data-wow-delay="250ms">
                <div class="ve-process-num">02</div>
                <h5>Entity &amp; GEO Analysis</h5>
                <p>We evaluate your semantic footprint and test your brand's presence across AI search platforms (ChatGPT, Perplexity).</p>
            </div>
            <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
            <div class="ve-process-step wow fadeInUp" data-wow-delay="400ms">
                <div class="ve-process-num">03</div>
                <h5>45-Minute Strategic Deep Dive</h5>
                <p>We review findings 1-on-1, highlighting quick-win fixes and high-ROI topical authority content plays.</p>
            </div>
            <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
            <div class="ve-process-step wow fadeInUp" data-wow-delay="550ms">
                <div class="ve-process-num">04</div>
                <h5>Actionable Roadmap</h5>
                <p>You leave with a clear, prioritized checklist you can execute internally or partner with Stackify to build.</p>
            </div>
        </div>
    </div>
</section>
@endsection
