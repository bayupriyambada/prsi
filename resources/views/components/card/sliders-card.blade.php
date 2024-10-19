@props(['image', 'alt', 'class' => ''])

<div class="swiper-slide {{ $class }}">
    <img src="{{ $image }}" class="w-full h-full rounded-md" alt="sliders{{ $image }}" />
</div>
