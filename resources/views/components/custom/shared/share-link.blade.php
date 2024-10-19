@props(['url', 'title' => ''])

<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-4">
    <div>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank"
            class="text-sm font-semibold bg-white border-l-4 border-blue-500 shadow rounded-sm p-4 block w-full">
            Share via Facebook</a>
    </div>
    <div>
        <a href="https://api.whatsapp.com/send?text={{ $url }}" target="_blank"
            class="text-sm font-semibold bg-white border-l-4 border-green-500 shadow rounded-sm p-4 block w-full">
            Share via Whatsapp</a>
    </div>
    <div>
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ $title }}"
            target="_blank"
            class="text-sm font-semibold bg-white border-l-4 border-blue-300 shadow rounded-sm p-4 block w-full">
            Share via X</a>
    </div>
</div>
