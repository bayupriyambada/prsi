@props(['sponsorship', 'textAlt'])
<div class="flex justify-center items-center">
    <img src="{{ asset('storage/' . $sponsorship->image) }}" 
         class="lg:h-12 h-12 w-full object-contain" 
         alt="{{ $textAlt }}-{{ $sponsorship->image }}" />
</div>
