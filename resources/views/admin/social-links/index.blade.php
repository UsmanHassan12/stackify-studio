@extends('admin.layouts.app')

@section('page_title', 'Social Links')

@section('admin_content')

<x-admin.page-intro
    title="Social Links"
    lead="Footer and header social icons linking out to your profiles."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Social links', 'url' => null],
    ]"
/>

<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon gold"><i class="fa fa-share-nodes"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total'] }}</div>
            <div class="adm-stat-label">Total links</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon green"><i class="fa fa-circle-check"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['active'] }}</div>
            <div class="adm-stat-label">Active</div>
        </div>
    </div>
</div>

<form id="bulkForm" action="{{ route('admin.social-links.bulk') }}" method="POST">
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
            <h3><i class="fa fa-share-nodes" style="margin-right:8px;color:#d4a017;"></i> Footer &amp; contact social icons</h3>
            <a href="{{ route('admin.social-links.create') }}" class="adm-btn adm-btn-gold">
                <i class="fa fa-plus"></i> Add link
            </a>
        </div>

        <div class="adm-table-scroll">
        <table class="adm-table">
            <thead>
                <tr>
                    <th class="adm-checkbox-col"><input type="checkbox" id="selectAll"></th>
                    <th>Order</th>
                    <th>Label</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($socialLinks as $link)
                <tr>
                    <td class="adm-checkbox-col"><input type="checkbox" name="ids[]" value="{{ $link->id }}" class="row-checkbox"></td>
                    <td style="color:#9ca3af; font-size:13px;">{{ $link->sort_order }}</td>
                    <td class="adm-title-cell">{{ $link->label }} <code style="font-size:11px;">{{ $link->icon_class }}</code></td>
                    <td style="font-size:12px; color:#64748b; max-width:220px; word-break:break-all;">{{ \Illuminate\Support\Str::limit($link->url ?? '—', 40) }}</td>
                    <td>
                        @if($link->is_active)
                            <span class="adm-status-badge adm-status-active" title="Active"><span class="adm-status-dot"></span></span>
                        @else
                            <span class="adm-status-badge adm-status-inactive" title="Inactive"><span class="adm-status-dot"></span></span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('admin.social-links.edit', $link) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <button type="button" onclick="confirmIndividualDelete('{{ route('admin.social-links.destroy', $link) }}', 'Delete this link?')" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:48px; color:#9ca3af;">
                        No social links. <a href="{{ route('admin.social-links.create') }}" style="color:#d4a017;">Add one →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="adm-pagination">
            {{ $socialLinks->links() }}
        </div>
    </div>
</form>

@endsection
