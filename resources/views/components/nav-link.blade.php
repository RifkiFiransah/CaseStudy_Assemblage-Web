@props(['active' => 'false', 'link' => '', 'icon' => 'fas fa-home'])

@php
    $class = $active ?? false ? 'nav-item dropdown active' : 'nav-item dropdown';
@endphp

<li {{ $attributes->merge(['class' => $class]) }}>
    <a wire:navigate {{ $attributes->merge(['href' => $link]) }} class="nav-link">
        <i {{ $attributes->merge(['class' => $icon]) }}></i>
        <span>{{ $slot }}</span>
    </a>
</li>
