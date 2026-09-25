@extends('admin.layouts.app')

@section('page_title', 'Manage Blog Posts')

@section('admin_content')

<x-admin.page-intro
    title="Manage Blog Posts"
    lead="Draft, publish, and maintain articles shown on the public blog."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Blog posts', 'url' => null],
    ]"
/>

{{-- Stats Row --}}
<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon gold"><i class="fa fa-newspaper"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total'] }}</div>
            <div class="adm-stat-label">Total Posts</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon blue"><i class="fa fa-tags"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['categories'] }}</div>
            <div class="adm-stat-label">Categories</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon green"><i class="fa fa-calendar-check"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['published'] }}</div>
            <div class="adm-stat-label">Published</div>
        </div>
    </div>
</div>

{{-- Posts Table --}}
<form id="bulkForm" action="{{ route('admin.posts.bulk') }}" method="POST">
    @csrf
    <input type="hidden" name="action" id="bulkActionInput">

    <div id="bulkBar" class="adm-bulk-bar">
        <div>
            <span class="bulk-count"><span id="selectedCount">0</span> Selected</span>
            <button type="button" onclick="submitBulkAction('activate')" class="adm-btn adm-btn-sm adm-btn-outline" style="margin-right:8px;">
                <i class="fa fa-circle-check"></i> Activate
            </button>
            <button type="button" onclick="submitBulkAction('deactivate')" class="adm-btn adm-btn-sm adm-btn-outline" style="margin-right:8px;">
                <i class="fa fa-circle-xmark"></i> Deactivate
            </button>
        </div>
        <button type="button" onclick="submitBulkAction('delete')" class="adm-btn adm-btn-sm adm-btn-danger">
            <i class="fa fa-trash"></i> Delete Selected
        </button>
    </div>

    <div class="adm-card">
        <div class="adm-card-header">
            <h3><i class="fa fa-newspaper" style="margin-right:8px;color:#d4a017;"></i> All Blog Posts</h3>
            <a href="{{ route('admin.posts.create') }}" class="adm-btn adm-btn-gold">
                <i class="fa fa-plus"></i> Write New Post
            </a>
        </div>

        <div class="adm-table-scroll">
        <table class="adm-table">
            <thead>
                <tr>
                    <th class="adm-checkbox-col"><input type="checkbox" id="selectAll"></th>
                    <th>Date</th>
                    <th>Post Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td class="adm-checkbox-col"><input type="checkbox" name="ids[]" value="{{ $post->id }}" class="row-checkbox"></td>
                    <td style="color:#9ca3af; font-size:13px;">{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}</td>
                    <td class="adm-title-cell">{{ $post->title }}</td>
                    <td><span class="adm-badge">{{ $post->category }}</span></td>
                    <td>{{ $post->author }}</td>
                    <td>
                        @if($post->is_active)
                            <span class="adm-status-badge adm-status-active" title="Active">
                                <span class="adm-status-dot"></span>
                            </span>
                        @else
                            <span class="adm-status-badge adm-status-inactive" title="Inactive">
                                <span class="adm-status-dot"></span>
                            </span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('pages.blog.show', $post->slug) }}" target="_blank" class="adm-btn adm-btn-outline adm-btn-sm" title="View on Site">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <button type="button" onclick="confirmIndividualDelete('{{ route('admin.posts.destroy', $post->id) }}', 'Delete this blog post?')" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding:48px; color:#9ca3af;">
                        <i class="fa fa-newspaper" style="font-size:32px; display:block; margin-bottom:12px; opacity:0.3;"></i>
                        No blog posts yet. <a href="{{ route('admin.posts.create') }}" style="color:#d4a017;">Write your first post →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="adm-pagination">
            {{ $posts->links() }}
        </div>
    </div>
</form>

@endsection
