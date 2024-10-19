@props(['blogs'])
<div class="md:col-span-4 flex flex-col space-y-3">
    <div class="bg-white border-l-4 border-zinc-950 shadow rounded-sm p-4">
        <h4 class="text-xl font-semibold capitalize">
            Berita PRSI Terbaru
        </h4>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($blogs as $item)
            <x-card.blog-card-home :blog="$item" />
        @endforeach
    </div>
</div>
