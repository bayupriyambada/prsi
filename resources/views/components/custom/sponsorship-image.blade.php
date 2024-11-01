@props(['sponsorship', 'textAlt'])
<div class="flex justify-center items-center">
    <img src="{{ asset('storage/' . $sponsorship->image) }}" 
         class="lg:h-14 h-16 w-full object-fill" style="width: full; height: 100px;" 
         alt="{{ $textAlt }}-{{ $sponsorship->image }}" />
</div>
