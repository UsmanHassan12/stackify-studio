@extends('admin.layouts.app')

@section('page_title', 'Add Social Link')

@section('admin_content')

<x-admin.page-intro
    title="Add social link"
    lead="Shown in the site footer and on the contact page “Connect with us” block."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Social links', 'url' => route('admin.social-links.index')],
        ['label' => 'Add new', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.social-links.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.social-links.store') }}" method="POST">
    @csrf

    <div class="adm-split">
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Link details</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Label <span style="color:#ef4444;">*</span> <small>(accessibility &amp; admin)</small></label>
                        <input type="text" name="label" class="adm-input" required value="{{ old('label') }}" placeholder="e.g. LinkedIn">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">URL</label>
                        <input type="text" name="url" class="adm-input" value="{{ old('url') }}" placeholder="https://… or mailto:… Leave empty to hide this icon on the site.">
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Icon CSS classes <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="icon_class" class="adm-input" required value="{{ old('icon_class', 'fa fa-linkedin') }}" placeholder="e.g. fa fa-linkedin">
                        <p class="adm-hint">Font Awesome 4 classes (e.g. <code>fa fa-facebook</code>, <code>fa fa-github</code>).</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="adm-split-side">
            <div class="adm-card">
                <div class="adm-card-header"><h3>Ordering</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Sort order</label>
                        <input type="number" name="sort_order" class="adm-input" min="0" value="{{ old('sort_order', 0) }}">
                    </div>
                </div>
            </div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Visibility</h3></div>
                <div class="adm-card-body">
                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label class="adm-label" style="margin-bottom:0;">Active</label>
                        <label class="adm-switch">
                            <input type="checkbox" name="is_active" value="1" checked>
                            <span class="adm-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:14px;">
                <i class="fa fa-save"></i> Save link
            </button>
        </div>
    </div>
</form>

@endsection
