@extends('layouts.app')

@section('title', 'Terms of Use — Stackify Studio')
@section('description', 'Read Stackify Studio\'s terms of use and client agreement for AI engineering and software development services.')
@section('canonical', route('pages.terms'))

@section('content')
<section class="ve-page-hero ve-page-hero-sm">
    <div class="container ve-page-hero-content">
        <span class="ve-insight-cat" style="margin-bottom:16px;">Legal</span>
        <h1>Terms of <span>Use</span></h1>
        <nav aria-label="breadcrumb">
            <ol class="ve-breadcrumb">
                <li><a href="{{ route('pages.home') }}">Home</a></li>
                <li class="active">Terms of Use</li>
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
                        <h3>1. Acceptance of Terms</h3>
                        <p>By accessing and using the Stackify Studio website and our web development services, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by these terms, please do not use this service.</p>
                        
                        <h3>2. Intellectual Property Rights</h3>
                        <p>All content published and made available on our site, including but not limited to text, graphics, logos, images, code, and software, is the property of Stackify Studio and the site's creators. For client projects, intellectual property rights and code ownership are fully transferred to the client upon full payment of the invoice, unless otherwise stipulated in a separate contract.</p>

                        <h3>3. User Conduct</h3>
                        <p>You agree to use our website only for lawful purposes. You are prohibited from using our site to transmit or post any material that is offensive, defamatory, or in breach of confidence or privacy. You must not attempt to gain unauthorized access to our servers, databases, or any systems connected to Stackify Studio.</p>

                        <h3>4. Limitation of Liability</h3>
                        <p>Stackify Studio and its affiliates will not be liable for any direct, indirect, incidental, or consequential damages resulting from the use or inability to use our services, or for the cost of procurement of substitute services. The technical advice provided on our Insights blog is for informational purposes only and we do not guarantee specific outcomes.</p>

                        <h3>5. Third-Party Links</h3>
                        <p>Our website may contain links to third-party web sites or services that are not owned or controlled by Stackify Studio. We have no control over, and assume no responsibility for, the content, privacy policies, or practices of any third party web sites or services.</p>

                        <h3>6. Modifications to Terms</h3>
                        <p>We reserve the right to modify these terms from time to time at our sole discretion. Your continued use of the website following any changes indicates your acceptance of the new Terms of Use.</p>
                        
                        <p><em>Last Updated: {{ date('F Y') }}</em></p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
@endsection
