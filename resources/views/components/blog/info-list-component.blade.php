@props(['blog', 'textSize'])

@php
    $textSize = match ($textSize) {
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'md' => 'text-md',
        'lg' => 'text-lg',
        default => 'text-md',
    };
@endphp

<ul class="flex flex-col w-full divide-y divide-zinc-200 {{ $textSize }}">
    <x-custom.blog.info-list :text="'Tanggal Posting'">
        {{ \Carbon\Carbon::parse($blog['created_at'])->format('d F Y') }}
    </x-custom.blog.info-list>
    <x-custom.blog.info-list :text="'Posting Oleh'">
        {{ $blog['user']['name'] }}
    </x-custom.blog.info-list>
    <x-custom.blog.info-list :text="'Regional'">
        {{ $blog['user']['regional']['name'] ?? 'Pusat' }}
    </x-custom.blog.info-list>
    <x-custom.blog.info-list :text="'Kategori'">
        {{ $blog['category'] }}
    </x-custom.blog.info-list>
    <x-custom.blog.info-list :text="'Tags'">
        <span class="font-semibold">
            {{ implode(', ', $blog['tags']) }}
        </span>
    </x-custom.blog.info-list>
</ul>
