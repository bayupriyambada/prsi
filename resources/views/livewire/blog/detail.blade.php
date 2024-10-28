@section('title', $blog['title'])

@push('seo')
    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ Str::limit(strip_tags($blog['body']), 150) }}">
    <meta name="keywords" content="nama situs, {{ $blog['title'] }}, kategori">
    <meta name="author" content="{{ $blog['user']['name'] }}">

    <!-- Open Graph Tags (Facebook, Instagram, LinkedIn, WhatsApp) -->
    <meta property="og:title" content="{{ $blog['title'] }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog['body']), 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $blog['image']) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="PRSI">
    
    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog['title'] }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog['body']), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $blog['image']) }}">
    <meta name="twitter:site" content="@PRSI">
    
    <!-- WhatsApp and Other Messaging Platforms -->
    <meta property="og:image" content="{{ asset('storage/' . $blog['image']) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endpush

<div>
    <div class="flex flex-col space-y-4 max-w-6xl lg:px-0 px-5 container mx-auto my-4">
        <ol class="flex items-center lg:whitespace-nowrap ">
            <x-custom.breadcrumb-view :links="[
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Blog', 'url' => route('blogs')],
                ['label' => $blog['title'], 'url' => '#'],
            ]" />
        </ol>
        <div class="bg-white shadow rounded p-4">
            <img src="{{ asset('storage/' . $blog['image']) }}" class="w-full lg:h-[550px] h-full object-fill rounded shadow"
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
