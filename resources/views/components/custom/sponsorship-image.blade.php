@props(['sponsorship', 'textAlt'])
<div>
    <img src="{{ asset('storage/' . $sponsorship->image) }}" class="md:w-full md:h-16 h-16 w-full object-fit"
        alt="{{ $textAlt }}-{{ $sponsorship->image }}" />
</div>
