@extends('admin.layouts.app')

@section('page_title', 'Add FAQ')

@section('admin_content')

<x-admin.page-intro
    title="Add FAQ"
    lead="Shown in the FAQ section on the services page."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'FAQs', 'url' => route('admin.faqs.index')],
        ['label' => 'Add new', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.faqs.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.faqs.store') }}" method="POST">
    @csrf

    <div class="adm-split">
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>FAQ content</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Question <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="question" class="adm-input" required value="{{ old('question') }}" placeholder="What clients usually ask">
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Answer <span style="color:#ef4444;">*</span></label>
                        <textarea name="answer" class="adm-textarea" rows="8" required placeholder="Clear, helpful answer">{{ old('answer') }}</textarea>
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
                <i class="fa fa-save"></i> Save FAQ
            </button>
        </div>
    </div>
</form>

@endsection
