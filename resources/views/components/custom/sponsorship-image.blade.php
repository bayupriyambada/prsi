@props(['sponsorship', 'textAlt'])
<div class="flex justify-center items-center">
    <img src="{{ asset('storage/' . $sponsorship->image) }}" class="object-fit" style="height: 80px; width: 100%"
        alt="{{ $textAlt }}-{{ $sponsorship->image }}" />
</div>
