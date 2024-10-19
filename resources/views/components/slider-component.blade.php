@props(['sliders'])

<div class="swiper">
    <div class="swiper-wrapper">
        @foreach ($sliders as $index => $item)
            <x-card.sliders-card class="" key="{{ $index }}" image="{{ asset('storage/' . $item->image) }}"
                alt="test"></x-card.sliders-card>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
