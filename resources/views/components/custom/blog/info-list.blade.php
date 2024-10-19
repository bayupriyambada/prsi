@props(['text' => ''])


<li class="inline-flex items-center gap-x-2 py-3 font-medium text-zinc-800">
    {{ $text }}:
    <span class="font-semibold">{{ $slot }}</span>
</li>
