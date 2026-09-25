@extends('layouts.app')

@section('title', 'Cookie Policy — Stackify Studio')
@section('description', 'Learn how Stackify Studio uses cookies and essential analytics technologies on our website.')
@section('canonical', route('pages.cookies'))

@section('content')
<section class="ve-page-hero ve-page-hero-sm">
    <div class="container ve-page-hero-content">
        <span class="ve-insight-cat" style="margin-bottom:16px;">Legal</span>
        <h1>Cookie <span>Policy</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li class="active">Cookie Policy</li>
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
                        <h3>1. What Are Cookies?</h3>
                        <p>Cookies are small text files that are stored on your computer or mobile device when you visit a website. They are widely used to make websites work more efficiently and to provide information to the owners of the site. They allow a website to recognize your device and store some information about your preferences or past actions.</p>
                        
                        <h3>2. How We Use Cookies</h3>
                        <p>Stackify Studio uses cookies for the following purposes:</p>
                        <ul style="list-style:disc; padding-left: 20px; color: var(--ve-text); font-size: 15px; margin-bottom: 20px; line-height: 1.8;">
                            <li><strong>Essential Cookies:</strong> These are strictly necessary for the operation of our website. They enable you to navigate the site and use its features efficiently.</li>
                            <li><strong>Performance & Analytics Cookies:</strong> These cookies collect information about how visitors use our website, such as which pages are visited most often, helping us improve the way our website works.</li>
                            <li><strong>Functional Cookies:</strong> These allow our website to remember choices you make (such as your language or the region you are in) to provide enhanced, personalized features.</li>
                        </ul>

                        <h3>3. Managing Your Cookies</h3>
                        <p>Most web browsers allow you to manage your cookie preferences. You can set your browser to refuse cookies, or to delete certain cookies. Please note that if you choose to block or delete cookies, some features of our website may not function properly. To learn more about how to manage cookies, visit the help pages of your browser.</p>

                        <h3>4. Third-Party Cookies</h3>
                        <p>In addition to our own cookies, we may also use various third-parties cookies to report usage statistics of the service, deliver advertisements on and through the site, and so on. These third parties have their own privacy policies.</p>

                        <h3>5. Contact Us</h3>
                        <p>If you have any questions about our use of cookies, please contact us at <strong>info@stackifystudio.com</strong>.</p>
                        
                        <p><em>Last Updated: {{ date('F Y') }}</em></p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
