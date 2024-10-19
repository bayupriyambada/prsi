@props(['regionalBranches', 'calendars'])

<div class="md:col-span-1 flex flex-col space-y-3">
    <div class="flex flex-col space-y-3">
        {{-- jadwal prsi --}}
        <x-time-table-component :calendars="$calendars" />
        {{-- jadwal prsi --}}
        {{-- cabang PRSI --}}
        <x-custom.regional-section :regionalBranches="$regionalBranches" />
        {{-- cabang PRSI --}}
    </div>
</div>
