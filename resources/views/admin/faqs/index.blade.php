@extends('admin.layouts.app')

@section('page_title', 'Manage FAQs')

@section('admin_content')

<x-admin.page-intro
    title="Manage FAQs"
    lead="Questions and answers shown in the FAQ section on the services page."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'FAQs', 'url' => null],
    ]"
/>

<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon gold"><i class="fa fa-circle-question"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total'] }}</div>
            <div class="adm-stat-label">Total FAQs</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon green"><i class="fa fa-circle-check"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['active'] }}</div>
            <div class="adm-stat-label">Active on Site</div>
        </div>
    </div>
</div>

<form id="bulkForm" action="{{ route('admin.faqs.bulk') }}" method="POST">
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
            <h3><i class="fa fa-circle-question" style="margin-right:8px;color:#d4a017;"></i> All FAQs</h3>
            <a href="{{ route('admin.faqs.create') }}" class="adm-btn adm-btn-gold">
                <i class="fa fa-plus"></i> Add FAQ
            </a>
        </div>

        <div class="adm-table-scroll">
        <table class="adm-table">
            <thead>
                <tr>
                    <th class="adm-checkbox-col"><input type="checkbox" id="selectAll"></th>
                    <th>Order</th>
                    <th>Question</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                <tr>
                    <td class="adm-checkbox-col"><input type="checkbox" name="ids[]" value="{{ $faq->id }}" class="row-checkbox"></td>
                    <td style="color:#9ca3af; font-size:13px;">{{ $faq->sort_order }}</td>
                    <td class="adm-title-cell">{{ Str::limit($faq->question, 80) }}</td>
                    <td>
                        @if($faq->is_active)
                            <span class="adm-status-badge adm-status-active" title="Active"><span class="adm-status-dot"></span></span>
                        @else
                            <span class="adm-status-badge adm-status-inactive" title="Inactive"><span class="adm-status-dot"></span></span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('pages.services') }}#faq-{{ $faq->id }}" target="_blank" class="adm-btn adm-btn-outline adm-btn-sm" title="View on Site">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <button type="button" onclick="confirmIndividualDelete('{{ route('admin.faqs.destroy', $faq->id) }}', 'Delete this FAQ?')" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:48px; color:#9ca3af;">
                        <i class="fa fa-circle-question" style="font-size:32px; display:block; margin-bottom:12px; opacity:0.3;"></i>
                        No FAQs yet. <a href="{{ route('admin.faqs.create') }}" style="color:#d4a017;">Add your first FAQ →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="adm-pagination">
            {{ $faqs->links() }}
        </div>
    </div>
</form>

@endsection
