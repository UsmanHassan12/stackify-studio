@extends('admin.layouts.app')

@section('page_title', 'Contact Leads')

@section('admin_content')

<x-admin.page-intro
    title="Contact Leads"
    lead="Inbox for messages sent from the site contact form. Mark as read or bulk-manage records."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Contact leads', 'url' => null],
    ]"
/>

{{-- Stats Row --}}
<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon gold"><i class="fa fa-inbox"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total'] }}</div>
            <div class="adm-stat-label">Total Leads</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon blue"><i class="fa fa-envelope-open"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['unread'] }}</div>
            <div class="adm-stat-label">Unread Messages</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon green"><i class="fa fa-calendar-alt"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['today'] }}</div>
            <div class="adm-stat-label">Received Today</div>
        </div>
    </div>
</div>

{{-- Leads Table --}}
<form id="bulkForm" action="{{ route('admin.leads.bulk') }}" method="POST">
    @csrf
    <input type="hidden" name="action" id="bulkActionInput">

    <div id="bulkBar" class="adm-bulk-bar">
        <div>
            <span class="bulk-count"><span id="selectedCount">0</span> Selected</span>
            <button type="button" onclick="submitBulkAction('mark_as_read')" class="adm-btn adm-btn-sm adm-btn-outline" style="margin-right:8px;">
                <i class="fa fa-envelope-open"></i> Mark as Read
            </button>
            <button type="button" onclick="submitBulkAction('mark_as_unread')" class="adm-btn adm-btn-sm adm-btn-outline" style="margin-right:8px;">
                <i class="fa fa-envelope"></i> Mark as Unread
            </button>
        </div>
        <button type="button" onclick="submitBulkAction('delete')" class="adm-btn adm-btn-sm adm-btn-danger">
            <i class="fa fa-trash"></i> Delete Selected
        </button>
    </div>

    <div class="adm-card">
        <div class="adm-card-header">
            <h3><i class="fa fa-inbox" style="margin-right:8px;color:#d4a017;"></i> Incoming Leads</h3>
        </div>

        <div class="adm-table-scroll">
        <table class="adm-table">
            <thead>
                <tr>
                    <th class="adm-checkbox-col"><input type="checkbox" id="selectAll"></th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                <tr style="{{ !$lead->is_read ? 'background: #fffbeb;' : '' }}">
                    <td class="adm-checkbox-col"><input type="checkbox" name="ids[]" value="{{ $lead->id }}" class="row-checkbox"></td>
                    <td style="color:#9ca3af; font-size:13px;">{{ $lead->created_at->format('M d, Y H:i') }}</td>
                    <td class="adm-title-cell">
                        {{ $lead->name }}
                        <div style="font-size:12px; font-weight:400; color:#9ca3af;">{{ $lead->email }}</div>
                    </td>
                    <td><span class="adm-badge">{{ $lead->service ?? 'N/A' }}</span></td>
                    <td>
                        @if(!$lead->is_read)
                            <span class="adm-status-badge adm-status-active" style="background:#fff7ed; color:#ea580c; border-color:#ffedd5;">
                                <span class="adm-status-dot"></span> New
                            </span>
                        @else
                            <span class="adm-status-badge adm-status-inactive">
                                 Read
                            </span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="View Details">
                                <i class="fa fa-eye"></i>
                            </a>
                            <button type="button" onclick="confirmIndividualDelete('{{ route('admin.leads.destroy', $lead->id) }}', 'Delete this lead record?')" class="adm-btn adm-btn-danger adm-btn-sm" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:48px; color:#9ca3af;">
                        <i class="fa fa-inbox" style="font-size:32px; display:block; margin-bottom:12px; opacity:0.3;"></i>
                        No leads received yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="adm-pagination">
            {{ $leads->links() }}
        </div>
    </div>
</form>

@endsection
