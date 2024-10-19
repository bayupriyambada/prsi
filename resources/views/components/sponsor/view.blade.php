@props(['sponsorship', 'sponsors' => [], 'coSponsors' => []])

@php
    $sponsorshipData = match ($sponsorship) {
        'sponsors' => $sponsors,
        'coSponsors' => $coSponsors,
        default => [],
    };
@endphp

<div class="my-4 flex flex-col space-y-4">
    <div>
        <div class="bg-white border-l-4 border-zinc-950 shadow rounded-sm p-4">
            <h4 class="md:text-xl text-sm font-semibold capitalize">
                {{ $sponsorship === 'sponsors' ? 'Sponsor Utama' : 'Co-Sponsor' }}
            </h4>
        </div>
        <div class="bg-white shadow rounded-sm p-4 mt-4">
            <div class="grid lg:grid-cols-8 md:grid-cols-6 grid-cols-4 gap-3">
                @foreach ($sponsorshipData as $item)
                    <x-custom.sponsorship-image :sponsorship="$item" :textAlt="$sponsorship === 'sponsors' ? 'Sponsor' : 'Co-Sponsor'" />
                @endforeach
            </div>
        </div>
    </div>
</div>
