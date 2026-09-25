@extends('layouts.app')

@section('title', 'Stackify Studio — AI Development & Software Engineering Agency')
@section('description', 'Stackify Studio designs and engineers AI agents, LLM-integrated platforms, and modern software — built for startups and growing businesses, not six-month strategy decks.')
@section('canonical', url('/'))

@section('content')
<!-- ===== HERO: Split layout — left text, right image panel ===== -->
    <section class="ve-hero">
        <!-- Left Panel -->
        <div class="ve-hero-left">
            <span class="ve-hero-badge"><i class="fa fa-bolt"></i> AI Agents &nbsp;·&nbsp; LLM Integration &nbsp;·&nbsp; Custom Software</span>
            <h1>We Build <span class="ve-highlight">AI-Powered</span><br>Products That Ship</h1>
            <p>Stackify Studio designs and engineers AI agents, LLM-integrated platforms, and modern software — built for startups and growing businesses, not six-month strategy decks.</p>
            <div class="ve-hero-btns" style="display:flex; flex-wrap:wrap; gap:12px; align-items:center;">
                <a href="{{ route('pages.ai-audit') }}" class="ve-btn-primary">Book Free AI Audit <i class="fa fa-arrow-right"></i></a>
                <a href="{{ route('pages.seo-consultation') }}" class="ve-btn-ghost"><i class="fa fa-search" style="color:var(--ve-accent); margin-right:4px;"></i> Book SEO Consultation</a>
            </div>
            <!-- Quick Stats Row -->
            <div class="ve-hero-stats">
                <div class="ve-stat">
                    <strong>100%</strong>
                    <span>Production-Ready</span>
                </div>
                <div class="ve-stat-divider"></div>
                <div class="ve-stat">
                    <strong>99.8%</strong>
                    <span>System Reliability</span>
                </div>
                <div class="ve-stat-divider"></div>
                <div class="ve-stat">
                    <strong>&lt;150ms</strong>
                    <span>Avg AI Latency</span>
                </div>
            </div>
        </div>
        <!-- Right Panel: Abstract AI Architecture UI Card -->
        <div class="ve-hero-right">
            <div class="ve-hero-abstract-card wow fadeInRight" data-wow-delay="200ms">
                <div class="ve-hero-node-header">
                    <div class="ve-hero-node-title">
                        <i class="fa fa-microchip"></i>
                        <span>Stackify Agent Orchestrator</span>
                    </div>
                    <span class="ve-hero-node-pill">v2.4 Active</span>
                </div>
                <div class="ve-hero-pipeline-grid">
                    <div class="ve-pipeline-node">
                        <div class="ve-node-left">
                            <div class="ve-node-icon"><i class="fa fa-terminal"></i></div>
                            <div>
                                <div class="ve-node-label">User Intent &amp; Guardrails</div>
                                <div class="ve-node-sub">Deterministic Schema Validation</div>
                            </div>
                        </div>
                        <span class="ve-node-status">Verified</span>
                    </div>
                    <div class="ve-pipeline-node">
                        <div class="ve-node-left">
                            <div class="ve-node-icon"><i class="fa fa-database"></i></div>
                            <div>
                                <div class="ve-node-label">Hybrid Vector Retrieval (RAG)</div>
                                <div class="ve-node-sub">Pinecone / pgvector · 1536 dim</div>
                            </div>
                        </div>
                        <span class="ve-node-status">&lt;45ms</span>
                    </div>
                    <div class="ve-pipeline-node">
                        <div class="ve-node-left">
                            <div class="ve-node-icon"><i class="fa fa-cogs"></i></div>
                            <div>
                                <div class="ve-node-label">LLM Reasoning Engine</div>
                                <div class="ve-node-sub">Claude 3.5 &amp; GPT-4o Fallback</div>
                            </div>
                        </div>
                        <span class="ve-node-status">99.8%</span>
                    </div>
                    <div class="ve-pipeline-node">
                        <div class="ve-node-left">
                            <div class="ve-node-icon"><i class="fa fa-check-circle"></i></div>
                            <div>
                                <div class="ve-node-label">Structured Tool Execution</div>
                                <div class="ve-node-sub">Zero-Hallucination Output</div>
                            </div>
                        </div>
                        <span class="ve-node-status">Ready</span>
                    </div>
                </div>
            </div>
            <!-- Floating badge -->
            <div class="ve-float-card">
                <i class="fa fa-bolt"></i>
                <div>
                    <strong>Autonomous</strong>
                    <span>Agent Architecture</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== MARQUEE TRUST BAR ===== -->
    <div class="ve-trust-bar">
        <div class="ve-trust-inner">
            <span><i class="fa fa-microchip"></i> AI-Native Architecture</span>
            <span><i class="fa fa-cogs"></i> LLM Integration &amp; RAG</span>
            <span><i class="fa fa-shield"></i> Enterprise-Grade Security</span>
            <span><i class="fa fa-bolt"></i> Autonomous AI Agents</span>
            <span><i class="fa fa-lock"></i> SOC2-Compliant Pipelines</span>
            <span><i class="fa fa-check-circle"></i> Clean Architecture</span>
            <span><i class="fa fa-microchip"></i> AI-Native Architecture</span>
            <span><i class="fa fa-cogs"></i> LLM Integration &amp; RAG</span>
            <span><i class="fa fa-shield"></i> Enterprise-Grade Security</span>
            <span><i class="fa fa-bolt"></i> Autonomous AI Agents</span>
        </div>
    </div>

    <!-- ===== AI STACK TRUST BAR ===== -->
    <section class="ve-ai-stack-section">
        <div class="container">
            <div class="ve-ai-stack-title">Production AI Stack &amp; Infrastructure We Build With</div>
            <div class="ve-ai-stack-grid">
                <div class="ve-ai-badge"><i class="fa fa-circle-o-notch"></i> OpenAI (GPT-4o)</div>
                <div class="ve-ai-badge"><i class="fa fa-bolt"></i> Anthropic Claude 3.5</div>
                <div class="ve-ai-badge"><i class="fa fa-google"></i> Google Gemini</div>
                <div class="ve-ai-badge"><i class="fa fa-link"></i> LangChain</div>
                <div class="ve-ai-badge"><i class="fa fa-cubes"></i> Meta Llama 3</div>
                <div class="ve-ai-badge"><i class="fa fa-database"></i> Pinecone Vector DB</div>
                <div class="ve-ai-badge"><i class="fa fa-fire"></i> PyTorch</div>
                <div class="ve-ai-badge"><i class="fa fa-code-fork"></i> Hugging Face</div>
            </div>
        </div>
    </section>

    <!-- ===== LIVE DEMO CHATBOT WIDGET ===== -->
    <section class="ve-section ve-demo-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag"><i class="fa fa-terminal"></i> Interactive Preview</span>
                <h2>Test Our <span>AI Agent Architecture</span></h2>
                <p>Click a question or type below to see how our custom agents process user intent with deterministic guardrails.</p>
            </div>
            <div class="ve-demo-card wow fadeInUp" data-wow-delay="100ms">
                <div class="ve-demo-header">
                    <div class="ve-demo-header-left">
                        <div class="ve-demo-status-dot"></div>
                        <h4 class="ve-demo-title">Stackify AI Assistant</h4>
                    </div>
                    <span class="ve-demo-badge">Live Sub-100ms Demo</span>
                </div>
                <div class="ve-demo-body" id="ve-demo-chat-body">
                    <div class="ve-chat-msg bot">
                        <div class="ve-chat-avatar"><i class="fa fa-microchip"></i></div>
                        <div class="ve-chat-bubble">
                            Hello! I'm Stackify Studio's AI Architecture Assistant. How can we help you pivot or scale your product with applied AI?
                            <div class="ve-chat-chips">
                                <button class="ve-chip-btn" data-query="How do your AI agents integrate with existing apps?">How do AI agents integrate?</button>
                                <button class="ve-chip-btn" data-query="What is included in the Free AI Audit?">What's in the Free AI Audit?</button>
                                <button class="ve-chip-btn" data-query="What is included in the SEO & GEO consultation?">What's in the SEO Consultation?</button>
                                <button class="ve-chip-btn" data-query="How do you prevent hallucinations in RAG?">How do you prevent hallucinations?</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ve-demo-footer">
                    <input type="text" id="ve-demo-input" class="ve-demo-input" placeholder="Ask a question about our AI development services...">
                    <button id="ve-demo-send" class="ve-demo-send-btn">Ask AI &rarr;</button>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== SERVICES GRID (new card layout) ===== -->
    <section class="ve-section ve-services-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Our Capabilities</span>
                <h2>Applied AI &amp; <span>Engineering Services</span></h2>
                <p>From autonomous customer agents to enterprise RAG pipelines, we engineer software that delivers quantifiable business ROI.</p>
            </div>
            <div class="ve-services-grid">
                @forelse($services as $index => $service)
                <div class="ve-service-card wow fadeInUp" data-wow-delay="{{ (min($index, 5) + 1) * 100 }}ms">
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
                    <p>Services will appear here once they are published in the admin panel.</p>
                </div>
                @endforelse
            </div>

            <!-- SEO & GEO Consultation Callout Box -->
            <div class="wow fadeInUp" data-wow-delay="200ms" style="margin-top:40px; padding:28px 32px; background:var(--ve-surface); border:1px solid var(--ve-border); border-left:4px solid var(--ve-accent); border-radius:var(--ve-radius); box-shadow:var(--ve-shadow); display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:20px;">
                <div style="max-width:680px;">
                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:6px;">
                        <span style="font-size:11px; font-weight:800; text-transform:uppercase; letter-spacing:1px; background:var(--ve-accent-subtle); color:var(--ve-accent); padding:3px 10px; border-radius:20px;">Comprehensive Search Audit</span>
                        <h4 style="margin:0; font-size:20px;">Looking to audit &amp; scale your Search &amp; AI visibility?</h4>
                    </div>
                    <p style="margin:0; font-size:14.5px; color:var(--ve-text-muted);">Get our complete 5-pillar audit covering on-page, off-page, technical, local, and semantic GEO optimization for Google and AI answer engines.</p>
                </div>
                <a href="{{ route('pages.seo-consultation') }}" class="ve-btn-primary" style="white-space:nowrap; padding:12px 24px;">Book SEO Consultation &rarr;</a>
            </div>
        </div>
    </section>

    <!-- ===== FEATURED PROJECTS ===== -->
    <section class="ve-section ve-portfolio-section ve-home-featured-projects">
        <div class="container-fluid">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Portfolio</span>
                <h2>Featured <span>Projects</span></h2>
                <p>Recent work across product builds, platforms, and digital experiences. <a href="{{ route('pages.projects') }}" style="color:var(--ve-accent); font-weight:600;">Browse all projects</a></p>
            </div>
            @if($projects->isNotEmpty())
            <div class="ve-featured-projects-carousel owl-carousel">
                @foreach($projects as $index => $project)
                <div class="item">
                    <div class="ve-portfolio-card" style="margin-bottom:0;">
                        <img class="ve-portfolio-img" src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" loading="lazy" decoding="async">
                        <div class="ve-portfolio-overlay">
                            <div class="ve-portfolio-info">
                                <span class="ve-portfolio-cat">{{ $project->category }}</span>
                                <h3>{{ $project->title }}</h3>
                                <p>{{ Str::limit($project->short_description, 95) }}</p>
                                <a href="{{ route('pages.projects.show', $project) }}" class="ve-btn-white" style="padding: 10px 20px; font-size: 12px;">View Case Study</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="ve-featured-projects-empty">
                <p>Featured projects will appear here once they are published in the admin panel.</p>
            </div>
            @endif
        </div>
    </section>

    <!-- ===== WHY US (two-column: graphic left, content right) ===== -->
    <section class="ve-section ve-whyus-section">
        <div class="container">
            <div class="row align-items-center">
                <!-- Abstract Architecture Panel -->
                <div class="col-12 col-lg-5">
                    <div class="ve-whyus-card wow fadeInLeft" data-wow-delay="100ms">
                        <div class="ve-hero-node-header" style="margin-bottom:16px;">
                            <div class="ve-hero-node-title">
                                <i class="fa fa-shield"></i>
                                <span>Production Engineering Guardrails</span>
                            </div>
                            <span class="ve-hero-node-pill">SOC2 Ready</span>
                        </div>
                        <div class="ve-hero-pipeline-grid">
                            <div class="ve-pipeline-node">
                                <div class="ve-node-left">
                                    <div class="ve-node-icon"><i class="fa fa-lock"></i></div>
                                    <div>
                                        <div class="ve-node-label">Private VPC Data Isolation</div>
                                        <div class="ve-node-sub">Zero Customer Data Retention</div>
                                    </div>
                                </div>
                                <span class="ve-node-status">Secured</span>
                            </div>
                            <div class="ve-pipeline-node">
                                <div class="ve-node-left">
                                    <div class="ve-node-icon"><i class="fa fa-bolt"></i></div>
                                    <div>
                                        <div class="ve-node-label">Continuous Eval Testbench</div>
                                        <div class="ve-node-sub">Synthetic Benchmark Suites</div>
                                    </div>
                                </div>
                                <span class="ve-node-status">Automated</span>
                            </div>
                            <div class="ve-pipeline-node">
                                <div class="ve-node-left">
                                    <div class="ve-node-icon"><i class="fa fa-sliders"></i></div>
                                    <div>
                                        <div class="ve-node-label">Dynamic Fallback Routing</div>
                                        <div class="ve-node-sub">Multi-Model Latency Balancing</div>
                                    </div>
                                </div>
                                <span class="ve-node-status">&lt;150ms</span>
                            </div>
                        </div>
                        <div class="ve-whyus-badge">
                            <strong>AI-Native</strong>
                            <span>Production Engineering</span>
                        </div>
                    </div>
                </div>
                <!-- Content Side -->
                <div class="col-12 col-lg-7 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-whyus-content">
                        <span class="ve-section-tag">Why Stackify Studio</span>
                        <h2>A Smarter Way to Ship <span>Intelligent Software</span></h2>
                        <p>We combine deep systems engineering with modern LLM tooling to build AI agents and scalable platforms that consistently outperform expectations — shipped in weeks, not quarters.</p>
                        <div class="ve-checklist">
                            <div class="ve-check-item">
                                <i class="fa fa-check-circle"></i>
                                <div><strong>Model Agnostic &amp; Cost Optimized</strong><p>We choose the right models (OpenAI, Claude, Gemini, open-source) with prompt caching and latency optimization.</p></div>
                            </div>
                            <div class="ve-check-item">
                                <i class="fa fa-check-circle"></i>
                                <div><strong>Production Guardrails &amp; Eval Pipelines</strong><p>Rigorous evaluations, hallucination defense, and SOC2-ready data privacy built in from day one.</p></div>
                            </div>
                            <div class="ve-check-item">
                                <i class="fa fa-check-circle"></i>
                                <div><strong>Full-Stack Integration</strong><p>Seamless embedding into your existing databases, APIs, CRMs, and internal workflows.</p></div>
                            </div>
                        </div>
                        <a href="{{ route('pages.ai-audit') }}" class="ve-btn-primary mt-30">Get Your AI Audit</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== COUNTERS ===== -->
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

    <!-- ===== TESTIMONIALS (Text-First Modern Cards) ===== -->
    <section class="ve-section ve-testimonials-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Client Stories</span>
                <h2>What Leaders <span>Say</span></h2>
                <p>Real feedback from founders and engineering leaders we have built with.</p>
            </div>
            <div class="ve-testi-grid">
                <div class="ve-testi-card ve-testi-card-clean wow fadeInUp" data-wow-delay="100ms">
                    <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p class="ve-testi-quote">"Stackify Studio built our customer support AI agent in 3 weeks. It now resolves 68% of tier-1 tickets autonomously with zero hallucination issues."</p>
                    <div class="ve-testi-author-clean">
                        <div class="ve-testi-avatar-badge">AM</div>
                        <div>
                            <strong>Alex Morgan</strong>
                            <span>VP Operations &middot; Apex Commerce</span>
                        </div>
                    </div>
                </div>
                <div class="ve-testi-card ve-testi-card-clean wow fadeInUp" data-wow-delay="250ms">
                    <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p class="ve-testi-quote">"The engineering team gave us total peace of mind. Their RAG architecture cut our internal document search time from 20 minutes to 3 seconds."</p>
                    <div class="ve-testi-author-clean">
                        <div class="ve-testi-avatar-badge">SP</div>
                        <div>
                            <strong>Sarah Patel</strong>
                            <span>Founder &amp; CEO &middot; Novus Health</span>
                        </div>
                    </div>
                </div>
                <div class="ve-testi-card ve-testi-card-clean wow fadeInUp" data-wow-delay="400ms">
                    <div class="ve-testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p class="ve-testi-quote">"We handed them a legacy platform needing modern AI features. They refactored it completely and deployed custom LLM workflows without a hitch."</p>
                    <div class="ve-testi-author-clean">
                        <div class="ve-testi-avatar-badge">JL</div>
                        <div>
                            <strong>James Liu</strong>
                            <span>Head of Engineering &middot; Vault FinTech</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA BANNER ===== -->
    <section class="ve-cta-banner">
        <div class="container ve-cta-content">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h2>Ready to Build Your <span>AI &amp; Search Advantage?</span></h2>
                    <p>Schedule a complimentary technical session with our engineering leads — choose between a 48-hour AI architecture audit or a full 5-pillar SEO &amp; GEO consultation.</p>
                </div>
                <div class="col-12 col-lg-5 text-lg-right" style="display:flex; flex-wrap:wrap; gap:12px; justify-content:flex-end; align-items:center;">
                    <a href="{{ route('pages.ai-audit') }}" class="ve-btn-white">Free AI Audit &rarr;</a>
                    <a href="{{ route('pages.seo-consultation') }}" class="ve-btn-primary" style="border:1px solid #FFFFFF;">SEO Consultation &rarr;</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LATEST INSIGHTS ===== -->
    <section class="ve-section ve-insights-section">
        <div class="container">
            <div class="ve-section-header text-center">
                <span class="ve-section-tag">Engineering Blog</span>
                <h2>Latest Tech <span>Insights</span></h2>
                <p>Stay updated with our explorations in code, architecture, and design trends.</p>
            </div>
            <div class="row">
                @foreach($posts as $index => $post)
                <div class="col-12 col-md-4 wow fadeInUp" data-wow-delay="{{ 100 + ($index * 150) }}ms">
                    <div class="ve-insight-card">
                        <img class="ve-insight-img" src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" loading="lazy" decoding="async">
                        <div class="ve-insight-body">
                            <span class="ve-insight-cat">{{ $post->category }}</span>
                            <h5><a href="{{ route('pages.blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                            <p>{{ Str::limit($post->summary, 85) }}</p>
                            <div class="ve-insight-meta">
                                <span><i class="fa fa-calendar"></i> {{ $post->published_at->format('M d') }}</span>
                                <a href="{{ route('pages.blog.show', $post->slug) }}">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
