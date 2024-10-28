@props(['links'])

<ul class="inline-flex items-center space-x-1">
    @foreach ($links as $index => $link)
      
        @if ($index < count($links) - 1)
            <li class="inline-flex items-center">
                <a href="{{ $link['url'] }}" wire:navigate class="text-md text-gray-500 hover:text-blue-600">
                    <span class="inline lg:hidden">{{ Str::limit($link['label'], 30) }}</span>
                    <span class="hidden lg:inline">{{ $link['label'] }}</span>
                </a>
                <svg class="shrink-0 size-5 text-gray-400 mx-2" width="16" height="16" viewBox="0 0 16 16"
                    fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
                </svg>
            </li>
        @else
            <li class="inline-flex items-center text-sm font-semibold text-gray-800">
                <span class="inline lg:hidden">{{ Str::limit($link['label'], 30) }}</span>
                <span class="hidden lg:inline">{{ $link['label'] }}</span>
            </li>
        @endif
    @endforeach
</ul>
