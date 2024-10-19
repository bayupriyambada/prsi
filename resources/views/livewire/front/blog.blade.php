@section('title', 'Blogs')
<div>
    <div class="flex flex-col lg:px-0 px-5 space-y-4 container mx-auto mt-4">
        <ol class="flex items-center whitespace-nowrap">
            <x-custom.breadcrumb-view :links="[['label' => 'Beranda', 'url' => route('home')], ['label' => 'Blog', 'url' => '#']]" />
        </ol>
        <div class="w-full">
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 space-x-3">
                <div class="col-span-2 bg-white shadow rounded p-2">
                    <input type="search" placeholder="Cari beradasarkan Judul"
                        wire:model.live.debounce.500ms="filters.search"
                        class="py-3 w-full border-none focus:ring-0 rounded focus:outline-none">
                </div>
                <div class="col-span-2 bg-white shadow rounded p-2">
                    <select class="py-3 w-full border-none focus:ring-0 rounded focus:outline-none form-select"
                        wire:model.live.debounce.500ms="filters.category">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div>
            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-4 mb-4">
                @foreach ($blogs as $item)
                    <a class="flex flex-col group bg-white shadow-sm rounded-xl overflow-hidden hover:shadow-lg focus:outline-none focus:shadow-lg transition relative"
                        href="{{ route('blogs.detail', $item['slug']) }}" wire:navigate>
                        <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                            <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl"
                                src="{{ asset('storage/' . $item['image']) }}" alt="Card Image" />
                        </div>
                        <div class="absolute bg-white top-0 start-0 p-2 rounded-es-sm">
                            <span
                                class="text-xs text-zinc-800">{{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}</span>
                        </div>
                        <div class="p-4 md:p-5">
                            <h3 class="text-lg font-bold text-zinc-800">
                                {{ $item['title'] }}
                            </h3>
                            <p class="mt-1 text-zinc-800 text-sm">

                                {!! Str::limit($item['body'], 150, '...') !!} </p>
                            <div class="mt-5 flex space-x-3 items-center">
                                <ul class="flex flex-col w-full divide-y divide-zinc-200 text-sm">
                                    <x-custom.blog.info-list :text="'Tanggal Posting'">
                                        {{ \Carbon\Carbon::parse($item['created_at'])->format('d F Y') }}
                                    </x-custom.blog.info-list>
                                    <x-custom.blog.info-list :text="'Posting Oleh'">
                                        {{ $item['user']['name'] }}
                                    </x-custom.blog.info-list>
                                    <x-custom.blog.info-list :text="'Regional'">
                                        {{ $item['user']['regional']['name'] ?? 'Pusat' }}
                                    </x-custom.blog.info-list>
                                    <x-custom.blog.info-list :text="'Kategori'">
                                        {{ $item['category']['title'] }}
                                    </x-custom.blog.info-list>
                                    <x-custom.blog.info-list :text="'Tags'">
                                        <span class="font-semibold">
                                            {{ implode(', ', $item['tags']) }}
                                        </span>
                                    </x-custom.blog.info-list>
                                </ul>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="my-10">
                {{-- {{ $blogs->links() }} --}}
                {{ $blogs->links('components.custom.shared.pagination') }}
            </div>
        </div>
    </div>
</div>
