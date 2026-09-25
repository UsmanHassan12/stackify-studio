@extends('admin.layouts.app')

@section('page_title', 'Dashboard')

@section('admin_content')

<x-admin.page-intro
    title="Welcome Back, Administrator"
    lead="Here's what's happening with Stackify Studio today."
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => null],
    ]"
/>

{{-- Top Row Statistics --}}
<div class="adm-stats">
    <div class="adm-stat">
        <div class="adm-stat-icon gold"><i class="fa fa-layer-group"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['projects'] }}</div>
            <div class="adm-stat-label">Projects</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon blue"><i class="fa fa-newspaper"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['posts'] }}</div>
            <div class="adm-stat-label">Blog Posts</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon green">
            <i class="fa fa-inbox"></i>
            @if($stats['unread_leads'] > 0)
                <span style="position:absolute; top:2px; right:2px; background:var(--danger); color:#fff; font-size:10px; padding:2px 5px; border-radius:10px; line-height:1;">{{ $stats['unread_leads'] }}</span>
            @endif
        </div>
        <div>
            <div class="adm-stat-val">{{ $stats['leads'] }}</div>
            <div class="adm-stat-label">New leads</div>
        </div>
    </div>
    <div class="adm-stat">
        <div class="adm-stat-icon purple"><i class="fa fa-envelope"></i></div>
        <div>
            <div class="adm-stat-val">{{ $stats['subscribers'] }}</div>
            <div class="adm-stat-label">Subscribers</div>
        </div>
    </div>
</div>

<div class="adm-dash-cols">
    
    {{-- Left Column: Recent Leads --}}
    <div>
        <div class="adm-card">
            <div class="adm-card-header" style="display:flex; justify-content:space-between; align-items:center;">
                <h3><i class="fa fa-clock-rotate-left" style="margin-right:8px;color:#d4a017;"></i> Recent Inquiries</h3>
                <a href="{{ route('admin.leads.index') }}" class="adm-btn adm-btn-outline adm-btn-sm">View All</a>
            </div>
            <div class="adm-table-scroll">
            <table class="adm-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentLeads as $lead)
                    <tr style="{{ !$lead->is_read ? 'background: #fffbeb;' : '' }}">
                        <td style="font-size:12px; color:#9ca3af;">{{ $lead->created_at->diffForHumans() }}</td>
                        <td class="adm-title-cell">
                            {{ $lead->name }}
                            <div style="font-size:11px; font-weight:400; color:#9ca3af;">{{ $lead->service }}</div>
                        </td>
                        <td>
                            @if(!$lead->is_read)
                                <span class="adm-status-badge adm-status-active">New</span>
                            @else
                                <span class="adm-status-badge adm-status-inactive">Read</span>
                            @endif
                        </td>
                        <td style="text-align:right;">
                            <a href="{{ route('admin.leads.show', $lead->id) }}" class="adm-btn adm-btn-outline adm-btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" style="text-align:center; padding:24px; color:#9ca3af;">No recent inquiries.</td></tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>

    {{-- Right Column: Quick Actions & Blog --}}
    <div style="display:flex; flex-direction:column; gap:24px;">
        
        <div class="adm-card">
            <div class="adm-card-header"><h3>Quick Actions</h3></div>
            <div class="adm-card-body" style="display:grid; gap:12px;">
                <a href="{{ route('admin.projects.create') }}" class="adm-btn adm-btn-primary" style="justify-content:center;">
                    <i class="fa fa-plus-circle"></i> New Project
                </a>
                <a href="{{ route('admin.posts.create') }}" class="adm-btn adm-btn-outline" style="justify-content:center;">
                    <i class="fa fa-pen-nib"></i> Write Post
                </a>
            </div>
        </div>

        <div class="adm-card">
            <div class="adm-card-header"><h3>Latest Content</h3></div>
            <div class="adm-card-body" style="padding:0;">
                <div style="display:flex; flex-direction:column;">
                    @foreach($recentPosts as $post)
                    <div style="padding: 12px 20px; border-bottom: 1px solid var(--border); display:flex; gap:12px; align-items:center;">
                        <div style="width:40px; height:40px; border-radius:6px; background: #eee url({{ asset('uploads/blog/' . $post->image) }}); background-size:cover;"></div>
                        <div style="flex:1; min-width:0;">
                            <div style="font-weight:600; font-size:13px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $post->title }}</div>
                            <div style="font-size:11px; color:#9ca3af;">{{ $post->created_at->format('M d') }}</div>
                        </div>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" style="color:var(--gold);"><i class="fa fa-angle-right"></i></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
