@props(['href', 'title', 'textSize'])
@php
    $isActive = request()->url() === $href ? 'text-blue-600 font-bold' : 'text-zinc-800';
@endphp

<a class="p-2 flex items-center text-md {{ $isActive }} hover:text-gray-500 focus:outline-none focus:text-gray-500 "
    href="{{ isset($href) ? $href : '' }}" wire:navigate>
    {{ $title }}
</a>
