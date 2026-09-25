@extends('admin.layouts.app')

@section('page_title', 'Add New Project')

@section('admin_content')

<x-admin.page-intro
    title="Add New Project"
    lead="Fill in the details below to add a new project to your portfolio."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Projects', 'url' => route('admin.projects.index')],
        ['label' => 'Add new', 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.projects.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back to Projects
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="adm-split">

        {{-- Main Fields --}}
        <div>
            <div class="adm-card">
                <div class="adm-card-header"><h3>Project Details</h3></div>
                <div class="adm-card-body">

                    <div class="adm-form-row">
                        <div class="adm-form-group">
                            <label class="adm-label">Project Title <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="title" class="adm-input" required placeholder="e.g. Nexus E-Commerce Platform" value="{{ old('title') }}">
                        </div>
                        <div class="adm-form-group">
                            <label class="adm-label">Category <span style="color:#ef4444;">*</span></label>
                            <input type="text" name="category" class="adm-input" required placeholder="e.g. E-Commerce Platform" value="{{ old('category') }}">
                        </div>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Short Description </label>
                        <textarea name="short_description" class="adm-textarea" rows="3" required placeholder="A concise one-line summary of the project...">{{ old('short_description') }}</textarea>
                    </div>

                    <div class="adm-form-group">
                        <label class="adm-label">Full Case Study</label>
                        <textarea id="project_full_description_editor" name="full_description" class="adm-textarea" rows="12" placeholder="Write the full project story, milestones, and outcomes...">{!! old('full_description') !!}</textarea>
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
                        <label class="adm-label">Featured Image <span style="color:#ef4444;">*</span></label>
                        <div class="adm-file-input-wrapper">
                            <input type="file" name="image" id="project_image" accept="image/*" required>
                            <div class="adm-file-btn">
                                <i class="fa fa-cloud-arrow-up"></i>
                                <span>Choose Image...</span>
                            </div>
                        </div>
                        <div class="adm-img-preview" id="image_preview">
                            <span>No image selected</span>
                        </div>
                        <p class="adm-hint">Recommended size: 1200x800px. Max 2MB.</p>
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
                        <input type="text" name="client_name" class="adm-input" placeholder="e.g. Acme Corp" value="{{ old('client_name') }}">
                    </div>
                    <div class="adm-form-group" style="margin-bottom:0;">
                        <label class="adm-label">Live Project URL <small>(optional)</small></label>
                        <input type="url" name="live_url" class="adm-input" placeholder="https://example.com" value="{{ old('live_url') }}">
                    </div>
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
                <i class="fa fa-floppy-disk"></i> Save Project
            </button>
        </div>

    </div>
</form>

@include('admin.partials.tinymce-editors', ['editors' => [['id' => 'project_full_description_editor', 'height' => 420]]])
@endsection
