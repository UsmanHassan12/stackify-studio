@extends('layouts.app')

@section('title', 'Free 48-Hour AI Readiness & Architecture Audit — Stackify Studio')
@section('description', 'Get an actionable, complimentary AI architecture and feasibility audit from senior engineers. We analyze your tech stack, workflows, and data to map high-ROI AI opportunities.')
@section('canonical', route('pages.ai-audit'))

@section('schema')
@php
    $auditServiceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => 'Free AI Readiness & Architecture Audit',
        'serviceType' => 'AI Feasibility & Architecture Assessment',
        'provider' => [
            '@type' => 'ProfessionalService',
            'name' => $settings['site_name'] ?? 'Stackify Studio',
            'url' => route('pages.home'),
        ],
        'description' => 'A complimentary 48-hour AI architecture, model feasibility, and cost-modeling audit conducted by senior AI engineers.',
        'url' => route('pages.ai-audit'),
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'USD',
        ],
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
                'name' => 'Free AI Audit',
                'item' => route('pages.ai-audit'),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($auditServiceSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
<section class="ve-page-hero ve-ai-audit-hero">
    <div class="container ve-page-hero-content text-center" style="max-width: 820px; margin: 0 auto;">
        <span class="ve-section-tag"><i class="fa fa-bolt"></i> 100% Free &middot; No Obligation &middot; 48-Hour Delivery</span>
        <h1>Free AI Readiness &amp; <span>Architecture Audit</span></h1>
        <p style="font-size: 1.15rem; line-height: 1.6; color: var(--ve-text-muted); margin-top: 15px;">
            Discover exactly where AI agents, RAG search, and automated intelligence can drive immediate efficiency and revenue in your business — delivered by senior engineers, not a sales deck.
        </p>
        <nav aria-label="breadcrumb" style="margin-top: 20px;">
            <ol class="ve-breadcrumb justify-content-center">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li class="active">Free AI Audit</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Value Props & Highlights -->
<section class="ve-section ve-audit-highlights-section" style="padding-top: 60px; padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 mb-30">
                <div class="ve-audit-card wow fadeInUp" data-wow-delay="100ms">
                    <div class="ve-audit-card-icon"><i class="fa fa-bullseye"></i></div>
                    <h4>1. Feasibility &amp; ROI Mapping</h4>
                    <p>We analyze your workflows to identify high-leverage opportunities for custom AI agents and automation with quantifiable ROI.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-30">
                <div class="ve-audit-card wow fadeInUp" data-wow-delay="200ms">
                    <div class="ve-audit-card-icon"><i class="fa fa-cogs"></i></div>
                    <h4>2. Model &amp; Architecture Selection</h4>
                    <p>Get unbiased recommendations on the right models (OpenAI, Claude, Gemini, Llama), vector stores, and prompt-caching strategies.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-30">
                <div class="ve-audit-card wow fadeInUp" data-wow-delay="300ms">
                    <div class="ve-audit-card-icon"><i class="fa fa-shield"></i></div>
                    <h4>3. Security &amp; Data Guardrails</h4>
                    <p>Clear guidance on HIPAA/SOC2 compliance, private data isolation, and hallucination defense before writing a line of code.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Intake Form Section -->
<section class="ve-section ve-audit-form-section" style="background: var(--ve-dark2); padding-top: 50px; padding-bottom: 80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="ve-contact-form-wrap ve-audit-form-wrap wow fadeInUp" data-wow-delay="150ms">
                    <div class="text-center mb-40">
                        <span class="ve-section-tag">Direct Engineer Intake</span>
                        <h2>Request Your <span>Free AI Audit</span></h2>
                        <p style="color: var(--ve-text); max-width: 580px; margin: 10px auto 0;">
                            Fill in your details below. Our senior engineering team will review your business case and deliver your customized audit within 48 hours.
                        </p>
                    </div>

                    <form class="ve-contact-form" action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service" value="Free AI Audit">

                        <div class="ve-form-row">
                            <div class="ve-form-group">
                                <label for="audit_name">Full Name <span style="color:var(--ve-gold);">*</span></label>
                                <input type="text" id="audit_name" name="name" placeholder="e.g. Alex Morgan" required value="{{ old('name') }}">
                            </div>
                            <div class="ve-form-group">
                                <label for="audit_email">Business Email <span style="color:var(--ve-gold);">*</span></label>
                                <input type="email" id="audit_email" name="email" placeholder="alex@yourcompany.com" required value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="ve-form-row">
                            <div class="ve-form-group">
                                <label for="audit_phone">Phone / WhatsApp (Optional)</label>
                                <input type="tel" id="audit_phone" name="phone" placeholder="+1 (555) 000-0000" value="{{ old('phone') }}">
                            </div>
                            <div class="ve-form-group">
                                <label for="audit_company_size">Company Size</label>
                                <select id="audit_company_size" name="company_size">
                                    <option value="1-10">1 – 10 team members (Seed / Startup)</option>
                                    <option value="11-50" selected>11 – 50 team members (Growth Stage)</option>
                                    <option value="51-200">51 – 200 team members (Scale-up)</option>
                                    <option value="200+">200+ team members (Enterprise)</option>
                                </select>
                            </div>
                        </div>

                        <div class="ve-form-group">
                            <label for="audit_message">What are you hoping AI could do for your business? <span style="color:var(--ve-gold);">*</span></label>
                            <textarea id="audit_message" name="message" rows="5" placeholder="e.g. We want an autonomous customer support agent integrated with our PostgreSQL DB and Zendesk, or a private document search for our internal ops..." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="text-center mt-30">
                            <button type="submit" class="ve-btn-primary" style="padding: 16px 36px; font-size: 16px; font-weight: 700;">
                                Book My Free AI Audit &rarr;
                            </button>
                            <p style="font-size: 13px; color: #94a3b8; margin-top: 14px;">
                                <i class="fa fa-lock"></i> Strict confidentiality guaranteed &middot; Non-disclosure friendly
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What Happens Next Section -->
<section class="ve-section ve-audit-steps-section">
    <div class="container">
        <div class="ve-section-header text-center">
            <span class="ve-section-tag">The Process</span>
            <h2>What Happens <span>Next?</span></h2>
            <p>Our audit is fast, transparent, and built to give you immediate technical clarity.</p>
        </div>
        <div class="ve-process-grid">
            <div class="ve-process-step wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-process-num">01</div>
                <h5>Intake Review</h5>
                <p>A senior AI systems engineer reviews your product, existing stack, and automation goals.</p>
            </div>
            <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
            <div class="ve-process-step wow fadeInUp" data-wow-delay="250ms">
                <div class="ve-process-num">02</div>
                <h5>48-Hour Architecture Memo</h5>
                <p>We prepare an executive summary detailing model feasibility, latency estimates, and cost modeling.</p>
            </div>
            <div class="ve-process-arrow"><i class="fa fa-long-arrow-right"></i></div>
            <div class="ve-process-step wow fadeInUp" data-wow-delay="400ms">
                <div class="ve-process-num">03</div>
                <h5>Strategy &amp; Roadmap Call</h5>
                <p>We hop on a 30-minute walkthrough to answer questions and present a high-confidence implementation roadmap.</p>
            </div>
        </div>
    </div>
</section>
@endsection
