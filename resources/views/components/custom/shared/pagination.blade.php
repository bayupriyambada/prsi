<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-5">
            <span>
                @if ($paginator->onFirstPage())
                    <span class="bg-zinc-800 text-white rounded p-2 ">Previous</span>
                @else
                    <button class="" wire:click="previousPage" wire:loading.attr="disabled"
                        rel="prev">Previous</button>
                @endif
            </span>

            <span>
                @if ($paginator->onLastPage())
                    <span class="bg-zinc-800 text-white rounded p-2">Next</span>
                @else
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next">Next</button>
                @endif
            </span>
        </nav>
    @endif
</div>
