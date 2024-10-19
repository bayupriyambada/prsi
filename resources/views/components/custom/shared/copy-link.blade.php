@props(['url'])

<div class="my-4">
    <div class="flex justify-between items-center space-x-4">
        <input type="text" value="{{ $url }}" readonly
            class="flex-grow border border-gray-300 rounded p-2 focus:outline-none text-zinc-800">

        <button onclick="copyToClipboard('{{ $url }}')"
            class="py-2 px-4 bg-zinc-800 text-white rounded-md hover:bg-zinc-600 focus:outline-none focus:ring-2 focus:ring-blue-300">
            Salin Link
        </button>
    </div>

    <div id="copy-notification" class="hidden mt-2 bg-white rounded-md p-2 text-green-500">
        Link telah disalin
    </div>

</div>
