@extends('admin.layouts.app')

@section('page_title', 'Edit Post')

@section('admin_content')

<x-admin.page-intro
    title="Edit Post"
    :lead-html="'Updating: <strong>' . e($post->title) . '</strong>.'"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Blog posts', 'url' => route('admin.posts.index')],
        ['label' => 'Edit', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.posts.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back to Blog
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="adm-split">

        {{-- Main Fields --}}
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Post Content</h3></div>
                <div class="adm-card-body">

                    <div class="adm-form-group">
                        <label class="adm-label">Post Title <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="title" class="adm-input" required value="{{ old('title', $post->title) }}">
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Short Summary</label>
                        <textarea name="summary" class="adm-textarea" rows="3" required>{{ old('summary', $post->summary) }}</textarea>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Full Content</label>
                        <textarea id="post_content_editor" name="content" class="adm-textarea" rows="18" required>{!! old('content', $post->content) !!}</textarea>
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
                        <input type="text" name="category" class="adm-input" required value="{{ old('category', $post->category) }}">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Author <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="author" class="adm-input" required value="{{ old('author', $post->author) }}">
                    </div>
                    <div class="adm-form-group">
                        <label class="adm-label">Read Time</label>
                        <input type="text" name="read_time" class="adm-input" value="{{ old('read_time', $post->read_time) }}">
                    </div>
                </div>
            </div>

            <div class="adm-card">
                <div class="adm-card-header"><h3>Post Media</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Featured Image</label>
                        <div class="adm-file-input-wrapper">
                            <input type="file" name="image" id="post_image" accept="image/*">
                            <div class="adm-file-btn">
                                <i class="fa fa-cloud-arrow-up"></i>
                                <span>Change Image...</span>
                            </div>
                        </div>
                        <div class="adm-img-preview" id="image_preview">
                            @if($post->image_path)
                                <img src="{{ asset($post->image_path) }}" alt="Current Image">
                            @else
                                <span>No image selected</span>
                            @endif
                        </div>
                        <p class="adm-hint">Upload new to replace. Max 2MB.</p>
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
                            <input type="checkbox" name="is_active" value="1" {{ $post->is_active ? 'checked' : '' }}>
                            <span class="adm-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:14px;">
                <i class="fa fa-floppy-disk"></i> Update Post
            </button>

            <a href="{{ route('pages.blog.show', $post->slug) }}" target="_blank" class="adm-btn adm-btn-outline" style="width:100%; justify-content:center;">
                <i class="fa fa-eye"></i> Preview on Website
            </a>

        </div>

    </div>
</form>

{{-- Danger Zone moved outside main form --}}
<div class="adm-danger-outer">
    <div class="adm-danger-inner">
        <div class="adm-danger-zone" style="margin-top:0;">
            <h4><i class="fa fa-triangle-exclamation"></i> Danger Zone</h4>
            <p>Delete this post permanently.</p>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" data-confirm="This will permanently delete the post. Continue?">
                @csrf
                @method('DELETE')
                <button type="submit" class="adm-btn adm-btn-danger" style="width:100%; justify-content:center;">
                    <i class="fa fa-trash"></i> Delete Post
                </button>
            </form>
        </div>
    </div>
</div>

@include('admin.partials.tinymce-editors', ['editors' => [['id' => 'post_content_editor', 'height' => 460]]])
@endsection
