<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @php
        $__defaultDesc = $settings['default_meta_description'] ?? 'Stackify Studio is a premier AI development & software engineering agency specializing in custom AI agents, LLM integrations, and modern platforms.';
        $__defaultTitle = ($settings['site_name'] ?? 'Stackify Studio').' — AI Development & Software Engineering Agency';
        $__faviconHref = \App\Support\SiteBranding::faviconUrl($settings ?? []);
        $__schemaLogoHref = \App\Support\SiteBranding::schemaLogoUrl($settings ?? []);
        $__whatsappDigits = preg_replace('/\D+/', '', (string) ($settings['whatsapp_number'] ?? ''));
        $__whatsappHref = $__whatsappDigits !== '' ? 'https://wa.me/'.$__whatsappDigits : null;
    @endphp
    <!-- Core Meta -->
    <meta name="description" content="@yield('description', $__defaultDesc)">
    <meta name="keywords" content="@yield('keywords', 'Stackify Studio, AI Development, AI Agents, LLM Integration, RAG Pipelines, AI Engineering Agency, Custom Software')">
    <link rel="canonical" href="@yield('canonical', url()->current())" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', $__defaultTitle)</title>

    @php
        $__sameAs = isset($socialLinks)
            ? $socialLinks->pluck('url')->map(fn ($u) => trim((string) $u))->filter(fn ($u) => $u !== '' && preg_match('#^https?://#i', $u))->values()->all()
            : [];

        $__offerCatalogItems = [
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'AI Agents & Chatbots',
                    'url' => route('pages.services.show', 'ai-agents-chatbots'),
                    'description' => 'Autonomous LLM-powered support, sales, and internal-ops agents engineered directly into your product.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'LLM Integration & RAG',
                    'url' => route('pages.services.show', 'llm-integration-rag'),
                    'description' => 'Embedding AI into existing client systems and data with private vector search, document Q&A, and copilots.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'AI-Native Web Platforms',
                    'url' => route('pages.services.show', 'ai-native-web-platforms'),
                    'description' => 'High-performance, scalable web platforms architected from the ground up to support AI capabilities.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Custom AI Software & Automation',
                    'url' => route('pages.services.show', 'custom-ai-software-automation'),
                    'description' => 'Bespoke engineering and intelligent automation pipelines that eliminate manual bottlenecks.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'AI-Powered UX & Personalization',
                    'url' => route('pages.services.show', 'ai-powered-ux-personalization'),
                    'description' => 'Dynamic interfaces crafted with conversational UX, adaptive user journeys, and micro-interactions.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'AI-Ready Website Modernization',
                    'url' => route('pages.services.show', 'ai-ready-website-modernization'),
                    'description' => 'Transform outdated websites into lightning-fast, AI-integrated digital experiences with modern SEO.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'AI SEO & GEO',
                    'url' => route('pages.services.show', 'ai-seo-geo'),
                    'description' => 'Generative Engine Optimization and advanced semantic SEO to dominate Google search and AI answer engines.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'E-Commerce Setups',
                    'url' => route('pages.services.show', 'e-commerce-setups'),
                    'description' => 'High-converting online storefronts equipped with secure payments, inventory sync, and AI-powered product search.',
                ],
            ],
            [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Hosting & Infrastructure',
                    'url' => route('pages.services.show', 'hosting-infrastructure'),
                    'description' => 'Cloud infrastructure deployments optimized for speed, data sovereignty, GPU acceleration, and 99.9% uptime.',
                ],
            ],
        ];

        $__orgSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'additionalType' => [
                'https://schema.org/SoftwareApplication',
                'https://en.wikipedia.org/wiki/Artificial_intelligence',
            ],
            'name' => $settings['site_name'] ?? 'Stackify Studio',
            'url' => url('/'),
            'logo' => $__schemaLogoHref,
            'image' => asset('img/bg-img/21.jpg'),
            'description' => 'Stackify Studio is a premier AI development & software engineering agency specializing in custom AI agents, LLM integrations, RAG pipelines, modern web platforms, and Generative Engine Optimization (GEO).',
            'priceRange' => '$$$',
            'telephone' => $settings['footer_phone'] ?? '+92 312 7535263',
            'email' => $settings['footer_email'] ?? 'info@stackifystudio.com',
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Islamabad',
                'addressCountry' => 'PK',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'AI Engineering & Software Development Services',
                'itemListElement' => $__offerCatalogItems,
            ],
        ];
        if ($__sameAs !== []) {
            $__orgSchema['sameAs'] = $__sameAs;
        }
    @endphp
    <script type="application/ld+json">{!! json_encode($__orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

    @if (\Illuminate\Support\Facades\View::hasSection('schema'))
        @yield('schema')
    @endif

    <!-- Open Graph Meta -->
    <meta property="og:site_name" content="{{ $settings['site_name'] ?? 'Stackify Studio' }}">
    <meta property="og:title" content="@yield('title', $__defaultTitle)">
    <meta property="og:description" content="@yield('description', $__defaultDesc)">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('img/bg-img/21.jpg'))">
    
    <!-- Twitter Card Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $__defaultTitle)">
    <meta name="twitter:description" content="@yield('description', $__defaultDesc)">
    <meta name="twitter:image" content="@yield('og_image', asset('img/bg-img/21.jpg'))">

    <link rel="icon" type="image/svg+xml" href="{{ asset('img/core-img/favicon.svg') }}?v={{ @filemtime(public_path('img/core-img/favicon.svg')) ?: 1 }}">
    <link rel="alternate icon" href="{{ $__faviconHref }}">
    <link rel="apple-touch-icon" href="{{ asset('img/core-img/favicon.svg') }}?v={{ @filemtime(public_path('img/core-img/favicon.svg')) ?: 1 }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ @filemtime(public_path('style.css')) ?: 1 }}">
    <link rel="stylesheet" href="{{ asset('css/custom-override.css') }}?v={{ @filemtime(public_path('css/custom-override.css')) ?: 1 }}">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    </div>

    <!-- ===== NAVBAR ===== -->
    <header class="ve-header" id="ve-sticky">
        <div class="container-fluid ve-nav-wrap">
            <!-- Logo -->
            <div class="ve-logo">
                <a href="{{ route('pages.home') }}">
                    @include('partials.site-logo')
                </a>
            </div>

            <!-- Nav Links -->
            <nav class="ve-nav">
                <ul>
                    <li><a href="{{ route('pages.home') }}" class="{{ request()->routeIs('pages.home') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('pages.about') }}" class="{{ request()->routeIs('pages.about') ? 'active' : '' }}">About Us</a></li>
                    <li><a href="{{ route('pages.services') }}" class="{{ request()->routeIs('pages.services*') ? 'active' : '' }}">Services</a></li>
                    <li><a href="{{ route('pages.seo-consultation') }}" class="{{ request()->routeIs('pages.seo-consultation') ? 'active' : '' }}">SEO Consultation</a></li>
                    <!-- <li class="has-drop">
                        <a href="#">Solutions <i class="fa fa-angle-down"></i></a>
                        <ul class="ve-dropdown">
                            <li><a href="#">Custom Web Apps</a></li>
                            <li><a href="#">Business Websites</a></li>
                            <li><a href="#">E-Commerce Stores</a></li>
                            <li><a href="#">UI/UX Design</a></li>
                        </ul>
                    </li> -->
                    <li><a href="{{ route('pages.projects') }}" class="{{ request()->routeIs('pages.projects*') ? 'active' : '' }}">Projects</a></li>
                    <li><a href="{{ route('pages.blog') }}" class="{{ request()->routeIs('pages.blog*') ? 'active' : '' }}">Insights</a></li>
                    <li><a href="{{ route('pages.contact') }}" class="{{ request()->routeIs('pages.contact') ? 'active' : '' }}">Contact</a></li>
                </ul>
            </nav>

            <!-- CTA -->
            <div class="ve-nav-cta" style="display:flex; align-items:center; gap:10px;">
                <a href="{{ route('pages.seo-consultation') }}" class="ve-btn-ghost" style="padding:9px 16px; font-size:13px; font-weight:700; border:1px solid var(--ve-border); border-radius:30px;"><i class="fa fa-search" style="color:var(--ve-accent); margin-right:4px;"></i> SEO Audit</a>
                <a href="{{ route('pages.ai-audit') }}" class="ve-cta-btn">Free AI Audit <i class="fa fa-arrow-right"></i></a>
            </div>

            <!-- Mobile Toggle -->
            <button class="ve-toggler" id="ve-toggle">
                <span></span><span></span><span></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="ve-mobile-menu" id="ve-mobile-menu">
            <ul>
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li><a href="{{ route('pages.about') }}">About</a></li>
                <li><a href="{{ route('pages.services') }}">Services</a></li>
                <li><a href="{{ route('pages.projects') }}">Projects</a></li>
                <li><a href="{{ route('pages.blog') }}">Insights</a></li>
                <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                <li><a href="{{ route('pages.ai-audit') }}" style="color:var(--ve-accent); font-weight:700;">Free AI Audit &rarr;</a></li>
                <li><a href="{{ route('pages.seo-consultation') }}" style="color:var(--ve-accent); font-weight:700;">SEO Consultation &rarr;</a></li>
            </ul>
        </div>
    </header>

    @yield('content')

    <section class="ve-newsletter-section">
        <div class="container">
            <div class="ve-newsletter-wrap">
                <div class="ve-nl-left">
                    <i class="fa fa-envelope-o"></i>
                    <div>
                        <h3>Stay Ahead of the AI & Tech Curve</h3>
                        <p>Weekly insights on production AI agents, LLM architectures, and engineering breakthroughs — straight to your inbox.</p>
                    </div>
                </div>
                <div class="ve-nl-right">
                    <form class="ve-nl-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Enter your email address" required value="{{ old('email') }}">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<footer class="ve-footer">
        <div class="container">
            <div class="row">
                <!-- Col 1: Brand -->
                <div class="col-12 col-sm-6 col-lg-4 mb-50">
                    <div class="ve-footer-brand">
                        <a href="{{ route('pages.home') }}" class="ve-footer-logo">
                            @include('partials.site-logo')
                        </a>
                        <p>{{ $settings['footer_tagline'] ?? 'Engineering high-impact AI agents, LLM integrations, and modern intelligent software platforms.' }}</p>
                        @include('partials.social-links')
                    </div>
                </div>
                <!-- Col 2: Quick Links -->
                <div class="col-12 col-sm-6 col-lg-2 mb-50">
                    <h5 class="ve-footer-title">Quick Links</h5>
                    <ul class="ve-footer-links">
                        <li><a href="{{ route('pages.home') }}">Home</a></li>
                        <li><a href="{{ route('pages.about') }}">About Us</a></li>
                        <li><a href="{{ route('pages.services') }}">Services</a></li>
                        <li><a href="{{ route('pages.ai-audit') }}">Free AI Audit</a></li>
                        <li><a href="{{ route('pages.seo-consultation') }}">SEO Consultation</a></li>
                        <li><a href="{{ route('pages.projects') }}">Projects</a></li>
                        <li><a href="{{ route('pages.blog') }}">Insights</a></li>
                        <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                    </ul>
                </div>
                <!-- Col 3: Services -->
                <div class="col-12 col-sm-6 col-lg-3 mb-50">
                    <h5 class="ve-footer-title">Our AI Services</h5>
                    <ul class="ve-footer-links">
                        <li><a href="{{ route('pages.services') }}">AI Agents & Chatbots</a></li>
                        <li><a href="{{ route('pages.services') }}">LLM Integration & RAG</a></li>
                        <li><a href="{{ route('pages.services') }}">AI-Native Web Platforms</a></li>
                        <li><a href="{{ route('pages.services') }}">Custom AI Software</a></li>
                        <li><a href="{{ route('pages.services') }}">AI-Powered UX Design</a></li>
                        <li><a href="{{ route('pages.services') }}">AI-Ready Revamps</a></li>
                        <li><a href="{{ route('pages.seo-consultation') }}">AI SEO &amp; GEO Audit</a></li>
                    </ul>
                </div>
                <!-- Col 4: Contact -->
                <div class="col-12 col-sm-6 col-lg-3 mb-50">
                    <h5 class="ve-footer-title">Get In Touch</h5>
                    <ul class="ve-footer-contact">
                        <li><i class="fa fa-map-marker"></i> {{ $settings['footer_address'] ?? 'Islamabad, Pakistan' }}</li>
                        <li><i class="fa fa-phone"></i> {{ $settings['footer_phone'] ?? '+92 312 7535263' }}</li>
                        <li><i class="fa fa-envelope"></i> {{ $settings['footer_email'] ?? 'info@stackifystudio.com' }}</li>
                        <li><i class="fa fa-clock-o"></i> {{ $settings['footer_hours'] ?? 'Mon–Fri, 9am – 6pm PKT' }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="ve-footer-bottom">
            <div class="container">
                <div class="ve-footer-bottom-inner">
                    <p>Copyright &copy; {{ date('Y') }} {{ $settings['copyright_owner'] ?? 'Stackify Studio' }}. All Rights Reserved.</p>
                    <ul>
                        <li><a href="{{ route('pages.privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('pages.terms') }}">Terms of Use</a></li>
                        <li><a href="{{ route('pages.cookies') }}">Cookie Policy</a></li>
                        <li><a href="{{ route('newsletter.unsubscribe.view') }}">Unsubscribe</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    @if ($__whatsappHref)
        <a href="{{ $__whatsappHref }}" class="ve-whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
        </a>
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/active.js') }}?v={{ @filemtime(public_path('js/active.js')) ?: 1 }}"></script>
    <script src="{{ asset('js/stackify.js') }}?v={{ @filemtime(public_path('js/stackify.js')) ?: 1 }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Global Success Alert
            @if(session('success') || session('newsletter_success'))
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') ?? session('newsletter_success') }}",
                    icon: 'success',
                    confirmButtonColor: '#C1440E',
                    timer: 5000,
                    timerProgressBar: true
                });
            @endif

            // Global Error Alert
            @if($errors->any() || $errors->unsubscribe->any() || $errors->newsletter->any())
                @php
                    $errorMessage = $errors->first();
                    if ($errors->unsubscribe->any()) $errorMessage = $errors->unsubscribe->first();
                    if ($errors->newsletter->any()) $errorMessage = $errors->newsletter->first();
                @endphp
                Swal.fire({
                    title: 'Requirement Missing',
                    text: "{{ $errorMessage }}",
                    icon: 'warning',
                    confirmButtonColor: '#C1440E'
                });
            @endif
        });
    </script>
</body>
</html>
