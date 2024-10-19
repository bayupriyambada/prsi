@props(['sponsorship', 'textAlt'])
<div>
    <img src="{{ asset('storage/' . $sponsorship->image) }}" class="md:w-32 md:h-32 h-20 w-20"
        alt="{{ $textAlt }}-{{ $sponsorship->image }}" />
</div>
