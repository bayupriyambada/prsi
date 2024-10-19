@section('title', $blog['title'])

<div>
    <div class="flex flex-col space-y-4 max-w-6xl lg:px-0 px-5 container mx-auto my-4">
        <ol class="flex items-center whitespace-nowrap">
            <x-custom.breadcrumb-view :links="[
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Blog', 'url' => route('blogs')],
                ['label' => $blog['title'], 'url' => '#'],
            ]" />
        </ol>
        <div class="bg-white shadow rounded p-4">
            <img src="{{ asset('storage/' . $blog['image']) }}" class="w-full h-[550px] object-fill rounded shadow"
                alt="{{ $blog['title'] }}">
        </div>
        <div class="bg-white shadow rounded-sm p-4 my-5">
            <div class="flex flex-col space-y-3">
                <h1 class="text-2xl font-semibold capitalize"> {{ $blog['title'] }}
                </h1>
                <p class="text-sm prose text-justify text-zinc-800">{!! $blog['body'] !!}</p>
                <div class="mt-1 flex space-x-3 items-center">
                    <x-custom.blog.info :blog="$blog" :textSize="'sm'" />
                </div>
            </div>
        </div>

        <x-custom.shared.share-link :url="url()->current()" :title="$blog['title']" />
        <x-custom.shared.copy-link :url="url()->current()" />
    </div>
</div>
