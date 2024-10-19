@props(['gallery'])

<div class="relative bg-white border shadow-sm rounded-xl ">
    <img class="w-full h-full rounded-xl" src="{{ asset('storage/' . $gallery->image) }}"
        alt="Card Image-{{ $gallery->image }}">
    <div class="absolute top-0 start-0 end-0">
        <div class="p-4 md:p-5">
            <h3 class="text-lg font-bold text-gray-800">
                {{ $gallery->title }}
            </h3>
        </div>
    </div>
</div>
