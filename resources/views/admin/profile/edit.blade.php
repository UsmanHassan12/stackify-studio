@extends('admin.layouts.app')

@section('page_title', 'My profile')

@section('admin_content')

<x-admin.page-intro
    title="My profile"
    lead="Update your account name, sign-in details, and password."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Profile', 'url' => null],
    ]"
/>

<form action="{{ route('admin.profile.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="adm-split-2">
        <div class="adm-card">
            <div class="adm-card-header"><h3><i class="fa fa-user" style="margin-right:8px;color:#d4a017;"></i> Account</h3></div>
            <div class="adm-card-body">
                <div class="adm-form-group">
                    <label class="adm-label">Display name <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="name" class="adm-input" required value="{{ old('name', $user->name) }}">
                    @error('name')
                        <p class="adm-hint" style="color:var(--danger);margin-top:6px;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Email <span style="color:#ef4444;">*</span></label>
                    <input type="email" name="email" class="adm-input" required value="{{ old('email', $user->email) }}" autocomplete="email">
                    @error('email')
                        <p class="adm-hint" style="color:var(--danger);margin-top:6px;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label">Username</label>
                    <input type="text" name="username" class="adm-input" value="{{ old('username', $user->username) }}" placeholder="Optional — sign in with email or username" autocomplete="username">
                    <p class="adm-hint">Leave blank if you only want to sign in with email.</p>
                    @error('username')
                        <p class="adm-hint" style="color:var(--danger);margin-top:6px;">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="adm-card">
            <div class="adm-card-header"><h3><i class="fa fa-key" style="margin-right:8px;color:#d4a017;"></i> Change password</h3></div>
            <div class="adm-card-body">
                <div class="adm-form-group">
                    <label class="adm-label">Current password</label>
                    <input type="password" name="current_password" class="adm-input" autocomplete="current-password" placeholder="Required only when setting a new password">
                    @error('current_password')
                        <p class="adm-hint" style="color:var(--danger);margin-top:6px;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">New password</label>
                    <input type="password" name="password" class="adm-input" autocomplete="new-password" placeholder="Leave blank to keep current password">
                    @error('password')
                        <p class="adm-hint" style="color:var(--danger);margin-top:6px;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label">Confirm new password</label>
                    <input type="password" name="password_confirmation" class="adm-input" autocomplete="new-password" placeholder="Repeat new password">
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top:28px;">
        <button type="submit" class="adm-btn adm-btn-primary" style="padding:12px 28px;">
            <i class="fa fa-floppy-disk"></i> Save changes
        </button>
    </div>
</form>

@endsection
