@props(['url', 'title' => 'Button Text', 'bgColor'])

@php
    $bgColor = match ($bgColor) {
        'white' => 'bg-zinc-800 text-white hover:bg-zinc-600',
        'zinc' => 'bg-white text-zinc-800 hover:bg-gray-100',
    };
@endphp

<a href="{{ isset($url) ? $url : '' }}" wire:navigate class="p-4 {{ $bgColor }} rounded-md shadow">
    {{ $title }}</a>
</div>
