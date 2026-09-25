@extends('layouts.app')

@section('title', 'Privacy Policy — Stackify Studio')
@section('description', 'Read Stackify Studio\'s privacy policy. We are committed to protecting your personal information and ensuring enterprise data privacy and AI safety.')
@section('canonical', route('pages.privacy'))

@section('content')
<section class="ve-page-hero ve-page-hero-sm">
    <div class="container ve-page-hero-content">
        <span class="ve-insight-cat" style="margin-bottom:16px;">Legal</span>
        <h1>Privacy <span>Policy</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li class="active">Privacy Policy</li>
            </ol>
        </nav>
    </div>
</section>

<section class="ve-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <article class="ve-article" style="box-shadow:none; border: 1px solid var(--ve-border);">
                    <div class="ve-article-body">
                        <h3>1. Introduction</h3>
                        <p>Welcome to Stackify Studio. We are committed to protecting your privacy and ensuring that your personal information is handled in a safe and responsible manner. This Privacy Policy explains how we collect, use, and disclose your personal information when you use our website or services.</p>
                        
                        <h3>2. Information We Collect</h3>
                        <p>When you contact us, request a quote, or subscribe to our newsletter, we may collect personal information such as your name, email address, phone number, and details regarding your project requirements. We only collect information that is voluntarily provided by you.</p>

                        <h3>3. How We Use Your Information</h3>
                        <p>We use the information we collect to:</p>
                        <ul style="list-style:disc; padding-left: 20px; color: var(--ve-text); font-size: 15px; margin-bottom: 20px; line-height: 1.8;">
                            <li>Provide and communicate with you about our web development and software engineering services.</li>
                            <li>Respond to your inquiries and offer customer support.</li>
                            <li>Send you updates, marketing materials, and newsletters (if you have opted in).</li>
                            <li>Improve our website performance and user experience.</li>
                        </ul>

                        <h3>4. Data Security</h3>
                        <p>We implement appropriate technical and organizational security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction. We utilize encrypted protocols for secure data transmission.</p>

                        <h3>5. Third-Party Services</h3>
                        <p>We do not sell, trade, or otherwise transfer your personally identifiable information to outside parties. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential.</p>

                        <h3>6. Your Rights</h3>
                        <p>You have the right to request access to the personal data we hold about you, request corrections, or request deletion of your data at any time. To exercise these rights, please contact us at <strong>info@stackifystudio.com</strong>.</p>
                        
                        <p><em>Last Updated: {{ date('F Y') }}</em></p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
