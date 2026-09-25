@extends('admin.layouts.app')

@section('page_title', 'Newsletter Subscribers')

@section('admin_content')

<x-admin.page-intro
    title="Newsletter Subscribers"
    lead="Emails captured from the newsletter signup. Remove addresses you no longer want stored."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Subscribers', 'url' => null],
    ]"
/>

{{-- Stats Row --}}
<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon green"><i class="fa fa-envelope"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total'] }}</div>
            <div class="adm-stat-label">Total Subscribers</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon blue"><i class="fa fa-calendar-check"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['month'] }}</div>
            <div class="adm-stat-label">Joined This Month</div>
        </div>
    </div>
</div>

{{-- Subscribers Table --}}
<form id="bulkForm" action="{{ route('admin.subscribers.bulk') }}" method="POST">
    @csrf
    <input type="hidden" name="action" id="bulkActionInput">

    <div id="bulkBar" class="adm-bulk-bar">
        <div>
            <span class="bulk-count"><span id="selectedCount">0</span> Selected</span>
        </div>
        <button type="button" onclick="submitBulkAction('delete')" class="adm-btn adm-btn-sm adm-btn-danger">
            <i class="fa fa-user-minus"></i> Remove Selected
        </button>
    </div>

    <div class="adm-card">
        <div class="adm-card-header">
            <h3><i class="fa fa-users" style="margin-right:8px;color:#d4a017;"></i> Mailing List</h3>
        </div>

        <div class="adm-table-scroll">
        <table class="adm-table">
            <thead>
                <tr>
                    <th class="adm-checkbox-col"><input type="checkbox" id="selectAll"></th>
                    <th>Join Date</th>
                    <th>Email Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscribers as $subscriber)
                <tr>
                    <td class="adm-checkbox-col"><input type="checkbox" name="ids[]" value="{{ $subscriber->id }}" class="row-checkbox"></td>
                    <td style="color:#9ca3af; font-size:13px;">{{ $subscriber->created_at->format('M d, Y') }}</td>
                    <td class="adm-title-cell">{{ $subscriber->email }}</td>
                    <td>
                        <button type="button" onclick="confirmIndividualDelete('{{ route('admin.subscribers.destroy', $subscriber->id) }}', 'Remove this email from the mailing list?')" class="adm-btn adm-btn-danger adm-btn-sm" title="Remove">
                            <i class="fa fa-user-minus"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="text-align:center; padding:48px; color:#9ca3af;">
                        <i class="fa fa-envelope-open" style="font-size:32px; display:block; margin-bottom:12px; opacity:0.3;"></i>
                        No subscribers yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="adm-pagination">
            {{ $subscribers->links() }}
        </div>
    </div>
</form>

@endsection
