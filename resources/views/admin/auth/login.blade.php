@extends('admin.auth.layout')

@section('auth_title', 'Admin sign in')

@section('auth_content')
    <div class="adm-auth-card">
        <div class="adm-auth-brand">
            <div class="adm-auth-logo-wrap">@include('partials.site-logo-mark')</div>
            <div>
                <div class="ve-logo-text adm-auth-site-name">@include('partials.logo-site-name')</div>
                <div class="adm-auth-brand-sub">Admin</div>
            </div>
        </div>

        <h1 class="adm-auth-heading">Sign in</h1>
        <p class="adm-auth-lead">Use your email or username and password.</p>

        <form method="POST" action="{{ route('admin.login.store') }}" class="adm-auth-form">
            @csrf
            <div class="adm-auth-field">
                <label for="login">Email or username</label>
                <input type="text" name="login" id="login" value="{{ old('login') }}" required autocomplete="username" autofocus>
                @error('login')
                    <span class="adm-auth-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="adm-auth-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required autocomplete="current-password">
                @error('password')
                    <span class="adm-auth-error">{{ $message }}</span>
                @enderror
            </div>
            <label class="adm-auth-remember">
                <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                <span>Remember me</span>
            </label>
            <button type="submit" class="adm-auth-submit">Sign in</button>
        </form>
    </div>
@endsection
