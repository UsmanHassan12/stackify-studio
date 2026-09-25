@extends('admin.layouts.app')

@section('page_title', 'Edit Project')

@section('admin_content')

<x-admin.page-intro
    title="Edit Project"
    :lead-html="'Update the details for <strong>' . e($project->title) . '</strong>.'"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Projects', 'url' => route('admin.projects.index')],
        ['label' => 'Edit', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.projects.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back to Projects
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="adm-split">

        {{-- Main Fields --}}
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Project Details</h3></div>
                <div class="adm-card-body">

                    <div class="adm-form-row">
                        <div class="adm-form-group">
                            <label class="adm-label">Project Title <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="title" class="adm-input" required value="{{ old('title', $project->title) }}">
                        </div>
                        <div class="adm-form-group">
                            <label class="adm-label">Category <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="category" class="adm-input" required value="{{ old('category', $project->category) }}">
                        </div>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Short Description </label>
                        <textarea name="short_description" class="adm-textarea" rows="3" required>{{ old('short_description', $project->short_description) }}</textarea>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Full Case Study </label>
                        <textarea id="project_full_description_editor" name="full_description" class="adm-textarea" rows="12">{!! old('full_description', $project->full_description) !!}</textarea>
                    </div>

                </div>
            </div>
        </div>

        {{-- Sidebar Fields --}}
        <div class="adm-split-side">
            <div class="adm-card">
                <div class="adm-card-header"><h3>Project Media</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Featured Image</label>
                        <div class="adm-file-input-wrapper">
                            <input type="file" name="image" id="project_image" accept="image/*">
                            <div class="adm-file-btn">
                                <i class="fa fa-cloud-arrow-up"></i>
                                <span>Change Image...</span>
                            </div>
                        </div>
                        <div class="adm-img-preview" id="image_preview">
                            @if($project->image_path)
                                <img src="{{ asset($project->image_path) }}" alt="Current Image">
                            @else
                                <span>No image selected</span>
                            @endif
                        </div>
                        <p class="adm-hint">Upload new to replace. Max 2MB.</p>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            setupImagePreview('project_image', 'image_preview');
                        });
                    </script>
                </div>
            </div>

            <div class="adm-card">
                <div class="adm-card-header"><h3>Client Info</h3></div>
                <div class="adm-card-body">
                    <div class="adm-form-group">
                        <label class="adm-label">Client Name</label>
                        <input type="text" name="client_name" class="adm-input" value="{{ old('client_name', $project->client_name) }}">
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Live Project URL <small>(optional)</small></label>
                        <input type="url" name="live_url" class="adm-input" placeholder="https://example.com" value="{{ old('live_url', $project->live_url) }}">
                    </div>
                </div>
            </div>

            <div class="adm-card">
                <div class="adm-card-header"><h3>Visibility</h3></div>
                <div class="adm-card-body">
                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <label class="adm-label" style="margin-bottom:0;">Active Status <small>(visible on site)</small></label>
                        <label class="adm-switch">
                            <input type="checkbox" name="is_active" value="1" {{ $project->is_active ? 'checked' : '' }}>
                            <span class="adm-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <button type="submit" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; padding:14px;">
                <i class="fa fa-floppy-disk"></i> Update Project
            </button>

            <a href="{{ route('pages.projects.show', $project) }}" target="_blank" class="adm-btn adm-btn-outline" style="width:100%; justify-content:center;">
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
            <p>Permanently delete this project. This action cannot be undone.</p>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" data-confirm="This will permanently remove the project and its images. Proceed?">
                @csrf
                @method('DELETE')
                <button type="submit" class="adm-btn adm-btn-danger" style="width:100%; justify-content:center;">
                    <i class="fa fa-trash"></i> Delete Project
                </button>
            </form>
        </div>
    </div>
</div>

@include('admin.partials.tinymce-editors', ['editors' => [['id' => 'project_full_description_editor', 'height' => 420]]])
@endsection
