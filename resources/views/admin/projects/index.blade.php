@extends('admin.layouts.app')

@section('page_title', 'Manage Projects')

@section('admin_content')

<x-admin.page-intro
    title="Manage Projects"
    lead="Create, edit, and organize portfolio entries shown on the public site."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Projects', 'url' => null],
    ]"
/>

{{-- Stats Row --}}
<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon gold"><i class="fa fa-layer-group"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total'] }}</div>
            <div class="adm-stat-label">Total Projects</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon blue"><i class="fa fa-globe"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['with_live'] }}</div>
            <div class="adm-stat-label">With Live URL</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon green"><i class="fa fa-users"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['named'] }}</div>
            <div class="adm-stat-label">Named Clients</div>
        </div>
    </div>
</div>

{{-- Projects Table --}}
<form id="bulkForm" action="{{ route('admin.projects.bulk') }}" method="POST">
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
            <h3><i class="fa fa-layer-group" style="margin-right:8px;color:#d4a017;"></i> All Projects</h3>
            <a href="{{ route('admin.projects.create') }}" class="adm-btn adm-btn-gold">
                <i class="fa fa-plus"></i> Add New Project
            </a>
        </div>

        <div class="adm-table-scroll">
        <table class="adm-table">
            <thead>
                <tr>
                    <th class="adm-checkbox-col"><input type="checkbox" id="selectAll"></th>
                    <th>#</th>
                    <th>Project</th>
                    <th>Category</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td class="adm-checkbox-col"><input type="checkbox" name="ids[]" value="{{ $project->id }}" class="row-checkbox"></td>
                    <td style="color:#9ca3af; font-size:13px;">{{ $project->id }}</td>
                    <td class="adm-title-cell">{{ $project->title }}</td>
                    <td><span class="adm-badge">{{ $project->category }}</span></td>
                    <td>{{ $project->client_name ?? '—' }}</td>
                    <td>
                        @if($project->is_active)
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
                            <a href="{{ route('pages.projects.show', $project) }}" target="_blank" class="adm-btn adm-btn-outline adm-btn-sm" title="View on Site">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <button type="button" onclick="confirmIndividualDelete('{{ route('admin.projects.destroy', $project) }}', 'Are you sure you want to permanently delete this project?')" class="adm-btn adm-btn-outline adm-btn-sm" style="color:#dc2626;" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding:48px; color:#9ca3af;">
                        <i class="fa fa-layer-group" style="font-size:32px; display:block; margin-bottom:12px; opacity:0.3;"></i>
                        No projects yet. <a href="{{ route('admin.projects.create') }}" style="color:#d4a017;">Add your first one →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>

        <div class="adm-pagination">
            {{ $projects->links() }}
        </div>
    </div>
</form>

@endsection
