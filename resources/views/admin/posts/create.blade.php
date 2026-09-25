@extends('admin.layouts.app')

@section('page_title', 'Write New Post')

@section('admin_content')

<x-admin.page-intro
    title="Write New Post"
    lead="Share your technical insights and updates with the world."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Blog posts', 'url' => route('admin.posts.index')],
        ['label' => 'Add new', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.posts.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back to Blog
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="adm-split">

        {{-- Main Fields --}}
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Post Content</h3></div>
                <div class="adm-card-body">

                    <div class="adm-form-group">
                        <label class="adm-label">Post Title <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="adm-input" required placeholder="e.g. 5 Strategies for Faster Page Loads" value="{{ old('title') }}">
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Short Summary </label>
                        <textarea name="summary" class="adm-textarea" rows="3" required placeholder="A brief hook to get readers interested...">{{ old('summary') }}</textarea>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Full Content</label>
                        <textarea id="post_content_editor" name="content" class="adm-textarea" rows="18" required placeholder="Write your full article here...">{!! old('content') !!}</textarea>
                    </div>

                </div>
            </div>
        </div>

        {{-- Sidebar Fields --}}
        <div class="adm-split-side">
            <div class="adm-card">
                <div class="adm-card-header"><h3>Publishing Info</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Category <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="category" class="adm-input" required placeholder="e.g. Frontend" value="{{ old('category') }}">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Author <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="author" class="adm-input" required value="{{ old('author', 'Engineering Team') }}">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Read Time</label>
                        <input type="text" name="read_time" class="adm-input" placeholder="e.g. 5 min read" value="{{ old('read_time') }}">
                    </div>
                </div>
            </div>

            <div class="adm-card">
                <div class="adm-card-header"><h3>Post Media</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Featured Image <span style="color:#ef4444;">*</span></label>
                        <div class="adm-file-input-wrapper">
                            <input type="file" name="image" id="post_image" accept="image/*" required>
                            <div class="adm-file-btn">
                                <i class="fa fa-cloud-arrow-up"></i>
                                <span>Choose Image...</span>
                            </div>
                        </div>
                        <div class="adm-img-preview" id="image_preview">
                            <span>No image selected</span>
                        </div>
                        <p class="adm-hint">Max 2MB. Replaces manual path.</p>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            setupImagePreview('post_image', 'image_preview');
                        });
                    </script>
                </div>
            </div>

            <div class="adm-card">
                <div class="adm-card-header"><h3>Visibility</h3></div>
                <div class="adm-card-body">
                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label class="adm-label" style="margin-bottom:0;">Active Status <small>(visible on site)</small></label>
                        <label class="adm-switch">
                            <input type="checkbox" name="is_active" value="1" checked>
                            <span class="adm-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:14px;">
                <i class="fa fa-paper-plane"></i> Publish Post
            </button>
        </div>

    </div>
</form>

@include('admin.partials.tinymce-editors', ['editors' => [['id' => 'post_content_editor', 'height' => 460]]])
@endsection
