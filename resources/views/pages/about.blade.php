@extends('layouts.app')

@section('title', 'About Us — Stackify Studio AI Engineering & System Architects')
@section('canonical', route('pages.about'))

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
                'name' => 'About Us',
                'item' => route('pages.about'),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
<section class="ve-page-hero">
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Our Story</span>
            <h1>Engineering the Future of <span>Applied AI</span></h1>
            <nav aria-label="breadcrumb">
                <ol class="ve-breadcrumb">
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li class="active">About Us</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- ABOUT SPLIT -->
    <section class="ve-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="ve-about-img-stack">
                        <div class="ve-about-abstract-card">
                            <div class="ve-hero-node-header" style="margin-bottom:16px;">
                                <div class="ve-hero-node-title">
                                    <i class="fa fa-rocket"></i>
                                    <span>Stackify Engineering DNA</span>
                                </div>
                                <span class="ve-hero-node-pill">Since 2019</span>
                            </div>
                            <div class="ve-about-features" style="margin-top:20px;">
                                <div class="ve-af-item"><i class="fa fa-microchip"></i><span>Senior AI & Systems Engineers</span></div>
                                <div class="ve-af-item"><i class="fa fa-cogs"></i><span>RAG & Vector Search Specialists</span></div>
                                <div class="ve-af-item"><i class="fa fa-rocket"></i><span>Production-Grade Guardrails</span></div>
                                <div class="ve-af-item"><i class="fa fa-shield"></i><span>SOC2 & Enterprise Compliance</span></div>
                            </div>
                            <div class="ve-hero-pipeline-grid" style="margin-top:16px;">
                                <div class="ve-pipeline-node">
                                    <div class="ve-node-left">
                                        <div class="ve-node-icon"><i class="fa fa-check-circle"></i></div>
                                        <div>
                                            <div class="ve-node-label">50+ AI Solutions Deployed</div>
                                            <div class="ve-node-sub">Cross-Industry Production Systems</div>
                                        </div>
                                    </div>
                                    <span class="ve-node-status">Active</span>
                                </div>
                                <div class="ve-pipeline-node">
                                    <div class="ve-node-left">
                                        <div class="ve-node-icon"><i class="fa fa-globe"></i></div>
                                        <div>
                                            <div class="ve-node-label">15+ Countries Served</div>
                                            <div class="ve-node-sub">Global AI Infrastructure</div>
                                        </div>
                                    </div>
                                    <span class="ve-node-status">Worldwide</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-about-text">
                        <span class="ve-section-tag">Who We Are</span>
                        <h2>An Agency Built on <span>AI Systems</span> &amp; Scalability</h2>
                        <p class="ve-lead">We are senior software engineers, AI architects, and UX designers dedicated to building production-grade AI agents and robust digital platforms.</p>
                        <p>Founded to bridge the gap between AI research prototypes and reliable production software, Stackify Studio delivers secure, high-performing AI solutions built for real business workflows.</p>
                        <a href="{{ route('pages.services') }}" class="ve-btn-primary mt-30">View AI Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MISSION / VISION / VALUES -->
    <section class="ve-mvv-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Our Foundation</span>
                <h2>Mission, Vision &amp; <span>Values</span></h2>
            </div>
            <div class="ve-mvv-grid">
                <div class="ve-mvv-card wow fadeInUp" data-wow-delay="100ms">
                    <div class="ve-mvv-icon"><i class="fa fa-bullseye"></i></div>
                    <h4>Our Mission</h4>
                    <p>To engineer intelligent, reliable AI products and high-performance software that unlock transformative business value.</p>
                </div>
                <div class="ve-mvv-card wow fadeInUp" data-wow-delay="250ms">
                    <div class="ve-mvv-icon"><i class="fa fa-eye"></i></div>
                    <h4>Our Vision</h4>
                    <p>To be the premier engineering partner for businesses deploying applied AI agents and next-generation software.</p>
                </div>
                <div class="ve-mvv-card wow fadeInUp" data-wow-delay="400ms">
                    <div class="ve-mvv-icon"><i class="fa fa-heart"></i></div>
                    <h4>Our Values</h4>
                    <p>Relentless engineering rigor, radical transparency, privacy by design, and rapid agile execution.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- COUNTERS -->
    <section class="ve-counter-section">
        <div class="container">
            <div class="ve-counter-grid">
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="100ms">
                    <i class="fa fa-microchip"></i>
                    <strong class="counter" data-count="50">0</strong><span>+</span>
                    <p>AI Solutions Deployed</p>
                </div>
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="200ms">
                    <i class="fa fa-laptop"></i>
                    <strong class="counter" data-count="350">0</strong><span>+</span>
                    <p>Projects Delivered</p>
                </div>
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="300ms">
                    <i class="fa fa-globe"></i>
                    <strong class="counter" data-count="15">0</strong><span>+</span>
                    <p>Countries Served</p>
                </div>
                <div class="ve-counter-item wow fadeInUp" data-wow-delay="400ms">
                    <i class="fa fa-shield"></i>
                    <strong class="counter" data-count="99">0</strong><span>.8%</span>
                    <p>System Reliability</p>
                </div>
            </div>
        </div>
    </section>

@endsection
