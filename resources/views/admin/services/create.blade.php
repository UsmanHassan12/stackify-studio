@extends('admin.layouts.app')

@section('page_title', 'Add Service')

@section('admin_content')

<x-admin.page-intro
    title="Add Service"
    lead="Appears on the home page (up to six) and the services page."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Services', 'url' => route('admin.services.index')],
        ['label' => 'Add new', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.services.store') }}" method="POST">
    @csrf

    <div class="adm-split">
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Service content</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Title <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="adm-input" required value="{{ old('title') }}" placeholder="e.g. Web Development">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Summary <span style="color:#ef4444;">*</span></label>
                        <textarea name="summary" class="adm-textarea" rows="4" required placeholder="Short description shown on cards">{{ old('summary') }}</textarea>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Detail page content <small>(optional)</small></label>
                        <textarea id="service_body_editor" name="body" class="adm-textarea" rows="14" placeholder="Longer copy for the public service detail page">{!! old('body') !!}</textarea>
                        <p class="adm-hint">Use the toolbar for headings, lists, and links. “Source code” is available if you need raw HTML. If this is empty, the detail page still shows the summary and a contact prompt.</p>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Icon CSS classes <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="icon_class" class="adm-input" required value="{{ old('icon_class', 'fa fa-code') }}" placeholder="e.g. fa fa-code">
                        <p class="adm-hint">Font Awesome 4 classes for the <code>&lt;i&gt;</code> element (no brackets).</p>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Learn more URL <small>(optional override)</small></label>
                        <input type="text" name="link_url" class="adm-input" value="{{ old('link_url') }}" placeholder="https://… to send “Learn more” elsewhere; leave empty for the service detail page">
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
                        <p class="adm-hint">Lower numbers appear first.</p>
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
                <i class="fa fa-save"></i> Save Service
            </button>
        </div>
    </div>
</form>

@include('admin.partials.tinymce-editors', ['editors' => [['id' => 'service_body_editor', 'height' => 380]]])
@endsection
