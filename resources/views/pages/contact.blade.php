@extends('layouts.app')

@section('title', 'Contact Stackify Studio — AI Development & Engineering Agency')
@section('description', 'Get in touch with Stackify Studio. Reach out to discuss custom AI agents, LLM integrations, software engineering, or schedule an architecture consultation.')
@section('canonical', route('pages.contact'))

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
                'name' => 'Contact',
                'item' => route('pages.contact'),
            ],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endsection

@section('content')
<section class="ve-page-hero">
        <div class="container ve-page-hero-content">
            <span class="ve-section-tag">Get In Touch</span>
            <h1>We'd Love to <span>Hear From You</span></h1>
            <nav aria-label="breadcrumb"><ol class="ve-breadcrumb"><li><a href="{{ route('pages.home') }}">Home</a></li><li class="active">Contact</li></ol></nav>
        </div>
    </section>

    <section class="ve-contact-cards-section">
        <div class="container">
            <div class="ve-contact-cards-grid">
                @forelse($contactCards as $index => $card)
                <div class="ve-contact-info-card wow fadeInUp" data-wow-delay="{{ (min($index, 5) + 1) * 100 }}ms">
                    <div class="ve-ci-icon"><i class="{{ $card->icon_class }}"></i></div>
                    <h5>{{ $card->title }}</h5>
                    <p>{{ $card->line_primary }}@if($card->line_secondary)<br><small>{{ $card->line_secondary }}</small>@endif</p>
                </div>
                @empty
                <div class="ve-contact-info-card" style="grid-column: 1 / -1; text-align: center;">
                    <p style="margin:0; color: var(--ve-text);">Add contact cards in the admin panel to show office, phone, and email here.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="ve-section ve-contact-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="ve-contact-form-wrap">
                        <span class="ve-section-tag">Send a Message</span>
                        <h2>Book a <span>Free Consultation</span></h2>
                        <p>Fill in the form and one of our experts will contact you to discuss your project scope.</p>
                        <form class="ve-contact-form" action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="ve-form-row">
                                <div class="ve-form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" placeholder="Your full name" required value="{{ old('name') }}">
                                </div>
                                <div class="ve-form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" placeholder="Your email" required value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="ve-form-row">
                                <div class="ve-form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" name="phone" placeholder="Your phone" value="{{ old('phone') }}">
                                </div>
                                <div class="ve-form-group">
                                    <label>Service Interested In</label>
                                    <select name="service">
                                        <option value="">Select an AI or software service</option>
                                        <option value="AI Agents & Chatbots" {{ old('service') == 'AI Agents & Chatbots' ? 'selected' : '' }}>AI Agents & Chatbots</option>
                                        <option value="LLM Integration & RAG" {{ old('service') == 'LLM Integration & RAG' ? 'selected' : '' }}>LLM Integration & RAG</option>
                                        <option value="AI-Native Web Platforms" {{ old('service') == 'AI-Native Web Platforms' ? 'selected' : '' }}>AI-Native Web Platforms</option>
                                        <option value="Custom AI Software & Automation" {{ old('service') == 'Custom AI Software & Automation' ? 'selected' : '' }}>Custom AI Software & Automation</option>
                                        <option value="AI-Powered UX & Personalization" {{ old('service') == 'AI-Powered UX & Personalization' ? 'selected' : '' }}>AI-Powered UX & Personalization</option>
                                        <option value="AI-Ready Website Modernization" {{ old('service') == 'AI-Ready Website Modernization' ? 'selected' : '' }}>AI-Ready Website Modernization</option>
                                        <option value="E-Commerce Setups" {{ old('service') == 'E-Commerce Setups' ? 'selected' : '' }}>E-Commerce Setups</option>
                                        <option value="Hosting & Infrastructure" {{ old('service') == 'Hosting & Infrastructure' ? 'selected' : '' }}>Hosting & Infrastructure</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ve-form-group">
                                <label>Your Message</label>
                                <textarea name="message" rows="5" placeholder="Tell us about your project requirements or digital goals..." required>{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="ve-btn-primary">Send Message <i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-5 wow fadeInRight" data-wow-delay="200ms">
                    <div class="ve-contact-aside">
                        <div class="ve-ca-box">
                            <h4>Why Clients Choose Us</h4>
                            <ul class="ve-ca-list">
                                <li><i class="fa fa-check-circle"></i> Free initial project discovery</li>
                                <li><i class="fa fa-check-circle"></i> Rapid response time</li>
                                <li><i class="fa fa-check-circle"></i> Expert full-stack developers</li>
                                <li><i class="fa fa-check-circle"></i> Technology-agnostic approach</li>
                                <li><i class="fa fa-check-circle"></i> Rock-solid architecture</li>
                            </ul>
                        </div>
                        <div class="ve-ca-hours">
                            <h5><i class="fa fa-clock-o"></i> Office Hours</h5>
                            <ul>
                                <li><span>Monday – Friday</span><strong>9:00 AM – 6:00 PM</strong></li>
                                <li><span>Saturday</span><strong>10:00 AM – 2:00 PM</strong></li>
                                <li><span>Sunday</span><strong>Closed</strong></li>
                            </ul>
                        </div>
                        @php
                            $hasFooterSocial = isset($socialLinks) && $socialLinks->filter(fn ($l) => filled($l->url))->isNotEmpty();
                        @endphp
                        @if($hasFooterSocial)
                        <div class="ve-ca-social">
                            <h5>Connect With Us</h5>
                            @include('partials.social-links')
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
