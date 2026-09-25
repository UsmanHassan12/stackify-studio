@extends('layouts.app')

@section('title', 'Unsubscribe — Stackify Studio')
@section('description', 'Opt-out of the Stackify Studio newsletter and updates.')
@section('canonical', route('newsletter.unsubscribe.view'))

@section('content')
<section class="ve-page-hero" style="padding: 120px 0 60px;">
    <div class="container ve-page-hero-content">
        <span class="ve-section-tag">Newsletter</span>
        <h1>Unsubscribe From <span>Mailing List</span></h1>
    </div>
</section>

<section class="ve-section" style="padding: 100px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5">
                <div class="ve-contact-form-wrap" style="text-align:center;">
                    <h2>We're Sorry to <span>See You Go</span></h2>
                    <p style="margin-bottom:30px;">Enter your email address below to be removed from our weekly engineering insights and agency updates.</p>

                    <form class="ve-contact-form" action="{{ route('newsletter.unsubscribe') }}" method="POST">
                        @csrf
                        <div class="ve-form-group" style="text-align:left;">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="e.g. yourname@example.com" required value="{{ old('email') }}">
                        </div>
                        <button type="submit" class="ve-btn-primary" style="width:100%; justify-content:center; padding:15px;">
                            Remove My Subscription <i class="fa fa-user-minus"></i>
                        </button>
                    </form>
                    
                    <p style="margin-top:20px; font-size:13px; color:#9ca3af;">Changed your mind? <a href="{{ route('pages.home') }}" style="color:var(--gold);">Stay on the list →</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
