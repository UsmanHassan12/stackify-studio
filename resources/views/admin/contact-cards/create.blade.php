@extends('admin.layouts.app')

@section('page_title', 'Add Contact Card')

@section('admin_content')

<x-admin.page-intro
    title="Add contact card"
    lead="Shown in the top row on the public contact page."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Contact cards', 'url' => route('admin.contact-cards.index')],
        ['label' => 'Add new', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.contact-cards.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.contact-cards.store') }}" method="POST">
    @csrf

    <div class="adm-split">
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Card content</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Title <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="adm-input" required value="{{ old('title') }}" placeholder="e.g. Visit Our Office">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Primary line <span style="color:#ef4444;">*</span></label>
                        <textarea name="line_primary" class="adm-textarea" rows="2" required placeholder="Address, phone number, or email">{{ old('line_primary') }}</textarea>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Secondary line <small>(optional, smaller text)</small></label>
                        <textarea name="line_secondary" class="adm-textarea" rows="2" placeholder="e.g. office hours or reply time">{{ old('line_secondary') }}</textarea>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Icon CSS classes <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="icon_class" class="adm-input" required value="{{ old('icon_class', 'fa fa-map-marker') }}" placeholder="e.g. fa fa-phone">
                        <p class="adm-hint">Font Awesome 4 classes for the icon in the dark square.</p>
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
                <i class="fa fa-save"></i> Save card
            </button>
        </div>
    </div>
</form>

@endsection
