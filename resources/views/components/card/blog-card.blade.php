@props(['blog', 'bodyText' => true])

@php
    $bodyText = match ($bodyText) {
        true => true,
        false => false,
    };
@endphp
<div>
    <a class="flex flex-col group bg-white shadow-sm rounded-xl overflow-hidden hover:shadow-lg focus:outline-none focus:shadow-lg transition relative"
        href="{{ route('blogs.detail', $blog['slug']) }}" wire:navigate>
        <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
            <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                src="{{ asset('storage/' . $blog['image']) }}" alt="Card Image" />
        </div>
        <div class="absolute bg-white top-0 start-0 p-2 rounded-es-sm">
            <span class="text-xs text-zinc-800">{{ \Carbon\Carbon::parse($blog['created_at'])->format('d M Y') }}</span>
        </div>
        <div class="p-4 md:p-5">
            <h3 class="text-lg font-bold text-zinc-800">
                {{ $blog['title'] }}
            </h3>
            <p class="mt-1 text-zinc-800 text-sm">
                @if ($bodyText)
                    {!! Str::limit($blog['body'], 150, '...') !!}
                @endif
            </p>
            <div class="mt-5 flex space-x-3 items-center">
                <x-custom.blog.info :blog="$blog" :textSize="'xs'" />
            </div>
        </div>
    </a>
</div>
