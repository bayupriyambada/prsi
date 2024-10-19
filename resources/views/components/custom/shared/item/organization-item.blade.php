@props(['organization'])

<div
    class="flex flex-col group bg-white border shadow-sm rounded-xl overflow-hidden hover:shadow-lg focus:outline-none focus:shadow-lg transition ">
    <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
        <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
            src="{{ asset('storage/' . $organization->image) }}" alt="Card Image {{ $organization->name }}">
    </div>
    <div class="p-4 md:p-5">
        <h3 class="text-lg font-bold text-zinc-800">
            {{ $organization->name }}
        </h3>
    </div>
</div>
