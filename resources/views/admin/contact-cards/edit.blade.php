@extends('admin.layouts.app')

@section('page_title', 'Edit Contact Card')

@section('admin_content')

<x-admin.page-intro
    title="Edit contact card"
    :lead="$card->title"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Contact cards', 'url' => route('admin.contact-cards.index')],
        ['label' => 'Edit', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.contact-cards.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.contact-cards.update', $card) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="adm-split">
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Card content</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Title <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="adm-input" required value="{{ old('title', $card->title) }}">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Primary line <span style="color:#ef4444;">*</span></label>
                        <textarea name="line_primary" class="adm-textarea" rows="2" required>{{ old('line_primary', $card->line_primary) }}</textarea>
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Secondary line <small>(optional)</small></label>
                        <textarea name="line_secondary" class="adm-textarea" rows="2">{{ old('line_secondary', $card->line_secondary) }}</textarea>
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Icon CSS classes <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="icon_class" class="adm-input" required value="{{ old('icon_class', $card->icon_class) }}">
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
                        <input type="number" name="sort_order" class="adm-input" min="0" value="{{ old('sort_order', $card->sort_order) }}">
                    </div>
                </div>
            </div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Visibility</h3></div>
                <div class="adm-card-body">
                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label class="adm-label" style="margin-bottom:0;">Active</label>
                        <label class="adm-switch">
                            <input type="checkbox" name="is_active" value="1" {{ $card->is_active ? 'checked' : '' }}>
                            <span class="adm-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:14px;">
                <i class="fa fa-save"></i> Update card
            </button>
            <a href="{{ route('pages.contact') }}" target="_blank" class="adm-btn adm-btn-outline" style="width:100%; justify-content:center;">
                <i class="fa fa-eye"></i> View contact page
            </a>
        </div>
    </div>
</form>

@endsection
