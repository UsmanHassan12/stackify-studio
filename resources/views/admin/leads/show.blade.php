@extends('admin.layouts.app')

@section('page_title', 'View Lead')

@section('admin_content')

<x-admin.page-intro
    title="Lead Details"
    :lead="'Received on ' . $lead->created_at->format('F d, Y \a\t H:i')"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
        ['label' => 'Contact leads', 'url' => route('admin.leads.index')],
        ['label' => Str::limit($lead->name, 40), 'url' => null],
    ]"
>
    <x-slot:actions>
        <a href="{{ route('admin.leads.index') }}" class="adm-btn adm-btn-outline">
            <i class="fa fa-arrow-left"></i> Back to Inbox
        </a>
    </x-slot:actions>
</x-admin.page-intro>

<div class="adm-split">

    {{-- Message Content --}}
    <div>
        <div class="adm-card">
            <div class="adm-card-header">
                <h3><i class="fa fa-message" style="margin-right:8px;color:#d4a017;"></i> Client Message</h3>
            </div>
            <div class="adm-card-body" style="background:#f9fafb; min-height:300px; line-height:1.7; font-size:15px; color:#1f2937; border-radius:0 0 12px 12px;">
                {!! nl2br(e($lead->message)) !!}
            </div>
        </div>
    </div>

    {{-- Contact Information --}}
    <div class="adm-split-side">
        <div class="adm-card">
            <div class="adm-card-header"><h3>Contact Info</h3></div>
            <div class="adm-card-body">
                <div class="adm-form-group">
                    <label class="adm-label">Full Name</label>
                    <div class="adm-input" style="background:#f8fafc; border-color:transparent;">{{ $lead->name }}</div>
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Email Address</label>
                    <a href="mailto:{{ $lead->email }}" class="adm-input" style="display:block; background:#f8fafc; border-color:transparent; text-decoration:none; color:#3b82f6;">
                        {{ $lead->email }} <i class="fa fa-external-link" style="font-size:10px; margin-left:5px;"></i>
                    </a>
                </div>
                <div class="adm-form-group">
                    <label class="adm-label">Phone Number</label>
                    <div class="adm-input" style="background:#f8fafc; border-color:transparent;">{{ $lead->phone ?? 'Not provided' }}</div>
                </div>
                <div class="adm-form-group" style="margin-bottom:0;">
                    <label class="adm-label">Service Interested In</label>
                    <span class="adm-badge" style="font-size:13px; padding:6px 14px;">{{ $lead->service ?? 'N/A' }}</span>
                </div>
            </div>
        </div>

        <div class="adm-card">
            <div class="adm-card-header"><h3>Actions</h3></div>
            <div class="adm-card-body">
                <a href="mailto:{{ $lead->email }}?subject=Re: Your Inquiry to Stackify Studio" class="adm-btn adm-btn-primary" style="width:100%; justify-content:center; margin-bottom:12px;">
                    <i class="fa fa-reply"></i> Reply via Email
                </a>
                
                <form action="{{ route('admin.leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Delete this lead record?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="adm-btn adm-btn-danger" style="width:100%; justify-content:center;">
                        <i class="fa fa-trash"></i> Delete Record
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
