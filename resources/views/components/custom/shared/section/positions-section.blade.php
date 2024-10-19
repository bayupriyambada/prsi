@props(['positions'])

<div class="flex flex-col lg:px-0 px-5 space-y-4 container mx-auto my-4">
    <div class="md:col-span-4 flex flex-col space-y-3">
        @foreach ($positions as $position)
            <div class="bg-white border-l-4 border-zinc-950 shadow rounded-sm p-4">
                <h4 class="text-xl font-semibold capitalize">
                    {{ $position->name }}
                </h4>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 my-4">
                @foreach ($position->employees as $item)
                    <x-custom.shared.item.organization-item :organization="$item" />
                @endforeach
            </div>
        @endforeach
    </div>
</div>
