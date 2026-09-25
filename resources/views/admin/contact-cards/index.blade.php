@extends('admin.layouts.app')

@section('page_title', 'Contact Page Cards')

@section('admin_content')

<x-admin.page-intro
    title="Contact Page Cards"
    lead="Cards displayed on the public contact page (phone, email, hours, etc.)."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Contact cards', 'url' => null],
    ]"
/>

<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon gold"><i class="fa fa-address-card"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['total'] }}</div>
            <div class="adm-stat-label">Total cards</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon green"><i class="fa fa-circle-check"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['active'] }}</div>
            <div class="adm-stat-label">Active on contact page</div>
        </div>
    </div>
</div>

<form id="bulkForm" action="{{ route('admin.contact-cards.bulk') }}" method="POST">
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
            <h3><i class="fa fa-address-card" style="margin-right:8px;color:#d4a017;"></i> Contact page cards</h3>
            <a href="{{ route('admin.contact-cards.create') }}" class="adm-btn adm-btn-gold">
                <i class="fa fa-plus"></i> Add card
            </a>
        </div>

        <div class="adm-table-scroll">
        <table class="adm-table">
            <thead>
                <tr>
                    <th class="adm-checkbox-col"><input type="checkbox" id="selectAll"></th>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Primary line</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contactCards as $card)
                <tr>
                    <td class="adm-checkbox-col"><input type="checkbox" name="ids[]" value="{{ $card->id }}" class="row-checkbox"></td>
                    <td style="color:#9ca3af; font-size:13px;">{{ $card->sort_order }}</td>
                    <td class="adm-title-cell">{{ $card->title }}</td>
                    <td style="font-size:13px; color:#64748b; max-width:280px;">{{ \Illuminate\Support\Str::limit($card->line_primary, 50) }}</td>
                    <td>
                        @if($card->is_active)
                            <span class="adm-status-badge adm-status-active" title="Active"><span class="adm-status-dot"></span></span>
                        @else
                            <span class="adm-status-badge adm-status-inactive" title="Inactive"><span class="adm-status-dot"></span></span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('pages.contact') }}" target="_blank" class="adm-btn adm-btn-outline adm-btn-sm" title="View contact page">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.contact-cards.edit', $card) }}" class="adm-btn adm-btn-outline adm-btn-sm" title="Edit">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <button type="button" onclick="confirmIndividualDelete('{{ route('admin.contact-cards.destroy', $card) }}', 'Delete this card?')" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:48px; color:#9ca3af;">
                        <i class="fa fa-address-card" style="font-size:32px; display:block; margin-bottom:12px; opacity:0.3;"></i>
                        No cards yet. <a href="{{ route('admin.contact-cards.create') }}" style="color:#d4a017;">Add a card →</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="adm-pagination">
            {{ $contactCards->links() }}
        </div>
    </div>
</form>

@endsection
