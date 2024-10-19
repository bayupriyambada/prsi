@props(['calendars'])

<div>
    <div class="bg-white border-l-4 border-zinc-950 shadow rounded-sm p-4">
        <h4 class="text-xl font-semibold capitalize">
            Jadwal PRSI Mendatang
        </h4>
    </div>
    <div class="bg-white shadow rounded-sm p-4 mt-4">
        <ul class=" flex flex-col divide-y divide-gray-200">

            @foreach ($calendars as $item)
                <li class="inline-flex items-center gap-x-2 py-3 text-sm font-medium text-zinc-800">
                    {{ $item->title }} - {{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}
                </li>
            @endforeach

            <li class="inline-flex items-center gap-x-2 py-3 text-sm font-medium text-zinc-800">
                <a href="{{ route('timeline-calender') }}" wire:navigate
                    class="text-white w-full p-2 rounded text-center bg-zinc-900">Lihat Semua
                    Jadwal</a>
            </li>
        </ul>
    </div>
</div>
