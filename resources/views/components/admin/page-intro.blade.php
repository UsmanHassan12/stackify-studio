@props([
    'breadcrumbs' => [],
    'title',
    'lead' => null,
    'leadHtml' => null,
])

<header class="adm-page-intro" role="banner">
    @if(count($breadcrumbs))
        <nav class="adm-breadcrumb" aria-label="Breadcrumb">
            @foreach($breadcrumbs as $index => $item)
                @if($index > 0)
                    <span class="adm-breadcrumb-sep" aria-hidden="true">&gt;</span>
                @endif
                @if(!empty($item['url']))
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                @else
                    <span class="adm-breadcrumb-current" aria-current="page">{{ $item['label'] }}</span>
                @endif
            @endforeach
        </nav>
    @endif

    <div class="adm-page-header adm-page-header--intro">
        <div class="adm-page-header-text">
            <h1>{{ $title }}</h1>
            @if(filled($leadHtml))
                <p class="adm-page-lead">{!! $leadHtml !!}</p>
            @elseif(filled($lead))
                <p class="adm-page-lead">{{ $lead }}</p>
            @endif
        </div>
        @isset($actions)
            <div class="adm-page-header-actions">{{ $actions }}</div>
        @endisset
    </div>
</header>
