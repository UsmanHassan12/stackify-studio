@php
    $links = isset($socialLinks) ? $socialLinks->filter(fn ($l) => filled($l->url)) : collect();
@endphp
@if($links->isNotEmpty())
<div class="ve-social">
    @foreach($links as $link)
    <a href="{{ $link->url }}"
       @if(\Illuminate\Support\Str::startsWith($link->url, ['http://', 'https://'])) target="_blank" rel="noopener noreferrer" @endif
       aria-label="{{ $link->label }}"><i class="{{ $link->icon_class }}"></i></a>
    @endforeach
</div>
@endif
