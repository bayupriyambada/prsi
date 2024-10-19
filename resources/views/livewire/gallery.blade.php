@section('title', 'Gallery')

<div>
    <div class="flex flex-col lg:px-0 px-5 space-y-4 container mx-auto mt-4">
        <ol class="flex items-center whitespace-nowrap">
            <x-custom.breadcrumb-view :links="[['label' => 'Beranda', 'url' => route('home')], ['label' => 'Galeri']]" />
        </ol>
        <div>
            <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-1 gap-4 mb-4">
                @foreach ($galleries as $item)
                    <x-custom.shared.item.gallery-item :gallery="$item" />
                @endforeach
            </div>
            <div class="my-10">
                {{ $galleries->links('components.custom.shared.pagination') }}
            </div>

        </div>
    </div>
</div>
